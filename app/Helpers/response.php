<?php

if (!function_exists('responseStandard')) {
    /**
     * Retorno padrão para as respostas da API.
     *
     * @param string $message
     * @param string $code
     * @param int $statusCode
     * @param array $additionalData
     * @return \Illuminate\Http\JsonResponse
     */
    function responseStandard(
        string $message,
        string $code,
        int $statusCode,
        array $additionalData = []
    ): \Illuminate\Http\JsonResponse
    {
        return response()->json([
                "status" => $statusCode,
                "code" => $code,
                "message" => $message
            ] + $additionalData, $statusCode);
    }
}
