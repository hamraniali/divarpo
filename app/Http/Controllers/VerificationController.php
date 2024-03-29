<?php

namespace App\Http\Controllers;

use App\User;
use App\Verification;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function show()
    {
        return view('auth.verification');
    }


    public function send()
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
                $api = new \Kavenegar\KavenegarApi( "426E58337A5271456E5A716262314F576B4A74434E714F6D4D34757A386D3033" );
                $sender = "1000596446";
                $message = 'کد فعالسازی "پس بده": ‌' . $code;
                $receptor = $user->phone;
                $result = $api->Send($sender,$receptor,$message);
                if($result){
                    return redirect(route('verification' , ['id' => encrypt('تلاشت قابل تحسینه')]));
                }
            }
            catch(\Kavenegar\Exceptions\ApiException $e){
                // در صورتی که خروجی وب سرویس 200 نباشد این خطا رخ می دهد
                return redirect(route('login'))->with(['status' => 'error' , 'message' => $e->errorMessage()]);
            }
            catch(\Kavenegar\Exceptions\HttpException $e){
                // در زمانی که مشکلی در برقرای ارتباط با وب سرویس وجود داشته باشد این خطا رخ می دهد
                return redirect(route('login'))->with(['status' => 'error' , 'message' => $e->errorMessage()]);
            }
        }
        else{
            return redirect(route('login'))->with(['status' => 'error' , 'message' => 'خظا در احراز هویت لظفا دویاره تلاش کنید']);
        }
    }

    public function check(Request $request) {
        $this->validate($request , [
           'code' =>  'required'
        ]);
        if (auth()->check()) {
            $user = auth()->user();
            $check = Verification::where('user_id' , $user->id)
                ->where('code' , $request->input('code'))->first();
            if ($check != null && !empty($check)) {
                if (strtotime($check->expire) > strtotime(Carbon::now())) {
                    $active_user = User::where('id' , $user->id)->update([
                        'active' => 1,
                        'phone_verified_at' => Carbon::now()
                    ]);
                    if ($active_user) {
                        return redirect(route('home'))->with(['status' => 'success' , 'message' => 'حساب شما با موفقیت فعال شد']);
                    }
                }
            }
            else {
                return redirect(route('verification',['id' => encrypt('تلاشت قابل تحسینه')]))->with(['status' => 'error' , 'message' => 'کد فعالسازی نادرست است']);
            }
        }
        else{
            return redirect(route('login'));
        }
    }
}
