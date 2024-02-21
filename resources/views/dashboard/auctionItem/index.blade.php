@extends('layouts.master')
@section('content')

    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="row page-titles">
                <ol class="breadcrumb d-flex justify-content-end" dir="ltr">
                    <li class="breadcrumb-item active"><a href="{{ url('auctionitem/'.$auction->id) }}"> محتوى
                            مزاد {{$auction->Title}}</a></li>
                    <li class="breadcrumb-item "><a href="{{ url('auction') }}">المزادات</a></li>
                    <li class="breadcrumb-item "><a href="{{  route('home')  }}">الرئيسية</a></li>
                </ol>
            </div>
            <div class="row">
                @if (session('status'))
                    <h6 class="alert alert-success">{{ session('status') }}</h6>
                @endif
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header  d-flex justify-content-between ">
                            <p class="text-center  fs-3 fw-bold"></p>
                            <p class="text-center  fs-3 fw-bold text-primary">عرض محتوى المزاد</p>
                            <a href="{{ route('auctions-items.create', $auction->id) }}" class="btn btn-primary float-end">أضف
                                جديد</a>
                        </div>
                        <div class="card-body">

                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>اسم القطعة</th>
                                    <th>المساحة</th>
                                    <th>صورة العقار</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($auction_items_details as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->space }}</td>
                                        <td>
                                            @if($item->item_image)
                                                <img
                                                    class="img-fluid object-fit-cover"
                                                    src="{{ asset('uploads/auction-items/'. $item->item_image) }}"
                                                    alt=""
                                                    width="100"
                                                    height="80"
                                                >
                                            @else
                                                <span>لا توجد صورة</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('auctions-items.edit', [$auction->id, $item->id]) }}" class="btn btn-primary btn-sm px-4">تعديل</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('auctions-items.destroy', $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm px-4">حذف</button>
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
