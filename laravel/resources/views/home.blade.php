<x-header title="Inicio">
    <link rel="stylesheet" href="styles/home.css">
    <div class="carrosel">
        <div class="container">
            <img src="images/chocolate1.jpg">
            <img src="images/balas1.jpg"/>
            <img src="images/chocolate2.jpg"/>
            <img src="images/balas2.jpg"/>
            <img src="images/top-view-delicious-lollipops-with-copy-space.jpg">
        </div>
    </div>
    <script src="{{asset('javascript/home.js')}}"></script>
    
    <nav>
        <div class="backgroud-carrossel-categorias">
            <div class="link-img"><a id="link1" href="{{route('produtos')}}"><img src="images/categoria_balas.jpg"/></a>
                <p>Balas</p>
            </div>
        </div>

        <div class="link-img"><a href="{{route('produtos')}}"><img src="images/categoria_chocolate.jpg"/></a>
            <p>Chocolate</p>
        </div>

        <div class="link-img"><a href="{{route('produtos')}}"><img src="images/categoria_salgadinho.jpg"/></a>
            <p>Salgadinho</p>
        </div>

        <div class="link-img"><a href="{{route('produtos')}}"><img src="images/categoria_biscoito.jpg"/></a>
            <p>Biscoito</p>
        </div>

        <div class="link-img"><a href="{{route('produtos')}}"><img src="images/categoria_saudaveis.jpg"/></a>
            <p>Saudáveis</p>
        </div>

    </nav>
</x-header>
<x-footer></x-footer>
</body>
</html>
