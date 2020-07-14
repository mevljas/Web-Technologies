<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $Id_Jedilnik
 * @property string $Ime
 * @property float $Cena
 * @property string $Vrsta
 * @property Narocilo[] $narocilos
 */
class Jedilnik extends Model
{
    public $timestamps = false;
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'Jedilnik';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'Id_Jedilnik';

    /**
     * @var array
     */
    protected $fillable = ['Ime', 'Cena', 'Vrsta'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function narocilos()
    {
        return $this->hasMany('App\Narocilo', 'Id_Jedilnik', 'Id_Jedilnik');
    }
}
