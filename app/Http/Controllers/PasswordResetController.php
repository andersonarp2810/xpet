<?php

namespace App\Http\Controllers;

use App\PasswordReset;
use App\User;
use App\Mail\PasswordResetMail;
use DateInterval;
use DateTime;
use Illuminate\Http\Request;
use Mail;

class PasswordResetController extends Controller
{
    //

    /*
    * Método de mostrar tela de enviar email
    */
    public function forgot(){
        return view('auth/passwords/forgot');
    }


    /*
    * Método de enviar email com link
    */
    public function sendMail(Request $request){
        $email = $request['email'];

        $user = User::where('email', $email)->first();

        //dd($email, $user);
        if($user == null){
            return redirect('/')->with('error', 'Email não cadastrado!');
        }

        $reset = $user->passwordReset;
        if($reset == null){
            $token = str_random(40);

            while(PasswordReset::where('token', $token)->first() != null){
                $token = str_random(40);
            }

            $amanha = new DateTime();
            $amanha->add(new DateInterval("P1D"));
            $reset = new PasswordReset([
                'user_id' => $user->id,
                'token' => $token,
                'expire' => $amanha
            ]);
            $reset->save();

        }

        Mail::to($email)->send(new PasswordResetMail($reset));
        return redirect('/')->with('status', 'Email enviado com sucesso!');
    }

    /*
    * Método de mostrar tela de mudar senha
    */
    public function editPassword($token){
        $reset = PasswordReset::where('token', $token)->first();

        $agora = new DateTime();
        $amanha = new DateTime();
        $amanha->add(new DateInterval("P1D"));

        if(isset($reset)){
            $expira_em = new DateTime($reset->expire);
            if($expira_em > $agora){
                return view('auth.passwords.reset', ['reset' => $reset]);
            }
            else{
                $token = str_random(40);
    
                while(PasswordReset::where('token', $token)->first() != null){
                    $token = str_random(40);
                }
                $reset->token = $token;
                $reset->expire = $amanha;
                $reset->save();

                Mail::to($reset->user->email)->send(new PasswordResetMail($reset));
                return redirect('/')->with('status', 'Código expirado, email reenviado. Por favor, verifique sua caixa de entrada.');
            }

        }
        else {
            return redirect('/')->with('error', 'Código inválido.');
        }
    }

    /*
    * Método de alterar senha
    */
    public function store(Request $request){

        $token = $request->token;
        $reset = PasswordReset::where('token', $token)->first();

        if(!isset($reset)){
            return redirect('/')->with('error', 'Token inválido!');
        }
        else{
            $novaSenha = $request['senha'];
            $confirma = $request['confirmation'];
            if($confirma == $novaSenha){
                $user = $reset->user;

                //dd($reset, $user);
                $user->password = bcrypt($novaSenha);
                $user->save();
                $reset->delete();
                return redirect('/')->with('status', 'Senha redefinida com sucesso!');
            }
            else {
                return redirect()->back()->with('error', 'Nova senha e confirmação não são iguais!');
            }
        }

    }
}
