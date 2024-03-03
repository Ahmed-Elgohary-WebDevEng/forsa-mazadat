@extends('layouts.master')
@section('content')

    <div class="content-body" dir="rtl">
        <div class="container-fluid">
            <div class="row page-titles">
                <ol class="breadcrumb d-flex justify-content-end" dir="ltr">
                    <li class="breadcrumb-item active"><a href="{{ route('offers.create')}}">إضافة عرض</a></li>
                    <li class="breadcrumb-item "><a href="{{ route('offers.index') }}">العروض</a></li>
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
                            <p class="text-center  fs-3 fw-bold text-primary">إضافة عرض</p>
                            <a href="{{ route('offers.index') }}" class="btn btn-danger float-end">رجوع</a>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('offers.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="">نوع العقار</label>
                                        <input type="text" name="type" value="{{ old('type') }}" class="form-control">
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="">المساحة</label>
                                        <input type="text" name="space" value="{{ old('space') }}" class="form-control">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="">الحي</label>
                                        <input type="text" name="area" value="{{ old('area') }}" class="form-control">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="">الموقع</label>
                                        <input type="url" name="location" value="{{ old('location') }}" class="form-control">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="">صورة العرض</label>
                                        <input type="file" name="image" class="form-control">
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
@endsection
