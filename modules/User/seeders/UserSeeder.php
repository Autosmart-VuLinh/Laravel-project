<?php

namespace Modules\User\seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 'a'; $i <= 'z'; $i++) {
            DB::table('users')->insert([
                'name' => 'Nguyễn Văn ' . strtoupper($i),
                'email' => 'nguyenvan' . $i . '@gmail.com',
                'password' => Hash::make('12345678'),
                'group_id' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }
    }
}
