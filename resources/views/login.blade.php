<!DOCTYPE html>
<!--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 4
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en" >
<!-- begin::Head -->
<head>
  <meta charset="utf-8" />
  <title>
    Metronic | Login Page - 3
  </title>
  <meta name="description" content="Latest updates and statistic charts">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!--begin::Web font -->
  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
  <script>
    WebFont.load({
      google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
      active: function() {
        sessionStorage.fonts = true;
      }
    });
  </script>
  <!--end::Web font -->
  <!--begin::Base Styles -->
  
  
  <link rel="stylesheet" href="{{ asset("metronic/vendors/base/vendors.bundle.css") }}">
  <link rel="stylesheet" href="{{ asset("metronic/demo/default/base/style.bundle.css") }}">
  <!--end::Base Styles -->
  <link rel="shortcut icon" href="{{ asset("favicon.ico") }}" />
</head>
<!-- end::Head -->
<!-- end::Body -->
<body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
<!-- begin:: Page -->
<div class="m-grid m-grid--hor m-grid--root m-page">
  <div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--signin m-login--2 m-login-2--skin-2" id="m_login" style="background-image: url(../../../assets/app/media/img//bg/bg-3.jpg);">
    <div class="m-grid__item m-grid__item--fluid	m-login__wrapper">
      <div class="m-login__container">
        <div class="m-login__logo">
          <a href="#">
            <img src="assets/images/action-for-singapore-dogs-logo.png" alt="" />
          </a>
        </div>
        <div class="m-login__signin">
          <div class="m-login__head">
            <h3 class="m-login__title">
              Admin
            </h3>
          </div>
          <form class="m-login__form m-form" method="post" action="">
            {{ csrf_field() }}
            
            @if (isset($error))
              <div class="alert alert-danger">
                Wrong username and/or password
              </div>
            @endif
            
            <div class="form-group m-form__group">
              <input class="form-control m-input" type="text" placeholder="Username" name="username" autocomplete="off" autofocus>
            </div>
            <div class="form-group m-form__group">
              <input class="form-control m-input m-login__form-input--last" type="password" placeholder="Password" name="password">
            </div>
            <div class="m-login__form-action">
              <button id="m_login_signin_submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary">
                Sign In
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end:: Page -->
</body>
<!-- end::Body -->
</html>
