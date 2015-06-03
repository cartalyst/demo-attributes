<?php namespace App;

use Cartalyst\Attributes\EntityInterface;
use Cartalyst\Attributes\EntityTrait;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model implements EntityInterface {

    use EntityTrait;

	protected $guarded = array(
		'id',
		'created_at',
		'updated_at',
	);

}
