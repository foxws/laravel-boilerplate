<?php

namespace Domain\Users\Concerns;

use Domain\Users\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait HasUser
{
    public static function bootHasUser()
    {
        static::creating(function (Model $model) {
            if (empty($model->user_id)) {
                $model->user_id = auth()->user()?->id;
            }
        });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
