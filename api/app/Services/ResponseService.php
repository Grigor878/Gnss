<?php

namespace App\Services;

use Illuminate\Http\JsonResponse;

class ResponseService
{
    const SUCCESS = 200;
    const NOTFOUND = 404;
    const BADREQUEST = 400;
    const EMPTY = 204;
    const FORBIDDEN = 403;

    /**
     * @param $data
     * @param string $message
     * @param int $status
     * @return JsonResponse
     */
    public function badRequest($data, string $message = 'Sorry Something went Wrong.', int $status = self::BADREQUEST): JsonResponse
    {
        return $this->_response($data, $message, $status);
    }

    /**
     * @param $data
     * @param string $message
     * @param int $status
     * @return JsonResponse
     */
    public function forEmpty($data, string $message = 'Empty Data', int $status = self::EMPTY): JsonResponse
    {
        return $this->_response($data, $message, $status);
    }

    /**
     * @param $data
     * @param string $message
     * @param int $status
     * @return JsonResponse
     */
    public function notFound($data, string $message = 'Sorry, Resource not found.', int $status = self::NOTFOUND): JsonResponse
    {
        return $this->_response($data, $message, $status);
    }

    /**
     * @param $data
     * @param string $message
     * @param int $status
     * @return JsonResponse
     */
    public function success($data, string $message = 'Success', int $status = self::SUCCESS): JsonResponse
    {
        return $this->_response($data, $message, $status);
    }

    /**
     * @param array $data
     * @param string $message
     * @param $status
     * @return JsonResponse
     */
    private function _response($data = [], $message = '', $status): JsonResponse
    {
        return response()->json([
            'status' => $status,
            'message' => $message,
            'data' => $data,
        ], $status);
    }
}
