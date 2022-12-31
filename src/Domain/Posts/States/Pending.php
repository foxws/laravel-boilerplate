<?php

namespace Domain\Posts\States;

class Pending extends PostState
{
    public function color(): string
    {
        return 'orange';
    }
}
