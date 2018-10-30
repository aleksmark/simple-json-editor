<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Session\TokenMismatchException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password'
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
        if ($request->ajax() || $request->wantsJson()) {
            return $this->handleJsonErrorReponse($request, $exception);
        }

        return parent::render($request, $exception);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param Exception $e
     *
     * @return null
     */
    protected function handleJsonErrorReponse($request, Exception $e)
    {
        $data = [];

        if ($e instanceof ValidationException) {
            $data += [
                'status_code' => Response::HTTP_UNPROCESSABLE_ENTITY,
                'error_code' => 'validation_error',
                'errors' => $e->errors()
            ];
        } else {
            $data += [
                'status_code' => $e instanceof HttpException ? $e->getStatusCode() : ($e->getCode() ?: Response::HTTP_I_AM_A_TEAPOT),
                'error_code' => $e instanceof ApplicationHttpException ? trans('ssomessage.' . $e->getMessage()) : $e->getMessage()
            ];
        }

        if (env('APP_DEBUG')) {
            $data += ['debug' => [
                'line' => $e->getLine(),
                'file' => $e->getFile(),
                'class' => get_class($e),
                'trace' => $e->getTraceAsString()
            ]];
        }

        return response()->json($data, $data['status_code']);
    }
}
