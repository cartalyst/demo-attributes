<?php

class AttributesTableSeeder extends Seeder {
	public function run()
	{
		DB::table('attributes')->delete();
		DB::table('attribute_values')->delete();

		Attribute::create(
			array(
				'name' => 'Symptoms',
				'slug' => 'symptoms',
				'type' => 'checkbox',
				'options' => [
					'cough' => 'Cough',
					'slime' => 'Slime',
					'fever' => 'Fever',
				]
			)
		);

		Attribute::create(
			array(
				'name' => 'Age Group',
				'slug' => 'age-group',
				'type' => 'select',
				'options' => [
					'young' => '0 - 17',
					'adult' => '18 - 59',
					'old' => '60 - 100',
				]
			)
		);

		Attribute::create(
			array(
				'name' => 'Phone Number',
				'slug' => 'phone-number',
				'type' => 'text',
			)
		);

		Attribute::create(
			array(
				'name' => 'Address',
				'slug' => 'address',
				'type' => 'textarea',
			)
		);

	}
}
