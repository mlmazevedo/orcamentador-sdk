<?php

namespace Orcamentador\SDK\Resources;

use Orcamentador\SDK\Http\HttpClient;

class Encargos
{
    /**
     * @var HttpClient
     */
    private $http;

    /**
     * Encargos constructor.
     *
     * @param HttpClient $http
     */
    public function __construct(HttpClient $http)
    {
        $this->http = $http;
    }

    public function buscar(array $params)
    {
        return $this->http->get('/encargos', $params);
    }       
}
?>