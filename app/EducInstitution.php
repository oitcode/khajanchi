<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EducInstitution extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'educ_institution';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'educ_institution_id';

    protected $fillable = [
         'name', 'country', 'institution_type', 'creator_id',
    ];


    /*-------------------------------------------------------------------------
     * Relationships
     *-------------------------------------------------------------------------
     *
     */

    /*
     * users table.
     *
     */
    public function creator()
    {
        return $this->belongsTo('App\User', 'creator_id', 'id');
    }
}
