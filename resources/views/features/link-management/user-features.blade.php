@extends('themes.linkOne.dashboard')

@section('header-title', 'My Features')

@section('sidebar-links')
    <a href="{{ route('user.dashboard') }}" data-navigate class="flex items-center gap-3 px-4 py-3 rounded-xl text-text-muted hover:bg-white/5 hover:text-text-main font-medium transition-all group overflow-hidden">
        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
        <span class="sidebar-text whitespace-nowrap opacity-100 transition-opacity duration-300">Overview</span>
    </a>
    <a href="#" data-navigate class="flex items-center gap-3 px-4 py-3 rounded-xl text-text-muted hover:bg-white/5 hover:text-text-main font-medium transition-all group overflow-hidden">
        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path></svg>
        <span class="sidebar-text whitespace-nowrap opacity-100 transition-opacity duration-300">My Links</span>
    </a>
    <a href="#" data-navigate class="flex items-center gap-3 px-4 py-3 rounded-xl text-text-muted hover:bg-white/5 hover:text-text-main font-medium transition-all group overflow-hidden">
        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
        <span class="sidebar-text whitespace-nowrap opacity-100 transition-opacity duration-300">Analytics</span>
    </a>
    <a href="{{ route('user.link-features') }}" data-navigate class="flex items-center gap-3 px-4 py-3 rounded-xl bg-white/10 text-cyan-500 font-bold border border-white/5 transition-all group overflow-hidden">
        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path></svg>
        <span class="sidebar-text whitespace-nowrap opacity-100 transition-opacity duration-300">My Features</span>
    </a>
@endsection

@section('content')
<div class="w-full rounded-[2.5rem] bg-white/5 border border-white/5 backdrop-blur-md p-8 animate-fade-in relative overflow-hidden">
    <!-- Ambient Glow -->
    <div class="absolute -right-20 -top-20 w-64 h-64 bg-cyan-500/5 rounded-full blur-3xl pointer-events-none"></div>

    <div class="flex flex-col md:flex-row items-start md:items-center justify-between mb-10 gap-4 border-b border-white/5 pb-6">
        <div>
            <h2 class="text-2xl font-black text-text-main tracking-tight">Customize Your Workflow</h2>
            <p class="text-sm text-text-muted mt-2 max-w-2xl">Toggle features on or off to declutter your link creation interface. Note: You can only customize features that have been enabled globally by the system administrator.</p>
        </div>
        <div class="flex items-center gap-3 w-full md:w-auto">
            <span class="px-3 py-1 rounded-full bg-cyan-500/10 text-cyan-500 text-xs font-bold uppercase tracking-widest border border-cyan-500/20 shadow-md flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                {{ $features->count() }} Available Features
            </span>
        </div>
    </div>

    <!-- Features Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
        @foreach($features as $feature)
            @php
                // A feature is enabled for the user if they haven't explicitly disabled it
                $isUserEnabled = $preferences[$feature->id] ?? true;
            @endphp
        <div class="p-4 rounded-2xl bg-black/5 dark:bg-white/5 border border-white/5 hover:border-cyan-500/30 transition-all flex items-center justify-between group">
            <div class="flex items-center gap-3 overflow-hidden">
                <div class="w-8 h-8 rounded-lg bg-white/5 text-text-muted group-hover:text-cyan-500 group-hover:bg-cyan-500/10 transition-colors flex flex-shrink-0 items-center justify-center">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                </div>
                <span class="font-bold text-sm text-text-main truncate" title="{{ $feature->name }}">{{ $feature->name }}</span>
            </div>
            
            <!-- Tailwind Toggle Switch -->
            <label class="relative inline-flex items-center cursor-pointer flex-shrink-0 ml-2">
                <input type="checkbox" class="sr-only peer feature-toggle" data-id="{{ $feature->id }}" {{ $isUserEnabled ? 'checked' : '' }}>
                <div class="w-9 h-5 bg-white/10 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-cyan-500"></div>
            </label>
        </div>
        @endforeach

        @if($features->isEmpty())
        <div class="col-span-full p-8 text-center bg-white/5 rounded-3xl border border-white/5">
            <svg class="w-12 h-12 text-text-dim mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
            <h3 class="text-lg font-bold text-text-main">No Features Available</h3>
            <p class="text-sm text-text-muted mt-1">The system administrator has disabled all advanced features globally.</p>
        </div>
        @endif
    </div>
</div>

<script>
    document.querySelectorAll('.feature-toggle').forEach(toggle => {
        // Prevent multiple listeners if re-evaluated during SPA nav
        if(toggle.dataset.bound) return;
        toggle.dataset.bound = true;

        toggle.addEventListener('change', async function() {
            const featureId = this.dataset.id;
            const isEnabled = this.checked ? 1 : 0;
            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            try {
                const response = await fetch(`/my-features/${featureId}/toggle`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': token,
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({ is_enabled: isEnabled })
                });

                if (!response.ok) {
                    throw new Error('Toggle failed');
                }
                
                // Add subtle success glow to the parent card
                const card = this.closest('.p-4');
                card.style.boxShadow = '0 0 15px rgba(6, 182, 212, 0.3)';
                setTimeout(() => {
                    card.style.boxShadow = 'none';
                }, 500);

            } catch (error) {
                console.error(error);
                // Revert toggle if failed
                this.checked = !this.checked;
                alert('Failed to update your preference. Check console for details.');
            }
        });
    });
</script>
@endsection