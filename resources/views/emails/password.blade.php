<!DOCTYPE html>
<html>
<head>
    <title>Redefinição de senha</title>
</head>

<body>
<h2>Olá, {{$passwordReset->user->name}}!</h2>
<br/>
Você solicitou uma redefinição de senha, por favor, clique no link abaixo para alterar seu acesso.
<br/>
<a href="{{url('novaSenha', $passwordReset->token)}}">Redefinir senha</a>
<br>
Ignore este email para manter a senha inalterada.
</body>

</html>