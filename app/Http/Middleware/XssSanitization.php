<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class XssSanitization{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next){
        $input = $request->all();
        array_walk_recursive($input, function(&$input) {
            $input = strip_tags($input);
            $input = htmlspecialchars($input);
            $input=preg_replace('/\bdelete\b/i', "", $input);
            $input=preg_replace('/\bamp;\b/', "", $input);
            $input=preg_replace('/\bselect\b/i', "", $input);
            $input=preg_replace('/\bdatabase\b/i', "", $input);
            $input=preg_replace('/\bfrom\b/i', "", $input);
            $input=preg_replace('/\bupdate\b/i', "", $input);
            $input=preg_replace('/\balter\b/i', "", $input);
            $input=preg_replace('/\btable\b/i', "", $input);
            $input=str_ireplace("1=1", "", $input);
            $input=str_ireplace("/\bdocument\b/u", "", $input);
            $input=str_ireplace("/\bcookie\b/u", "", $input);
            $input=str_ireplace("/\balert\b/u", "", $input);
            $input=str_ireplace("/\bconsole\b/u", "", $input);
            $input=str_ireplace("/\blog\b/u", "", $input);
            
        });
        $request->merge($input);
        return $next($request);
    }
}
