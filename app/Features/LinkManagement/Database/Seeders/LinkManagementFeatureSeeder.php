<?php

namespace App\Features\LinkManagement\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Features\LinkManagement\Models\LinkManagementFeatureModel;

class LinkManagementFeatureSeeder extends Seeder
{
    public function run(): void
    {
        $features = [
            'Short URL Creation', 'Bulk Link Creation', 'Bulk CSV Import', 'Bulk CSV Export',
            'Folder Organization', 'Nested Folders', 'Workspaces', 'Teams', 'Projects',
            'Link Collections', 'Link Templates', 'Link Presets', 'Link Duplication',
            'Link Cloning', 'Link Archive', 'Link Restore', 'Soft Delete', 'Permanent Delete',
            'Link Version History', 'Link Notes', 'Internal Tags', 'Public Tags',
            'Favorite Links', 'Recent Links', 'Link Search', 'Advanced Filters',
            'Custom Slugs', 'Reserved Slugs', 'Random Slugs', 'AI-style Smart Slugs',
            'Vanity URLs', 'Expiring Links', 'Password Protected Links', 'Hidden Links',
            'Draft Links', 'Scheduled Activation', 'Scheduled Deactivation',
            'Link Ownership Transfer', 'Link Merge', 'Link Split', 'Link Lifecycle Tracking',
            'Multi Destination Links', 'Backup Links', 'Emergency Links', 'Redirect Preview',
            'Metadata Storage', 'Custom Fields', 'Dynamic Variables', 'Link Relationships',
            'Link Dependency Mapping'
        ];

        foreach ($features as $featureName) {
            LinkManagementFeatureModel::firstOrCreate(
                ['slug' => Str::slug($featureName)],
                [
                    'name' => $featureName,
                    'is_enabled' => true,
                ]
            );
        }
    }
}
