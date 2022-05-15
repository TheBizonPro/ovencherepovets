<x-app-layout>
    <x-slot name="header">
        <header style="height: 100vh;">
        <div >
            <img src="../logonew.png" class="header__logo"/>
            <ul class="top-menu">
                @guest()
                    <li><a class="" href="{{route('home')}}">Главная</a></li>
                    <li><a class="" href="#">О нас</a></li>

                @elseif(Auth::user()->isAdmin())
                    <li><a class=" " href="{{route('home')}}">Главная</a></li>
                    <li><a class="" href="#">О нас</a></li>
                    <li><a class="" href="{{route('admin.dashboard')}}">Админка</a></li>
                @endguest
            </ul>
        </div>
            <div class="presentation"></div>
        </header>
    </x-slot>
    <x-slot name="slot">
        <div  style="">
            @foreach($ovens as $oven)
            <h1 class="card-title text-typing" style="margin-bottom:10px">{{$oven->title}}</h1>
                <div class="row">
                    <div class="col-4">
                    @if($oven->preview>0)<img src="{{asset($oven->preview)}}" class=" rounded" alt="{{$oven->title}}" style="height: 550px">@endif
                    </div>
                    <div class="col-8">
                    <div class="card" style="background: transparent; border: none">
                        <div class="card-body">
                            <div class=" row">
                             {!!$oven->description !!}
                                <h2 class=" card-text text-typing col-4">Цена:{{$oven->price}}</h2>
                                <div class="card-footer row" style="border: none; background: transparent;">
                                <a class="nav-link menu-item position-relative col-4" data-bs-toggle="modal" data-bs-target="#exampleModal" style="font-family: 'Marck Script', cursive;" >
                                    Заказать по звоноку
                                </a>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                @endforeach
        </div>
    </x-slot>
</x-app-layout>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="font-family: 'Marck Script', cursive; color:#fe8e52;">Заказать звонок</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{route('call')}}">
                    @csrf
                    <div class="">
                        <label for="exampleInputEmail1" class="form-label text-typing">Имя</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" style="font-family: 'Marck Script', cursive; color:#fe8e52;">
                    </div>
                    <div class="">
                        <label for="exampleInputEmail1" class="form-label text-typing">Номер телефона</label>
                        <input type="tel" class="form-control"id="online_phone" aria-describedby="emailHelp" maxlength="50"
                               autofocus="autofocus" required="required"
                               value="+7(___)___-__-__"
                               pattern="\+7\s?[\(]{0,1}9[0-9]{2}[\)]{0,1}\s?\d{3}[-]{0,1}\d{2}[-]{0,1}\d{2}"
                               placeholder="+7(___)___-__-__" name="phone" style="font-family: 'Marck Script', cursive; color:#fe8e52;">
                    </div>
                    <button type="submit" class="btn btn-login" style="height: 6%; margin-top: 3.7%; color: white; font-family: 'Marck Script', cursive;">Заказать звонок</button>
                </form>
            </div>
        </div>
    </div>
</div>
