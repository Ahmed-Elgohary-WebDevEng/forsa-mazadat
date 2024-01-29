<?php $page='auctionditailes'; ?>

@extends('website.layouts.layout')
@section('content')

<div class="content-body" dir="rtl">
    <div class="container-fluid">

    <div class="row">
        <div class="col-xl-12">

            @if (session('status'))
                <h6 class="alert alert-success">{{ session('status') }}</h6>
            @endif

            <div class="card">                
                  
                <div class="card-body">
                    <div class="text-center">  مرحبا بك سيتم تحويلك تلقائيا في حال لم يعمل التحويل التلقائي انقر على الرابط {{ $userlog->Firstname }}</div>
                    <div class="text-center">  رابط المزاد <a href=" {{ $Auction->link }}"> الرابط انقر هنا  </a></div>
					    <meta http-equiv = "refresh" content = "2; url = {{ $Auction->link }}" />


                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection