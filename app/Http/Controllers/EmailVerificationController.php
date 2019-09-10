<?php

namespace App\Http\Controllers;

use App\EmailVerification;
use App\User;
use Illuminate\Http\Request;
use Mail;
use Auth;
use App\Mail\VerificationEmail;
use Faker;

class EmailVerificationController extends Controller
{

    public function verify($code){
        $emailVerification = EmailVerification::find('code', $code);

        if($emailVerification->expire > time()){
            session()->flash('status', 'Código expirado, verifique seu email novamente.');
            return renew($emailVerification);
        }
        else {
            $emailVerification->User()->email_verified_at = time();
            $emailVerification->User()->save();
            
            $emailVerification->delete();

            return redirect('/');
        }

        //return
    }

    /*
        quem acessa essa função é o controller de cadastro de usuário
    */
    public function create(User $user){
        $emailVerification = new EmailVerification([
            'user_id' => $user->id,
            'code' => 'algumacoisa',
            'expire' => time()
        ]);
        $emailVerification->save();
        //return
    }
 
    /*
        quem acessa essa função é o método de verificar email quando tá expirado ou o maluco quer um email novo
    */
    public function renew(EmailVerification $emailVerification){
        $code = 'algumacoisa';
        $new = new EmailVerification([
            'user_id' => $emailVerification->user_id,
            'code' => $code, //unico
            'expire' => time() // mais alguma coisa
        ]);

        Mail::to(Auth::user()->email)->send(new VerificationEmail($code));
        
        $new->save();

        $emailVerification->delete();

        return redirect('/');
    }


}
