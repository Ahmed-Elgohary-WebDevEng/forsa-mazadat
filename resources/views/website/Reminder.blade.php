<?php $page='auctionditailes'; ?>

@extends('website.layouts.layout')
@section('content')

<div class="content-body" dir="rtl">
    <div class="container-fluid">
        <div class="row page-titles">
           
        </div>
    <!-- row -->
    <div class="row">
        <div class="col-xl-12">

            @if (session('status'))
                <h6 class="alert alert-success">{{ session('status') }}</h6>
            @endif

            <div class="card">                
                    <div class="card-header  d-flex justify-content-center ">
                        <p class="text-center  fs-3 fw-bold"></p>
                        <p class="text-center  fs-3 fw-bold text-primary"> تسجيل بالتذكير بالمزاد</p>
                    </div>


                <div class="card-body">
                    <form action="{{ url('reminder/'.$Auction->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="mb-3 col-md-4">
                                <label for=""> اسم المزاد</label>
                            <select name="Acution_id" class="form-control" disabled>
                                    <option value="{{ $Auction->id }}">{{ $Auction->Title}}</option>
                                    
                            </select>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="Fullname">الاسم بالكامل </label>
                                <input type="text" class="form-control" name="Fullname" id="Fullname"
                                    placeholder="ادخل الاسم بالكامل " required>
                            </div>
                        <div class="mb-3 col-md-4">
                        <label for="mobile_no">رقم الجوال</label>
                            <input type="tel" class="form-control" name="mobile_no" id="mobile_no"
                                placeholder="ادخل رقم الجوال" required>
                        </div>
                        </div>
                        
                        <div class="row">

                            <div class="mb-3 col-md-6">
                                <label for="date"> تاريخ</label>
                                <input type="date" class="form-control" value="{{ $Auction->dateOfStarting}}" id="date" name="date" >
                            
                            </div>
                        
                            <div class="mb-3 col-md-6">
                                <label for="time">الوقت</label>
                                <input type="time" class="form-control" value="{{ $Auction->timeOfStarting}}" name="time" id="time" >
                            </div>
                        </div>
                        
                   

                     
                       
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">تسجيل </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
