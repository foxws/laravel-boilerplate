<?php

namespace Domain\Media\States;

class Failed extends MediaState
{
    public function color(): string
    {
        return 'red';
    }
}
