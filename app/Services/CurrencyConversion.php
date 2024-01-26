<?php

namespace App\Services;

use App\Models\Currency;

class CurrencyConversion
{
    public static function convert($sum)
    {
        $code = session('currency');
        $current = Currency::where('code', $code)->firstOrFail();
        $targetSum = $sum / $current->rate;
        return  round($targetSum, 2);
    }

    public static function getCurrencySymbol()
    {
        $current = Currency::where('code', session('currency'))->value('symbol');
         return    $current;
    }
}
