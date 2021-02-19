<?php

namespace App;

use ...

/*
 * What do you think about this model?
 * */

class Product extends Model
{
    protected $price;

    /* ... */

    public function getPriceAttribute($value): ?float
    {
        if (!$this->price) {
            $this->price = app(PriceManipulationService::class)->forProduct($this)->manipulate();
        }
        return $this->price;
    }

    public function getShowPriceAttribute($value): ?float
    {
        return (float)$this->getAttribute('price');
    }

    public function getFinalPriceAttribute($value): ?float
    {
        $price = $this->getPriceAttribute($this->price);
        $price = (float)round(app(PriceManipulationService::class)->makeCostWithCharges($price), 2);
        if (app_setting(Settings::ORDER_VAT_ENABLE) && !$this->vat_applicable) {
            $vat = app_setting(Settings::ORDER_VAT_FEE);
            $difference = $this->price - $this->cost;
            if ($difference > 0) {
                $price += $difference * ($vat / 100);
            }
        }
        return round($price, 2);
    }

    /* ... */
}