<?php

namespace App;

// Composer Autoload que gerencia a carga...
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    // Muda o nome se eu não definir a linha abaixo como padrão.   usaria o nome perfils   lower+s
    protected $table='perfis';
}
