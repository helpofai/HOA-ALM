@extends('themes.linkOne.dashboard')

@section('header-title', 'Create Advanced Link')

@section('sidebar-links')
    @if(Auth::user()->role === \App\Shared\Enums\SharedRoleEnum::ADMIN->value)
        <a href="{{ route('admin.dashboard') }}" data-navigate class="flex items-center gap-3 px-4 py-3 rounded-xl text-text-muted hover:bg-white/5 hover:text-text-main font-medium transition-all group overflow-hidden">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
            <span class="sidebar-text whitespace-nowrap opacity-100 transition-opacity duration-300">Admin Console</span>
        </a>
    @else
        <a href="{{ route('user.dashboard') }}" data-navigate class="flex items-center gap-3 px-4 py-3 rounded-xl text-text-muted hover:bg-white/5 hover:text-text-main font-medium transition-all group overflow-hidden">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
            <span class="sidebar-text whitespace-nowrap opacity-100 transition-opacity duration-300">Overview</span>
        </a>
    @endif
    
    <a href="#" data-navigate class="flex items-center gap-3 px-4 py-3 rounded-xl bg-primary-gradient text-white font-bold shadow-lg shadow-cyan-500/20 transition-all group overflow-hidden">
        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path></svg>
        <span class="sidebar-text whitespace-nowrap opacity-100 transition-opacity duration-300">Create Link</span>
    </a>
@endsection

