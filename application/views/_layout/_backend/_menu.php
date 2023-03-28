<header id="page-topbar">
  <div class="navbar-header">
    <div class="d-flex">
      <!-- LOGO -->
      <div class="navbar-brand-box">
        <a href="<?=base_url()?>Home" class="logo logo-dark">
          <span class="logo-sm">
            <img src="<?=base_url()?>assets/images/logo-spt.svg" alt="" height="22">
          </span>
          <span class="logo-lg">
            <img src="<?=base_url()?>assets/images/logo-spt.svg" alt="" height="70">
          </span>
        </a>

        <a href="<?=base_url()?>Home" class="logo logo-light">
          <span class="logo-sm">
            <img src="<?=base_url()?>assets/images/logo-spt.svg" alt="" height="30">
          </span>
          <span class="logo-lg">
            <img src="<?=base_url()?>assets/images/logo-spt.svg" alt="" height="70">
          </span>
        </a>
      </div>

      <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
        <i class="fa fa-fw fa-bars"></i>
      </button>

    </div>

    <div class="d-flex">

      
      <div class="dropdown d-inline-block">
        <button type="button" class="btn header-item waves-effect" data-bs-toggle="dropdown" aria-haspopup="true"
          aria-expanded="false">
          <img id="header-lang-img" src="<?=base_url()?>assets/images/flags/<?=(@$this->userdata->lang == "us")?"us.jpg":"indonesia.png"?>" alt="Header Language" height="16">
        </button>
        <div class="dropdown-menu dropdown-menu-end">

          <!-- item-->
          <a href="?lang=id" class="dropdown-item notify-item language" data-lang="id">
            <img src="<?=base_url()?>assets/images/flags/indonesia.png" alt="user-image" class="me-1" height="12"> <span
              class="align-middle">Indonesia</span>
          </a>
          
          <a href="?lang=us" class="dropdown-item notify-item language" data-lang="en">
            <img src="<?=base_url()?>assets/images/flags/us.jpg" alt="user-image" class="me-1" height="12"> <span
              class="align-middle">English</span>
          </a>
          
        </div>
      </div>

      
      <div class="dropdown d-inline-block">
        <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown"
          data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="bx bx-bell bx-tada"></i>
          <!-- <span class="badge bg-danger rounded-pill">3</span> -->
        </button>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
          aria-labelledby="page-header-notifications-dropdown">
          <div class="p-3">
            <div class="row align-items-center">
              <div class="col">
                <h6 class="m-0" key="t-notifications"> Notifications </h6>
              </div>
              <div class="col-auto">
                <a href="#!" class="small" key="t-view-all"> View All</a>
              </div>
            </div>
          </div>
          <!-- <div data-simplebar style="max-height: 230px;">
            <a href="" class="text-reset notification-item">
              <div class="d-flex">
                <div class="avatar-xs me-3">
                  <span class="avatar-title bg-primary rounded-circle font-size-16">
                    <i class="bx bx-cart"></i>
                  </span>
                </div>
                <div class="flex-grow-1">
                  <h6 class="mt-0 mb-1" key="t-your-order">Your order is placed</h6>
                  <div class="font-size-12 text-muted">
                    <p class="mb-1" key="t-grammer">If several languages coalesce the
                      grammar</p>
                    <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span key="t-min-ago">3 min ago</span></p>
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="p-2 border-top d-grid">
            <a class="btn btn-sm btn-link font-size-14 text-center" href="javascript:void(0)">
              <i class="mdi mdi-arrow-right-circle me-1"></i> <span key="t-view-more">View
                More..</span>
            </a>
          </div> -->
        </div>
      </div>

      <div class="dropdown d-inline-block">
        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
          data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img class="rounded-circle header-profile-user" src="<?=($this->userdata->thumbnail != "")?base_api().'/images/'.$this->userdata->nim.'/'.$this->userdata->thumbnail:base_url().'assets/images/users/avatar-1.jpg'?>" alt="<?=$this->userdata->nama?>">
          <span class="d-none d-xl-inline-block ms-1" key="t-<?=$this->userdata->nama?>"><?=$this->userdata->nama?></span>
          <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
        </button>
        <div class="dropdown-menu dropdown-menu-end">
          <!-- item-->
          <a class="dropdown-item" href="#"><i class="bx bx-user font-size-16 align-middle me-1"></i>
            <span key="t-profile">Profile</span></a>
          <a class="dropdown-item d-block" href="#"><span class="badge bg-success float-end">11</span><i
              class="bx bx-wrench font-size-16 align-middle me-1"></i> <span key="t-settings">Settings</span></a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item text-danger" href="<?=base_url()?>Login/out"><i
              class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span
              key="t-logout">Logout</span></a>
        </div>
      </div>

    </div>
  </div>
</header>


