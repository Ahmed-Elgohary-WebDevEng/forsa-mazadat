<?php $page='auctionditailes'; ?>

@extends('website.layouts.layout')
@section('content')

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">{{$auction->Title}}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        {{$auction->description}}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
      </div>
    </div>
  </div>
</div>

<div class="container body-content " dir="rtl">
  <h1 class="text-center droid-arabic-kufi fs-5" style="color: rgb(35, 96, 86);">{{$auction->Title}}</h1>
  <div class="row pt-3 droid-arabic-kufi">
	  
    <div class=" imgcol">
      <div class="card-group ">
        <div class="card" style="background-color: rgb(255, 255, 255);">
          <div class="card-body">
            <div class="card">
              <div class="card-body " style="background-color: #c4c3bf">
                <span>              
                  <ul class="nav mainnave d-flex justify-content-evenly">
                  {{--   <li class="nav-item">
                      <button type="button" class="btn btn-primary mt-1" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color: #3a3a3800; border:#3a3a3800 ; color:#3a3a38">
                      <div class="ms-2"> <i class="fas fa-info-circle fs-2" style="color:#3a3a38"></i> <br> معلومات المزاد</div>
                                         </button>

                    </li> --}}
               
					  
					   <li class="nav-item  navitem mt-1 ms1">
                      <a class="nav-link " href="#" style="color:#3a3a38">
						  
						  {{--<i class=" fa fa-regular fa-clock fs-5" style="color:#3a3a38;margin-right:30px"></i>--}}
						  <h5 style="color:rgb(35, 96, 86);"></h5> </a>
{{-- <span class="clock" data-countdown="{{$auction->timeOfStarting}}">{{$auction->timeOfStarting}}</span>--}}
                        @if ( $auction->dateOfStarting == Carbon\Carbon::today()->toDateString() &&
                                    Carbon\Carbon::today()->toDateString() != $auction->dateOfEnding ||$auction->dateOfStarting <=
                                      Carbon\Carbon::today()->toDateString() && Carbon\Carbon::today()->toDateString() < $auction->dateOfEnding )                                              
                        <div class="wrap-countdown mercado-countdown fs-6" data-expire="{{ Carbon\Carbon::parse($auction->dateOfEnding)->format('Y/m/d h:i:s') }}"></div>
                        @else
                        <div class="wrap-countdown mercado-countdown fs-6" style="font-size: 12px; color:#3a3a38" data-expire="{{ Carbon\Carbon::parse($auction->dateOfStarting)->format('Y/m/d h:i:s') }}"></div>
                        @endif
                    </li>
					
						   <li class="nav-item borderGreen navsm mt-2 ms-1  ">
{{--                       <img class="col-md-2" src="{{asset('img/spcommon.png')}}" style="width:55%; height:50px">--}}                                                    <img class=" mt-1 me-2" src="{{asset('uploads/auction/'.$auction->PlatformImage)  }}" alt="" style="width:75%; height:55px">
                    </li>
						   
                    @if($auction->ShowInfath == 'yes' )
                    <li class="nav-item navsm1 borderGreen mt-2 " style="width:70px">
                     <a class=" me-1" href="https://infath.gov.sa/web/guest/auctions"> <img class="col-md-4 mt-1 mes nfathimg" src="{{asset('img/mazadat.jpg')}}" style=" height:55px" ></a>
						
                    </li>
                   @endif  
						     <li class="nav-item elect borderGreen mt-2 ms-1" style="width:80px">
                    <div class="me-2" style="font-size:14px">
					  
@if ($auction->type == "onsite")
						  
                    <a class="nav-link "  href="#" style="color:#3a3a38"><i class="fas fa-gavel fs-3 " style="color:#3a3a38" ></i></a>

