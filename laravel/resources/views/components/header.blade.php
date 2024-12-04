<!DOCTYPE html>
   <html lang="pt-br">
    <?php
    $nome_completo = $authUser->USUARIO_NOME ?? "";
    $usuario = strtok($nome_completo, " ");
    ?>
   <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <link rel="stylesheet" href="{{asset('styles/header.css')}}">
       <link rel="shortcut icon" href="{{asset('images/brigadeirao.png')}}" type="image/x-icon">
       <title>{{"Charlie Doces - ".$title}} </title>
   </head>
   <body>
       <header id="header">
            <div id="combo-header">
                <a href="{{route('home')}}"><img id="img-logo" src="{{ asset('images/Charlie_logo_ofc.png') }}"></a>
                <div class="slogan">
                <h1>A melhor loja de doces da Internet</h1>
                </div>
               <div id="login-carrinho">
                @auth

                    <div id="meus-pedidos">
                            <img src="{{asset('icons/perfil.png')}}" alt="">
                            <div class="link-container">
                                <p><strong>Olá, {{ucwords( $usuario).'!'}}</strong></p>
                                <a class="meus-pedidos" href="{{ route('meus.pedidos') }}">Meus Pedidos</a>
                                <a class="sair" href="{{ route('logout') }}">Sair</a>
                            </div>
                </div>
                @else
                    <a href="{{route('login')}}"><img alt="login" src="{{ asset('icons/conecte-se.png') }}"></a>
                @endauth
                    <a href="{{route('carrinho')}}"><img alt="carrinho" src="{{ asset('icons/carrinho-de-compras.png') }}"></a>
               </div>
            </div>
       </header>

       <main>
       {{$slot}}
       </main>
   </body>
   </html>
