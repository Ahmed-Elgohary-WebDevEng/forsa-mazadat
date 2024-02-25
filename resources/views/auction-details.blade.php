@php use Carbon\Carbon; @endphp
@extends('layouts.new-app')

@section('title', 'تفاصيل')

@section('styles')
    <!--  Custom Style  -->
    <link rel="stylesheet" href="{{ asset('new-template/src/styles/auction.show.css') }}"/>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row gx-5 gy-3 mb-5">
            <div class="col-lg-9 order-1">
                {{--  Company head logos  --}}
                <x-new-design.company-logos-title></x-new-design.company-logos-title>

                <div class="row mt-3 mb-2">
                    <div
                        class="d-inline-flex align-items-center justify-content-center gap-3 title text-blue"
                        style="border-bottom: 1.5px solid var(--border-gray)"
                    >
                        <!--  title   -->
                        <h3 class="fw-semibold auction-title mb-0 h3">
                            {{ $auction->Title }}
                        </h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 text-center order-2">
                <div class="card auction-owner shadow">
                    <div class="card-body p-0">
                        <div class="row flex-row align-items-center">
                            @if($auction->company)
                                <div class="col-3 p-0">
                                    <img
                                        class="img-fluid rounded-pill"
                                        src="{{ asset('uploads/company/' . $auction->company->logo) }}"
                                        alt=""
                                    />
                                </div>

                                <div class="col-9 px-0">
                                    <h5 class="h5 fw-semibold text-dark-gray">
                                        {{ $auction->company->name }}
                                    </h5>
                                </div>
                                <div class="row mb-1 mt-2">
                                    <p class="fw-semibold small text-blue"> {{ substr($auction->company->description, 0, 300) }}</p>
                                </div>
                            @else
                                <h6 class="text-dark-gray text-center fw-semibold py-5">لا توجد شركة</h6>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-5 mt-4 justify-content-between gy-4">
            <div class="col-lg-10">
                <div
                    class="row g-3 mb-2 align-items-center justify-content-center"
                >
                    <div class="col-md-3 order-2 order-md-1 text-center">
                        <p class="small text-blue fw-semibold my-auto">
                            @php
                                // Assuming $startDate and $endDate are DateTime objects or valid date strings
                                 $startDate = Carbon::parse($auction->dateOfStarting);
                                 $endDate = Carbon::parse($auction->dateOfEnding);

                                 // Calculate the difference in days
                                 $daysDifference = $startDate->diffInDays($endDate);
                            @endphp
                            أيام المزاد: <span class="me-2 ms-2">{{ $daysDifference }}</span> عدد الأصول:
                            <span class="ms-2 me-2">{{ $auction->acutionItems()->count() }}</span>
                        </p>
                    </div>
                    <div class="col-md-7 order-1 order-md-2">
                        <div
                            class="d-flex flex-row justify-content-evenly gap-3 flex-wrap"
                        >
                            <a href="{{ $auction->pdf_link ?? "#" }}" target="_blank" class="auction-tag flex-grow-1 text-blue">
                                <span class="small fw-normal me-2">كتيب {{ $auction->Title }}</span>
                                <img src="{{ asset('new-template/src/assets/icons/pdficon.png') }}" alt="pdf"/>
                            </a>
                            <a
                                href="{{ $auction->link ?? "#" }}"
                                target="_blank"
                                class="auction-tag flex-grow-1 text-dark-gray"
                            >
                                <span class="small fw-normal me-2 text-dark-gray">منصة المزاد - {{ $auction->company ? substr($auction->company->name, 0, 20) : 'لا يوجد' }}</span>
                                <img
                                    src="{{ $auction->company ? asset('uploads/company/' . $auction->company->logo): "data:image/png;base64,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" }}"
                                    alt=""
                                    style="width: 50px; height: 30px; object-fit: cover"
                                />
                            </a>
                            <a
                                href="#"
                                class="auction-tag flex-grow-1 text-dark-gray"
                            >
                                <span class="small fw-normal me-2 text-dark-gray">لدخول البث المباشر</span>
                                <img
                                    src="{{ asset('new-template/src/assets/icons/live-icon.png') }}"
                                    alt=""
                                    style="width: 40px; height: 20px"
                                />
                            </a>
                        </div>
                    </div>
                </div>

                <div class="row g-3 mt-2 align-items- justify-content-center">
                    <div class="col-md-3 text-center">
                        <img
                            class="img-fluid object-fit-cover rounded-4 shadow-sm mx-auto"
                            style="height: 185px"
                            src="{{ $auction->image ? asset('uploads/auction/'.$auction->image) : "https://static.vecteezy.com/system/resources/thumbnails/016/272/198/small/smart-auction-logo-hammer-illustration-auction-logo-free-vector.jpg"}}"
                            alt="auction-img"
                        />
                    </div>
                    <div class="col-md-7">
                        <div
                            class="d-flex flex-column auction-details rounded-4 shadow h-100"
                        >
                            <h6 class="mb-4 h6 fw-semibold text-blue">{{ $auction->description }}</h6>
                            <div
                                class="d-flex align-items-center justify-content-between mt-auto pb-4 flex-wrap gap-3"
                            >
                                <a
                                    href="#"
                                    class="d-flex flex-row px-3 py-2 shadow-sm rounded-3 align-items-center justify-content-center"
                                    style="border: 1px solid var(--border-gray)"
                                >
                                    <i
                                        class="bx bxs-location-plus fs-4 me-3 m-0"
                                        style="color: #f31212"
                                    ></i>
                                    <span class="text-dark-gray fw-semibold h6 m-0"
                                    >موقع العقار</span
                                    >
                                </a>
                                <!--  Timer  -->
                                <div class="auction-card__body">
                                    <div
                                        class="d-flex flex-row auction-card__timer align-items-center justify-content-evenly"
                                    >
                                        <span class="small fw-semibold shadow-sm me-3 text-danger">يبدأ بعد</span>

                                        <div class="timer-separator"></div>
                                        <div class="timer fw-semibold text-dark-gray">
                                            <span id="seconds}">40</span>
                                            <span>ثانية</span>
                                        </div>
                                        <div class="timer-separator"></div>
                                        <div class="timer fw-semibold text-dark-gray">
                                            <span id="minutes}">59</span>
                                            <span>دقيقة</span>
                                        </div>
                                        <div class="timer-separator"></div>
                                        <div class="timer fw-semibold text-dark-gray">
                                            <span id="hours}">5</span>
                                            <span>ساعة</span>
                                        </div>
                                        <div class="timer-separator"></div>
                                        <div class="timer fw-semibold text-dark-gray">
                                            <span id="days}">3</span>
                                            <span>يوم</span>
                                        </div>
                                    </div>
                                </div>
                                <script>
                                    function updateTimer() {
                                        let timerInterval;
                                        const targetDate = @json(Carbon::parse($auction->dateOfEnding)->format('Y-m-d\TH:i:s'))

                                        const daysElement = document.getElementById('days}')
                                        const hoursElement = document.getElementById('hours}')
                                        const minutesElement = document.getElementById('minutes}')
                                        const secondsElement = document.getElementById('seconds}')

                                        function update() {
                                            const now = new Date().getTime();
                                            const finishDate = new Date(targetDate).getTime()

                                            const timeRemaining = finishDate - now;


                                            if (timeRemaining < 0) {
                                                clearInterval(timerInterval)
                                                daysElement.innerHTML = "00"
                                                hoursElement.innerHTML = "00"
                                                minutesElement.innerHTML = "00"
                                                secondsElement.innerHTML = "00"

                                            } else {
                                                const days = Math.floor(timeRemaining / (1000 * 60 * 60 * 24));
                                                const hours = Math.floor((timeRemaining % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                                const minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
                                                const seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);

                                                daysElement.innerHTML = days;
                                                hoursElement.innerHTML = hours;
                                                minutesElement.innerHTML = minutes;
                                                secondsElement.innerHTML = seconds;
                                            }
                                        }

                                        update(); // Initial call
                                        timerInterval = setInterval(update, 1000); // Update the timer every second
                                    }

                                    updateTimer()
                                </script>
                            </div>
                        </div>
                    </div>
                </div>

                {{--      Images auction       --}}

                <div class="row g-3 mb-2 mt-4 align-items-center justify-content-center flex-wrap">
                    @if(count($auction->acutionItems) > 0)
                        @foreach($auction->acutionItems as $item)
                            <div class="card mb-3 p-0" style="max-width: 80%; background: var(--primary-gray);">
                                <div class="row g-1">
                                    <div class="col-md-4 col-xl-2">
                                        <a href="{{ $item->location ? $item->location : '#' }}" target="_blank">
                                            <img src="{{ $item->item_image ? asset('uploads/auction-items/' . $item->item_image) : asset('assets/images/image-not-found.jpg') }}" class="img-fluid rounded-start" style="height: 158px;" alt="...">
                                        </a>
                                    </div>
                                    <div class="col-md-8 col-xl-10">
                                        <div class="card-body pb-0">
                                            <h6 class="card-title fw-bold text-blue mb-3">{{ $item->name }} رقم الصك:
                                                {{ $item->number ? $item->number : '------' }}</h6>
                                            <p class="card-text text-secondary my-4 small">
                                                المساحة: {{ $item->space }}</p>
                                            <p class="fw-semibold small text-blue">
                                                @if ($auction->Region =='riyadh' )
                                                    مدينة: الرياض
                                                @elseif ($auction->Region =='makka')
                                                    مدينة: مكة المكرمة
                                                @elseif ($auction->Region =='almadina')
                                                    مدينة: المدينة المنورة
                                                @elseif ($auction->Region =='alsharqia')
                                                    مدينة: المنطقة الشرقية
                                                @elseif ($auction->Region =='aljuof')
                                                    مدينة: الجوف
                                                @elseif ($auction->Region =='tabuk')
                                                    مدينة: تبوك
                                                @elseif ($auction->Region =='haael')
                                                    مدينة: حائل
                                                @elseif ($auction->Region =='qassim')
                                                    مدينة: القصيم
                                                @elseif ($auction->Region =='najran')
                                                    مدينة: نجران
                                                @elseif ($auction->Region =='jazan')
                                                    مدينة: جازان
                                                @elseif ($auction->Region =='albaha')
                                                    مدينة: الباحة
                                                @elseif ($auction->Region =='shmaleah')
                                                    مدينة: المنطقة الشمالية
                                                @elseif ($auction->Region =='asser')
                                                    مدينة: عسير
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <h5 class="fw-semibold text-center text-danger">لا توجد تفاصيل</h5>
                    @endif


                </div>
                {{-- <div class="row g-3 mb-2 mt-4 align-items-center justify-content-center flex-wrap">
                     @if(count($auction->acutionItems) > 0)
                         @foreach($auction->acutionItems as $item)
                             <div style="width: fit-content;">
                                 <a href="{{ $item->location ? $item->location : '#' }}" target="_blank">
                                     <img
                                         class="rounded-4 rounded object-fit-cover"
                                         style="height: 200px; width: 250px;"
                                         src="{{ $item->item_image ? asset('uploads/auction-items/' . $item->item_image) : asset('assets/images/image-not-found.jpg') }}"
                                         alt="logo"
                                         loading="lazy"
                                     >
                                 </a>
                             </div>
                         @endforeach
                     @else
                         <h5 class="fw-semibold text-center text-danger">لا توجد صور</h5>
                     @endif--}}
                {{--            </div>--}}


            </div>
            <div class="col-lg-2">
                <x-new-design.offers-sidebar-banner/>
            </div>
        </div>
    </div>
@endsection
