<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{

    protected $fillable = ['name'];

    /**
     * @return HasMany
     */
    public function mobiles() : HasMany
    {
    	return $this->hasMany(Mobile::class);
    }
}
