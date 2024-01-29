
@extends('layouts.master')
@section('content')

<div class="content-body" dir="rtl">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb d-flex justify-content-end" dir="ltr">
                <li class="breadcrumb-item active"><a href="{{ url('edit_auctionitem/'.$Actionitems->id)}}">  تعديل  {{$Actionitems->name}}</a></li>
                <li class="breadcrumb-item active"> <a href="{{ url('auctionitem/'.$Auction->id) }}"> محتوى مزاد {{$Auction->Title}}</a></li>
                <li class="breadcrumb-item "> <a href="{{ url('auction') }}">المزادات</a></li>
                <li class="breadcrumb-item "> <a href="{{  route('home')  }}">الرئيسية</a></li>
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
                        <p class="text-center  fs-3 fw-bold text-primary">تعديل على المزاد </p>
                        <a href="{{ url('auction') }}" class="btn btn-danger float-end">رجوع</a>
                    </div>
                    <div class="card-body">

                        <div class="col-xl-12">
                            <form action="{{ url('update_auctionitem/'.$Actionitems->id.'/'.$Auction->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="">اسم المزاد</label>
                                <input type="text" name="Acution_id" value="{{ $Auction->Title}}" class="form-control" style="background-color: rgb(226, 224, 224)" disabled>

                                 {{--    <select name="Acution_id" class="form-control">
                                        @foreach ($Auctions as $item)
                                            <option value="{{ $item->id }}"{{ $Actionitems->Acution_id == $item->id ? 'selected':'' }}>
                                                {{ $item->Title}}
                                            </option>
                                            
                                        @endforeach
                                    </select> --}}
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="">اسم القطعة </label>
                                    <input type="text" name="name" class="form-control" value="{{$Actionitems->name}}">
                            </div>
                                </div>
                                
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="">الموقع</label>
                                        <input type="text" name="location" class="form-control" value="{{$Actionitems->location}}">
                                    </div>
                                
                                    <div class="mb-3 col-md-6">
                                        <label for="">تفاصيل</label>
                                        <textarea type="text" name="descripton" class="form-control" value="{{$Actionitems->descripton}}">{{$Actionitems->descripton}}</textarea>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="">الحدالاعلى للسعر</label>
                                        <input type="text" name="maxPrice" class="form-control" value="{{$Actionitems->maxPrice}}">
                                    </div>
                                
                                    <div class="mb-3 col-md-6">
                                        <label for="">الحد الادنى للسعر</label>
                                        <input type="text" name="lowPrice" class="form-control" value="{{$Actionitems->lowPrice}}">
                                    </div>
                                </div>
        
                                    <div class="row">
                                            <div class="mb-3 col-md-6">
                                        <label for=""> المساحة</label>
                                        <input type="text" name="space" class="form-control" value="{{$Actionitems->space}}">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for=""> العرض</label>
                                        <input type="text" name="width" class="form-control" value="{{$Actionitems->width}}">
                                    </div>
                                
                                        <div class="mb-3 col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="">الطول</label>
                                        <input type="text" name="length"  class="form-control" value="{{$Actionitems->length}}">
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
@endsection