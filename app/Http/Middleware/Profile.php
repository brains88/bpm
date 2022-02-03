<?php

namespace App\Http\Middleware;
use Illuminate\Http\Request;
use App\Models\{Artisan, Agent};
use Closure;

class Profile
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();
        if ('user' === $user->role && (!empty(Artisan::where(['user_id' => $user->id])->first()) || !empty(Agent::where(['user_id' => $user->id])->first()))) {
            return $next($request);
        }

        return route('profile.setup');
    }
}
