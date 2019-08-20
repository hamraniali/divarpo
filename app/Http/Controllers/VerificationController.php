<?php

namespace App\Http\Controllers;

use App\Verification;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function show()
    {
        if (auth()->check()){
            $user = auth()->user();
            $code = random_int(1000,9999);
            $verification = new Verification;
            $verification->code = $code;
            $verification->user_id = $user->id;
            $verification->expire = date('Y-m-d H:i:s',time() + 5*60);
            $verification->created_at = Carbon::now();
            $verification->save();
            try{
                $api = new \Kavenegar\KavenegarApi( "657349706A6542536E544A5742677546465835587471624335793368316C6D6A" );
                $sender = "10004346";
                $message = "کد فعالسازی سایت :‌" . $code;
                $receptor = $user->phone;
                $result = $api->Send($sender,$receptor,$message);
                if($result){
                    return view('auth.verification');
                }
            }
            catch(\Kavenegar\Exceptions\ApiException $e){
                // در صورتی که خروجی وب سرویس 200 نباشد این خطا رخ می دهد
                echo $e->errorMessage();
            }
            catch(\Kavenegar\Exceptions\HttpException $e){
                // در زمانی که مشکلی در برقرای ارتباط با وب سرویس وجود داشته باشد این خطا رخ می دهد
                echo $e->errorMessage();
            }
//            return view('auth.verification');
        }
        else{
            return redirect(route('login'));
        }
    }

    public function check(Request $request) {
        $this->validate($request , [
           'code' =>  'required'
        ]);
        if (auth()->check()) {
            $user = auth()->user();
            $check = Verification::where('user_id' , $user->id)
                ->where('code' , $request->input('code'));
//            if ($check != null)
        }
        else{
            return redirect(route('login'));
        }
    }
}
