<!-- resources/views/candidature/edit.blade.php -->

@component('layouts.app')

<x-slot name="header">
<div class="flex items-center justify-between">

<div>
<h2 class="text-2xl font-bold text-slate-900">
Modifier candidature
</h2>

<p class="text-sm text-slate-500 mt-1">
{{ $candidature->nom_entreprise }}
</p>
</div>

<a
href="{{ route('candidature.index') }}"
class="px-4 py-2 rounded-xl border border-slate-200 hover:bg-slate-50"
>
Retour
</a>

</div>
</x-slot>

<div class="min-h-screen bg-slate-50">

<div class="max-w-6xl mx-auto px-6 py-10">

<div class="bg-white rounded-3xl border border-slate-200 overflow-hidden">

<form
action="{{ route('candidature.update',$candidature->id) }}"
method="POST"
class="p-8 space-y-8"
>

@csrf
@method('PUT')

@if($errors->any())

<div class="rounded-2xl bg-red-50 border border-red-200 p-5">

<h3 class="font-semibold text-red-700">
Erreurs détectées
</h3>

<ul class="mt-3 text-sm text-red-600">

@foreach($errors->all() as $error)

<li>
• {{ $error }}
</li>

@endforeach

</ul>

</div>

@endif


<!-- HEADER CARD -->

<div class="rounded-2xl bg-slate-50 p-6">

<h3 class="text-lg font-semibold text-slate-900">

{{ $candidature->nom_entreprise }}

</h3>

<p class="text-sm text-slate-500">

Modifier les informations de candidature

</p>

</div>


<!-- ENTREPRISE + POSTE -->

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">

<div>

<label class="block mb-2 text-sm font-medium">
Entreprise
</label>

<input
type="text"
name="nom_entreprise"
value="{{ old('nom_entreprise',$candidature->nom_entreprise) }}"
class="w-full rounded-2xl border border-slate-200 px-4 py-3 focus:border-blue-900 focus:ring-0"
>

</div>


<div>

<label class="block mb-2 text-sm font-medium">
Poste
</label>

<input
type="text"
name="poste"
value="{{ old('poste',$candidature->poste) }}"
class="w-full rounded-2xl border border-slate-200 px-4 py-3 focus:border-blue-900 focus:ring-0"
>

</div>

</div>


<!-- STATUS -->

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">

<div>

<label class="block mb-2 text-sm font-medium">
Statut
</label>

<select
name="statut"
class="w-full rounded-2xl border border-slate-200 px-4 py-3"
>

@foreach([
'a examiner',
'entretien programme',
'offre reçue',
'refusee',
'abandonnee'
] as $statusOption)

<option
value="{{ $statusOption }}"
{{ old('statut',$candidature->statut)===$statusOption ? 'selected':'' }}
>

{{ $statusOption }}

</option>

@endforeach

</select>

</div>


<div>

<label class="block mb-2 text-sm font-medium">
Priorité
</label>

<select
name="priorite"
class="w-full rounded-2xl border border-slate-200 px-4 py-3"
>

@foreach([
'haute',
'moyenne',
'faible'
] as $priorityOption)

<option
value="{{ $priorityOption }}"
{{ old('priorite',$candidature->priorite)===$priorityOption ? 'selected':'' }}
>

{{ $priorityOption }}

</option>

@endforeach

</select>

</div>


<div>

<label class="block mb-2 text-sm font-medium">
Date
</label>

<input
type="date"
name="date_candidature"
value="{{ old('date_candidature',$candidature->date_candidature instanceof \Carbon\Carbon ? $candidature->date_candidature->format('Y-m-d') : substr($candidature->date_candidature,0,10)) }}"
class="w-full rounded-2xl border border-slate-200 px-4 py-3"
>

</div>

</div>


<!-- URL -->

<div>

<label class="block mb-2 text-sm font-medium">
Lien offre
</label>

<input
type="url"
name="url_offre"
value="{{ old('url_offre',$candidature->url_offre) }}"
class="w-full rounded-2xl border border-slate-200 px-4 py-3"
>

</div>


<!-- NOTES -->

<div>

<label class="block mb-2 text-sm font-medium">
Notes
</label>

<textarea
rows="5"
name="notes"
class="w-full rounded-2xl border border-slate-200 px-4 py-3"
>{{ old('notes',$candidature->notes) }}</textarea>

</div>


<!-- ACTIONS -->

<div class="pt-6 border-t border-slate-200 flex justify-end gap-4">

<a
href="{{ route('candidature.show',$candidature->id) }}"
class="px-6 py-3 rounded-2xl border border-slate-300"
>

Annuler

</a>

<button
type="submit"
class="px-6 py-3 rounded-2xl bg-blue-900 text-white hover:bg-blue-800"
>

Enregistrer

</button>

</div>

</form>

</div>

</div>

</div>

@endcomponent