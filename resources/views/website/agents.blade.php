
{{--	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
			
  <div class="carousel-inner">
	 @foreach ($agent as $item)
    <div class="carousel-item active"> @foreach ($agent as $item)
      <img src="{{ asset('uploads/agentsLogo/'.$item->logo)}}" width="100" class="d-flex " style="animation: 12s autoplay2 infinite ease-in-out"alt="...">@endforeach
    </div>
	  	@endforeach
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

--}}



{{--

<div class="d-flex justify-content-center ">
	<div id="carouselExampleSlidesOnly" class="carousel slide text-center" data-bs-ride="carousel" >
 <div class="carousel-inner w-100 ">
	
    <div class="carousel-item active " data-bs-interval="1000" >@foreach ($agent as $item)
		<a href="{{$item->link}}" target="_blank" >
      	<img src="{{ asset('uploads/agentsLogo/'.$item->logo)}}" width="300" alt="...">
		</a>   	@endforeach
    </div>

 
		</div>
  
</div> 
	</div> 

<div class="w3-content w3-section " style="max-width:300px; margin-left:auto; margin-right:auto;">
<center>@foreach ($agent as $item)
	<a href="{{$item->link}}" target="_blank" >
  <img class="mySlides text-cente" src="{{ asset('uploads/agentsLogo/'.$item->logo)}}" style="display:none;width:100%">
	</a> @endforeach</center>
</div>--}}







<!--
<script>
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 4000); // Change image every 2 seconds
}
</script>->

