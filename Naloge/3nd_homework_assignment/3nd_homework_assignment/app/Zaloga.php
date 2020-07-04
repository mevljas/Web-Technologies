<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $Id_Zaloga
 * @property string $Ime
 * @property int $Kolicina
 * @property int $Id_Dobava
 * @property Dobava $dobava
 */
class Zaloga extends Model
{
    public $timestamps = false;
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'Zaloga';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'Id_Zaloga';

    /**
     * @var array
     */
    protected $fillable = ['Ime', 'Kolicina', 'Id_Dobava'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function dobava()
    {
        return $this->belongsTo('App\Dobava', 'Id_Dobava', 'Id_Dobava');
    }
}
