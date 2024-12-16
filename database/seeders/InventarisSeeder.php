<?php

namespace Database\Seeders;

use App\Models\Inventaris;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InventarisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Inventaris::create([
            'nama_barang' => 'panci',
            'category_id' => 1,
            'jumlah' => 15,
            'baik' => 14,
            'rusak' => 1
        ]);
    }
}
