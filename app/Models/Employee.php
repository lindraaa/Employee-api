<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        "name",
        "email",
        "phone_number",
    ];
    public function service_record(){
        return $this->hasMany(ServiceRecord::class);
    }
}
