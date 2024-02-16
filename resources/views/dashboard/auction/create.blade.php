@extends('layouts.master')
@section('content')

    <div class="content-body" dir="rtl">
        <div class="container-fluid">
            <div class="row page-titles">
                <ol class="breadcrumb d-flex justify-content-end" dir="ltr">
                    <li class="breadcrumb-item active"><a href="{{ url('add_auction')}}">إضافة مزاد</a></li>
                    <li class="breadcrumb-item "><a href="{{ url('auction') }}">المزادات</a></li>
                    <li class="breadcrumb-item "><a href="{{  route('home')  }}">الرئيسية</a></li>
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
                            <p class="text-center  fs-3 fw-bold text-primary">إضافة مزاد</p>
                            <a href="{{ url('auction') }}" class="btn btn-danger float-end">رجوع</a>
                        </div>
                        <div class="card-body">
                            <form action="{{ url('add_auction') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="mb-3 col-md-4">
                                        <label for="">العنوان</label>
                                        <input type="text" name="Title" value="{{ old('Title') }}" class="form-control">
                                    </div>

                                    <div class="mb-3 col-md-4">
                                        <label for="">تفاصيل</label>
                                        <textarea type="text" name="description" class="form-control">{{old('description')}}</textarea>
                                    </div>
                                    <div class="mb-3 col-md-4">
                                        <label class="form-label"> صورة للمزاد</label>
                                        <div class="input-group mb-6">
                                            <div class="form-file">
                                                <input type="file" name="image" value="{{ old('image') }}" class="form-control" accept="image/*">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="">نوع المزاد</label>
                                        <div class="input-group mb-3">
                                            <select id="auctionType" class="form-select" aria-label="Default select example" name="type" onchange="changeFunc();">

                                                <option value="online">إلكتروني</option>
                                                <option value="onsite">حضوري</option>
                                                <option value="mixed">هجين</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-8">
                                        <label for="" style="display: none" id="textboxe">رابط البث للمزاد</label>

                                        <input type="url" name="onsiteLinkoo" value="{{ old('onsiteLinkoo') }}" class="form-control " style="display: none" id="textboxes">
                                    </div>
                                    <div class="mb-3 col-md-8">
                                        <label for="" style="display: none" id="textboxee">رابط مكان القاعه </label>

                                        <input type="url" name="onsiteLink" value="{{ old('onsiteLink') }}" class="form-control " style="display: none" id="textboxese">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for=""> المنطقة</label>
                                        <div class="input-group mb-3">
                                            <select class="form-select" aria-label="Default select example" name="Region">
                                                <option value="">الكل</option>
                                                <option value="riyadh">الرياض</option>
                                                <option value="makka">مكة المكرمة</option>
                                                <option value="almadina">المدينة المنورة</option>
                                                <option value="alsharqia">المنطقة الشرقية</option>
                                                <option value="aljuof">الجوف</option>
                                                <option value="tabuk">تبوك</option>
                                                <option value="haael">حائل</option>
                                                <option value="qassim">القصيم</option>
                                                <option value="najran">نجران</option>
                                                <option value="jazan">جازان</option>
                                                <option value="albaha">الباحة</option>
                                                <option value="shmaleah">المنطقة الشمالية</option>
                                                <option value="asser">عسير</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="">تاريخ البداية</label>
                                        <input type="date" name="dateOfStarting" value="{{ old('dateOfStarting') }}" class="form-control">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="">تاريخ النهاية</label>
                                        <input type="date" name="dateOfEnding" value="{{ old('dateOfEnding') }}" class="form-control">
                                    </div>


                                    <div class="mb-3 col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="">وقت البداية</label>
                                            <input type="time" name="timeOfStarting" value="{{ old('timeOfStarting') }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="">وقت النهاية</label>
                                            <input type="time" name="timeOfEnding" value="{{ old('timeOfEnding') }}" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="">اسم الشركة</label>
                                        <input type="text" name="companyName" value="{{ old('companyName') }}" class="form-control">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="">معلومات التواصل</label>
                                        <input type="text" name="infoDetails" value="{{ old('infoDetails') }}" class="form-control">
                                    </div>
                                </div>

                                <p class="text-center"> ----------------------------------------- معلومات المنصة
                                    --------------------------------</p>

                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="">إسم منصةالمزاد</label>
                                        <input type="text" name="PlatformName" value="{{ old('PlatformName') }}" class="form-control">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="">رابط المزاد</label>
                                        <input type="url" name="link" value="{{ old('link') }}" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="">إظهار بيانات إنفاذ</label>
                                        <div class="input-group mb-3">
                                            <select class="form-select" aria-label="Default select example" name="ShowInfath" value="{{ old('ShowInfath') }}">
                                                <option value="yes">إظهار</option>
                                                <option value="no">إخفاء</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label class="form-label"> صورة شعار المنصة</label>
                                        <div class="input-group mb-6">
                                            <div class="form-file">
                                                <input type="file" name="PlatformImage" class="form-control" accept="image/*">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{--  <p class="text-center"> ----------------------------------------- محتوي المزاد
                                      --------------------------------</p>
                                  <div class="row">
                                      <div class="mb-3 col-md-6">
                                          <label for="">اسم القطعة </label>
                                          <input type="text" name="auctionItemName" class="form-control">
                                      </div>
                                      <div class="mb-3 col-md-6">
                                          <label for=""> المساحة</label>
                                          <input type="text" name="auctionItemSpace" class="form-control">
                                      </div>
                                  </div>--}}
                                <div class="form-group mb-3">
                                    <button type="submit" class="btn btn-primary">اضف</button>
                                </div>
                            </form>
                        </div>

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
                if (selectedValue == "onsite" || selectedValue == "mixed") {
                    $('#textboxe').show();
                    $('#textboxes').show();
                    $('#textboxese').show();
                    $('#textboxee').show();
                } else {
                    $('#textboxe').hide();
                    $('#textboxes').hide();
                    $('#textboxese').hide();
                    $('#textboxee').hide();
                }
            }
        </script>
    @endsection
@endsection
