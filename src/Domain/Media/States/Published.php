<?php

namespace Domain\Media\States;

class Published extends MediaState
{
    public function color(): string
    {
        return 'green';
    }
}
