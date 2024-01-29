<?php $page='region'; ?>

@extends('website.layouts.layout')
@section('content')

@foreach ($auction as $auction )
@endforeach
<div class="container body-content droid-arabic-kufi" dir="rtl">
    <h1 class="text-center droid-arabic-kufi" style="color: rgb(35, 96, 86);">كل المناطق </h1>

    <div class="row pt-3">

        <div class="col-md-4">
            <div class="card  mb-3" style="max-width: 18rem;">
                <div class="card-header text-center" style="color: rgb(7, 146, 123); font-size:24px">الرياض 
                </div>
                <div class="card-body">
                    <h5 class="card-title droid-arabic-kufi text-center">مزادات في منطقة الرياض</h5>
                    <p class="card-text"><a href="{{ url('regioncontent/'.$auction->Region ='riyadh') }}">المزيد</a> </p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card  mb-3" style="max-width: 18rem;">
                <div class="card-header text-center " style="color: rgb(7, 146, 123); font-size:24px">مكة المكرمة
                </div>
                <div class="card-body">
                    <h5 class="card-title droid-arabic-kufi text-center">مزادات في منطقة مكة المكرمة</h5>
                    <p class="card-text"><a href="{{ url('regioncontent/'.$auction->Region ='makka') }}">المزيد</a> </p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card  mb-3" style="max-width: 18rem;">
                <div class="card-header text-center " style="color: rgb(7, 146, 123); font-size:24px">المدينة المنورة
                </div>
                <div class="card-body">
                    <h5 class="card-title droid-arabic-kufi text-center">مزادات في منطقة المدينة المنورة</h5>
                    <p class="card-text"><a href="{{ url('regioncontent/'.$auction->Region ='almadina') }}">المزيد</a> </p>
                </div>
            </div>
        </div>
    </div>
    <div class="row pt-3">

        <div class="col-md-4">
            <div class="card  mb-3" style="max-width: 18rem;">
                <div class="card-header text-center " style="color: rgb(7, 146, 123); font-size:24px">الشرقية
                </div>
                <div class="card-body">
                    <h5 class="card-title droid-arabic-kufi text-center">مزادات في منطقة المنطقة الشرقية</h5>
                    <p class="card-text"><a href="{{ url('regioncontent/'.$auction->Region ='alsharqia') }}">المزيد</a> </p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card  mb-3" style="max-width: 18rem;">
                <div class="card-header text-center " style="color: rgb(7, 146, 123); font-size:24px">الجوف
                </div>
                <div class="card-body">
                    <h5 class="card-title droid-arabic-kufi text-center">مزادات في منطقة الجوف</h5>
                    <p class="card-text"><a href="{{ url('regioncontent/'.$auction->Region ='aljuof') }}">المزيد</a> </p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card  mb-3" style="max-width: 18rem;">
                <div class="card-header text-center " style="color: rgb(7, 146, 123); font-size:24px">القصيم
                </div>
                <div class="card-body">
                    <h5 class="card-title droid-arabic-kufi text-center">مزادات في منطقة القصيم</h5>
                    <p class="card-text"><a href="{{ url('regioncontent/'.$auction->Region ='qassim') }}">المزيد</a> </p>
                </div>
            </div>
        </div>
    </div>

    <div class="row pt-3">

        <div class="col-md-4">
            <div class="card  mb-3" style="max-width: 18rem;">
                <div class="card-header text-center" style="color: rgb(7, 146, 123); font-size:24px">تبوك
                </div>
                <div class="card-body">
                    <h5 class="card-title droid-arabic-kufi text-center">مزادات في منطقة تبوك</h5>
                    <p class="card-text"><a href="{{ url('regioncontent/'.$auction->Region ='tabuk') }}">المزيد</a> </p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card  mb-3" style="max-width: 18rem;">
                <div class="card-header text-center" style="color: rgb(7, 146, 123); font-size:24px">حائل
                </div>
                <div class="card-body">
                    <h5 class="card-title droid-arabic-kufi text-center">مزادات في منطقة حائل</h5>
                    <p class="card-text"><a href="{{ url('regioncontent/'.$auction->Region ='haael') }}">المزيد</a> </p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card  mb-3" style="max-width: 18rem;">
                <div class="card-header text-center " style="color: rgb(7, 146, 123); font-size:24px">نجران
                </div>
                <div class="card-body">
                    <h5 class="card-title droid-arabic-kufi text-center">مزادات في منطقة نجران</h5>
                    <p class="card-text"><a href="{{ url('regioncontent/'.$auction->Region ='najran') }}">المزيد</a> </p>
                </div>
            </div>
        </div>
    </div>
    <div class="row pt-3">

        <div class="col-md-4">
            <div class="card  mb-3" style="max-width: 18rem;">
                <div class="card-header text-center" style="color: rgb(7, 146, 123); font-size:24px">جازان
                </div>
                <div class="card-body">
                    <h5 class="card-title droid-arabic-kufi text-center">مزادات في منطقة جازان</h5>
                    <p class="card-text"><a href="{{ url('regioncontent/'.$auction->Region ='jazan') }}">المزيد</a> </p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card  mb-3" style="max-width: 18rem;">
                <div class="card-header text-center" style="color: rgb(7, 146, 123); font-size:24px">الباحة
                </div>
                <div class="card-body">
                    <h5 class="card-title droid-arabic-kufi text-center">مزادات في منطقة الباحة</h5>
                    <p class="card-text"><a href="{{ url('regioncontent/'.$auction->Region ='albaha') }}">المزيد</a> </p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card  mb-3" style="max-width: 18rem;">
                <div class="card-header text-center" style="color: rgb(7, 146, 123); font-size:24px">الحدود الشمالية
                </div>
                <div class="card-body">
                    <h5 class="card-title droid-arabic-kufi text-center">مزادات في منطقة الحدود الشمالية</h5>
                    <p class="card-text"><a href="{{ url('regioncontent/'.$auction->Region ='shmaleah') }}">المزيد</a> </p>
                </div>
            </div>
        </div>
    </div>
    <div class="row pt-3">

        <div class="col-md-4">
            <div class="card  mb-3" style="max-width: 18rem;">
                <div class="card-header text-center " style="color: rgb(7, 146, 123); font-size:24px">عسير 
                </div>
                <div class="card-body">
                    <h5 class="card-title droid-arabic-kufi text-center">مزادات في منطقة عسير</h5>
                    <p class="card-text"><a href="{{ url('regioncontent/'.$auction->Region ='asser') }}">المزيد</a> </p>
                </div>
            </div>
        </div>

    </div>


</div>
@section('script')
      <script src="{{ asset('js/bootstrap.bundle.min.js') }}">

</script>
@endsection
    @stop


























    {{-- <div dir="rtl" class="control-group col-12 d-flex justify-content-right">
        <div dir="rtl" class="mb-0 form-floating controls pb-2">
            <select class="form-select" aria-label="Default select example" name="Region">
                <option value="all" dir="rtl">المنطقه</option>
                <option value="riyadh">الرياض </option>
                <option value="makka">مكة المكرمة </option>
                <option value="almadina">المدينة المنورة </option>
                <option value="alsharqia">المنظقة الشرقية </option>
                <option value="aljuof">الجوف </option>
                <option value="tabuk">تبوك </option>
                <option value="haael">حائل </option>
                <option value="qassim">القصيم </option>
                <option value="najran">نجران </option>
                <option value="jazan">جازان </option>
                <option value="albaha">الباحة </option>
                <option value="shmaleah">المنطقة الشمالية </option>
                <option value="asser">عسير </option>
            </select>
        </div>
    </div>
    --}}
