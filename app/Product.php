<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    /**
     * Cast price attributes to cents.
     *
     * @param $value
     *
     * @return float|int
     */
    public function setPriceAttribute($value)
    {
        return $this->attributes['price'] = $value * 100;
    }

    /**
     * Convert price back to cents
     *
     * @param $value
     *
     * @return float|int
     */
    public function getPriceAttribute($value)
    {
        return number_format($value / 100,'2');
    }
}
