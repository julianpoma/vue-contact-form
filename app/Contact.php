<?php

namespace App;

use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = ['name', 'dni', 'address', 'phone', 'phone2', 'email', 'notes', 'is_read', 'data_plan', 'address_detail'];

    public static $columns = ['Name', 'Address', 'Phone', 'Data plan', 'Date'];

    protected $dates = ['created_at'];

    public function getCreatedAtAttribute($date)
    {
        return Carbon::parse($date)->format('Y-m-d');
    }
}
