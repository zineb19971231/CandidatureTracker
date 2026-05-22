<!-- resources/views/candidature/index.blade.php -->

@component('layouts.app')

<x-slot name="header">

<div class="flex items-center justify-between w-full">

    <!-- LEFT (vide) -->
    <div class="w-1/3"></div>

    <!-- CENTER (SEARCH) -->
    <div class="w-1/3 flex justify-center">

        <form method="GET" action="{{ route('candidature.index') }}" class="w-full flex justify-center">

            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Rechercher une entreprise..."
                class="w-full max-w-md px-4 py-3 rounded-2xl border border-slate-200 focus:border-blue-900 focus:ring-0"
            >

        </form>

    </div>

    <!-- RIGHT (BUTTON) -->
    <div class="w-1/3 flex justify-end">

        <a
            href="{{ route('candidature.create') }}"
            class="px-5 py-3 rounded-2xl bg-blue-900 text-white hover:bg-blue-800 transition"
        >
            Nouvelle candidature
        </a>

    </div>

</div>

</x-slot>



<div class="min-h-screen bg-slate-50">

<div class="max-w-7xl px-6 py-10">

@if($candidatures->isEmpty())

<div class="bg-white rounded-3xl border border-slate-200 p-20">

<h3 class="text-2xl font-semibold text-slate-900">
Aucune candidature
</h3>

<p class="mt-2 text-slate-500">
Commence par ajouter ta première opportunité.
</p>

<a
href="{{ route('candidature.create') }}"
class="inline-block mt-8 px-6 py-3 rounded-2xl bg-blue-900 text-white hover:bg-blue-800"
>
Créer une candidature
</a>

</div>

@else

<!-- LISTE -->
<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">

@foreach($candidatures as $candidature)

<div class="bg-white rounded-3xl border border-slate-200 hover:border-blue-300 hover:shadow-lg transition overflow-hidden">

<div class="p-6">

<!-- HEADER CARD -->
<div class="flex items-start justify-between">

<div>

<div class="w-14 h-14 rounded-2xl bg-blue-900 text-white flex items-center justify-center font-bold text-lg">
{{ strtoupper(substr($candidature->nom_entreprise,0,1)) }}
</div>

<h3 class="mt-5 text-lg font-semibold text-slate-900">
{{ $candidature->nom_entreprise }}
</h3>

<p class="text-sm text-slate-500 mt-1">
{{ $candidature->poste }}
</p>

</div>

<span class="px-3 py-1 rounded-full text-xs font-medium
@if($candidature->priorite == 'haute')
bg-red-50 text-red-600
@elseif($candidature->priorite == 'moyenne')
bg-yellow-50 text-yellow-700
@else
bg-teal-50 text-teal-700
@endif
">
{{ ucfirst($candidature->priorite) }}
</span>

</div>

<!-- INFOS -->
<div class="mt-8 space-y-4">

<div>
<p class="text-xs text-slate-400">Statut</p>
<p class="text-slate-900">{{ $candidature->statut }}</p>
</div>

<div>
<p class="text-xs text-slate-400">Date candidature</p>
<p class="text-slate-900">{{ $candidature->date_candidature }}</p>
</div>

@if($candidature->url_offre)
<div>
<a href="{{ $candidature->url_offre }}" target="_blank" class="text-blue-700 text-sm hover:underline">
Voir l'offre →
</a>
</div>
@endif

</div>

<!-- NOTES -->
@if($candidature->notes)
<div class="mt-6 rounded-2xl bg-slate-50 p-4">
<p class="text-sm text-slate-500">
{{ Str::limit($candidature->notes,120) }}
</p>
</div>
@endif

<!-- ACTIONS -->
<div class="mt-8 flex gap-3">

<a href="{{ route('candidature.show',$candidature->id) }}"
class="flex-1 py-3 text-center rounded-2xl border border-slate-300 hover:bg-slate-50">
Voir
</a>

<a href="{{ route('candidature.edit',$candidature->id) }}"
class="flex-1 py-3 text-center rounded-2xl bg-blue-900 text-white hover:bg-blue-800">
Modifier
</a>

</div>

<form action="{{ route('candidature.destroy',$candidature->id) }}" method="POST" class="mt-3">
@csrf
@method('DELETE')

<button type="submit"
onclick="return confirm('Supprimer cette candidature ?')"
class="w-full py-3 rounded-2xl bg-red-50 text-red-600 hover:bg-red-100 transition">
Supprimer
</button>

</form>

</div>

</div>

@endforeach

</div>

@if(method_exists($candidatures,'links'))
<div class="mt-10">
{{ $candidatures->links() }}
</div>
@endif

@endif

</div>

</div>

@endcomponent