<div class="container-lg mx-auto mt-5 droid-arabic-kufi overflow-x-hidden">

    <ul class="nav nav-pills p-0 nav-justified mb-3" id="pills-tab" role="tablist">


        <li class="nav-item" role="presentation">
            <button class="nav-link active " id="pills-home-tab" style="background-color:#FFC000" data-bs-toggle="pill"
                    data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                    aria-selected="true">قادم
            </button>
        </li>


        <li class="nav-item" role="presentation">
            <button class="nav-link " id="pills-profile-tab" style="background-color:#FFC000" data-bs-toggle="pill"
                    data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                    aria-selected="false">جاري
            </button>
        </li>


        <li class="nav-item" role="presentation">
            <button class="nav-link  " id="pills-contact-tab" style="background-color:#FFC000 ;  " data-bs-toggle="pill"
                    data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                    aria-selected="false">منتهي
            </button>
        </li>

    </ul>
    {{--<div class="container">
      <div class="row mb-4">
       <div class="col-4 input-group w-25 ">
       <select class="form-select w-25 " id='filterText' style='display:inline-block'
           onchange='filterText()'>
   <i class="fas fa-filter"></i>
           <option style="text-decoration: none; color:#454343" selected disabled > المناطق </option>

               <option style="text-decoration: none; color:#454343"  value="all"> الكل </option>
               <option style="text-decoration: none; color:#454343"  value="مكة المكرمة">مكة المكرمة </option>
               <option style="text-decoration: none; color:#454343"  value="المدينة المنورة">المدينة المنورة </option>
               <option  style="text-decoration: none; color:#454343"  value="الرياض">الرياض </option>
               <option class="dropdown-item"
                   style="text-decoration: none; color:#454343" value="القصيم">القصيم
                   </a></option>
               <option class="dropdown-item"
                   style="text-decoration: none; color:#454343" value="حائل">حائل
                   </a></option>
               <option class="dropdown-item"
                   style="text-decoration: none; color:#454343" value="المنطقة الشرقية">
                   المنطقة الشرقية </a></option>
               <option class="dropdown-item"
                   style="text-decoration: none; color:#454343" value="الجوف">الجوف
                   </a></option>
               <option class="dropdown-item"
                   style="text-decoration: none; color:#454343" value="تبوك">تبوك
               </option>
               <option class="dropdown-item"
                   style="text-decoration: none; color:#454343" value="تبوك">تبوك
               </option>
               <option class="dropdown-item"
                   style="text-decoration: none; color:#454343" value="جازان">جازان
               </option>
               <option class="dropdown-item"
                   style="text-decoration: none; color:#454343" value="الباحة">الباحة
               </option>
               <option class="dropdown-item"
                   style="text-decoration: none; color:#454343" value="المنطقة الشمالية">
                   المنطقة الشمالية </option>
               <option class="dropdown-item"
                   style="text-decoration: none; color:#454343" value="عسير">عسير
               </option>

           </select>
   </div>
   <select class="form-select w-25 me-3 "  id="roleDropdown" onchange='filterText()'>
               <option style="text-decoration: none; color:#454343" selected  disabled > نوع المزاد </option>
               <option  style="text-decoration: none; color:#454343" value="all">الكل</option>
               <option class="dropdown-item"
                   style="text-decoration: none; color:#454343" value="حضوري">
                   حضوري</a></option>
               <option class="dropdown-item"
                   style="text-decoration: none; color:#454343" value="إلكتروني">
                   إلكتروني </a></option>
               <option class="dropdown-item"
                   style="text-decoration: none; color:#454343" value="هجين">هجين </a>
               </option>
           </select>
   </div>--}}
    <div class="tab-content" id="pills-tabContent">


        <!-- 1 -->
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
            <div class="row row-cols-1 row-cols-md-3 g-4" dir="rtl">
                @foreach ($auctions as $item)
                    @if ( $item->dateOfStarting > Carbon\Carbon::today()->toDateString())
                        <div class="col-sm-3 col-md-4  ">
                            <div class="card content ">
                                <img src="{{asset('uploads/auction/'.$item->image)  }}" alt="" width="30" height="150"
                                     class="card-img-top mt-3">
                                <a class="btn Btn-position rounded-pill btn-outline-Green Btn-lightGreen "> قادم </a>

                                <a class="btn Btn-position rounded-pill btn-outline-Red Btn-lightRed mt-5 ">
                                    @if ($item->type == "onsite")
                                        {{"حضوري"}}
                                    @elseif ($item->type == "online")
                                        {{"إلكتروني"}}
                                    @elseif ($item->type == "mixed")
                                        {{"هجين"}}
                                    @endif
                                </a>
                                <div class="card-body">
                                    <h5 class="card-title text-center mt-4" style="color: rgb(35, 96, 86);">{{$item->Title}}</h5>

                                    <div class="row">
                                        <div class="col-6">
                                            <p class="card-text " style="color: rgb(83, 210, 187);font-size:12px"> عدد
                                                المنتجات: <span
                                                    style="color: rgb(35, 96, 86);">
                    {{$item->description}} </span></p>
                                        </div>
                                        <div class="col-6">
                                            <p class="card-text" style="color: rgb(83, 210, 187);font-size:11px">
                                                المنطقة: <span
                                                    style="color: rgb(35, 96, 86);">
                    @if ($item->Region =='riyadh' )
                                                        {{"الرياض"}}
                                                    @elseif ($item->Region =='makka')
                                                        {{"مكة المكرمة"}}
                                                    @elseif ($item->Region =='almadina')
                                                        {{"المدينة المنورة"}}
                                                    @elseif ($item->Region =='alsharqia')
                                                        {{"المنطقة الشرقية"}}
                                                    @elseif ($item->Region =='aljuof')
                                                        {{"الجوف"}}
                                                    @elseif ($item->Region =='tabuk')
                                                        {{"تبوك"}}
                                                    @elseif ($item->Region =='haael')
                                                        {{"حائل"}}
                                                    @elseif ($item->Region =='qassim')
                                                        {{"القصيم"}}
                                                    @elseif ($item->Region =='najran')
                                                        {{"نجران"}}
                                                    @elseif ($item->Region =='jazan')
                                                        {{"جازان"}}
                                                    @elseif ($item->Region =='albaha')
                                                        {{"الباحة"}}
                                                    @elseif ($item->Region =='shmaleah')
                                                        {{"المنطقة الشمالية"}}
                                                    @elseif ($item->Region =='asser')
                                                        {{"عسير "}}
                                                    @endif
                  </span></p>
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                        <div class="col-6">
                                            <p class="card-text" style="color: rgb(83, 210, 187); font-size:14.5px">
                                                البداية: <span
                                                    style="color: rgb(35, 96, 86);"> {{$item->dateOfStarting}}</span>
                                            </p>
                                        </div>
                                        <div class="col-6">
                                            <p class="card-text" style="color: rgb(83, 210, 187); font-size:14.5px">
                                                النهاية: <span
                                                    style="color: rgb(35, 96, 86);"> {{$item->dateOfEnding}}</span></p>
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                        <div class="col-8">
                                            <p class="card-text" style="color: rgb(83, 210, 187)">
                                                <i class="fas fa-calendar-alt fs-5"> </i> يبدأ
                                                بعد: <span style="color: rgb(35, 96, 86);">
                    @if( $item->dateOfStarting == Carbon\Carbon::today()->toDateString() &&
                    Carbon\Carbon::today()->toDateString() != $item->dateOfEnding ||$item->dateOfStarting <=
                      Carbon\Carbon::today()->toDateString() && Carbon\Carbon::today()->toDateString() < $item->
                        dateOfEnding )
                                                        <span class="wrap-countdown mercado-countdown" style="font-size: 15px; color:#3a3a38"
                                                              data-expire="{{ Carbon\Carbon::parse($item->dateOfEnding)->format('Y/m/d h:i:s') }}">
                        </span>
                                                    @else
                                                        <span class="wrap-countdown mercado-countdown fs-6" style="font-size: 15px; color:#3a3a38"
                                                              data-expire="{{ Carbon\Carbon::parse($item->dateOfStarting)->format('Y/m/d h:i:s') }}">
                        </span>
                                                    @endif
                  </span></p>
                                        </div>
                                        <div class="col-4">
                                            <a href="{{url('AcutionItems/'.$item->slug)}}" class="btn btn-outline-warning float-start mt-4"
                                               style="color: #fac68a;">المزيد </a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        {{--  <script>
              function updateTimer() {
                  const weeks = {{ $book_item->num_weeks }};
                  const days = {{ $book_item->num_days }};
                  const hours = {{ $book_item->num_hours }};


                  const dateTime = @json($book_item->book_data->format('Y-m-d\TH:i:s'))

                  // 1- start date visit
                  const startDate = new Date(dateTime);
                  // 2- calculate end_date
                  const endDate = new Date(startDate);

                  endDate.setDate(endDate.getDate() + (weeks * 7 + days));
                  endDate.setHours(endDate.getHours() + hours);
                  endDate.setMinutes(endDate.getMinutes())
                  endDate.setSeconds(endDate.getSeconds())

                  // 3- get the current date
                  const currentDate = new Date();

                  if (currentDate < startDate) {
                      // visit not started
                      document.getElementById('finished-{{$key}}').style.display = 'block';
                      document.getElementById('finished-{{$key}}').innerHTML = 'الزيارة لم تبدأ';

                      document.getElementById('timer-container-{{$key}}').style.display = "none"

                  } else if (currentDate > endDate) {
                      // visit is finish
                      document.getElementById('finished-{{$key}}').style.display = 'block';
                      document.getElementById('finished-{{$key}}').innerHTML = 'انتهت مدة الزيارة';
                  } else {
                      // timer starts
                      const timeDifference = endDate - currentDate;

                      const millisecondsPerWeek = 7 * 24 * 60 * 60 * 1000;
                      const millisecondsPerDay = 24 * 60 * 60 * 1000;
                      const millisecondsPerHour = 60 * 60 * 1000;
                      const millisecondsPerMinute = 60 * 1000;

                      const remainingWeeks = Math.floor(timeDifference / millisecondsPerWeek);
                      const remainingTime = timeDifference % millisecondsPerWeek;

                      const remainingDays = Math.floor(remainingTime / millisecondsPerDay);
                      const remainingTime2 = remainingTime % millisecondsPerDay;

                      const remainingHours = Math.floor(remainingTime2 / millisecondsPerHour);
                      const remainingTime3 = remainingTime2 % millisecondsPerHour;

                      const remainingMinutes = Math.floor(remainingTime3 / millisecondsPerMinute);
                      const remainingSeconds = Math.floor(remainingTime3 % millisecondsPerMinute / 1000);

                      // ****************** Start the timer function ****************


                      // Calculate the target date based on the provided weeks, days, and hours
                      const targetDate = new Date();
                      targetDate.setDate(targetDate.getDate() + (remainingWeeks * 7) + remainingDays); // Calculate the target date
                      targetDate.setHours(targetDate.getHours() + remainingHours); // Add hours
                      targetDate.setMinutes(targetDate.getMinutes() + remainingMinutes); // Add minutes
                      targetDate.setSeconds(targetDate.getSeconds() + remainingSeconds); // Add seconds

                      const weeksElement = document.getElementById('weeks-{{$key}}')
                      const daysElement = document.getElementById('days-{{$key}}')
                      const hoursElement = document.getElementById('hours-{{$key}}')
                      const minutesElement = document.getElementById('minutes-{{$key}}')
                      const secondsElement = document.getElementById('seconds-{{$key}}')

                      // Update the timer every second

                      function update() {
                          const currentDate = new Date();
                          const timeRemaining = targetDate - currentDate;

                          if (timeRemaining <= 0) {

                              weeksElement.innerHTML = "00"
                              daysElement.innerHTML = "00"
                              hoursElement.innerHTML = "00"
                              minutesElement.innerHTML = "00"
                              secondsElement.innerHTML = "00"
                              // clearInterval(timerInterval);
                          } else {
                              const weeks = Math.floor(timeRemaining / (7 * 24 * 60 * 60 * 1000));
                              const days = Math.floor((timeRemaining % (7 * 24 * 60 * 60 * 1000)) / (24 * 60 * 60 * 1000));
                              const hours = Math.floor((timeRemaining % (24 * 60 * 60 * 1000)) / (60 * 60 * 1000));
                              const minutes = Math.floor((timeRemaining % (60 * 60 * 1000)) / (60 * 1000));
                              const seconds = Math.floor((timeRemaining % (60 * 1000)) / 1000);

                              // timer.textContent = `${weeks.toString().padStart(2, '0')}:${days.toString().padStart(2, '0')}:${hours.toString().padStart(2, '0')}:${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;

                              weeksElement.innerHTML = weeks.toString().padStart(2, '0');
                              daysElement.innerHTML = days.toString().padStart(2, '0');
                              hoursElement.innerHTML = hours.toString().padStart(2, '0');
                              minutesElement.innerHTML = minutes.toString().padStart(2, '0');
                              secondsElement.innerHTML = seconds.toString().padStart(2, '0');
                          }
                      }

                      update(); // Initial call
                      const timerInterval = setInterval(update, 1000); // Update the timer every second

                  }
              }

              // Call the function to start the timer
              updateTimer();
          </script>--}}

        <!-- 2 -->
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
            <div class="row row-cols-1 row-cols-md-3 g-4" dir="rtl">
                @foreach ($auctions as $item)
                    @if( $item->dateOfStarting == Carbon\Carbon::today()->toDateString() && Carbon\Carbon::today()->toDateString()
                    != $item->dateOfEnding ||$item->dateOfStarting <= Carbon\Carbon::today()->toDateString() &&
                      Carbon\Carbon::today()->toDateString() < $item->dateOfEnding )
                        <!-- <div class="col-sm-3 col-md-3 me-sm-5 ms-sm-5 me-2 ms-2">-->
                        <div class="col-sm-3 col-md-4">

                            <div class="card  content">
                                <a class="btn Btn-position rounded-pill btn-outline-Green Btn-lightGreen "> جاري </a>

                                <img src="{{asset('uploads/auction/'.$item->image)  }}" alt="" width="30" height="150"
                                     class="card-img-top mt-3">
                                <a class="btn Btn-position rounded-pill btn-outline-Red Btn-lightRed mt-5 ">
                                    @if ($item->type == "onsite")
                                        {{"حضوري"}}
                                    @elseif ($item->type == "online")
                                        {{"إلكتروني"}}
                                    @elseif ($item->type == "mixed")
                                        {{"هجين"}}
                                    @endif
                                </a>
                                <div class="card-body">
                                    <h5 class="card-title text-center mt-4 " style="color: rgb(35, 96, 86);">{{$item->Title}}</h5>
                                    <div class="row">
                                        <div class="col-6">
                                            <p class="card-text" style="color: rgb(83, 210, 187);font-size:12px"> عدد
                                                المنتجات: <span
                                                    style="color: rgb(35, 96, 86);">{{$item->description}}</span></p>
                                        </div>
                                        <div class="col-6">
                                            <p class="card-text" style="color: rgb(83, 210, 187); font-size:11px">
                                                المنطقة: <span
                                                    style="color: rgb(35, 96, 86); font-size:12px">
                        @if ($item->Region =='riyadh' )
                                                        {{"الرياض"}}
                                                    @elseif ($item->Region =='makka')
                                                        {{"مكة المكرمة"}}
                                                    @elseif ($item->Region =='almadina')
                                                        {{"المدينة المنورة"}}
                                                    @elseif ($item->Region =='alsharqia')
                                                        {{"المنطقة الشرقية"}}
                                                    @elseif ($item->Region =='aljuof')
                                                        {{"الجوف"}}
                                                    @elseif ($item->Region =='tabuk')
                                                        {{"تبوك"}}
                                                    @elseif ($item->Region =='haael')
                                                        {{"حائل"}}
                                                    @elseif ($item->Region =='qassim')
                                                        {{"القصيم"}}
                                                    @elseif ($item->Region =='najran')
                                                        {{"نجران"}}
                                                    @elseif ($item->Region =='jazan')
                                                        {{"جازان"}}
                                                    @elseif ($item->Region =='albaha')
                                                        {{"الباحة"}}
                                                    @elseif ($item->Region =='shmaleah')
                                                        {{"المنطقة الشمالية"}}
                                                    @elseif ($item->Region =='asser')
                                                        {{"عسير"}}
                                                    @endif
                      </span></p>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-6">
                                            <p class="card-text" style="color: rgb(83, 210, 187)"> البداية:
                                                <span style="color: rgb(35, 96, 86);">{{$item->dateOfStarting}}</span>
                                            </p>
                                        </div>
                                        <div class="col-6">
                                            <p class="card-text" style="color: rgb(83, 210, 187)"> النهاية: <span
                                                    style="color: rgb(35, 96, 86);">{{$item->dateOfEnding}}</span></p>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-8">
                                            <p class="card-text " style="color: rgb(83, 210, 187)">
                                                <i class="fas fa-calendar-alt fs-5 "> </i>
                                                ينتهي بعد: <span style="color: rgb(35, 96, 86);">
                          @if( $item->dateOfStarting == Carbon\Carbon::today()->toDateString() &&
                          Carbon\Carbon::today()->toDateString() != $item->dateOfEnding ||$item->dateOfStarting <=
                            Carbon\Carbon::today()->toDateString() && Carbon\Carbon::today()->toDateString() < $item->
                              dateOfEnding )
                                                        <span class="wrap-countdown mercado-countdown" style="font-size: 15px; color:#3a3a38"
                                                              data-expire="{{ Carbon\Carbon::parse($item->dateOfEnding)->format('Y/m/d h:i:s') }}">
                              </span>
                                                    @else
                                                        <span class="wrap-countdown mercado-countdown fs-6" style="font-size: 15px; color:#3a3a38"
                                                              data-expire="{{ Carbon\Carbon::parse($item->dateOfStarting)->format('Y/m/d h:i:s') }}">
                              </span>
                                                    @endif
                        </span></p>
                                        </div>
                                        <div class="col-4">
                                            <a href="{{url('AcutionItems/'.$item->slug)}}" class="btn btn-outline-warning float-start mt-4"
                                               style="color: #fac68a;">المزيد </a>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

        <!-- 3 -->
        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">
            <div class="row row-cols-1 row-cols-md-3 g-4" dir="rtl">
                @foreach ($auctions as $item)
                    @if( $item->dateOfEnding == Carbon\Carbon::today()->toDateString() || $item->dateOfEnding <=
                      Carbon\Carbon::today()->toDateString())
                        <div class="col-sm-3 col-md-4">
                            <div class="card content">
                                <img src="{{asset('uploads/auction/'.$item->image)  }}" alt="" width="30" height="150"
                                     class="card-img-top mt-3 ">
                                <a class="btn Btn-position rounded-pill btn-outline-Green Btn-lightGreen "> منتهي </a>
                                <a class="btn Btn-position rounded-pill btn-outline-Red Btn-lightRed mt-5 ">
                                    @if ($item->type == "onsite")
                                        {{"حضوري"}}
                                    @elseif ($item->type == "online")
                                        {{"إلكتروني"}}
                                    @elseif ($item->type == "mixed")
                                        {{"هجين"}}
                                    @endif
                                </a>


                                <div class="card-body">

                                    <h5 class="card-title text-center mt-4" style="color: rgb(35, 96, 86);">{{$item->Title}}</h5>
                                    <div class="row">
                                        <div class="col-6">
                                            <p class="card-text" style="color: rgb(83, 210, 187); font-size:12px"> عدد
                                                المنتجات: <span
                                                    style="color: rgb(35, 96, 86);">{{$item->description}}
                      </span></p>
                                        </div>
                                        <div class="col-6">
                                            <p class="card-text" style="color: rgb(83, 210, 187);font-size:11px">
                                                المنطقة: <span
                                                    style="color: rgb(35, 96, 86); font-size:12px">
                        @if ($item->Region =='riyadh' )
                                                        {{"الرياض"}}
                                                    @elseif ($item->Region =='makka')
                                                        {{"مكة المكرمة"}}
                                                    @elseif ($item->Region =='almadina')
                                                        {{"المدينة المنورة"}}
                                                    @elseif ($item->Region =='alsharqia')
                                                        {{"المنطقة الشرقية"}}
                                                    @elseif ($item->Region =='aljuof')
                                                        {{"الجوف"}}
                                                    @elseif ($item->Region =='tabuk')
                                                        {{"تبوك"}}
                                                    @elseif ($item->Region =='haael')
                                                        {{"حائل"}}
                                                    @elseif ($item->Region =='qassim')
                                                        {{"القصيم"}}
                                                    @elseif ($item->Region =='najran')
                                                        {{"نجران"}}
                                                    @elseif ($item->Region =='jazan')
                                                        {{"جازان"}}
                                                    @elseif ($item->Region =='albaha')
                                                        {{"الباحة"}}
                                                    @elseif ($item->Region =='shmaleah')
                                                        {{"المنطقة الشمالية"}}
                                                    @elseif ($item->Region =='asser')
                                                        {{"عسير"}}
                                                    @endif
                      </span></p>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-6">
                                            <p class="card-text" style="color: rgb(83, 210, 187)"> البداية: <span
                                                    style="color: rgb(35, 96, 86);">{{$item->dateOfStarting}}</span></p>
                                        </div>
                                        <div class="col-6">
                                            <p class="card-text" style="color: rgb(83, 210, 187)"> النهاية: <span
                                                    style="color: rgb(35, 96, 86);">{{$item->dateOfEnding}}</span></p>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-8">

                                            <p class="card-text" style="color: rgb(83, 210, 187)">
                                                <i class="fas fa-calendar-alt fs-5"> </i>
                                                منتهى <span style="color: rgb(35, 96, 86);">
                        @if ( $item->dateOfStarting == Carbon\Carbon::today()->toDateString() &&
                        Carbon\Carbon::today()->toDateString() != $item->dateOfEnding ||$item->dateOfStarting <=
                          Carbon\Carbon::today()->toDateString() && Carbon\Carbon::today()->toDateString() < $item->
                            dateOfEnding )
                                                        <span class="wrap-countdown mercado-countdown" style="font-size: 15px; color:#3a3a38"
                                                              data-expire="{{ Carbon\Carbon::parse($item->dateOfEnding)->format('Y/m/d h:i:s') }}">
                            </span>
                                                    @else
                                                        <span class="wrap-countdown mercado-countdown fs-6" style="font-size: 15px; color:#3a3a38"
                                                              data-expire="{{ Carbon\Carbon::parse($item->dateOfStarting)->format('Y/m/d h:i:s') }}">
                            </span>
                                                    @endif
                      </span></p>
                                        </div>
                                        <div class="col-4">
                                            <a href="{{url('AcutionItems/'.$item->slug)}}" class="btn btn-outline-warning float-start mt-4"
                                               style="color: #fac68a;">المزيد </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>


    </div>
</div>

