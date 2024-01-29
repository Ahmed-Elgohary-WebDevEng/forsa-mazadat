<?php $page='auctionditailes'; ?>

@extends('website.layouts.layout')
@section('content')

<div class="content-body droid-arabic-kufi" dir="rtl">
    <div class="container-fluid">

    <div class="row">
        <div class="col-xl-12">

            @if (session('status'))
                <h6 class="alert alert-success">{{ session('status') }}</h6>
            @endif

            <div class="card">                
                  
                <div class="card-body">
                    <form action="{{ url('userLog/'.$Auction->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="">اسم المزاد</label>
                                <input type="text" name="Acution_id" value="{{ $Auction->Title}}" class="form-control" style="background-color: rgb(226, 224, 224)" disabled>

                            {{-- <select name="Acution_id" class="form-control">
                                @foreach ($Auction as $item)
                                    <option value="{{ $item->id }}">{{ $item->Title}}</option>
                                    
                                @endforeach
                            </select> --}}
                        </div>
                       
                        </div>
                        
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="">اسم الاول </label>
                                <input type="text" name="Firstname" class="form-control">
                        </div>
                            <div class="mb-3 col-md-6">
                                <label for="">الاسم الاخير</label>
                                <input type="text" name="lastname" class="form-control">
                            </div>
                        
                          
                        </div>
                        
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="">الهوية</label>
                                <input type="text" name="identity" class="form-control">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for=""> الجوال</label>
                                <input type="text" name="phone" class="form-control">
                            </div>
                        
                            
                        </div>

                         
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">الدخول </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
