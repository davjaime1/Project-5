<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Model as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Menu extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type', 'image_text', 'image'
    ];
}
