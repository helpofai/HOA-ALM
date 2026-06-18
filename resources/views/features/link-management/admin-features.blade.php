@extends('themes.linkOne.dashboard')

@section('header-title', 'Link Engine Configuration')

@section('sidebar-links')
    <a href="{{ route('admin.dashboard') }}" data-navigate class="flex items-center gap-3 px-4 py-3 rounded-xl text-text-muted hover:bg-white/5 hover:text-text-main font-medium transition-all group overflow-hidden">
        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
        <span class="sidebar-text whitespace-nowrap opacity-100 transition-opacity duration-300">Admin Console</span>
    </a>
    <a href="{{ route('admin.users') }}" data-navigate class="flex items-center gap-3 px-4 py-3 rounded-xl text-text-muted hover:bg-white/5 hover:text-text-main font-medium transition-all group overflow-hidden">
        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
        <span class="sidebar-text whitespace-nowrap opacity-100 transition-opacity duration-300">Users Management</span>
    </a>
    <a href="{{ route('admin.link-features') }}" data-navigate class="flex items-center gap-3 px-4 py-3 rounded-xl bg-gradient-to-r from-red-500/20 to-transparent border-l-4 border-red-500 text-red-500 font-bold transition-all group overflow-hidden">
        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
        <span class="sidebar-text whitespace-nowrap opacity-100 transition-opacity duration-300">Link Engine Features</span>
    </a>
@endsection

@section('content')
<div class="w-full rounded-[2.5rem] bg-white/5 border border-white/5 backdrop-blur-md p-8 animate-fade-in relative overflow-hidden">
    <!-- Ambient Glow -->
    <div class="absolute -right-20 -top-20 w-64 h-64 bg-cyan-500/5 rounded-full blur-3xl pointer-events-none"></div>

    <div class="flex flex-col md:flex-row items-start md:items-center justify-between mb-10 gap-4 border-b border-white/5 pb-6">
        <div>
            <h2 class="text-2xl font-black text-text-main tracking-tight">Link Management Engine</h2>
            <p class="text-sm text-text-muted mt-2 max-w-2xl">Toggle the 50 advanced capabilities dynamically across the platform. Disabling a feature hides it from the user interface and disables related API endpoints instantly.</p>
        </div>
        <div class="flex items-center gap-3 w-full md:w-auto">
            <span class="px-3 py-1 rounded-full bg-cyan-500/10 text-cyan-500 text-xs font-bold uppercase tracking-widest border border-cyan-500/20 shadow-md flex items-center gap-2">
                <span class="w-2 h-2 rounded-full bg-cyan-500 animate-pulse"></span>
                {{ $features->count() }} Features Loaded
            </span>
        </div>
    </div>

    <!-- Features Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
        @foreach($features as $feature)
        <div class="p-4 rounded-2xl bg-black/5 dark:bg-white/5 border border-white/5 hover:border-cyan-500/30 transition-all flex items-center justify-between group">
            <div class="flex items-center gap-3 overflow-hidden">
                <div class="w-8 h-8 rounded-lg bg-white/5 text-text-muted group-hover:text-cyan-500 group-hover:bg-cyan-500/10 transition-colors flex flex-shrink-0 items-center justify-center">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                </div>
                <span class="font-bold text-sm text-text-main truncate" title="{{ $feature->name }}">{{ $feature->name }}</span>
            </div>
            
            <!-- Tailwind Toggle Switch -->
            <label class="relative inline-flex items-center cursor-pointer flex-shrink-0 ml-2">
                <input type="checkbox" class="sr-only peer feature-toggle" data-id="{{ $feature->id }}" {{ $feature->is_enabled ? 'checked' : '' }}>
                <div class="w-9 h-5 bg-white/10 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-cyan-500"></div>
            </label>
        </div>
        @endforeach
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
                const response = await fetch(`/admin/link-features/${featureId}/toggle`, {
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
                alert('Failed to update feature status. Check console for details.');
            }
        });
    });
</script>
@endsection