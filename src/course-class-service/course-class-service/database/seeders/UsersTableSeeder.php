<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run(): void
	{
		$users = [
			[
				'id' => 1,
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'id' => 2,
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
		];

		foreach ($users as $user) {
			DB::table('user')->insert($user);
		}
	}
}
