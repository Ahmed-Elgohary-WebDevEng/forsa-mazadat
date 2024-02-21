@extends('layouts.master')
@section('content')

    <div class="content-body" dir="rtl">
        <div class="container-fluid">
            <div class="row page-titles">
                <ol class="breadcrumb d-flex justify-content-end" dir="ltr">
                    <li class="breadcrumb-item active"><a href="{{ route('companies.create')}}">إضافة شركة</a></li>
                    <li class="breadcrumb-item "><a href="{{ route('companies.index') }}">الشركات</a></li>
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
                            <p class="text-center  fs-3 fw-bold text-primary">إضافة شركة</p>
                            <a href="{{ route('companies.index') }}" class="btn btn-danger float-end">رجوع</a>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="">اسم الشركة</label>
                                        <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="">معلومات التواصل</label>
                                        <textarea type="text" name="info_details" class="form-control">{{old('info_details')}}</textarea>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">شعار الشركة</label>
                                        <div class="input-group mb-6">
                                            <div class="form-file">
                                                <input type="file" name="logo" value="{{ old('logo') }}" class="form-control" accept="image/*">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">نبذة عن الشركة</label>
                                        <div class="input-group mb-6">
                                            <div class="form-file">
                                                <textarea name="description" class="form-control" id="description" rows="7"></textarea>
                                            </div>
                                        </div>
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
