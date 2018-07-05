<?php

namespace App\Util;

use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

class MessageResponse{

    public function __construct($statusCode = 200, $data = [], $error = [], $messageSucessCustom = null)
    {
        $this->statusCode = $statusCode;
        $this->statusMessage = Response::$statusTexts[$statusCode];
        $this->data = $data;
        $this->error = $error;
        $this->success = (empty($messageSucessCustom) ? $this->messageSucess[$statusCode] : $messageSucessCustom);
    }

    public $messageSucess = array(
        200 => 'OK',
        201 => 'Registro Salvo Corretamente!',
        204 => '',
        400 => 'Falha na Requisição!',
        401 => 'Falha na Autenticação!',
        404 => 'Recurso não Localizado'
        // TODO : implementar o resto de acordo com a necessidade
    );

    public function buildMessageResponseJson($statusCode = 200, $data = [], $error = [], $messageSucessCustom = null){
        $this->__construct($statusCode, $data, $error, $messageSucessCustom);
        $buildMessage = array(
            'statusCode' => $this->statusCode,
            'statusMessage' => $this->statusMessage,
            'message' => $this->success,
            'error' => $this->error,
            'data' => $this->data,
        );
        return new JsonResponse($buildMessage, $this->statusCode);
    }
}



?>