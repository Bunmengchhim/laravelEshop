<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ url('/') }}">Ecommerce Shop</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{url('/')}}">Home</a>
          </li>
          <li class="nav-item">
            <a href="{{ url('category')}}" class="nav-link">Category</a>
          </li>
          <li class="nav-item">
            <a href="{{ url('cart')}}" class="nav-link">Cart</a>
          </li>
          <li class="nav-item">
            <a href="{{ url('my-order')}}" class="nav-link">My Order </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('wishlist')}}" class="nav-link">Wishlist</a>
          </li>
          @guest
            @if (Route::has('login'))
              <li class="nav-item"> 
                <a href="{{ route('login') }}" class="nav-link">{{ __('login') }}</a>
              </li>
            @endif
            @if (Route::has('register'))
            <li class="nav-item"> 
              <a href="{{ route('register') }}" class="nav-link">{{ __('register') }}</a>
            </li>
            @endif
          @endguest
       
        </ul>
      </div>
    </div>
  </nav>