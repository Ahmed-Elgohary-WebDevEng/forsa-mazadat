@extends('layouts.master')
@section('content')

    <div class="content-body" dir="rtl">
        <div class="container-fluid">
            <div class="row page-titles">
                <ol class="breadcrumb d-flex justify-content-end" dir="ltr">
                    <li class="breadcrumb-item active"><a href="{{ url('add_auctionitem')}}">إضافة محتوى
                            لمزاد {{$auction->Title}}</a></li>
                    <li class="breadcrumb-item "><a href="{{ url('auctionitem/'.$auction->id) }}">محتوى المزاد</a></li>
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

                    <div class="card">
                        <div class="card-header  d-flex justify-content-between ">
                            <p class="text-center  fs-3 fw-bold"></p>
                            <p class="text-center  fs-3 fw-bold text-primary">إضافة مزاد</p>
                            <a href="{{ url('auction') }}" class="btn btn-danger float-end">رجوع</a>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('auctions-items.store', $auction->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="mb-3 col-md-4">
                                        <label for="">اسم القطعة </label>
                                        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                                        @error('name')
                                        <span class="text-danger fw-semibold">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-3">
                                        <label for=""> المساحة</label>
                                        <input type="text" name="space" class="form-control" value="{{ old('space') }}">
                                        @error('space')
                                        <span class="text-danger fw-semibold">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-5">
                                        <label for="">صورة العقار</label>
                                        <input type="file" name="image" accept="image/*" class="form-control">
                                        @error('image')
                                        <span class="text-danger fw-semibold">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
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
    </div>
@endsection
