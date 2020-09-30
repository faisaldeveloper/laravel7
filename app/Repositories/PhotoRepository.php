<?php

namespace App\Repositories;

use App\Models\Photo;
use App\Repositories\BaseRepository;

/**
 * Class PhotoRepository
 * @package App\Repositories
 * @version September 26, 2020, 3:42 pm UTC
*/

class PhotoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'photo_name',
        'photo_description',
        'photo_path',
        'album_id'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Photo::class;
    }
}
