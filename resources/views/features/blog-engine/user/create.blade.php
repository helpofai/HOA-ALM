@extends('themes.linkOne.dashboard')

@section('header-title', 'Write Post')

@section('sidebar-links')
    <a href="{{ route('admin.dashboard') }}" data-navigate class="flex items-center gap-3 px-4 py-3 rounded-xl text-text-muted hover:bg-white/5 hover:text-text-main font-medium transition-all group overflow-hidden">
        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
        <span class="sidebar-text whitespace-nowrap opacity-100 transition-opacity duration-300">Admin Console</span>
    </a>
    <a href="{{ route('admin.users') }}" data-navigate class="flex items-center gap-3 px-4 py-3 rounded-xl text-text-muted hover:bg-white/5 hover:text-text-main font-medium transition-all group overflow-hidden">
        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
        <span class="sidebar-text whitespace-nowrap opacity-100 transition-opacity duration-300">Users Management</span>
    </a>
    <a href="{{ route('admin.link-features') }}" data-navigate class="flex items-center gap-3 px-4 py-3 rounded-xl text-text-muted hover:bg-white/5 hover:text-text-main font-medium transition-all group overflow-hidden">
        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
        <span class="sidebar-text whitespace-nowrap opacity-100 transition-opacity duration-300">Link Engine Features</span>
    </a>
    <a href="{{ route('user.blog.index') }}" data-navigate class="flex items-center gap-3 px-4 py-3 rounded-xl bg-gradient-to-r from-cyan-500/20 to-transparent border-l-4 border-cyan-500 text-cyan-500 font-bold transition-all group overflow-hidden">
        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
        <span class="sidebar-text whitespace-nowrap opacity-100 transition-opacity duration-300">Blog Engine</span>
    </a>
@endsection

