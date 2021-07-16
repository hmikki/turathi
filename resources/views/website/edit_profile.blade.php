@extends('website.layout.default')
@section('content')
    <section class="title">
        <h1 class="text-center">تعديل حسابي</h1>
    </section>
    <section class="addAdvForm">
        <form method="POST" action="{{route('user.update_profile')}}" class="addAdv text-right" enctype="multipart/form-data">
            @csrf
            @if (session('error'))
                <div class="alert alert-danger">
                    <p>{{ session('error') }}</p>
                </div>
            @endif
            <div class="row form-group text-center">
                <div class="col-3"></div>
                <div class="col-6">
                    <img class="profileImage p-1" id="profileImage" src="@if ($profile->image !=null){{'http://localhost:8000'.$profile->image}} @else {{'assets/img/adv1.jpeg'}} @endif"/>
                    <i class="fas fa-pen editIcon" id="imageProfile"></i>
                    <input id="image" type="file"
                           name="image" placeholder="Photo" required="" capture>

                </div>
                <div class="col-3"></div>
            </div>
            <div class="form-group">
                <label for="name" class="col-6">الاسم</label>
                <input type="text" name="name" id="name" class="form-control col-6" placeholder="{{$profile->name}}">
            </div>
            <div class="form-group">
                <label for="email" class="col-6">البريد الالكتروني</label>
                <input type="email" name="email" id="email" class="form-control col-6" placeholder="{{$profile->email}}">
            </div>
            <div class="form-group">
                <label for="mobile" class="col-6">رقم الجوال</label>
                <input type="number" name="mobile" id="mobile" class="form-control col-6" placeholder="{{$profile->mobile}}">
            </div>
            <div class="form-group">
                <label for="location" class="col-6">الموقع</label>
                <input type="text" name="location" id="location" class="form-control col-6" placeholder="{{$profile->location}}">
            </div>
            <div class="row">
                <div class="col-3"></div>
                <input type="submit" value="حفظ التعديل" class="col-6">
                <div class="col-3"></div>
            </div>

        </form>
    </section>
    @stop
