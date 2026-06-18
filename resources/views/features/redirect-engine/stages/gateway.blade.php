@extends('themes.linkOne.app')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
        
        <!-- Main Content Area (Blog Post) -->
        <div class="lg:col-span-8">
            <div id="top-btn-anchor" class="mb-10 flex justify-center">
                <div id="top-btn-container" class="opacity-0 translate-y-4 transition-all duration-700 pointer-events-none">
                    <a href="{{ route('secure.intermediate', ['payload' => $token]) }}" class="px-10 py-5 rounded-[2rem] bg-white/5 border border-white/10 text-text-main text-lg font-black hover:bg-white/10 hover:border-cyan-500/30 transition-all flex items-center gap-3 group shadow-2xl">
                        Continue to Destination
                        <svg class="w-6 h-6 text-cyan-500 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>
                    </a>
                </div>
            </div>

            @if($randomPost)
                <article class="bg-white/5 border border-white/10 rounded-[3rem] p-10 backdrop-blur-md relative overflow-hidden">
                    <div class="absolute -top-20 -right-20 w-64 h-64 bg-cyan-500/5 rounded-full blur-[80px]"></div>
                    
                    <header class="mb-10">
                        <div class="flex items-center gap-4 mb-6">
                            <span class="px-3 py-1 rounded-full bg-cyan-500/10 border border-cyan-500/20 text-cyan-500 text-[10px] font-bold uppercase tracking-widest">Trending Now</span>
                            <span class="text-text-dim text-xs font-bold">{{ $randomPost->created_at->format('M d, Y') }}</span>
                        </div>
                        <h1 class="text-4xl md:text-5xl font-black text-text-main tracking-tighter leading-tight mb-6">
                            {{ $randomPost->title }}
                        </h1>
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-primary-gradient flex items-center justify-center text-white font-bold text-xs shadow-lg">
                                {{ substr($randomPost->author->name ?? 'A', 0, 1) }}
                            </div>
                            <div>
                                <p class="text-sm font-bold text-text-main leading-none">{{ $randomPost->author->name ?? 'Intelligence Engine' }}</p>
                                <p class="text-[10px] text-text-dim uppercase tracking-widest font-black mt-1">Verified Author</p>
                            </div>
                        </div>
                    </header>

                    @if($randomPost->featured_image)
                        <div class="mb-10 rounded-[2.5rem] overflow-hidden border border-white/5 shadow-2xl">
                            <img src="{{ asset('storage/' . $randomPost->featured_image) }}" alt="{{ $randomPost->title }}" class="w-full h-auto object-cover max-h-[400px]">
                        </div>
                    @endif

                    <div class="prose prose-invert prose-cyan max-w-none text-text-muted leading-relaxed text-lg mb-12">
                        {!! $randomPost->content !!}
                    </div>

                    <div class="p-8 rounded-3xl bg-black/40 border border-white/5 text-center mb-10">
                        <h4 class="text-sm font-black text-text-main uppercase tracking-widest mb-2">Notice</h4>
                        <p class="text-xs text-text-muted">The link you requested is currently being validated for safety. Please review the content above while we finalize the cryptographic handshake.</p>
                    </div>

                    <div id="bottom-btn-anchor" class="flex justify-center pt-8 border-t border-white/5">
                        <div id="bottom-btn-container" class="opacity-0 -translate-y-4 transition-all duration-700 pointer-events-none delay-200">
                            <a href="{{ route('secure.intermediate', ['payload' => $token]) }}" class="px-10 py-5 rounded-[2rem] bg-primary-gradient text-white text-lg font-black shadow-2xl shadow-cyan-500/25 hover:shadow-cyan-500/40 transition-all hover:scale-105 active:scale-95 flex items-center gap-3">
                                Get Your Link Now
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </a>
                        </div>
                    </div>
                </article>
            @else
                <div class="bg-white/5 border border-white/10 rounded-[3rem] p-12 text-center backdrop-blur-md">
                    <h2 class="text-2xl font-black text-text-main mb-4">Establishing Secure Node...</h2>
                    <p class="text-text-muted mb-8 leading-relaxed">Our intelligence layer is preparing your destination. This process ensures zero bot interference and military-grade privacy.</p>
                    <div id="bottom-btn-container-fallback" class="opacity-0 transition-opacity duration-700 pointer-events-none">
                         <a href="{{ route('secure.intermediate', ['payload' => $token]) }}" class="px-10 py-5 rounded-full bg-primary-gradient text-white text-lg font-black">Continue</a>
                    </div>
                </div>
            @endif
        </div>

        <!-- Sidebar (Stats & Countdown) -->
        <div class="lg:col-span-4 space-y-8">
            <div class="sticky top-32">
                <div class="p-10 rounded-[3rem] bg-black/40 border border-white/10 backdrop-blur-xl relative overflow-hidden group">
                    <div class="absolute inset-0 bg-gradient-to-br from-cyan-500/5 to-purple-500/5 opacity-50"></div>
                    
                    <div class="relative z-10 text-center">
                         <div class="w-20 h-20 rounded-[2rem] bg-primary-gradient flex items-center justify-center mx-auto mb-6 shadow-2xl shadow-cyan-500/20">
                            <svg class="w-10 h-10 text-white animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                        </div>
                        
                        <h3 class="text-xl font-black text-text-main mb-2">Security Scanning</h3>
                        <p class="text-sm text-text-muted mb-8 leading-relaxed">Verifying visitor intent & cleansing traffic nodes.</p>

                        <!-- Timer Circle -->
                        <div class="relative w-32 h-32 mx-auto mb-10">
                            <svg class="w-full h-full transform -rotate-90" viewBox="0 0 100 100">
                                <circle cx="50" cy="50" r="45" fill="none" stroke="currentColor" stroke-width="6" class="text-white/5"></circle>
                                <circle id="timer-progress" cx="50" cy="50" r="45" fill="none" stroke="currentColor" stroke-width="6" stroke-dasharray="282.7" stroke-dashoffset="0" class="text-cyan-500 transition-all duration-1000 ease-linear rounded-full"></circle>
                            </svg>
                            <div class="absolute inset-0 flex items-center justify-center">
                                <span id="countdown" class="text-4xl font-black text-text-main tracking-tighter">5</span>
                            </div>
                        </div>

                        <p id="status-text" class="text-[10px] font-bold text-cyan-500 uppercase tracking-[0.3em] animate-pulse">Initializing Link...</p>
                    </div>
                </div>

                <div class="mt-8 p-8 rounded-[2.5rem] bg-white/5 border border-white/10">
                    <h4 class="text-xs font-black text-text-main uppercase tracking-widest mb-4">Ad space / Banner</h4>
                    <div class="h-48 rounded-2xl bg-black/40 border border-white/5 flex items-center justify-center">
                        <span class="text-text-dim text-[10px] uppercase font-bold tracking-[0.2em]">Premium Advertisement</span>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        let timeLeft = 5;
        const countdownEl = document.getElementById('countdown');
        const progressEl = document.getElementById('timer-progress');
        const statusText = document.getElementById('status-text');
        const topBtn = document.getElementById('top-btn-container');
        const bottomBtn = document.getElementById('bottom-btn-container');
        const fallbackBtn = document.getElementById('bottom-btn-container-fallback');
        
        const circumference = 2 * Math.PI * 45;
        const interval = setInterval(() => {
            timeLeft--;
            if (countdownEl) countdownEl.textContent = timeLeft;
            
            // Update Circle
            if (progressEl) {
                const offset = circumference - (timeLeft / 5) * circumference;
                progressEl.style.strokeDashoffset = offset;
            }

            if (timeLeft <= 3 && statusText) statusText.textContent = "Cleansing Redirect Path...";
            if (timeLeft <= 1 && statusText) statusText.textContent = "Finalizing Handshake...";

            if (timeLeft <= 0) {
                clearInterval(interval);
                if (countdownEl) countdownEl.innerHTML = '<svg class="w-10 h-10 text-cyan-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>';
                if (statusText) {
                    statusText.textContent = "Verification Complete.";
                    statusText.classList.remove('animate-pulse');
                    statusText.classList.add('text-green-500');
                }
                
                // Show Buttons
                [topBtn, bottomBtn, fallbackBtn].forEach(el => {
                    if (!el) return;
                    el.classList.remove('opacity-0', 'pointer-events-none', 'translate-y-4', '-translate-y-4');
                    el.classList.add('opacity-100', 'translate-y-0');
                });
            }
        }, 1000);
    });
</script>
@endsection
