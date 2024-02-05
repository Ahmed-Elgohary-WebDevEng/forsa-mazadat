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
                            <div class="col-3 p-0">
                                <img
                                    class="img-fluid"
                                    src="https://st4.depositphotos.com/13646662/40796/v/450/depositphotos_407960002-stock-illustration-water-wave-symbol-icon-logo.jpg"
                                    alt=""
                                />
                            </div>

                            <div class="col-9 px-0">
                                <h5 class="h5 fw-semibold text-dark-gray">
                                    مجموعة الغفيض العقارية
                                </h5>
                            </div>
                        </div>
                        <div class="row mb-1 mt-2">
                            <p class="fw-semibold small text-blue">
                                شركة المشيطى العقارية من الشركات الرائدة فى مجال
                                الاستثمارات العقارية فى المملكة العربية السعودية تأسست
                                بأيدي المتخصصين فى التسويق العقارى
                            </p>
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
                            أيام المزاد: <span class="me-2 ms-2">7</span> عدد الأصول:
                            <span class="ms-2 me-2">20</span>
                        </p>
                    </div>
                    <div class="col-md-7 order-1 order-md-2">
                        <div
                            class="d-flex flex-row justify-content-evenly gap-3 flex-wrap"
                        >
                            <a href="#" class="auction-tag flex-grow-1 text-blue">
                                <span class="small fw-normal me-2">كتيب مزاد الأصالة</span>
                                <img src="{{ asset('new-template/src/assets/icons/pdficon.png') }}" alt="pdf"/>
                            </a>
                            <a
                                href="#"
                                class="auction-tag flex-grow-1 text-dark-gray"
                            >
                                <span class="small fw-normal me-2 text-dark-gray">منصة المزاد - مباشر للمزادات</span>
                                <img
                                    src="https://d1csarkz8obe9u.cloudfront.net/posterpreviews/business-logo-design-template-266fc5ee477e629fbb5551e1db079133_screen.jpg?ts=1680135334"
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
                            src="{{asset('uploads/auction/'.$auction->image)}}"
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
            </div>
            <div class="col-lg-2">
                <div class="row justify-content-center align-items-center" style="overflow-y: hidden">
                    <div class="row auction-offer flex-lg-column">
                        <div
                            class="offer-card rounded-4 py-1 fs-6 fw-semibold text-center"
                        >
                            <span>فئة سكنية</span>
                            <span>910 م</span>
                            <span>حى النرجس</span>
                        </div>
                        <div
                            class="offer-card rounded-4 py-1 fs-6 fw-semibold text-center"
                        >
                            <span>فئة سكنية</span>
                            <span>910 م</span>
                            <span>حى النرجس</span>
                        </div>
                        <div
                            class="offer-card rounded-4 py-1 fs-6 fw-semibold text-center"
                        >
                            <span>فئة سكنية</span>
                            <span>910 م</span>
                            <span>حى النرجس</span>
                        </div>
                        <div
                            class="offer-card rounded-4 py-1 fs-6 fw-semibold text-center"
                        >
                            <span>فئة سكنية</span>
                            <span>910 م</span>
                            <span>حى النرجس</span>
                        </div>
                        <div
                            class="offer-card rounded-4 py-1 fs-6 fw-semibold text-center"
                        >
                            <span>فئة سكنية</span>
                            <span>910 م</span>
                            <span>حى النرجس</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
