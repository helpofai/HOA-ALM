<?php

namespace App\Shared\Http;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class SharedApiResponse
{
    /**
     * Success Response.
     */
    public static function success(mixed $data = null, string $message = 'Success', int $code = Response::HTTP_OK): JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data'    => $data,
        ], $code);
    }

    /**
     * Error Response.
     */
    public static function error(string $message = 'Error occurred', int $code = Response::HTTP_BAD_REQUEST, mixed $errors = null): JsonResponse
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'errors'  => $errors,
        ], $code);
    }
}
