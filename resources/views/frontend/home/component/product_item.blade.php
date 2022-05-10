<div class="product-image-wrapper">
    <div class="single-products">
        <div class="productinfo text-center">
            <img src="/frontend/images/home/product1.jpg" alt="" />
            <h2>{{ number_format($product->sale_price) }} đ</h2>
            <p>{{ $product->name }}</p>
            <a href="{{ route('frontend.carts.add', $product->id) }}" class="btn btn-default add-to-cart"><i
                    class="fa fa-shopping-cart"></i>Add to cart</a>
        </div>
        <div class="product-overlay">
            <div class="overlay-content">
                <h2>{{ number_format($product->sale_price) }} đ</h2>
                <p>{{ $product->name }}</p>
                <a href="{{ route('frontend.carts.add', $product->id) }}" class="btn btn-default add-to-cart"><i
                        class="fa fa-shopping-cart"></i>Add to cart</a>
            </div>
        </div>
    </div>
    <div class="choose">
        <ul class="nav nav-pills nav-justified">
            <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
            <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
        </ul>
    </div>
</div>
