@extends('layouts.new-app')

@section('title', 'الرئيسية')

@section('styles')
    <!--  Custom Style  -->
    <link rel="stylesheet" href="{{ asset('new-template/src/styles/home.css') }}"/>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row gx-5">
            <div class="col-lg-9 order-lg-1 order-2">
                {{--  Company head logos  --}}
                <x-new-design.company-logos-title></x-new-design.company-logos-title>

                {{--  Title  --}}
                <div class="row mt-5 mb-2">
                    <div
                        class="d-inline-flex align-items-center gap-3 auction__type text-blue"
                    >
                        <span class="h5 fw-semibold me-4 m-0">مزادات</span>
                        <div class="types">
                            <a href="/?date=now&{{ http_build_query(request()->except('date', 'page')) }}" class="small {{ request()->query('date') === 'now' ? 'active' : '' }}">جاري</a>
                            <a href="/?date=soon&{{ http_build_query(request()->except('date', 'page')) }}" class="small {{ request()->query('date') === 'soon' ? 'active' : '' }}">قادم</a>
                            <a href="/?date=done&{{ http_build_query(request()->except('date', 'page')) }}" class="small {{ request()->query('date') === 'done' ? 'active' : '' }}">منتهى</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 text-center order-lg-2 order-1">
                <iframe
                    class="w-100 video"
                    height="200"
                    src="https://www.youtube.com/embed/bvM_R_o9IWg?si=qFxuLF-bopHIz31M"
                    title="YouTube video player"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                ></iframe>
            </div>
        </div>
        <div class="row mb-5 justify-content-between gy-4">
            <div class="col-lg-10">

                @if(count($auctions) > 0)
                    <div class="row row-cols-1 row-cols-xl-2 row-cols-xxl-3 g-4">
                        {{--  Auction Card  --}}
                        @foreach($auctions as $key => $item)
                            <x-new-design.auction-card :item="$item" :key="$key"></x-new-design.auction-card>
                        @endforeach
                    </div>

                    @if($paginate)
                        <div class="row mt-5 justify-content-center align-items-center" style="margin-top: 30px">
                            {{ $auctions->links()}}
                        </div>
                    @endif
                @else
                    <h3 class="text-danger fw-semibold text-center my-5">لا توجد نتائج</h3>
                @endif
            </div>
            <div class="col-lg-2">
                <div
                    class="row justify-content-center align-items-center"
                    style="overflow-y: hidden; height: 500px"
                >
                    <div class="row auction-offer flex-lg-column">
                        {{--  Auction Offer  --}}
                        <div
                            class="offer-card rounded-4 py-1 fs-6 fw-semibold text-center"
                        >
                            <span>فئة سكنية</span>
                            <span>910 م</span>
                            <span>حى النرجس</span>
                        </div>
                        <div
                            class="offer-card rounded-4 py-1 fs-6 fw-semibold text-center"
                        >
                            <span>فئة سكنية</span>
                            <span>910 م</span>
                            <span>حى النرجس</span>
                        </div>
                        <div
                            class="offer-card rounded-4 py-1 fs-6 fw-semibold text-center"
                        >
                            <span>فئة سكنية</span>
                            <span>910 م</span>
                            <span>حى النرجس</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
