<x-app-layout>
<x-slot name="header">
    <header style="height: 100vh;">
    <div>
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
</x-slot>->
    <x-slot name="slot">
        <div class="content1" >
        <div class="menu">
            @foreach(\App\Models\Category::category() as $category)
               <a class="nav-link menu-item position-relative " href="{{route('category',$category->slug)}}" style="font-family: 'Marck Script', cursive;">{{$category->title}}</a>
            @endforeach
                <a class="nav-link menu-item position-relative" data-bs-toggle="modal" data-bs-target="#exampleModal" style="font-family: 'Marck Script', cursive;" >
                   Заказать звонок
                </a>
        </div>
            <div class="item">
            @forelse($cards->flatMap->ovens as $card)
                    <div class="items card">
                    @if($card->preview>0)
                    <img src="{{asset($card->preview)}}" class="card-img">
                    @endif
                        <div class="card-img-overlay">
                        <h5  class="card-title" style="font-family: 'Marck Script', cursive; color:white; text-shadow: 1px 1px 1px #000;">{{$card->title}}</h5>
                        <p class="card-text" style="font-family: 'Marck Script', cursive; color:white; text-shadow: 1px 1px 1px #000;">{{$card->short_description}}</p>
                        <a href="{{route('oveninfo',$card->slug)}}" class="btn card-btn" style=" background: #fe8e52; color: white;  font-family: 'Marck Script', cursive;">Посмотреть</a>
                        </div>
                </div>
                @empty
                @foreach(\App\Models\Oven::scopeActive(\App\Models\Oven::query()) as $card)
                        <div class="items card">
                            @if($card->preview>0)
                                <img src="{{asset($card->preview)}}" class="card-img">
                            @endif
                            <div class="card-img-overlay">
                                <h5  class="card-title" style="font-family: 'Marck Script', cursive; color:white; text-shadow: 1px 1px 1px #000;">{{$card->title}}</h5>
                                <p class="card-text" style="font-family: 'Marck Script', cursive; color:white; text-shadow: 1px 1px 1px #000;">{{$card->short_description}}</p>
                                <a href="{{route('oveninfo',$card->slug)}}" class="btn card-btn" style=" background: #fe8e52; color: white;  font-family: 'Marck Script', cursive;">Посмотреть</a>
                            </div>
                        </div>
                @endforeach
                @endforelse
        </div>
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
