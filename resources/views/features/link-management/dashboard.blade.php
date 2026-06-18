@extends('themes.linkOne.dashboard')

@section('header-title', 'My Links')

@section('sidebar-links')
    <a href="{{ route('user.dashboard') }}" data-navigate class="flex items-center gap-3 px-4 py-3 rounded-xl text-text-muted hover:bg-white/5 hover:text-text-main font-medium transition-all group overflow-hidden">
        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
        <span class="sidebar-text whitespace-nowrap opacity-100 transition-opacity duration-300">Overview</span>
    </a>
    <a href="{{ route('links.index') }}" data-navigate class="flex items-center gap-3 px-4 py-3 rounded-xl bg-white/10 text-cyan-500 font-bold border border-white/5 transition-all group overflow-hidden">
        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path></svg>
        <span class="sidebar-text whitespace-nowrap opacity-100 transition-opacity duration-300">My Links</span>
    </a>
    <a href="#" data-navigate class="flex items-center gap-3 px-4 py-3 rounded-xl text-text-muted hover:bg-white/5 hover:text-text-main font-medium transition-all group overflow-hidden">
        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
        <span class="sidebar-text whitespace-nowrap opacity-100 transition-opacity duration-300">Analytics</span>
    </a>
    <a href="{{ route('user.link-features') }}" data-navigate class="flex items-center gap-3 px-4 py-3 rounded-xl text-text-muted hover:bg-white/5 hover:text-text-main font-medium transition-all group overflow-hidden">
        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path></svg>
        <span class="sidebar-text whitespace-nowrap opacity-100 transition-opacity duration-300">My Features</span>
    </a>
@endsection

