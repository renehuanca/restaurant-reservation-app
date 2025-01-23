<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = ['first_name', 'last_name', 'email', 'phone', 'to_date', 'guest_number', 'table_id'];

    public function table()
    {
        return $this->belongsTo(Table::class);
    }
}
