@extends('themes.linkOne.dashboard')

@section('header-title', 'Users Management')

@section('sidebar-links')
    <a href="{{ route('admin.dashboard') }}" data-navigate class="flex items-center gap-3 px-4 py-3 rounded-xl text-text-muted hover:bg-white/5 hover:text-text-main font-medium transition-all group overflow-hidden">
        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
        <span class="sidebar-text whitespace-nowrap opacity-100 transition-opacity duration-300">Admin Console</span>
    </a>
    <a href="{{ route('admin.users') }}" data-navigate class="flex items-center gap-3 px-4 py-3 rounded-xl bg-gradient-to-r from-red-500/20 to-transparent border-l-4 border-red-500 text-red-500 font-bold transition-all group overflow-hidden">
        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
        <span class="sidebar-text whitespace-nowrap opacity-100 transition-opacity duration-300">Users Management</span>
    </a>
    <a href="{{ route('admin.link-features') }}" data-navigate class="flex items-center gap-3 px-4 py-3 rounded-xl text-text-muted hover:bg-white/5 hover:text-text-main font-medium transition-all group overflow-hidden">
        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
        <span class="sidebar-text whitespace-nowrap opacity-100 transition-opacity duration-300">Link Engine Features</span>
    </a>
@endsection

@section('content')
<div class="w-full rounded-[2.5rem] bg-white/5 border border-white/5 backdrop-blur-md p-8 animate-fade-in relative overflow-hidden">
    <!-- Ambient Glow -->
    <div class="absolute -right-20 -top-20 w-64 h-64 bg-red-500/5 rounded-full blur-3xl pointer-events-none"></div>

    <div class="flex flex-col md:flex-row items-start md:items-center justify-between mb-8 gap-4">
        <div>
            <h2 class="text-2xl font-black text-text-main tracking-tight">Active Users</h2>
            <p class="text-sm text-text-muted mt-1">Manage platform access and security levels.</p>
        </div>
        <div class="flex items-center gap-3 w-full md:w-auto">
            <div class="relative flex-1 md:w-64">
                <svg class="w-4 h-4 absolute left-4 top-1/2 -translate-y-1/2 text-text-dim" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                <input type="text" placeholder="Search users..." class="w-full bg-black/5 dark:bg-white/5 border border-black/10 dark:border-white/10 rounded-xl pl-10 pr-4 py-2 text-sm text-text-main placeholder-text-dim focus:outline-none focus:ring-2 focus:ring-red-500/50 transition-all font-medium">
            </div>
            <button class="p-2 rounded-xl bg-white/5 border border-white/10 hover:bg-white/10 transition-colors text-text-main">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path></svg>
            </button>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm whitespace-nowrap">
            <thead>
                <tr class="text-xs font-bold text-text-muted uppercase tracking-widest border-b border-white/5">
                    <th class="pb-4 px-4">User</th>
                    <th class="pb-4 px-4">Role</th>
                    <th class="pb-4 px-4">Status</th>
                    <th class="pb-4 px-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5">
                <tr class="hover:bg-white/5 transition-colors group">
                    <td class="py-4 px-4">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-primary-gradient text-white flex items-center justify-center font-bold text-xs shadow-md">A</div>
                            <div>
                                <p class="font-bold text-text-main">Admin Boss</p>
                                <p class="text-[10px] text-text-muted">admin@linkshortpro.com</p>
                            </div>
                        </div>
                    </td>
                    <td class="py-4 px-4">
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-red-500/10 text-red-500 text-[10px] font-bold uppercase tracking-widest border border-red-500/20">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                            Admin
                        </span>
                    </td>
                    <td class="py-4 px-4">
                        <div class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 rounded-full bg-green-500 shadow-[0_0_8px_rgba(34,197,94,0.8)]"></div>
                            <span class="font-medium text-text-main">Online</span>
                        </div>
                    </td>
                    <td class="py-4 px-4 text-right">
                        <button class="text-text-muted hover:text-text-main transition-colors opacity-0 group-hover:opacity-100">Edit</button>
                    </td>
                </tr>
                <tr class="hover:bg-white/5 transition-colors group">
                    <td class="py-4 px-4">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-cyan-500/20 text-cyan-500 border border-cyan-500/30 flex items-center justify-center font-bold text-xs shadow-md">S</div>
                            <div>
                                <p class="font-bold text-text-main">Standard User</p>
                                <p class="text-[10px] text-text-muted">user@company.com</p>
                            </div>
                        </div>
                    </td>
                    <td class="py-4 px-4">
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-white/5 text-text-main text-[10px] font-bold uppercase tracking-widest border border-white/10">
                            User
                        </span>
                    </td>
                    <td class="py-4 px-4">
                        <div class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 rounded-full bg-text-dim"></div>
                            <span class="font-medium text-text-muted">Offline</span>
                        </div>
                    </td>
                    <td class="py-4 px-4 text-right">
                        <button class="text-text-muted hover:text-text-main transition-colors opacity-0 group-hover:opacity-100">Edit</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection