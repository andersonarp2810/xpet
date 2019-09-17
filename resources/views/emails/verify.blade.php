<!DOCTYPE html>
<html>
<head>
    <title>Confirmação de cadastro</title>
</head>

<body>
<h2>Bem-vindo ao XPetx, {{$emailVerification->user->name}}!</h2>
<br/>
Seu email registrado para acessar é {{$emailVerification->user->email}} , por favor, clique no link abaixo para confirmar seu cadastro.
<br/>
<a href="{{url('verificar', $emailVerification->code)}}">Verificar conta</a>
</body>

</html>