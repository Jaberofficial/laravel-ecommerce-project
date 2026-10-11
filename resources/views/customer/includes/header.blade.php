<header class="header header-sticky p-0 mb-4">
  <div class="container-fluid border-bottom px-4 d-flex align-items-center justify-content-between">

      <button class="header-toggler border-0 bg-transparent text-body p-0 me-3" type="button" onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
        <svg class="icon icon-lg">
          <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-menu"></use>
        </svg>
      </button> 
    
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb my-0">
        <li class="breadcrumb-item">
          <a class="text-decoration-none" href="{{ url('/') }}"><b>Home</b></a>
        </li>

      </ol>
    </nav>

    <!-- Header Right Side Items -->
    <ul class="header-nav ms-auto align-items-center">
      <li class="nav-item py-1">
        <div class="vr h-100 mx-2 text-body text-opacity-75"></div>
      </li>


      <li class="nav-item dropdown">
        <button class="btn btn-link nav-link py-2 px-2 d-flex align-items-center" type="button" aria-expanded="false" data-coreui-toggle="dropdown">
          <svg class="icon icon-lg theme-icon-active">
            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-contrast"></use>
          </svg>
        </button>
        <ul class="dropdown-menu dropdown-menu-end" style="--cui-dropdown-min-width: 8rem;">
          <li>
            <button class="dropdown-item d-flex align-items-center" type="button" data-coreui-theme-value="light">
              <svg class="icon icon-lg me-3">
                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-sun"></use>
              </svg>Light
            </button>
          </li>
          <li>
            <button class="dropdown-item d-flex align-items-center" type="button" data-coreui-theme-value="dark">
              <svg class="icon icon-lg me-3">
                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-moon"></use>
              </svg>Dark
            </button>
          </li>
          <li>
            <button class="dropdown-item d-flex align-items-center active" type="button" data-coreui-theme-value="auto">
              <svg class="icon icon-lg me-3">
                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-contrast"></use>
              </svg>Auto
            </button>
          </li>
        </ul>
      </li>

      <li class="nav-item py-1">
        <div class="vr h-100 mx-2 text-body text-opacity-75"></div>
      </li>

      <!-- User Profile Offcanvas Trigger) -->
      @php
        $authUserImage = Auth::user()->image;
      @endphp
      <li class="nav-item">
        <button class="nav-link py-0 pe-0 bg-transparent border-0" type="button" data-coreui-toggle="offcanvas" data-coreui-target="#userProfileOffcanvas" aria-controls="userProfileOffcanvas">
          <div class="avatar avatar-md">
            @if ($authUserImage != null)
            <img class="avatar-img" src="{{ $authUserImage }}" alt="profile_image">

            @else
            <img class="avatar-img" src="{{asset('customer/user/user-avatar.webp') }}" alt="profile_image">
              
            @endif
          </div>
        </button>
      </li>
    </ul>
<!-- Compact User Profile Offcanvas -->
<div class="offcanvas offcanvas-end custom-compact-offcanvas" tabindex="-1" id="userProfileOffcanvas" aria-labelledby="userProfileOffcanvasLabel" style="width: 200px;">
  <div class="offcanvas-header bg-body-tertiary border-bottom py-2 px-3">
    <h6 class="offcanvas-title fw-semibold text-body-secondary my-0" id="userProfileOffcanvasLabel">Account</h6>
    <button type="button" class="btn-close text-reset" data-coreui-dismiss="offcanvas" aria-label="Close"></button>

  </div>
  <div class="offcanvas-body p-2">
    <div class="nav flex-column nav-pills">
      <a class="nav-link text-body d-flex align-items-center py-2 px-2" href="{{ url('/customer/profile-view') }}">
        <svg class="icon me-2">
          <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-user"></use>
        </svg> Profile
      </a>
      <a class="nav-link text-body d-flex align-items-center py-2 px-2" href="{{ url('/customer/profile-update') }}">
        <svg class="icon me-2">
          <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-settings"></use>
        </svg> Credential Settings
      </a>
      <hr class="my-1 border-secondary opacity-25">
      <a class="nav-link text-danger d-flex align-items-center py-2 px-2" href="{{ url('/customer/logout') }}">
        <svg class="icon me-2">
          <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-account-logout"></use>
        </svg> Logout
      </a>
    </div>
  </div>
</div>
  </div>
</header>
