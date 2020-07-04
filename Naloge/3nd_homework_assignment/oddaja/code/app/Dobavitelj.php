<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $Id_Dobavitelj
 * @property string $Ime
 * @property Dobava[] $dobavas
 */
class Dobavitelj extends Model
{
    public $timestamps = false;
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'Dobavitelj';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'Id_Dobavitelj';

    /**
     * @var array
     */
    protected $fillable = ['Ime'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dobavas()
    {
        return $this->hasMany('App\Dobava', 'Id_Dobavitelj', 'Id_Dobavitelj');
    }
}
