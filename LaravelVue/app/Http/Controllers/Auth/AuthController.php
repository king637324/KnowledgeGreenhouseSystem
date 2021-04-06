<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
// use Illuminate\Foundation\Auth\RegistersUsers;
// use Illuminate\Foundation\Auth\AuthenticatesUsers;
// use Illuminate\Auth\Passwords\PasswordBroker;
use Illuminate\Auth\Events\PasswordReset;
// use Illuminate\Support\Facades\Password;
class AuthController extends Controller
{
    // 將資料庫的User資料表  轉成JSON
    public function getJSON_User(){
        $user = User::get();
        return $user;
    }

    // 註冊
    public function register(Request $request){
        $v = Validator::make($request->all(), [
            'email' => 'required|email|unique:users',
            'password'  => 'required|min:3|',
            'identity' => 'required',
        ]);
        if ($v->fails())
        {
            return response()->json([
                'status' => 'error',
                'errors' => $v->errors()
            ], 422);
        }
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->companyname = $request->companyname;
        $user->phoneNumber = $request->phoneNumber;
        $user->identity = $request->identity;
        $user->isadmin = 0;
        $user->status = '正常';

        $user->password = bcrypt($request->password);
        $user->save();
        // $user->sendEmailVerificationNotification();
        return response()->json(['status' => 'success'], 200);
    }
    // protected function resetPassword($user, $password)
    // {
    //     $user->password = bcrypt($password);
    //     $user->save();
    //     event(new PasswordReset($user));
    // }
    // 登入
    public function login(Request $request){
        $credentials = $request->only('email', 'password');
        if ($token = $this->guard()->attempt($credentials)) {
            return response()->json(['status' => 'success'], 200)->header('Authorization', $token);
        }
        return response()->json(['error' => 'login_error'], 401);
    }

    // 登出
    public function logout(){
        $this->guard()->logout();
        return response()->json([
            'status' => 'success',
            'msg' => 'Logged out Successfully.'
        ], 200);
    }


    // 使用者
    public function user(Request $request){
        $user = User::find(Auth::user()->id);
        return response()->json([
            'status' => 'success',
            'data' => $user
        ]);
    }

    // 刷新令牌
    public function refresh(){
        if ($token = $this->guard()->refresh()) {
            return response()
                ->json(['status' => 'successs'], 200)
                ->header('Authorization', $token);
        }
        return response()->json(['error' => 'refresh_token_error'], 401);
    }

    // 認證
    private function guard(){
        return Auth::guard();
    }

    // /**
    //  * Send password reset link.
    //  */
    // // 忘記密碼
    // public function sendPasswordResetLink(Request $request)
    // {
    //     $credentials = request()->validate(['email' => 'required|email']);

    //     Password::sendResetLink($credentials);
    //     return response()->json(["msg" => 'Reset password link sent on your email id.']);
    // }
    // /**
    //  * Handle reset password
    //  */
    // public function callResetPassword(Request $request)
    // {
    //     return $this->reset($request);
    // }
    // /**
    //  * Get the response for a successful password reset.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  string  $response
    //  * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
    //  */
    // protected function sendResetResponse(Request $request, $response)
    // {
    //     return response()->json(['message' => 'Password reset successfully.']);
    // }
    // /**
    //  * Get the response for a failed password reset.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  string  $response
    //  * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
    //  */
    // protected function sendResetFailedResponse(Request $request, $response)
    // {
    //     return response()->json(['message' => 'Failed, Invalid Token.']);
    // }


}
