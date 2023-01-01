<?php

namespace Domain\Media\States;

use Spatie\ModelStates\State;
use Spatie\ModelStates\StateConfig;

abstract class MediaState extends State
{
    abstract public function color(): string;

    public static function config(): StateConfig
    {
        return parent::config()
            ->default(Pending::class)
            ->allowTransition(Pending::class, Published::class)
            ->allowTransition(Pending::class, Failed::class);
    }
}
