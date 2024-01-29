
@extends('layouts.master')
@section('content')

<div class="content-body" dir="rtl">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb d-flex justify-content-end" dir="ltr">
                <li class="breadcrumb-item active"><a href="{{ url('edit_auction/'.$auction->id)}}">تعديل المزادات</a></li>
                <li class="breadcrumb-item "> <a href="{{ url('auction') }}">المزادات</a></li>
                <li class="breadcrumb-item "> <a href="{{  route('home')  }}">الرئيسية</a></li>
            </ol>
        </div>
    <!-- row -->
    <div class="row">
        <div class="col-xl-12">
           
    
                @if (session('status'))
                    <h6 class="alert alert-success">{{ session('status') }}</h6>
                @endif
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                <div class="card">
                    <div class="card-header  d-flex justify-content-between ">
                        <p class="text-center  fs-3 fw-bold"></p>
                        <p class="text-center  fs-3 fw-bold text-primary">تعديل على المزاد </p>
                        <a href="{{ url('auction') }}" class="btn btn-danger float-end">رجوع</a>
                    </div>
                    <div class="card-body">

                        <div class="col-xl-12">
                            <form action="{{ url('update_auction/'.$auction->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                <div class="mb-3 col-md-4">
                                <label class="form-label" for="">العنوان</label>
                                <input type="text" name="Title" value="{{$auction->Title}}" class="form-control">
                            </div>
                           
                            <div class="mb-3 col-md-4">
                                <label class="form-label" for="">تفاصيل</label>
                                <textarea type="text" name="description" value="{{$auction->description}}" class="form-control">{{$auction->description}}</textarea>
                            </div>
                            <div class="mb-3 col-md-4">
                                <label class="form-label"> صورة المزاد</label>
                                <div class="input-group mb-6">
                                <div class="form-file">
                                <input type="file" name="image" class="form-control" accept="image/*" value="{{$auction->image}}">
                                <img src="{{  asset('uploads/auction/'.$auction->image)  }}" width="70px" height="70px" alt="Image">

                            </div>
                        </div>
                            </div>
                                </div>
                                
                                <div class="row">
                                <div class="mb-3 col-md-6">
                                <label class="form-label" for="">نوع المزاد</label>
                                <div class="input-group mb-3">
                                <select id="auctionType" class="form-select" aria-label="Default select example" name="type" onchange="changeFunc();">
                                    <option value="online" {{$auction->type == 'online' ? 'selected':''}}>إلكتروني </option>
                                    <option value="onsite"{{$auction->type == 'onsite' ? 'selected':''}}>حضوري </option>
                                    <option value="mixed"{{$auction->type == 'mixed' ? 'selected':''}}>هجين </option>

                                </select>
                                </div>
                                </div>
                                <div class="mb-3 col-md-8">
                                    <label for="" style="display: none" id="textboxe">رابط البث للمزاد</label>
        
                                    <input type="text" name="onsiteLink" class="form-control" value="{{ $auction->onsiteLink }}"  style="display: none" id="textboxes">
