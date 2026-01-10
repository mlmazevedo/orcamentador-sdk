<?php
// ==========================
// src/Exceptions/ApiException.php
// ==========================
namespace Orcamentador\SDK\Exceptions;

class ApiException extends \Exception
{
    /**
     * Payload original retornado pela API
     *
     * @var array|null
     */
    protected $payload;

    /**
     * ApiException constructor.
     *
     * @param string      $message
     * @param int         $code
     * @param array|null  $payload
     */
    public function __construct($message, $code = 0, $payload = null)
    {
        parent::__construct($message, (int) $code);
        $this->payload = $payload;
    }

    /**
     * Retorna o payload original da API
     *
     * @return array|null
     */
    public function getPayload()
    {
        return $this->payload;
    }
}