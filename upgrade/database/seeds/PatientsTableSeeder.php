<?php

class PatientsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('patients')->delete();

		Patient::create(
			array(
				'name' => 'John Doe',
				'age' => '42',
				'age-group' => '29 - 100',
			)
		);

		Patient::create(
			array(
				'name' => 'Jane Doe',
				'age' => '31',
				'age-group' => '18 - 28',
			)
		);

	}
}
