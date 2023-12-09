<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ride extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'status',
        'Date',
        'StartTime',
        'EndTime',
        'Rate',
        'price',
    ];
    public function users(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function drivers(){
        return $this->belongsTo(Driver::class,'driver_id');
    }
}
