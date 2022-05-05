<x-app-layout>
    <x-slot name="header">
        <div class="header__logo">
            <img src="../logonew.png">
        </div>
        <nav class="nav nav-bar-h">
            @guest()
                <a class="nav-link nav-bar-header " href="{{route('home')}}">Главная</a>
                <a class="nav-link nav-bar-header" href="#">О нас</a>
            @elseif(Auth::user()->isAdmin())
                <a class="nav-link nav-bar-header " href="{{route('home')}}">Главная</a>
                <a class="nav-link nav-bar-header" href="#">О нас</a>
                <a class="nav-link nav-bar-header" href="{{route('admin.dashboard')}}">Админка</a>
            @endguest
        </nav>

        <div class="header__phone">
            <i class="fa fa-phone" aria-hidden="true"></i> <a href="" class="ic-a">+7 (911) 523-12-33</a>
            <br>
            <i class="fa fa-phone" aria-hidden="true"></i> <a href="" class="ic-a">+7 (911) 507-64-57</a>
        </div>
    </x-slot>
    <x-slot name="slot">
        <div class="container" style="margin-top: 10%">
            @foreach($ovens as $oven)
            <h1 class="card-title text-typing" style="margin-bottom:10px">{{$oven->title}}</h1>
                <div class="row"  style="margin-top:10px">
                    <div class="col-4">
                    @if($oven->preview>0)<img src="{{asset($oven->preview)}}" class=" rounded" alt="{{$oven->title}}" style="height: 550px">@endif
                    </div>
                    <div class="col-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-text">
                             {!!$oven->description !!}
                                <h2 class="card-text text-typing">Цена:{{$oven->price}}</h2>
                            </div>
                        </div>
                        </div>
                        <form method="post" action="{{route('call')}}" >
                            @csrf
                            <div class="row" style="">
                                <div class="col-4">
                                    <label for="exampleInputEmail1" class="form-label text-typing">Имя</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name">
                                </div>
                                <div class="col-4">
                                    <label for="exampleInputEmail1" class="form-label text-typing">Номер телефона</label>
                                    <input type="tel" class="form-control"id="online_phone" aria-describedby="emailHelp" maxlength="50"
                                           autofocus="autofocus" required="required"
                                           value="+7(___)___-__-__"
                                           pattern="\+7\s?[\(]{0,1}9[0-9]{2}[\)]{0,1}\s?\d{3}[-]{0,1}\d{2}[-]{0,1}\d{2}"
                                           placeholder="+7(___)___-__-__" name="phone" style="font-family: 'Marck Script', cursive; color:#fe8e52;">
                                </div>
                                <button type="submit" class="btn  col-4 btn-login" style="height: 6%; margin-top:46px; color: white; ont-family: 'Marck Script', cursive;" >Заказать по звонку </button>
                            </div>
                        </form>
                    </div>
                </div>
                @endforeach

        </div>
    </x-slot>
</x-app-layout>
