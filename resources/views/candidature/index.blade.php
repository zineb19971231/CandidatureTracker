<!-- resources/views/candidature/index.blade.php -->
@component('layouts.app')
    
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Suivi de mes Candidatures
            </h2>
            <!-- Bouton Ajouter -->
            <a href="{{ route('candidature.create') }}" class="inline-flex items-center justify-center px-4 py-2 bg-blue-600 border border-transparent rounded-lg font-medium text-sm text-white hover:bg-blue-700 active:bg-blue-800 transition shadow-sm gap-2">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Nouvelle candidature
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50/50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
      
            <!-- GRILLE DE CARDS -->
            @if($candidatures->isEmpty())
                <div class="bg-white text-center py-16 px-4 rounded-2xl border border-gray-100 shadow-sm">
                    <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0a2 2 0 01-2 2H6a2 2 0 01-2-2m16 0l-3.586-3.586a1 1 0 00-1.414 0l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 00-1.414 0L4 13" />
                    </svg>
                    <h3 class="text-lg font-semibold text-gray-700 mb-1">Aucune candidature pour le moment</h3>
                    <p class="text-sm text-gray-400 mb-6">Commencez à suivre vos démarches en ajoutant votre première entreprise.</p>
                    <a href="{{ route('candidature.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-900 text-white rounded-lg text-sm font-medium hover:bg-gray-800 transition">
                        Ajouter une offre
                    </a>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($candidatures as $candidature)
                        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-md hover:border-gray-200 transition-all duration-200 flex flex-col justify-between overflow-hidden group">
                            
                            <!-- CONTENU DE LA CARD -->
                            <div class="p-6 space-y-4">
                                <!-- En-tête : Entreprise & Badge Statut -->
                                <div class="flex items-start justify-between gap-3">
                                    <div class="space-y-0.5">
                                        <h3 class="font-bold text-gray-900 text-lg group-hover:text-blue-600 transition-colors line-clamp-1">
                                            {{ $candidature->nom_entreprise }}
                                        </h3>
                                        <p class="text-sm font-medium text-gray-500 line-clamp-1">{{ $candidature->poste }}</p>
                                    </div>

                                    <!-- Gestion dynamique des badges de statut -->
                                    <div class="shrink-0">
                                        @if(strtolower($candidature->statut) === 'acceptee')
                                            <span class="px-2.5 py-1 text-xs font-semibold rounded-full bg-green-50 text-green-700 border border-green-100">Acceptée</span>
                                        @elseif(strtolower($candidature->statut) === 'refusee')
                                            <span class="px-2.5 py-1 text-xs font-semibold rounded-full bg-rose-50 text-rose-700 border border-rose-100">Refusée</span>
                                        @elseif(strtolower($candidature->statut) === 'abandonnee')
                                            <span class="px-2.5 py-1 text-xs font-semibold rounded-full bg-gray-100 text-gray-600 border border-gray-200">Abandonnée</span>
                                        @else
                                            <span class="px-2.5 py-1 text-xs font-semibold rounded-full bg-amber-50 text-amber-700 border border-amber-100">En attente</span>
                                        @endif
                                    </div>
                                </div>

                                <!-- Métadonnées (Date & Priorité) -->
                                <div class="flex items-center gap-4 text-xs text-gray-400 pt-1">
                                    <div class="flex items-center gap-1.5">
                                        <svg class="w-4 h-4 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                                        <span>{{ $candidature->date_candidature }}</span>
                                    </div>
                                    <div class="flex items-center gap-1">
                                        <span class="w-1.5 h-1.5 rounded-full @if($candidature->priorite == 'Haute') bg-rose-500 @elseif($candidature->priorite == 'Moyenne') bg-amber-500 @else bg-gray-400 @endif"></span>
                                        <span class="font-medium text-gray-500">Priorité {{ $candidature->priorite }}</span>
                                    </div>
                                </div>

                                <!-- Aperçu des notes -->
                                @if($candidature->notes)
                                    <p class="text-xs text-gray-400 line-clamp-2 bg-gray-50 rounded-lg p-2.5 border border-gray-100/50 leading-relaxed">
                                        {{ $candidature->notes }}
                                    </p>
                                @else
                                    <p class="text-xs text-gray-400 italic p-2.5">Aucune note rédigée...</p>
                                @endif
                            </div>

                            <!-- ACTIONS EN BAS -->
                            <div class="px-6 py-4 bg-gray-50 border-t border-gray-100/80 flex items-center justify-between gap-2">
                                <!-- Lien externe vers l'offre -->
                                <div>
                                    @if($candidature->url_offre)
                                        <a href="{{ $candidature->url_offre }}" target="_blank" class="p-1.5 text-gray-400 hover:text-gray-600 rounded-md hover:bg-gray-200/50 transition" title="Voir l'annonce">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" /></svg>
                                        </a>
                                    @endif
                                </div>

                                <!-- Boutons d'action Laravel -->
                                <div class="flex items-center gap-2">
                                    <!-- Bouton Voir (Show) -->
                                    <a href="{{ route('candidature.show', $candidature->id) }}" class="inline-flex items-center px-3 py-1.5 text-xs font-medium text-gray-700 bg-white border border-gray-200 rounded-md hover:bg-gray-50 shadow-sm transition">
                                        Détails
                                    </a>

                                    <!-- Bouton Éditer (Edit) -->
                                    <a href="{{ route('candidature.edit', $candidature->id) }}" class="inline-flex items-center p-1.5 text-blue-600 bg-blue-50 rounded-md hover:bg-blue-100 transition" title="Modifier">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
                                    </a>

                                    <!-- Formulaire Supprimer (Delete) -->
                                    <form action="{{ route('candidature.destroy', $candidature->id) }}" method="POST" onsubmit="return confirm('Supprimer définitivement cette candidature ?');" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-1.5 text-rose-600 bg-rose-50 rounded-md hover:bg-rose-100 transition" title="Supprimer">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                        </button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>

                <!-- PAGINATION (Si tu as utilisé ->paginate() dans ton contrôleur) -->
                @if(method_exists($candidatures, 'links'))
                    <div class="pt-4">
                        {{ $candidatures->links() }}
                    </div>
                @endif
            @endif

        </div>
    </div>
@endcomponent