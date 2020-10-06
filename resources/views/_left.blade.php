<!-- Uncomment this to display the close button of the panel
<button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>
-->
<div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">
    <!-- begin:: Aside -->
    <div class="kt-aside__brand kt-grid__item " id="kt_aside_brand">
        <div class="kt-aside__brand-logo">
            <a href="{{ route('home') }}">
                <img alt="Logo" src="/images/logo-light.png" height="80" />
            </a>
        </div>
        <div class="kt-aside__brand-tools">
            <button class="kt-aside__brand-aside-toggler" id="kt_aside_toggler">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <polygon points="0 0 24 0 24 24 0 24" />
                            <path d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z" fill="#000000" fill-rule="nonzero" transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999) " />
                            <path d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999) " />
                        </g>
                    </svg>
                </span>
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <polygon points="0 0 24 0 24 24 0 24" />
                            <path d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z" fill="#000000" fill-rule="nonzero" />
                            <path d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999) " />
                        </g>
                    </svg>
                </span>
            </button>
            <!--
    <button class="kt-aside__brand-aside-toggler kt-aside__brand-aside-toggler--left" id="kt_aside_toggler"><span></span></button>
    -->
        </div>
    </div>

    <!-- end:: Aside -->

    <!-- begin:: Aside Menu -->
    <div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
        <div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1" data-ktmenu-dropdown-timeout="500">
            <ul class="kt-menu__nav ">
                <li class="kt-menu__item {{ request()->routeIs('home') ? "kt-menu__item--active" : "" }}" aria-haspopup="true">
                    <a href="{{ route('home') }}" class="kt-menu__link ">
                        <span class="kt-menu__link-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24" />
                                    <path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" fill="#000000" fill-rule="nonzero" />
                                    <path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" fill="#000000" opacity="0.3" />
                                </g>
                            </svg>
                        </span>
                        <span class="kt-menu__link-text">{{ __('Dashboard') }}</span>
                    </a>
                </li>

                @canany(['adminApp', 'adminFullApp'])
                <li class="kt-menu__item {{ request()->routeIs('translations') ? "kt-menu__item--active" : "" }}" aria-haspopup="true">
                    <a href="{{ route('translations') }}" class="kt-menu__link ">
                        <span class="kt-menu__link-icon">
                            <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-09-15-014444/theme/html/demo1/dist/../src/media/svg/icons/Home/Library.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z" fill="#000000"/>
                                    <rect fill="#000000" opacity="0.3" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519) " x="16.3255682" y="2.94551858" width="3" height="18" rx="1"/>
                                </g>
                            </svg><!--end::Svg Icon--></span>
                        </span>
                        <span class="kt-menu__link-text">{{ __('Translation') }}</span>
                    </a>
                </li>
                @endcanany

                @canany(['adminApp', 'adminFullApp', 'accessAsLandlord', 'accessAsTenant'])
                {{-- Botão Utilizador / User button --}}
                @if(Auth::user()->proprietario)
                <li class="kt-menu__item {{ request()->routeIs('users.*') ? "kt-menu__item--active" : "" }}" aria-haspopup="true">
                    <a href="{{ route('users.profile')}}" class="kt-menu__link">
                        <span class="kt-menu__link-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24"/>
                                    <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                    <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
                                </g>
                            </svg>
                        </span>
                        <span class="kt-menu__link-text">{{ __('My Profile') }}</span>
                    </a>
                </li>
                @endif
                @endcanany




                <li class="kt-menu__section ">
                    <h4 class="kt-menu__section-text">{{ __('General') }}</h4>
                    <i class="kt-menu__section-icon flaticon-more-v2"></i>
                </li>

                @canany(['adminApp', 'adminFullApp', 'view_users'])
                {{-- Botão Utilizador / User button --}}
                <li class="kt-menu__item {{ request()->routeIs('users.*') ? "kt-menu__item--active" : "" }}" aria-haspopup="true">
                    <a href="{{ route('users.index') }}" class="kt-menu__link">
                        <span class="kt-menu__link-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24"/>
                                    <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                    <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
                                </g>
                            </svg>
                        </span>
                        <span class="kt-menu__link-text">{{ __('Users') }}</span>
                    </a>
                </li>

                @endcanany

                @canany(['adminApp', 'accessAsLandlord'])

                        <li class="kt-menu__item  kt-menu__item--submenu {{ request()->routeIs('inquilino.*') ? "kt-menu__item--open" : "" }}" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                            <a href="{{ route('inquilinos.index') }}" class="kt-menu__link kt-menu__toggle">
                                <span class="kt-menu__link-icon">
                                    <!--begin::Svg Icon | path:/home/keenthemes/www/metronic/themes/metronic/theme/html/demo1/dist/../src/media/svg/icons/General/User.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24"/>
                                            <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                            <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
                                        </g>
                                    </svg><!--end::Svg Icon-->
                                </span>
                                <span class="kt-menu__link-text">{{ __('Tenant') }}</span>
                                <i class="kt-menu__ver-arrow la la-angle-right"></i>
                            </a>
                            <div class="kt-menu__submenu ">
                                <span class="kt-menu__arrow"></span>
                                <ul class="kt-menu__subnav">
                                    <li class="kt-menu__item kt-menu__item--parent" aria-haspopup="true">
                                        <span class="kt-menu__link">
                                            <span class="kt-menu__link-text">{{ __('Tenant') }}</span>
                                        </span>
                                    </li>
                                    <li class="kt-menu__item {{ request()->routeIs('inquilinos.index') ? "kt-menu__item--active" : "" }}" aria-haspopup="true">
                                        <a href="{{ route('inquilinos.index') }}" class="kt-menu__link">
                                            <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                            <span class="kt-menu__link-text">{{ __('List tenant') }}</span>
                                        </a>
                                    </li>

                                    <li class="kt-menu__item {{ request()->routeIs('inquilinos.create') ? "kt-menu__item--active" : "" }}" aria-haspopup="true">
                                        <a href="{{ route('inquilinos.create') }}" class="kt-menu__link ">
                                            <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                            <span class="kt-menu__link-text">{{ __('Create Tenant') }}</span>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </li>
                        @endcanany




                        @canany(['adminApp', 'accessAsTenant'])
                {{-- Botão Proprietários / Tenant button --}}

                <li class="kt-menu__item  kt-menu__item--submenu {{ request()->routeIs('proprietario.*') ? "kt-menu__item--open" : "" }}" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                    <a href="{{ route('proprietarios.index') }}" class="kt-menu__link kt-menu__toggle">
                        <span class="kt-menu__link-icon">
                            <!--begin::Svg Icon | path:/home/keenthemes/www/metronic/themes/metronic/theme/html/demo1/dist/../src/media/svg/icons/General/User.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24"/>
                                    <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                    <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
                                </g>
                            </svg><!--end::Svg Icon-->
                        </span>
                        <span class="kt-menu__link-text">{{ __('Landlord') }}</span>
                        <i class="kt-menu__ver-arrow la la-angle-right"></i>
                    </a>

                    <div class="kt-menu__submenu ">
                        <span class="kt-menu__arrow"></span>
                        <ul class="kt-menu__subnav">
                            <li class="kt-menu__item kt-menu__item--parent" aria-haspopup="true">
                                <span class="kt-menu__link">
                                    <span class="kt-menu__link-text">{{ __('Landlord') }}</span>
                                </span>
                            </li>


                            <li class="kt-menu__item {{ request()->routeIs('proprietarios.index') ? "kt-menu__item--active" : "" }}" aria-haspopup="true">
                                <a href="{{ route('proprietarios.index') }}" class="kt-menu__link">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text">{{ __('List landlord') }}</span>
                                </a>
                            </li>

                            @can('adminApp')
                            <li class="kt-menu__item {{ request()->routeIs('proprietarios.create') ? "kt-menu__item--active" : "" }}" aria-haspopup="true">
                                <a href="{{ route('proprietarios.create') }}" class="kt-menu__link ">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text">{{ __('Create landlord') }}</span>
                                </a>
                            </li>
                            @endcan
                        </ul>
                    </div>
                </li>
                @endcanany

                {{-- Botão Fiador / Tenant button --}}
                <li class="kt-menu__item  kt-menu__item--submenu {{ request()->routeIs('fiador.*') ? "kt-menu__item--open" : "" }}" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                    <a href="{{ route('fiador.index') }}" class="kt-menu__link kt-menu__toggle">
                        <span class="kt-menu__link-icon">
                            <!--begin::Svg Icon | path:/home/keenthemes/www/metronic/themes/metronic/theme/html/demo1/dist/../src/media/svg/icons/General/User.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24"/>
                                    <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                    <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
                                </g>
                            </svg><!--end::Svg Icon-->
                        </span>
                        <span class="kt-menu__link-text">{{ __('Guarantor') }}</span>
                        <i class="kt-menu__ver-arrow la la-angle-right"></i>
                    </a>
                    <div class="kt-menu__submenu ">
                        <span class="kt-menu__arrow"></span>
                        <ul class="kt-menu__subnav">
                            <li class="kt-menu__item kt-menu__item--parent" aria-haspopup="true">
                                <span class="kt-menu__link">
                                    <span class="kt-menu__link-text">{{ __('Guarantor') }}</span>
                                </span>
                            </li>
                            @canany(['adminApp', 'accessAsTenant', 'accessAsLandlord'])
                            <li class="kt-menu__item {{ request()->routeIs('fiador.index') ? "kt-menu__item--active" : "" }}" aria-haspopup="true">
                                <a href="{{ route('fiador.index') }}" class="kt-menu__link">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text">{{ __('List Guarantor') }}</span>
                                </a>
                            </li>
                            @endcanany
                            @canany(['adminApp', 'accessAsTenant', 'accessAsLandlord'])
                            <li class="kt-menu__item {{ request()->routeIs('fiador.create') ? "kt-menu__item--active" : "" }}" aria-haspopup="true">
                                <a href="{{ route('fiador.create') }}" class="kt-menu__link ">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text">{{ __('Create Guarantor') }}</span>
                                </a>
                            </li>
                            @endcanany
                        </ul>
                    </div>
                </li>

                @canany(['adminApp', 'adminFullApp', 'accessAsTenant', 'accessAsLandlord'])

                <li class="kt-menu__section ">
                    <h4 class="kt-menu__section-text">{{ __('Pages') }}</h4>
                    <i class="kt-menu__section-icon flaticon-more-v2"></i>
                </li>
                @endcanany

                {{-- Botão Imovéis / Properties button --}}
                @canany(['adminApp', 'adminFullApp', 'accessAsLandlord', 'accessAsTenant'])
                <li class="kt-menu__item  kt-menu__item--submenu {{ request()->routeIs('imoveis.*') ? "kt-menu__item--open" : "" }}" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                    <a href="{{ route('imoveis.index') }}" class="kt-menu__link kt-menu__toggle">
                        <span class="kt-menu__link-icon"><!--begin::Svg Icon | path:/var/www/metronic/themes/metronic/theme/html/demo2/dist/../src/media/svg/icons/Home/Bed.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <path d="M4,22 L2,22 C2,19.2385763 4.23857625,18 7,18 L17,18 C19.7614237,18 22,19.2385763 22,22 L20,22 C20,20.3431458 18.6568542,20 17,20 L7,20 C5.34314575,20 4,20.3431458 4,22 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                <rect fill="#000000" x="1" y="14" width="22" height="6" rx="1"/>
                                <path d="M13,13 L11,13 L11,12 C11,11.4477153 10.5522847,11 10,11 L6,11 C5.44771525,11 5,11.4477153 5,12 L5,13 L4,13 C3.44771525,13 3,12.5522847 3,12 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12 C21,12.5522847 20.5522847,13 20,13 L19,13 L19,12 C19,11.4477153 18.5522847,11 18,11 L14,11 C13.4477153,11 13,11.4477153 13,12 L13,13 Z" fill="#000000" opacity="0.3"/>
                            </g>
                        </svg><!--end::Svg Icon--></span>
                        <span class="kt-menu__link-text">{{ __('Property') }}</span>
                        <i class="kt-menu__ver-arrow la la-angle-right"></i>
                    </a>
                    <div class="kt-menu__submenu ">
                        <span class="kt-menu__arrow"></span>
                        <ul class="kt-menu__subnav">
                            <li class="kt-menu__item kt-menu__item--parent" aria-haspopup="true">
                                <span class="kt-menu__link">
                                    <span class="kt-menu__link-text">{{ __('Property') }}</span>
                                </span>
                            </li>
                            <li class="kt-menu__item {{ request()->routeIs('imoveis.index') ? "kt-menu__item--active" : "" }}" aria-haspopup="true">
                                <a href="{{ route('imoveis.index') }}" class="kt-menu__link">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text">{{ __('List Properties') }}</span>
                                </a>
                            </li>
                            @canany(['adminApp', 'adminFullApp', 'accessAsLandlord'])
                            <li class="kt-menu__item {{ request()->routeIs('imoveis.create') ? "kt-menu__item--active" : "" }}" aria-haspopup="true">
                                <a href="{{ route('imoveis.create') }}" class="kt-menu__link ">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text">{{ __('Create Property') }}</span>
                                </a>
                            </li>
                            @endcanany
                        </ul>
                    </div>
                </li>
                @endcanany





                @canany(['adminApp', 'adminFullApp', 'accessAsLandlord', 'accessAsTenant'])
                <li class="kt-menu__item  kt-menu__item--submenu {{ request()->routeIs('contratos.*') ? "kt-menu__item--open" : "" }}" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                    <a href="{{ route('contratos.index') }}" class="kt-menu__link kt-menu__toggle">
                        <span class="kt-menu__link-icon">
                            <!--begin::Svg Icon | path:/home/keenthemes/www/metronic/themes/metronic/theme/html/demo1/dist/../src/media/svg/icons/General/Clipboard.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <path d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z" fill="#000000" opacity="0.3"/>
                                <path d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z" fill="#000000"/>
                                <rect fill="#000000" opacity="0.3" x="7" y="10" width="5" height="2" rx="1"/>
                                <rect fill="#000000" opacity="0.3" x="7" y="14" width="9" height="2" rx="1"/>
                            </g>
                        </svg><!--end::Svg Icon--></span>
                        <span class="kt-menu__link-text">{{ __('Contract') }}</span>
                        <i class="kt-menu__ver-arrow la la-angle-right"></i>
                    </a>
                    <div class="kt-menu__submenu ">
                        <span class="kt-menu__arrow"></span>
                        <ul class="kt-menu__subnav">
                            <li class="kt-menu__item kt-menu__item--parent" aria-haspopup="true">
                                <span class="kt-menu__link">
                                    <span class="kt-menu__link-text">{{ __('Contract') }}</span>
                                </span>
                            </li>

                            <li class="kt-menu__item {{ request()->routeIs('contratos.index') ? "kt-menu__item--active" : "" }}" aria-haspopup="true">
                                <a href="{{ route('contratos.index') }}" class="kt-menu__link">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text">{{ __('List contracts') }}</span>
                                </a>
                            </li>
                            @canany(['adminApp', 'adminFullApp', 'accessAsLandlord'])
                            <li class="kt-menu__item {{ request()->routeIs('contratos.create') ? "kt-menu__item--active" : "" }}" aria-haspopup="true">
                                <a href="{{ route('contratos.create') }}" class="kt-menu__link ">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text">{{ __('Create contracts') }}</span>
                                </a>
                            </li>
                            @endcanany
                        </ul>
                    </div>
                </li>
                @endcanany

                @canany(['adminApp', 'adminFullApp', 'accessAsLandlord', 'accessAsTenant'])
                <li class="kt-menu__item  kt-menu__item--submenu {{ request()->routeIs('rendas.*') ? "kt-menu__item--open" : "" }}" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                    <a href="{{ route('rendas.index') }}" class="kt-menu__link kt-menu__toggle">
                        <span class="kt-menu__link-icon"><!--begin::Svg Icon | path:/home/keenthemes/www/metronic/themes/metronic/theme/html/demo2/dist/../src/media/svg/icons/Shopping/Credit-card.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <rect fill="#000000" opacity="0.3" x="2" y="5" width="20" height="14" rx="2"/>
                                <rect fill="#000000" x="2" y="8" width="20" height="3"/>
                                <rect fill="#000000" opacity="0.3" x="16" y="14" width="4" height="2" rx="1"/>
                            </g>
                        </svg><!--end::Svg Icon--></span>
                        <span class="kt-menu__link-text">{{ __('Incomes Payment') }}</span>
                        <i class="kt-menu__ver-arrow la la-angle-right"></i>
                    </a>
                    <div class="kt-menu__submenu ">
                        <span class="kt-menu__arrow"></span>
                        <ul class="kt-menu__subnav">
                            <li class="kt-menu__item kt-menu__item--parent" aria-haspopup="true">
                                <span class="kt-menu__link">
                                    <span class="kt-menu__link-text">{{ __('Incomes Payment') }}</span>
                                </span>
                            </li>
                            @canany(['accessAsTenant', 'accessAsLandlord', 'adminApp', 'adminFullApp'])
                            <li class="kt-menu__item {{ request()->routeIs('rendas.index') ? "kt-menu__item--active" : "" }}" aria-haspopup="true">
                                <a href="{{ route('rendas.index') }}" class="kt-menu__link">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text">{{ __('List Incomes Payment') }}</span>
                                </a>
                            </li>
                            @endcanany
                            @canany(['adminApp', 'adminFullApp', 'accessAsLandlord'])
                            <li class="kt-menu__item {{ request()->routeIs('rendas.create') ? "kt-menu__item--active" : "" }}" aria-haspopup="true">
                                <a href="{{ route('rendas.create') }}" class="kt-menu__link ">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text">{{ __('Create Incomes Payment') }}</span>
                                </a>
                            </li>
                            @endcanany
                        </ul>
                    </div>
                </li>
                @endcanany

                @can('adminFullApp')

                <li class="kt-menu__section ">
                    <h4 class="kt-menu__section-text">{{ __('Configurations') }}</h4>
                    <i class="kt-menu__section-icon flaticon-more-v2"></i>
                </li>



                <li class="kt-menu__item  kt-menu__item--submenu {{ request()->routeIs('roles.*') ? "kt-menu__item--open" : "" }}" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                    <a href="{{ route('roles.index') }}" class="kt-menu__link kt-menu__toggle">
                        <span class="kt-menu__link-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <mask fill="white">
                                        <use xlink:href="#path-1"/>
                                    </mask>
                                    <g/>
                                    <path d="M15.6274517,4.55882251 L14.4693753,6.2959371 C13.9280401,5.51296885 13.0239252,5 12,5 C10.3431458,5 9,6.34314575 9,8 L9,10 L14,10 L17,10 L18,10 C19.1045695,10 20,10.8954305 20,12 L20,18 C20,19.1045695 19.1045695,20 18,20 L6,20 C4.8954305,20 4,19.1045695 4,18 L4,12 C4,10.8954305 4.8954305,10 6,10 L7,10 L7,8 C7,5.23857625 9.23857625,3 12,3 C13.4280904,3 14.7163444,3.59871093 15.6274517,4.55882251 Z" fill="#000000"/>
                                </g>
                            </svg>
                        </span>
                        <span class="kt-menu__link-text">{{ __('Roles') }}</span>
                        <i class="kt-menu__ver-arrow la la-angle-right"></i>
                    </a>
                    <div class="kt-menu__submenu ">
                        <span class="kt-menu__arrow"></span>
                        <ul class="kt-menu__subnav">
                            <li class="kt-menu__item kt-menu__item--parent" aria-haspopup="true">
                                <span class="kt-menu__link">
                                    <span class="kt-menu__link-text">{{ __('Roles') }}</span>
                                </span>
                            </li>
                            <li class="kt-menu__item {{ request()->routeIs('roles.index') ? "kt-menu__item--active" : "" }}" aria-haspopup="true">
                                <a href="{{ route('roles.index') }}" class="kt-menu__link">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text">{{ __('List roles') }}</span>
                                </a>
                            </li>
                            <li class="kt-menu__item {{ request()->routeIs('roles.create') ? "kt-menu__item--active" : "" }}" aria-haspopup="true">
                                <a href="{{ route('roles.create') }}" class="kt-menu__link ">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text">{{ __('Create role') }}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                @endcan

                @can('adminFullApp')
                    <li class="kt-menu__item  kt-menu__item--submenu {{ request()->routeIs('settings.*') ? "kt-menu__item--open" : "" }}" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                        <a href="{{ route('settings.index') }}" class="kt-menu__link kt-menu__toggle">
                        <span class="kt-menu__link-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect opacity="0.200000003" x="0" y="0" width="24" height="24"/>
                                    <path d="M4.5,7 L9.5,7 C10.3284271,7 11,7.67157288 11,8.5 C11,9.32842712 10.3284271,10 9.5,10 L4.5,10 C3.67157288,10 3,9.32842712 3,8.5 C3,7.67157288 3.67157288,7 4.5,7 Z M13.5,15 L18.5,15 C19.3284271,15 20,15.6715729 20,16.5 C20,17.3284271 19.3284271,18 18.5,18 L13.5,18 C12.6715729,18 12,17.3284271 12,16.5 C12,15.6715729 12.6715729,15 13.5,15 Z" fill="#000000" opacity="0.3"/>
                                    <path d="M17,11 C15.3431458,11 14,9.65685425 14,8 C14,6.34314575 15.3431458,5 17,5 C18.6568542,5 20,6.34314575 20,8 C20,9.65685425 18.6568542,11 17,11 Z M6,19 C4.34314575,19 3,17.6568542 3,16 C3,14.3431458 4.34314575,13 6,13 C7.65685425,13 9,14.3431458 9,16 C9,17.6568542 7.65685425,19 6,19 Z" fill="#000000"/>
                                </g>
                            </svg>
                        </span>
                            <span class="kt-menu__link-text">{{ __('Settings') }}</span>
                            <i class="kt-menu__ver-arrow la la-angle-right"></i>
                        </a>
                        <div class="kt-menu__submenu ">
                            <span class="kt-menu__arrow"></span>
                            <ul class="kt-menu__subnav">
                                <li class="kt-menu__item kt-menu__item--parent" aria-haspopup="true">
                                <span class="kt-menu__link">
                                    <span class="kt-menu__link-text">{{ __('Settings') }}</span>
                                </span>
                                </li>
                                <li class="kt-menu__item {{ request()->routeIs('settings.index') ? "kt-menu__item--active" : "" }}" aria-haspopup="true">
                                    <a href="{{ route('settings.index') }}" class="kt-menu__link">
                                        <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                        <span class="kt-menu__link-text">{{ __('List settings') }}</span>
                                    </a>
                                </li>
                                <li class="kt-menu__item {{ request()->routeIs('settings.create') ? "kt-menu__item--active" : "" }}" aria-haspopup="true">
                                    <a href="{{ route('settings.create') }}" class="kt-menu__link ">
                                        <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                        <span class="kt-menu__link-text">{{ __('Create setting') }}</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endcan

            </ul>
        </div>
    </div>

    <!-- end:: Aside Menu -->
</div>
