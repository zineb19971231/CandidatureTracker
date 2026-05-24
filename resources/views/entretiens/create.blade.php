{{-- resources/views/entretiens/create.blade.php --}}

@component('layouts.app')

<x-slot name="header">

<div class="flex items-center justify-between">

<div>

<h2 class="text-2xl font-bold text-slate-900">
Créer un entretien
</h2>

<p class="text-sm text-slate-500 mt-1">
Ajouter une nouvelle étape au processus de recrutement
</p>

</div>

<a
href="{{ route('entretiens.index') }}"
class="px-5 py-3 rounded-2xl border border-slate-300 hover:bg-slate-50 transition"
>
Retour
</a>

</div>

</x-slot>



<div class="min-h-screen bg-slate-50">

<div class="max-w-5xl mx-auto px-6 py-10">

<div class="bg-white rounded-3xl border border-slate-200 overflow-hidden">

<form
method="POST"
action="{{ route('entretiens.store') }}"
class="p-8 space-y-8"
>

@csrf


{{-- ERRORS --}}

@if($errors->any())

<div class="bg-red-50 border border-red-200 rounded-2xl p-5">

<h3 class="font-semibold text-red-700">
Certaines informations sont invalides
</h3>

<ul class="mt-3 text-sm text-red-600">

@foreach($errors->all() as $error)

<li>• {{ $error }}</li>

@endforeach

</ul>

</div>

@endif



{{-- CANDIDATURE --}}

<div>

<label class="block mb-2 text-sm font-medium text-slate-700">

Candidature

</label>

<select
name="candidature_id"
class="w-full rounded-2xl border border-slate-200 px-4 py-3"
>

<option value="">
Sélectionner une candidature
</option>

@foreach($candidatures as $candidature)

<option
value="{{ $candidature->id }}"
{{ old('candidature_id')==$candidature->id ? 'selected':'' }}
>

{{ $candidature->nom_entreprise }}
—

{{ $candidature->poste }}

</option>

@endforeach

</select>

</div>



{{-- TYPE + RESULTAT --}}

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">

<div>

<label class="block mb-2 text-sm font-medium">

Type entretien

</label>

<select
name="type"
class="w-full rounded-2xl border border-slate-200 px-4 py-3"
>

<option value="">
Choisir
</option>

<option value="telephonique">
Téléphonique
</option>

<option value="RH">
RH
</option>

<option value="technique">
Technique
</option>

<option value="final">
Final
</option>

</select>

</div>



<div>

<label class="block mb-2 text-sm font-medium">

Résultat

</label>

<select
name="resultat"
class="w-full rounded-2xl border border-slate-200 px-4 py-3"
>

<option value="en attente">
En attente
</option>

<option value="positif">
Positif
</option>

<option value="negatif">
Négatif
</option>

</select>

</div>

</div>



{{-- DATE --}}

<div>

<label class="block mb-2 text-sm font-medium">

Date et heure

</label>

<input
type="datetime-local"
name="date_heure"
value="{{ old('date_heure') }}"
class="w-full rounded-2xl border border-slate-200 px-4 py-3"
>

</div>



{{-- NOTES --}}

<div>

<label class="block mb-2 text-sm font-medium">

Notes préparation

</label>

<textarea
name="notes_prepa"
rows="5"
class="w-full rounded-2xl border border-slate-200 px-4 py-3"
placeholder="Questions à préparer, informations utiles..."
>{{ old('notes_prepa') }}</textarea>

</div>



{{-- ACTIONS --}}

<div class="pt-6 border-t border-slate-200 flex justify-end gap-4">

<a
href="{{ route('entretiens.index') }}"
class="px-6 py-3 rounded-2xl border border-slate-300"
>

Annuler

</a>


<button
type="submit"
class="px-6 py-3 rounded-2xl bg-blue-900 text-white hover:bg-blue-800 transition"
>

Créer entretien

</button>

</div>


</form>

</div>

</div>

</div>

@endcomponent