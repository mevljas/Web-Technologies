<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $Id_Stranka
 * @property string $Ime
 * @property string $Priimek
 * @property string $Naslov
 * @property string $Kraj
 * @property string $email
 * @property Popust[] $popusts
 * @property Narocilo[] $narocilos
 */
class Stranka extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'Stranka';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'Id_Stranka';

    /**
     * @var array
     */
    protected $fillable = ['Ime', 'Priimek', 'Naslov', 'Kraj', 'email'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function popusts()
    {
        return $this->belongsToMany('App\Popust', 'Ima', 'Id_Stranka', 'Id_Popust');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function narocilos()
    {
        return $this->hasMany('App\Narocilo', 'Id_Stranka', 'Id_Stranka');
    }
}
