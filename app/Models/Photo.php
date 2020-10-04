<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Photo
 * @package App\Models
 * @version September 26, 2020, 3:42 pm UTC
 *
 * @property \App\Models\Album $album
 * @property string $photo_name
 * @property string $photo_description
 * @property string $photo_path
 * @property integer $album_id
 */
class Photo extends Model
{
    use SoftDeletes;

    public $table = 'photos';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



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

    public function setPhotoNameAttribute($photo_name)
    {
        $this->attributes['photo_name'] = $photo_name;
    }

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'photo_name' => 'required|string|max:255',
        'photo_description' => 'nullable|string|max:255',
        //'photo_path' => 'required|string|max:255',
        'photo_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'album_id' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function album()
    {
        return $this->belongsTo(\App\Models\Album::class, 'album_id');
    }
}
