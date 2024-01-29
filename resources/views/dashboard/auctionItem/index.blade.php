@extends('layouts.master')
@section('content')

<div class="content-body">
    <!-- row -->
    <div class="container-fluid"> 
        <div class="row page-titles">
            <ol class="breadcrumb d-flex justify-content-end" dir="ltr">
                <li class="breadcrumb-item active"> <a href="{{ url('auctionitem/'.$Auction->id) }}"> محتوى مزاد {{$Auction->Title}}</a></li>
                <li class="breadcrumb-item "> <a href="{{ url('auction') }}">المزادات</a></li>
                <li class="breadcrumb-item "> <a href="{{  route('home')  }}">الرئيسية</a></li>
            </ol>
        </div>
               <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header  d-flex justify-content-between ">
                        <p class="text-center  fs-3 fw-bold"></p>
                        <p class="text-center  fs-3 fw-bold text-primary">عرض  محتوى المزاد</p>
                        <a href="{{ url('add_auctionitem/'.$Auction->id) }}" class="btn btn-primary float-end">أضف جديد</a>
                    </div>
                    <div class="card-body">
    
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>اسم المزاد</th>
                                    <th> اسم القطعة </th>
                                    <th>المساحة</th>

                                   {{--  <th> المنطقة</th>
                                    <th>عنوان</th>
                                    <th> العرض </th>
                                    <th>الطول</th>
 --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Actionitems as $item)
                              @if($item->Acution_id == $Auction->id)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->Acution->Title }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->space }}</td>

                                   {{--  <td>{{ $item->location}}</td>
                                    <td>{{ $item->Acution->Region }}</td>
                                    <td>{{ $item->width }}</td>
                                    <td>{{ $item->length }}</td> --}}
                                                                
                                    <td>
                                        <a href="{{ url('edit_auctionitem/'.$item->id.'/'.$Auction->id) }}" class="btn btn-primary btn-sm">تعديل</a>
                                    </td>
                                    <td>
                                        {{-- <a href="{{ url('delete-student/'.$item->id) }}" class="btn btn-danger btn-sm">Delete</a> --}}
                                        <form action="{{ url('delete_auctionitem/'.$item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                                        </form>
                                    </td>
                                </tr>
                               @endif
                                 @endforeach
                           </tbody>
                        </table>
    
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection