<?php

namespace App\Http\Middleware;

use App\Models\Opportunity;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ThisOpportunityManager
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->user()->role_id == 1) {
            return $next($request);
        } else {
            if (isset($request->opportunity)){
                $opportunity = Opportunity::find($request->opportunity);
                if ($opportunity->user_id == auth()->user()->id) {
                    return $next($request);
                } else {
                    return redirect(route('opportunities.index'));
                }
            }
            return $next($request);
        }
    }
}
