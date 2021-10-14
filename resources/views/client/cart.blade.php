

<h5 class="title">Số lượng sản phẩm<span>({{ Session::get('Cart')->totalQuanty }} sản phẩm)</span></h5>
@foreach (Session::get('Cart')->products as $item)
<div class="cart-item">
    <img class="img-responsive" alt="Single product"
        src="{{ asset($item['productInfor']->hinhanh_sp) }}">
    <span class="icon_close close-icon"  data-id="{{ $item['productInfor']->id }}" ></span>
    <div class="product-info">
        <h5>{{ $item['productInfor']->ten_sp}}</h5>
        <div class="star-rating">
            <ul>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star-half-full"></i></li>
            </ul>
        </div><br>
        <div class="price">
            <del>500000.Đ </del>{{ $item['productInfor']->gia_sp}} X {{$item['quanty']}}
        </div>

    </div>
</div>
@endforeach
<div class="order-total">
    <h5 class="title">Tổng tiền <span class="amount">{{ Session::get('Cart')->totalPrice }}</span>
    </h5>
    <input hidden type="number" id="total-item-cart" value="{{ Session::get('Cart')->totalQuanty }}">
</div>


{{-- {{ dd(Cart::content()) }} --}}
