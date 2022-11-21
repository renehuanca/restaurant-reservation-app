<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Services\TableService;

class TablesAvalaibles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
		$tableService = new TableService();
		
		if (! $tableService->hasTablesAvalaible()) {
			abort(403, __('Ups!! there are not tables avalaible.'));
		}

        return $next($request);
    }
}
