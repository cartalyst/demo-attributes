# Setup a patients record management app with [Cartalyst Attributes](http://cartalyst.com/manual/attributes)

> **Note:** This app requires Cartalyst's Attributes package, you need to have a valid Cartalyst.com subscription to install it. Click [here](https://www.cartalyst.com/pricing) to obtain your subscription.

## Download Laravel

`git clone https://github.com/laravel/laravel.git demo-attributes && cd demo-attributes`

## Add The Attributes Package Dependency

Add cartalyst's Repository to your `composer.json` file

	"repositories": [
		{
			"type": "composer",
			"url": "http://packages.cartalyst.com"
		}
	],

Require the attributes package

	"require": {
		"laravel/framework": "4.1.*",
		"cartalyst/attributes": "1.0.*"
	},

Run `composer install`

## Database Migrations

Setup and run database migrations

### Setup Database Migrations

We will setup two migrations

- Patients Table Migration

run `php artisan migrate:make create_patients_table --create patients`

Navigate to the new migration and make sure your up method matches the following

[`app/database/migrations/2013_12_13_014448_create_patients_table.php`](https://github.com/cartalyst/demo-attributes/blob/master/app/database/migrations/2013_12_13_014448_create_patients_table.php)

- Alter attributes table to allow for custom attribute types

run `php artisan migrate:make alter_attributes_table --table=attributes`

Navigate to the new migration and make sure it matches the following

[`app/database/migrations/2013_12_13_033542_alter_attributes_table.php`](https://github.com/cartalyst/demo-attributes/blob/master/app/database/migrations/2013_12_13_033542_alter_attributes_table.php)

### Run your migrations

- Migrate the attributes package

	`php artisan migrate --package=cartalyst/attributes`

- Migrate your newly generated migrations

	`php artisan migrate`

## Routes `app/routes.php`

	Route::get('/', function()
	{
		return View::make('home');
	});

	Route::resource('patients', 'PatientsController');
	Route::resource('attributes', 'AttributesController');
	Route::get('attributes/{id}/delete', 'AttributesController@destroy');

## Models

The Patient model must extend `Cartalyst\Attributes\Entity`

- Patient Model [`app/Models/Patient.php`](https://github.com/cartalyst/demo-attributes/blob/master/app/models/Patient.php)

We will create a new Attribute model that extends The default Attribute model to define the type and options as well as an accessor and mutator for the options field that handles json encoding and decoding.

- Attribute Model [`app/Models/Attribute.php`](https://github.com/cartalyst/demo-attributes/blob/master/app/models/Attribute.php)

## Controllers

- Attributes Controller [`app/controllers/AttributesController.php`](https://github.com/cartalyst/demo-attributes/blob/master/app/controllers/AttributesController.php)

- Patients Controller [`app/controllers/PatientsController.php`](https://github.com/cartalyst/demo-attributes/blob/master/app/controllers/PatientsController.php)

## Views

- Home View

	- [`app/views/home.blade.php`](https://github.com/cartalyst/demo-attributes/blob/master/app/views/home.blade.php)

- Layout View

	- [`app/views/layouts/default.blade.php`](https://github.com/cartalyst/demo-attributes/blob/master/app/views/layouts/default.blade.php)

- Patient Views

	- [`app/views/patients/index.blade.php`](https://github.com/cartalyst/demo-attributes/blob/master/app/views/patients/index.blade.php)

	- [`app/views/patients/show.blade.php`](https://github.com/cartalyst/demo-attributes/blob/master/app/views/patients/show.blade.php)

	- [`app/views/patients/create.blade.php`](https://github.com/cartalyst/demo-attributes/blob/master/app/views/patients/create.blade.php)

	- [`app/views/patients/edit.blade.php`](https://github.com/cartalyst/demo-attributes/blob/master/app/views/patients/edit.blade.php)

- Attributes Views

	- [`app/views/attributes/index.blade.php`](https://github.com/cartalyst/demo-attributes/blob/master/app/views/attributes/index.blade.php)

	- [`app/views/attributes/create.blade.php`](https://github.com/cartalyst/demo-attributes/blob/master/app/views/attributes/create.blade.php)
