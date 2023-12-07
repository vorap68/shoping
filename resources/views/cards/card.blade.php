<div class="col-sm-6 col-md-4">
    <div class="thumbnail">
        <img src="{{ asset('storage/images/products/' . $category->code . '/thumb/' . $product->image_thumb) }}">
        <div class="caption">
            <h3>{{ $product->lingvo('name') }}</h3>
            <p>
            <form action="#" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary" role="button">В корзину</button>
            </form>
            <a href="{{ route('product', $product) }}" class="btn btn-default" role="button">Подробнее</a>
            </p>
        </div>
    </div>
</div>
