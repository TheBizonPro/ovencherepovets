@dump(\App\Models\Category::card('kerpichnay')->flatMap->ovens)
@foreach(\App\Models\Category::card('kerpichnay')->flatMap->ovens as $card)
    <div class="card shadow card-btn" style="width: 18rem; margin-right:20px;">
        @if($card->preview>0)
            <img src="{{asset($card->preview)}}" class="card-img-top" alt="{{$card->title}}">
        @endif
        <div class="card-body">
            <h5 class="card-title">{{$card->title}}</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn card-btn" style=" background: #fe8e52; color: white">Go somewhere</a>
        </div>
    </div>
@endforeach
