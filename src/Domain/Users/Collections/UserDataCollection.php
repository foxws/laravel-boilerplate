<?php

namespace Domain\Users\Collections;

use Domain\Users\DataObjects\UserData;
use Domain\Users\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserDataCollection extends Collection
{
    public function dataCollection(): self
    {
        return $this->map(fn (User $model) => UserData::fromModel($model));
    }
}
