<?php

class Attribute extends Cartalyst\Attributes\Attribute {

	protected $fillable = array(
		'name',
		'slug',
		'type',
		'options',
	);

	public function getOptionsAttribute($options)
	{
		return ! empty($options) ? json_decode($options, true) : [];
	}

	public function setOptionsAttribute($options)
	{
		$this->attributes['options'] = ! empty($options) ? json_encode($options) : null;
	}

}
