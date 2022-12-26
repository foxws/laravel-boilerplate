<?php

namespace Domain\Media\DataObjects;

use Domain\Media\Models\Media;
use Domain\Shared\Support\Casts\UuidCast;
use Illuminate\Support\Carbon;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Lazy;

class MediaData extends Data
{
    public function __construct(
        #[WithCast(UuidCast::class, class: Media::class)]
        public string $id,
        public Lazy|string $collection_name,
        public Lazy|string $name,
        public Lazy|string $file_name,
        public Lazy|string $mime_type,
        public Lazy|string $disk,
        public Lazy|string $conversions_disk,
        public Lazy|int $size,
        public Lazy|int $order_column,
        public Lazy|Carbon $created_at,
        public Lazy|Carbon $updated_at,
    ) {
    }

    public static function fromModel(Media $model): self
    {
        return new self(
            id: $model->getRouteKey(),
            collection_name: Lazy::create(fn () => $model->collection_name),
            name: Lazy::create(fn () => $model->name),
            file_name: Lazy::create(fn () => $model->file_name),
            mime_type: Lazy::create(fn () => $model->mime_type),
            disk: Lazy::create(fn () => $model->disk),
            conversions_disk: Lazy::create(fn () => $model->conversions_disk),
            size: Lazy::create(fn () => $model->size),
            order_column: Lazy::create(fn () => $model->order_column),
            created_at: Lazy::create(fn () => $model->created_at),
            updated_at: Lazy::create(fn () => $model->updated_at),
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
