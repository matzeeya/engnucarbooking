<header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
  <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
  &nbsp;<img src="{{URL::asset('/images/eng-logo.png')}}" width="50" height="50" class="d-inline-block align-top" alt="">
  <svg class="bi me-2" width="20" height="12"><use xlink:href="#bootstrap"/></svg>
  <span class="fs-4">ระบบจองใช้ยานพาหนะ คณะวิศวกรรมศาสตร์ มหาวิทยาลัยนเรศวร</span>
  </a>

  <div class="dropdown text-end">
    @yield('Auth')
  </div>
  <svg class="bi me-2" width="20" height="12"><use xlink:href="#bootstrap"/></svg>
</header>
