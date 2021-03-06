<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;

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
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
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
        if($request->is('api/*')){
            if ($exception instanceof ValidationException) {
                return response()->json(
                    $exception->errors(),
                    $exception->status
                );
            }
        }

        if ($exception instanceof Tymon\JWTAuth\Exceptions\TokenExpiredException) {
            return response()->json(['erro' => 'token_expired'], $exception->getStatusCode());
        } else if ($exception instanceof Tymon\JWTAuth\Exceptions\TokenInvalidException) {
            return response()->json(['erro' => 'token_invalid'], $exception->getStatusCode());
        } else if($exception instanceof \Tymon\JWTAuth\Exceptions\JWTException){
            return response()->json(['erro' => $exception->getMessage()]);
        } else if($exception instanceof \Tymon\JWTAuth\Exceptions\TokenBlacklistedException){
            return response()->json(['erro' => 'The token has been blacklisted']);
        }
        
        // dd($exception->getStatusCode(), $exception->getMessage());
        return parent::render($request, $exception);
        // return response()->json(['erro' => $exception->getMessage(), 'code' => $exception->getStatusCode()]);
    }
}
