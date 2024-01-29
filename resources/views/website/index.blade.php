<?php $page='index'; ?>
@extends('website.layouts.layout')

@section('content')
@include ('website.sl')

@include ('website.agents')


@include ('website.auction')
@include('website.stakeholder')


@section('script')
      <script src="{{ asset('js/bootstrap.bundle.min.js') }}">

</script>


<script >
$(document).ready(function(){

   var url = document.location.toString();
    if (url.match('#')) {
        $('.nav-tabs a[href="#' + url.split('#')[1] + '"]')[0].click();
    } 

    //To make sure that the page always goes to the top
    setTimeout(function () {
        window.scrollTo(0, 0);
    },200);

  });
  </script>
@endsection
@stop