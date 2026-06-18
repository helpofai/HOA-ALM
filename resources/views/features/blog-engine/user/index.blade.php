@extends('themes.linkOne.dashboard')

@section('header-title', 'Blog Engine')

@section('sidebar-links')
    <a href="{{ route('user.dashboard') }}" data-navigate class="flex items-center gap-3 px-4 py-3 rounded-xl text-text-muted hover:bg-white/5 hover:text-text-main font-medium transition-all group overflow-hidden">
        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
        <span class="sidebar-text whitespace-nowrap opacity-100 transition-opacity duration-300">Overview</span>
    </a>
    <a href="{{ route('links.index') }}" data-navigate class="flex items-center gap-3 px-4 py-3 rounded-xl text-text-muted hover:bg-white/5 hover:text-text-main font-medium transition-all group overflow-hidden">
        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path></svg>
        <span class="sidebar-text whitespace-nowrap opacity-100 transition-opacity duration-300">My Links</span>
    </a>
    <a href="{{ route('user.blog.index') }}" data-navigate class="flex items-center gap-3 px-4 py-3 rounded-xl bg-gradient-to-r from-cyan-500/20 to-transparent border-l-4 border-cyan-500 text-cyan-500 font-bold transition-all group overflow-hidden">
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
<div class="w-full rounded-[2.5rem] bg-white/5 border border-white/5 backdrop-blur-md p-8 animate-fade-in relative overflow-hidden min-h-[70vh] flex flex-col">
    <!-- Ambient Glow -->
    <div class="absolute -right-20 -top-20 w-64 h-64 bg-cyan-500/10 rounded-full blur-3xl pointer-events-none"></div>

    <!-- Header & Controls -->
    <div class="flex flex-col lg:flex-row items-start lg:items-center justify-between gap-6 mb-8 border-b border-white/5 pb-6">
        <div>
            <h2 class="text-3xl font-black text-text-main tracking-tight">Content Management</h2>
            <p class="text-sm text-text-muted mt-2">Manage marketing pages, updates, and blog articles.</p>
        </div>
        <div class="flex flex-wrap items-center gap-4 w-full lg:w-auto">
            <a href="{{ route('user.blog.create') }}" data-navigate class="px-6 py-2.5 rounded-xl bg-primary-gradient text-white text-sm font-black shadow-lg shadow-cyan-500/25 hover:shadow-cyan-500/40 transition-all active:scale-95 flex items-center gap-2 whitespace-nowrap">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Write Post
            </a>
        </div>
    </div>

    <!-- List Container -->
    <div class="flex-1 flex flex-col gap-4">
        @forelse($posts as $post)
            <div class="group flex flex-col md:flex-row md:items-center justify-between p-5 rounded-[1.5rem] bg-black/5 dark:bg-white/5 border border-white/5 hover:border-cyan-500/30 hover:bg-white/10 transition-all gap-4">
                
                <!-- Left: Info -->
                <div class="flex items-center gap-4 min-w-0 flex-1">
                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-cyan-500/20 to-purple-500/20 flex flex-shrink-0 items-center justify-center border border-white/5">
                        <svg class="w-5 h-5 text-cyan-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                    </div>
                    
                    <div class="min-w-0 flex-1">
                        <div class="flex items-center gap-3 mb-1">
                            <a href="#" class="text-base font-bold text-text-main hover:text-cyan-400 transition-colors truncate">
                                {{ $post->title }}
                            </a>
                        </div>
                        <p class="text-sm text-text-muted truncate">
                            /{{ $post->slug }}
                        </p>
                    </div>
                </div>

                <!-- Right: Stats & Actions -->
                <div class="flex items-center justify-between md:justify-end gap-6 md:gap-8">
                    
                    <!-- Status -->
                    <div class="flex items-center">
                        @if($post->status === 'published')
                            <span class="px-2.5 py-1 rounded-full text-[10px] font-bold uppercase tracking-widest border border-green-500/20 text-green-500 bg-green-500/10">Published</span>
                        @else
                            <span class="px-2.5 py-1 rounded-full text-[10px] font-bold uppercase tracking-widest border border-orange-500/20 text-orange-500 bg-orange-500/10">Draft</span>
                        @endif
                    </div>

                    <!-- Date -->
                    <div class="hidden lg:block text-right w-24">
                        <p class="text-xs font-bold text-text-muted">{{ $post->created_at->format('M d, Y') }}</p>
                    </div>

                    <!-- Actions Dropdown Trigger -->
                    <button class="p-2 rounded-xl bg-white/5 border border-white/5 text-text-muted hover:text-white hover:bg-white/10 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                    </button>
                </div>
            </div>
        @empty
            <!-- Empty State -->
            <div class="flex-1 flex flex-col items-center justify-center p-12 text-center border-2 border-dashed border-white/10 rounded-[2rem] bg-white/5">
                <div class="w-20 h-20 rounded-full bg-cyan-500/10 flex items-center justify-center mb-6">
                    <svg class="w-10 h-10 text-cyan-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                </div>
                <h3 class="text-2xl font-black text-text-main mb-2">No Posts Yet</h3>
                <p class="text-text-muted mb-8 max-w-md">Start building your audience. Create your first blog post or marketing update using the rich-text Tiptap editor.</p>
                <a href="{{ route('user.blog.create') }}" data-navigate class="px-8 py-3 rounded-xl bg-primary-gradient text-white text-sm font-black shadow-lg shadow-cyan-500/25 hover:shadow-cyan-500/40 transition-all active:scale-95">
                    Write First Post
                </a>
            </div>
        @endforelse
    </div>

    <!-- Pagination (Custom Styled Wrapper) -->
    @if($posts->hasPages())
    <div class="mt-8 pt-6 border-t border-white/5 flex justify-center">
        <div class="inline-flex gap-2">
            @if(!$posts->onFirstPage())
                <a href="{{ $posts->previousPageUrl() }}" class="px-4 py-2 rounded-lg bg-white/5 hover:bg-white/10 border border-white/5 text-sm font-bold text-text-main transition-colors">Previous</a>
            @endif
            
            @if($posts->hasMorePages())
                <a href="{{ $posts->nextPageUrl() }}" class="px-4 py-2 rounded-lg bg-white/5 hover:bg-white/10 border border-white/5 text-sm font-bold text-text-main transition-colors">Next</a>
            @endif
        </div>
    </div>
    @endif
</div>
@endsection