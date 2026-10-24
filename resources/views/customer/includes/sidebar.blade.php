    <div class="sidebar sidebar-dark sidebar-fixed border-end" id="sidebar">
      <div class="sidebar-header border-bottom">
        <div class="sidebar-brand">
            <img 
        class="sidebar-brand-full" 
        src="{{ asset('customer/assets/brand/nittyohub-logo3.png') }}" 
        alt="Nittyo Hub"
        width="120"
        height="32"
    >
        </div>

        <button class="btn-close d-lg-none" type="button" data-coreui-theme="dark" aria-label="Close" onclick="coreui.Sidebar.getInstance(document.querySelector(&quot;#sidebar&quot;)).toggle()"></button>
      </div>
      <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
        <li class="nav-item"><a class="nav-link" href="{{ url('/customer/dashboard') }}">
            <svg class="nav-icon">
              <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-speedometer"></use>
            </svg> Dashboard</a></li>

        <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
            <svg class="nav-icon">
              <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-puzzle"></use>
            </svg> Order</a>
          <ul class="nav-group-items compact">
            <li class="nav-item"><a class="nav-link" href="#"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Accordion</a></li>
          </ul>
        </li>

    </div>