<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
    <div class="container-fluid">
      <a class="navbar-brand ms-3 text-light" href="{{ route('home') }}">TheAnimalLab</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item me-3">
            <a class="nav-link text-light {{Route::is('home') ? 'text-decoration-underline active' : ''}}" aria-current="page" href="{{ route('home') }}">Home</a>
          </li>
          <li class="nav-item me-3">
            <a class="nav-link text-light {{Route::is('animals') ? 'text-decoration-underline active' : ''}}" href="{{ route('animals') }}">Animals</a>
          </li>
          <li class="nav-item me-3">
            <a class="nav-link text-light" href="#">About Us</a>
          </li>
          <li class="nav-item me-3">
            <a class="nav-link text-light" href="#">Login</a>
          </li>
        </ul>
      </div>
    </div>
</nav>

