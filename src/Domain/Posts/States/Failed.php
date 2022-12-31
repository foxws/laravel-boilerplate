<?php

namespace Domain\Posts\States;

class Failed extends PostState
{
    public function color(): string
    {
        return 'red';
    }
}
