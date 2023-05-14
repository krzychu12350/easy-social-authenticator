<?php

namespace App\Http\Controllers;

use GuzzleHttp\Exception\ClientException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Contracts\User as SocialiteUser;


class LoginController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return JsonResponse
     */

    public function redirectToGoogle(): JsonResponse
    {

        $redirectUrl = Socialite::driver('google')->stateless()->redirect()->getTargetUrl();

        return response()->json([
            'redirect_url' => $redirectUrl
        ]);
    }


    /**
     * Create a new controller instance.
     *
     * @return JsonResponse
     */

    public function handleGoogleCallback(): JsonResponse

    {
        try {
            /** @var SocialiteUser $socialiteUser */
            $socialiteUser = Socialite::driver('google')->stateless()->user();
            // dd($socialiteUser);
            return response()->json([
                'socialiteUser' => $socialiteUser
            ]);
        } catch (ClientException $e) {
            return response()->json(['error' => 'Invalid credentials provided.'], 422);
        }

        /*
        try {
            $user = Socialite::driver('google')->stateless()->user();
            dd($user);

            $findUser = User::where('id', $user->id)->first();

            if ($findUser) {
                //Auth::login($finduser);
                //return redirect()->intended('dashboard');
                return response()->json([
                    'user' => $findUser
                ]);
            } else {
                $newUser = User::create([
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id' => $user->id,
                    'password' => encrypt('123456dummy')

                ]);
                //Auth::login($newUser);
                //return redirect()->intended('dashboard');
                return response()->json([
                    'user' => $newUser
                ]);
            }


        } catch (Exception $e) {

            dd($e->getMessage());

        }
        */

    }

    /**
     * Create a new controller instance.
     *

     */

    public function redirectToGithub(): JsonResponse
    {
        /*
        dd(
            Socialite::driver('github')->redirect()->getTargetUrl(),
            Socialite::driver('github')->redirect()->setTargetUrl('test123')
        );
        */
        // dd(Socialite::driver('github')->stateless()->redirect());
        $redirectUrl = Socialite::driver('github')->stateless()->redirect()->getTargetUrl();

        return response()->json([
            'redirect_url' => $redirectUrl
        ]);

    }


    /**
     * Create a new controller instance.
     *
     * @return JsonResponse
     */

    public function handleGithubCallback(): JsonResponse

    {
        try {
            /** @var SocialiteUser $socialiteUser */
            $socialiteUser = Socialite::driver('github')->stateless()->user();
            // dd($socialiteUser);
            return response()->json([
                'socialiteUser' => $socialiteUser
            ]);
        } catch (ClientException $e) {
            return response()->json(['error' => 'Invalid credentials provided.'], 422);
        }
        /*
        try {
            $user = Socialite::driver('github')->userFromToken("a0AWY7CklTGDaD9J2y59iHUNfFy5Phn5nbmoDonSewMB1q2hAv1KIKXYS67MlUt1Y3bInZoQKpoUyYQFY6J7u_EASpGOalnNLztcxzIiWRocBMAGM1avQhieB8eJAP4hmEU6QijC5OJBAz0PZOfWkWXwiR5txEaCgYKAQ4SARISFQG1tDrpqrnRl1Pd-eKM3T65v9ECOQ0163");
            dd($user);
            //return Redirect::to('http://localhost:5173/test');

            $findUser = User::where('id', $user->id)->first();
            if ($findUser) {
                //Auth::login($finduser);
                //return redirect()->intended('dashboard');
                return response()->json([
                    'user' => $findUser
                ]);
            } else {
                $newUser = User::create([
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    //'google_id' => $user->id,
                    'password' => encrypt('123456dummy')

                ]);
                //Auth::login($newUser);
                //return redirect()->intended('dashboard');
                return response()->json([
                    'user' => $newUser
                ]);

            }

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);

        }
        */
    }
    public function handleGoogleCallbackk(): JsonResponse

    {
        return response()->json([
            'user' => [
                'id' => 14,
                'name' => 'ew'
            ]
        ]);
    }
}

