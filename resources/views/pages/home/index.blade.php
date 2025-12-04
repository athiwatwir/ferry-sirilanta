@extends('layouts.home')

@section('content')
@php
$sliders = [
[
'img'=>'img/content/1702205725.jpg',
'title'=>'Kho Lanta',
'text'=>"“Koh Lanta is the best choices for an islanders' livealong. the Center of the Andaman sea's islands”"
],
[
'img'=>'img/content/1706948182.jpg',
'title'=>'Koh Lipe',
'text'=>"“Koh Lipe has always been the main highlight of the Andaman sea. To be isolated away from...”"
],
[
'img'=>'img/content/1706860395.png',
'title'=>'Railay',
'text'=>"“Railay - Miracle of a landlocked scenic beach! Enjoying your leisure stay under the beautiful...”"
],
[
'img'=>'img/content/1706860759.jpg',
'title'=>'Koh Phi Phi',
'text'=>"“The Phi Phi Islands are an island group in Thailand administratively part of Krabi Province...”"
],
[
'img'=>'img/content/1702205742.jpg',
'title'=>'Phuket',
'text'=>"“Phuket is considered a province and the largest island of Thailand. The town has been the famous...”"
],
[
'img'=>'img/content/1706948182.jpg',
'title'=>'Kho Lanta',
'text'=>"“Koh Lipe has always been the main highlight of the Andaman sea. To be isolated away from...”"
],
];
@endphp
<div class="row mt-4" style="display: none;">
    <div class="col">
        <section id="landingReviews" class="bg-body landing-reviews pb-0 mt-4">
            <!-- What people say slider: Start -->
            <div class="container">
                <div class="row align-items-center gx-0 gy-4 g-lg-5 mb-5 pb-md-5">
                    <div class="col-12">
                        <div class="swiper-reviews-carousel overflow-hidden">
                            <div class="swiper" id="swiper-reviews">
                                <div class="swiper-wrapper">
                                    @foreach ($sliders as $slider)
                                    <div class="swiper-slide">
                                        <div class="card h-100">
                                            <div class="card-body p-2 text-body d-flex flex-column justify-content-between h-100">
                                                <div class="mb-4">
                                                    <img src="{{ asset($slider['img']) }}" alt="client logo" class="img-fluid rounded" />
                                                </div>
                                                <p>
                                                    {{ $slider['text'] }}
                                                </p>
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <h5 class="mb-0">{{ $slider['title'] }}</h5>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach

                                </div>
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<div class="row" style="display: none;">
    <div class="col-12 col-lg-8 mx-auto mt-4">
        <div class="row justify-content-center align-items-center">
            <div class="col-2 col-lg-2 d-flex justify-content-center">
                <img src="{{ asset('img/partner/nokair-logo.webp') }}" alt="" class="w-100">
            </div>
            <div class="col-2 col-lg-2 d-flex justify-content-center">
                <img src="{{ asset('img/partner/SiriLanta_Speedboat.webp') }}" alt="" class="w-100">
            </div>
            <div class="col-2 col-lg-2 d-flex justify-content-center">
                <img src="{{ asset('img/partner/spd-logo.webp') }}" alt="" class="w-100">
            </div>
            <div class="col-2 col-lg-2 d-flex justify-content-center">
                <img src="{{ asset('img/partner/7-11_logo.webp') }}" alt="" class="w-100">
            </div>
            <div class="col-2 col-lg-2 d-flex justify-content-center">
                <img src="{{ asset('img/partner/123travel-logo.webp') }}" alt="" class="w-100">
            </div>
            <div class="col-2 col-lg-2 d-flex justify-content-center">
                <img src="{{ asset('img/partner/aisasia.webp') }}" alt="" class="w-100">
            </div>
        </div>
    </div>
</div>
@stop
