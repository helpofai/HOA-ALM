<?php

namespace App\Features\LinkManagement\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use App\Models\User;

#[Fillable([
    'user_id', 'destination_url', 'slug', 'domain', 
    'password', 'is_active', 'is_secure_gateway', 'expires_at'
])]
class LinkManagementLinkModel extends Model
{
    protected $table = 'link_management_links';

    protected $casts = [
        'is_active' => 'boolean',
        'is_secure_gateway' => 'boolean',
        'expires_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
