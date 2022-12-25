<?php

namespace Domain\Users\Collections;

use Domain\Users\DataObjects\UserData;
use Domain\Users\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Spatie\LaravelData\DataCollection;

class UserDataCollection extends Collection
{
    public function dataCollection(): DataCollection
    {
        return UserData::collection(
            $this->map(fn (User $model) => UserData::fromModel($model))
        );
    }
}
