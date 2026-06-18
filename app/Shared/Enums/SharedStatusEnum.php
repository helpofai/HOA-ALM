<?php

namespace App\Shared\Enums;

enum SharedStatusEnum: string
{
    case ACTIVE = 'active';
    case INACTIVE = 'inactive';
    case PENDING = 'pending';
    case ARCHIVED = 'archived';
    case DELETED = 'deleted';
    case BLOCKED = 'blocked';
}
