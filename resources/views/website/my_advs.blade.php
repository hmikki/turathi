@extends('website.layout.default')
@section('content')
    <section class="title">
        <h1 class="text-center">اعلاناتي</h1>
    </section>
    @foreach($errors as $error)
        @if($error != null)
            <div class="alert alert-danger" role="alert">
                {{trans($error)}}
            </div>
        @endif
    @endforeach
    <section class="advertisements ads mb-5 mt-5">
        <div class="row mb-5">
            <div class="col-4"></div>
            <div class="col-4"></div>
            <div class="col-4">
                <a class="add_adv" href="{{URL::route('add_adv')}}"><i class="fas fa-plus-circle"></i> <span> اضافة اعلان</span> </a>
            </div>
        </div>
        <div class="row mt-50">
            @foreach($advertisements as $advertisement)
            <div class="advertisementItem">
                <div class="advertisementImage">
                    <input type="image" src="@if($advertisement->image != null){{$advertisement->image}} @else {{'assets/img/adv1.jpeg'}}@endif">
                    <a class="edit" href="{{URL::route('edit_adv')}}" onclick="{{\Illuminate\Support\Facades\Session::put('advertisement_id', $advertisement->id)}}"> <i class="fas fa-pen"></i></a>
                    <a class="delete" href="" data-toggle="modal" data-target="#delete" aria-label="Close" data-dismiss="modal"> <i class="fas fa-trash"></i></a>
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

        <form id="deleteForm" action="{{ route('advertisement.destroy') }}" method="POST" style="display: none;">
            @csrf
            <input type="hidden" name="advertisement_id" id="advertisement_id" value="{{\Illuminate\Support\Facades\Session::get('advertisement_id')}}">
        </form>
        <div class="modal fade thanks" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="modal-body secound-m">
                        <div class="model-img login100-pic js-tilt" data-tilt><img src="{{'assets/img/thanks.svg'}}" alt=""></div>
                        <h4 class="vc-m">هل تريد حذف الاعلان بالتأكيد</h4>
                        <div class="tab-button">
                            <button type="submit" onclick="event.preventDefault();document.getElementById('deleteForm').submit();" class="btn" data-toggle="modal" data-target="#exampleModalCenter-8" data-dismiss="modal">حذف</button>
                            <button type="submit" class="btn" data-toggle="modal" data-target="#exampleModalCenter-8" aria-label="Close" data-dismiss="modal">الغاء</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @stop
