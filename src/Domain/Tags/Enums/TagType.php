<?php

namespace Domain\Tags\Enums;

use Spatie\Enum\Laravel\Enum;

/**
 * @method static self category()
 * @method static self label()
 * @method static self locale()
 */
class TagType extends Enum
{
    protected static function labels(): array
    {
        return [
            'category' => __('Category'),
            'label' => __('Label'),
            'locale' => __('Locale'),
        ];
    }
}
