@extends('layouts.master')
@section('content')



<div class="content-body" dir="rtl">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb d-flex justify-content-end" dir="ltr">
                <li class="breadcrumb-item active"><a href="{{ url('add-stakeholder')}}">إضافة شريك</a></li>
                <li class="breadcrumb-item "> <a href="{{ url('/stakeholder') }}">عرض شريك النجاح</a></li>
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
                        <p class="text-center  fs-3 fw-bold text-primary">إضافة شريك</p>
                        <a href="{{ url('/stakeholder') }}" class="btn btn-danger float-end">رجوع</a>
                    </div>
                <div class="card-body">
                    <form action="{{ url('add-stakeholder') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">

                            <div class="mb-3 col-md-4">
                                <label for=""> اسم الشريك</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="">الرابط</label>
                                <input type="text" name="link" class="form-control">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="">الشعار</label>
                                <input type="file" name="logo" class="form-control">
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

@endsection








