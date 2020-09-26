<!DOCTYPE html>
<html lang="en" >
<!-- begin::Head -->
<head>
  <meta charset="utf-8" />
  <title>
    ASD - Backend
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
  <link href="./metronic/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
  <link href="./metronic/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" />
  <link href="./metronic/custom.css" rel="stylesheet" type="text/css" />
  
  <!--end::Base Styles -->
  <link rel="shortcut icon" href="favicon.ico" />
</head>
<!-- end::Head -->
<!-- end::Body -->
<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
<head>
  <meta charset="UTF-8">
  <!-- begin:: Page -->
  <div class="m-grid m-grid--hor m-grid--root m-page">
    <!-- BEGIN: Header -->
    <header class="m-grid__item    m-header "  data-minimize-offset="200" data-minimize-mobile-offset="200" >
      <div class="m-container m-container--fluid m-container--full-height">
        <div class="m-stack m-stack--ver m-stack--desktop">
          <!-- BEGIN: Brand -->
          <div class="m-stack__item m-brand  m-brand--skin-dark ">
            <div class="m-stack m-stack--ver m-stack--general">
              <div class="m-stack__item m-stack__item--middle m-brand__logo">
                <a href="index.html" class="m-brand__logo-wrapper">
                  <img alt="" src="./metronic/demo/default/media/img/logo/logo_default_dark.png"/>
                </a>
              </div>
              <div class="m-stack__item m-stack__item--middle m-brand__tools">
                <!-- BEGIN: Left Aside Minimize Toggle -->
                <a href="javascript:;" id="m_aside_left_minimize_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-desktop-inline-block
					 ">
                  <span></span>
                </a>
                <!-- END -->
                <!-- BEGIN: Responsive Aside Left Menu Toggler -->
                <a href="javascript:;" id="m_aside_left_offcanvas_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-tablet-and-mobile-inline-block">
                  <span></span>
                </a>
                <!-- END -->
                <!-- BEGIN: Topbar Toggler -->
                <a id="m_aside_header_topbar_mobile_toggle" href="javascript:;" class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
                  <i class="flaticon-more"></i>
                </a>
                <!-- BEGIN: Topbar Toggler -->
              </div>
            </div>
          </div>
          <!-- END: Brand -->
          <div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">
            <!-- BEGIN: Topbar -->
            <div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general">
              <div class="m-stack__item m-topbar__nav-wrapper">
                <ul class="m-topbar__nav m-nav m-nav--inline">
                  <li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light" data-dropdown-toggle="click">
                    <a href="#" class="m-nav__link m-dropdown__toggle">
												<span class="m-topbar__userpic">
													<img src="./metronic/app/media/img/users/user4.jpg" class="m--img-rounded m--marginless m--img-centered" alt=""/>
												</span>
                      <span class="m-topbar__username m--hide">
													Nick
												</span>
                    </a>
                    <div class="m-dropdown__wrapper">
                      <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                      <div class="m-dropdown__inner">
                        
                        <div class="m-dropdown__body">
                          <div class="m-dropdown__content">
                            <ul class="m-nav m-nav--skin-light">
                              
                              <li class="m-nav__separator m-nav__separator--fit"></li>
                              <li class="m-nav__item">
                                <a href="{{ url('logout') }}" class="btn m-btn--pill    btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder">
                                  Logout
                                </a>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
            <!-- END: Topbar -->
          </div>
        </div>
      </div>
    </header>
    <!-- END: Header -->
    <!-- begin::Body -->
    <div id="app"></div>
    <!-- end:: Body -->
    <!-- begin::Footer -->
    <footer class="m-grid__item		m-footer ">
      <div class="m-container m-container--fluid m-container--full-height m-page__container">
        <div class="m-stack m-stack--flex-tablet-and-mobile m-stack--ver m-stack--desktop">
          <div class="m-stack__item m-stack__item--left m-stack__item--middle m-stack__item--last">
							<span class="m-footer__copyright">
								Action for Singapore Dogs
							</span>
          </div>
        </div>
      </div>
    </footer>
    <!-- end::Footer -->
  </div>
  <!-- end:: Page -->
  <!-- begin::Quick Sidebar -->
  <div id="m_quick_sidebar" class="m-quick-sidebar m-quick-sidebar--tabbed m-quick-sidebar--skin-light">
    <div class="m-quick-sidebar__content m--hide">
				<span id="m_quick_sidebar_close" class="m-quick-sidebar__close">
					<i class="la la-close"></i>
				</span>
      <ul id="m_quick_sidebar_tabs" class="nav nav-tabs m-tabs m-tabs-line m-tabs-line--brand" role="tablist">
        <li class="nav-item m-tabs__item">
          <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_quick_sidebar_tabs_messenger" role="tab">
            Messages
          </a>
        </li>
        <li class="nav-item m-tabs__item">
          <a class="nav-link m-tabs__link" 		data-toggle="tab" href="#m_quick_sidebar_tabs_settings" role="tab">
            Settings
          </a>
        </li>
        <li class="nav-item m-tabs__item">
          <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_quick_sidebar_tabs_logs" role="tab">
            Logs
          </a>
        </li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active m-scrollable" id="m_quick_sidebar_tabs_messenger" role="tabpanel">
          <div class="m-messenger m-messenger--message-arrow m-messenger--skin-light">
            <div class="m-messenger__messages">
              <div class="m-messenger__wrapper">
                <div class="m-messenger__message m-messenger__message--in">
                  <div class="m-messenger__message-pic">
                    <img src="./metronic/app/media/img/users/user3.jpg" alt=""/>
                  </div>
                  <div class="m-messenger__message-body">
                    <div class="m-messenger__message-arrow"></div>
                    <div class="m-messenger__message-content">
                      <div class="m-messenger__message-username">
                        Megan wrote
                      </div>
                      <div class="m-messenger__message-text">
                        Hi Bob. What time will be the meeting ?
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="m-messenger__wrapper">
                <div class="m-messenger__message m-messenger__message--out">
                  <div class="m-messenger__message-body">
                    <div class="m-messenger__message-arrow"></div>
                    <div class="m-messenger__message-content">
                      <div class="m-messenger__message-text">
                        Hi Megan. It's at 2.30PM
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="m-messenger__wrapper">
                <div class="m-messenger__message m-messenger__message--in">
                  <div class="m-messenger__message-pic">
                    <img src="./metronic/app/media/img/users/user3.jpg" alt=""/>
                  </div>
                  <div class="m-messenger__message-body">
                    <div class="m-messenger__message-arrow"></div>
                    <div class="m-messenger__message-content">
                      <div class="m-messenger__message-username">
                        Megan wrote
                      </div>
                      <div class="m-messenger__message-text">
                        Will the development team be joining ?
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="m-messenger__wrapper">
                <div class="m-messenger__message m-messenger__message--out">
                  <div class="m-messenger__message-body">
                    <div class="m-messenger__message-arrow"></div>
                    <div class="m-messenger__message-content">
                      <div class="m-messenger__message-text">
                        Yes sure. I invited them as well
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="m-messenger__datetime">
                2:30PM
              </div>
              <div class="m-messenger__wrapper">
                <div class="m-messenger__message m-messenger__message--in">
                  <div class="m-messenger__message-pic">
                    <img src="./metronic/app/media/img//users/user3.jpg"  alt=""/>
                  </div>
                  <div class="m-messenger__message-body">
                    <div class="m-messenger__message-arrow"></div>
                    <div class="m-messenger__message-content">
                      <div class="m-messenger__message-username">
                        Megan wrote
                      </div>
                      <div class="m-messenger__message-text">
                        Noted. For the Coca-Cola Mobile App project as well ?
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="m-messenger__wrapper">
                <div class="m-messenger__message m-messenger__message--out">
                  <div class="m-messenger__message-body">
                    <div class="m-messenger__message-arrow"></div>
                    <div class="m-messenger__message-content">
                      <div class="m-messenger__message-text">
                        Yes, sure.
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="m-messenger__wrapper">
                <div class="m-messenger__message m-messenger__message--out">
                  <div class="m-messenger__message-body">
                    <div class="m-messenger__message-arrow"></div>
                    <div class="m-messenger__message-content">
                      <div class="m-messenger__message-text">
                        Please also prepare the quotation for the Loop CRM project as well.
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="m-messenger__datetime">
                3:15PM
              </div>
              <div class="m-messenger__wrapper">
                <div class="m-messenger__message m-messenger__message--in">
                  <div class="m-messenger__message-no-pic m--bg-fill-danger">
											<span>
												M
											</span>
                  </div>
                  <div class="m-messenger__message-body">
                    <div class="m-messenger__message-arrow"></div>
                    <div class="m-messenger__message-content">
                      <div class="m-messenger__message-username">
                        Megan wrote
                      </div>
                      <div class="m-messenger__message-text">
                        Noted. I will prepare it.
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="m-messenger__wrapper">
                <div class="m-messenger__message m-messenger__message--out">
                  <div class="m-messenger__message-body">
                    <div class="m-messenger__message-arrow"></div>
                    <div class="m-messenger__message-content">
                      <div class="m-messenger__message-text">
                        Thanks Megan. I will see you later.
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="m-messenger__wrapper">
                <div class="m-messenger__message m-messenger__message--in">
                  <div class="m-messenger__message-pic">
                    <img src="./metronic/app/media/img/users/user3.jpg"  alt=""/>
                  </div>
                  <div class="m-messenger__message-body">
                    <div class="m-messenger__message-arrow"></div>
                    <div class="m-messenger__message-content">
                      <div class="m-messenger__message-username">
                        Megan wrote
                      </div>
                      <div class="m-messenger__message-text">
                        Sure. See you in the meeting soon.
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="m-messenger__seperator"></div>
            <div class="m-messenger__form">
              <div class="m-messenger__form-controls">
                <input type="text" name="" placeholder="Type here..." class="m-messenger__form-input">
              </div>
              <div class="m-messenger__form-tools">
                <a href="" class="m-messenger__form-attachment">
                  <i class="la la-paperclip"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane  m-scrollable" id="m_quick_sidebar_tabs_settings" role="tabpanel">
          <div class="m-list-settings">
            <div class="m-list-settings__group">
              <div class="m-list-settings__heading">
                General Settings
              </div>
              <div class="m-list-settings__item">
									<span class="m-list-settings__item-label">
										Email Notifications
									</span>
                <span class="m-list-settings__item-control">
										<span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">
											<label>
												<input type="checkbox" checked="checked" name="">
												<span></span>
											</label>
										</span>
									</span>
              </div>
              <div class="m-list-settings__item">
									<span class="m-list-settings__item-label">
										Site Tracking
									</span>
                <span class="m-list-settings__item-control">
										<span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">
											<label>
												<input type="checkbox" name="">
												<span></span>
											</label>
										</span>
									</span>
              </div>
              <div class="m-list-settings__item">
									<span class="m-list-settings__item-label">
										SMS Alerts
									</span>
                <span class="m-list-settings__item-control">
										<span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">
											<label>
												<input type="checkbox" name="">
												<span></span>
											</label>
										</span>
									</span>
              </div>
              <div class="m-list-settings__item">
									<span class="m-list-settings__item-label">
										Backup Storage
									</span>
                <span class="m-list-settings__item-control">
										<span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">
											<label>
												<input type="checkbox" name="">
												<span></span>
											</label>
										</span>
									</span>
              </div>
              <div class="m-list-settings__item">
									<span class="m-list-settings__item-label">
										Audit Logs
									</span>
                <span class="m-list-settings__item-control">
										<span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">
											<label>
												<input type="checkbox" checked="checked" name="">
												<span></span>
											</label>
										</span>
									</span>
              </div>
            </div>
            <div class="m-list-settings__group">
              <div class="m-list-settings__heading">
                System Settings
              </div>
              <div class="m-list-settings__item">
									<span class="m-list-settings__item-label">
										System Logs
									</span>
                <span class="m-list-settings__item-control">
										<span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">
											<label>
												<input type="checkbox" name="">
												<span></span>
											</label>
										</span>
									</span>
              </div>
              <div class="m-list-settings__item">
									<span class="m-list-settings__item-label">
										Error Reporting
									</span>
                <span class="m-list-settings__item-control">
										<span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">
											<label>
												<input type="checkbox" name="">
												<span></span>
											</label>
										</span>
									</span>
              </div>
              <div class="m-list-settings__item">
									<span class="m-list-settings__item-label">
										Applications Logs
									</span>
                <span class="m-list-settings__item-control">
										<span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">
											<label>
												<input type="checkbox" name="">
												<span></span>
											</label>
										</span>
									</span>
              </div>
              <div class="m-list-settings__item">
									<span class="m-list-settings__item-label">
										Backup Servers
									</span>
                <span class="m-list-settings__item-control">
										<span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">
											<label>
												<input type="checkbox" checked="checked" name="">
												<span></span>
											</label>
										</span>
									</span>
              </div>
              <div class="m-list-settings__item">
									<span class="m-list-settings__item-label">
										Audit Logs
									</span>
                <span class="m-list-settings__item-control">
										<span class="m-switch m-switch--outline m-switch--icon-check m-switch--brand">
											<label>
												<input type="checkbox" name="">
												<span></span>
											</label>
										</span>
									</span>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane  m-scrollable" id="m_quick_sidebar_tabs_logs" role="tabpanel">
          <div class="m-list-timeline">
            <div class="m-list-timeline__group">
              <div class="m-list-timeline__heading">
                System Logs
              </div>
              <div class="m-list-timeline__items">
                <div class="m-list-timeline__item">
                  <span class="m-list-timeline__badge m-list-timeline__badge--state-success"></span>
                  <a href="" class="m-list-timeline__text">
                    12 new users registered
                    <span class="m-badge m-badge--warning m-badge--wide">
												important
											</span>
                  </a>
                  <span class="m-list-timeline__time">
											Just now
										</span>
                </div>
                <div class="m-list-timeline__item">
                  <span class="m-list-timeline__badge m-list-timeline__badge--state-info"></span>
                  <a href="" class="m-list-timeline__text">
                    System shutdown
                  </a>
                  <span class="m-list-timeline__time">
											11 mins
										</span>
                </div>
                <div class="m-list-timeline__item">
                  <span class="m-list-timeline__badge m-list-timeline__badge--state-danger"></span>
                  <a href="" class="m-list-timeline__text">
                    New invoice received
                  </a>
                  <span class="m-list-timeline__time">
											20 mins
										</span>
                </div>
                <div class="m-list-timeline__item">
                  <span class="m-list-timeline__badge m-list-timeline__badge--state-warning"></span>
                  <a href="" class="m-list-timeline__text">
                    Database overloaded 89%
                    <span class="m-badge m-badge--success m-badge--wide">
												resolved
											</span>
                  </a>
                  <span class="m-list-timeline__time">
											1 hr
										</span>
                </div>
                <div class="m-list-timeline__item">
                  <span class="m-list-timeline__badge m-list-timeline__badge--state-success"></span>
                  <a href="" class="m-list-timeline__text">
                    System error
                  </a>
                  <span class="m-list-timeline__time">
											2 hrs
										</span>
                </div>
                <div class="m-list-timeline__item">
                  <span class="m-list-timeline__badge m-list-timeline__badge--state-info"></span>
                  <a href="" class="m-list-timeline__text">
                    Production server down
                    <span class="m-badge m-badge--danger m-badge--wide">
												pending
											</span>
                  </a>
                  <span class="m-list-timeline__time">
											3 hrs
										</span>
                </div>
                <div class="m-list-timeline__item">
                  <span class="m-list-timeline__badge m-list-timeline__badge--state-success"></span>
                  <a href="" class="m-list-timeline__text">
                    Production server up
                  </a>
                  <span class="m-list-timeline__time">
											5 hrs
										</span>
                </div>
              </div>
            </div>
            <div class="m-list-timeline__group">
              <div class="m-list-timeline__heading">
                Applications Logs
              </div>
              <div class="m-list-timeline__items">
                <div class="m-list-timeline__item">
                  <span class="m-list-timeline__badge m-list-timeline__badge--state-info"></span>
                  <a href="" class="m-list-timeline__text">
                    New order received
                    <span class="m-badge m-badge--info m-badge--wide">
												urgent
											</span>
                  </a>
                  <span class="m-list-timeline__time">
											7 hrs
										</span>
                </div>
                <div class="m-list-timeline__item">
                  <span class="m-list-timeline__badge m-list-timeline__badge--state-success"></span>
                  <a href="" class="m-list-timeline__text">
                    12 new users registered
                  </a>
                  <span class="m-list-timeline__time">
											Just now
										</span>
                </div>
                <div class="m-list-timeline__item">
                  <span class="m-list-timeline__badge m-list-timeline__badge--state-info"></span>
                  <a href="" class="m-list-timeline__text">
                    System shutdown
                  </a>
                  <span class="m-list-timeline__time">
											11 mins
										</span>
                </div>
                <div class="m-list-timeline__item">
                  <span class="m-list-timeline__badge m-list-timeline__badge--state-danger"></span>
                  <a href="" class="m-list-timeline__text">
                    New invoices received
                  </a>
                  <span class="m-list-timeline__time">
											20 mins
										</span>
                </div>
                <div class="m-list-timeline__item">
                  <span class="m-list-timeline__badge m-list-timeline__badge--state-warning"></span>
                  <a href="" class="m-list-timeline__text">
                    Database overloaded 89%
                  </a>
                  <span class="m-list-timeline__time">
											1 hr
										</span>
                </div>
                <div class="m-list-timeline__item">
                  <span class="m-list-timeline__badge m-list-timeline__badge--state-success"></span>
                  <a href="" class="m-list-timeline__text">
                    System error
                    <span class="m-badge m-badge--info m-badge--wide">
												pending
											</span>
                  </a>
                  <span class="m-list-timeline__time">
											2 hrs
										</span>
                </div>
                <div class="m-list-timeline__item">
                  <span class="m-list-timeline__badge m-list-timeline__badge--state-info"></span>
                  <a href="" class="m-list-timeline__text">
                    Production server down
                  </a>
                  <span class="m-list-timeline__time">
											3 hrs
										</span>
                </div>
              </div>
            </div>
            <div class="m-list-timeline__group">
              <div class="m-list-timeline__heading">
                Server Logs
              </div>
              <div class="m-list-timeline__items">
                <div class="m-list-timeline__item">
                  <span class="m-list-timeline__badge m-list-timeline__badge--state-success"></span>
                  <a href="" class="m-list-timeline__text">
                    Production server up
                  </a>
                  <span class="m-list-timeline__time">
											5 hrs
										</span>
                </div>
                <div class="m-list-timeline__item">
                  <span class="m-list-timeline__badge m-list-timeline__badge--state-info"></span>
                  <a href="" class="m-list-timeline__text">
                    New order received
                  </a>
                  <span class="m-list-timeline__time">
											7 hrs
										</span>
                </div>
                <div class="m-list-timeline__item">
                  <span class="m-list-timeline__badge m-list-timeline__badge--state-success"></span>
                  <a href="" class="m-list-timeline__text">
                    12 new users registered
                  </a>
                  <span class="m-list-timeline__time">
											Just now
										</span>
                </div>
                <div class="m-list-timeline__item">
                  <span class="m-list-timeline__badge m-list-timeline__badge--state-info"></span>
                  <a href="" class="m-list-timeline__text">
                    System shutdown
                  </a>
                  <span class="m-list-timeline__time">
											11 mins
										</span>
                </div>
                <div class="m-list-timeline__item">
                  <span class="m-list-timeline__badge m-list-timeline__badge--state-danger"></span>
                  <a href="" class="m-list-timeline__text">
                    New invoice received
                  </a>
                  <span class="m-list-timeline__time">
											20 mins
										</span>
                </div>
                <div class="m-list-timeline__item">
                  <span class="m-list-timeline__badge m-list-timeline__badge--state-warning"></span>
                  <a href="" class="m-list-timeline__text">
                    Database overloaded 89%
                  </a>
                  <span class="m-list-timeline__time">
											1 hr
										</span>
                </div>
                <div class="m-list-timeline__item">
                  <span class="m-list-timeline__badge m-list-timeline__badge--state-success"></span>
                  <a href="" class="m-list-timeline__text">
                    System error
                  </a>
                  <span class="m-list-timeline__time">
											2 hrs
										</span>
                </div>
                <div class="m-list-timeline__item">
                  <span class="m-list-timeline__badge m-list-timeline__badge--state-info"></span>
                  <a href="" class="m-list-timeline__text">
                    Production server down
                  </a>
                  <span class="m-list-timeline__time">
											3 hrs
										</span>
                </div>
                <div class="m-list-timeline__item">
                  <span class="m-list-timeline__badge m-list-timeline__badge--state-success"></span>
                  <a href="" class="m-list-timeline__text">
                    Production server up
                  </a>
                  <span class="m-list-timeline__time">
											5 hrs
										</span>
                </div>
                <div class="m-list-timeline__item">
                  <span class="m-list-timeline__badge m-list-timeline__badge--state-info"></span>
                  <a href="" class="m-list-timeline__text">
                    New order received
                  </a>
                  <span class="m-list-timeline__time">
											1117 hrs
										</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end::Quick Sidebar -->
  <!-- begin::Scroll Top -->
  <div class="m-scroll-top m-scroll-top--skin-top" data-toggle="m-scroll-top" data-scroll-offset="500" data-scroll-speed="300">
    <i class="la la-arrow-up"></i>
  </div>
  <!-- end::Scroll Top -->
  <!--begin::Base Scripts -->
  <script src="./metronic/vendors/base/vendors.bundle.js" type="text/javascript"></script>
  <script src="./metronic/demo/default/base/scripts.bundle.js" type="text/javascript"></script>
  <!--end::Base Scripts -->
  <!--begin::Page Snippets -->
  <script src="./metronic/app/js/dashboard.js" type="text/javascript"></script>
  <script src="./bootstrap-confirmation.min.js" type="text/javascript"></script>
  <script src="{{ asset("assets/js/admin-vue.js") }}?v=20200926"></script>
  <!--end::Page Snippets -->
</body>
<!-- end::Body -->
</html>