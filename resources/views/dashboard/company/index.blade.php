@extends('layouts.master')

@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="row page-titles">
                <ol class="breadcrumb d-flex justify-content-end" dir="ltr">

                    <li class="breadcrumb-item active"><a href="{{ route('companies.index') }}">الشركات</a></li>
                    <li class="breadcrumb-item "><a href="{{  route('home')  }}">الرئيسية</a></li>
                </ol>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header  d-flex justify-content-between ">
                            <p class="text-center  fs-3 fw-bold"></p>
                            <p class="text-center  fs-3 fw-bold text-primary">عرض جميع الشركات</p>
                            <a href="{{ route('companies.create') }}" class="btn btn-primary float-end">أضف جديد</a>
                        </div>
                        @if (session('status'))
                            <h6 class="alert alert-success my-0">{{ session('status') }}</h6>
                        @endif
                        <div class="card-body" style="overflow-x:scroll; ">
                            <div class="container">
                                <table id="table11" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th> إسم الشركة</th>
                                        <th>شعار الشركة</th>
                                        <th>معلومات التواصل</th>
                                        <th>نبذة عن الشركة</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody id="myTable">
                                    @foreach ($companies as $item)
                                        <tr class="content">
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>
                                                <img
                                                    class="img-fluid object-fit-cover"
                                                    src="{{ asset('uploads/company/'. $item->logo) }}"
                                                    alt=""
                                                    width="150"
                                                    height="150"
                                                >
                                            </td>
                                            <td>{{ $item->info_details }}</td>
                                            <td>{{ $item->description }}</td>
                                            <td>
                                                <a href="{{ route('companies.edit', $item->id) }}"
                                                   class="btn btn-primary btn-sm">تعديل</a>
                                            </td>
                                            <td>
                                                <form action="{{ route('companies.destroy', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">حذف</button>
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
        </div>
        @endsection
        @section('script')
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
            <!-- Include all compiled plugins (below), or include individual files as needed -->
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
@endsection

