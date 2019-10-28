<?php

namespace App;

use Cartalyst\Attributes\EntityTrait;
use Illuminate\Database\Eloquent\Model;
use Cartalyst\Attributes\EntityInterface;

class Patient extends Model implements EntityInterface
{
    use EntityTrait;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];
}
