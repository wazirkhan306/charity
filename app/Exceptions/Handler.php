<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Auth\AuthenticationException;
class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    protected function unauthenticated($request, AuthenticationException $exception)
        {
            if ($request->expectsJson()) {
                return response()->json(['error' => 'Unauthenticated.'], 401);
            }
            if ($request->is('web') || $request->is('user/*')) {
                return redirect()->guest('/login/admin');
            }
            if ($request->is('staff') || $request->is('staff/*')) {
                return redirect()->guest('/login/staff');
            }
            if ($request->is('donor') || $request->is('donor/*')) {
                return redirect()->guest('/login/donor');
            }
            return redirect()->guest(route('login'));
        }

    /**
     * A list of the inputs that are never flashed for validation exceptions.
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
}
