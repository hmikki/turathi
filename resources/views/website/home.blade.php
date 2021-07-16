@extends('website.layout.default')
@section('content')
    <section class="advDetails">
        <div class="row">
            <div class="pictures pt-4 col-lg-6">
                <div class="row">
                    <img class="w-100" src="@if($response->image != null){{$response->image}}@else{{'assets/img/adv2.png'}}@endif">
                </div>

            </div>
            <div class="details col-lg-6">
                <div class="row pr-3 text-right">
                    <span>{{$response->Advertisement_date}}</span>
                </div>
                <div class="row">
                    <h2 class="float-right text-right col-md-12 col-lg-6">{{$response->title}}</h2>
                    <h2 class="float-left text-left col-md-12 col-lg-6">${{$response->price}}</h2>
                </div>
                <div class="row pr-3">
                    <i class="fas fa-star @if($response->rate >0) yellow @endif"></i>
                    <i class="fas fa-star @if($response->rate >1) yellow @endif"></i>
                    <i class="fas fa-star @if($response->rate >2) yellow @endif"></i>
                    <i class="fas fa-star @if($response->rate >3) yellow @endif"></i>
                </div>
                <div class="row pr-3 ">
                    <h2>الوصف</h2>
                    <p class="text-right">{{$response->description}}
                    </p>
                </div>
                <div class="row pr-3">
                    <h2>بيانات التواصل</h2>
                </div>
                <div class="row pr-3">
                    <p class="text-right">{{$response->mobile}}</p>
                </div>
                <div class="row pr-3">
                    <p class="text-right">{{$response->email}}</p>
                </div>
                <div class="row pr-3">
                    <h2>الموقع</h2>
                </div>
                <div class="row pr-3">
                    <p class="text-right">{{$response->location}}</p>
                </div>
            </div>
        </div>
    </section>
    <section class="advertisements">
        <h1 class="text-center">الاعلانات المشابهة في الموقع</h1>
        <div class="row ads">
            <div class="advertisementItem">
                <div class="advertisementImage">
                    <input type="image" src="{{'assets/img/adv1.jpeg'}}">
                </div>
                <div class="advertisementName">
                    <h6 class="text-right">تراث البيت</h6>
                    <p class="float-right">الشرقية</p>
                    <p class="float-left">550$</p>
                </div>
                <hr/>
                <div class="advertisementFooter">
                    <p class="float-right">4.9 <i class="fas fa-star"></i></p>
                    <p class="date float-left">07 مايو 2021</p>
                </div>
            </div>

        </div>
    </section>
    @stop
