<?php

namespace App\Features\LinkManagement\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['name', 'slug', 'is_enabled'])]
class LinkManagementFeatureModel extends Model
{
    protected $table = 'link_management_features';

    protected $casts = [
        'is_enabled' => 'boolean',
    ];
}
