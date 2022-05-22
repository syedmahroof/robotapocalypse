<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survivor extends Model
{
    use HasFactory;

    protected $fillable = ['name','age','gender','latitude','longitude','infected_report_count','infected_status'];

    public function inventory()
    {
        return $this->hasMany('App\Models\Inventory');
    }

    public function zombie_report()
    {
        return $this->hasMany('App\Models\ZombieReport');
    }
}
