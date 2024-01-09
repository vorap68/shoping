<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IsEmptyBasket
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
        $orderId = session('order_id');
        if (!is_null($orderId) && DB::table('order_product')->where('order_id', $orderId)->exists()) {
            return $next($request);
        }
        session()->forget('order_id');
        session()->flash('warning', __('your_basket_empty'));
        return redirect()->route('main');
    }
}
