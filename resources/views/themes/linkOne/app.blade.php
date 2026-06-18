<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Link-Short-Pro') }} - World's #1 Link Intelligence</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />

    <!-- Scripts and Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased text-text-main selection:bg-cyan-500/30">
    <!-- Animated Mesh Background -->
    <div class="bg-mesh">
        <div class="blob blob-1"></div>
        <div class="blob blob-2"></div>
        <div class="blob blob-3"></div>
    </div>

    <!-- Main Header -->
    <header class="fixed top-0 left-0 right-0 z-50 flex justify-center p-6">
        <div class="w-full max-w-7xl flex items-center px-6 py-3 rounded-full bg-white/5 backdrop-blur-xl border border-white/10 shadow-2xl">
            <!-- Left: Logo -->
            <div class="flex-1 flex justify-start">
                <a href="/" class="flex items-center gap-3 group">
                    <div class="w-10 h-10 rounded-xl bg-primary-gradient flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path>
                        </svg>
                    </div>
                    <span class="text-xl font-extrabold tracking-tight hidden md:block">Link<span class="text-cyan-400">Short</span>Pro</span>
                </a>
            </div>

            <!-- Center: Navigation -->
            <div class="flex-none">
                <nav class="liquid-nav" id="main-nav">
                    <div class="liquid-glare-container">
                        <div class="liquid-glare" id="nav-glare"></div>
                    </div>
                    <div class="nav-items">
                        <div class="active-pill" id="active-pill"></div>
                        <button class="nav-btn active" data-nav="home">
                            <div class="btn-content"><span>Home</span></div>
                        </button>
                        <button class="nav-btn" data-nav="features">
                            <div class="btn-content"><span>Features</span></div>
                        </button>
                        <button class="nav-btn" data-nav="pricing">
                            <div class="btn-content"><span>Pricing</span></div>
                        </button>
                    </div>
                    <div class="divider"></div>
                    <button class="theme-btn" id="theme-toggle" aria-label="Toggle Dark Mode">
                        <div class="theme-icon-wrapper">
                            <svg class="sun" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="5"></circle><line x1="12" y1="1" x2="12" y2="3"></line><line x1="12" y1="21" x2="12" y2="23"></line><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line><line x1="1" y1="12" x2="3" y2="12"></line><line x1="21" y1="12" x2="23" y2="12"></line><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line></svg>
                            <svg class="moon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path></svg>
                        </div>
                    </button>
                </nav>
            </div>

            <!-- Right: CTA Actions -->
            <div class="flex-1 flex justify-end items-center gap-4">
                @auth
                    @if(Auth::user()->role === \App\Shared\Enums\SharedRoleEnum::ADMIN->value)
                        <a href="{{ route('admin.dashboard') }}" class="px-6 py-2.5 rounded-full bg-primary-gradient text-white text-sm font-bold shadow-lg hover:shadow-cyan-500/25 transition-all active:scale-95 whitespace-nowrap flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                            Go to Dashboard
                        </a>
                    @else
                        <a href="{{ route('user.dashboard') }}" class="px-6 py-2.5 rounded-full bg-primary-gradient text-white text-sm font-bold shadow-lg hover:shadow-cyan-500/25 transition-all active:scale-95 whitespace-nowrap flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                            Go to Dashboard
                        </a>
                    @endif
                @else
                    <a href="{{ route('login') }}" class="text-sm font-semibold opacity-70 hover:opacity-100 transition-opacity hidden lg:block">Sign In</a>
                    <a href="{{ route('register') }}" class="px-6 py-2.5 rounded-full bg-primary-gradient text-white text-sm font-bold shadow-lg hover:shadow-cyan-500/25 transition-all active:scale-95 whitespace-nowrap">Get Started</a>
                @endauth
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="pt-32 pb-20">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="p-10 flex flex-col items-center">
        <div class="w-full max-w-7xl px-8 py-12 rounded-[3rem] bg-white/5 backdrop-blur-xl border border-white/10 grid grid-cols-1 md:grid-cols-4 gap-12">
            <div class="col-span-1 md:col-span-1">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-8 h-8 rounded-lg bg-primary-gradient flex items-center justify-center shadow-md">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path>
                        </svg>
                    </div>
                    <span class="text-lg font-black tracking-tight text-text-main">Link<span class="text-cyan-500">Short</span>Pro</span>
                </div>
                <p class="text-sm text-text-muted leading-relaxed mb-6 italic">World's most advanced link management platform with real-time intelligence and behavioral redirects.</p>
                <div class="flex gap-4">
                    <a href="#" class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center hover:bg-white/10 transition-colors border border-white/5 group">
                        <svg class="w-5 h-5 text-text-muted group-hover:text-text-main transition-colors" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.84 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center hover:bg-white/10 transition-colors border border-white/5 group">
                        <svg class="w-5 h-5 text-text-muted group-hover:text-text-main transition-colors" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C5.373 0 0 5.373 0 12c0 5.302 3.438 9.8 8.207 11.387.6.113.793-.261.793-.577v-2.234c-3.338.726-4.042-1.416-4.042-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576C20.566 21.797 24 17.3 24 12c0-6.627-5.373-12-12-12z"/></svg>
                    </a>
                </div>
            </div>

            <div>
                <h4 class="font-bold text-text-main mb-6 uppercase tracking-widest text-xs">Product</h4>
                <ul class="space-y-4 text-sm font-medium">
                    <li><a href="#" class="text-text-muted hover:text-cyan-500 transition-colors">Features</a></li>
                    <li><a href="#" class="text-text-muted hover:text-cyan-500 transition-colors">Custom Domains</a></li>
                    <li><a href="#" class="text-text-muted hover:text-cyan-500 transition-colors">QR Codes</a></li>
                    <li><a href="#" class="text-text-muted hover:text-cyan-500 transition-colors">Bio Pages</a></li>
                </ul>
            </div>

            <div>
                <h4 class="font-bold text-text-main mb-6 uppercase tracking-widest text-xs">Resources</h4>
                <ul class="space-y-4 text-sm font-medium">
                    <li><a href="#" class="text-text-muted hover:text-cyan-500 transition-colors">API Documentation</a></li>
                    <li><a href="#" class="text-text-muted hover:text-cyan-500 transition-colors">Blog</a></li>
                    <li><a href="#" class="text-text-muted hover:text-cyan-500 transition-colors">Help Center</a></li>
                    <li><a href="#" class="text-text-muted hover:text-cyan-500 transition-colors">Integrations</a></li>
                </ul>
            </div>

            <div>
                <h4 class="font-bold text-text-main mb-6 uppercase tracking-widest text-xs">Company</h4>
                <ul class="space-y-4 text-sm font-medium">
                    <li><a href="#" class="text-text-muted hover:text-cyan-500 transition-colors">About Us</a></li>
                    <li><a href="#" class="text-text-muted hover:text-cyan-500 transition-colors">Privacy Policy</a></li>
                    <li><a href="#" class="text-text-muted hover:text-cyan-500 transition-colors">Terms of Service</a></li>
                    <li><a href="#" class="text-text-muted hover:text-cyan-500 transition-colors">Contact Support</a></li>
                </ul>
            </div>
        </div>
        <div class="w-full text-center mt-12 text-text-dim text-xs font-bold tracking-widest uppercase">
            &copy; {{ date('Y') }} LinkShortPro. Built with Advanced Logic.
        </div>
    </footer>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const navButtons = document.querySelectorAll(".nav-btn");
            const activePill = document.getElementById("active-pill");
            const themeToggle = document.getElementById("theme-toggle");
            const nav = document.getElementById("main-nav");
            const glare = document.getElementById("nav-glare");

            function updatePill(btn, smooth = true) {
                if (!btn) return;
                if (!smooth) activePill.style.transition = 'none';
                else activePill.style.transition = 'transform 0.5s cubic-bezier(0.34, 1.2, 0.64, 1), width 0.5s cubic-bezier(0.34, 1.2, 0.64, 1), background 0.5s ease, box-shadow 0.5s ease';
                activePill.style.width = `${btn.offsetWidth}px`;
                activePill.style.transform = `translateX(${btn.offsetLeft}px)`;
            }

            const initialActive = document.querySelector(".nav-btn.active");
            if (initialActive) setTimeout(() => { updatePill(initialActive, false); void activePill.offsetWidth; }, 50);

            navButtons.forEach(btn => {
                btn.addEventListener("click", () => {
                    navButtons.forEach(b => b.classList.remove("active"));
                    btn.classList.add("active");
                    updatePill(btn);
                });
            });

            themeToggle.addEventListener("click", () => {
                const root = document.documentElement;
                const isDark = root.getAttribute("data-theme") === "dark";
                root.setAttribute("data-theme", isDark ? "light" : "dark");
                setTimeout(() => {
                    const active = document.querySelector(".nav-btn.active");
                    if (active) updatePill(active);
                }, 100);
            });

            window.addEventListener("resize", () => {
                const active = document.querySelector(".nav-btn.active");
                if (active) updatePill(active, false);
            });

            nav.addEventListener("mousemove", (e) => {
                const rect = nav.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;
                glare.style.setProperty("--x", `${x}px`);
                glare.style.setProperty("--y", `${y}px`);
            });
        });
    </script>
</body>
</html>
