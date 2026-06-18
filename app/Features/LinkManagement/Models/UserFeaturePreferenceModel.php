<?php

namespace App\Features\LinkManagement\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use App\Models\User;

#[Fillable(['user_id', 'feature_id', 'is_enabled'])]
class UserFeaturePreferenceModel extends Model
{
    protected $table = 'user_feature_preferences';

    protected $casts = [
        'is_enabled' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function feature()
    {
        return $this->belongsTo(LinkManagementFeatureModel::class, 'feature_id');
    }
}
