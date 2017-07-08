<?php
namespace App\Traits;

use Webpatser\Uuid\Uuid;

trait UuidModelTrait
{
    public function getIncrementing()
    {
        return false;
    }

    public static function bootUuidModelTrait()
    {
        static::creating(function ($model) {
            $model->incrementing = false;
            $uuidVersion = (!empty($model->uuidVersion) ? $model->uuidVersion : 4);
            $uuid = Uuid::generate($uuidVersion);
            $model->attributes[$model->getKeyName()] = $uuid->string;
        }, 0);
    }
}