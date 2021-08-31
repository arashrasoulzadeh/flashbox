<?php

namespace App\Exceptions;

use App\Http\Resources\ForbiddenResource;
use App\Http\Resources\InvalidMethodExceptionResource;
use App\Http\Resources\UnauthenticatedResource;
use App\Http\Resources\UnauthorizedResource;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Throwable;

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
        $this->renderable(function (UnauthorizedException $e, Request $request) {
            return (new UnauthorizedResource($request))
                ->response()
                ->setStatusCode(401);
        });
        $this->renderable(function (AuthenticationException $e, Request $request) {
            return (new UnauthenticatedResource($request))
                ->response()
                ->setStatusCode(401);
        });
        $this->renderable(function (MethodNotAllowedHttpException $e, Request $request) {
            return (new InvalidMethodExceptionResource($request))
                ->response()
                ->setStatusCode(405);
        });
        $this->renderable(function (HttpException $e, Request $request) {
            if ($e->getStatusCode() === 403) {
                return (new ForbiddenResource($request))
                    ->response()
                    ->setStatusCode(403);
            }
            throw $e;
        });
    }
}
