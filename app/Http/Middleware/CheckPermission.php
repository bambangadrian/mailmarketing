<?php
namespace MailMarketing\Http\Middleware;

use Closure;

/**
 * Class CheckPermission.
 *
 * @package MailMarketing\Http\Middleware
 */
class CheckPermission
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        return $next($request);
    }
}
