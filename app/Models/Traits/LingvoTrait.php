<?php

namespace App\Models\Traits;

use Illuminate\Support\Facades\App;

/**
 * Get name from table categories according currnt locale
 */
trait LingvoTrait
{
    /**
     * @param string $originFieldName
     * @return string
     */
    public function lingvo($originFieldName)
    {
        $locale = App::currentLocale();
        if ($locale === 'ru') {
            $fieldName = $originFieldName . '_ru';
        } else {
            $fieldName = $originFieldName . '_ua';
        };
        return $this->$fieldName;
    }
}
