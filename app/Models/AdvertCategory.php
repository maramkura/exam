<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\UuidModelTrait;

class AdvertCategory extends Model
{
    use UuidModelTrait;

    protected $fillable = ['advert_id', 'category_id',];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function advert()
    {
        return $this->belongsTo('App\Models\Posts');
    }

}
