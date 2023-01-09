<?php

namespace Domain\Posts\Enums;

use Spatie\Enum\Laravel\Enum;

/**
 * @method static self audio()
 * @method static self ebook()
 * @method static self video()
 */
class PostType extends Enum
{
    protected static function labels(): array
    {
        return [
            'audio' => __('Audio'),
            'ebook' => __('Ebook'),
            'video' => __('Video'),
        ];
    }
}