@section('content')
<!-- Custom Styles for Tiptap Editor inside our dark theme -->
<style>
    .ProseMirror {
        min-height: 300px;
        outline: none;
        padding: 1.5rem;
    }
    .ProseMirror p { margin-bottom: 1em; color: #d4d4d8; line-height: 1.6; }
    .ProseMirror h1 { font-size: 2rem; font-weight: 800; color: #fff; margin-bottom: 1em; margin-top: 1.5em; }
    .ProseMirror h2 { font-size: 1.5rem; font-weight: 700; color: #fff; margin-bottom: 0.75em; margin-top: 1.5em; }
    .ProseMirror ul { list-style-type: disc; padding-left: 1.5rem; margin-bottom: 1em; color: #d4d4d8; }
    .ProseMirror ol { list-style-type: decimal; padding-left: 1.5rem; margin-bottom: 1em; color: #d4d4d8; }
    .ProseMirror blockquote { border-left: 4px solid #06b6d4; padding-left: 1rem; font-style: italic; color: #a1a1aa; margin-bottom: 1em; }
    .ProseMirror strong { font-weight: 700; color: #fff; }
    .ProseMirror code { background: rgba(255,255,255,0.1); padding: 0.2em 0.4em; border-radius: 0.25rem; font-size: 0.875em; color: #67e8f9; }
</style>

<form action="{{ route('user.blog.store') }}" method="POST" enctype="multipart/form-data" id="blog-form" class="w-full max-w-5xl mx-auto rounded-[2.5rem] bg-white/5 border border-white/5 backdrop-blur-md p-8 animate-fade-in relative overflow-hidden">
    @csrf
    <input type="hidden" name="content" id="content-input">
    
    <!-- Ambient Glow -->
    <div class="absolute -left-20 -top-20 w-64 h-64 bg-cyan-500/10 rounded-full blur-3xl pointer-events-none"></div>

    <div class="mb-10 border-b border-white/5 pb-6 flex justify-between items-end">
        <div>
            <h2 class="text-3xl font-black text-text-main tracking-tight">Write Post</h2>
            <p class="text-sm text-text-muted mt-2">Create rich-text content, manage SEO, and categorize your updates.</p>
        </div>
    </div>

    <div class="space-y-8">
        <!-- Title -->
        <div>
            <label class="block text-xs font-bold text-text-muted uppercase tracking-widest mb-3">Post Title</label>
            <input type="text" name="title" required placeholder="The future of link management..." class="w-full bg-black/5 dark:bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-text-main placeholder-text-dim focus:outline-none focus:border-cyan-500/50 focus:ring-1 focus:ring-cyan-500/50 transition-all font-bold text-xl">
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 space-y-8">
                <!-- Tiptap Editor Wrapper -->
                <div>
                    <label class="block text-xs font-bold text-text-muted uppercase tracking-widest mb-3">Content Body</label>
                    <div class="w-full bg-black/5 dark:bg-white/5 border border-white/10 rounded-2xl overflow-hidden flex flex-col focus-within:border-cyan-500/50 transition-all">
                        
                        <!-- Toolbar -->
                        <div class="flex items-center gap-1 p-2 border-b border-white/10 bg-white/5 overflow-x-auto">
                            <button type="button" id="btn-bold" class="p-2 rounded-lg text-text-muted hover:text-white hover:bg-white/10 transition-colors" title="Bold"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 4h8a4 4 0 014 4 4 4 0 01-4 4H6z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 12h9a4 4 0 014 4 4 4 0 01-4 4H6z"></path></svg></button>
                            <button type="button" id="btn-italic" class="p-2 rounded-lg text-text-muted hover:text-white hover:bg-white/10 transition-colors" title="Italic"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg></button>
                            <div class="w-px h-4 bg-white/10 mx-2"></div>
                            <button type="button" id="btn-h1" class="p-2 rounded-lg text-text-muted hover:text-white hover:bg-white/10 transition-colors font-bold text-xs" title="Heading 1">H1</button>
                            <button type="button" id="btn-h2" class="p-2 rounded-lg text-text-muted hover:text-white hover:bg-white/10 transition-colors font-bold text-xs" title="Heading 2">H2</button>
                            <div class="w-px h-4 bg-white/10 mx-2"></div>
                            <button type="button" id="btn-bullet" class="p-2 rounded-lg text-text-muted hover:text-white hover:bg-white/10 transition-colors" title="Bullet List"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg></button>
                            <button type="button" id="btn-ordered" class="p-2 rounded-lg text-text-muted hover:text-white hover:bg-white/10 transition-colors" title="Ordered List"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 6h11M9 12h11M9 18h11M5 6v.01M5 12v.01M5 18v.01"></path></svg></button>
                            <div class="w-px h-4 bg-white/10 mx-2"></div>
                            <button type="button" id="btn-quote" class="p-2 rounded-lg text-text-muted hover:text-white hover:bg-white/10 transition-colors" title="Blockquote"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path></svg></button>
                        </div>
                        
                        <!-- The Editable Area -->
                        <div id="tiptap-editor" class="flex-1 overflow-y-auto"></div>
                    </div>
                </div>

                <!-- SEO Section -->
                <div class="p-6 rounded-3xl bg-black/5 dark:bg-white/5 border border-white/5 relative mt-8">
                    <h3 class="text-sm font-bold text-text-main mb-6 flex items-center gap-2">
                        <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        Search Engine Optimization
                    </h3>
                    
                    <div class="space-y-4">
                        <div>
                            <label class="block text-xs font-bold text-text-muted mb-2">Meta Title</label>
                            <input type="text" name="meta_title" placeholder="SEO Title (leave blank to use post title)" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-2.5 text-text-main placeholder-text-dim focus:outline-none focus:border-cyan-500/50 transition-all text-sm font-medium">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-text-muted mb-2">Meta Description</label>
                            <textarea name="meta_description" rows="3" placeholder="SEO Description..." class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-2.5 text-text-main placeholder-text-dim focus:outline-none focus:border-cyan-500/50 transition-all text-sm font-medium resize-none"></textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-text-muted mb-2">Meta Keywords</label>
                            <input type="text" name="meta_keywords" placeholder="link building, analytics, SaaS" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-2.5 text-text-main placeholder-text-dim focus:outline-none focus:border-cyan-500/50 transition-all text-sm font-medium">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar Options -->
            <div class="space-y-6">
                <!-- Publishing -->
                <div class="p-6 rounded-3xl bg-black/5 dark:bg-white/5 border border-white/5 relative">
                    <h3 class="text-sm font-bold text-text-main mb-4 flex items-center gap-2">
                        <svg class="w-4 h-4 text-cyan-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        Publishing
                    </h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-xs font-bold text-text-muted mb-2">Status</label>
                            <select name="status" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-2.5 text-text-main focus:outline-none focus:border-cyan-500/50 transition-all text-sm font-medium appearance-none">
                                <option value="draft" class="bg-black text-white">Save as Draft</option>
                                <option value="published" class="bg-black text-white">Publish Now</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <!-- Taxonomies -->
                <div class="p-6 rounded-3xl bg-black/5 dark:bg-white/5 border border-white/5 relative">
                    <h3 class="text-sm font-bold text-text-main mb-4 flex items-center gap-2">
                        <svg class="w-4 h-4 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
                        Organization
                    </h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-xs font-bold text-text-muted mb-2">Category</label>
                            <select name="category_id" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-2.5 text-text-main focus:outline-none focus:border-cyan-500/50 transition-all text-sm font-medium appearance-none">
                                <option value="" class="bg-black text-white">Select a category...</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" class="bg-black text-white">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-text-muted mb-2">Tags</label>
                            <input type="text" name="tags" placeholder="Updates, Feature, 2026..." class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-2.5 text-text-main placeholder-text-dim focus:outline-none focus:border-cyan-500/50 transition-all text-sm font-medium">
                            <p class="text-[10px] text-text-dim mt-1">Separate tags with commas.</p>
                        </div>
                    </div>
                </div>

                <!-- Featured Image -->
                <div class="p-6 rounded-3xl bg-black/5 dark:bg-white/5 border border-white/5 relative">
                    <h3 class="text-sm font-bold text-text-main mb-4 flex items-center gap-2">
                        <svg class="w-4 h-4 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        Featured Image
                    </h3>
                    <div class="space-y-4">
                        <input type="file" name="featured_image" accept="image/*" class="w-full text-sm text-text-dim file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-bold file:bg-white/10 file:text-white hover:file:bg-white/20 transition-all">
                    </div>
                </div>

                <!-- Excerpt -->
                <div class="p-6 rounded-3xl bg-black/5 dark:bg-white/5 border border-white/5 relative">
                    <h3 class="text-sm font-bold text-text-main mb-4 flex items-center gap-2">
                        <svg class="w-4 h-4 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"></path></svg>
                        Excerpt
                    </h3>
                    <div class="space-y-4">
                        <textarea name="excerpt" rows="4" placeholder="Brief summary for index pages..." class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-2.5 text-text-main placeholder-text-dim focus:outline-none focus:border-cyan-500/50 transition-all text-sm font-medium resize-none"></textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="pt-6 border-t border-white/5 flex justify-end gap-4">
            <a href="{{ route('user.blog.index') }}" data-navigate class="px-6 py-3 rounded-xl bg-white/5 text-text-main text-sm font-bold border border-white/10 hover:bg-white/10 transition-colors">Cancel</a>
            <button type="submit" class="px-8 py-3 rounded-xl bg-primary-gradient text-white text-sm font-black shadow-lg shadow-cyan-500/25 hover:shadow-cyan-500/40 transition-all active:scale-95 flex items-center gap-2">
                Save Post
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
            </button>
        </div>
    </div>
</form>

<!-- Tiptap Implementation via ESM (No Build Step Required) -->
<script type="module">
    import { Editor } from 'https://esm.sh/@tiptap/core';
    import StarterKit from 'https://esm.sh/@tiptap/starter-kit';

    document.addEventListener('DOMContentLoaded', () => {
        // Prevent double init if navigating via SPA
        if(document.querySelector('.ProseMirror')) return;

        const contentInput = document.getElementById('content-input');
        const form = document.getElementById('blog-form');

        const editor = new Editor({
            element: document.getElementById('tiptap-editor'),
            extensions: [
                StarterKit,
            ],
            content: '<p>Start writing your next big update...</p>',
            onUpdate: ({ editor }) => {
                contentInput.value = editor.getHTML();
            },
        });

        // Set initial HTML
        contentInput.value = editor.getHTML();

        // Toolbar Button Logic
        document.getElementById('btn-bold').addEventListener('click', () => { editor.chain().focus().toggleBold().run(); });
        document.getElementById('btn-italic').addEventListener('click', () => { editor.chain().focus().toggleItalic().run(); });
        document.getElementById('btn-h1').addEventListener('click', () => { editor.chain().focus().toggleHeading({ level: 1 }).run(); });
        document.getElementById('btn-h2').addEventListener('click', () => { editor.chain().focus().toggleHeading({ level: 2 }).run(); });
        document.getElementById('btn-bullet').addEventListener('click', () => { editor.chain().focus().toggleBulletList().run(); });
        document.getElementById('btn-ordered').addEventListener('click', () => { editor.chain().focus().toggleOrderedList().run(); });
        document.getElementById('btn-quote').addEventListener('click', () => { editor.chain().focus().toggleBlockquote().run(); });
        
        // Active State Styling (Optional, can be added later via editor.isActive)
        editor.on('transaction', () => {
            const toggleActive = (id, active) => {
                const btn = document.getElementById(id);
                if (active) {
                    btn.classList.add('bg-white/20', 'text-cyan-500');
                    btn.classList.remove('bg-transparent', 'text-text-muted');
                } else {
                    btn.classList.remove('bg-white/20', 'text-cyan-500');
                    btn.classList.add('bg-transparent', 'text-text-muted');
                }
            };
            
            toggleActive('btn-bold', editor.isActive('bold'));
            toggleActive('btn-italic', editor.isActive('italic'));
            toggleActive('btn-h1', editor.isActive('heading', { level: 1 }));
            toggleActive('btn-h2', editor.isActive('heading', { level: 2 }));
            toggleActive('btn-bullet', editor.isActive('bulletList'));
            toggleActive('btn-ordered', editor.isActive('orderedList'));
            toggleActive('btn-quote', editor.isActive('blockquote'));
        });
    });
</script>
@endsection