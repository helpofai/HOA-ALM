@extends('themes.linkOne.dashboard')

@section('header-title', 'System Administrator')

@section('sidebar-links')
    <a href="{{ route('admin.dashboard') }}" data-navigate class="flex items-center gap-3 px-4 py-3 rounded-xl bg-gradient-to-r from-red-500/20 to-transparent border-l-4 border-red-500 text-red-500 font-bold transition-all group overflow-hidden">
        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
        <span class="sidebar-text whitespace-nowrap opacity-100 transition-opacity duration-300">Admin Console</span>
    </a>
    <a href="{{ route('admin.users') }}" data-navigate class="flex items-center gap-3 px-4 py-3 rounded-xl text-text-muted hover:bg-white/5 hover:text-text-main font-medium transition-all group overflow-hidden">
        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
        <span class="sidebar-text whitespace-nowrap opacity-100 transition-opacity duration-300">Users Management</span>
    </a>
    <a href="{{ route('admin.link-features') }}" data-navigate class="flex items-center gap-3 px-4 py-3 rounded-xl text-text-muted hover:bg-white/5 hover:text-text-main font-medium transition-all group overflow-hidden">
        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
        <span class="sidebar-text whitespace-nowrap opacity-100 transition-opacity duration-300">Link Engine Features</span>
    </a>
    <a href="{{ route('admin.blog.index') }}" data-navigate class="flex items-center gap-3 px-4 py-3 rounded-xl text-text-muted hover:bg-white/5 hover:text-text-main font-medium transition-all group overflow-hidden">
        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
        <span class="sidebar-text whitespace-nowrap opacity-100 transition-opacity duration-300">Blog Engine</span>
    </a>
@endsection

@section('content')
<!-- Admin Alert Badge -->
<div class="mb-8 w-full rounded-2xl bg-red-500/10 border border-red-500/20 p-4 flex items-center gap-4 animate-fade-in">
    <div class="w-10 h-10 rounded-xl bg-red-500 flex items-center justify-center text-white shadow-lg shadow-red-500/20">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
    </div>
    <div>
        <h3 class="font-bold text-red-500">System Administrator Access</h3>
        <p class="text-xs text-text-muted font-medium mt-1">You have elevated privileges. Any modifications made here affect the entire platform.</p>
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
    <div class="p-6 rounded-[2rem] bg-white/5 border border-white/5 backdrop-blur-md relative overflow-hidden group">
        <div class="absolute -right-4 -top-4 w-24 h-24 bg-cyan-500/10 rounded-full blur-2xl group-hover:bg-cyan-500/20 transition-all"></div>
        <p class="text-xs font-bold text-text-muted uppercase tracking-widest mb-2">Total Users</p>
        <p class="text-4xl font-black text-text-main">8,291</p>
    </div>
    
    <div class="p-6 rounded-[2rem] bg-white/5 border border-white/5 backdrop-blur-md relative overflow-hidden group">
        <div class="absolute -right-4 -top-4 w-24 h-24 bg-purple-500/10 rounded-full blur-2xl group-hover:bg-purple-500/20 transition-all"></div>
        <p class="text-xs font-bold text-text-muted uppercase tracking-widest mb-2">Global Links</p>
        <p class="text-4xl font-black text-text-main">1.2M</p>
    </div>

    <div class="p-6 rounded-[2rem] bg-white/5 border border-white/5 backdrop-blur-md relative overflow-hidden group">
        <div class="absolute -right-4 -top-4 w-24 h-24 bg-orange-500/10 rounded-full blur-2xl group-hover:bg-orange-500/20 transition-all"></div>
        <p class="text-xs font-bold text-text-muted uppercase tracking-widest mb-2">Active Workspaces</p>
        <p class="text-4xl font-black text-text-main">412</p>
    </div>

    <div class="p-6 rounded-[2rem] bg-white/5 border border-white/5 backdrop-blur-md relative overflow-hidden group">
        <div class="absolute -right-4 -top-4 w-24 h-24 bg-red-500/10 rounded-full blur-2xl group-hover:bg-red-500/20 transition-all"></div>
        <p class="text-xs font-bold text-text-muted uppercase tracking-widest mb-2">Platform Health</p>
        <p class="text-4xl font-black text-green-500">100%</p>
    </div>
</div>

<div class="w-full rounded-[2.5rem] bg-white/5 border border-white/5 backdrop-blur-md p-8">
    <div class="flex items-center justify-between mb-8">
        <h2 class="text-xl font-black text-text-main">Recent System Registrations</h2>
    </div>

    <div class="space-y-4">
        <!-- Mock User Item -->
        <div class="flex items-center justify-between p-4 rounded-2xl bg-black/5 dark:bg-white/5 border border-transparent">
            <div class="flex items-center gap-4">
                <div class="w-10 h-10 rounded-full bg-primary-gradient text-white flex items-center justify-center font-bold shadow-md">
                    S
                </div>
                <div>
                    <p class="font-bold text-text-main">Sarah Connor</p>
                    <p class="text-xs font-medium text-text-muted">sarah@skynet.com</p>
                </div>
            </div>
            <div class="flex items-center gap-4">
                <span class="px-3 py-1 rounded-full bg-green-500/10 text-green-500 text-[10px] font-bold uppercase tracking-widest border border-green-500/20">Active</span>
                <span class="text-xs font-bold text-text-dim hidden md:block">2 mins ago</span>
            </div>
        </div>

        <!-- Mock User Item -->
        <div class="flex items-center justify-between p-4 rounded-2xl bg-black/5 dark:bg-white/5 border border-transparent">
            <div class="flex items-center gap-4">
                <div class="w-10 h-10 rounded-full bg-secondary-gradient text-white flex items-center justify-center font-bold shadow-md">
                    J
                </div>
                <div>
                    <p class="font-bold text-text-main">John Doe</p>
                    <p class="text-xs font-medium text-text-muted">john.doe@company.com</p>
                </div>
            </div>
            <div class="flex items-center gap-4">
                <span class="px-3 py-1 rounded-full bg-green-500/10 text-green-500 text-[10px] font-bold uppercase tracking-widest border border-green-500/20">Active</span>
                <span class="text-xs font-bold text-text-dim hidden md:block">14 mins ago</span>
            </div>
        </div>
    </div>
</div>
@endsection