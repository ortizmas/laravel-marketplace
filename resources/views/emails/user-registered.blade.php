<h1>Ola, {{$user->name}}, tudo bem? Espero que sim!</h1>

<h3>Obrigado por sua inscrição</h3>

<p>
    Faça bom proveito e excelente compras em nosso marketplace! <br>
    Seu email de cadastro é: <strong>{{$user->email}}</strong><br>
    Sua senha: <strong>Por questões de seguraçã não enviamos sua senha mas você deve se lembrar!</strong>
</p>

Email enviado em {{date('d/m/Y H:i:s')}}
