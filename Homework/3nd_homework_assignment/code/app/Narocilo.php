<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $Id_Narocilo
 * @property int $Id_Miza
 * @property string $Skupina
 * @property int $Kolicina
 * @property string $Namen
 * @property string $Datum
 * @property int $Id_Natakar
 * @property int $Id_Jedilnik
 * @property int $Id_Stranka
 * @property User $user
 * @property Jedilnik $jedilnik
 * @property Stranka $stranka
 */
class Narocilo extends Model
{
    public $timestamps = false;
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'Narocilo';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'Id_Narocilo';

    /**
     * @var array
     */
    protected $fillable = ['Id_Miza', 'Skupina', 'Kolicina', 'Namen', 'Datum', 'Id_Natakar', 'Id_Jedilnik', 'Id_Stranka'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'Id_Natakar');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function jedilnik()
    {
        return $this->belongsTo('App\Jedilnik', 'Id_Jedilnik', 'Id_Jedilnik');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function stranka()
    {
        return $this->belongsTo('App\Stranka', 'Id_Stranka', 'Id_Stranka');
    }
}
