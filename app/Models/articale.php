<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class articale extends Model
{
    /** @use HasFactory<\Database\Factories\ArticaleFactory> */
    use HasFactory;
    protected $fillable=['name','description','category_id'];
    public function categories(){
        return $this->hasMany(articale::class,'category_id');
    }
}
