<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SellerViewShareMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // satıcı oturum açmış ise ona ait bilgilerin getirildiği yerler
        if($this->getUser())
        {
            $seller = $this->getUser()->seller;
            $unreadNotifications = $seller->unreadNotifications;

            view()->share('_seller', $seller);
            view()->share('_unreadNotifications', $unreadNotifications);
        }
        else
        {
            return redirect()->route('login');
        }
        return $next($request);
    }


    private function getUser()
    {
        return auth()->user();
    }
}
