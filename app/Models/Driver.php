<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'password',
        'Photo',
        'phoneNumber',
        'idPicture',
        'address',
        'idNumber',
        'gender',
        'carPicture',
        'model',
        'drivingLicense',
        'criminalRecord',
    ];
    public function rides(){
        return $this->hasMany(Ride::class , 'driver_id');
    }
}
