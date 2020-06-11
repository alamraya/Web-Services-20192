<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'role_id' => 1,
                'name' => 'Dewi Wulan Sari',
                'email' => 'dewiws27@gmail.com',
                'avatar' => 'users/default.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$mGnwWT8cTQdNczcOdEnW.eJYg6BkXhEtyKbf5VXwALiNUuBTtDaCa',
                'remember_token' => NULL,
                'settings' => NULL,
                'created_at' => '2020-05-29 02:45:24',
                'updated_at' => '2020-05-29 03:45:41',
            ),
            1 => 
            array (
                'id' => 2,
                'role_id' => 1,
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'avatar' => 'users/default.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$dx8OtSgnkQeYmFDTp5Dq9uCJD10XII7Wd2KJi4OmSP./WGOMFNPUu',
                'remember_token' => NULL,
                'settings' => NULL,
                'created_at' => '2020-05-29 03:48:30',
                'updated_at' => '2020-05-29 03:48:30',
            ),
            2 => 
            array (
                'id' => 3,
                'role_id' => 3,
                'name' => 'seller 01',
                'email' => 'seller@seller.com',
                'avatar' => 'users/default.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$xvcphWFJFtzxDbO7dZRua.qLs8KJf9XWzNedxLenFTXnJtpXtgw/e',
                'remember_token' => NULL,
                'settings' => NULL,
                'created_at' => '2020-05-29 07:54:27',
                'updated_at' => '2020-05-29 07:54:27',
            ),
            3 => 
            array (
                'id' => 4,
                'role_id' => 3,
                'name' => 'seller 02',
                'email' => 'seller2@seller.com',
                'avatar' => 'users/default.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$CTVsvrWBu/mUX85W./KPt.ORhpsGtnRC6fb788e05kIvRd6M0Ymta',
                'remember_token' => NULL,
                'settings' => '{"locale":"en"}',
                'created_at' => '2020-05-29 07:55:12',
                'updated_at' => '2020-05-30 08:54:38',
            ),
            4 => 
            array (
                'id' => 5,
                'role_id' => 2,
                'name' => 'customer 01',
                'email' => 'customer1@customer.com',
                'avatar' => 'users/default.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$mfV.tKpynSypfJD2vnKFk.x0GbUAMu49ATFIBRPilqPStqRtluZDu',
                'remember_token' => NULL,
                'settings' => '{"locale":"en"}',
                'created_at' => '2020-05-30 08:54:01',
                'updated_at' => '2020-05-30 08:54:01',
            ),
        ));
        
        
    }
}