<?php

namespace Orcamentador\SDK\Resources;

use Orcamentador\SDK\Http\HttpClient;

class Orcamento
{
    /**
     * @var HttpClient
     */
    private $http;

    /**
     * Orcamento constructor.
     *
     * @param HttpClient $http
     */
    public function __construct(HttpClient $http)
    {
        $this->http = $http;
    }

    public function gerar(array $params)
    {
        return $this->http->get('/orcamento', $params);
    }       
}
?>