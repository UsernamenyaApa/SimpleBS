<?php
require 'vendor/autoload.php';
$app = require 'bootstrap/app.php';
$app->make(Illuminate\Contracts\Http\Kernel::class)->bootstrap();

$p = App\Models\PengajuanSurat::find(53);
if (!$p) {
    echo "No record 53\n";
    exit;
}

$slug = $p->slug;
$html = view("user.layanansurat.pdf.$slug", [
    'pengajuan' => $p,
    'data' => $p->data,
    'files' => $p->files,
    'title' => $p->title,
    'penandatangan' => 'EDI SOPANDI',
])->render();
file_put_contents('debug-word-output.html', $html);
echo "Rendered HTML saved to debug-word-output.html\n";
echo substr($html, 0, 800), "\n---END---\n";
