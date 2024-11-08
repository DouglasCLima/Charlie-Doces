<!DOCTYPE html>
   <html lang="pt-br">
   <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <link rel="stylesheet" href="{{asset('styles/home.css')}}">
       <link rel="shortcut icon" href="{{asset('images/brigadeirao.png')}}" type="image/x-icon">
       <title>{{"Charlie Doces - ".$title}}</title>
   </head>
   <body>
       <header id="header">
            <div id="combo-header">
                <a href="{{route('home')}}"><img id="img-logo" src="{{ asset('images/Charlie_logo_ofc.png') }}"></a>
                <input type="text" id="pesquisa" name="pesquisa" placeholder="Pesquisar">

               <div id="login-carrinho">
                @auth
                    <a href="{{route('logout')}}"><img src="{{ asset('icons/sair.png') }}"></a>
                    <a href="./carrinho"><img src="{{ asset('icons/carrinho-de-compras.png') }}"></a>
                @else
                    <a href="{{route('login')}}"><img src="{{ asset('icons/conecte-se.png') }}"></a>
                    <a href="./carrinho"><img src="{{ asset('icons/carrinho-de-compras.png') }}"></a>
                @endauth
               </div>
            </div>
       </header>

       <main>
       {{$slot}}
       </main>
   </body>
   </html>
