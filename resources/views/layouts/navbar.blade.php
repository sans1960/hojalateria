<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
      <a class="navbar-brand fw-bold text-success" href="#">Categorias</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent2" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent2">
        <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                 @foreach ($categories as $categoria)
                 <li class="nav-item">
                    <a class="nav-link" href="{{ route('home.shop.categoria',$categoria) }}">{{ $categoria->name }}</a>
                  </li>
                 @endforeach




        </ul>

      </div>
    </div>
  </nav>
