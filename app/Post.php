<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = ['title'];

    public function photos()
    {
        return $this->morphMany('App\Photo', 'imageable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Relations\MorphMany[]
     */
    public function photoNames()
    {
        return $this->morphMany('App\Photo', 'imageable')->select('filename')->get();
    }

    public function jsonSerialize()
    {
        return [
            'title' => $this->title,
            'model_type' => 'Post'
        ];
    }
}
