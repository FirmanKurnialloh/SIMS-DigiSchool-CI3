<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
  <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
  <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
  <meta name="author" content="PIXINVENT">
  <title>Layout without menu - Vuexy - Bootstrap HTML admin template</title>
  <link rel="apple-touch-icon" href="<?= base_url('assets/'); ?>app-assets/images/ico/apple-icon-120.png">
  <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/'); ?>app-assets/images/ico/favicon.ico">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

  <!-- BEGIN: Vendor CSS-->
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>app-assets/vendors/css/vendors.min.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>app-assets/vendors/css/charts/apexcharts.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>app-assets/vendors/css/extensions/toastr.min.css">
  <!-- END: Vendor CSS-->

  <!-- BEGIN: Theme CSS-->
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>app-assets/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>app-assets/css/bootstrap-extended.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>app-assets/css/colors.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>app-assets/css/components.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>app-assets/css/themes/dark-layout.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>app-assets/css/themes/bordered-layout.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>app-assets/css/themes/semi-dark-layout.css">

  <!-- BEGIN: Page CSS-->
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>app-assets/css/core/menu/menu-types/vertical-menu.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>app-assets/css/pages/dashboard-ecommerce.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>app-assets/css/plugins/charts/chart-apex.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>app-assets/css/plugins/extensions/ext-component-toastr.css">
  <!-- END: Page CSS-->

  <!-- BEGIN: Custom CSS-->
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>assets/css/style.css">
  <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 1-column navbar-floating footer-static   menu-collapsed" data-open="click" data-menu="vertical-menu-modern" data-col="1-column">

  <!-- BEGIN: Header-->
  <nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl">
    <div class="navbar-container d-flex content">
      <div class="bookmark-wrapper d-flex align-items-center">
        <ul class="nav navbar-nav bookmark-icons">
          <li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-email.html" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Email"><i class="ficon" data-feather="mail"></i></a></li>
          <li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-chat.html" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Chat"><i class="ficon" data-feather="message-square"></i></a></li>
          <li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-calendar.html" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Calendar"><i class="ficon" data-feather="calendar"></i></a></li>
          <li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-todo.html" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Todo"><i class="ficon" data-feather="check-square"></i></a></li>
        </ul>
        <ul class="nav navbar-nav">
          <li class="nav-item d-none d-lg-block"><a class="nav-link bookmark-star"><i class="ficon text-warning" data-feather="star"></i></a>
            <div class="bookmark-input search-input">
              <div class="bookmark-input-icon"><i data-feather="search"></i></div>
              <input class="form-control input" type="text" placeholder="Bookmark" tabindex="0" data-search="search">
              <ul class="search-list search-list-bookmark"></ul>
            </div>
          </li>
        </ul>
      </div>
      <ul class="nav navbar-nav align-items-center ms-auto">
        <li class="nav-item dropdown dropdown-language"><a class="nav-link dropdown-toggle" id="dropdown-flag" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="flag-icon flag-icon-us"></i><span class="selected-language">English</span></a>
          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-flag"><a class="dropdown-item" href="#" data-language="en"><i class="flag-icon flag-icon-us"></i> English</a><a class="dropdown-item" href="#" data-language="fr"><i class="flag-icon flag-icon-fr"></i> French</a><a class="dropdown-item" href="#" data-language="de"><i class="flag-icon flag-icon-de"></i> German</a><a class="dropdown-item" href="#" data-language="pt"><i class="flag-icon flag-icon-pt"></i> Portuguese</a></div>
        </li>
        <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-style"><i class="ficon" data-feather="moon"></i></a></li>
        <li class="nav-item nav-search"><a class="nav-link nav-link-search"><i class="ficon" data-feather="search"></i></a>
          <div class="search-input">
            <div class="search-input-icon"><i data-feather="search"></i></div>
            <input class="form-control input" type="text" placeholder="Explore Vuexy..." tabindex="-1" data-search="search">
            <div class="search-input-close"><i data-feather="x"></i></div>
            <ul class="search-list search-list-main"></ul>
          </div>
        </li>
        <li class="nav-item dropdown dropdown-cart me-25"><a class="nav-link" href="#" data-bs-toggle="dropdown"><i class="ficon" data-feather="shopping-cart"></i><span class="badge rounded-pill bg-primary badge-up cart-item-count">6</span></a>
          <ul class="dropdown-menu dropdown-menu-media dropdown-menu-end">
            <li class="dropdown-menu-header">
              <div class="dropdown-header d-flex">
                <h4 class="notification-title mb-0 me-auto">My Cart</h4>
                <div class="badge rounded-pill badge-light-primary">4 Items</div>
              </div>
            </li>
            <li class="scrollable-container media-list">
              <div class="list-item align-items-center"><img class="d-block rounded me-1" src="<?= base_url('assets/'); ?>app-assets/images/pages/eCommerce/1.png" alt="donuts" width="62">
                <div class="list-item-body flex-grow-1"><i class="ficon cart-item-remove" data-feather="x"></i>
                  <div class="media-heading">
                    <h6 class="cart-item-title"><a class="text-body" href="app-ecommerce-details.html"> Apple watch 5</a></h6><small class="cart-item-by">By Apple</small>
                  </div>
                  <div class="cart-item-qty">
                    <div class="input-group">
                      <input class="touchspin-cart" type="number" value="1">
                    </div>
                  </div>
                  <h5 class="cart-item-price">$374.90</h5>
                </div>
              </div>
              <div class="list-item align-items-center"><img class="d-block rounded me-1" src="<?= base_url('assets/'); ?>app-assets/images/pages/eCommerce/7.png" alt="donuts" width="62">
                <div class="list-item-body flex-grow-1"><i class="ficon cart-item-remove" data-feather="x"></i>
                  <div class="media-heading">
                    <h6 class="cart-item-title"><a class="text-body" href="app-ecommerce-details.html"> Google Home Mini</a></h6><small class="cart-item-by">By Google</small>
                  </div>
                  <div class="cart-item-qty">
                    <div class="input-group">
                      <input class="touchspin-cart" type="number" value="3">
                    </div>
                  </div>
                  <h5 class="cart-item-price">$129.40</h5>
                </div>
              </div>
              <div class="list-item align-items-center"><img class="d-block rounded me-1" src="<?= base_url('assets/'); ?>app-assets/images/pages/eCommerce/2.png" alt="donuts" width="62">
                <div class="list-item-body flex-grow-1"><i class="ficon cart-item-remove" data-feather="x"></i>
                  <div class="media-heading">
                    <h6 class="cart-item-title"><a class="text-body" href="app-ecommerce-details.html"> iPhone 11 Pro</a></h6><small class="cart-item-by">By Apple</small>
                  </div>
                  <div class="cart-item-qty">
                    <div class="input-group">
                      <input class="touchspin-cart" type="number" value="2">
                    </div>
                  </div>
                  <h5 class="cart-item-price">$699.00</h5>
                </div>
              </div>
              <div class="list-item align-items-center"><img class="d-block rounded me-1" src="<?= base_url('assets/'); ?>app-assets/images/pages/eCommerce/3.png" alt="donuts" width="62">
                <div class="list-item-body flex-grow-1"><i class="ficon cart-item-remove" data-feather="x"></i>
                  <div class="media-heading">
                    <h6 class="cart-item-title"><a class="text-body" href="app-ecommerce-details.html"> iMac Pro</a></h6><small class="cart-item-by">By Apple</small>
                  </div>
                  <div class="cart-item-qty">
                    <div class="input-group">
                      <input class="touchspin-cart" type="number" value="1">
                    </div>
                  </div>
                  <h5 class="cart-item-price">$4,999.00</h5>
                </div>
              </div>
              <div class="list-item align-items-center"><img class="d-block rounded me-1" src="<?= base_url('assets/'); ?>app-assets/images/pages/eCommerce/5.png" alt="donuts" width="62">
                <div class="list-item-body flex-grow-1"><i class="ficon cart-item-remove" data-feather="x"></i>
                  <div class="media-heading">
                    <h6 class="cart-item-title"><a class="text-body" href="app-ecommerce-details.html"> MacBook Pro</a></h6><small class="cart-item-by">By Apple</small>
                  </div>
                  <div class="cart-item-qty">
                    <div class="input-group">
                      <input class="touchspin-cart" type="number" value="1">
                    </div>
                  </div>
                  <h5 class="cart-item-price">$2,999.00</h5>
                </div>
              </div>
            </li>
            <li class="dropdown-menu-footer">
              <div class="d-flex justify-content-between mb-1">
                <h6 class="fw-bolder mb-0">Total:</h6>
                <h6 class="text-primary fw-bolder mb-0">$10,999.00</h6>
              </div><a class="btn btn-primary w-100" href="app-ecommerce-checkout.html">Checkout</a>
            </li>
          </ul>
        </li>
        <li class="nav-item dropdown dropdown-notification me-25"><a class="nav-link" href="#" data-bs-toggle="dropdown"><i class="ficon" data-feather="bell"></i><span class="badge rounded-pill bg-danger badge-up">5</span></a>
          <ul class="dropdown-menu dropdown-menu-media dropdown-menu-end">
            <li class="dropdown-menu-header">
              <div class="dropdown-header d-flex">
                <h4 class="notification-title mb-0 me-auto">Notifications</h4>
                <div class="badge rounded-pill badge-light-primary">6 New</div>
              </div>
            </li>
            <li class="scrollable-container media-list"><a class="d-flex" href="#">
                <div class="list-item d-flex align-items-start">
                  <div class="me-1">
                    <div class="avatar"><img src="<?= base_url('assets/'); ?>app-assets/images/portrait/small/avatar-s-15.jpg" alt="avatar" width="32" height="32"></div>
                  </div>
                  <div class="list-item-body flex-grow-1">
                    <p class="media-heading"><span class="fw-bolder">Congratulation Sam 🎉</span>winner!</p><small class="notification-text"> Won the monthly best seller badge.</small>
                  </div>
                </div>
              </a><a class="d-flex" href="#">
                <div class="list-item d-flex align-items-start">
                  <div class="me-1">
                    <div class="avatar"><img src="<?= base_url('assets/'); ?>app-assets/images/portrait/small/avatar-s-3.jpg" alt="avatar" width="32" height="32"></div>
                  </div>
                  <div class="list-item-body flex-grow-1">
                    <p class="media-heading"><span class="fw-bolder">New message</span>&nbsp;received</p><small class="notification-text"> You have 10 unread messages</small>
                  </div>
                </div>
              </a><a class="d-flex" href="#">
                <div class="list-item d-flex align-items-start">
                  <div class="me-1">
                    <div class="avatar bg-light-danger">
                      <div class="avatar-content">MD</div>
                    </div>
                  </div>
                  <div class="list-item-body flex-grow-1">
                    <p class="media-heading"><span class="fw-bolder">Revised Order 👋</span>&nbsp;checkout</p><small class="notification-text"> MD Inc. order updated</small>
                  </div>
                </div>
              </a>
              <div class="list-item d-flex align-items-center">
                <h6 class="fw-bolder me-auto mb-0">System Notifications</h6>
                <div class="form-check form-check-primary form-switch">
                  <input class="form-check-input" id="systemNotification" type="checkbox" checked="">
                  <label class="form-check-label" for="systemNotification"></label>
                </div>
              </div><a class="d-flex" href="#">
                <div class="list-item d-flex align-items-start">
                  <div class="me-1">
                    <div class="avatar bg-light-danger">
                      <div class="avatar-content"><i class="avatar-icon" data-feather="x"></i></div>
                    </div>
                  </div>
                  <div class="list-item-body flex-grow-1">
                    <p class="media-heading"><span class="fw-bolder">Server down</span>&nbsp;registered</p><small class="notification-text"> USA Server is down due to high CPU usage</small>
                  </div>
                </div>
              </a><a class="d-flex" href="#">
                <div class="list-item d-flex align-items-start">
                  <div class="me-1">
                    <div class="avatar bg-light-success">
                      <div class="avatar-content"><i class="avatar-icon" data-feather="check"></i></div>
                    </div>
                  </div>
                  <div class="list-item-body flex-grow-1">
                    <p class="media-heading"><span class="fw-bolder">Sales report</span>&nbsp;generated</p><small class="notification-text"> Last month sales report generated</small>
                  </div>
                </div>
              </a><a class="d-flex" href="#">
                <div class="list-item d-flex align-items-start">
                  <div class="me-1">
                    <div class="avatar bg-light-warning">
                      <div class="avatar-content"><i class="avatar-icon" data-feather="alert-triangle"></i></div>
                    </div>
                  </div>
                  <div class="list-item-body flex-grow-1">
                    <p class="media-heading"><span class="fw-bolder">High memory</span>&nbsp;usage</p><small class="notification-text"> BLR Server using high memory</small>
                  </div>
                </div>
              </a>
            </li>
            <li class="dropdown-menu-footer"><a class="btn btn-primary w-100" href="#">Read all notifications</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="user-nav d-sm-flex d-none"><span class="user-name fw-bolder">John Doe</span><span class="user-status">Admin</span></div><span class="avatar"><img class="round" src="<?= base_url('assets/'); ?>app-assets/images/portrait/small/avatar-s-11.jpg" alt="avatar" height="40" width="40"><span class="avatar-status-online"></span></span>
          </a>
          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user"><a class="dropdown-item" href="page-profile.html"><i class="me-50" data-feather="user"></i> Profile</a><a class="dropdown-item" href="app-email.html"><i class="me-50" data-feather="mail"></i> Inbox</a><a class="dropdown-item" href="app-todo.html"><i class="me-50" data-feather="check-square"></i> Task</a><a class="dropdown-item" href="app-chat.html"><i class="me-50" data-feather="message-square"></i> Chats</a>
            <div class="dropdown-divider"></div><a class="dropdown-item" href="page-account-settings-account.html"><i class="me-50" data-feather="settings"></i> Settings</a><a class="dropdown-item" href="page-pricing.html"><i class="me-50" data-feather="credit-card"></i> Pricing</a><a class="dropdown-item" href="page-faq.html"><i class="me-50" data-feather="help-circle"></i> FAQ</a><a class="dropdown-item" href="auth-login-cover.html"><i class="me-50" data-feather="power"></i> Logout</a>
          </div>
        </li>
      </ul>
    </div>
  </nav>
  <ul class="main-search-list-defaultlist d-none">
    <li class="d-flex align-items-center"><a href="#">
        <h6 class="section-label mt-75 mb-0">Files</h6>
      </a></li>
    <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100" href="app-file-manager.html">
        <div class="d-flex">
          <div class="me-75"><img src="<?= base_url('assets/'); ?>app-assets/images/icons/xls.png" alt="png" height="32"></div>
          <div class="search-data">
            <p class="search-data-title mb-0">Two new item submitted</p><small class="text-muted">Marketing Manager</small>
          </div>
        </div><small class="search-data-size me-50 text-muted">&apos;17kb</small>
      </a></li>
    <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100" href="app-file-manager.html">
        <div class="d-flex">
          <div class="me-75"><img src="<?= base_url('assets/'); ?>app-assets/images/icons/jpg.png" alt="png" height="32"></div>
          <div class="search-data">
            <p class="search-data-title mb-0">52 JPG file Generated</p><small class="text-muted">FontEnd Developer</small>
          </div>
        </div><small class="search-data-size me-50 text-muted">&apos;11kb</small>
      </a></li>
    <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100" href="app-file-manager.html">
        <div class="d-flex">
          <div class="me-75"><img src="<?= base_url('assets/'); ?>app-assets/images/icons/pdf.png" alt="png" height="32"></div>
          <div class="search-data">
            <p class="search-data-title mb-0">25 PDF File Uploaded</p><small class="text-muted">Digital Marketing Manager</small>
          </div>
        </div><small class="search-data-size me-50 text-muted">&apos;150kb</small>
      </a></li>
    <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100" href="app-file-manager.html">
        <div class="d-flex">
          <div class="me-75"><img src="<?= base_url('assets/'); ?>app-assets/images/icons/doc.png" alt="png" height="32"></div>
          <div class="search-data">
            <p class="search-data-title mb-0">Anna_Strong.doc</p><small class="text-muted">Web Designer</small>
          </div>
        </div><small class="search-data-size me-50 text-muted">&apos;256kb</small>
      </a></li>
    <li class="d-flex align-items-center"><a href="#">
        <h6 class="section-label mt-75 mb-0">Members</h6>
      </a></li>
    <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="app-user-view-account.html">
        <div class="d-flex align-items-center">
          <div class="avatar me-75"><img src="<?= base_url('assets/'); ?>app-assets/images/portrait/small/avatar-s-8.jpg" alt="png" height="32"></div>
          <div class="search-data">
            <p class="search-data-title mb-0">John Doe</p><small class="text-muted">UI designer</small>
          </div>
        </div>
      </a></li>
    <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="app-user-view-account.html">
        <div class="d-flex align-items-center">
          <div class="avatar me-75"><img src="<?= base_url('assets/'); ?>app-assets/images/portrait/small/avatar-s-1.jpg" alt="png" height="32"></div>
          <div class="search-data">
            <p class="search-data-title mb-0">Michal Clark</p><small class="text-muted">FontEnd Developer</small>
          </div>
        </div>
      </a></li>
    <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="app-user-view-account.html">
        <div class="d-flex align-items-center">
          <div class="avatar me-75"><img src="<?= base_url('assets/'); ?>app-assets/images/portrait/small/avatar-s-14.jpg" alt="png" height="32"></div>
          <div class="search-data">
            <p class="search-data-title mb-0">Milena Gibson</p><small class="text-muted">Digital Marketing Manager</small>
          </div>
        </div>
      </a></li>
    <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="app-user-view-account.html">
        <div class="d-flex align-items-center">
          <div class="avatar me-75"><img src="<?= base_url('assets/'); ?>app-assets/images/portrait/small/avatar-s-6.jpg" alt="png" height="32"></div>
          <div class="search-data">
            <p class="search-data-title mb-0">Anna Strong</p><small class="text-muted">Web Designer</small>
          </div>
        </div>
      </a></li>
  </ul>
  <ul class="main-search-list-defaultlist-other-list d-none">
    <li class="auto-suggestion justify-content-between"><a class="d-flex align-items-center justify-content-between w-100 py-50">
        <div class="d-flex justify-content-start"><span class="me-75" data-feather="alert-circle"></span><span>No results found.</span></div>
      </a></li>
  </ul>
  <!-- END: Header-->

  <!-- BEGIN: Content-->
  <div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
      <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
          <div class="row breadcrumbs-top">
            <div class="col-12">
              <h2 class="content-header-title float-start mb-0">Layout without menu</h2>
              <div class="breadcrumb-wrapper">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.html">Home</a>
                  </li>
                  <li class="breadcrumb-item"><a href="#">Layouts</a>
                  </li>
                  <li class="breadcrumb-item active">Layout without menu
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
          <div class="mb-1 breadcrumb-right">
            <div class="dropdown">
              <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="grid"></i></button>
              <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="app-todo.html"><i class="me-1" data-feather="check-square"></i><span class="align-middle">Todo</span></a><a class="dropdown-item" href="app-chat.html"><i class="me-1" data-feather="message-square"></i><span class="align-middle">Chat</span></a><a class="dropdown-item" href="app-email.html"><i class="me-1" data-feather="mail"></i><span class="align-middle">Email</span></a><a class="dropdown-item" href="app-calendar.html"><i class="me-1" data-feather="calendar"></i><span class="align-middle">Calendar</span></a></div>
            </div>
          </div>
        </div>
      </div>
      <div class="content-body">
        <div class="row">
          <div class="col-12">
            <div class="alert alert-primary" role="alert">
              <div class="alert-body"><strong>Info:</strong> Please check the&nbsp;<a class="text-primary" href="https://pixinvent.com/demo/vuexy-html-bootstrap-admin-template/documentation/documentation-layout-without-menu.html" target="_blank">Layout without menu documentation</a>&nbsp; for more details.</div>
            </div>
          </div>
        </div><!-- Dashboard Ecommerce Starts -->
        <section id="dashboard-ecommerce">
          <div class="row match-height">
            <!-- Medal Card -->
            <div class="col-xl-4 col-md-6 col-12">
              <div class="card card-congratulation-medal">
                <div class="card-body">
                  <h5>Congratulations 🎉 John!</h5>
                  <p class="card-text font-small-3">You have won gold medal</p>
                  <h3 class="mb-75 mt-2 pt-50">
                    <a href="#">$48.9k</a>
                  </h3>
                  <button type="button" class="btn btn-primary">View Sales</button>
                  <img src="<?= base_url('assets/'); ?>app-assets/images/illustration/badge.svg" class="congratulation-medal" alt="Medal Pic" />
                </div>
              </div>
            </div>
            <!--/ Medal Card -->

            <!-- Statistics Card -->
            <div class="col-xl-8 col-md-6 col-12">
              <div class="card card-statistics">
                <div class="card-header">
                  <h4 class="card-title">Statistics</h4>
                  <div class="d-flex align-items-center">
                    <p class="card-text font-small-2 me-25 mb-0">Updated 1 month ago</p>
                  </div>
                </div>
                <div class="card-body statistics-body">
                  <div class="row">
                    <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                      <div class="d-flex flex-row">
                        <div class="avatar bg-light-primary me-2">
                          <div class="avatar-content">
                            <i data-feather="trending-up" class="avatar-icon"></i>
                          </div>
                        </div>
                        <div class="my-auto">
                          <h4 class="fw-bolder mb-0">230k</h4>
                          <p class="card-text font-small-3 mb-0">Sales</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                      <div class="d-flex flex-row">
                        <div class="avatar bg-light-info me-2">
                          <div class="avatar-content">
                            <i data-feather="user" class="avatar-icon"></i>
                          </div>
                        </div>
                        <div class="my-auto">
                          <h4 class="fw-bolder mb-0">8.549k</h4>
                          <p class="card-text font-small-3 mb-0">Customers</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-sm-0">
                      <div class="d-flex flex-row">
                        <div class="avatar bg-light-danger me-2">
                          <div class="avatar-content">
                            <i data-feather="box" class="avatar-icon"></i>
                          </div>
                        </div>
                        <div class="my-auto">
                          <h4 class="fw-bolder mb-0">1.423k</h4>
                          <p class="card-text font-small-3 mb-0">Products</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                      <div class="d-flex flex-row">
                        <div class="avatar bg-light-success me-2">
                          <div class="avatar-content">
                            <i data-feather="dollar-sign" class="avatar-icon"></i>
                          </div>
                        </div>
                        <div class="my-auto">
                          <h4 class="fw-bolder mb-0">$9745</h4>
                          <p class="card-text font-small-3 mb-0">Revenue</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!--/ Statistics Card -->
          </div>

          <div class="row match-height">
            <div class="col-lg-4 col-12">
              <div class="row match-height">
                <!-- Bar Chart - Orders -->
                <div class="col-lg-6 col-md-3 col-6">
                  <div class="card">
                    <div class="card-body pb-50">
                      <h6>Orders</h6>
                      <h2 class="fw-bolder mb-1">2,76k</h2>
                      <div id="statistics-order-chart"></div>
                    </div>
                  </div>
                </div>
                <!--/ Bar Chart - Orders -->

                <!-- Line Chart - Profit -->
                <div class="col-lg-6 col-md-3 col-6">
                  <div class="card card-tiny-line-stats">
                    <div class="card-body pb-50">
                      <h6>Profit</h6>
                      <h2 class="fw-bolder mb-1">6,24k</h2>
                      <div id="statistics-profit-chart"></div>
                    </div>
                  </div>
                </div>
                <!--/ Line Chart - Profit -->

                <!-- Earnings Card -->
                <div class="col-lg-12 col-md-6 col-12">
                  <div class="card earnings-card">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-6">
                          <h4 class="card-title mb-1">Earnings</h4>
                          <div class="font-small-2">This Month</div>
                          <h5 class="mb-1">$4055.56</h5>
                          <p class="card-text text-muted font-small-2">
                            <span class="fw-bolder">68.2%</span><span> more earnings than last month.</span>
                          </p>
                        </div>
                        <div class="col-6">
                          <div id="earnings-chart"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!--/ Earnings Card -->
              </div>
            </div>

            <!-- Revenue Report Card -->
            <div class="col-lg-8 col-12">
              <div class="card card-revenue-budget">
                <div class="row mx-0">
                  <div class="col-md-8 col-12 revenue-report-wrapper">
                    <div class="d-sm-flex justify-content-between align-items-center mb-3">
                      <h4 class="card-title mb-50 mb-sm-0">Revenue Report</h4>
                      <div class="d-flex align-items-center">
                        <div class="d-flex align-items-center me-2">
                          <span class="bullet bullet-primary font-small-3 me-50 cursor-pointer"></span>
                          <span>Earning</span>
                        </div>
                        <div class="d-flex align-items-center ms-75">
                          <span class="bullet bullet-warning font-small-3 me-50 cursor-pointer"></span>
                          <span>Expense</span>
                        </div>
                      </div>
                    </div>
                    <div id="revenue-report-chart"></div>
                  </div>
                  <div class="col-md-4 col-12 budget-wrapper">
                    <div class="btn-group">
                      <button type="button" class="btn btn-outline-primary btn-sm dropdown-toggle budget-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        2020
                      </button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">2020</a>
                        <a class="dropdown-item" href="#">2019</a>
                        <a class="dropdown-item" href="#">2018</a>
                      </div>
                    </div>
                    <h2 class="mb-25">$25,852</h2>
                    <div class="d-flex justify-content-center">
                      <span class="fw-bolder me-25">Budget:</span>
                      <span>56,800</span>
                    </div>
                    <div id="budget-chart"></div>
                    <button type="button" class="btn btn-primary">Increase Budget</button>
                  </div>
                </div>
              </div>
            </div>
            <!--/ Revenue Report Card -->
          </div>

          <div class="row match-height">
            <!-- Company Table Card -->
            <div class="col-lg-8 col-12">
              <div class="card card-company-table">
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Company</th>
                          <th>Category</th>
                          <th>Views</th>
                          <th>Revenue</th>
                          <th>Sales</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            <div class="d-flex align-items-center">
                              <div class="avatar rounded">
                                <div class="avatar-content">
                                  <img src="<?= base_url('assets/'); ?>app-assets/images/icons/toolbox.svg" alt="Toolbar svg" />
                                </div>
                              </div>
                              <div>
                                <div class="fw-bolder">Dixons</div>
                                <div class="font-small-2 text-muted">meguc@ruj.io</div>
                              </div>
                            </div>
                          </td>
                          <td>
                            <div class="d-flex align-items-center">
                              <div class="avatar bg-light-primary me-1">
                                <div class="avatar-content">
                                  <i data-feather="monitor" class="font-medium-3"></i>
                                </div>
                              </div>
                              <span>Technology</span>
                            </div>
                          </td>
                          <td class="text-nowrap">
                            <div class="d-flex flex-column">
                              <span class="fw-bolder mb-25">23.4k</span>
                              <span class="font-small-2 text-muted">in 24 hours</span>
                            </div>
                          </td>
                          <td>$891.2</td>
                          <td>
                            <div class="d-flex align-items-center">
                              <span class="fw-bolder me-1">68%</span>
                              <i data-feather="trending-down" class="text-danger font-medium-1"></i>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <div class="d-flex align-items-center">
                              <div class="avatar rounded">
                                <div class="avatar-content">
                                  <img src="<?= base_url('assets/'); ?>app-assets/images/icons/parachute.svg" alt="Parachute svg" />
                                </div>
                              </div>
                              <div>
                                <div class="fw-bolder">Motels</div>
                                <div class="font-small-2 text-muted">vecav@hodzi.co.uk</div>
                              </div>
                            </div>
                          </td>
                          <td>
                            <div class="d-flex align-items-center">
                              <div class="avatar bg-light-success me-1">
                                <div class="avatar-content">
                                  <i data-feather="coffee" class="font-medium-3"></i>
                                </div>
                              </div>
                              <span>Grocery</span>
                            </div>
                          </td>
                          <td class="text-nowrap">
                            <div class="d-flex flex-column">
                              <span class="fw-bolder mb-25">78k</span>
                              <span class="font-small-2 text-muted">in 2 days</span>
                            </div>
                          </td>
                          <td>$668.51</td>
                          <td>
                            <div class="d-flex align-items-center">
                              <span class="fw-bolder me-1">97%</span>
                              <i data-feather="trending-up" class="text-success font-medium-1"></i>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <div class="d-flex align-items-center">
                              <div class="avatar rounded">
                                <div class="avatar-content">
                                  <img src="<?= base_url('assets/'); ?>app-assets/images/icons/brush.svg" alt="Brush svg" />
                                </div>
                              </div>
                              <div>
                                <div class="fw-bolder">Zipcar</div>
                                <div class="font-small-2 text-muted">davcilse@is.gov</div>
                              </div>
                            </div>
                          </td>
                          <td>
                            <div class="d-flex align-items-center">
                              <div class="avatar bg-light-warning me-1">
                                <div class="avatar-content">
                                  <i data-feather="watch" class="font-medium-3"></i>
                                </div>
                              </div>
                              <span>Fashion</span>
                            </div>
                          </td>
                          <td class="text-nowrap">
                            <div class="d-flex flex-column">
                              <span class="fw-bolder mb-25">162</span>
                              <span class="font-small-2 text-muted">in 5 days</span>
                            </div>
                          </td>
                          <td>$522.29</td>
                          <td>
                            <div class="d-flex align-items-center">
                              <span class="fw-bolder me-1">62%</span>
                              <i data-feather="trending-up" class="text-success font-medium-1"></i>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <div class="d-flex align-items-center">
                              <div class="avatar rounded">
                                <div class="avatar-content">
                                  <img src="<?= base_url('assets/'); ?>app-assets/images/icons/star.svg" alt="Star svg" />
                                </div>
                              </div>
                              <div>
                                <div class="fw-bolder">Owning</div>
                                <div class="font-small-2 text-muted">us@cuhil.gov</div>
                              </div>
                            </div>
                          </td>
                          <td>
                            <div class="d-flex align-items-center">
                              <div class="avatar bg-light-primary me-1">
                                <div class="avatar-content">
                                  <i data-feather="monitor" class="font-medium-3"></i>
                                </div>
                              </div>
                              <span>Technology</span>
                            </div>
                          </td>
                          <td class="text-nowrap">
                            <div class="d-flex flex-column">
                              <span class="fw-bolder mb-25">214</span>
                              <span class="font-small-2 text-muted">in 24 hours</span>
                            </div>
                          </td>
                          <td>$291.01</td>
                          <td>
                            <div class="d-flex align-items-center">
                              <span class="fw-bolder me-1">88%</span>
                              <i data-feather="trending-up" class="text-success font-medium-1"></i>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <div class="d-flex align-items-center">
                              <div class="avatar rounded">
                                <div class="avatar-content">
                                  <img src="<?= base_url('assets/'); ?>app-assets/images/icons/book.svg" alt="Book svg" />
                                </div>
                              </div>
                              <div>
                                <div class="fw-bolder">Cafés</div>
                                <div class="font-small-2 text-muted">pudais@jife.com</div>
                              </div>
                            </div>
                          </td>
                          <td>
                            <div class="d-flex align-items-center">
                              <div class="avatar bg-light-success me-1">
                                <div class="avatar-content">
                                  <i data-feather="coffee" class="font-medium-3"></i>
                                </div>
                              </div>
                              <span>Grocery</span>
                            </div>
                          </td>
                          <td class="text-nowrap">
                            <div class="d-flex flex-column">
                              <span class="fw-bolder mb-25">208</span>
                              <span class="font-small-2 text-muted">in 1 week</span>
                            </div>
                          </td>
                          <td>$783.93</td>
                          <td>
                            <div class="d-flex align-items-center">
                              <span class="fw-bolder me-1">16%</span>
                              <i data-feather="trending-down" class="text-danger font-medium-1"></i>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <div class="d-flex align-items-center">
                              <div class="avatar rounded">
                                <div class="avatar-content">
                                  <img src="<?= base_url('assets/'); ?>app-assets/images/icons/rocket.svg" alt="Rocket svg" />
                                </div>
                              </div>
                              <div>
                                <div class="fw-bolder">Kmart</div>
                                <div class="font-small-2 text-muted">bipri@cawiw.com</div>
                              </div>
                            </div>
                          </td>
                          <td>
                            <div class="d-flex align-items-center">
                              <div class="avatar bg-light-warning me-1">
                                <div class="avatar-content">
                                  <i data-feather="watch" class="font-medium-3"></i>
                                </div>
                              </div>
                              <span>Fashion</span>
                            </div>
                          </td>
                          <td class="text-nowrap">
                            <div class="d-flex flex-column">
                              <span class="fw-bolder mb-25">990</span>
                              <span class="font-small-2 text-muted">in 1 month</span>
                            </div>
                          </td>
                          <td>$780.05</td>
                          <td>
                            <div class="d-flex align-items-center">
                              <span class="fw-bolder me-1">78%</span>
                              <i data-feather="trending-up" class="text-success font-medium-1"></i>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <div class="d-flex align-items-center">
                              <div class="avatar rounded">
                                <div class="avatar-content">
                                  <img src="<?= base_url('assets/'); ?>app-assets/images/icons/speaker.svg" alt="Speaker svg" />
                                </div>
                              </div>
                              <div>
                                <div class="fw-bolder">Payers</div>
                                <div class="font-small-2 text-muted">luk@izug.io</div>
                              </div>
                            </div>
                          </td>
                          <td>
                            <div class="d-flex align-items-center">
                              <div class="avatar bg-light-warning me-1">
                                <div class="avatar-content">
                                  <i data-feather="watch" class="font-medium-3"></i>
                                </div>
                              </div>
                              <span>Fashion</span>
                            </div>
                          </td>
                          <td class="text-nowrap">
                            <div class="d-flex flex-column">
                              <span class="fw-bolder mb-25">12.9k</span>
                              <span class="font-small-2 text-muted">in 12 hours</span>
                            </div>
                          </td>
                          <td>$531.49</td>
                          <td>
                            <div class="d-flex align-items-center">
                              <span class="fw-bolder me-1">42%</span>
                              <i data-feather="trending-up" class="text-success font-medium-1"></i>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <!--/ Company Table Card -->

            <!-- Developer Meetup Card -->
            <div class="col-lg-4 col-md-6 col-12">
              <div class="card card-developer-meetup">
                <div class="meetup-img-wrapper rounded-top text-center">
                  <img src="<?= base_url('assets/'); ?>app-assets/images/illustration/email.svg" alt="Meeting Pic" height="170" />
                </div>
                <div class="card-body">
                  <div class="meetup-header d-flex align-items-center">
                    <div class="meetup-day">
                      <h6 class="mb-0">THU</h6>
                      <h3 class="mb-0">24</h3>
                    </div>
                    <div class="my-auto">
                      <h4 class="card-title mb-25">Developer Meetup</h4>
                      <p class="card-text mb-0">Meet world popular developers</p>
                    </div>
                  </div>
                  <div class="mt-0">
                    <div class="avatar float-start bg-light-primary rounded me-1">
                      <div class="avatar-content">
                        <i data-feather="calendar" class="avatar-icon font-medium-3"></i>
                      </div>
                    </div>
                    <div class="more-info">
                      <h6 class="mb-0">Sat, May 25, 2020</h6>
                      <small>10:AM to 6:PM</small>
                    </div>
                  </div>
                  <div class="mt-2">
                    <div class="avatar float-start bg-light-primary rounded me-1">
                      <div class="avatar-content">
                        <i data-feather="map-pin" class="avatar-icon font-medium-3"></i>
                      </div>
                    </div>
                    <div class="more-info">
                      <h6 class="mb-0">Central Park</h6>
                      <small>Manhattan, New york City</small>
                    </div>
                  </div>
                  <div class="avatar-group">
                    <div data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="bottom" title="Billy Hopkins" class="avatar pull-up">
                      <img src="<?= base_url('assets/'); ?>app-assets/images/portrait/small/avatar-s-9.jpg" alt="Avatar" width="33" height="33" />
                    </div>
                    <div data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="bottom" title="Amy Carson" class="avatar pull-up">
                      <img src="<?= base_url('assets/'); ?>app-assets/images/portrait/small/avatar-s-6.jpg" alt="Avatar" width="33" height="33" />
                    </div>
                    <div data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="bottom" title="Brandon Miles" class="avatar pull-up">
                      <img src="<?= base_url('assets/'); ?>app-assets/images/portrait/small/avatar-s-8.jpg" alt="Avatar" width="33" height="33" />
                    </div>
                    <div data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="bottom" title="Daisy Weber" class="avatar pull-up">
                      <img src="<?= base_url('assets/'); ?>app-assets/images/portrait/small/avatar-s-20.jpg" alt="Avatar" width="33" height="33" />
                    </div>
                    <div data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="bottom" title="Jenny Looper" class="avatar pull-up">
                      <img src="<?= base_url('assets/'); ?>app-assets/images/portrait/small/avatar-s-20.jpg" alt="Avatar" width="33" height="33" />
                    </div>
                    <h6 class="align-self-center cursor-pointer ms-50 mb-0">+42</h6>
                  </div>
                </div>
              </div>
            </div>
            <!--/ Developer Meetup Card -->

            <!-- Browser States Card -->
            <div class="col-lg-4 col-md-6 col-12">
              <div class="card card-browser-states">
                <div class="card-header">
                  <div>
                    <h4 class="card-title">Browser States</h4>
                    <p class="card-text font-small-2">Counter August 2020</p>
                  </div>
                  <div class="dropdown chart-dropdown">
                    <i data-feather="more-vertical" class="font-medium-3 cursor-pointer" data-bs-toggle="dropdown"></i>
                    <div class="dropdown-menu dropdown-menu-end">
                      <a class="dropdown-item" href="#">Last 28 Days</a>
                      <a class="dropdown-item" href="#">Last Month</a>
                      <a class="dropdown-item" href="#">Last Year</a>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="browser-states">
                    <div class="d-flex">
                      <img src="<?= base_url('assets/'); ?>app-assets/images/icons/google-chrome.png" class="rounded me-1" height="30" alt="Google Chrome" />
                      <h6 class="align-self-center mb-0">Google Chrome</h6>
                    </div>
                    <div class="d-flex align-items-center">
                      <div class="fw-bold text-body-heading me-1">54.4%</div>
                      <div id="browser-state-chart-primary"></div>
                    </div>
                  </div>
                  <div class="browser-states">
                    <div class="d-flex">
                      <img src="<?= base_url('assets/'); ?>app-assets/images/icons/mozila-firefox.png" class="rounded me-1" height="30" alt="Mozila Firefox" />
                      <h6 class="align-self-center mb-0">Mozila Firefox</h6>
                    </div>
                    <div class="d-flex align-items-center">
                      <div class="fw-bold text-body-heading me-1">6.1%</div>
                      <div id="browser-state-chart-warning"></div>
                    </div>
                  </div>
                  <div class="browser-states">
                    <div class="d-flex">
                      <img src="<?= base_url('assets/'); ?>app-assets/images/icons/apple-safari.png" class="rounded me-1" height="30" alt="Apple Safari" />
                      <h6 class="align-self-center mb-0">Apple Safari</h6>
                    </div>
                    <div class="d-flex align-items-center">
                      <div class="fw-bold text-body-heading me-1">14.6%</div>
                      <div id="browser-state-chart-secondary"></div>
                    </div>
                  </div>
                  <div class="browser-states">
                    <div class="d-flex">
                      <img src="<?= base_url('assets/'); ?>app-assets/images/icons/internet-explorer.png" class="rounded me-1" height="30" alt="Internet Explorer" />
                      <h6 class="align-self-center mb-0">Internet Explorer</h6>
                    </div>
                    <div class="d-flex align-items-center">
                      <div class="fw-bold text-body-heading me-1">4.2%</div>
                      <div id="browser-state-chart-info"></div>
                    </div>
                  </div>
                  <div class="browser-states">
                    <div class="d-flex">
                      <img src="<?= base_url('assets/'); ?>app-assets/images/icons/opera.png" class="rounded me-1" height="30" alt="Opera Mini" />
                      <h6 class="align-self-center mb-0">Opera Mini</h6>
                    </div>
                    <div class="d-flex align-items-center">
                      <div class="fw-bold text-body-heading me-1">8.4%</div>
                      <div id="browser-state-chart-danger"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!--/ Browser States Card -->

            <!-- Goal Overview Card -->
            <div class="col-lg-4 col-md-6 col-12">
              <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                  <h4 class="card-title">Goal Overview</h4>
                  <i data-feather="help-circle" class="font-medium-3 text-muted cursor-pointer"></i>
                </div>
                <div class="card-body p-0">
                  <div id="goal-overview-radial-bar-chart" class="my-2"></div>
                  <div class="row border-top text-center mx-0">
                    <div class="col-6 border-end py-1">
                      <p class="card-text text-muted mb-0">Completed</p>
                      <h3 class="fw-bolder mb-0">786,617</h3>
                    </div>
                    <div class="col-6 py-1">
                      <p class="card-text text-muted mb-0">In Progress</p>
                      <h3 class="fw-bolder mb-0">13,561</h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!--/ Goal Overview Card -->

            <!-- Transaction Card -->
            <div class="col-lg-4 col-md-6 col-12">
              <div class="card card-transaction">
                <div class="card-header">
                  <h4 class="card-title">Transactions</h4>
                  <div class="dropdown chart-dropdown">
                    <i data-feather="more-vertical" class="font-medium-3 cursor-pointer" data-bs-toggle="dropdown"></i>
                    <div class="dropdown-menu dropdown-menu-end">
                      <a class="dropdown-item" href="#">Last 28 Days</a>
                      <a class="dropdown-item" href="#">Last Month</a>
                      <a class="dropdown-item" href="#">Last Year</a>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="transaction-item">
                    <div class="d-flex">
                      <div class="avatar bg-light-primary rounded float-start">
                        <div class="avatar-content">
                          <i data-feather="pocket" class="avatar-icon font-medium-3"></i>
                        </div>
                      </div>
                      <div class="transaction-percentage">
                        <h6 class="transaction-title">Wallet</h6>
                        <small>Starbucks</small>
                      </div>
                    </div>
                    <div class="fw-bolder text-danger">- $74</div>
                  </div>
                  <div class="transaction-item">
                    <div class="d-flex">
                      <div class="avatar bg-light-success rounded float-start">
                        <div class="avatar-content">
                          <i data-feather="check" class="avatar-icon font-medium-3"></i>
                        </div>
                      </div>
                      <div class="transaction-percentage">
                        <h6 class="transaction-title">Bank Transfer</h6>
                        <small>Add Money</small>
                      </div>
                    </div>
                    <div class="fw-bolder text-success">+ $480</div>
                  </div>
                  <div class="transaction-item">
                    <div class="d-flex">
                      <div class="avatar bg-light-danger rounded float-start">
                        <div class="avatar-content">
                          <i data-feather="dollar-sign" class="avatar-icon font-medium-3"></i>
                        </div>
                      </div>
                      <div class="transaction-percentage">
                        <h6 class="transaction-title">Paypal</h6>
                        <small>Add Money</small>
                      </div>
                    </div>
                    <div class="fw-bolder text-success">+ $590</div>
                  </div>
                  <div class="transaction-item">
                    <div class="d-flex">
                      <div class="avatar bg-light-warning rounded float-start">
                        <div class="avatar-content">
                          <i data-feather="credit-card" class="avatar-icon font-medium-3"></i>
                        </div>
                      </div>
                      <div class="transaction-percentage">
                        <h6 class="transaction-title">Mastercard</h6>
                        <small>Ordered Food</small>
                      </div>
                    </div>
                    <div class="fw-bolder text-danger">- $23</div>
                  </div>
                  <div class="transaction-item">
                    <div class="d-flex">
                      <div class="avatar bg-light-info rounded float-start">
                        <div class="avatar-content">
                          <i data-feather="trending-up" class="avatar-icon font-medium-3"></i>
                        </div>
                      </div>
                      <div class="transaction-percentage">
                        <h6 class="transaction-title">Transfer</h6>
                        <small>Refund</small>
                      </div>
                    </div>
                    <div class="fw-bolder text-success">+ $98</div>
                  </div>
                </div>
              </div>
            </div>
            <!--/ Transaction Card -->
          </div>
        </section>
        <!-- Dashboard Ecommerce ends -->

      </div>
    </div>
  </div>
  <!-- END: Content-->

  <div class="sidenav-overlay"></div>
  <div class="drag-target"></div>

  <!-- BEGIN: Footer-->
  <footer class="footer footer-static footer-light">
    <p class="clearfix mb-0"><span class="float-md-start d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2021<a class="ms-25" href="https://1.envato.market/pixinvent_portfolio" target="_blank">Pixinvent</a><span class="d-none d-sm-inline-block">, All rights Reserved</span></span><span class="float-md-end d-none d-md-block">Hand-crafted & Made with<i data-feather="heart"></i></span></p>
  </footer>
  <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
  <!-- END: Footer-->


  <!-- BEGIN: Vendor JS-->
  <script src="<?= base_url('assets/'); ?>app-assets/vendors/js/vendors.min.js"></script>
  <!-- BEGIN Vendor JS-->

  <!-- BEGIN: Page Vendor JS-->
  <script src="<?= base_url('assets/'); ?>app-assets/vendors/js/charts/apexcharts.min.js"></script>
  <script src="<?= base_url('assets/'); ?>app-assets/vendors/js/extensions/toastr.min.js"></script>
  <!-- END: Page Vendor JS-->

  <!-- BEGIN: Theme JS-->
  <script src="<?= base_url('assets/'); ?>app-assets/js/core/app-menu.js"></script>
  <script src="<?= base_url('assets/'); ?>app-assets/js/core/app.js"></script>
  <!-- END: Theme JS-->

  <!-- BEGIN: Page JS-->
  <script src="<?= base_url('assets/'); ?>app-assets/js/scripts/pages/dashboard-ecommerce.js"></script>
  <!-- END: Page JS-->

  <script>
    $(window).on('load', function() {
      if (feather) {
        feather.replace({
          width: 14,
          height: 14
        });
      }
    })
  </script>
</body>
<!-- END: Body-->

</html>