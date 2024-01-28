<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Photos;

class Products extends Model
{
    use HasFactory;
    public function photo(){
        return $this->hasOne(Photos::class,'product_id');
    }
}
