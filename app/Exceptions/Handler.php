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

    public function report(Exception $e)
    {
        parent::report($e);
    }

    public function render($request, Exception $e)
    {
        if (config('app.debug')) {
            return parent::render($request, $e);
        }

        $status = $e instanceof HttpException ?
            $e->getStatusCode() :
            500;

        $headers = $e instanceof HttpException ?
            $e->getHeaders() :
            [];

        $data = [
            'exception' => $e,
            'status' => $status
        ];

        if (view()->exists("errors.{$status}")) {
            return response()->view("errors.{$status}", $data, $status, $headers);
        }

        return response()->view('errors.generic', $data, $status, $headers);
    }
}
