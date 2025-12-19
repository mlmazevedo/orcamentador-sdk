<?php

namespace Orcamentador\SDK\Resources;

use Orcamentador\SDK\Http\HttpClient;

class Indicadores
{
    /**
     * @var HttpClient
     */
    private $http;

    /**
     * Indicadores constructor.
     *
     * @param HttpClient $http
     */
    public function __construct(HttpClient $http)
    {
        $this->http = $http;
    }

    public function listar(array $params)
    {
        return $this->http->get('/indicadores', $params);
    }       
}
?>