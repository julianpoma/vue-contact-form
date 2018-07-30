<?php

namespace App;

use App\Helper\DataViewer;

use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class ServiceRequest extends Model
{
    protected $fillable = ['name', 'dni', 'address', 'phone', 'phone2', 'email', 'notes', 'check', 'data_plan', 'address_detail'];

    public static $columns = ['Nombre', 'Dirección', 'Teléfono', 'Plan', 'Fecha'];

    protected $dates = ['created_at'];

    public function getCreatedAtAttribute($date)
    {
        return Carbon::parse($date)->format('d-m-Y');
    }
}
