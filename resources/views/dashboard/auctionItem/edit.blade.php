@extends('layouts.master')
@section('content')

    <div class="content-body" dir="rtl">
        <div class="container-fluid">
            <div class="row page-titles">
                <ol class="breadcrumb d-flex justify-content-end" dir="ltr">
                    <li class="breadcrumb-item active"><a href="{{ url('edit_auctionitem/'.$auction_item->id)}}">
                            تعديل {{$auction_item->name}}</a></li>
                    <li class="breadcrumb-item "><a href="{{ route('auctions-items.index', $auction->id) }}">محتوى
                            المزاد</a></li>
                    <li class="breadcrumb-item "><a href="{{ url('auction') }}">المزادات</a></li>
                    <li class="breadcrumb-item "><a href="{{  route('home')  }}">الرئيسية</a></li>
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
                                <form action="{{ route('auctions-items.update', [$auction->id, $auction_item->id]) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                            <label for="">اسم القطعة </label>
                                            <input type="text" name="name" class="form-control" value="{{ $auction_item->name }}">
                                            @error('name')
                                            <span class="text-danger fw-semibold">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label for=""> المساحة</label>
                                            <input type="text" name="space" class="form-control" value="{{ $auction_item->space }}">
                                            @error('space')
                                            <span class="text-danger fw-semibold">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label for=""> رقم الصك</label>
                                            <input type="number" name="number" class="form-control" value="{{ $auction_item->number }}">
                                            @error('number')
                                            <span class="text-danger fw-semibold">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label for="">صورة العقار</label>
                                                <input type="file" name="image" accept="image/*" class="form-control">
                                                <img class="object-fit-cover img-fluid" src="{{ asset('uploads/auction-items/' . $auction_item->item_image) }}" alt="logo" width="100" height="100">
                                                @error('image')
                                                <span class="text-danger fw-semibold">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="">موقع العقار</label>
                                                <input type="url" name="location" class="form-control" value="{{ $auction_item->location }}">
                                                @error('location')
                                                <span class="text-danger fw-semibold">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group mb-3">
                                            <button type="submit" class="btn btn-primary">حفظ التعديلات</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
