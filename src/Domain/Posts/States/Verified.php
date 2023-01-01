<?php

namespace Domain\Posts\States;

class Verified extends PostState
{
    public function color(): string
    {
        return 'green';
    }
}
