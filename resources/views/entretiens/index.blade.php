{{-- resources/views/entretiens/index.blade.php --}}

@component('layouts.app')

<x-slot name="header">

<div class="flex items-center justify-between">

    <div>
        <h2 class="text-2xl font-bold text-slate-900">
            Gestion des entretiens
        </h2>

        <p class="text-sm text-slate-500 mt-1">
            Suivi des étapes de recrutement
        </p>
    </div>

    <a
        href="{{ route('entretiens.create') }}"
        class="px-5 py-3 rounded-2xl bg-blue-900 text-white hover:bg-blue-800 transition"
    >
        Ajouter un entretien
    </a>

</div>

</x-slot>


<div class="min-h-screen bg-slate-50">

<div class="max-w-7xl px-6 py-10">

@if($entretiens->isEmpty())

<div class="bg-white rounded-3xl border border-slate-200 p-16">

<h3 class="text-xl font-semibold text-slate-900">
Aucun entretien
</h3>

<p class="mt-2 text-slate-500">
Ajoute ton premier entretien.
</p>

<a
href="{{ route('entretiens.create') }}"
class="inline-block mt-6 px-6 py-3 rounded-2xl bg-blue-900 text-white"
>
Créer
</a>

</div>

@else


<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">

@foreach($entretiens as $entretien)

<div class="bg-white rounded-3xl border border-slate-200 p-6">

<div class="flex justify-between">

<div>

<div
class="w-14 h-14 rounded-2xl bg-blue-900 text-white flex items-center justify-center"
>

{{ strtoupper(substr($entretien->type,0,1)) }}

</div>

<h3 class="mt-4 text-lg font-semibold text-slate-900">

{{ ucfirst($entretien->type) }}

</h3>

<p class="text-sm text-slate-500">

{{ $entretien->candidature->nom_entreprise }}

</p>

</div>


<span
class="px-3 py-1 rounded-full text-xs

@if($entretien->resultat=='reussi')
bg-green-50 text-green-700

@elseif($entretien->resultat=='refuse')
bg-red-50 text-red-700

@else
bg-yellow-50 text-yellow-700
@endif
"
>

{{ $entretien->resultat }}

</span>

</div>


<div class="mt-6 space-y-4">

<div>
<p class="text-xs text-slate-400">
Date
</p>

<p class="text-slate-900">
{{ $entretien->date_entretien }}
</p>
</div>


@if($entretien->notes)

<div class="bg-slate-50 rounded-2xl p-4">

<p class="text-sm text-slate-500">

{{ Str::limit($entretien->notes,100) }}

</p>

</div>

@endif

</div>


<div class="mt-8 flex gap-3">

<a
href="{{ route('entretiens.show',$entretien->id) }}"
class="flex-1 py-3 rounded-2xl border text-center"
>

Voir

</a>


<a
href="{{ route('entretiens.edit',$entretien->id) }}"
class="flex-1 py-3 rounded-2xl bg-blue-900 text-white text-center"
>

Modifier

</a>

</div>


<form
action="{{ route('entretiens.destroy',$entretien->id) }}"
method="POST"
class="mt-3"
>

@csrf
@method('DELETE')

<button
type="submit"
onclick="return confirm('Supprimer cet entretien ?')"
class="w-full py-3 rounded-2xl bg-red-50 text-red-600"
>

Supprimer

</button>

</form>

</div>

@endforeach

</div>


@if(method_exists($entretiens,'links'))

<div class="mt-10">

{{ $entretiens->links() }}

</div>

@endif


@endif

</div>

</div>

@endcomponent