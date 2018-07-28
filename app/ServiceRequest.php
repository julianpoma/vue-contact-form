<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceRequest extends Model
{
    protected $fillable = ['name', 'dni', 'address', 'phone', 'phone2', 'email', 'notes', 'check', 'data_plan', 'address_detail'];
}
