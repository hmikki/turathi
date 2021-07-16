@extends('website.layout.default')
@section('content')
    <section class="title">
        <h1 class="text-center">تعديل الاعلان</h1>
    </section>
    <section class="addAdvForm">
        <form method="" action="" class="addAdv text-right">
            <div class="form-group">
                <label for="name" class="col-6">اسم الاعلان</label>
                <input type="text" name="name" id="name" class="form-control col-6">
            </div>
            <div class="form-group">
                <label for="price" class="col-6">السعر</label>
                <input type="text" name="price" id="price" class="form-control col-6">
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
                <label for="advPage" class="col-6">صفحة الاعلان</label>
                <select name="advPage" id="advPage" class="form-control col-6">
                    <option value="0">الرئيسية</option>
                    <option value="1">الثانية</option>
                    <option value="2">الثالثة</option>
                </select>
            </div>
            <div class="form-group">
                <label for="discription" class="col-6">الوصف</label>
                <textarea name="discription" id="discription" class="form-control col-6"></textarea>
            </div>
            <div class="form-group">
                <label for="images" class="col-6">صور الاعلان</label>
                <input type="file" name="images" id="images" class="form-control col-6">
            </div>
            <div class="row">
                <div class="col-3"></div>
                <input type="submit" value="حفظ التعديل" class="col-6">
                <div class="col-3"></div>
            </div>

        </form>
    </section>
@stop
