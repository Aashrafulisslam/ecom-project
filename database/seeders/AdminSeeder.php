<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRecords = [
            [
                'id'        => 1,
                'name'      => 'Super Admin',
                'type'      => 'superAdmin',
                'vendor_id' => 0,
                'mobile'    => '54545454',
                'email'     => 'admin@gmail.com',
                'password'  =>bcrypt('password'),
                'status'    => '1'

            ],
        ];
        Admin::insert($adminRecords);
    }
}
