<!-- resources/views/candidature/show.blade.php -->

@component('layouts.app')

<x-slot name="header">
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold text-slate-900">
                Candidate Profile
            </h2>

            <p class="text-sm text-slate-500 mt-1">
                Vue détaillée de la candidature
            </p>
        </div>

        <a
            href="{{ route('candidature.index') }}"
            class="px-4 py-2 rounded-xl border border-slate-200 text-slate-700 hover:bg-slate-50 transition"
        >
            Retour
        </a>
    </div>
</x-slot>

<div class="min-h-screen bg-slate-50">

    <div class="max-w-7xl mx-auto px-6 py-10">

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <!-- LEFT -->
            <div class="lg:col-span-2">

                <div class="bg-white rounded-3xl border border-slate-200 p-8">

                    <!-- HEADER -->
                    <div class="flex justify-between items-start">

                        <div>

                            <div class="w-16 h-16 rounded-2xl bg-blue-900 text-white flex items-center justify-center text-2xl font-bold">

                                {{ strtoupper(substr($candidature->nom_entreprise,0,1)) }}

                            </div>

                            <h1 class="mt-5 text-3xl font-bold text-slate-900">
                                {{ $candidature->nom_entreprise }}
                            </h1>

                            <p class="text-slate-500 mt-1">
                                {{ $candidature->poste }}
                            </p>

                        </div>
                    </div>

                    <!-- INFO -->
                    <div class="grid grid-cols-2 gap-5 mt-10">

                        <div class="bg-slate-50 rounded-2xl p-5">

                            <p class="text-sm text-slate-500">
                                Statut
                            </p>

                            <p class="mt-2 font-semibold text-slate-900">
                                {{ $candidature->statut }}
                            </p>

                        </div>

                        <div class="bg-slate-50 rounded-2xl p-5">

                            <p class="text-sm text-slate-500">
                                Priorité
                            </p>

                            <p class="mt-2 font-semibold text-teal-600">
                                {{ $candidature->priorite }}
                            </p>

                        </div>

                        <div class="bg-slate-50 rounded-2xl p-5">

                            <p class="text-sm text-slate-500">
                                Date candidature
                            </p>

                            <p class="mt-2 font-semibold">
                                {{ $candidature->date_candidature }}
                            </p>

                        </div>

                        <div class="bg-slate-50 rounded-2xl p-5">

                            <p class="text-sm text-slate-500">
                                Offre
                            </p>

                            @if($candidature->url_offre)

                                <a
                                    href="{{ $candidature->url_offre }}"
                                    target="_blank"
                                    class="mt-2 inline-block text-blue-700"
                                >
                                    Ouvrir l'annonce
                                </a>

                            @else

                                <p class="mt-2 text-slate-400">
                                    Non disponible
                                </p>

                            @endif

                        </div>

                    </div>

                </div>

            </div>

            <!-- RIGHT -->
            <div>

                <div class="bg-white rounded-3xl border border-slate-200 p-6">

                    <h3 class="text-lg font-semibold text-slate-900">
                        Notes
                    </h3>

                    <div class="mt-5 text-slate-600 leading-7">

                        {{ $candidature->notes ?: 'Aucune note disponible.' }}

                    </div>

                </div>

                <div class="bg-white rounded-3xl border border-slate-200 p-6 mt-6">

                    <h3 class="text-lg font-semibold text-slate-900">
                        Actions
                    </h3>

                    <div class="mt-5 space-y-3">

                        <a
                            href="{{ route('candidature.edit',$candidature->id) }}"
                            class="block w-full text-center py-3 rounded-xl bg-teal-600 text-white"
                        >
                            Modifier candidature
                        </a>

                        <a
                            href="{{ route('candidature.index') }}"
                            class="block w-full text-center py-3 rounded-xl border"
                        >
                            Retour liste
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endcomponent