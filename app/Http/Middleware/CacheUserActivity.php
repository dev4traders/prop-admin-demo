<?php

namespace App\Http\Middleware;

use Dcat\Admin\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Request;

class CacheUserActivity
{
    public function handle(Request $request, \Closure $next, $guard = null)
    {
        // This works only if users are logged in
        if(Admin::guard()->check()) {
            // Get the array of users from the cache
            $users = Cache::get('online-users');
            // If it's empty create it with the user who triggered this middleware call
            if(empty($users)) {
                Cache::put('online-users', [['id' => Admin::user()->id, 'last_activity_at' => now()]], now()->addMinutes(config('funded.active_minites')));
            } else {
                // Otherwise iterate over the users stored in the cache array
                foreach ($users as $key => $user) {

                    // If the current iteration matches the logged in user, unset it because it's old
                    // and we want only the last user interaction to be stored (and we'll store it below)
                    if($user['id'] === Admin::user()->id) {
                        unset($users[$key]);
                        continue;
                    }

                    // If the user's last activity was more than 10 minutes ago remove it
                    if ($user['last_activity_at'] < now()->subMinutes(config('funded.active_minites'))) {
                        unset($users[$key]);
                        continue;
                    }
                }

                // Add this last activity to the cache array
                $users[] = ['id' => Admin::user()->id, 'last_activity_at' => now()];

                // Put this array in the cache
                Cache::put('online-users', $users, now()->addMinutes(config('funded.active_minites')));
            }
        }
        return $next($request);
    }

}