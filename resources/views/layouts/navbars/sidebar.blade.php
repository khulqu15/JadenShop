<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="{{ url('/home') }}" class="simple-text logo-normal">
        <img src="{{ asset('material/img/favicon.png') }}" alt="JadenShop Logo png" width="25px"> <span class="position-relative" style="top: 3px">{{ __('Jaden Shop') }}</span>
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Dashboard') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'products' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('products') }}">
          <i class="material-icons">content_paste</i>
            <p>{{ __('Product List') }}</p>
        </a>
      </li>
    </ul>
  </div>
</div>
