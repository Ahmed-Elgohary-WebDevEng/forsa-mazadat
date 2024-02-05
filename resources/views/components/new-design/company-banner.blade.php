<section id="company-banner" class="my-3">
    <div class="container-fluid slider-container">
        <div class="row flex-nowrap mt-3">
            @foreach($agents as $item)
                <img
                    class="img-fluid p-0"
                    src="{{ asset('uploads/agentsLogo/'.$item->logo)}}"
                    alt=""
                />
            @endforeach
        </div>
    </div>
</section>
