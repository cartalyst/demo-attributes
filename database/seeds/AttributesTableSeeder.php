<?php

use App\Attribute;
use Illuminate\Database\Seeder;

class AttributesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('attributes')->delete();
        DB::table('attribute_values')->delete();

        Attribute::create(
            [
                'name'    => 'Symptoms',
                'slug'    => 'symptoms',
                'type'    => 'checkbox',
                'options' => [
                    'cough' => 'Cough',
                    'slime' => 'Slime',
                    'fever' => 'Fever',
                ],
            ]
        );

        Attribute::create(
            [
                'name'    => 'Age Group',
                'slug'    => 'age-group',
                'type'    => 'select',
                'options' => [
                    'young' => '0 - 17',
                    'adult' => '18 - 59',
                    'old'   => '60 - 100',
                ],
            ]
        );

        Attribute::create(
            [
                'name' => 'Phone Number',
                'slug' => 'phone-number',
                'type' => 'text',
            ]
        );

        Attribute::create(
            [
                'name' => 'Address',
                'slug' => 'address',
                'type' => 'textarea',
            ]
        );
    }
}
