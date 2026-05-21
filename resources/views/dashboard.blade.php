<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tableau de bord') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- GRILLE DES STATISTIQUES (Seules) -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
                
                <!-- Carte : Total -->
                <div class="bg-white border border-gray-100 p-5 rounded-xl shadow-sm flex items-center justify-between">
                    <div class="space-y-1">
                        <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider block">Total candidatures</span>
                        <span class="text-3xl font-bold text-gray-900 block">{{ $TotalCandidatures }}</span>
                    </div>
                    <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center">
                        <svg class="w-6 h-6 stroke-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                </div>

                <!-- Carte : À examiner -->
                <div class="bg-white border border-gray-100 p-5 rounded-xl shadow-sm flex items-center justify-between">
                    <div class="space-y-1">
                        <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider block">À examiner</span>
                        <span class="text-3xl font-bold text-amber-600 block">{{ $Tot_candidatures_en_attente }}</span>
                    </div>
                    <div class="w-12 h-12 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center">
                        <svg class="w-6 h-6 stroke-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </div>
                </div>

                <!-- Carte : Refusées -->
                <div class="bg-white border border-gray-100 p-5 rounded-xl shadow-sm flex items-center justify-between">
                    <div class="space-y-1">
                        <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider block">Refusées</span>
                        <span class="text-3xl font-bold text-rose-600 block">{{ $Tot_candidatures_rejetees }}</span>
                    </div>
                    <div class="w-12 h-12 rounded-xl bg-rose-50 text-rose-600 flex items-center justify-center">
                        <svg class="w-6 h-6 stroke-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>

                <!-- Carte : Abandonnées -->
                <div class="bg-white border border-gray-100 p-5 rounded-xl shadow-sm flex items-center justify-between">
                    <div class="space-y-1">
                        <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider block">Abandonnées</span>
                        <span class="text-3xl font-bold text-gray-600 block">{{ $Tot_candidatures_abondonnes }}</span>
                    </div>
                    <div class="w-12 h-12 rounded-xl bg-gray-100 text-gray-600 flex items-center justify-center">
                        <svg class="w-6 h-6 stroke-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15m0 0l6.75 6.75M4.5 12l6.75-6.75" />
                        </svg>
                    </div>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>