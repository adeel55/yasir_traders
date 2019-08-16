
        <!-- Header-->
        <header id="header" class="header d-print-none">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa-chevron-left"></i></a>
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-sm-5">
                    <form action="{{ route('logout') }}" method="post">
                        <button type="submit" class="btn btn-sm btn-outline-danger float-right mx-1">
                            <i class="fa fa-power-off mt-1" style="font-size: 1.2rem"></i>
                        </button>
                        @csrf
                    </form>
                    @if(Auth::user()->admin)
                    <a href="/user/{{ Auth::user()->id }}/edit" class="btn btn-sm btn-outline-success float-right mx-1" title="Admin profile settings"><i class="fa fa-user-cog mt-1" style="font-size: 1.2rem"></i></a>
                    <a href="/user/2/edit" class="btn btn-sm btn-outline-primary float-right" title="Operator profile settings"><i class="fa fa-user mt-1" style="font-size: 1.2rem"></i></a>
                    @endif
                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->
