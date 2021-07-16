@extends('website.layout.default')
@section('content')
    <section class="advertisements">
        <h1 class="text-center">الاعلانات المميزة في الموقع</h1>
        <div class="row ads">
            @foreach($advertisements as $advertisement)
            <div class="advertisementItem">
                <div class="advertisementImage">
                    <input type="image" src="@if($advertisement->image != null){{$advertisement->image}} @else {{'assets/img/adv1.jpeg'}}@endif">
                </div>
                <div class="advertisementName">
                    <h6 class="text-right">{{$advertisement->title}}</h6>
                    <p class="float-right">{{$advertisement->location}}</p>
                    <p class="float-left">{{$advertisement->price}}$</p>
                </div>
                <hr/>
                <div class="advertisementFooter">
                    <p class="float-right">{{$advertisement->rate}} <i class="fas fa-star"></i></p>
                    <p class="date float-left">{{$advertisement->Advertisement_date}}</p>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    @stop
