<?php

namespace App\Traits;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

trait WhatsappTrait
{
    protected $fonnteBaseUrl = 'https://api.fonnte.com/send';

    protected function sendWhatsappNotification(string $target, string $message): bool
    {
        $fonnteApiToken = env('FONNTE_API_TOKEN'); 

        if (!$fonnteApiToken) {
            Log::error('Gagal mengirim WhatsApp: FONNTE_API_TOKEN tidak ditemukan di .env.');
            return false;
        }

        if (!$target) {
            Log::error('Gagal mengirim WhatsApp: Nomor telepon target kosong.');
            return false;
        }

        $target = preg_replace('/^08/', '628', $target); 
        $target = preg_replace('/^\+62/', '62', $target);

        try {
            // Tambahkan .withoutVerifying() sebelum .post()
            $response = Http::withHeaders([
                'Authorization' => $fonnteApiToken,
            ])
            ->withoutVerifying() // <--- INI SOLUSI UNTUK SSL DI HOSTINGER
            ->post($this->fonnteBaseUrl, [
                'target' => $target,
                'message' => $message,
            ]);

            $responseData = $response->json();

            if ($response->successful() && isset($responseData['status']) && ($responseData['status'] == 'success' || $responseData['status'] == true)) {
                Log::info('WhatsApp terkirim sukses.', ['target' => $target, 'response' => $responseData]);
                return true;
            }

            Log::error('Gagal mengirim WhatsApp via Fonnte:', [
                'target' => $target,
                'response_status' => $response->status(),
                'response_body' => $responseData
            ]);

            return false;
            
        } catch (\Exception $e) {
            Log::error('Kesalahan koneksi saat mengirim WhatsApp:', [
                'target' => $target,
                'error' => $e->getMessage()
            ]);
            return false;
        }
    }
}