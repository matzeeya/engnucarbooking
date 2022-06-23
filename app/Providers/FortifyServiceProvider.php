<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;
use Laravel\Fortify\Contracts\LoginResponse;
use Laravel\Fortify\Contracts\LogoutResponse;
use Laravel\Fortify\Contracts\RegisterResponse;
use App\Models\User;
use Illuminate\Validation\ValidationException;
//use App\Responses\RegisterResponse;
//use Laravel\Fortify\Contracts\RegisterResponse as RegisterResponseContract;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        /*
        $this->app->bind(
            RegisterResponseContract::class,
            RegisterResponse::class
        );*/

        $this->app->instance(LoginResponse::class, new class implements LoginResponse {
            public function toResponse($request)
            {
                $user = Auth::user();
                //$user = User::find(Auth::id());

                if($user->usr_lvl == 'customer'){
                    return redirect()->route('default-home');
                }else{
                    return redirect()->route('dashboard');
                }
            }
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        RateLimiter::for('login', function (Request $request) {
            $email = (string) $request->email;

            return Limit::perMinute(5)->by($email.$request->ip());
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });

        Fortify::loginView(function (){
            return view('auth.login');
        });

        Fortify::authenticateUsing(function ($request) {

            $user = User::where('username', $request->username)->first();
            $validated=false;

            if ($user && in_array($user->active, [1])) {
                /*if (Hash::check($request->password, $user->password)) {
                    return $user;
                }*/

                $validated = Auth::validate([
                    'samaccountname' => $request->username,
                    'password' => $request->password,
                    'fallback' => [
                        'username' => $request->username,
                        'password' => $request->password,
                    ],
                ]);
            }
            else {
                throw ValidationException::withMessages([
                    Fortify::username() => "Username not found or account is inactive. Please check your username.",
                ]);
            }




             /*if ($user && Hash::check($request->password, $user->password) && $user->active == 1) {
                //if (Hash::check($request->password, $user->password)) {
                return $user;
                //}
            }
            else {
                throw ValidationException::withMessages([
                    Fortify::username() => "Username not found or account is inactive. Please check your username.",
                ]);
            }*/

            //dd($validated);


            return $validated ? Auth::getLastAttempted() : null;
        });

    }
}
