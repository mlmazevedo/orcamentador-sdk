<?php

namespace Orcamentador\SDK\Resources;

use Orcamentador\SDK\Http\HttpClient;

class Insumos
{
    /**
     * @var HttpClient
     */
    private $http;

    /**
     * Insumos constructor.
     *
     * @param HttpClient $http
     */
    public function __construct(HttpClient $http)
    {
        $this->http = $http;
    }

    /**
     * Buscar insumos por nome, código ou filtros
     *
     * @param array $params ['nome' => '', 'codigo' => '', 'estado' => 'sp', 'referencia' => '2025-09-01']
     * @return array
     */
    public function buscar(array $params)
    {
        return $this->http->get('/insumos', $params);
    }
}
?>