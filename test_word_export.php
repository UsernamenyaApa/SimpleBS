<?php
require 'vendor/autoload.php';
$app = require 'bootstrap/app.php';
$app->make(\Illuminate\Contracts\Http\Kernel::class)->bootstrap();

$count = \App\Models\PengajuanSurat::where('status', 'verified')
    ->orWhere('status', 'approved')
    ->count();

echo "Total approved letters: $count\n";

if ($count > 0) {
    $surat = \App\Models\PengajuanSurat::where('status', 'verified')
        ->orWhere('status', 'approved')
        ->first();
    
    echo "ID: {$surat->id}\n";
    echo "Type: {$surat->slug}\n";
    echo "Data: " . json_encode($surat->data) . "\n";
} else {
    echo "No approved letters found\n";
}
