<x-app-layout>
    <label>Editando série '{{ $serie->nome }}'</label>
    <x-form :action="route('series.update', $serie->id)" :nome="$serie->nome" :update="true"/>
</x-app-layout>