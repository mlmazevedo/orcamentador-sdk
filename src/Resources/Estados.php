<?php

namespace Orcamentador\SDK\Resources;

use Orcamentador\SDK\Http\HttpClient;

class Estados
{
    /**
     * @var HttpClient
     */
    private $http;

    /**
     * Estados constructor.
     *
     * @param HttpClient $http
     */
    public function __construct(HttpClient $http)
    {
        $this->http = $http;
    }

    public function listar(array $params)
    {
        return $this->http->get('/estados', $params);
    }       
}
?>