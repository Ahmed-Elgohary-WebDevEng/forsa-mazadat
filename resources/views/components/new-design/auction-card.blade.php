@props(['item', 'key'])

@php use Carbon\Carbon; @endphp
<div class="col">
    <div class="card h-100 auction-card">
        <div class="d-flex flex-column auction-card__type">
            <span class="small text-blue fw-semibold text-start ps-2">
                @if($item->dateOfStarting > Carbon::today()->toDateString())
                    قادم
                @elseif( $item->dateOfStarting == Carbon::today()->toDateString() &&
                Carbon::today()->toDateString() != $item->dateOfEnding ||
                $item->dateOfStarting <= Carbon::today()->toDateString() &&
                  Carbon::today()->toDateString() < $item->dateOfEnding)
                    جارى
                @else
                    منتهى
                @endif
            </span>
            <span class="small text-blue fw-semibold text-start ps-2">
                 @if ($item->type == "onsite")
                    {{"حضوري"}}
                @elseif ($item->type == "online")
                    {{"إلكتروني"}}
                @elseif ($item->type == "mixed")
                    {{"هجين"}}
                @endif
            </span>
        </div>
        <img
            src="{{asset('uploads/auction/'.$item->image)}}"
            class="card-img-top"
            alt="..."
            loading="lazy"
        />
        <div class="card-body auction-card__body text-dark-gray px-0 pb-0">
            <span class="auction__title small fw-semibold">{{ $item->Title }}</span>
            <!--    Timer   -->
            <div
                class="d-flex flex-row auction-card__timer align-items-center justify-content-evenly"
            >
                <span class="small fw-semibold shadow-sm me-3">يبدأ بعد</span>

                <div class="timer-separator"></div>
                <div class="timer fw-semibold text-dark-gray">
                    <span id="seconds-{{$key}}">40</span>
                    <span>ثانية</span>
                </div>
                <div class="timer-separator"></div>
                <div class="timer fw-semibold text-dark-gray">
                    <span id="minutes-{{$key}}">59</span>
                    <span>دقيقة</span>
                </div>
                <div class="timer-separator"></div>
                <div class="timer fw-semibold text-dark-gray">
                    <span id="hours-{{$key}}">5</span>
                    <span>ساعة</span>
                </div>
                <div class="timer-separator"></div>
                <div class="timer fw-semibold text-dark-gray">
                    <span id="days-{{$key}}">3</span>
                    <span>يوم</span>
                </div>
            </div>

            <!--   Details   -->
            <div
                class="d-flex mb-0 mt-2 align-items-end justify-content-between flex-nowrap p-0 ms-3 m-0"
            >
                <div class="text-start auction-card__details pb-1">
                    <div class="link">
                        <i
                            class="bx bxs-book-bookmark fs-4 shadow-sm p-1 bg-white"
                        ></i>
                        <span class="text-light-blue h6 fw-semibold my-auto">8 أصول</span>
                    </div>
                    <a href="#" class="link">
                        <i class="bx bxs-location-plus fs-4 shadow-sm p-1 bg-white"></i>
                        <span class="text-light-blue h6 fw-semibold my-auto">
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
                                                </span>
                    </a>
                    <a
                        href="{{ url('auctions/' . $item->slug) }}"
                        class="small px-3 py-2 my-auto fw-semibold text-light-blue text-center shadow-sm bg-white rounded me-auto"
                        style="height: fit-content; width: fit-content">
                        التفاصيل
                    </a>
                    <div class="link">
                        <i
                            class="bx bx-calendar fs-4 shadow-sm p-1 bg-white"
                            style="color: #da4a43"
                        ></i>
                        <div
                            class="text-light-blue fw-normal my-auto d-flex flex-column"
                            style="font-size: 12px; letter-spacing: 1px"
                        >
                            <span>يبدأ الإثنين {{ Carbon::parse($item->timeOfStarting)->format('g:i A') }}</span>
                            <span>{{ Carbon::parse($item->dateOfStarting)->format('Y-m-d') }}</span>
                        </div>
                    </div>
                </div>
                <div
                    class="d-flex flex-column text-md-end auction-card__owner shadow"
                >
                    <img
                        class="img-thumbnail"
                        src="https://st2.depositphotos.com/4035913/6124/i/600/depositphotos_61243733-stock-illustration-business-company-logo.jpg"
                        alt=""
                    />
                    <span class="text-dark-gray my-1 fw-semibold text-center" style="font-size: 10px">مجموعة الوميض العقارية</span>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function updateTimer() {
        let timerInterval;
        const targetDate = @json(Carbon::parse($item->dateOfEnding)->format('Y-m-d\TH:i:s'))

        const daysElement = document.getElementById('days-{{$key}}')
        const hoursElement = document.getElementById('hours-{{$key}}')
        const minutesElement = document.getElementById('minutes-{{$key}}')
        const secondsElement = document.getElementById('seconds-{{$key}}')

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
