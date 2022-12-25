<?php

namespace App\Domain\Users\DataObjects;

use App\Domain\Users\Models\User;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Lazy;

class UserData extends Data
{
    public function __construct(
        public string $id,
        public Lazy|string $email,
        public Lazy|string $password,
        public Lazy|string $name,
    ) {
    }

    public static function fromModel(User $model): self
    {
        return new self(
            id: $model->getRouteKey(),
            email: Lazy::create(fn () => $model->email),
            password: Lazy::create(fn () => $model->password),
            name: Lazy::create(fn () => $model->name),
        );
    }

    public static function authorize(): bool
    {
        return true;
    }

    public static function rules(): array
    {
        return [
            //
        ];
    }
}
