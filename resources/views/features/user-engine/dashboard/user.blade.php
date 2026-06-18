@extends('themes.linkOne.dashboard')

@section('header-title', 'Overview')

@section('sidebar-links')
    <a href="{{ route('user.dashboard') }}" data-navigate class="flex items-center gap-3 px-4 py-3 rounded-xl bg-white/10 text-cyan-500 font-bold border border-white/5 transition-all group overflow-hidden">
        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
        <span class="sidebar-text whitespace-nowrap opacity-100 transition-opacity duration-300">Overview</span>
    </a>
    <a href="{{ route('links.index') }}" data-navigate class="flex items-center gap-3 px-4 py-3 rounded-xl text-text-muted hover:bg-white/5 hover:text-text-main font-medium transition-all group overflow-hidden">
        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path></svg>
        <span class="sidebar-text whitespace-nowrap opacity-100 transition-opacity duration-300">My Links</span>
    </a>
    <a href="{{ route('user.blog.index') }}" data-navigate class="flex items-center gap-3 px-4 py-3 rounded-xl text-text-muted hover:bg-white/5 hover:text-text-main font-medium transition-all group overflow-hidden">
        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
        <span class="sidebar-text whitespace-nowrap opacity-100 transition-opacity duration-300">Blog Engine</span>
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
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <!-- Clicks Card -->
    <div class="p-6 rounded-[2rem] bg-white/5 border border-white/5 backdrop-blur-md relative overflow-hidden group">
        <div class="absolute -right-10 -top-10 w-32 h-32 bg-cyan-500/10 rounded-full blur-2xl group-hover:bg-cyan-500/20 transition-all"></div>
        <p class="text-xs font-bold text-text-muted uppercase tracking-widest mb-2 relative z-10">Total Clicks</p>
        <p class="text-4xl font-black text-text-main relative z-10">{{ number_format($totalClicks) }}</p>
        <div class="mt-4 flex items-center text-xs font-bold text-text-dim relative z-10">
            <svg class="w-4 h-4 mr-1 text-cyan-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
            Pending Analytics Engine
        </div>
    </div>
    
    <!-- Active Links Card -->
    <div class="p-6 rounded-[2rem] bg-white/5 border border-white/5 backdrop-blur-md relative overflow-hidden group">
        <div class="absolute -right-10 -top-10 w-32 h-32 bg-purple-500/10 rounded-full blur-2xl group-hover:bg-purple-500/20 transition-all"></div>
        <p class="text-xs font-bold text-text-muted uppercase tracking-widest mb-2 relative z-10">Active Links</p>
        <p class="text-4xl font-black text-text-main relative z-10">{{ number_format($activeLinksCount) }}</p>
        <div class="mt-4 flex items-center text-xs font-bold text-text-dim relative z-10">
            <svg class="w-4 h-4 mr-1 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path></svg>
            Currently routing traffic
        </div>
    </div>

    <!-- Geo Card -->
    <div class="p-6 rounded-[2rem] bg-white/5 border border-white/5 backdrop-blur-md relative overflow-hidden group">
        <div class="absolute -right-10 -top-10 w-32 h-32 bg-green-500/10 rounded-full blur-2xl group-hover:bg-green-500/20 transition-all"></div>
        <p class="text-xs font-bold text-text-muted uppercase tracking-widest mb-2 relative z-10">Top Location</p>
        <p class="text-4xl font-black text-text-main relative z-10">--</p>
        <div class="mt-4 flex items-center text-xs font-bold text-text-dim relative z-10">
            <svg class="w-4 h-4 mr-1 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            Pending Analytics Engine
        </div>
    </div>
</div>

<div class="w-full rounded-[2.5rem] bg-white/5 border border-white/5 backdrop-blur-md p-8">
    <div class="flex items-center justify-between mb-8">
        <h2 class="text-xl font-black text-text-main">Recent Links</h2>
        <a href="{{ route('links.index') }}" data-navigate class="text-sm font-bold text-cyan-500 hover:text-cyan-400 transition-colors flex items-center gap-1">
            View All
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
        </a>
    </div>

    <div class="space-y-4">
        @forelse($recentLinks as $link)
            @php
                $shortUrl = url($link->slug);
            @endphp
            <div class="flex flex-col md:flex-row md:items-center justify-between p-4 rounded-2xl bg-black/5 dark:bg-white/5 border border-white/5 hover:border-cyan-500/30 hover:bg-white/10 transition-colors gap-4">
                <div class="flex items-center gap-4 min-w-0">
                    <div class="w-10 h-10 rounded-xl bg-cyan-500/10 text-cyan-500 flex flex-shrink-0 items-center justify-center border border-cyan-500/20">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path></svg>
                    </div>
                    <div class="min-w-0">
                        <div class="flex items-center gap-2">
                            <a href="{{ $shortUrl }}" target="_blank" class="font-bold text-text-main hover:text-cyan-400 transition-colors truncate block">
                                {{ str_replace(['http://', 'https://'], '', $shortUrl) }}
                            </a>
                            <button onclick="copyToClipboard('{{ $shortUrl }}', this)" class="text-text-dim hover:text-cyan-400 transition-colors">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                            </button>
                        </div>
                        <p class="text-xs text-text-muted truncate mt-0.5">{{ $link->destination_url }}</p>
                    </div>
                </div>
                
                <div class="flex items-center justify-between md:justify-end gap-6">
                    <div class="text-right flex flex-col items-end">
                        <p class="font-black text-text-main">0</p>
                        <p class="text-[10px] uppercase tracking-widest text-text-dim">Clicks</p>
                    </div>
                    
                    <button class="p-2 rounded-lg bg-white/5 hover:bg-white/10 border border-white/5 text-text-muted transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path></svg>
                    </button>
                </div>
            </div>
        @empty
            <div class="text-center py-8">
                <p class="text-text-muted text-sm font-medium">No links created yet.</p>
                <a href="{{ route('links.create') }}" data-navigate class="inline-block mt-4 text-cyan-500 font-bold hover:text-cyan-400 transition-colors">Create your first link &rarr;</a>
            </div>
        @endforelse
    </div>
</div>

<!-- Inline Script for Copy functionality -->
<script>
    if (typeof copyToClipboard !== 'function') {
        function copyToClipboard(text, btn) {
            navigator.clipboard.writeText(text).then(() => {
                const originalIcon = btn.innerHTML;
                btn.innerHTML = '<svg class="w-3 h-3 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>';
                setTimeout(() => {
                    btn.innerHTML = originalIcon;
                }, 2000);
            });
        }
    }
</script>
@endsection