<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

//use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    public function show()
    {
        return view('auth.forget');
    }

    public function sendpass(Request $request)
    {
        $this->validate($request , [
            'phone' =>  'required'
        ]);
        $check_phone = User::where('phone' , '=' , $request->input('phone'))->first();
        if ($check_phone != null && !empty($check_phone)) {
            $new_password = random_int(100000 , 999999);
            try{
                $api = new \Kavenegar\KavenegarApi( "426E58337A5271456E5A716262314F576B4A74434E714F6D4D34757A386D3033" );
                $sender = "1000596446";
                $message = "رمز عبور جدید شما:" . $new_password;
                $receptor = $request->input('phone');
                $result = $api->Send($sender,$receptor,$message);
                if($result){
                    $update_password = User::where('phone' , '=' , $request->input('phone'))->update([
                        'password' => Hash::make($new_password)
                    ]);
                    if ($update_password) {
                        return redirect(route('login'))->with(['status' => 'success' , 'message' => 'رمز عبور جدید برای شما ارسال شد']);
                    }
                }
            }
            catch(\Kavenegar\Exceptions\ApiException $e){
                // در صورتی که خروجی وب سرویس 200 نباشد این خطا رخ می دهد
                return redirect(route('forget'))->with(['status' => 'error' , 'message' => $e->errorMessage()]);
            }
            catch(\Kavenegar\Exceptions\HttpException $e){
                // در زمانی که مشکلی در برقرای ارتباط با وب سرویس وجود داشته باشد این خطا رخ می دهد
                return redirect(route('forget'))->with(['status' => 'error' , 'message' => $e->errorMessage()]);
            }
        }
        else{
            return redirect(route('forget'))->with(['status' => 'error' , 'message' => 'چنین شماره ای ثبت نشده است']);
        }
    }
}
