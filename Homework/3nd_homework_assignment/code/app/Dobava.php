<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $Id_Dobava
 * @property int $Kolicina
 * @property string $DatumDobave
 * @property int $Id_Dobavitelj
 * @property Dobavitelj $dobavitelj
 * @property Zaloga[] $zalogas
 */
class Dobava extends Model
{
    public $timestamps = false;
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'Dobava';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'Id_Dobava';

    /**
     * @var array
     */
    protected $fillable = ['Kolicina', 'DatumDobave', 'Id_Dobavitelj'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function dobavitelj()
    {
        return $this->belongsTo('App\Dobavitelj', 'Id_Dobavitelj', 'Id_Dobavitelj')-> orderBy('Ime', 'asc');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function zaloga()
    {
        return $this->hasMany('App\Zaloga', 'Id_Dobava', 'Id_Dobava')->orderBy('Ime', 'asc');
    }
}
