<?php

use App\Patient;
use Illuminate\Database\Seeder;

class PatientsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('patients')->delete();

        Patient::create(
            [
                'name'      => 'John Doe',
                'age'       => '16',
                'age-group' => '0-17',
                'symptoms' => ['Fever'],
            ]
        );

        Patient::create(
            [
                'name'      => 'Jane Doe',
                'age'       => '31',
                'age-group' => '18 - 59',
                'symptoms' => ['Cough', 'Fever'],
            ]
        );
    }
}
