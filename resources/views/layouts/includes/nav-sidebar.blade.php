@php use App\Models\Auctions; @endphp
@php
    $regions = Auctions::select('Region')->distinct()->get();
@endphp

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
                        <a class="dropdown-item" href="/?region=makka&{{ http_build_query(request()->except('region', 'page')) }}">مكة
                            المكرمة</a>
                    </li>
                    <li class="{{ request()->query('region') === 'almadina' ? 'active' : '' }}">
                        <a class="dropdown-item" href="/?region=almadina&{{ http_build_query(request()->except('region', 'page')) }}">المدينة
                            المنورة</a>
                    </li>
                    <li class="{{ request()->query('region') === 'riyadh' ? 'active' : '' }}">
                        <a class="dropdown-item" href="/?region=riyadh&{{ http_build_query(request()->except('region', 'page')) }}">الرياض</a>
                    </li>
                    <li class="{{ request()->query('region') === 'qassim' ? 'active' : '' }}">
                        <a class="dropdown-item" href="/?region=qassim&{{ http_build_query(request()->except('region', 'page')) }}">القصيم</a>
                    </li>
                    <li class="{{ request()->query('region') === 'haael' ? 'active' : '' }}">
                        <a class="dropdown-item" href="/?region=haael&{{ http_build_query(request()->except('region', 'page')) }}">حائل</a>
                    </li>
                    <li class="{{ request()->query('region') === 'alsharqia' ? 'active' : '' }}">
                        <a class="dropdown-item" href="/?region=alsharqia&{{ http_build_query(request()->except('region', 'page')) }}">المنطقة
                            الشرقية</a>
                    </li>
                    <li class="{{ request()->query('region') === 'aljuof' ? 'active' : '' }}">
                        <a class="dropdown-item" href="/?region=aljuof&{{ http_build_query(request()->except('region', 'page')) }}">الجوف</a>
                    </li>
                    <li class="{{ request()->query('region') === 'tabuk' ? 'active' : '' }}">
                        <a class="dropdown-item" href="/?region=tabuk&{{ http_build_query(request()->except('region', 'page')) }}">تبوك</a>
                    </li>
                    <li class="{{ request()->query('region') === 'najran' ? 'active' : '' }}">
                        <a class="dropdown-item" href="/?region=najran&{{ http_build_query(request()->except('region', 'page')) }}">نجران</a>
                    </li>
                    <li class="{{ request()->query('region') === 'jazan' ? 'active' : '' }}">
                        <a class="dropdown-item" href="/?region=jazan&{{ http_build_query(request()->except('region', 'page')) }}">جازان</a>
                    </li>
                    <li class="{{ request()->query('region') === 'albaha' ? 'active' : '' }}">
                        <a class="dropdown-item" href="/?region=albaha&{{ http_build_query(request()->except('region', 'page')) }}">الباحة</a>
                    </li>
                    <li class="{{ request()->query('region') === 'shmaleah' ? 'active' : '' }}">
                        <a class="dropdown-item" href="/?region=shmaleah&{{ http_build_query(request()->except('region', 'page')) }}">المنطقة
                            الشمالية</a>
                    </li>
                    <li class="{{ request()->query('region') === 'asser' ? 'active' : '' }}">
                        <a class="dropdown-item" href="/?region=asser&{{ http_build_query(request()->except('region', 'page')) }}">عسير</a>
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
                    <li class="{{ request()->query('type') === 'onsite' ? 'active' : '' }}">
                        <a class="dropdown-item" href="/?type=onsite&{{ http_build_query(request()->except('type', 'page')) }}">حضورى</a>
                    </li>
                    <li class="{{ request()->query('type') === 'online' ? 'active' : '' }}">
                        <a class="dropdown-item" href="/?type=online&{{ http_build_query(request()->except('type', 'page')) }}">الكتروني</a>
                    </li>
                    <li class="{{ request()->query('type') === 'mixed' ? 'active' : '' }}">
                        <a class="dropdown-item" href="/?type=mixed&{{ http_build_query(request()->except('type', 'page')) }}">هجين</a>
                    </li>
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
