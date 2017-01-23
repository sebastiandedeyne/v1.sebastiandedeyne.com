<?php

namespace App\Exceptions;

use Exception;
use HttpException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        \Illuminate\Auth\AuthenticationException::class,
        \Illuminate\Auth\Access\AuthorizationException::class,
        \Symfony\Component\HttpKernel\Exception\HttpException::class,
        \Illuminate\Database\Eloquent\ModelNotFoundException::class,
        \Illuminate\Session\TokenMismatchException::class,
        \Illuminate\Validation\ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
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
            'status' => $status,
        ];

        if (view()->exists("errors.{$status}")) {
            return response()->view("errors.{$status}", $data, $status, $headers);
        }

        return response()->view('errors.generic', $data, $status, $headers);
    }

    protected function determineStatusCodeForException(Exception $exception): int
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
