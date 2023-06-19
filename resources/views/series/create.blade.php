<x-app-layout>
    <label>Nova Série</label>
    <x-form :action="route('series.store')" :nome="old('nome')" :update="false" />
</x-app-layout>