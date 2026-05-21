<!-- resources/views/candidature/edit.blade.php -->
@component('layouts.app')
    
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Modifier la candidature : {{ $candidature->nom_entreprise }}
            </h2>
            <a href="{{ route('candidature.index') }}" class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 transition">
                <svg class="w-5 h-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 0118 0z" />
                </svg>
                Retour à la liste
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50/50 min-h-screen">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            
            <!-- FORM CARD -->
            <div class="bg-white shadow-sm rounded-2xl border border-gray-100 overflow-hidden">
                
                <form action="{{ route('candidature.update', $candidature->id) }}" method="POST" class="p-6 sm:p-8 space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Affichage des erreurs globales si besoin -->
                    @if ($errors->any())
                        <div class="p-4 bg-rose-50 border border-rose-100 rounded-xl text-sm text-rose-600 space-y-1">
                            <span class="font-semibold block">Veuillez corriger les erreurs suivantes :</span>
                            <ul class="list-disc list-inside text-xs space-y-0.5 opacity-90">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- GRILLE : Entreprise & Poste -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <!-- Champ : Nom de l'entreprise -->
                        <div class="space-y-1.5">
                            <label for="nom_entreprise" class="text-sm font-medium text-gray-700 block">Nom de l'entreprise <span class="text-rose-500">*</span></label>
                            <input type="text" name="nom_entreprise" id="nom_entreprise" 
                                value="{{ old('nom_entreprise', $candidature->nom_entreprise) }}" 
                                class="w-full px-4 py-2.5 rounded-xl border @error('nom_entreprise') border-rose-300 focus:ring-rose-50 @else border-gray-200 focus:ring-blue-50 focus:border-blue-500 @enderror focus:outline-none focus:ring-4 transition text-sm text-gray-800" 
                                required placeholder="Ex: Google, Microsoft...">
                            @error('nom_entreprise') <p class="text-xs text-rose-500 font-medium">{{ $message }}</p> @enderror
                        </div>

                        <!-- Champ : Intitulé du poste -->
                        <div class="space-y-1.5">
                            <label for="poste" class="text-sm font-medium text-gray-700 block">Intitulé du poste <span class="text-rose-500">*</span></label>
                            <input type="text" name="poste" id="poste" 
                                value="{{ old('poste', $candidature->poste) }}" 
                                class="w-full px-4 py-2.5 rounded-xl border @error('poste') border-rose-300 focus:ring-rose-50 @else border-gray-200 focus:ring-blue-50 focus:border-blue-500 @enderror focus:outline-none focus:ring-4 transition text-sm text-gray-800" 
                                required placeholder="Ex: Développeur Full Stack, Intégrateur...">
                            @error('poste') <p class="text-xs text-rose-500 font-medium">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <!-- GRILLE : Statut, Priorité & Date -->
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                        <!-- Sélecteur : Statut -->
                        <div class="space-y-1.5">
                            <label for="statut" class="text-sm font-medium text-gray-700 block">Statut <span class="text-rose-500">*</span></label>
                            <select name="statut" id="statut" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 bg-white focus:outline-none focus:ring-4 focus:ring-blue-50 focus:border-blue-500 transition text-sm text-gray-800" required>
                                @foreach(['En attente', 'Entretien programmé', 'Offre reçue', 'Acceptee', 'Refusee', 'Abandonnee'] as $statusOption)
                                    <option value="{{ $statusOption }}" {{ old('statut', $candidature->statut) === $statusOption ? 'selected' : '' }}>
                                        {{ $statusOption }}
                                    </option>
                                @endforeach
                            </select>
                            @error('statut') <p class="text-xs text-rose-500 font-medium">{{ $message }}</p> @enderror
                        </div>

                        <!-- Sélecteur : Priorité -->
                        <div class="space-y-1.5">
                            <label for="priorite" class="text-sm font-medium text-gray-700 block">Priorité <span class="text-rose-500">*</span></label>
                            <select name="priorite" id="priorite" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 bg-white focus:outline-none focus:ring-4 focus:ring-blue-50 focus:border-blue-500 transition text-sm text-gray-800" required>
                                @foreach(['Haute', 'Moyenne', 'Faible'] as $priorityOption)
                                    <option value="{{ $priorityOption }}" {{ old('priorite', $candidature->priorite) === $priorityOption ? 'selected' : '' }}>
                                        {{ $priorityOption }}
                                    </option>
                                @endforeach
                            </select>
                            @error('priorite') <p class="text-xs text-rose-500 font-medium">{{ $message }}</p> @enderror
                        </div>

                        <!-- Champ : Date -->
                        <div class="space-y-1.5">
                            <label for="date_candidature" class="text-sm font-medium text-gray-700 block">Date d'envoi <span class="text-rose-500">*</span></label>
                            <input type="date" name="date_candidature" id="date_candidature" 
                                value="{{ old('date_candidature', $candidature->date_candidature) }}" 
                                class="w-full px-4 py-2.5 rounded-xl border @error('date_candidature') border-rose-300 focus:ring-rose-50 @else border-gray-200 focus:ring-blue-50 focus:border-blue-500 @enderror focus:outline-none focus:ring-4 transition text-sm text-gray-800" 
                                required>
                            @error('date_candidature') <p class="text-xs text-rose-500 font-medium">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <!-- Champ : URL de l'offre -->
                    <div class="space-y-1.5">
                        <label for="url_offre" class="text-sm font-medium text-gray-700 block">Lien de l'offre d'emploi</label>
                        <input type="url" name="url_offre" id="url_offre" 
                            value="{{ old('url_offre', $candidature->url_offre) }}" 
                            class="w-full px-4 py-2.5 rounded-xl border @error('url_offre') border-rose-300 focus:ring-rose-50 @else border-gray-200 focus:ring-blue-50 focus:border-blue-500 @enderror focus:outline-none focus:ring-4 transition text-sm text-gray-800" 
                            placeholder="https://linkedin.com/jobs/...">
                        @error('url_offre') <p class="text-xs text-rose-500 font-medium">{{ $message }}</p> @enderror
                    </div>

                    <!-- Champ : Notes & Commentaires -->
                    <div class="space-y-1.5">
                        <label for="notes" class="text-sm font-medium text-gray-700 block">Notes & Observations</label>
                        <textarea name="notes" id="notes" rows="4" 
                            class="w-full px-4 py-2.5 rounded-xl border @error('notes') border-rose-300 focus:ring-rose-50 @else border-gray-200 focus:ring-blue-50 focus:border-blue-500 @enderror focus:outline-none focus:ring-4 transition text-sm text-gray-800 placeholder-gray-400" 
                            placeholder="Détails de l'échange, technologies demandées, questions posées lors du call... Setup d'environnement de test ?">{{ old('notes', $candidature->notes) }}</textarea>
                        @error('notes') <p class="text-xs text-rose-500 font-medium">{{ $message }}</p> @enderror
                    </div>

                    <!-- ZONE DE BOUTONS -->
                    <div class="pt-4 border-t border-gray-100 flex items-center justify-end gap-3">
                        <a href="{{ route('candidature.index') }}" class="px-5 py-2.5 text-sm font-medium rounded-xl text-gray-700 bg-white border border-gray-200 hover:bg-gray-50 transition">
                            Annuler
                        </a>
                        <button type="submit" class="px-5 py-2.5 text-sm font-medium rounded-xl text-white bg-blue-600 hover:bg-blue-700 shadow-sm shadow-blue-100 active:bg-blue-800 transition">
                            Enregistrer les modifications
                        </button>
                    </div>

                </form>

            </div>

        </div>
    </div>
@endcomponent