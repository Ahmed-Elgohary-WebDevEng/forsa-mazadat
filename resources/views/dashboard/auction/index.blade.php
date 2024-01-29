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
                        <a href="{{ url('add_auction') }}" class="btn btn-primary float-end">أضف جديد</a>
                    </div>
                    <div class="card-body" style="overflow-x:scroll; ">
                        <div class="container">
                            <div class="row">
                                 <div class="col-4">
                                    <select class="form-select" id='filterText' style='display:inline-block'
                                        onchange='filterText()'>
                                      
                                            <option style="text-decoration: none; color:#454343" selected disabled > المناطق </option>
                                            <option style="text-decoration: none; color:#454343"  value="all"> الكل </option>
                                            <option style="text-decoration: none; color:#454343"  value="مكة المكرمة">مكة المكرمة </option>
                                            <option style="text-decoration: none; color:#454343"  value="المدينة المنورة">المدينة المنورة </option>
                                            <option  style="text-decoration: none; color:#454343"  value="الرياض">الرياض </option>
                                            <option class="dropdown-item"
                                                style="text-decoration: none; color:#454343" value="القصيم">القصيم
                                                </a></option>
                                            <option class="dropdown-item"
                                                style="text-decoration: none; color:#454343" value="حائل">حائل
                                                </a></option>
                                            <option class="dropdown-item"
                                                style="text-decoration: none; color:#454343" value="المنطقة الشرقية">
                                                المنطقة الشرقية </a></option>
                                            <option class="dropdown-item"
                                                style="text-decoration: none; color:#454343" value="الجوف">الجوف
                                                </a></option>
                                            <option class="dropdown-item"
                                                style="text-decoration: none; color:#454343" value="تبوك">تبوك
                                            </option>
                                            <option class="dropdown-item"
                                                style="text-decoration: none; color:#454343" value="تبوك">تبوك
                                            </option>
                                            <option class="dropdown-item"
                                                style="text-decoration: none; color:#454343" value="جازان">جازان
                                            </option>
                                            <option class="dropdown-item"
                                                style="text-decoration: none; color:#454343" value="الباحة">الباحة
                                            </option>
                                            <option class="dropdown-item"
                                                style="text-decoration: none; color:#454343" value="المنطقة الشمالية">
                                                المنطقة الشمالية </option>
                                            <option class="dropdown-item"
                                                style="text-decoration: none; color:#454343" value="عسير">عسير
                                            </option>
                                
                                        </select>
                                </div>
                                <div class="col-4">
                                    <select class="form-select"  id="roleDropdown" onchange='filterText()'>
                                        <option style="text-decoration: none; color:#454343" disabled > نوع المزاد </option>

                                            <option  style="text-decoration: none; color:#454343" value="all">الكل</option>
                                            <option class="dropdown-item"
                                                style="text-decoration: none; color:#454343" value="حضوري">
                                                حضوري</a></option>
                                            <option class="dropdown-item"
                                                style="text-decoration: none; color:#454343" value="إلكتروني">
                                                إلكتروني </a></option>
                                            <option class="dropdown-item"
                                                style="text-decoration: none; color:#454343" value="هجين">هجين </a>
                                            </option>
                                        </select>
                                </div>
                             
                            </div>
                            <table id="table11" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>عنوان المزاد </th>
                                        <th>منطقة المزاد </th>
                                        <th>نوع المزاد </th>
                                        <th>تاريخ ووقت البداية المزاد </th>
                                        <th> إظهار انفاذ </th>
                                        <th> إسم المنصة </th>
                                        <th> محتوى</th>

                                    </tr>
                                </thead>
                                <tbody id="myTable">
                                    @foreach ($auction as $item)
                                    <tr class="content">
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->Title }}</td>
                                        <td> @if ($item->Region =='riyadh' )
                                            {{"الرياض"}}
                                            @elseif ($item->Region =='makka')
                                            {{"مكة المكرمة"}}
                                            @elseif ($item->Region =='almadina')
                                            {{"المدينة المنورة"}}
                                             @elseif ($item->Region =='alsharqia')
                                            {{"المنطقة الشرقية"}}
                                                              @elseif ($item->Region =='aljuof')
                                            {{"الجوف"}}
                                                              @elseif ($item->Region =='tabuk')
                                            {{"تبوك"}}
                                                              @elseif ($item->Region =='haael')
                                            {{"حائل"}}
                                                              @elseif ($item->Region =='qassim')
                                            {{"القصيم"}}
                                                              @elseif ($item->Region =='najran')
                                            {{"نجران"}}
                                                              @elseif ($item->Region =='jazan')
                                            {{"جازان"}}
                                                              @elseif ($item->Region =='albaha')
                                            {{"الباحة"}}
                                                              @elseif ($item->Region =='shmaleah')
                                            {{"المنطقة الشمالية"}}
                                                              @elseif ($item->Region =='asser')
                                            {{"عسير "}}
                                            @endif</td>

                                        <td>@if ($item->type == "onsite")
                                            {{"حضوري"}}
                                            @elseif ($item->type == "online")
                                            {{"إلكتروني"}}
                                            @elseif ($item->type == "mixed")
                                            {{"هجين"}}
                                            @endif</td>
                                        <td>{{ $item->dateOfStarting }} / {{ $item->timeOfStarting }}</td>
                                        <td>{{ $item->ShowInfath }}</td>
                                        <td>{{ $item->PlatformName }}</td>

                                        <td>
                                            <a href="{{ url('auctionitem/'.$item->id) }}"
                                                class="btn btn-primary btn-sm"> المحتوى</a>

                                        </td>
                                        <td>
                                            <a href="{{ url('edit_auction/'.$item->id) }}"
                                                class="btn btn-primary btn-sm">تعديل</a>

                                        </td>
                                        <td>
                                            <a href="{{ url('userlog/'.$item->id) }}" class="btn btn-primary btn-sm">سجل
                                                المشتركين</a>

                                        </td>
                                        <td>
                                            <a href="{{ url('reminderindex/'.$item->id) }}" class="btn btn-primary btn-sm">سجل
                                                المشتركين بالتذكير</a>

                                        </td>
                                        <td>
                                            {{-- <a href="{{ url('delete-student/'.$item->id) }}"
                                                class="btn btn-danger btn-sm">Delete</a> --}}
                                            <form action="{{ url('delete_auction/'.$item->id) }}" method="POST">
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
        @section('script')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

        <script>
            function filterText()
	{  
		var rex = new RegExp($('#filterText').val());
		var rex2 = new RegExp($('#roleDropdown').val());
		if(rex =="/all/" || rex2 =="/all/"){clearFilter()}
         if(rex !="/all/") {
			$('.content').hide();
			$('.content').filter(function() {
			return rex.test($(this).text());
			}).show();
	} if(rex2 !="/all/"){
        $('.content').hide();
			$('.content').filter(function() {
			return rex2.test($(this).text());
			}).show();
    }  if (rex2 !="/all/" && rex !="/all/"){
        $('.content').hide();
			$('.content').filter(function() {
			 
            return rex2.test($(this).text()) && rex.test($(this).text());

			}).show();
            
			

		
	}
}
	
function filterText1()
	{  
		var rex2 = new RegExp($('#roleDropdown').val());
		if(rex2 =="/all/"){clearFilter()}else{
			$('.content').hide();
			$('.content').filter(function() {
			return rex2.test($(this).text());
			}).show();
	}
		
	}
	
function clearFilter()
	{
		$('.filterText').val('');
		$('.content').show();
	}
        </script>


        @endsection
        @stop