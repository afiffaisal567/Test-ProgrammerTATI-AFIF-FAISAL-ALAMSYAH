<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $kepala = User::create([
            'name' => 'Kepala Dinas',
            'email' => 'kepala@example.com',
            'password' => Hash::make('password'),
            'role' => 'kepala_dinas',
        ]);

        $kabid1 = User::create([
            'name' => 'Kabid 1',
            'email' => 'kabid1@example.com',
            'password' => Hash::make('password'),
            'role' => 'kepala_bidang',
            'atasan_id' => $kepala->id,
        ]);

        $kabid2 = User::create([
            'name' => 'Kabid 2',
            'email' => 'kabid2@example.com',
            'password' => Hash::make('password'),
            'role' => 'kepala_bidang',
            'atasan_id' => $kepala->id,
        ]);

        User::create([
            'name' => 'Staf 1',
            'email' => 'staf1@example.com',
            'password' => Hash::make('password'),
            'role' => 'staf',
            'atasan_id' => $kabid1->id,
        ]);

        User::create([
            'name' => 'Staf 2',
            'email' => 'staf2@example.com',
            'password' => Hash::make('password'),
            'role' => 'staf',
            'atasan_id' => $kabid2->id,
        ]);
    }
}
