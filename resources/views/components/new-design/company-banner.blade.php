<section id="company-banner" class="my-3">
    <div class="container-fluid slider-container">
        <div class="row flex-nowrap mt-3">
            @foreach($auctions as $item)
                @if($item->image)
                    <img
                        class="img-fluid p-0"
                        src="{{ asset('uploads/auction/'.$item->image)}}"
                        alt=""
                    />
                @endif

                @if(count($item->acutionItems) > 0)
                    @foreach($item->acutionItems as $item)
                        @if($item->item_image)
                            <img
                                class="img-fluid p-0"
                                src="{{ asset('uploads/auction-items/' . $item->item_image) }}"
                                alt=""
                            />
                        @endif
                    @endforeach
                @endif
            @endforeach
        </div>
    </div>
</section>
