<?php

namespace Domain\Tags\States;

class Failed extends TagState
{
    public function color(): string
    {
        return 'red';
    }
}
