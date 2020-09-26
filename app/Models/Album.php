<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    //const CREATED_AT = 'created_at';
    //const UPDATED_AT = 'updated_at';

    public $fillable = [
        'album_name',
        'album_description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'album_name' => 'string',
        'album_description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'album_name' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function Photo()
    {
        return $this->hasMany(\App\Models\Photo::class, 'album_id');
    }


}
