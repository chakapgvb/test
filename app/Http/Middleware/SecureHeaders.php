<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SecureHeaders
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    private $unwantedHeaderList=['X-Powered-By','Server'];
    public function handle(Request $request, Closure $next)
    {
        $this->removeUnwantedHeaders($this->unwantedHeaderList);
        $response = $next($request);
        $response->headers->set('Referrer-Policy','no-referrer-when-downgrade');
        $response->headers->set('X-Content-Type-Options','nosniff');
        $response->headers->set('X-XSS-Protection','1; mode=block');
        $response->headers->set('Cache-Control','no-cache, must-revalidate, no-store, max-age=0, private');
        $response->headers->set('X-Frame-Options','DENY');
        $response->headers->set('Strict-Transport-Security','max-age=31536000; includeSubDomains');
        $response->headers->set('Content-Security-Policy',"geolocation 'self'; iframe-src 'self' 'unsafe-inline' https://maps.google.com/*");
        return $response;
    }
    private function removeUnwantedHeaders($headerList)
    {
        foreach($headerList as $header)
        {
            header_remove($header);
        }
    }
}
