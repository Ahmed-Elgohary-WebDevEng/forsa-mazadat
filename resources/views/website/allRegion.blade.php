<?php $page='index'; ?>
@extends('website.layouts.layout')

@section('content')


@include ('website.auction')

@section('script')
      <script src="{{ asset('js/bootstrap.bundle.min.js') }}">

</script>
@endsection
@stop
