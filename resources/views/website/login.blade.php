<!DOCTYPE html>
<html lang="en">
<head>
    @include('website.includes.head')
</head>
<body>
<section class="loginSection">
    <div class="row window-full">
        <div class="hero col-6 float-right">
            <h1 class="titl pt-5 text-center">تراثي</h1>
        </div>
        <div class="col-6 float-left">
            <h2 class="pt-5 text-center">تسجيل الدخول</h2>
            <form action="{{route('user.login')}}" method="post" class="pt-5 text-right login">
                @csrf
                @if (session('error'))
                    <div class="alert alert-danger">
                        <p>{{ session('error') }}</p>
                    </div>
                @endif
                <div class="form-group">
                    <label for="mobile" class="col-lg-6">رقم الجوال</label>
                    <input type="text" name="mobile" id="mobile" class="form-control col-lg-6" placeholder="0595670547" required>
                </div>
                <div class="form-group pt-2">
                    <label for="password" class="col-lg-6">كلمة المرور</label>
                    <input type="password" name="password" id="password" class="form-control col-lg-6" placeholder="*****" required>
                    <a class="forget" href="{{URL::route('forget_password')}}">نسيت كلمة المرور</a>
                </div>
                <div class="form-group mt-5 text-center">
                    <button class="pt-2 pb-2 pr-5 pl-5 text-center" type="submit">تسجيل الدخول</button>
                    <a class="mt-2 pt-2 pb-2 pr-5 pl-5" href="{{URL::route('register')}}">انشاء حساب جديد</a>
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
