<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\UuidModelTrait;

class AdvertPhoto extends Model
{
    use UuidModelTrait;

   protected $fillable = ['id','title','advert_id',];

    public function advert()
    {
        return $this->belongsTo('App\Models\Advert');
        
    }

}
