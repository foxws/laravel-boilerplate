<?php

namespace Domain\Users\States;

use Spatie\ModelStates\State;
use Spatie\ModelStates\StateConfig;

abstract class UserState extends State
{
    abstract public function color(): string;

    public static function config(): StateConfig
    {
        return parent::config()
            ->default(Pending::class)
            ->allowTransition(Pending::class, Verified::class)
            ->allowTransition(Pending::class, Failed::class)
        ;
    }
}
