<?php

namespace Orcamentador\SDK;
 
use Orcamentador\SDK\Http\HttpClient;
use Orcamentador\SDK\Resources\Insumos;
use Orcamentador\SDK\Resources\Composicoes;
use Orcamentador\SDK\Resources\Orcamento;
use Orcamentador\SDK\Resources\Estados;
use Orcamentador\SDK\Resources\Indicadores;
use Orcamentador\SDK\Resources\Encargos;

class Client
{
    /**
     * @var HttpClient
     */
    private $http;

    /**
     * Client constructor.
     *
     * @param string $apiKey
     * @param string $baseUrl
     */
    public function __construct($apiKey, $baseUrl = 'https://orcamentador.com.br/api')
    {
        $this->http = new HttpClient($baseUrl, $apiKey);
    }

    /**
     * Retorna o resource de insumos
     *
     * @return Insumos
     */
    public function insumos()
    {
        return new Insumos($this->http);
    }

    /**
     * Retorna o resource de composicoes
     *
     * @return Composicoes
     */
    public function composicoes()
    {
        return new Composicoes($this->http);
    }    

    /**
     * Retorna o resource de orcamentos
     *
     * @return Orcamento
     */
    public function orcamento()
    {
        return new Orcamento($this->http);
    }  
    
    /**
     * Retorna o resource de estados
     *
     * @return Estados
     */
    public function estados()
    {
        return new Estados($this->http);
    }   
    
    /**
     * Retorna o resource de indicadores
     *
     * @return Indicadores
     */
    public function indicadores()
    {
        return new Indicadores($this->http);
    }  
    
    /**
     * Retorna o resource de encargos
     *
     * @return Encargos
     */
    public function encargos()
    {
        return new Encargos($this->http);
    }    
}
?>