</div>
<div class="mb-3 col-md-8">
                            <label for="" style="display: none" id="textboxee">رابط مكان القاعه </label>

                            <input type="url" name="onsiteLinkoo" class="form-control "  style="display: none" value="{{ $auction->onsiteLinkoo }} " id="textboxese">
                        </div>
                                
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for=""> المنطقة</label>
                             
                                <div class="input-group mb-3">
                                <select class="form-select" aria-label="Default select example" name="Region">
                                    <option value="all" {{$auction->Region == 'all' ? 'selected':''}}>الكل </option>
                                    <option value="riyadh" {{$auction->Region == 'riyadh' ? 'selected':''}} >الرياض </option>
                                    <option value="makka" {{$auction->Region == 'makka' ? 'selected':''}} >مكة المكرمة </option>
                                    <option value="almadina" {{$auction->Region == 'almadina' ? 'selected':''}} >المدينة المنورة </option>
                                    <option value="alsharqia" {{$auction->Region == 'alsharqia' ? 'selected':''}} >المنظقة الشرقية </option>
                                    <option value="aljuof" {{$auction->Region == 'aljuof' ? 'selected':''}} >الجوف </option>
                                    <option value="tabuk" {{$auction->Region == 'tabuk' ? 'selected':''}} >تبوك </option>
                                    <option value="haael" {{$auction->Region == 'haael' ? 'selected':''}} >حائل </option>
                                    <option value="qassim" {{$auction->Region == 'qassim' ? 'selected':''}} >القصيم </option>
                                    <option value="najran" {{$auction->Region == 'najran' ? 'selected':''}} >نجران </option>
                                    <option value="jazan" {{$auction->Region == 'jazan' ? 'selected':''}}>جازان </option>
                                    <option value="albaha" {{$auction->Region == 'albaha' ? 'selected':''}} >الباحة </option>
                                    <option value="shmaleah" {{$auction->Region == 'shmaleah' ? 'selected':''}}>المنطقة الشمالية </option>
                                    <option value="asser" {{$auction->Region == 'asser' ? 'selected':''}}>عسير </option>
                                </select>
                                
                                </div>
                            </div>
                                </div>

                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                    <label class="form-label" for="">تاريخ البداية</label>
                                    <input type="date" name="dateOfStarting" class="form-control" value="{{$auction->dateOfStarting}}">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="">تاريخ النهاية</label>
                                    <input type="date" name="dateOfEnding" class="form-control" value="{{$auction->dateOfEnding}}">
                                </div>

                                    <div class="mb-3 col-md-6">
                                    <label class="form-label" for="">وقت البداية</label>
                                    <input type="time" name="timeOfStarting"  class="form-control" value="{{$auction->timeOfStarting}}">
                                </div>
                            </div>

                            <p class="text-center"> ----------------------------------------- معلومات المنصة --------------------------------</p>
                            
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="">إسم منصةالمزاد</label>
                                <input type="text" name="PlatformName" value="{{ $auction->PlatformName }}" class="form-control">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="">رابط المزاد</label>
                                <input type="url" name="link" value="{{ $auction->link }}" class="form-control">
                            </div>
                        </div>
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="">إظهار بيانات إنفاذ</label>
                                    <div class="input-group mb-3">
                                    <select class="form-select" aria-label="Default select example" name="ShowInfath">
                                        <option value="yes"  {{$auction->ShowInfath == 'yes' ? 'selected':''}}>إظهار </option>
                                        <option value="no" {{$auction->ShowInfath == 'no' ? 'selected':''}}>إخفاء </option>
                                    </select>
                                    </div>
                                 </div>

                                 <div class="mb-3 col-md-6">
                                    <label class="form-label"> صورة شعار المنصة</label>
                                    <div class="input-group mb-6">
                                    <div class="form-file">      
                                        <input type="file" name="PlatformImage" class="form-control" accept="image/*">
                                        <img src="{{  asset('uploads/auction/'.$auction->PlatformImage)  }}" width="70px" height="70px" alt="Image">

                                    </div>
                                </div>
                                </div>
                            </div>
                           
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary">حفظ التعديلات</button>
                            </div>
    
                        </form>
    
                    </div>
                </div>
            </div>
        </div>
    </div>
@section('script')
<script type="text/javascript">
function changeFunc() {
var selectBox = document.getElementById("auctionType");
var selectedValue = selectBox.options[selectBox.selectedIndex].value;
if (selectedValue=="onsite" || selectedValue=="mixed"){
$('#textboxe').show();
$('#textboxes').show();
$('#textboxese').show();
$('#textboxee').show();
}
else {
$('#textboxe').hide();
$('#textboxes').hide();
$('#textboxese').hide();
$('#textboxee').hide();
}
}
</script>
@endsection
@endsection