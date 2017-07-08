<?php

namespace App\Models;

use App\Traits\UuidModelTrait;
use Illuminate\Database\Eloquent\Model;

class Advert extends Model
{
    use UuidModelTrait;

   protected $fillable = [
  'id','number', 'title', 'author', 'description', 'category_id', 'is_active',
  ];

   public function category()
    {
        return $this->belongsTo('App\Models\Category');
        
    }
}
