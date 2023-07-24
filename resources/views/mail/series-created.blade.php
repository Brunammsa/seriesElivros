@component('mail::message')
# {{$nomeSerie}}

A série {{$nomeSerie}} com {{$qntTemporadas}} temporadas e {{$qntEpisodios}} episódios foi criada com sucesso

@component('mail::button', ['url' => route('temporadas.index', $idSerie)])
Clique aqui para visualizar    
@endcomponent

@endcomponent
