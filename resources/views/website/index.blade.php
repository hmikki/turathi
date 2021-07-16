@extends('website.layout.default')
@section('content')
    <section class="sliderSection">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                @foreach($Sliders as $index => $slider)
                 <div class="carousel-item @if($index == 0) active @endif">
                     <img class="d-block w-100" src="@if($slider->image != null){{$slider->image}} @else {{'assets/img/11-Website-Slider-Best-Practices-That-You-Must-Follow.png'}}@endif" alt="slide">
                 </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </section>
    <section class="features">
        <div class="row text-center">
            <div class="featureItem text-center col-lg-4 col-md-3">
                <img src="{{'assets/img/logo.png'}}" class="col-6">
                <h5>اعلانات مميزة <br/> دائما و ابدا</h5>
            </div>
            <div class="featureItem text-center col-lg-4 col-md-3">
                <img src="{{'assets/img/logo.png'}}" class="col-6">
                <h5>سرعة الوصول <br/> للاعلانات</h5>
            </div>
            <div class="featureItem text-center col-lg-4 col-md-3">
                <img src="{{'assets/img/logo.png'}}" class="col-6">
                <h5>أفضل الاعلانات <br/> التراثية</h5>
            </div>
        </div>
    </section>
    <section class="categories">
        <h3 class="text-center">شاهد أفضل المنتجات التراثية في العالم</h3>
        <p class="text-center">تمتع بمشاهدة جميع الأقسام</p>
        <div class="row">
            @foreach($Categories as $category)
            <div class="categoryItem">
                <div class="rate col-4">
                    <span> 4.9 <i class="fas fa-star"></i></span>
                </div>
                <div class="categoryImage">
                    <img src="@if($category->image != null) {{$category->image}} @else {{'assets/img/adv1.jpeg'}}@endif">
                </div>
                <div class="categoryName">
                    <h6 class="text-center">{{$category->name}}</h6>
                    <p class="text-center">{{$category->id}} اعلان</p>
                </div>
            </div>
            @endforeach
        </div>

    </section>
    <section class="advertisements">
        <h3 class="text-center">الاعلانات المميزة في الموقع</h3>
        <div class="row">
            @foreach($Advertisements as $advertisement)

            <div class="advertisementItem">
                <div class="advertisementImage">
                    <a href="{{route('advertisement.show')}}">
                        <input type="image" onclick="{{session(['advertisement_id' => $advertisement->id])}}" src="@if($advertisement->image != null){{$advertisement->image}} @else {{'assets/img/adv1.jpeg'}}@endif">
                    </a>
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



