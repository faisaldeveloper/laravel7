<?php

namespace App\Repositories;

use App\Models\Album;
use App\Repositories\BaseRepository;

/**
 * Class AlbumRepository
 * @package App\Repositories
 * @version September 26, 2020, 3:42 pm UTC
*/

class AlbumRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'album_name',
        'album_description'
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
        return Album::class;
    }
}
