<x-app-layout>
    
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <label>Nova Série</label>
                <x-form :action="route('series.store')" :nome="old('nome')" :update="false" />
            </div>
        </div>
    </div>

</x-app-layout>