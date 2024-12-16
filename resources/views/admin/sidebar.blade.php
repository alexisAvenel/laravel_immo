<div class="custom-sidebar border-dark-subtle border-right col-md-3 col-lg-2 p-0 bg-dark shadow">
    <div class="offcanvas-md offcanvas-end bg-dark" tabindex="-1" id="sidebarMenu"
         aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
            <img class="offcanvas-title img-fluid"
                 id="sidebarMenuLabel"
                 src="{{Storage::disk('public')->url('/images/logo.svg')}}"
                 alt="logo">
            <button type="button" class="btn-close" data-coreui-dismiss="offcanvas"
                    data-coreui-target="#sidebarMenu" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a @class([
                        'nav-link',
                        'd-flex',
                        'align-items-center',
                        'gap-2',
                        'active' => request()->routeIs('admin.dashboard')
                        ])
                       aria-current="page"
                       href="{{route('admin.dashboard')}}">
                        <i class="bi bi-speedometer"></i>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a @class([
                        'nav-link',
                        'd-flex',
                        'align-items-center',
                        'gap-2',
                        'active' => request()->routeIs('admin.properties.*')
                        ])
                       href="{{route('admin.properties.list')}}">
                        <i class="bi bi-houses"></i>
                        Biens
                    </a>
                </li>
                <li class="nav-item">
                    <a @class([
                        'nav-link',
                        'd-flex',
                        'align-items-center',
                        'gap-2',
                        'active' => request()->routeIs('admin.options.*')
                        ])
                       href="{{route('admin.options.list')}}">
                        <i class="bi bi-sliders"></i>
                        Options
                    </a>
                </li>
            </ul>

            <hr class="border-light my-3">

            <ul class="nav flex-column mb-auto">
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2"
                       href="{{route('admin.logout')}}">
                        <i class="bi bi-door-closed"></i>
                        Déconnexion
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
