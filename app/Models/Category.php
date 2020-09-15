<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function getPathAttribute() {
        return asset("api/category/$this->slug");
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
