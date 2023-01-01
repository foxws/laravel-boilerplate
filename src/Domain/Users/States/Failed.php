<?php

namespace Domain\Users\States;

class Failed extends UserState
{
    public function color(): string
    {
        return 'red';
    }
}
