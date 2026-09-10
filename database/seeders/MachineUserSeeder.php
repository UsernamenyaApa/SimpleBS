<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class MachineUserSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(['email' => 'mesin@gitera.com'], [
            'name' => 'Mesin Pelayanan Desa',
            'password' => Hash::make('mesin123'),
            'role' => 'mesin',
            'status' => 'approved',
            'nik' => '0000000000000001',
            'no_hp' => null,
            'email_verified_at' => now(),
        ]);
    }
}
