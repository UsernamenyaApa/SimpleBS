<?php

namespace App\Http\Controllers\Machine;

use App\Http\Controllers\Controller;
use App\Models\PengajuanSurat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Pdf;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Shared\Html;

class MachineController extends Controller
{
    public function home()
    {
        return view('user.listlayanan');
    }

    public function history(Request $request)
    {
        $query = PengajuanSurat::where('user_id', Auth::id());

        if ($request->filled('q')) {
            $query->where(function ($builder) use ($request) {
                $builder->where('slug', 'like', "%{$request->q}%")
                    ->orWhere('title', 'like', "%{$request->q}%")
                    ->orWhere('data->nama', 'like', "%{$request->q}%");
            });
        }

        $surats = $query->latest()->paginate(12)->withQueryString();

        return view('machine.history', compact('surats'));
    }

    public function submitted(PengajuanSurat $pengajuan)
    {
        $this->ensureOwnedByMachine($pengajuan);

        return view('machine.submitted', compact('pengajuan'));
    }

    public function downloadPdf(PengajuanSurat $pengajuan)
    {
        $this->ensureOwnedByMachine($pengajuan);

        $view = "user.layanansurat.pdf.{$pengajuan->slug}";
        abort_unless(view()->exists($view), 404, 'Template PDF surat belum tersedia.');

        return Pdf::loadView($view, [
            'pengajuan' => $pengajuan,
            'data' => $pengajuan->data,
            'files' => $pengajuan->files,
            'title' => $pengajuan->title,
        ])->setPaper('a4', 'portrait')->download("surat-{$pengajuan->slug}-{$pengajuan->id}.pdf");
    }

    public function downloadWord(PengajuanSurat $pengajuan)
    {
        $this->ensureOwnedByMachine($pengajuan);

        $view = "admin.layanansurat.word.{$pengajuan->slug}";
        abort_unless(view()->exists($view), 404, 'Template Word surat belum tersedia.');

        $html = view($view, [
            'pengajuan' => $pengajuan,
            'data' => $pengajuan->data,
            'files' => $pengajuan->files,
            'title' => $pengajuan->title,
        ])->render();

        $phpWord = new PhpWord();
        $section = $phpWord->addSection([
            'marginTop' => 1134,
            'marginBottom' => 1134,
            'marginLeft' => 1134,
            'marginRight' => 1134,
        ]);
        Html::addHtml($section, $html, false, false);

        $tempFile = tempnam(sys_get_temp_dir(), 'word_');
        IOFactory::createWriter($phpWord, 'Word2007')->save($tempFile);

        return response()->download($tempFile, "surat-{$pengajuan->slug}-{$pengajuan->id}.docx", [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        ])->deleteFileAfterSend(true);
    }

    private function ensureOwnedByMachine(PengajuanSurat $pengajuan): void
    {
        abort_unless($pengajuan->user_id === Auth::id(), 403);
    }
}
