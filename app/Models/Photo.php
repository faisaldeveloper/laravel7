<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    public $fillable = [
        'photo_name',
        'photo_description',
        'photo_path',
        'album_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'photo_name' => 'string',
        'photo_description' => 'string',
        'photo_path' => 'string',
        'album_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'photo_name' => 'required',
        'photo_description' => 'required',
        'photo_path' => 'required',
        'album_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function Album()
    {
        return $this->belongsTo(\App\Models\Album::class, 'id');
    }
}
