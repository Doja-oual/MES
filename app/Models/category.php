<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class category extends Model
{

use HasFactory;
   protected $fillable=['name'];
   public function articales(){
    return $this->hasMany(category::class);
   }
}
