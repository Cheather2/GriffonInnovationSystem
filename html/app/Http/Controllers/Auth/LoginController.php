<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use Auth;
use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    public function redirectTo(){

        // User role
        $role = Auth::user()->role;

        // Check user role
        switch ($role) {
            case 'adviser':
                return '/advisors';
                break;
            case 'student':
                return '/home';
                break;
            default:
                return '/home';
                break;
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function redirectToProvider($provider)
{
    return Socialite::driver($provider)->redirect();
}

public function handleProviderCallback($provider)
{
    $user = Socialite::driver($provider)->stateless()->user();
    if (strpos($user['email'], '@missouriwestern.edu')){
    $authUser = $this->findOrCreateUser($user, $provider);
    Auth::login($authUser, true);
    return redirect($this->redirectTo());
     }
     else return redirect('/home');
  }


  public function findOrCreateUser($user, $provider)
  {
      $authUser = User::where('provider_id', $user->id)->first();
      if ($authUser) {
        return $authUser;
      }
      return User::create([
        'name'       => $user->name,
        'email'       => $user->email,
        'provider'      => strtoupper($provider),
        'provider_id'     => $user->id
      ]);
  }
}
