<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // la convencion para hacer relaciones en este caso para nombrar a la funcion se hace en singular
    // ya que un POST puede tener 1 user
    //para llamar a la relacion en tinker debemos hacerlo con el nombre de esta clase
    public function user () 
    {
        return $this->belongsTo(User::class);
    }
    
}
