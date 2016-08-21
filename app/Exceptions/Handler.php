<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Ohio\Core\Base\Helper\StrHelper;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $e
     * @return void
     */
    public function report(Exception $e)
    {
        parent::report($e);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $e
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {

        if (method_exists($e, 'getResponse')) {
            if ($e->getResponse() instanceof JsonResponse) {
                return response()->json(['message' => $e->getResponse()->getData()], $e->getResponse()->getStatusCode());
            }
        }

        /**
         * @ohio convert api expceptiosn to JSON
         */
        $middleware = $request->route()->middleware();
        if (in_array('api', $middleware)) {

            $msg = StrHelper::isJson($msg) ? json_decode($msg, true) : $msg;

            if (method_exists($e, 'getStatusCode')) {
                return response()->json(['message' => $msg], $e->getStatusCode());
            } else {
                return response()->json(['message' => $msg], 400);
            }

            //return response()->json(['message'=> $e->getMessage()], $e->getStatusCode());
        }

        return parent::render($request, $e);
    }
}
