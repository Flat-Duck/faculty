<div class="navbar-expand-md">
    <div class="collapse navbar-collapse" id="navbar-menu">
        <div class="navbar navbar-light">
            <div class="container-xl">
                <ul class="navbar-nav">
                    
                    <li class="nav-item  {{ $page == 'dashboard'? 'active':''  }}">
                        <a class="nav-link" href="{{ route('admin.dashboard') }}" >
                            <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="5 12 3 12 12 3 21 12 19 12" /><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" /><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /></svg>
                            </span>
                            <span class="nav-link-title">
                                {{ __('Dashboard') }}
                            </span>
                        </a>
                    </li>

                    <li class="nav-item {{ $page == 'admins'? 'active':''  }}">
                        <a class="nav-link" href="{{ route('admin.admins.index') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <i class="ti ti-users" ></i>
                            </span>
                            <span class="nav-link-title">
                                {{ __('المستخديمين') }}
                            </span>
                        </a>
                    </li>

                    <li class="nav-item {{ $page == 'department'? 'active':''  }}">
                        <a class="nav-link" href="{{ route('admin.departments.index') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <i class="ti ti-building"></i>
                            </span>
                            <span class="nav-link-title">
                                {{ __('الاقسام') }}
                            </span>
                        </a>
                    </li>

                    <li class="nav-item {{ $page == 'specialization'? 'active':''  }}">
                        <a class="nav-link" href="{{ route('admin.specializations.index') }}" >
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <i class="ti ti-star-filled" ></i>
                            </span>
                            <span class="nav-link-title">
                                {{ __('التخصصات') }}
                            </span>
                        </a>
                    </li>
                    <li class="nav-item {{ $page == 'members'? 'active':''  }}">
                        <a class="nav-link" href="{{ route('admin.members.index') }}" >
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <i class="ti ti-address-book"></i>
                            </span>
                            <span class="nav-link-title">
                                {{ __('أعضاء هئية التدريس') }}
                            </span>
                        </a>
                    </li>
                    <li class="nav-item {{ $page == 'profiles'? 'active':''  }}">
                        <a class="nav-link" href="{{ route('admin.profiles.index') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <i class="ti ti-folders"></i>
                            </span>
                            <span class="nav-link-title">
                                {{ __('الملفات') }}
                            </span>
                        </a>
                    </li>
                    <li class="nav-item {{ $page == 'archive'? 'active':''  }}">
                        <a class="nav-link" href="{{ route('admin.members.archive') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <i class="ti ti-archive"></i>
                            </span>
                            <span class="nav-link-title">
                                {{ __('الارشيف') }}
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>