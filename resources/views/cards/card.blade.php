<div class="col-sm-6 col-md-4">
    <div class="thumbnail">
        <img src="{{ asset('storage/images/products/' . $category->code . '/thumb/' . $product->image) }}">
        <div class="caption">
            <h3>{{ $product->lingvo('name') }}</h3>
            <p>{{__('main.price')}} <b>{{$product->price}}</b>:{{App\Services\CurrencyConversion::getCurrencySymbol()}}</p>
            <p>
            <form method="post" action="{{route('basket.add',$product)}}" >
                @csrf
                <button type="submit" class="btn btn-primary" role="button">{{__('main.In_basket')}}</button>
            </form>
            <a href="{{ route('product', $product) }}" class="btn btn-default" role="button">{{__('main.details')}}</a>
            </p>
        </div>
    </div>
</div>
