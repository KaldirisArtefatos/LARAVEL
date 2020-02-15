<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// Trocou de Model para User - Em busca e utilizar Autenticação


class Funcionarios extends User
{
    public function perfil(){
        return $this->belongsTo(Perfil::class);
    }

   public function user(){
       return $this->belongsTo(User::class);
   }

}
