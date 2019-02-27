<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = ['name', 'category'];

    public function photos()
    {
        return $this->morphMany('App\Photo', 'imageable');
    }

    public function jsonSerialize()
    {
        return [
            'name' => $this->name,
            'category' => $this->category,
            'model_type' => 'Product'
        ];
    }
}
