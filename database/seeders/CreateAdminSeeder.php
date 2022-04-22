<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CreateAdminsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = Hash::make('123456');
        $admin = [
            [
                'admin_name' => 'hieu',
                'admin_email' => 'admin@admin.com',
                'admin_password' => $password,
                'admin_phone' => '0123456789',
            ],
        ];

        DB::table('tbl_admin')->insert($admin);

    }
}
