<?php

namespace Domain\Tags\States;

class Verified extends TagState
{
    public function color(): string
    {
        return 'green';
    }
}
