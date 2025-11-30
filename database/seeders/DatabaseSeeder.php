<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Karyawan;
use App\Models\Layanan;
use App\Models\Pesanan;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Admin Laundry',
            'email' => 'admin@laundry.com',
            'password' => bcrypt('password'),
            'role' => 'admin'
        ]);

        // Karyawan (user)
        for ($i=1; $i<=3; $i++) {
            $user = User::create([
                'name' => "Karyawan $i",
                'email' => "karyawan$i@laundry.com",
                'password' => bcrypt('password'),
                'role' => 'user'
            ]);

            Karyawan::create([
                'nama' => $user->name,
                'email' => $user->email,
                'telepon' => "0812345678$i"
            ]);
        }

        // Layanan
        $layanan1 = Layanan::create(['nama_layanan'=>'Cuci Kering','harga'=>10000]);
        $layanan2 = Layanan::create(['nama_layanan'=>'Cuci Setrika','harga'=>15000]);
        $layanan3 = Layanan::create(['nama_layanan'=>'Setrika Saja','harga'=>8000]);

        // Pesanan dummy
        Pesanan::create([
            'user_id'=>2, // karyawan 1
            'layanan_id'=>$layanan1->id,
            'nama_pelanggan'=>'Budi',
            'jumlah'=>3,
            'total_harga'=>$layanan1->harga*3,
            'status'=>'pending'
        ]);

        Pesanan::create([
            'user_id'=>3, // karyawan 2
            'layanan_id'=>$layanan2->id,
            'nama_pelanggan'=>'Ani',
            'jumlah'=>2,
            'total_harga'=>$layanan2->harga*2,
            'status'=>'proses'
        ]);
    }
}
