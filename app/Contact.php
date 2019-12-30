<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Contact extends Model
{
    protected $guarded = [];
    protected $dates = ['birthday'];

    public function path()
    {
        return '/contacts' . $this->id;
    }

    public function setBirthdayAttribute($birthday)
    {
        $this->attributes['birthday'] = Carbon::parse($birthday);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
