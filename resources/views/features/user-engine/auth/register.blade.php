@extends('themes.linkOne.app')

@section('content')
<div class="max-w-7xl mx-auto px-6 flex items-center justify-center min-h-[70vh]">
    <div class="w-full max-w-lg relative group animate-slide-up">
        <!-- Glow effect -->
        <div class="absolute -inset-1 bg-gradient-to-r from-purple-600/20 to-orange-500/20 rounded-[3rem] blur-xl opacity-50 transition duration-1000"></div>
        
        <!-- Form Container -->
        <div class="relative p-10 rounded-[2.5rem] bg-white/5 backdrop-blur-3xl border border-white/10 shadow-2xl overflow-hidden">
            <div class="text-center mb-10">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/5 border border-white/10 mb-4">
                    <span class="text-[9px] font-bold tracking-[0.2em] uppercase text-text-dim">Free 14-Day Trial</span>
                </div>
                <h1 class="text-3xl font-black text-text-main tracking-tight mb-2">Create Account</h1>
                <p class="text-sm text-text-muted">Start dominating your link intelligence today.</p>
            </div>

            <form action="#" method="POST" class="space-y-6">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="first_name" class="block text-xs font-bold text-text-muted uppercase tracking-widest mb-2">First Name</label>
                        <input type="text" id="first_name" name="first_name" required
                               class="w-full bg-black/5 dark:bg-white/5 border border-black/10 dark:border-white/10 rounded-2xl px-5 py-4 text-text-main placeholder-text-dim focus:outline-none focus:ring-2 focus:ring-purple-500/50 transition-all font-medium"
                               placeholder="John">
                    </div>
                    <div>
                        <label for="last_name" class="block text-xs font-bold text-text-muted uppercase tracking-widest mb-2">Last Name</label>
                        <input type="text" id="last_name" name="last_name" required
                               class="w-full bg-black/5 dark:bg-white/5 border border-black/10 dark:border-white/10 rounded-2xl px-5 py-4 text-text-main placeholder-text-dim focus:outline-none focus:ring-2 focus:ring-purple-500/50 transition-all font-medium"
                               placeholder="Doe">
                    </div>
                </div>

                <div>
                    <label for="email" class="block text-xs font-bold text-text-muted uppercase tracking-widest mb-2">Work Email</label>
                    <input type="email" id="email" name="email" required
                           class="w-full bg-black/5 dark:bg-white/5 border border-black/10 dark:border-white/10 rounded-2xl px-5 py-4 text-text-main placeholder-text-dim focus:outline-none focus:ring-2 focus:ring-purple-500/50 transition-all font-medium"
                           placeholder="you@company.com">
                </div>

                <div>
                    <label for="password" class="block text-xs font-bold text-text-muted uppercase tracking-widest mb-2">Password</label>
                    <input type="password" id="password" name="password" required
                           class="w-full bg-black/5 dark:bg-white/5 border border-black/10 dark:border-white/10 rounded-2xl px-5 py-4 text-text-main placeholder-text-dim focus:outline-none focus:ring-2 focus:ring-purple-500/50 transition-all font-medium"
                           placeholder="Create a strong password">
                </div>

                <button type="submit" class="w-full py-4 rounded-2xl bg-secondary-gradient text-white font-black text-lg shadow-[0_10px_30px_-10px_rgba(255,42,95,0.5)] hover:scale-[1.02] active:scale-[0.98] transition-all duration-300 mt-4">
                    Create Workspace
                </button>
            </form>

            <div class="mt-8 text-center">
                <p class="text-sm text-text-muted font-medium">Already have an account? <a href="{{ route('login') }}" class="text-purple-500 hover:text-purple-400 transition-colors font-bold">Sign In</a></p>
            </div>
        </div>
    </div>
</div>
@endsection