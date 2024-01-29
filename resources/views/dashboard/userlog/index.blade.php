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
                        <p class="text-center  fs-3 fw-bold"> 
							<span class="text-primary">{{ $counters }}</span> :عدد المسجلين بالمزاد
						</p>
                        <p class="text-center  fs-3 fw-bold text-primary">عرض المسجلين بالمزاد</p>
{{--                         <a href="{{ url('add_userlog/'.$Auction->id) }}" class="btn btn-primary float-end">أضف جديد</a>
 --}}                    </div>
                    <div class="card-body">
    
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th> اسم المزاد</th>
                                    <th>اسم الاول</th>
                                    <th> اسم الاخير </th>
                                    <th> الهوية</th>
                                    <th>الجوال</th>
                                    

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($userlog as $item)
                              @if($item->Acution_id == $Auction->id)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                     <td>{{$Auction->Title}}</td> 
                                    <td>{{ $item->Firstname }}</td>
                                    <td>{{ $item->lastname}}</td>
                                    <td>{{ $item->identity}}</td>
                                    <td>{{ $item->phone}}</td>
                                    
                                                                
                                   {{--  <td>
                                        <a href="{{ url('edit_userlog/'.$item->id.'/'.$Auction->id) }}" class="btn btn-primary btn-sm">تعديل</a>
                                    </td>
                                    <td>
                                        {{-- <a href="{{ url('delete-student/'.$item->id) }}" class="btn btn-danger btn-sm">Delete</a> --}}
                                       {{--  <form action="{{ url('delete_userlog/'.$item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                                        </form>
                                    </td> --}}
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