<div class="row justify-content-center align-items-center" style="overflow-y: hidden">
    <div class="row auction-offer flex-lg-column">

        @foreach($offers as $item)
            <div
                class="offer-card rounded-4 py-1 fs-6 fw-semibold text-center"
            >
                <span>{{ $item->type }}</span>
                <span>{{ $item->space }}</span>
                <span>{{ $item->area }}</span>

                @if($item->image)
                    <a href="{{ $item->location ? $item->location : '#' }}" target="_blank" class="position-relative">
                        <img class="object-fit-cover" src="{{ asset('uploads/offers/' . $item->image) }}" alt="offer image" width="150" height="100">
                        <i
                            class="bx bxs-location-plus fs-4 me-3 m-0 position-absolute"
                            style="color: #f31212; left: -40px; top: calc(50% - 10px);"
                        ></i>
                    </a>
                @endif
            </div>
        @endforeach

    </div>
</div>

