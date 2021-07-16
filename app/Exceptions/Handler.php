<?php

namespace App\Exceptions;

use App\Traits\ResponseTrait;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class Handler extends ExceptionHandler
{
    use ResponseTrait;
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
     * @param   $request
     * @param Throwable $e
     * @return Response
     * @throws Throwable
     */
    public function render($request, Throwable $e)
    {
        if ( $e instanceof AuthorizationException) {
            if ($request->isJson() || $request->ajax() || $request->wantsJson())
                return $this->failJsonResponse([__( 'auth.unauthorized')],401);
        }
        if (!$this->isHttpException($e)) {
            if ($request->isJson() || $request->ajax() || $request->wantsJson()){
                return $this->errorJsonResponse([$e->getMessage()],['File'=>$e->getFile(),'Line'=>$e->getLine()],500);
            }
        }
        return parent::render($request, $e);
    }
    /**
     * @param $request
     * @param AuthenticationException $exception
     * @return JsonResponse|RedirectResponse|Response
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return $this->failJsonResponse([__( 'auth.unauthenticated')],401);
        }
        return redirect()->guest('login');
    }
}
