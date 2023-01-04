<?php

namespace Domain\Tags\States;

class Pending extends TagState
{
    public function color(): string
    {
        return 'orange';
    }
}
