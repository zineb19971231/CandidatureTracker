<x-app-layout>

<x-slot name="header">

<div class="flex items-center justify-between">

<div>

<h2 class="text-2xl font-bold text-slate-900">
Nouvelle candidature
</h2>

<p class="text-sm text-slate-500 mt-1">
Applicant Tracking System
</p>

</div>

<a
href="{{ route('dashboard') }}"
class="px-5 py-3 rounded-2xl border border-slate-200 hover:bg-slate-50"
>
Retour
</a>

</div>

</x-slot>


<div class="min-h-screen bg-slate-50">

<div class="max-w-6xl mx-auto px-6 py-10">

<div class="bg-white rounded-3xl border border-slate-200 overflow-hidden">

<form
method="POST"
action="{{ route('candidature.store') }}"
class="p-8 space-y-8"
>

@csrf


<!-- HERO -->

<div class="rounded-2xl bg-slate-50 p-6">

<h3 class="text-lg font-semibold text-slate-900">
Créer une nouvelle opportunité
</h3>
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
value="{{ old('nom_entreprise') }}"
class="w-full rounded-2xl border border-slate-200 px-4 py-3"
placeholder="Google"
>

</div>


<div>

<label class="block mb-2 text-sm font-medium">
Poste
</label>

<input
type="text"
name="poste"
value="{{ old('poste') }}"
class="w-full rounded-2xl border border-slate-200 px-4 py-3"
placeholder="Frontend Developer"
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
value="{{ old('url_offre') }}"
class="w-full rounded-2xl border border-slate-200 px-4 py-3"
placeholder="https://..."
>

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

<option value="a examiner">
À examiner
</option>

<option value="entretien programme">
Entretien programmé
</option>

<option value="offre reçue">
Offre reçue
</option>

<option value="refusee">
Refusée
</option>

<option value="abandonnee">
Abandonnée
</option>

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

<option value="faible">
Faible
</option>

<option value="moyenne" selected>
Moyenne
</option>

<option value="haute">
Haute
</option>

</select>

</div>


<div>

<label class="block mb-2 text-sm font-medium">
Date candidature
</label>

<input
type="date"
name="date_candidature"
class="w-full rounded-2xl border border-slate-200 px-4 py-3"
>

</div>

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
placeholder="Informations supplémentaires..."
></textarea>

</div>



<!-- ACTIONS -->

<div class="pt-6 border-t border-slate-200 flex justify-end gap-4">

<a
href="{{ route('dashboard') }}"
class="px-6 py-3 rounded-2xl border border-slate-300"
>

Annuler

</a>

<button
type="submit"
class="px-6 py-3 rounded-2xl bg-blue-900 text-white hover:bg-blue-800"
>

Créer candidature

</button>

</div>


</form>

</div>

</div>

</div>

</x-app-layout>