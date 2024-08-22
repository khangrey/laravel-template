<?php

declare(strict_types=1);

namespace Modules\Dashboard\Traits;

use Illuminate\Database\Eloquent\Casts\Attribute;

trait HasAvatarMedia
{
    public function avatarUrl(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->hasMedia('avatar')
                ? $this->getFirstMedia('avatar')->getFullUrl()
                : $this->defaultAvatarUrl()
        );
    }

    public function thumbnailUrl(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->hasMedia('avatar')
                ? $this->getFirstMedia('avatar')
                    ->getFullUrl('thumbnail')
                : $this->defaultAvatarUrl()
        );
    }

    /**
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig
     */
    public function updateAvatar(string $key): void
    {
        $this->addMediaFromRequest($key)->toMediaCollection('avatar');
    }

    public function deleteAvatar(): void
    {
        $this->getFirstMedia('avatar')->delete();
    }

    protected function defaultAvatarUrl(): string
    {
        $name = trim(
            collect(explode(' ', $this->name))
                ->map(fn ($segment) => mb_substr($segment, 0, 1))
                ->join(' ')
        );

        return 'https://ui-avatars.com/api/?name=' .
            urlencode($name) .
            '&color=7F9CF5&background=EBF4FF';
    }
}
