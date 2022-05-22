<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZombieReport extends Model
{
    use HasFactory;
    protected $fillable = ['infected_survivor_id','survivor_id'];
}
