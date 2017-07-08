<?php

namespace App\Models;

use App\Traits\UuidModelTrait;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use UuidModelTrait;

   protected $fillable = [
  'id','name', 'is_active', 'order',
  ];
  protected $casts = [
        'id'    => 'string',
        'name'    => 'string',
    ];

   public function adverts()
    {
        return $this->hasMany('App\Models\Advert');
        
    }


}
