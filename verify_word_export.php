<?php
require 'vendor/autoload.php';
$app = require 'bootstrap/app.php';
$app->make(Illuminate\Contracts\Http\Kernel::class)->bootstrap();

$p = App\Models\PengajuanSurat::find(53);
if (!$p) {
    echo "No record 53\n";
    exit(1);
}

$slug = $p->slug;
$html = view('user.layanansurat.pdf.' . $slug, [
    'pengajuan' => $p,
    'data' => $p->data,
    'files' => $p->files,
    'title' => $p->title,
    'penandatangan' => 'EDI SOPANDI',
])->render();

$html = str_replace(public_path('logosurat.png'), asset('logosurat.png'), $html);
$html = preg_replace('/<img[^>]+src="[^"]+"[^>]*>/i', '', $html);
$html = preg_replace('/^\s*<!doctype\s+html[^>]*>/is', '', $html);
$html = preg_replace('/^\s*<html\b[^>]*>/is', '', $html);
$html = preg_replace('/<\/html>\s*$/is', '', $html);
$html = preg_replace('/^\s*<body\b[^>]*>/is', '', $html);
$html = preg_replace('/<\/body>\s*$/is', '', $html);
$html = trim($html);

if ($html === '') {
    echo "EMPTY_FRAGMENT\n";
    exit(1);
}

$phpWord = new PhpOffice\PhpWord\PhpWord();
$section = $phpWord->addSection([
    'marginTop' => 720,
    'marginRight' => 720,
    'marginBottom' => 720,
    'marginLeft' => 720,
]);

PhpOffice\PhpWord\Shared\Html::addHtml($section, $html, false);
$writer = PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
$writer->save('verify-word.docx');

echo "WORD_EXPORT_OK\n";
