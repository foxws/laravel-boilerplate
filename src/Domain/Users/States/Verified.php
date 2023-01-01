<?php

namespace Domain\Users\States;

class Verified extends UserState
{
    public function color(): string
    {
        return 'green';
    }
}
