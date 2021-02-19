<?php

namespace App\Observers;

use ...

class ProductObserver
{
    protected $chargesService;

    public function __construct(OrderChargesService $chargesService)
    {
        $this->chargesService = $chargesService;
    }

    /*
        Any thoughts on this?
    */
    public function saving(Product $plate) : void
    {
        if (request()->has('perspexNumberProductsConfiguration')) {
            $oldOptionsTotal = array_sum(array_column(array_values($plate->options ?? []), 'total'));
            $perspexNumberProductsConfiguration = request()->get('perspexNumberProductsConfiguration');
            $options = $this->chargesService->makePerspexNumberProductsConfiguration($perspexNumberProductsConfiguration);
            $optionsTotal = array_sum(array_column(array_values($options), 'total'));
            $plate->options = $options;
            $optionsTotalDifference = $optionsTotal - $oldOptionsTotal;
            $plate->total += $optionsTotalDifference;
            unset($plate->perspexNumberProductsConfiguration);
        }
    }
}