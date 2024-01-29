@extends('layouts.master')
@section('content')

<div class="content-body">
    <!-- row -->
    <div class="container-fluid"> 
		<div class="row page-titles">
			<p class="text-end fw-bold  fs-3"> <span  class="  text-primary"> {{ $reminder->count() }}  </span>  عدد المسجلين بالتذكير بالمزادات </p>
		</div>
               <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header  d-flex justify-content-between ">
                        <p class="text-center  fs-3 fw-bold">  <button class="btn  btn-primary float-end btn-sm" id="run-command-btn">ارسال تاكيد الموعد غدا</button></p>
                        <p class="text-center  fs-3 fw-bold text-primary">عرض المسجلين بالتذكير لكل المزادات </p>
					</div>
					{{--	<div class="container  float-end ">
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
                    </div>--}}

                    <div class="card-body">
                        <button class="btn  btn-primary float-end btn-sm" id="btPrint" onclick="createPDF()"><b> PDF إستخراج ملف</b></button>

                        <div id="tab">

                        <table class="table table-bordered table-striped"  id="generatePDF">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>اسم المزاد</th>
                                    <th> اسم الكامل </th>
                                    <th> رقم الجوال </th>
                                    <th>  الوقت و التاريخ</th>
                                    <th> حالة الارسال</th>

                                    <th></th>
                                 

                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($reminder->sortBy('id') as $item)
								 @foreach ($Auction as $Auctions )

                                @if($item->Acution_id == $Auctions->id)

                                 <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $Auctions->Title }}</td>
                                    <td>{{ $item->Fullname }}</td> 
                                    <td>{{ $item->mobile_no }}</td>
                                    <td>{{ $item->timezoneoffset }}</td>
                      @if($item->is_sent)
                                        <td style="background-color: rgb(59, 226, 176); color: black">

                                            <span >تم الارسال</span></td>
                                        @else
                                        <td style="background-color:rgb(238, 238, 148); color: black">

                                            <span > انتظار</span></td>                                       
                                            @endif
                                    
                                   {{--  <td>
                                        {{-- <a href="{{ url('delete-student/'.$item->id) }}" class="btn btn-danger btn-sm">Delete</a> 
                                        <form action="{{ url('delete_reminder/'.$item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                                        </form>
                                    </td> --}}
                                </tr>
                                @endif
                                @endforeach
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
     $('#run-command-btn').click(function() {
    $.ajaxSetup({
            headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
         });
    $.ajax({
        url: '{{ route('run-command') }}',
        
        type: 'POST',
        dataType: 'json',
        success: function(response) {
            console.log(response.output);
            // Handle the response as needed
        }
    });
});
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
        </script>    <script>
        function createPDF() {
        var sTable = document.getElementById('tab').innerHTML;

        var style = "<style>";
        style = style + "table {width: 100%;font: 17px Calibri;}";
        style = style + "table, th, td {border: solid 1px #DDD; border-collapse: collapse;";
        style = style + "padding: 2px 3px;text-align: center;}";
        style = style + "</style>";

        // CREATE A WINDOW OBJECT.
        var win = window.open('', '', 'height=700,width=700');

        win.document.write('<html><head>');
        win.document.write('<title>Profile</title>');   // <title> FOR PDF HEADER.
        win.document.write(style);          // ADD STYLE INSIDE THE HEAD TAG.
        win.document.write('</head>');
        win.document.write('<body>');
        win.document.write(sTable);         // THE TABLE CONTENTS INSIDE THE BODY TAG.
        win.document.write('</body></html>');

        win.document.close(); 	// CLOSE THE CURRENT WINDOW.

        win.print();    // PRINT THE CONTENTS.
    }
     </script>
    @endsection
    @endsection
