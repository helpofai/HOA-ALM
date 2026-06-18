@extends('themes.linkOne.app')

@section('content')
<div class="relative overflow-hidden">
    <!-- Hero Section -->
    <section class="max-w-7xl mx-auto px-6 pt-20 pb-32 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div class="animate-fade-in-up">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-cyan-500/10 border border-cyan-500/20 text-cyan-400 text-xs font-bold uppercase tracking-widest mb-8">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-cyan-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-cyan-500"></span>
                    </span>
                    The Intelligence Era is Here
                </div>
                
                <h1 class="text-6xl md:text-8xl font-black tracking-tighter leading-[0.9] text-text-main mb-8">
                    World's #1 <br/>
                    <span class="bg-primary-gradient bg-clip-text text-transparent">Link Intelligence</span> <br/>
                    Platform.
                </h1>
                
                <p class="text-xl text-text-muted font-medium leading-relaxed max-w-xl mb-12">
                    Don't just shorten URLs. Own your traffic with deep-level analytics, behavioral redirects, and enterprise-grade security protocols. 
                </p>
                
                <div class="flex flex-col sm:flex-row items-center gap-6">
                    <a href="{{ route('register') }}" class="w-full sm:w-auto px-10 py-5 rounded-[2rem] bg-primary-gradient text-white text-lg font-black shadow-2xl shadow-cyan-500/25 hover:shadow-cyan-500/40 transition-all hover:scale-105 active:scale-95">
                        Start Building for Free
                    </a>
                    <a href="#features" class="flex items-center gap-3 text-text-main font-bold hover:text-cyan-500 transition-colors group">
                        See how it works
                        <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    </a>
                </div>
                
                <div class="mt-16 flex items-center gap-8 opacity-50 grayscale hover:opacity-100 hover:grayscale-0 transition-all duration-500">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/2/2f/Google_2015_logo.svg" alt="Google" class="h-6">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a9/Amazon_logo.svg/1024px-Amazon_logo.svg.png" alt="Amazon" class="h-6">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/08/Netflix_2015_logo.svg/2560px-Netflix_2015_logo.svg.png" alt="Netflix" class="h-6">
                </div>
            </div>
            
            <!-- Hero Visual -->
            <div class="relative animate-float">
                <div class="absolute -inset-10 bg-cyan-500/20 rounded-full blur-[120px]"></div>
                <div class="relative bg-white/5 backdrop-blur-3xl border border-white/10 rounded-[3rem] p-4 shadow-2xl overflow-hidden group">
                    <div class="absolute inset-0 bg-gradient-to-br from-cyan-500/10 via-transparent to-purple-500/10"></div>
                    
                    <!-- Dashboard Mockup UI -->
                    <div class="relative bg-black/40 rounded-[2.5rem] border border-white/5 overflow-hidden">
                        <div class="p-6 border-b border-white/10 flex items-center justify-between bg-white/5">
                            <div class="flex gap-2">
                                <div class="w-3 h-3 rounded-full bg-red-500/50"></div>
                                <div class="w-3 h-3 rounded-full bg-yellow-500/50"></div>
                                <div class="w-3 h-3 rounded-full bg-green-500/50"></div>
                            </div>
                            <div class="px-4 py-1.5 rounded-full bg-white/5 border border-white/10 text-[10px] font-bold text-text-dim uppercase tracking-widest">
                                link intelligence dashboard
                            </div>
                            <div class="w-6 h-6 rounded-lg bg-white/10"></div>
                        </div>
                        <div class="p-8 space-y-8">
                            <div class="grid grid-cols-3 gap-4">
                                <div class="h-24 rounded-2xl bg-white/5 border border-white/5 p-4">
                                    <div class="w-8 h-8 rounded-lg bg-cyan-500/20 mb-3"></div>
                                    <div class="h-2 w-12 bg-white/10 rounded-full"></div>
                                </div>
                                <div class="h-24 rounded-2xl bg-white/5 border border-white/5 p-4">
                                    <div class="w-8 h-8 rounded-lg bg-purple-500/20 mb-3"></div>
                                    <div class="h-2 w-12 bg-white/10 rounded-full"></div>
                                </div>
                                <div class="h-24 rounded-2xl bg-white/5 border border-white/5 p-4">
                                    <div class="w-8 h-8 rounded-lg bg-green-500/20 mb-3"></div>
                                    <div class="h-2 w-12 bg-white/10 rounded-full"></div>
                                </div>
                            </div>
                            <div class="h-48 rounded-3xl bg-white/5 border border-white/5 relative overflow-hidden">
                                <svg class="absolute inset-0 w-full h-full text-cyan-500/20" preserveAspectRatio="none" viewBox="0 0 400 200">
                                    <path d="M0 150 Q 50 130 100 140 T 200 80 T 300 120 T 400 50" fill="none" stroke="currentColor" stroke-width="4" stroke-linecap="round"></path>
                                </svg>
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <div class="px-4 py-2 rounded-xl bg-cyan-500 shadow-lg text-[10px] font-black text-white uppercase tracking-tighter">
                                        +428% Conversion
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="border-y border-white/5 bg-white/2 pb-20 pt-20">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-12">
                <div class="text-center">
                    <p class="text-5xl font-black text-text-main mb-2">12M+</p>
                    <p class="text-xs font-bold text-text-muted uppercase tracking-[0.2em]">Links Created</p>
                </div>
                <div class="text-center">
                    <p class="text-5xl font-black text-text-main mb-2">850M+</p>
                    <p class="text-xs font-bold text-text-muted uppercase tracking-[0.2em]">Monthly Clicks</p>
                </div>
                <div class="text-center">
                    <p class="text-5xl font-black text-text-main mb-2">99.9%</p>
                    <p class="text-xs font-bold text-text-muted uppercase tracking-[0.2em]">Uptime SLA</p>
                </div>
                <div class="text-center">
                    <p class="text-5xl font-black text-text-main mb-2">140+</p>
                    <p class="text-xs font-bold text-text-muted uppercase tracking-[0.2em]">Countries Served</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="max-w-7xl mx-auto px-6 py-32">
        <div class="text-center mb-24">
            <h2 class="text-4xl md:text-5xl font-black text-text-main tracking-tight mb-4">Engineered for Dominance.</h2>
            <p class="text-lg text-text-muted max-w-2xl mx-auto">Standard shorteners are basic. We built an intelligence engine that works like an advanced AI to optimize every single click.</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Feature 1 -->
            <div class="p-10 rounded-[3rem] bg-white/5 border border-white/10 hover:bg-white/10 transition-all group">
                <div class="w-14 h-14 rounded-2xl bg-cyan-500/20 text-cyan-400 flex items-center justify-center mb-8 group-hover:scale-110 transition-transform">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-text-main mb-4 text-white">Military-Grade Security</h3>
                <p class="text-text-muted leading-relaxed">Multi-page Secure Gateway flow to block headless bots, scrapers, and automated threats in real-time.</p>
            </div>
            
            <!-- Feature 2 -->
            <div class="p-10 rounded-[3rem] bg-white/5 border border-white/10 hover:bg-white/10 transition-all group">
                <div class="w-14 h-14 rounded-2xl bg-purple-500/20 text-purple-400 flex items-center justify-center mb-8 group-hover:scale-110 transition-transform">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-text-main mb-4 text-white">Behavioral Redirects</h3>
                <p class="text-text-muted leading-relaxed">Dynamically route visitors based on their device, location, and previous engagement history.</p>
            </div>
            
            <!-- Feature 3 -->
            <div class="p-10 rounded-[3rem] bg-white/5 border border-white/10 hover:bg-white/10 transition-all group">
                <div class="w-14 h-14 rounded-2xl bg-green-500/20 text-green-400 flex items-center justify-center mb-8 group-hover:scale-110 transition-transform">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-text-main mb-4 text-white">Infinite Scalability</h3>
                <p class="text-text-muted leading-relaxed">Built on a Feature-First Modular Architecture designed to handle millions of clicks per second with ease.</p>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="max-w-7xl mx-auto px-6 py-32">
        <div class="relative rounded-[4rem] bg-primary-gradient p-1 bg-white/5">
             <div class="bg-black/90 rounded-[3.9rem] px-8 py-24 text-center overflow-hidden relative">
                 <!-- Ambient Background -->
                 <div class="absolute -left-20 -top-20 w-96 h-96 bg-cyan-500/20 rounded-full blur-[100px]"></div>
                 <div class="absolute -right-20 -bottom-20 w-96 h-96 bg-purple-500/20 rounded-full blur-[100px]"></div>
                 
                 <h2 class="text-5xl md:text-7xl font-black text-white tracking-tighter mb-8 relative z-10">Ready to evolve your <br/> Link Strategy?</h2>
                 <p class="text-xl text-cyan-200/60 mb-12 max-w-xl mx-auto relative z-10">Join 10,000+ marketers and developers using the world's most intelligent link platform.</p>
                 <a href="{{ route('register') }}" class="inline-block px-12 py-6 rounded-full bg-white text-black text-xl font-black shadow-2xl hover:scale-105 active:scale-95 transition-all relative z-10">
                    Get Started for Free
                 </a>
             </div>
        </div>
    </section>
</div>
@endsection
