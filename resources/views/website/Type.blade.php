<?php $page='region'; ?>

@extends('website.layouts.layout')

@section('content')
@endforeach
<div class="container body-content droid-arabic-kufi" dir="rtl">
    <h1 class="text-center droid-arabic-kufi" style="color: rgb(35, 96, 86);">  </h1>

    <div class="row pt-3">

        <div class="col-md-6">
            <div class="card  mb-3" style="max-width: 18rem;">
                <div class="card-header text-center" style="color: rgb(7, 146, 123); font-size:24px">حضوري 
                </div>
                <div class="card-body">
                    <h5 class="card-title droid-arabic-kufi text-center">مزادات الحضورية</h5>
                    <p class="card-text"><a href="{{ url('typecontent/'.$auctions->type ='onsite') }}">المزيد</a> </p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card  mb-3" style="max-width: 18rem;">
                <div class="card-header text-center " style="color: rgb(7, 146, 123); font-size:24px"> إلكتروني
                </div>
                <div class="card-body">
                    <h5 class="card-title droid-arabic-kufi text-center">مزادات إلكتروني </h5>
                    <p class="card-text"><a href="{{ url('typecontent/'.$auctions->type ='online') }}">المزيد</a> </p>
                </div>
            </div>
        </div>
     
    </div>
    


</div>
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
