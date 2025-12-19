<?php

namespace Orcamentador\SDK\Resources;

use Orcamentador\SDK\Http\HttpClient;

class Composicoes
{
    /**
     * @var HttpClient
     */
    private $http;

    /**
     * Composicoes constructor.
     *
     * @param HttpClient $http
     */
    public function __construct(HttpClient $http)
    {
        $this->http = $http;
    }

    public function buscar(array $params)
    {
        return $this->http->get('/composicoes', $params);
    }

    public function detalhar(array $params)
    {
        return $this->http->get('/composicao', $params);
    }   
    
    public function explode(array $params)
    {
        return $this->http->get('/composicao_explode', $params);
    }    

    public function historico(array $params)
    {
        $params['item'] = 'composicao';
        return $this->http->get('/historico', $params);
    }  

    public function comparar(array $params)
    {
        $params['item'] = 'composicao';
        return $this->http->get('/comparar', $params);
    }    
    
    public function previsao(array $params)
    {
        $params['item'] = 'composicao';
        return $this->http->get('/previsao', $params);
    }        
}
?>