@section('content')
<div class="w-full rounded-[2.5rem] bg-white/5 border border-white/5 backdrop-blur-md p-8 animate-fade-in relative overflow-hidden min-h-[70vh] flex flex-col">
    <!-- Ambient Glow -->
    <div class="absolute -right-20 -top-20 w-64 h-64 bg-cyan-500/10 rounded-full blur-3xl pointer-events-none"></div>

    <!-- Header & Controls -->
    <div class="flex flex-col lg:flex-row items-start lg:items-center justify-between gap-6 mb-8 border-b border-white/5 pb-6">
        <div>
            <h2 class="text-3xl font-black text-text-main tracking-tight">Link Management</h2>
            <p class="text-sm text-text-muted mt-2">View, manage, and analyze your generated short URLs.</p>
        </div>
        <div class="flex flex-wrap items-center gap-4 w-full lg:w-auto">
            <!-- Search Bar -->
            <div class="relative flex-1 lg:w-64">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <svg class="w-4 h-4 text-text-dim" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
                <input type="text" placeholder="Search links..." class="w-full bg-black/5 dark:bg-white/5 border border-white/10 rounded-xl pl-10 pr-4 py-2.5 text-text-main placeholder-text-dim focus:outline-none focus:border-cyan-500/50 transition-all text-sm font-medium">
            </div>
            
            <!-- Filters -->
            <button class="px-4 py-2.5 rounded-xl bg-white/5 border border-white/10 text-text-main text-sm font-bold hover:bg-white/10 transition-colors flex items-center gap-2">
                <svg class="w-4 h-4 text-text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path></svg>
                Filter
            </button>
            
            <a href="{{ route('links.create') }}" data-navigate class="px-6 py-2.5 rounded-xl bg-primary-gradient text-white text-sm font-black shadow-lg shadow-cyan-500/25 hover:shadow-cyan-500/40 transition-all active:scale-95 flex items-center gap-2 whitespace-nowrap">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Create Link
            </a>
        </div>
    </div>

    <!-- List Container -->
    <div class="flex-1 flex flex-col gap-4">
        @forelse($links as $link)
            @php
                $shortUrl = url($link->slug);
                $isExpired = $link->expires_at && $link->expires_at->isPast();
                
                if ($isExpired) {
                    $statusColor = 'text-orange-500 bg-orange-500/10 border-orange-500/20';
                    $statusText = 'Expired';
                    $statusIcon = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>';
                } elseif (!$link->is_active) {
                    $statusColor = 'text-red-500 bg-red-500/10 border-red-500/20';
                    $statusText = 'Inactive';
                    $statusIcon = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>';
                } else {
                    $statusColor = 'text-green-500 bg-green-500/10 border-green-500/20';
                    $statusText = 'Active';
                    $statusIcon = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>';
                }
            @endphp
            <div class="group flex flex-col md:flex-row md:items-center justify-between p-5 rounded-[1.5rem] bg-black/5 dark:bg-white/5 border border-white/5 hover:border-cyan-500/30 hover:bg-white/10 transition-all gap-4">
                
                <!-- Left: Info -->
                <div class="flex items-center gap-4 min-w-0 flex-1">
                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-cyan-500/20 to-purple-500/20 flex flex-shrink-0 items-center justify-center border border-white/5">
                        <svg class="w-5 h-5 text-cyan-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path></svg>
                    </div>
                    
                    <div class="min-w-0 flex-1">
                        <div class="flex items-center gap-3 mb-1">
                            <a href="{{ $shortUrl }}" target="_blank" class="text-base font-bold text-text-main hover:text-cyan-400 transition-colors truncate">
                                {{ str_replace(['http://', 'https://'], '', $shortUrl) }}
                            </a>
                            <button onclick="copyToClipboard('{{ $shortUrl }}', this)" class="p-1 rounded-md text-text-dim hover:text-cyan-400 hover:bg-cyan-500/10 transition-colors" title="Copy Link">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                            </button>
                        </div>
                        <p class="text-sm text-text-muted truncate flex items-center gap-1">
                            <svg class="w-3 h-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            {{ $link->destination_url }}
                        </p>
                    </div>
                </div>

                <!-- Right: Stats & Actions -->
                <div class="flex items-center justify-between md:justify-end gap-6 md:gap-8">
                    
                    <!-- Metrics (Placeholder for AnalyticsEngine) -->
                    <div class="text-right flex flex-col items-end">
                        <span class="text-sm font-black text-text-main flex items-center gap-1">
                            <svg class="w-3 h-3 text-cyan-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                            0
                        </span>
                        <span class="text-[10px] font-bold text-text-dim uppercase tracking-widest">Engagements</span>
                    </div>

                    <!-- Status -->
                    <div class="flex items-center">
                        <span class="px-2.5 py-1 rounded-full text-[10px] font-bold uppercase tracking-widest border flex items-center gap-1 {{ $statusColor }}">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">{!! $statusIcon !!}</svg>
                            {{ $statusText }}
                        </span>
                    </div>

                    <!-- Date -->
                    <div class="hidden lg:block text-right w-24">
                        <p class="text-xs font-bold text-text-muted">{{ $link->created_at->format('M d, Y') }}</p>
                    </div>

                    <!-- Actions Dropdown Trigger -->
                    <button class="p-2 rounded-xl bg-white/5 border border-white/5 text-text-muted hover:text-white hover:bg-white/10 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path></svg>
                    </button>
                </div>
            </div>
        @empty
            <!-- Empty State -->
            <div class="flex-1 flex flex-col items-center justify-center p-12 text-center border-2 border-dashed border-white/10 rounded-[2rem] bg-white/5">
                <div class="w-20 h-20 rounded-full bg-cyan-500/10 flex items-center justify-center mb-6">
                    <svg class="w-10 h-10 text-cyan-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path></svg>
                </div>
                <h3 class="text-2xl font-black text-text-main mb-2">No Links Generated</h3>
                <p class="text-text-muted mb-8 max-w-md">Your workspace is empty. Create your first intelligent short link to start tracking engagements, applying security protocols, and managing traffic.</p>
                <a href="{{ route('links.create') }}" data-navigate class="px-8 py-3 rounded-xl bg-primary-gradient text-white text-sm font-black shadow-lg shadow-cyan-500/25 hover:shadow-cyan-500/40 transition-all active:scale-95">
                    Deploy First Link
                </a>
            </div>
        @endforelse
    </div>

    <!-- Pagination (Custom Styled Wrapper) -->
    @if($links->hasPages())
    <div class="mt-8 pt-6 border-t border-white/5 flex justify-center">
        <div class="inline-flex gap-2">
            @if(!$links->onFirstPage())
                <a href="{{ $links->previousPageUrl() }}" class="px-4 py-2 rounded-lg bg-white/5 hover:bg-white/10 border border-white/5 text-sm font-bold text-text-main transition-colors">Previous</a>
            @endif
            
            @if($links->hasMorePages())
                <a href="{{ $links->nextPageUrl() }}" class="px-4 py-2 rounded-lg bg-white/5 hover:bg-white/10 border border-white/5 text-sm font-bold text-text-main transition-colors">Next</a>
            @endif
        </div>
    </div>
    @endif
</div>

<!-- Inline Script for Copy functionality -->
<script>
    function copyToClipboard(text, btn) {
        navigator.clipboard.writeText(text).then(() => {
            const originalIcon = btn.innerHTML;
            btn.innerHTML = '<svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>';
            btn.classList.add('bg-green-500/10');
            setTimeout(() => {
                btn.innerHTML = originalIcon;
                btn.classList.remove('bg-green-500/10');
            }, 2000);
        });
    }
</script>
@endsection