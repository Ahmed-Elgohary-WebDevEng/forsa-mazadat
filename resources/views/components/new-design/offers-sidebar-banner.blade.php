<div class="row justify-content-center align-items-center" style="overflow-y: hidden">
    <div class="row auction-offer flex-lg-column">

        @foreach($offers as $item)
            <div
                class="offer-card rounded-4 py-1 fs-6 fw-semibold text-center"
            >
                <span>{{ $item->type }}</span>
                <span>{{ $item->space }}</span>
                <span>{{ $item->area }}</span>
            </div>
        @endforeach

    </div>
</div>

