<?php

namespace App;

class Attribute extends \Cartalyst\Attributes\Attribute
{
    public $fillable = [
        'name',
        'slug',
        'type',
        'options',
    ];

    public function getOptionsAttribute($options)
    {
        return ! empty($options) ? json_decode($options, true) : [];
    }

    public function setOptionsAttribute($options)
    {
        $this->attributes['options'] = ! empty($options) ? json_encode($options) : null;
    }
}
