<nav class="navbar navbar-expand-lg navbar-light bg-white">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <a class="navbar-brand mt-2 mt-lg-5 ml-2 ml-lg-5 font-weight-bolder" href="{{route('index')}}">تراثي</a>
        <ul class="navbar-nav ml-auto mt-2 mt-lg-5">
            <li class="nav-item">
                <a class="nav-link" href="#">الرئيسية <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">الأقسام</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">الاعلانات المميزة</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">من نحن</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0 mt-2 mt-lg-5 loginForm">
            <div class="col-lg-12">
                <div class="row">
                    <div class= "mr-2 LogNavBtn"><a id="LogNavIcon" href="" data-toggle="modal" data-target="#exampleModalCenter"><i class="fas fa-user"></i></a></div>
                    <div class="ml-2 mr-3 LogNavBtn"><a id="LogNavBtn" href="" data-toggle="modal" data-target="#exampleModalCenter"> تسجيل الدخول</a></div>
                </div>
            </div>
        </form>
        @if(Auth::guard('web'))
        <form class="form-inline my-2 my-lg-0 mt-2 mt-lg-5 loginForm">
            <div class="col-lg-12">
                <div class="row">
                    <div class= "mr-2 LogNavBtn"><a href="#"><i class="fas fa-bell"></i></a></div>
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle user-name" href="#" id="MyAccount" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="profile" src="{{'assets/img/default-profile.png'}}" alt="">
                        </a>
                        <div class="dropdown-menu" id="MyAccountDropdown" aria-labelledby="MyAccount">
                            <a class="dropdown-item" href="my_profile.blade.php">حسابي</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="my_advs.blade.php">اعلاناتي</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="index.blade.php">تسجيل خروج</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        @endif
    </div>
</nav>
