<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    function produtos(){
        return $this->HasMany('App\Produto');
    }
}
