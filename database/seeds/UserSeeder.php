<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

		User::create([
			'nama' => 'Admin Laundry',
			'username' => 'admin',
			'password' => Hash::make('admin'),
			'outlet_id' => 1,
			'role' => 'admin',
		]);
    }
}
