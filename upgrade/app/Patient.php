<?php

use Cartalyst\Attributes\Entity;

class Patient extends Entity {

	protected $guarded = array(
		'id',
		'created_at',
		'updated_at',
	);

}
