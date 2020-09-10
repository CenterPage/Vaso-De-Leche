<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stablishment extends Model
{
    protected $guarded = [];

    public function category()
    {
    	return $this->belongsTo(Stablishment::class);
    }
}
