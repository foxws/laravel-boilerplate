<?php

namespace Domain\Media\States;

class Pending extends MediaState
{
    public function color(): string
    {
        return 'orange';
    }
}
