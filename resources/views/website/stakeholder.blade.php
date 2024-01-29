<h2 class="title-join text-center mt-5 fs-3 mb-5 " style="color:rgb(35, 96, 86);"> شركاء النجاح


  <div class="logo">
    <div class="logo_slider">
  <ul>
    @foreach ($stakeholder as $item)

    <li><a><img src="{{ asset('uploads/logo/'.$item->logo) }}" alt=""></a></li>
@endforeach
    
  </ul>
  </div>
  </div>
	