@extends('website.layout.default')
@section('content')
    <section class="categories bg-white">
        <h1 class="text-center">أقسام الاعلانات في الموقع</h1>
        <div class="row ads p-4 mt-5">
            @foreach($categories as $category)
            <div class="categoryItem">
                <div class="rate col-4">
                    <span> {{$category->rate}} <i class="fas fa-star"></i></span>
                </div>
                <div class="categoryImage">
                    <img src="@if($category->image != null){{$category->image}} @else {{'assets/img/adv1.jpeg'}}@endif">
                </div>
                <div class="categoryName">
                    <h6 class="text-center">{{$category->name}}</h6>
                    <p class="text-center">{{$category->advertisement_id}} اعلان</p>
                </div>
            </div>
            @endforeach
        </div>

    </section>
@stop
