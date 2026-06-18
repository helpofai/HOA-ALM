<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Link-Short-Pro') }} - Dashboard</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased text-text-main selection:bg-cyan-500/30 overflow-hidden">
    <!-- Animated Mesh Background -->
    <div class="bg-mesh">
        <div class="blob blob-1"></div>
        <div class="blob blob-2"></div>
        <div class="blob blob-3"></div>
    </div>

    <div class="flex h-screen w-full p-4 gap-4">
        
        <!-- Sidebar Navigation -->
        <aside id="app-sidebar" class="w-64 rounded-[2rem] bg-white/5 backdrop-blur-2xl border border-white/10 shadow-2xl flex-col hidden md:flex transition-all duration-300 relative z-10 [&.is-collapsed]:w-20 [&.is-collapsed_.sidebar-text]:hidden [&.is-collapsed_.logo-icon]:mx-auto">
            <div class="p-6 pb-2 border-b border-white/5 flex items-center justify-between">
                <a href="/" class="flex items-center gap-3">
                    <div class="logo-icon w-8 h-8 rounded-lg bg-primary-gradient flex flex-shrink-0 items-center justify-center shadow-md transition-all">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path>
                        </svg>
                    </div>
                    <span class="sidebar-text text-lg font-black tracking-tight text-text-main transition-opacity duration-300">Link<span class="text-cyan-500">Pro</span></span>
                </a>
            </div>

            <nav id="sidebar-nav-links" class="flex-1 p-4 space-y-2 overflow-y-auto overflow-x-hidden">
                <p class="sidebar-text text-[10px] font-black tracking-widest uppercase text-text-dim px-2 mb-4 mt-2 transition-opacity duration-300">Menu</p>
                @yield('sidebar-links')
            </nav>

            <div class="p-4 border-t border-white/5">
                <div class="flex items-center gap-3 px-2 mb-4">
                    <div class="logo-icon w-10 h-10 rounded-full bg-gradient-to-br from-cyan-400 to-purple-500 flex flex-shrink-0 items-center justify-center text-white font-bold shadow-lg transition-all">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                    <div class="sidebar-text flex-1 min-w-0 transition-opacity duration-300">
                        <p class="text-sm font-bold text-text-main truncate">{{ Auth::user()->name }}</p>
                        <p class="text-xs font-medium text-text-dim truncate">{{ Auth::user()->email }}</p>
                    </div>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="w-full py-2.5 rounded-xl bg-white/5 hover:bg-red-500/10 text-text-muted hover:text-red-500 transition-colors flex items-center justify-center gap-2 text-sm font-bold border border-white/5">
                        <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                        <span class="sidebar-text transition-opacity duration-300">Sign Out</span>
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Workspace -->
        <main class="flex-1 flex flex-col rounded-[2rem] bg-white/5 backdrop-blur-3xl border border-white/10 shadow-2xl overflow-hidden relative z-10">
            
            <!-- Topbar -->
            <header class="h-20 border-b border-white/5 flex items-center justify-between px-8 bg-black/5 dark:bg-white/5">
                <div class="flex items-center gap-4">
                    <button id="sidebar-toggle" class="p-2 rounded-xl bg-white/5 hover:bg-white/10 text-text-main transition-colors hidden md:block">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"></path></svg>
                    </button>
                    <h1 class="text-xl font-black text-text-main" id="header-title">@yield('header-title', 'Dashboard')</h1>
                </div>
                
                <div class="flex items-center gap-4">
                    <button class="theme-btn" id="theme-toggle" aria-label="Toggle Dark Mode">
                        <div class="theme-icon-wrapper">
                            <svg class="sun" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="5"></circle><line x1="12" y1="1" x2="12" y2="3"></line><line x1="12" y1="21" x2="12" y2="23"></line><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line><line x1="1" y1="12" x2="3" y2="12"></line><line x1="21" y1="12" x2="23" y2="12"></line><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line></svg>
                            <svg class="moon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path></svg>
                        </div>
                    </button>
                    <a href="{{ route('links.create') }}" data-navigate class="px-5 py-2 rounded-xl bg-primary-gradient text-white text-sm font-bold shadow-lg hover:shadow-cyan-500/25 transition-all active:scale-95 whitespace-nowrap">Create Link</a>
                </div>
            </header>

            <!-- Scrollable Content -->
            <div id="dashboard-content" class="flex-1 overflow-y-auto p-8 relative transition-opacity duration-300">
                @yield('content')
            </div>

        </main>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            // Theme Toggle
            const themeToggle = document.getElementById("theme-toggle");
            themeToggle.addEventListener("click", () => {
                const root = document.documentElement;
                const isDark = root.getAttribute("data-theme") === "dark";
                root.setAttribute("data-theme", isDark ? "light" : "dark");
            });

            // Sidebar Collapse Toggle
            const sidebar = document.getElementById('app-sidebar');
            const sidebarToggle = document.getElementById('sidebar-toggle');
            if(sidebarToggle) {
                sidebarToggle.addEventListener('click', () => {
                    sidebar.classList.toggle('is-collapsed');
                });
            }

            // SPA Navigation Logic
            document.addEventListener('click', async (e) => {
                const link = e.target.closest('a[data-navigate]');
                if (link) {
                    e.preventDefault();
                    const url = link.href;
                    if (url === window.location.href) return;

                    const contentArea = document.getElementById('dashboard-content');
                    
                    // Show Loading State
                    contentArea.style.opacity = '0.4';
                    contentArea.style.pointerEvents = 'none';

                    try {
                        const response = await fetch(url, {
                            headers: { 'X-Requested-With': 'XMLHttpRequest' }
                        });
                        
                        if (!response.ok) throw new Error('Network response was not ok');
                        
                        const html = await response.text();
                        const parser = new DOMParser();
                        const doc = parser.parseFromString(html, 'text/html');

                        // Replace partial contents smoothly
                        document.getElementById('dashboard-content').innerHTML = doc.getElementById('dashboard-content').innerHTML;
                        document.getElementById('header-title').innerHTML = doc.getElementById('header-title').innerHTML;
                        document.getElementById('sidebar-nav-links').innerHTML = doc.getElementById('sidebar-nav-links').innerHTML;
                        document.title = doc.title;

                        // Update URL
                        history.pushState(null, '', url);
                    } catch (error) {
                        console.error('SPA Navigation Error:', error);
                        window.location.href = url; // Fallback to standard page load
                    } finally {
                        // Restore state
                        contentArea.style.opacity = '1';
                        contentArea.style.pointerEvents = 'auto';
                        
                        // Re-trigger enter animations by removing and re-adding classes if necessary
                        const animatedElements = document.querySelectorAll('#dashboard-content .animate-fade-in');
                        animatedElements.forEach(el => {
                            el.classList.remove('animate-fade-in');
                            void el.offsetWidth; // Trigger reflow
                            el.classList.add('animate-fade-in');
                        });
                    }
                }
            });

            // Handle browser back/forward buttons
            window.addEventListener('popstate', () => {
                window.location.reload(); 
            });
        });
    </script>
</body>
</html>