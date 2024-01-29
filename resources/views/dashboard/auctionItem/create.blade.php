@extends('layouts.master')
@section('content')

<div class="content-body" dir="rtl">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb d-flex justify-content-end" dir="ltr">
                <li class="breadcrumb-item active"><a href="{{ url('add_auctionitem')}}">إضافة محتوى لمزاد {{$Auction->Title}}</a></li>
                <li class="breadcrumb-item "> <a href="{{ url('auctionitem/'.$Auction->id) }}">محتوى المزاد</a></li>
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

            <div class="card">                
                    <div class="card-header  d-flex justify-content-between ">
                        <p class="text-center  fs-3 fw-bold"></p>
                        <p class="text-center  fs-3 fw-bold text-primary">إضافة مزاد</p>
                        <a href="{{ url('auction') }}" class="btn btn-danger float-end">رجوع</a>
                    </div>
                <div class="card-body">
                    <form action="{{ url('add_auctionitem/'.$Auction->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="mb-3 col-md-4">
                                <label for="">اسم المزاد</label>
                                <input type="text" name="Acution_id" value="{{ $Auction->Title}}" class="form-control" style="background-color: rgb(226, 224, 224)" disabled>

                            {{-- <select name="Acution_id" class="form-control">
                                @foreach ($Auction as $item)
                                    <option value="{{ $item->id }}">{{ $item->Title}}</option>
                                    
                                @endforeach
                            </select> --}}
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="">اسم القطعة </label>
                            <input type="text" name="name" class="form-control">
                    </div>
                    <div class="mb-3 col-md-3">
                        <label for=""> المساحة</label>
                        <input type="text" name="space" class="form-control">
                        </div>
                        
                       {{--  <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="">الموقع</label>
                                <input type="text" name="location" class="form-control">
                            </div>
                        
                            <div class="mb-3 col-md-6">
                                <label for="">تفاصيل</label>
                                <textarea type="text" name="descripton" class="form-control"></textarea>
                            </div>
                        </div> --}}
                        
                       {{--  <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="">الحدالاعلى للسعر</label>
                                <input type="text" name="maxPrice" class="form-control">
                            </div>
                        
                            <div class="mb-3 col-md-6">
                                <label for="">الحد الادنى للسعر</label>
                                <textarea type="text" name="lowPrice" class="form-control"></textarea>
                            </div>
                        </div>
 --}}
                            {{--  <div class="row">
                                    <div class="mb-3 col-md-6">
                                <label for=""> المساحة</label>
                                <input type="text" name="space" class="form-control">
                            </div>
                           <div class="mb-3 col-md-6">
                                <label for=""> العرض</label>
                                <input type="text" name="width" class="form-control">
                            </div>
                        
                                <div class="mb-3 col-md-6">
                            <div class="form-group mb-3">
                                <label for="">الطول</label>
                                <input type="text" name="length"  class="form-control">
                            </div> --}}
                            
                        </div>
                            </div>
                       
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">اضف </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection