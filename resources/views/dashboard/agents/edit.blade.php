@extends('layouts.master')
@section('content')


<div class="content-body" dir="rtl">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb d-flex justify-content-end" dir="ltr">
                <li class="breadcrumb-item active"><a href="{{ url('add-agents')}}">إضافة وكيل</a></li>
                <li class="breadcrumb-item "> <a href="{{ url('/agents') }}">عرض الوكلاء</a></li>
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
                        <p class="text-center  fs-3 fw-bold text-primary">إضافة وكيل</p>
                        <a href="{{ url('/agents') }}" class="btn btn-danger float-end">رجوع</a>
                    </div>
                <div class="card-body">
                    <form action="{{ url('update-agents/'.$agent->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">

                            <div class="mb-3 col-md-4">
                                <label for=""> اسم الشريك</label>
                                <input type="text" value="{{$agent->name}}"  name="name" class="form-control">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="">الرابط</label>
                                <input type="text" name="link" value="{{$agent->link}}"   class="form-control">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="">الشعار</label>
                                <input type="file" name="logo" class="form-control">
                                <img src="{{ asset('uploads/agentsLogo/'.$agent->logo) }}" width="70px" height="70px" alt="Image">

                            </div>
                            
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">تحديث </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

