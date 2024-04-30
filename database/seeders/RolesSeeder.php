<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            "name" => "Superadmin",
            "menu" => json_encode(["roles","users","dashboards","devices","autoreplys","riwayat-pesan","blast-pesan","pesan-satuan"])
        ]);
    }
}
