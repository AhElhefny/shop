<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

class guardAssign extends BaseMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next,$guard=null)
    {
        if($guard !==null){
            auth()->shouldUse($guard);
            $token=$request->header('auth-token');
            $request->headers->set('auth-token',(string)$token,true);
            $request->headers->set('Authorization','Bearer '.$token,true);
            try {
                $user=JWTAuth::parseToken()->authenticate($request);

            }catch (TokenExpiredException $e){
                return response()->json(['Expired-Error'=>$e->getMessage()]);
            }catch (TokenInvalidException $e){
                return response()->json(['Invalid-Error'=>$e->getMessage()]);
            }catch (JWTException $e){
                return response()->json(['JWT-Error'=>$e->getMessage()]);
            }
        }
        return $next($request);
    }
}