@section('content')
<form action="{{ route('links.store') }}" method="POST" class="w-full max-w-5xl mx-auto rounded-[2.5rem] bg-white/5 border border-white/5 backdrop-blur-md p-8 animate-fade-in relative overflow-hidden">
    @csrf
    
    <!-- Ambient Glow -->
    <div class="absolute -left-20 -top-20 w-64 h-64 bg-cyan-500/10 rounded-full blur-3xl pointer-events-none"></div>

    <div class="mb-10 border-b border-white/5 pb-6 flex justify-between items-end">
        <div>
            <h2 class="text-3xl font-black text-text-main tracking-tight">Deploy Link</h2>
            <p class="text-sm text-text-muted mt-2">Configure intelligent routing, security, and metadata.</p>
        </div>
        <div class="flex gap-2">
             @if($features['bulk-link-creation'] ?? false)
                <button type="button" class="px-4 py-2 rounded-xl bg-white/5 border border-white/10 hover:bg-white/10 transition-colors text-xs font-bold text-text-main flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                    Bulk Create
                </button>
            @endif
            @if($features['link-templates'] ?? false)
                <button type="button" class="px-4 py-2 rounded-xl bg-white/5 border border-white/10 hover:bg-white/10 transition-colors text-xs font-bold text-text-main flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path></svg>
                    Use Template
                </button>
            @endif
        </div>
    </div>

    <div class="space-y-8">
        <!-- 1. Destination URL (Core Feature) -->
        <div>
            <label class="block text-xs font-bold text-text-muted uppercase tracking-widest mb-3">Primary Destination URL</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <svg class="w-5 h-5 text-text-dim" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path></svg>
                </div>
                <input type="url" name="destination_url" required placeholder="https://your-long-destination-url.com/path" class="w-full bg-black/5 dark:bg-white/5 border border-white/10 rounded-2xl pl-12 pr-4 py-4 text-text-main placeholder-text-dim focus:outline-none focus:border-cyan-500/50 focus:ring-1 focus:ring-cyan-500/50 transition-all font-medium text-lg">
            </div>
            
            @if($features['multi-destination-links'] ?? false)
                <button type="button" class="mt-3 text-xs font-bold text-cyan-500 hover:text-cyan-400 flex items-center gap-1">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    Add Alternative Destinations (A/B Testing / Geo Routing)
                </button>
            @endif
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- LEFT COLUMN -->
            <div class="space-y-8">
                <!-- Short Slug Settings -->
                <div class="p-6 rounded-3xl bg-black/5 dark:bg-white/5 border border-white/5 relative group">
                    <h3 class="text-sm font-bold text-text-main mb-4 flex items-center gap-2">
                        <svg class="w-4 h-4 text-cyan-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path></svg>
                        Link Identity
                    </h3>

                    <div class="space-y-4">
                        @if($features['custom-slugs'] ?? false)
                        <div>
                            <label class="block text-xs font-bold text-text-muted mb-2">Custom Back-half (Slug)</label>
                            <div class="flex items-center gap-2">
                                @if($features['vanity-urls'] ?? false)
                                <select name="domain" class="text-text-main font-bold bg-white/5 px-3 py-2 rounded-xl border border-white/5 focus:outline-none focus:border-cyan-500/50">
                                    <option value="l.sp" class="bg-black">l.sp</option>
                                    <option value="brand.co" class="bg-black">brand.co</option>
                                </select>
                                @else
                                <span class="text-text-dim font-bold bg-white/5 px-3 py-2 rounded-xl border border-white/5">l.sp/</span>
                                @endif
                                <input type="text" name="custom_slug" placeholder="summer-sale" class="flex-1 bg-white/5 border border-white/10 rounded-xl px-4 py-2 text-text-main placeholder-text-dim focus:outline-none focus:border-cyan-500/50 transition-all text-sm font-medium">
                            </div>
                        </div>
                        @endif

                        <div class="flex items-center justify-between pt-2">
                            <label class="flex items-center gap-2 cursor-pointer group/toggle">
                                <input type="checkbox" name="ai_slug" class="sr-only peer" {{ ($features['ai-style-smart-slugs'] ?? false) ? '' : 'disabled' }}>
                                <div class="w-8 h-4 bg-white/10 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-3 after:w-3 after:transition-all peer-checked:bg-cyan-500 relative {{ !($features['ai-style-smart-slugs'] ?? false) ? 'opacity-50' : '' }}"></div>
                                <span class="text-xs font-bold text-text-muted group-hover/toggle:text-text-main transition-colors {{ !($features['ai-style-smart-slugs'] ?? false) ? 'opacity-50' : '' }}">Generate AI Smart Slug</span>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Organization & Metadata -->
                <div class="p-6 rounded-3xl bg-black/5 dark:bg-white/5 border border-white/5 relative">
                    <h3 class="text-sm font-bold text-text-main mb-4 flex items-center gap-2">
                        <svg class="w-4 h-4 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path></svg>
                        Organization
                    </h3>

                    <div class="space-y-4">
                        @if($features['workspaces'] ?? false)
                        <div>
                            <label class="block text-xs font-bold text-text-muted mb-2">Workspace</label>
                            <select name="workspace_id" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-2 text-text-main focus:outline-none focus:border-cyan-500/50 transition-all text-sm font-medium appearance-none">
                                <option value="1" class="bg-black text-white">Personal Workspace</option>
                                <option value="2" class="bg-black text-white">Acme Corp Team</option>
                            </select>
                        </div>
                        @endif

                        @if($features['folder-organization'] ?? false)
                        <div>
                            <label class="block text-xs font-bold text-text-muted mb-2">Folder</label>
                            <select name="folder_id" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-2 text-text-main focus:outline-none focus:border-cyan-500/50 transition-all text-sm font-medium appearance-none">
                                <option value="" class="bg-black text-white">Uncategorized</option>
                                <option value="1" class="bg-black text-white">Marketing Campaigns</option>
                            </select>
                        </div>
                        @endif

                        @if($features['internal-tags'] ?? false)
                        <div>
                            <label class="block text-xs font-bold text-text-muted mb-2">Internal Tags</label>
                            <input type="text" name="tags" placeholder="promo, Q4, social" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-2 text-text-main placeholder-text-dim focus:outline-none focus:border-cyan-500/50 transition-all text-sm font-medium">
                        </div>
                        @endif
                        
                        @if($features['link-notes'] ?? false)
                        <div>
                            <label class="block text-xs font-bold text-text-muted mb-2">Internal Notes</label>
                            <textarea name="notes" rows="2" placeholder="Private notes about this link..." class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-2 text-text-main placeholder-text-dim focus:outline-none focus:border-cyan-500/50 transition-all text-sm font-medium resize-none"></textarea>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Advanced Metadata -->
                @if(($features['metadata-storage'] ?? false) || ($features['custom-fields'] ?? false))
                <div class="p-6 rounded-3xl bg-black/5 dark:bg-white/5 border border-white/5 relative">
                    <h3 class="text-sm font-bold text-text-main mb-4 flex items-center gap-2">
                        <svg class="w-4 h-4 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                        Advanced Metadata
                    </h3>

                    <div class="space-y-4">
                        @if($features['metadata-storage'] ?? false)
                        <div class="flex items-center justify-between">
                            <label class="flex items-center gap-2 cursor-pointer group/toggle">
                                <input type="checkbox" name="override_seo" class="sr-only peer">
                                <div class="w-8 h-4 bg-white/10 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-3 after:w-3 after:transition-all peer-checked:bg-purple-500 relative"></div>
                                <span class="text-xs font-bold text-text-muted group-hover/toggle:text-text-main transition-colors">Override SEO Metadata (Title/Description/Image)</span>
                            </label>
                        </div>
                        @endif
                        
                        @if($features['custom-fields'] ?? false)
                        <div class="flex items-center justify-between pt-2">
                            <label class="flex items-center gap-2 cursor-pointer group/toggle">
                                <input type="checkbox" name="use_custom_fields" class="sr-only peer">
                                <div class="w-8 h-4 bg-white/10 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-3 after:w-3 after:transition-all peer-checked:bg-purple-500 relative"></div>
                                <span class="text-xs font-bold text-text-muted group-hover/toggle:text-text-main transition-colors">Attach Custom JSON payload</span>
                            </label>
                        </div>
                        @endif
                    </div>
                </div>
                @endif
            </div>

            <!-- RIGHT COLUMN -->
            <div class="space-y-8">
                <!-- Security Settings -->
                <div class="p-6 rounded-3xl bg-black/5 dark:bg-white/5 border border-white/5 relative">
                    <h3 class="text-sm font-bold text-text-main mb-4 flex items-center gap-2">
                        <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                        Security & Access
                    </h3>

                    <div class="space-y-4">
                        @if($features['password-protected-links'] ?? false)
                        <div>
                            <label class="block text-xs font-bold text-text-muted mb-2">Password Protection</label>
                            <input type="password" name="password" placeholder="Leave empty for public access" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-2 text-text-main placeholder-text-dim focus:outline-none focus:border-red-500/50 transition-all text-sm font-medium">
                        </div>
                        @endif

                        @if($features['hidden-links'] ?? false)
                        <div class="flex items-center justify-between pt-2">
                            <label class="flex items-center gap-2 cursor-pointer group/toggle">
                                <input type="checkbox" name="is_hidden" class="sr-only peer">
                                <div class="w-8 h-4 bg-white/10 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-3 after:w-3 after:transition-all peer-checked:bg-red-500 relative"></div>
                                <span class="text-xs font-bold text-text-muted group-hover/toggle:text-text-main transition-colors">Hide from public API & sitemaps</span>
                            </label>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Lifecycle Settings -->
                <div class="p-6 rounded-3xl bg-black/5 dark:bg-white/5 border border-white/5 relative">
                    <h3 class="text-sm font-bold text-text-main mb-4 flex items-center gap-2">
                        <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        Lifecycle & Automation
                    </h3>

                    <div class="space-y-4">
                        @if($features['scheduled-activation'] ?? false)
                        <div>
                            <label class="block text-xs font-bold text-text-muted mb-2">Scheduled Activation (Start)</label>
                            <input type="datetime-local" name="activates_at" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-2 text-text-main focus:outline-none focus:border-green-500/50 transition-all text-sm font-medium">
                        </div>
                        @endif

                        @if($features['expiring-links'] ?? false)
                        <div>
                            <label class="block text-xs font-bold text-text-muted mb-2">Expiration Date (End)</label>
                            <input type="datetime-local" name="expires_at" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-2 text-text-main focus:outline-none focus:border-green-500/50 transition-all text-sm font-medium">
                        </div>
                        @endif
                        
                        @if($features['emergency-links'] ?? false)
                        <div>
                            <label class="block text-xs font-bold text-text-muted mb-2">Fallback / Emergency URL</label>
                            <input type="url" name="fallback_url" placeholder="If primary fails, redirect here" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-2 text-text-main placeholder-text-dim focus:outline-none focus:border-green-500/50 transition-all text-sm font-medium">
                        </div>
                        @endif

                        @if($features['draft-links'] ?? false)
                        <div class="flex items-center justify-between pt-2">
                            <label class="flex items-center gap-2 cursor-pointer group/toggle">
                                <input type="checkbox" name="is_draft" class="sr-only peer">
                                <div class="w-8 h-4 bg-white/10 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-3 after:w-3 after:transition-all peer-checked:bg-green-500 relative"></div>
                                <span class="text-xs font-bold text-text-muted group-hover/toggle:text-text-main transition-colors">Save as Draft (Inactive)</span>
                            </label>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Advanced Options -->
                <div class="p-6 rounded-3xl bg-black/5 dark:bg-white/5 border border-white/5 relative">
                    <h3 class="text-sm font-bold text-text-main mb-4 flex items-center gap-2">
                        <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        Tracking & Parameters
                    </h3>

                    <div class="space-y-4">
                        @if($features['dynamic-variables'] ?? false)
                        <div class="flex items-center justify-between">
                            <label class="flex items-center gap-2 cursor-pointer group/toggle">
                                <input type="checkbox" name="pass_parameters" class="sr-only peer" checked>
                                <div class="w-8 h-4 bg-white/10 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-3 after:w-3 after:transition-all peer-checked:bg-blue-500 relative"></div>
                                <span class="text-xs font-bold text-text-muted group-hover/toggle:text-text-main transition-colors">Forward UTM/Query Parameters</span>
                            </label>
                        </div>
                        @endif
                        
                        @if($features['redirect-preview'] ?? false)
                        <div class="flex items-center justify-between pt-2">
                            <label class="flex items-center gap-2 cursor-pointer group/toggle">
                                <input type="checkbox" name="force_preview" class="sr-only peer">
                                <div class="w-8 h-4 bg-white/10 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-3 after:w-3 after:transition-all peer-checked:bg-blue-500 relative"></div>
                                <span class="text-xs font-bold text-text-muted group-hover/toggle:text-text-main transition-colors">Force Preview Page (Stop auto-redirect)</span>
                            </label>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="pt-6 border-t border-white/5 flex justify-end gap-4">
            <a href="{{ route('user.dashboard') }}" data-navigate class="px-6 py-3 rounded-xl bg-white/5 text-text-main text-sm font-bold border border-white/10 hover:bg-white/10 transition-colors">Cancel</a>
            <button type="submit" class="px-8 py-3 rounded-xl bg-primary-gradient text-white text-sm font-black shadow-lg shadow-cyan-500/25 hover:shadow-cyan-500/40 transition-all active:scale-95 flex items-center gap-2">
                Deploy Link
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
            </button>
        </div>
    </div>
</form>
@endsection