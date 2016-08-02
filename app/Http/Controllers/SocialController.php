<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Socialite;

class SocialController extends Controller
{
    public function __construct() {
        
        $this->middleware('guest');
        }
    
        public function getSocialAuth($provider = null){
            if(!config("services.$provider")) abort('404');
            return Socialite::driver($provider)->redirect();
        }
        
        public function getSocialAuthCallback($provider=null){
            
            try{
                $user = Socialite::driver($provider)->user();
            } catch(Exception $e){
                return redirect('auth/'.$provider);
            }
            $authUser = $this->findOrCreateUser($user , $provider);
            Auth::login($authUser, true);
 
            return redirect()->route('home');
           /* if($user == Socialite::driver($provider)->user()){
                //dd($user);
            }else{
                return "Somthing from else block";
            } */
        }
        private function findOrCreateUser($facebookUser , $provider)
                {
                $authUser = User::where(['email' => $facebookUser->email ])->first();

                    if ($authUser){
                        return $authUser;
                    }

                    return User::create([
                        'name' => $facebookUser->name,
                        'email' => $facebookUser->email,                        
                        'avatar' => $facebookUser->avatar,
                        'provider' => $provider
                    ]);
                }
        
}
