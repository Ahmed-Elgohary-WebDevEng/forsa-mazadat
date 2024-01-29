 
  <nav class="navbar bg-secondary navbar-light fixed-top  navbar-expand-xl fixed-top shadow-sm" dir="rtl" id="mainNav">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{url('/index') }}"><img src="{{asset('img/logo.png')}}" width="100px"
          height="auto"></a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">

    <!-- <span class="navbar-toggler-icon"></span> -->
		  <img src="{{asset('img/iconss.png')}}">
      </button>

      <div class="collapse navbar-collapse droid-arabic-kufi  " id="navbarSupportedContent">

        <ul class="navbar-nav mx-right text-center d-flex justify-content-end ">

          <li class="nav-item">
            <a href="{{url('/index') }}" class="nav-item nav-link mt-1 mx-2" >الرئيسية</a>
          </li>
			 <li class="nav-item">
            <a href="{{url('/terms') }}" class="nav-item nav-link mt-1 mx-2" >شروط السياسات والخصوصية</a>
          </li>
  {{-- <li class="nav-item">
            <a href="{{url('/region') }}" class="nav-item nav-link border border-primary mx-2">نوع المزاد</a>
          </li>

          <li class="nav-item">
            <a href="{{url('/region') }}" class="nav-item nav-link border border-primary mx-2">المناطق</a>
          </li>
 --}}

 
      {{--      <li class="nav-item dropdown">
            <a class="nav-item nav-link dropdown-toggle" data-bs-toggle='dropdown' id="navbarDropdown"
              role="button" aria-expanded="false" style="text-decoration: none; color:white">المناطق</a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="{{url('/region') }}" value="all">الكل </a></li> 
              <li><a class="dropdown-item" href="{{ url('regioncontent/'.$auctions->Region ='riyadh') }}" value="riyadh">الرياض </a></li>
              <li><a class="dropdown-item" href="{{ url('regioncontent/'.$auctions->Region ='makka') }}" value="makka">مكة المكرمة </a></li>
              <li><a class="dropdown-item" href="{{ url('regioncontent/'.$auctions->Region ='almadina')}}" value="almadina">المدينة المنورة </a></li>
              <li><a class="dropdown-item" href="{{ url('regioncontent/'.$auctions->Region ='alsharqia') }}" value="alsharqia">المنظقة الشرقية </a></li>
              <li><a class="dropdown-item" href="{{ url('regioncontent/'.$auctions->Region ='aljuof') }}" value="aljuof">الجوف </a></li>
              <li><a class="dropdown-item" href="{{ url('regioncontent/'.$auctions->Region ='tabuk') }}" value="tabuk">تبوك </a></li>
              <li><a class="dropdown-item" href="{{ url('regioncontent/'.$auctions->Region ='haael') }}" value="haael">حائل </a></li>
              <li><a class="dropdown-item" href="{{ url('regioncontent/'.$auctions->Region ='qassim') }}" value="qassim">القصيم </a></li>
              <li><a class="dropdown-item" href="{{ url('regioncontent/'.$auctions->Region ='najran') }}" value="najran">نجران </a></li>
              <li><a class="dropdown-item" href="{{ url('regioncontent/'.$auctions->Region ='jazan') }}" value="jazan">جازان </a></li>
              <li><a class="dropdown-item" href="{{ url('regioncontent/'.$auctions->Region ='albaha') }}" value="albaha">الباحة </a></li>
              <li><a class="dropdown-item" href="{{ url('regioncontent/'.$auctions->Region ='shmaleah') }}" value="shmaleah">المنطقة الشمالية </a></li>
              <li><a class="dropdown-item" href="{{ url('regioncontent/'.$auctions->Region ='asser') }}" value="asser">عسير </a></li> 

             </ul>
          </li>  --}}



          <li class="nav-item dropdown">

            <select  name="viewsitePlace"  id="viewsitePlace" class="viewsitePlace nav-item dropdown-toggle nav-link  " style="text-decoration: none; color:white" onchange="change('viewsitePlace')">
            
              <option  selected disabled>المناطق</option>
              <option  class="dropdown-item" style="text-decoration: none; color:rgb(7, 7, 7)" data-url="{{ url('/Auctions') }}" > الكل </option>
              <option  class="dropdown-item" style="text-decoration: none; color:rgb(7, 7, 7)" data-url="{{ url('regioncontent/'.$auctions->Region ='makka') }}"  >مكة المكرمة </option>
              <option  class="dropdown-item" style="text-decoration: none; color:rgb(0, 0, 0)" data-url="{{ url('regioncontent/'.$auctions->Region ='almadina')}}">المدينة المنورة </option>
              <option  class="dropdown-item" style="text-decoration: none; color:rgb(0, 0, 0)" data-url="{{ url('regioncontent/'.$auctions->Region ='riyadh') }}">الرياض </option>
              <option  class="dropdown-item" style="text-decoration: none; color:rgb(0, 0, 0)" data-url="{{ url('regioncontent/'.$auctions->Region ='qassim') }}">القصيم </option>
              <option  class="dropdown-item" style="text-decoration: none; color:rgb(0, 0, 0)" data-url="{{ url('regioncontent/'.$auctions->Region ='haael') }}">حائل </option>
              <option  class="dropdown-item" style="text-decoration: none; color:rgb(0, 0, 0)" data-url="{{ url('regioncontent/'.$auctions->Region ='alsharqia') }}" >المنطقة الشرقية</option>
              <option  class="dropdown-item" style="text-decoration: none; color:rgb(0, 0, 0)" data-url="{{ url('regioncontent/'.$auctions->Region ='aljuof') }}">الجوف </option>
              <option  class="dropdown-item" style="text-decoration: none; color:rgb(0, 0, 0)" data-url="{{ url('regioncontent/'.$auctions->Region ='tabuk') }}" >تبوك </option>
              <option  class="dropdown-item" style="text-decoration: none; color:rgb(0, 0, 0)" data-url="{{ url('regioncontent/'.$auctions->Region ='najran') }}">نجران </option>
              <option  class="dropdown-item" style="text-decoration: none; color:rgb(0, 0, 0)" data-url="{{ url('regioncontent/'.$auctions->Region ='jazan') }}">جازان </option>
              <option  class="dropdown-item" style="text-decoration: none; color:rgb(0, 0, 0)" data-url="{{ url('regioncontent/'.$auctions->Region ='albaha') }}">الباحة </option>
              <option  class="dropdown-item" style="text-decoration: none; color:rgb(0, 0, 0)" data-url="{{ url('regioncontent/'.$auctions->Region ='shmaleah') }}" >المنطقة الشمالية </option>
              <option  class="dropdown-item" style="text-decoration: none; color:rgb(0, 0, 0)" data-url="{{ url('regioncontent/'.$auctions->Region ='asser') }}" >عسير </option>

            </select>
          </li>



      {{--      <li class="nav-item dropdown" class="mt-3">
            <a class="nav-item dropdown-toggle nav-link" data-bs-toggle="dropdown" href="/type" id="navbarDropdown"
              role="button" aria-expanded="false" style="text-decoration: none; color:white">نوع المزاد </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="{{ url('/type') }}">الكل</a></li>
              <li><a class="dropdown-item" href="{{ url('typecontent/'.$auctions->type ='onsite') }}">حضوري</a></li>
              <li><a class="dropdown-item" href="{{ url('typecontent/'.$auctions->type ='online') }}">عن بعد</a></li>

          </li> 
   


          
        </ul> --}}


  {{--       <li class="nav-item dropdown">

        <select class="viewsiteType nav-item dropdown-toggle nav-link " style="text-decoration: none; color:white;" onchange="change('viewsiteType')">

          <option  selected disabled >نوع المزاد</option> --}}

          <li class="nav-item dropdown">

            <select  name="viewsitePlace"  id="viewsitePlace" class="viewsiteType nav-item dropdown-toggle nav-link  " style="text-decoration: none; color:white" onchange="change('viewsiteType')">

              <option  selected disabled>نوع المزاد</option>

          <option  class="dropdown-item" style="text-decoration: none; color:rgb(7, 7, 7)" value="{{ url('typecontent/'.$auctions->type ='onsite') }}">حضوري</option>
          <option  class="dropdown-item" style="text-decoration: none; color:rgb(0, 0, 0)" value="{{ url('typecontent/'.$auctions->type ='online') }}">إلكتروني </option>
          <option  class="dropdown-item" style="text-decoration: none; color:rgb(0, 0, 0)" value="{{ url('typecontent/'.$auctions->type ='mixed') }}">هجين </option>

        </select>
      </li>

        </ul>
       {{--  @if(Auth::guard('webuser')->check())
        <ul class="navbar-nav mx-left text-center d-flex justify-content-start">
        <li class="nav-item">
        <a class="nav-item nav-link "style="color: #10c6bd" href="{{ url('/logout/user')}}">
          <span  style="color: white" class="font-w600 ms-3 ">مرحبا,<b>{{  Auth::guard('webuser')->user()->Firstname }}</b></span>

          تسجيل خروج


      </a>

</li>
</ul>
       
               @else
             <ul class="navbar-nav mx-right text-center d-flex justify-content-end ">
               <li class="nav-item">
               <a class="nav-item nav-link border border-primary mx-2"
                style="color: #10c6bd" href="{{ url('/register/user')}}">حساب جديد</a>
              </li>

           <li class="nav-item">
               <a class=" nav-item nav-link border border-primary mx-2"
               style="color: #10c6bd" href="{{ url('Weblogin/user')}}">تسجيل دخول </a>
                 </li>
</ul>
                    @endif

    --}}
            
         

       {{--  <span class="btn btn-outline-primary border border-2 border-primary float-start me-2 mx-3"
          style="color: #10c6bd">تسجيل دخول</span>
        <span class="btn btn-primary border border-2 border-primary float-start" style="color: #063a38">حساب جديد</span> --}}

      </div>

    </div>
  </nav>
