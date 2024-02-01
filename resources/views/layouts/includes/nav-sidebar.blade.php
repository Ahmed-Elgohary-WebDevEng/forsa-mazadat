<nav class="navbar navbar-expand-lg">
    <div class="container-fluid px-0">
        <a class="navbar-brand m-0" href="#">
            <img src="{{asset('new-template/src/assets/logos/logo.png')}}" alt="logo"/>
        </a>

        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item active">
                <a href="{{ url('/') }}" class="nav-item m-0 p-0">
                    <i class="bx bx-home-alt-2"></i>
                    <span class="small">الرئيسية</span>
                </a>
            </li>

            <li class="nav-item dropdown">
                <div class="nav-item m-0 p-0">
                    <i class="bx bx-location-plus"></i>
                    <span class="small">المناطق</span>
                    <i class="bx bxs-chevron-left left-arrow fs-6"></i>
                </div>

                <ul class="sub-menu dropdown-content">
                    <li><a class="dropdown-item" href="{{ url('/') }}">الكل</a></li>
                    <li class="{{ request()->query('region') === 'makka' ? 'active' : '' }}">
                        <a class="dropdown-item" href="{{ url('/?region=makka') }}">مكة المكرمة</a>
                    </li>
                    <li class="{{ request()->query('region') === 'almadina' ? 'active' : '' }}">
                        <a class="dropdown-item" href="{{ url('/?region=almadina') }}">المدينة المنورة</a>
                    </li>
                    <li class="{{ request()->query('region') === 'riyadh' ? 'active' : '' }}">
                        <a class="dropdown-item" href="{{ url('/?region=riyadh') }}">الرياض</a>
                    </li>
                    <li class="{{ request()->query('region') === 'qassim' ? 'active' : '' }}">
                        <a class="dropdown-item" href="{{ url('/?region=qassim') }}">القصيم</a>
                    </li>
                    <li class="{{ request()->query('region') === 'haael' ? 'active' : '' }}">
                        <a class="dropdown-item" href="{{ url('/?region=haael') }}">حائل</a>
                    </li>
                    <li class="{{ request()->query('region') === 'alsharqia' ? 'active' : '' }}">
                        <a class="dropdown-item" href="{{ url('/?region=alsharqia') }}">المنطقة الشرقية</a>
                    </li>
                    <li class="{{ request()->query('region') === 'aljuof' ? 'active' : '' }}">
                        <a class="dropdown-item" href="{{ url('/?region=aljuof') }}">الجوف</a>
                    </li>
                    <li class="{{ request()->query('region') === 'tabuk' ? 'active' : '' }}">
                        <a class="dropdown-item" href="{{ url('/?region=tabuk') }}">تبوك</a>
                    </li>
                    <li class="{{ request()->query('region') === 'najran' ? 'active' : '' }}">
                        <a class="dropdown-item" href="{{ url('/?region=najran') }}">نجران</a>
                    </li>
                    <li class="{{ request()->query('region') === 'jazan' ? 'active' : '' }}">
                        <a class="dropdown-item" href="{{ url('/?region=jazan') }}">جازان</a>
                    </li>
                    <li class="{{ request()->query('region') === 'albaha' ? 'active' : '' }}">
                        <a class="dropdown-item" href="{{ url('/?region=albaha') }}">الباحة</a>
                    </li>
                    <li class="{{ request()->query('region') === 'shmaleah' ? 'active' : '' }}">
                        <a class="dropdown-item" href="{{ url('/?region=shmaleah') }}">المنطقة الشمالية</a>
                    </li>
                    <li class="{{ request()->query('region') === 'asser' ? 'active' : '' }}">
                        <a class="dropdown-item" href="{{ url('/?region=asser') }}">عسير</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item dropdown">
                <div class="nav-item m-0 p-0">
                    <i class="bx bx-shuffle"></i>
                    <span class="small">نوع المزاد</span>
                    <i class="bx bxs-chevron-left left-arrow fs-6"></i>
                </div>

                <ul class="sub-menu dropdown-content">
                    <li><a class="dropdown-item" href="{{ url('/?type=onsite') }}">حضورى</a></li>
                    <li><a class="dropdown-item" href="{{ url('/?type=online') }}">الكتروني</a></li>
                    <li><a class="dropdown-item" href="{{ url('/?type=mixed') }}">هجين</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-item m-0 p-0">
                    <i class="bx bx-video-plus"></i>
                    <span class="small">بث مباشر</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
