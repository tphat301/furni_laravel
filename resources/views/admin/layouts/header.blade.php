<nav class="main-header navbar navbar-expand navbar-white navbar-light text-sm">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item nav-item-hello d-sm-inline-block">
      <a class="nav-link"><span class="text-split">Xin chào, {{ Auth::guard('admin')->user()->email }}!</span></a>
    </li>
  </ul>

  <ul class="navbar-nav ml-auto align-items-center">

    <!-- Lang -->
    <?php /*
      <li class="nav-item d-sm-inline-block">
        <a href="#" class="mr-1"><img src="<?= $configBase['baseUrl'] . 'public/images/vi.jpg' ?>" alt="Vietnam" title="Vietnam"></a>
        <a href="#"><img src="<?= $configBase['baseUrl'] . 'public/images/en.jpg' ?>" alt="English" title="English"></a>
      </li>
    */?>

    <li class="nav-item d-sm-inline-block">
      <a href="{{url('/')}}" target="_blank" class="nav-link"><i class="fas fa-reply"></i></a>
    </li>

    <li class="nav-item dropdown">
      <a data-toggle="dropdown" data-bs-toggle="dropdown" class="nav-link"><i class="fas fa-cogs"></i></a>
      <ul aria-labelledby="dropdownSubMenu-info" class="dropdown-menu dropdown-menu-right border-0 shadow" style="left: inherit; right: 0px;">
        <li>
          <a href="{{ route('admin.password.request') }}" class="dropdown-item">
            <i class="fas fa-key"></i>
            <span>Làm mới mật khẩu</span>
          </a>
        </li>
        <div class="dropdown-divider"></div>
        <li>
          <a href="{{route('admin.clear_cache')}}" class="dropdown-item">
            <i class="far fa-trash-alt"></i>
            <span>Xóa bộ nhớ tạm</span>
          </a>
        </li>
      </ul>
    </li>

    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" data-bs-toggle="dropdown" href="#">
        <i class="fas fa-bell"></i>
        <span class="badge badge-danger">0</span>
      </a>
      <div class="dropdown-menu dropdown-menu-right shadow">
        <span class="dropdown-item dropdown-header p-0">Thông báo</span>
        <div class="dropdown-divider"></div>
        <a href="" class="dropdown-item"><i class="fas fa-mail-bulk mr-2"></i><span class="badge badge-danger mr-1">0</span>Đăng ký nhận tin</a>
      </div>
    </li>
    <li class="nav-item d-sm-inline-block">
      <a href="{{ route('admin.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link"><i class="fas fa-sign-out-alt mr-1"></i>Đăng xuất</a>
      <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
        @csrf
      </form>
    </li>
  </ul>
</nav>
