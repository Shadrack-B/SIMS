<?php

namespace App\Repositories;

use App\Models\Semester;
use App\Repositories\BaseRepository;

/**
 * Class SemesterRepository
 * @package App\Repositories
 * @version February 10, 2020, 7:57 pm UTC
*/

class SemesterRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'semester_name',
        'semester_duration',
        'semester_code',
        'semester_description'
    ];
    protected $primaryKey = 'semester_id';

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
        return Semester::class;
    }
}
