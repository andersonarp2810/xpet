<?php

namespace App\Http\Controllers;

use App\EmailVerification;
use DateTime;
use DateInterval;
use Illuminate\Http\Request;
use Mail;
use App\Mail\VerificationEmail;
use Auth;

class EmailVerificationController extends Controller
{

    
    public function verify(Request $request, $code){
        
        $emailVerification = EmailVerification::where('code', $code)->first();
        $agora = new DateTime();
        $amanha = new DateTime();
        $amanha->add(new DateInterval("P1D"));
        //dd([$agora, $amanha, $emailVerification, new DateTime($emailVerification->expire)]);

        if(isset($emailVerification)){
            $expira_em = new DateTime($emailVerification->expire);
            if($expira_em < $agora){
                $request->session()->flash('status', 'Código de verificação expirado. Um novo código foi enviado para sua caixa de entrada');

                $code = str_random(40);

                while(EmailVerification::where('code', $code)->first() != null){
                    $code = str_random(40);
                }
                $emailVerification->code = $code;
                $emailVerification->expire = $amanha;
                $emailVerification->save();

                Mail::to($emailVerification->user->email)->send(new VerificationEmail($emailVerification));

                return redirect('/home');
            }
            else{ // tudo ok

                $user = $emailVerification->user;
                        
                $user->email_verified_at = $agora;
                $user->save();
                $request->session()->flash('status', 'Email verificado com sucesso!');
                $emailVerification->delete();
                return redirect('/home');
            }
        }
        else {
            $request->session()->flash('status', 'Código de verificação inválido.');

            return redirect('/home');
        }

    }

    public function reSend(Request $request){
        $user = Auth::user();
        $code = str_random(40);

        while(EmailVerification::where('code', $code)->first() != null){
            $code = str_random(40);
        }

        $amanha = new DateTime();
        $amanha->add(new DateInterval("P1D"));

        $emailVerification = $user->emailVerification;
        $emailVerification->code = $code;
        $emailVerification->expire = $amanha;
        $emailVerification->save();

        Mail::to($user->email)->send(new VerificationEmail($emailVerification));

        $request->session()->flash('status', 'Email reenviado com sucesso!');

        return redirect('/home');
    }
}
