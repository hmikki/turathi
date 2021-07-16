@extends('website.layout.default')
@section('content')
    <section class="title">
        <h1 class="text-center">هديل مكي</h1>
    </section>
    <section class="info">
        <div class="row pt-3">
            <div class="col-lg-3"></div>
            <div class="col-lg-6 profileInfo p-4 m-2">
                <div class="text-center pb-4">
                    <input type="image" class="profileImage p-1" src="{{'assets/img/adv2.png'}}">
                </div>
                <div class="text-right">
                    <i class="pl-2 fas fa-user-alt"></i>
                    <span>هديل عماد مكي</span>
                </div>
                <div class="text-right">
                    <i class="pl-2 fas fa-map-marker"></i>
                    <span>المملكة العربية السعودية</span>
                </div>
                <div class="text-right">
                    <i class="pl-2 fab fa-whatsapp"></i>
                    <span>0595670547</span>
                </div>
                <div class="text-right">
                    <i class="pl-2 fas fa-envelope"></i>
                    <span>hadeelmikki10@gmail.com</span>
                </div>
            </div>
            <div class="col-lg-3"></div>
        </div>
    </section>
    <section class="advertisements">
        <h1 class="text-center">الاعلانات</h1>
        <div class="row ads">
            <div class="advertisementItem">
                <div class="advertisementImage">
                    <img src="{{'assets/img/adv1.jpeg'}}">
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
            <div class="advertisementItem">
                <div class="advertisementImage">
                    <img src="{{{'assets/img/adv1.jpeg'}}}">
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
            <div class="advertisementItem">
                <div class="advertisementImage">
                    <img src="{{'assets/img/adv1.jpeg'}}">
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
            <div class="advertisementItem">
                <div class="advertisementImage">
                    <img src="{{'assets/img/adv1.jpeg'}}">
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
            <div class="advertisementItem">
                <div class="advertisementImage">
                    <img src="{{'assets/img/adv1.jpeg'}}">
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
            <div class="advertisementItem">
                <div class="advertisementImage">
                    <img src="{{'assets/img/adv1.jpeg'}}">
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
