<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Album
 * @package App\Models
 * @version September 26, 2020, 3:42 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $photos
 * @property string $album_name
 * @property string $album_description
 */
class Album extends Model
{
    use SoftDeletes;

    public $table = 'albums';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



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
        'album_name' => 'required|string|max:255',
        'album_description' => 'nullable|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function photos()
    {
        return $this->hasMany(\App\Models\Photo::class, 'album_id');
    }
}
