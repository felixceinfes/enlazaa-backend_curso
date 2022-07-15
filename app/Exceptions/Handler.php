<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Validation\ValidationException;
class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */

    public function render($request, Throwable $exception){
        $code=500;
        $msg="";
        switch(class_basename($exception)){
            case 'TokenMismatchException':                   
                $msg="Token no autorizado";
                $code=403;               
            break;
            case 'ThrottleRequestsException':
                $msg="ThrottleRequestsException";
                $code=429; 
            break;
            case 'MethodNotAllowedHttpException':
                $msg="Método no autorizado";
                $code=405; 
            break;
            case 'NotFoundHttpException':
                $msg="Recurso no encontrado";
                $code=404; 
            break;
            case 'AuthenticationException':
                $msg="No autorizado - no autenticado";
                $code=401; 
            break;
            case 'ValidationException':
                $msg=$exception->validator->getMessageBag();
                $code=422; 
            break;
            default:
                $msg="error de aplicación";
                $code=500; 
        }
        return response()->json([
            "status"=>"error",
            'msg' =>$msg,
        ],$code);
            
    }
}
