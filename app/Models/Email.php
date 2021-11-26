<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    protected $fillable = ['address', 'subject', 'message'];

    public function user() {
        return $this->belongsTo('App\User');
    }
}
