@extends('themes.linkOne.app')

@section('content')
<div class="max-w-7xl mx-auto px-6 flex items-center justify-center min-h-[70vh]">
    <div class="w-full max-w-md relative group animate-slide-up">
        <!-- Glow effect -->
        <div class="absolute -inset-1 bg-gradient-to-r from-cyan-500/20 to-purple-600/20 rounded-[3rem] blur-xl opacity-50 transition duration-1000"></div>
        
        <!-- Form Container -->
        <div class="relative p-10 rounded-[2.5rem] bg-white/5 backdrop-blur-3xl border border-white/10 shadow-2xl overflow-hidden">
            <div class="text-center mb-10">
                <h1 class="text-3xl font-black text-text-main tracking-tight mb-2">Welcome Back</h1>
                <p class="text-sm text-text-muted">Enter your credentials to access the intelligence platform.</p>
            </div>

            <form action="#" method="POST" class="space-y-6">
                @csrf
                <div>
                    <label for="email" class="block text-xs font-bold text-text-muted uppercase tracking-widest mb-2">Email Address</label>
                    <input type="email" id="email" name="email" required
                           class="w-full bg-black/5 dark:bg-white/5 border border-black/10 dark:border-white/10 rounded-2xl px-5 py-4 text-text-main placeholder-text-dim focus:outline-none focus:ring-2 focus:ring-cyan-500/50 transition-all font-medium"
                           placeholder="you@company.com">
                </div>

                <div>
                    <div class="flex justify-between items-center mb-2">
                        <label for="password" class="block text-xs font-bold text-text-muted uppercase tracking-widest">Password</label>
                        <a href="#" class="text-xs font-bold text-cyan-500 hover:text-cyan-400 transition-colors">Forgot?</a>
                    </div>
                    <input type="password" id="password" name="password" required
                           class="w-full bg-black/5 dark:bg-white/5 border border-black/10 dark:border-white/10 rounded-2xl px-5 py-4 text-text-main placeholder-text-dim focus:outline-none focus:ring-2 focus:ring-cyan-500/50 transition-all font-medium"
                           placeholder="••••••••">
                </div>

                <button type="submit" class="w-full py-4 rounded-2xl bg-primary-gradient text-white font-black text-lg shadow-[0_10px_30px_-10px_rgba(6,182,212,0.5)] hover:scale-[1.02] active:scale-[0.98] transition-all duration-300 mt-4">
                    Sign In to Dashboard
                </button>
            </form>

            <div class="mt-8 text-center">
                <p class="text-sm text-text-muted font-medium">Don't have an account? <a href="{{ route('register') }}" class="text-cyan-500 hover:text-cyan-400 transition-colors font-bold">Get Started</a></p>
            </div>
        </div>
    </div>
</div>
@endsection