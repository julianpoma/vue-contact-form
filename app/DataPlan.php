<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataPlan extends Model
{
    protected $fillable = ['name', 'price', 'setup_price'];

    public static $columns = ['Nombre', 'Precio', 'Instalación'];
}