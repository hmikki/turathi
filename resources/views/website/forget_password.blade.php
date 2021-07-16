<!DOCTYPE html>
<html lang="en">
<head>
   @include('website.includes.head')
</head>
<body>
<section class="loginSection">
    <div class="row window-full">
        <div class="hero col-6 float-right">
            <h1 class="titl pt-5 text-center">تراثيات</h1>
        </div>
        <div class="col-6 pt-5 mt-5 float-left">
            <h2 class="pt-5 text-center">نسيت كلمةالمرور</h2>
            <form action="{{URL::route('user.forget_password')}}" method="post" class="pt-5 text-center login">
                @csrf
                <p class="text-center pb-5">لقد قمنا بارسال رسالة نصية برمز التفعيل إلى : 0595670547 </p>
                <div class="row">
                    <div class="col-lg-3"></div>
                    <input type="text" name="code" id="code" class="form-control text-center col-lg-6" placeholder="" required>
                    <input type="hidden" name="mobile" id="mobile" value="0595670547">
                    <div class="col-lg-3"></div>
                </div>
                <div class="form-group mt-5 text-center">
                    <button class="pt-2 pb-2 pr-5 pl-5 text-center" type="submit">تأكيـد</button>
                </div>

            </form>
        </div>
        <div class="clearfix"></div>
    </div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<script src="{{'assets/js/scripts.js'}}"></script>

</body>
</html>