{{"حضوري"}}
@elseif ($auction->type == "online")
						 <a class="nav-link "  href="#" style="color:#3a3a38"><i class="fas fa-photo-video  fs-3 " style="color:#3a3a38" ></i></a>
{{"إلكتروني"}}
@elseif ($auction->type == "mixed")
						 <a class="nav-link "  href="#" style="color:#3a3a38"><i class="fas fa-photo-video fs-3 " style="color:#3a3a38" ></i></a>
{{"هجين"}}
@endif
                </div>
                  </li>
                       <li class="nav-item borderGreen mt-2 ms-1" style="width:85px">
                      <div class="me-3" style="font-size:14px">
                      <a class="nav-link "  href="#" style="color:#3a3a38"><i class="fas fa-calendar-alt fs-3" style="color:#3a3a38" ></i></a>  {{$auction->dateOfStarting}}</div> 
                    </li>
						   <li class="nav-item borderGreen mt-2 ms-1" style="width:85px">
                      <div class="me-3" style="font-size:14px">
                      <a class="nav-link "  href="#" style="color:#3a3a38"><i class="fas fa-calendar-alt fs-3" style="color:#3a3a38" ></i></a>  {{$auction->dateOfEnding}}</div> 
                    </li>
					   @if ($auction->type == "onsite"|| $auction->type == "mixed")
   <li class="nav-item borderGreen mt-2 ">
                    <div class="" style="font-size:14px">
                      <a class="nav-link "  href="{{ $auction->onsiteLinkoo }}" style="color:#3a3a38">
						  <i class="fas fa-map-marker-alt fs-3 me-2" style="color:#3a3a38; text-align: center;" ></i></a>{{ $auction->PlatformName }}</div> 
                    </li>
    <li class="nav-item borderGreen mt-2 ">
                      <div class="" style="font-size:14px">
                      <a class="nav-link "  href="{{$auction->onsiteLink}}" style="color:#3a3a38">
						 <i class="fas fa-tv  fs-3 me-3" style="color:#3a3a38" ></i></a>  رابط بث المزاد</div> 
                    </li>
						 {{--  @else--}}
						{{--<li class="nav-item borderGreen mt-2 ">
                      <div class="" style="font-size:14px">
                      <a class="nav-link "  href="{{$auction->onsiteLinkoo}}" style="color:#3a3a38">
						 <i class="fas fa-tv  fs-3 me-3" style="color:#3a3a38" ></i></a>  رابط بث المزاد</div> 
                    </li>--}}
				 
					  					  @endif

						  </ul>
				  <ul class="nav d-flex justify-content-center mt-3">

                   <div class="row">
					   <div class="col-6">
					  <li class="nav-item  ">
                  <a href="{{  url('userLog/'.$auction->id) }}" class="img" style="text-decoration: none"><img class="entermzadimage " src="{{asset('img/clickk.png')}}" width="50%"></a>
					  </li>
					   </div>
			 <div class="col-6">

					  <li class="nav-item   ">
<a href="{{  url('reminder/'.$auction->id) }}" class="img" style="text-decoration: none">
                <img class="subscribeImage" src="{{asset('img/rem.png')}}"width="80%">
                </a>
					  </li>
					   </div>
					  </div>
                  </ul>  
                
              </div>
            </div>
            
          <div class="row mt-5">

           <div class="col-md-5 " dir="lrt" >

             
              </div>


              <div class="col-md-7">
              

    </div>
              </div>

          </div>
        </div>
      </div>
    </div>


    <div class="  itemcol "  >
      <div class="card overflow-y-auto " style="height:425px">
        <div class="card-body">
          <h5 class="card-title droid-arabic-kufi">بنود المزاد</h5>

          <div class="card  w-auto ">
            @foreach ($auction->acution_item as $auctionitem )
            <ul class="list-group list-group-flush">
              <li class="list-group-item">{{$auctionitem->name}} - <span>
                  مساحة: {{$auctionitem->space}}</span></li>

            </ul>
            @endforeach

          </div>

        </div>
      </div>
    </div>
  </div>

 {{--  <div class="col-md-4">

    <div class=" ">
      <div class="">
        <h5 class="text-center" style="color: rgb(7, 146, 123); font-size:24px"> {{$auctionitem->name}}</h5>

        <p class="">
        <ul class="list-unstyled ps-4">
          <li><i class="far fa-sticky-note" style="color: rgb(83, 210, 187)"></i> التفاصيل: {{$auctionitem->descripton}}
          </li>
          @if ( $auction->dateOfStarting == Carbon\Carbon::today()->toDateString() &&
          Carbon\Carbon::today()->toDateString() != $auction->dateOfEnding ||$auction->dateOfStarting <=
            Carbon\Carbon::today()->toDateString() && Carbon\Carbon::today()->toDateString() < $auction->dateOfEnding )

              <li><i class="far fa-sticky-note" style="color: rgb(83, 210, 187)"></i><a
                  href="{{  url('userLog/'.$auction->id) }}"> رابط المزاد</a></li>
              @endif

              <li><i class="fas fa-map-marker-alt" style="color: rgb(83, 210, 187)"></i> الموقع:
                {{$auctionitem->location}}</li>
              <li><i class="fas fa-ruler-combined" style="color: rgb(83, 210, 187)"></i> المساحة:
                {{$auctionitem->space}}</li>
              <li><i class="fas fa-ruler-horizontal" style="color: rgb(83, 210, 187)"></i> العرض:
                {{$auctionitem->width}}</li>
              <li><i class="fas fa-ruler-vertical" style="color: rgb(83, 210, 187)"></i> الطول: {{$auctionitem->length}}
              </li>
        </ul>
        </p>

        <span class="btn btn-outline-primary border border-2 border-primary float-start me-2" style="color: #3a3a38">
          المنطقة: {{$auction->Region}}</span>
        <span class="btn btn-outline-primary border border-2 border-primary float-start" style="color: #3a3a38">يبدأ:
          {{$auction->dateOfStarting}}</span>

    </div>
		</div>
  </div> --}}
@section('script')


@endsection
  @stop
