@extends('layouts.master')
@section('content')

<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb d-flex justify-content-end" dir="ltr">

                <li class="breadcrumb-item active"> <a href="{{ url('auction') }}">المزادات</a></li>
                <li class="breadcrumb-item "> <a href="{{  route('home')  }}">الرئيسية</a></li>
            </ol>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header  d-flex justify-content-between ">
                        <p class="text-center  fs-3 fw-bold"></p>
                        <p class="text-center  fs-3 fw-bold text-primary">عرض جميع المزادات</p>
                        <a href="{{ url('add-stakeholder') }}" class="btn btn-primary float-end">إضافة</a>
                    </div>
                    <div class="card-body" style="overflow-x:scroll; ">
                        <div class="container">
                            <div class="row">
                                
                            </div>
                            <table id="table11" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>أسم الشريك</th>
                                        <th>الشعار</th>
                                    </tr>
                                </thead>
                                <tbody id="myTable">
                                    @foreach ($stakeholder as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            <img src="{{ asset('uploads/logo/'.$item->logo) }}" width="70px" height="70px" alt="Image">
                                        </td>
                                        
                                        <td>
                                            <a href="{{ url('edit-stakeholder/'.$item->id) }}" class="btn btn-primary btn-sm ">تعديل</a>
                                        </td>
                                        <td>
                                            {{-- <a href="{{ url('delete-student/'.$item->id) }}" class="btn btn-danger btn-sm">Delete</a> --}}
                                            <form action="{{ url('delete-stakeholder/'.$item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm ">حذف</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
