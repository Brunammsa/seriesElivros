<?php

namespace Tests\Feature;

use App\Http\Requests\SeriesFormRequest;
use App\Repositories\SeriesRepositoryInterface;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SeriesRepositoryTest extends TestCase
{
    use RefreshDatabase;

    public function quando_uma_serie_e_criada_uma_temporada_e_episodios_tambem_sao_criados(): void
    {
        //arranjo
        /**
         * @var SeriesRepositoryInterface $repository
         */
        $repository = $this->app->make(SeriesRepositoryInterface::class);
        $request = new SeriesFormRequest();
        $request->setMethod('POST');
        $request->request->add([
            'name' => 'nome da série',
            'qntTemp' => '1',
            'qntEps' => '1',
        ]);


        //ação
        $repository->add($request);

        //assert
        $this->assertDatabaseHas('series', ['name' => 'Nome da série']);
        $this->assertDatabaseHas('qntEps', ['numero' => 1]);
        $this->assertDatabaseHas('series', ['numero' => 1]);
    }
}
