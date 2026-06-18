<?php

namespace App\Shared\Traits;

use App\Shared\Enums\SharedStatusEnum;

trait SharedHasStatusTrait
{
    /**
     * Scope a query to only include active models.
     */
    public function scopeActive($query)
    {
        return $query->where('status', SharedStatusEnum::ACTIVE->value);
    }

    /**
     * Scope a query to only include inactive models.
     */
    public function scopeInactive($query)
    {
        return $query->where('status', SharedStatusEnum::INACTIVE->value);
    }

    /**
     * Check if the model is active.
     */
    public function isActive(): bool
    {
        return $this->status === SharedStatusEnum::ACTIVE->value;
    }
}
