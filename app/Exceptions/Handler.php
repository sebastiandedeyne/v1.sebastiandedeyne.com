<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Foundation\Validation\ValidationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
    ];

    public function render($request, Exception $exception)
    {
        if (config('app.debug') || $request->isJson()) {
            return parent::render($request, $exception);
        }

        $status = $this->determineStatusCodeForException($exception);

        $headers = $exception instanceof HttpException ?
            $exception->getHeaders() :
            [];

        $data = [
            'exception' => $exception,
            'status' => $status
        ];

        if (view()->exists("errors.{$status}")) {
            return response()->view("errors.{$status}", $data, $status, $headers);
        }

        return response()->view('errors.generic', $data, $status, $headers);
    }

    private function determineStatusCodeForException(Exception $exception): int
    {
        if ($exception instanceof HttpException) {
            return $exception->getStatusCode();
        }

        if ($exception instanceof ModelNotFoundException) {
            return 404;
        }

        return 500;
    }
}
