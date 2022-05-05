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
</x-slot>->
    <x-slot name="slot">
        <form method="post" action="{{route('call')}}">
            @csrf
            <div class="row" style="margin-top:9%;">
            <div class="col-4">
                <label for="exampleInputEmail1" class="form-label text-typing">Имя</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" style="font-family: 'Marck Script', cursive; color:#fe8e52;">
            </div>
            <div class="col-4">
                <label for="exampleInputEmail1" class="form-label text-typing">Номер телефона</label>
                <input type="tel" class="form-control"id="online_phone" aria-describedby="emailHelp" maxlength="50"
                       autofocus="autofocus" required="required"
                       value="+7(___)___-__-__"
                       pattern="\+7\s?[\(]{0,1}9[0-9]{2}[\)]{0,1}\s?\d{3}[-]{0,1}\d{2}[-]{0,1}\d{2}"
                       placeholder="+7(___)___-__-__" name="phone" style="font-family: 'Marck Script', cursive; color:#fe8e52;">
            </div>
                <button type="submit" class="btn  col-2 btn-login" style="height: 6%; margin-top: 3.7%; color: white; font-family: 'Marck Script', cursive;">Заказать звонок</button>
            </div>
        </form>
        <nav class="nav flex-column col-4 menu">
            @foreach(\App\Models\Category::category() as $category)
                <a class="nav-link menu-item position-relative " href="{{route('category',$category->slug)}}" style="font-family: 'Marck Script', cursive;">{{$category->title}}</a>
            @endforeach
        </nav>

        <div class="col-8 menu row">

            @foreach($cards->flatMap->ovens as $card)
                <div class="card shadow card-btn" style="width: 18rem; margin-right:20px;">
                    @if($card->preview>0)
                    <img src="{{asset($card->preview)}}" class="card-img-top" alt="{{$card->title}}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title" style="font-family: 'Marck Script', cursive; color:#fe8e52;">{{$card->title}}</h5>
                        <p class="card-text" style="font-family: 'Marck Script', cursive; color:#fe8e52;">{{$card->short_description}}</p>
                        <a href="{{route('oveninfo',$card->slug)}}" class="btn card-btn" style=" background: #fe8e52; color: white;  font-family: 'Marck Script', cursive;">Посмотреть</a>
                    </div>
                </div>
                @endforeach
        </div>

    </x-slot>
</x-app-layout>

