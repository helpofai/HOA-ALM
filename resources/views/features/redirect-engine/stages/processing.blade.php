@extends('themes.linkOne.app')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
        
        <!-- Main Content Area (Blog Post 2) -->
        <div class="lg:col-span-8">
            <div id="top-btn-anchor" class="mb-10 flex justify-center">
                <div id="top-btn-container" class="opacity-0 translate-y-4 transition-all duration-700 pointer-events-none">
                    <a href="{{ route('secure.transit', ['payload' => $token]) }}" class="px-10 py-5 rounded-[2rem] bg-white/5 border border-white/10 text-text-main text-lg font-black hover:bg-white/10 hover:border-purple-500/30 transition-all flex items-center gap-3 group shadow-2xl">
                        Final Step: Unlock Ultimate Destination
                        <svg class="w-6 h-6 text-purple-500 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </a>
                </div>
            </div>

            @if($randomPost)
                <article class="bg-white/5 border border-white/10 rounded-[3rem] p-10 backdrop-blur-md relative overflow-hidden">
                    <div class="absolute -top-20 -left-20 w-64 h-64 bg-purple-500/5 rounded-full blur-[80px]"></div>
                    
                    <header class="mb-10">
                        <div class="flex items-center gap-4 mb-6">
                            <span class="px-3 py-1 rounded-full bg-purple-500/10 border border-purple-500/20 text-purple-400 text-[10px] font-bold uppercase tracking-widest">Recommended Article</span>
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

                    <div class="prose prose-invert prose-purple max-w-none text-text-muted leading-relaxed text-lg mb-12">
                        {!! $randomPost->content !!}
                    </div>

                    <div class="p-8 rounded-3xl bg-black/40 border border-white/5 text-center mb-10">
                        <h4 class="text-sm font-black text-text-main uppercase tracking-widest mb-2">Redirection Progress</h4>
                        <p class="text-xs text-text-muted">You are on the final check phase. Once our secure node verification finishes resolving on the right panel, you can access your destination link immediately.</p>
                    </div>

                    <div id="bottom-btn-anchor" class="flex justify-center pt-8 border-t border-white/5">
                        <div id="bottom-btn-container" class="opacity-0 -translate-y-4 transition-all duration-700 pointer-events-none delay-200">
                            <a href="{{ route('secure.transit', ['payload' => $token]) }}" class="px-10 py-5 rounded-[2rem] bg-primary-gradient text-white text-lg font-black shadow-2xl shadow-purple-500/25 hover:shadow-purple-500/40 transition-all hover:scale-105 active:scale-95 flex items-center gap-3">
                                Get Your Destination Link
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                            </a>
                        </div>
                    </div>
                </article>
            @else
                <div class="bg-white/5 border border-white/10 rounded-[3rem] p-12 text-center backdrop-blur-md">
                    <h2 class="text-2xl font-black text-text-main mb-4">Resolving Destination Node...</h2>
                    <p class="text-text-muted mb-8 leading-relaxed">Securing downstream link variables. This prevents scraper detection systems from recording your footprints.</p>
                    <div id="bottom-btn-container-fallback" class="opacity-0 transition-opacity duration-700 pointer-events-none">
                         <a href="{{ route('secure.transit', ['payload' => $token]) }}" class="px-10 py-5 rounded-full bg-primary-gradient text-white text-lg font-black">Get Link</a>
                    </div>
                </div>
            @endif
        </div>

        <!-- Sidebar (Stats & Countdown) -->
        <div class="lg:col-span-4 space-y-8">
            <div class="sticky top-32">
                <div class="p-10 rounded-[3rem] bg-black/40 border border-white/10 backdrop-blur-xl relative overflow-hidden group">
                    <div class="absolute inset-0 bg-gradient-to-br from-purple-500/5 to-cyan-500/5 opacity-50"></div>
                    
                    <div class="relative z-10 text-center">
                         <div class="w-20 h-20 rounded-[2rem] bg-gradient-to-br from-purple-500 to-cyan-500 flex items-center justify-center mx-auto mb-6 shadow-2xl">
                            <svg class="w-10 h-10 text-white animate-spin-slow" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                        </div>
                        
                        <h3 class="text-xl font-black text-text-main mb-2">Transit Generation</h3>
                        <p class="text-sm text-text-muted mb-8 leading-relaxed">Building end-to-end token gateway protocols.</p>

                        <!-- Timer Bar -->
                        <div class="w-full h-3 bg-white/5 rounded-full overflow-hidden mb-6 border border-white/10">
                            <div id="progress-bar" class="h-full bg-primary-gradient transition-all duration-1000 ease-linear rounded-full" style="width: 0%"></div>
                        </div>

                        <div class="flex items-center justify-center gap-3">
                            <span id="countdown" class="text-xl font-black text-text-main">5</span>
                            <p id="status-text" class="text-[10px] font-bold text-purple-400 uppercase tracking-[0.2em] animate-pulse">Decrypting Path...</p>
                        </div>
                    </div>
                </div>

                <div class="mt-8 p-8 rounded-[2.5rem] bg-white/5 border border-white/10">
                    <h4 class="text-xs font-black text-text-main uppercase tracking-widest mb-4">Sponsor Area</h4>
                    <div class="h-48 rounded-2xl bg-black/40 border border-white/5 flex items-center justify-center">
                        <span class="text-text-dim text-[10px] uppercase font-bold tracking-[0.2em]">Premium Advertisement</span>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<style>
    @keyframes spin-slow {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }
    .animate-spin-slow {
        animation: spin-slow 3s linear infinite;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        let timeLeft = 5;
        const totalTime = 5;
        const countdownEl = document.getElementById('countdown');
        const barEl = document.getElementById('progress-bar');
        const statusText = document.getElementById('status-text');
        const topBtn = document.getElementById('top-btn-container');
        const bottomBtn = document.getElementById('bottom-btn-container');
        const fallbackBtn = document.getElementById('bottom-btn-container-fallback');
        
        const interval = setInterval(() => {
            timeLeft--;
            if (countdownEl) countdownEl.textContent = timeLeft;
            
            // Update Bar
            if (barEl) {
                const progress = ((totalTime - timeLeft) / totalTime) * 100;
                barEl.style.width = progress + '%';
            }

            if (timeLeft <= 3 && statusText) statusText.textContent = "Cleansing Transit Node...";
            if (timeLeft <= 1 && statusText) statusText.textContent = "Finalizing Secure Route...";

            if (timeLeft <= 0) {
                clearInterval(interval);
                if (countdownEl) countdownEl.innerHTML = '<svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>';
                if (statusText) {
                    statusText.textContent = "Route Ready.";
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
