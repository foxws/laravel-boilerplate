<?php

namespace Domain\Users\States;

class Pending extends UserState
{
    public function color(): string
    {
        return 'orange';
    }
}
