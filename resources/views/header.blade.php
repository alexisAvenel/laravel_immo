<header data-coreui-theme="dark">
    <div class="collapse text-bg-dark" id="navbarHeader">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-md-7 py-4">
                    <h4>About</h4>
                    <p class="text-body-secondary">Add some information about the album below, the author, or any other
                        background context. Make it a few sentences long so folks can pick up some informative tidbits.
                        Then, link them off to some social networking sites or contact information.</p>
                </div>
                <div class="col-sm-4 offset-md-1 py-4">
                    <h4>Contact</h4>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white">Follow on Twitter</a></li>
                        <li><a href="#" class="text-white">Like on Facebook</a></li>
                        <li><a href="#" class="text-white">Email me</a></li>
                    </ul>
                    @if (Route::has('login'))
                        <h4>Admin</h4>
                        <nav class="-mx-3 flex flex-1 justify-end">
                            @auth
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="{{ route('admin.dashboard') }}"
                                           class="rounded-md text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                        >
                                            Dashboard
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                           class="rounded-md text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                        >
                                            Déconnexion
                                        </a>
                                    </li>
                                </ul>

                            @else
                                <a href="{{ route('login') }}"
                                   class="rounded-md text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                >
                                    Connexion
                                </a>
                            @endauth
                        </nav>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a href="#" class="navbar-brand d-flex align-items-center">
                <img class="img-fluid"
                     src="{{Storage::disk('public')->url('/images/logo.svg')}}"
                     width="300"
                     alt="logo">
            </a>
            <button class="navbar-toggler"
                    type="button"
                    data-coreui-toggle="collapse"
                    data-coreui-target="#navbarHeader"
                    aria-controls="navbarHeader"
                    aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
</header>
