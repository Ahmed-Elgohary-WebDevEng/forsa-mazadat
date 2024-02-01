@props(['agents'])

<div class="row flex-row company-head-logos">
    @foreach($agents as $item)
        <img
            src="{{ asset('uploads/agentsLogo/'.$item->logo)}}"
            alt=""
        />
    @endforeach
</div>

