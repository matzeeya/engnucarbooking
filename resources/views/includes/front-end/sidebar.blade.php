<div class="d-flex justify-content-start flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;height:100%;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
      <i class="fa-brands fa-elementor fa-2xl"></i>
      <svg class="bi pe-none me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
      <span class="fs-4">เมนู</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="#" class="nav-link link-dark" aria-current="page">
          <i class="fa-solid fa-calendar-days fa-lg"></i>
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#home"/></svg>
          ปฏิทินการใช้รถ
        </a>
      </li>
      <li>
        <a href="#" class="nav-link link-dark">
        <i class="fa-solid fa-address-card fa-lg"></i>
          <svg class="bi pe-none me-2" width="12" height="16"><use xlink:href="#speedometer2"/></svg>
          รายการจองของฉัน
        </a>
      </li>
      @if(Auth::user()->usr_lvl=="admin")
      <li>
        <a href="#" class="nav-link link-dark">
        <i class="fa-solid fa-car-side fa-lg"></i>
          <svg class="bi pe-none me-2" width="10" height="16"><use xlink:href="#table"/></svg>
          รายการคำขอใช้รถ
        </a>
      </li>
      <li>
        <a href="#" class="nav-link link-dark">
          <i class="fa-solid fa-car fa-lg"></i>
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#table"/></svg>
          รายละเอียดรถ
        </a>
      </li>
      @endif
    </ul>
</div>
