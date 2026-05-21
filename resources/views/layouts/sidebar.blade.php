<!-- resources/views/partials/sidebar.blade.php -->
<aside class="w-64 bg-slate-900 text-slate-200 flex flex-col shadow-xl flex-shrink-0 min-h-screen border-r border-slate-800">
    <!-- Header Sidebar -->
    <div class="px-6 py-5 flex items-center gap-3 border-b border-slate-800">
        <!-- Petit logo abstrait -->
        <div class="flex items-center justify-center w-8 h-8 rounded-lg bg-blue-600 shadow-lg shadow-blue-500/20 text-white">
            <svg class="w-5 h-5 stroke-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-2.533-4.65l-2.21-.785m-4.7 4.108l2.184-1.984m0 0a1.984 1.984 0 112.806 2.806L14.7 17.152zm-10.47-5.593L5.43 13.11m0 0a1.984 1.984 0 102.806-2.806L5.43 13.11z" />
            </svg>
        </div>
        <div>
            <span class="text-base font-bold tracking-tight text-white block">Espace RH</span>
            <span class="text-xs text-slate-500 block -mt-0.5">Tableau de bord</span>
        </div>
    </div>

    <!-- Liens de navigation -->
    <nav class="flex-1 p-4 space-y-1.5">
        <!-- Candidatures -->
        <a href="{{ route('candidature.index') }}" 
           class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 group {{ request()->routeIs('candidature.index') ? 'bg-blue-600 text-white shadow-md shadow-blue-600/10' : 'text-slate-400 hover:bg-slate-800/60 hover:text-slate-100' }}">
            <svg class="w-5 h-5 stroke-[2] {{ request()->routeIs('candidature.index') ? 'text-white' : 'text-slate-400 group-hover:text-slate-200' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
            <span class="font-medium text-sm">Candidatures</span>
        </a>

        <!-- Entretiens -->
        <a href="#" 
           class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 group text-slate-400 hover:bg-slate-800/60 hover:text-slate-100">
            <svg class="w-5 h-5 stroke-[2] text-slate-400 group-hover:text-slate-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            <span class="font-medium text-sm">Entretiens</span>
        </a>

        <!-- Archives -->
        <a href="#" 
           class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 group text-slate-400 hover:bg-slate-800/60 hover:text-slate-100">
            <svg class="w-5 h-5 stroke-[2] text-slate-400 group-hover:text-slate-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
            </svg>
            <span class="font-medium text-sm">Archives</span>
        </a>
    </nav>

    <!-- Footer de la Sidebar avec Déconnexion -->
    <div class="p-4 border-t border-slate-800">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full flex items-center gap-3 px-4 py-2.5 text-sm font-medium text-rose-400 hover:text-rose-300 hover:bg-rose-500/10 rounded-xl transition-all duration-200 group">
                <svg class="w-5 h-5 stroke-[2] text-rose-400/80 group-hover:text-rose-300 transition-transform group-hover:-translate-x-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
                Déconnexion
            </button>
        </form>
    </div>
</aside>