@extends('website.layout.default')
@section('content')
    <section class="title">
        <h1 class="text-center">اضافة اعلان</h1>
    </section>
    <section class="addAdvForm">
        <form method="POST" action="{{route('advertisement.store')}}" class="addAdv text-right">
            @csrf
            @foreach($errors as $error)
                @if($error != null)
                    <div class="alert alert-danger" role="alert">
                        {{trans($error)}}
                    </div>
                @endif
            @endforeach
            <div class="form-group">
                <label for="title" class="col-6">اسم الاعلان</label>
                <input type="text" name="title" id="title" class="form-control col-6">
            </div>
            <div class="form-group" hidden="hidden">
                <label for="title_ar" class="col-6">اسم الاعلان</label>
                <input type="hidden" name="title_ar" id="title_ar" value="عنوان1" class="form-control col-6">
            </div>
            <div class="form-group" hidden="hidden">
                <label for="rate" class="col-6">التقييم</label>
                <input type="hidden" name="rate" id="rate" value="4.9" class="form-control col-6">
            </div>
            <div class="form-group" >
                <label for="price" class="col-6">السعر</label>
                <input type="text" name="price" id="price" class="form-control col-6">
            </div>
            <div class="form-group">
                <label hidden = "hidden" for="user_id" class="col-6">user_id</label>
                <input type="hidden" name="user_id" id="user_id" value="1">
            </div>
            <div class="form-group">
                <label for="location" class="col-6">الموقع</label>
                <input type="text" name="location" id="location" class="form-control col-6">
            </div>
            <div class="form-group">
                <label for="email" class="col-6">البريد الالكتروني</label>
                <input type="email" name="email" id="email" class="form-control col-6">
            </div>
            <div class="form-group">
                <label for="mobile" class="col-6">رقم الجوال</label>
                <input type="number" name="mobile" id="mobile" class="form-control col-6">
            </div>
            <div class="form-group">
                <label for="page_id" class="col-6">صفحة الاعلان</label>
                <select name="page_id" id="page_id" class="form-control col-6">
                    <option value="1">الرئيسية</option>
                    <option value="2">الثانية</option>
                    <option value="3">الثالثة</option>
                </select>
            </div>
            <div class="form-group">
                <label for="category_id" class="col-6">القسم</label>
                <select name="category_id" id="category_id" class="form-control col-6">
                    <option value="1">القسم الأول</option>
                    <option value="2">القسم الثاني</option>
                    <option value="3">القسم الثالث</option>
                </select>
            </div>
            <div class="form-group">
                <label for="description" class="col-6">الوصف</label>
                <textarea name="description" id="description" class="form-control col-6"></textarea>
            </div>
            <div class="form-group" hidden="hidden">
                <label for="description_ar" class="col-6">الوصف</label>
                <textarea name="description_ar" id="description_ar" class="form-control col-6">وصف الاعلان الاول</textarea>
            </div>
            <div class="form-group">
                <label for="image" class="col-6">صور الاعلان</label>
                <input type="file" name="image" id="image" style="display: block" class="form-control col-6">

            </div>
            <div class="row">
                <div class="col-3"></div>
                <input type="submit" value="اضافة اعلان" class="col-6">
                    <div class="col-3"></div>
            </div>

        </form>
    </section>
@stop
