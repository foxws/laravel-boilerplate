<?php

namespace Domain\Users\DataObjects;

use Domain\Shared\Support\Casts\PrefixedIdCast;
use Domain\Users\Models\User;
use Domain\Users\Rules\UserExists;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Lazy;

class UserData extends Data
{
    public function __construct(
        #[WithCast(PrefixedIdCast::class)]
        public string $id,
        public Lazy|string $email,
        public Lazy|string $password,
        public Lazy|string $name,
        public Lazy|Carbon|null $email_verified_at,
        public Lazy|Carbon $created_at,
        public Lazy|Carbon $updated_at,
    ) {
    }

    public static function fromModel(User $model): self
    {
        return new self(
            id: $model->getRouteKey(),
            email: Lazy::create(fn () => $model->email),
            password: Lazy::create(fn () => $model->password),
            name: Lazy::create(fn () => $model->name),
            email_verified_at: Lazy::create(fn () => $model->email_verified_at),
            created_at: Lazy::create(fn () => $model->created_at),
            updated_at: Lazy::create(fn () => $model->updated_at),
        );
    }

    public static function authorize(): bool
    {
        return true;
    }

    public static function rules(array $payload = []): array
    {
        return [
            'id' => ['required', 'string', new UserExists()],
            'email' => ['sometimes', 'email', 'max:255', Rule::unique('users')->ignore($payload['id'])],
            'password' => ['sometimes', 'password'],
            'name' => ['sometimes', 'string', 'max:255'],
        ];
    }
}
