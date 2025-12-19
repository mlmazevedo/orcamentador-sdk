<?php

namespace Orcamentador\SDK\Http;

use Orcamentador\SDK\Exceptions\ApiException;
use Orcamentador\SDK\Exceptions\RateLimitException;
use Orcamentador\SDK\Exceptions\AuthenticationException;
use Orcamentador\SDK\Exceptions\NotFoundException;
use Orcamentador\SDK\Exceptions\ServerException;

class HttpClient
{
    /**
     * @var string
     */
    private $baseUrl;

    /**
     * @var string
     */
    private $apiKey;

    /**
     * @var int
     */
    private $timeout;

    /**
     * HttpClient constructor.
     *
     * @param string $baseUrl
     * @param string $apiKey
     * @param int    $timeout
     */
    public function __construct($baseUrl, $apiKey, $timeout = 20)
    {
        $this->baseUrl = rtrim($baseUrl, '/');
        $this->apiKey  = $apiKey;
        $this->timeout = (int) $timeout;
    }

    /**
     * Executa requisição GET
     *
     * @param string $path
     * @param array  $query
     *
     * @return array
     * @throws ApiException
     */
    public function get($path, array $query = [])
    {
        $url = $this->baseUrl . $path;

        if (!empty($query)) {
            $url .= '?' . http_build_query($query);
        }

        $ch = curl_init($url);

        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT        => $this->timeout,
            CURLOPT_HTTPHEADER     => [
                'X-API-Key: ' . $this->apiKey,
                'Accept: application/json'
            ]
        ]);

        $response = curl_exec($ch);
        $status   = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if ($response === false) {
            curl_close($ch);
            throw new ApiException('Erro de conexão com a API');
        }

        curl_close($ch);

        $data = json_decode($response, true);

        /**
         * Extrai mensagem de erro retornada pela API
         */
        $message = 'Erro na requisição';

        if (is_array($data)) {
            if (isset($data['erro'])) {
                $message = $data['erro'];
            } elseif (isset($data['message'])) {
                $message = $data['message'];
            } elseif (isset($data['mensagem'])) {
                $message = $data['mensagem'];
            }
        }

        if ($status >= 200 && $status < 300) {
            return $data ?: [];
        }

        switch ($status) {
            case 401:
            case 403:
                throw new AuthenticationException($message, $status, $data);

            case 404:
                throw new NotFoundException($message, $status, $data);

            case 429:
                throw new RateLimitException($message, $status, $data);

            default:
                throw new ServerException($message, $status, $data);
        }
    }
}
?>