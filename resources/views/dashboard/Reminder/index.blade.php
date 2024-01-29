@extends('layouts.master')
@section('content')

<div class="content-body">
    <!-- row -->
    <div class="container-fluid"> 
               <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header  d-flex justify-content-between ">
                        <p class="text-center  fs-3 fw-bold">				
							<span class="text-primary">{{ $counters }}</span> :عدد المسجلين بالتذكير بالمزاد

							
						</p>
                        <p class="text-center  fs-3 fw-bold text-primary">
                            {{ $Auction->Title }} عرض  المسجلين بالتذكير لمزاد </p>
						
                    </div>
                    <div class="card-body">
                      

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>اسم المزاد</th>
                                    <th> اسم الكامل </th>
                                    <th> رقم الجوال </th>
                                    <th>  الوقت و التاريخ</th>
                                    <th></th>
                                 

                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($reminder as $item)
                                 @if($item->Acution_id == $Auction->id)
                                 <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $Auction->Title }}</td>
                                    <td>{{ $item->Fullname }}</td>
                                    <td>{{ $item->mobile_no }}</td>
                                    <td>{{ $item->timezoneoffset }}</td>
                              
                                    
                                    {{-- <td>
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
                           </tbody>
                        </table>
    
                    </div>
                </div>
            </div>
        </div>
    </div>
    @section('script')
    <script>
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
