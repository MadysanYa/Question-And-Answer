<?php
  
namespace App\Http\Middleware;
  
use Closure;
use Illuminate\Http\Request;
  
class BlockIpMiddleware
{
    public $whitelistIps = ['10.80.30.238', '10.80.30.138','10.80.30.216','10.80.30.219','10.80.30.220','10.80.30.222','10.80.30.97','10.80.30.221','10.80.30.196', '10.80.30.134'];
  
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
		/*
        if (!in_array($request->ip(), $this->whitelistIps)) {
            abort(403, "You are restricted to access the site.");
        }*/
  
        return $next($request);
    }
}
