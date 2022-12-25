<?php

namespace Domain\Users\Collections;

use Domain\Users\DataObjects\UserData;
use Illuminate\Database\Eloquent\Collection;
use Spatie\LaravelData\DataCollection;

class UserDataCollection extends Collection
{
    public function dataCollection(): DataCollection
    {
        return UserData::collection($this);
    }
}
