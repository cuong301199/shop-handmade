
@extends('client.template.master')
@section('content')
    <div class="page_title_area">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="page_title">
                        <h1>SHOPPING CART</h1>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="bredcrumb">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Shop</a></li>
                            <li><a href="#">Cart</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- {{ dd(Cart::content()) }} --}}
    <!--/ page title -->
    <!-- Shopping Cart -->
    {{-- {{ dd(Cart::content()) }} --}}
    @if (Cart::content() != null)
        <div class="shopping-cart margin-bottom-70px"  id="list-cart">
            <div class="container">
                <div class="row">
                    <div class="table-responsive">
                        <table class="shop_table">
                            <thead>
                                <tr>
                                    <th colspan="3" class="product-name">Product</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-number">Id Number</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-subtotal">Sub Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (Cart::content() as $item)
                                    <tr class="cart_item">
                                        <td class="product-remove">
                                            {{-- <a id="delete-list-item-cart" data-id="{{$item['productInfor']->id  }}" href="{{ route('Delete-list.cart', ['id'=>$item['productInfor']->id]) }}" class="remove" title="Remove this item"><img
                                                 src="{{ asset('template-client') }}/img/icons/remove.png"
                                                    alt="" /></a> --}}
                                                    <a  data-id="" href="{{ route('Delete.cart', ['rowId'=>$item->rowId]) }}" class="remove" title="Remove this item"><img
                                                        src="{{ asset('template-client') }}/img/icons/remove.png"
                                                        alt="" ></a>
                                        </td>
                                        <td class="product-thumbnail">
                                            <a   href="#"><img width="70" height="70"
                                                    src="{{ asset($item->options['duongdan_ha']) }}"
                                                    alt="Adventure"></a>
                                        </td>
                                        <td class="product-info">
                                            <a href="#">{{ $item->name }}</a>
                                            <p>At vero eos et accusam et justo duo dolores et ea rebum.</p>
                                        </td>
                                        <td class="product-quantity">
                                            <div class="quantity">
                                                <input id="quanty-item" data-rowId="{{$item->rowId}}"type="number" step="1" min="0" max="99" name="cart"
                                                    value="{{ $item->qty }}" title="Qty" class="qty">
                                            </div>
                                        </td>
                                        <td class="product-number">
                                            <span>AFN - 924222122</span>
                                        </td>
                                        <td class="product-price">
                                            <span class="amount-subtotal">{{ $item->price }}</span>
                                        </td>
                                        <td class="product-subtotal">
                                            <span class="amount-subtotal">{{ $item->qty * $item->price }}</span>
                                        </td>
                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    {{-- <div class="col-md-4">
                        <h4>calculate shipping</h4>
                        <p class="margin-bottom-50px">At vero eos et accusam et justo duo dolores et ea rebum. Lorem ipsum
                            dolor
                            sit amet, consetetur sadipscing elitr, sed.</p>

                        <div class="calculate-shipping">
                            <h4>COUNTRY</h4>
                            <select name="country" class="country">
                                <option value="">- Select a Country -</option>
                                <option>Afghanistan</option>
                                <option>Albania</option>
                                <option>Algeria</option>
                                <option>American Samoa</option>
                                <option>Andorra</option>
                                <option>Angola</option>
                                <option>Anguilla</option>
                                <option>Antarctica</option>
                                <option>Antigua and Barbuda</option>
                                <option>Argentina</option>
                                <option>Armenia</option>
                                <option>Aruba</option>
                                <option>Australia</option>
                                <option>Austria</option>
                                <option>Azerbaijan</option>
                                <option>Bahamas</option>
                                <option>Bahrain</option>
                                <option>Bangladesh</option>
                                <option>Barbados</option>
                                <option>Belarus</option>
                                <option>Belgium</option>
                                <option>Belize</option>
                                <option>Benin</option>
                                <option>Bermuda</option>
                                <option>Bhutan</option>
                                <option>Bolivia</option>
                                <option>Bosnia and Herzegovina</option>
                                <option>Botswana</option>
                                <option>Bouvet Island</option>
                                <option>Brazil</option>
                                <option>British Indian Ocean Territory</option>
                                <option>Brunei Darussalam</option>
                                <option>Bulgaria</option>
                            </select>
                            <h4>STATE / PROVINCE</h4>
                            <select name="country" class="country">
                                <option value="">- Select a State -</option>
                                <option value="Alabama">Alabama</option>
                                <option value="Alaska">Alaska</option>
                                <option value="Arizona">Arizona</option>
                                <option value="Arkansas">Arkansas</option>
                                <option value="California">California</option>
                                <option value="Colorado">Colorado</option>
                                <option value="Connecticut">Connecticut</option>
                                <option value="Delaware">Delaware</option>
                                <option value="Florida">Florida</option>
                                <option value="Georgia">Georgia</option>
                                <option value="Hawaii">Hawaii</option>
                                <option value="Idaho">Idaho</option>
                                <option value="Illinois">Illinois</option>
                                <option value="Indiana">Indiana</option>
                                <option value="Iowa">Iowa</option>
                            </select>
                            <h4>ZIP / POSTAL CODE</h4>
                            <input type="number" name="zip" value="" class="zip">
                        </div>
                        <input type="submit" name="calculate" value="calculate" class="calculate">
                    </div>

                    <div class="col-md-4">
                        <div class="cupon-code">
                            <h4>enter a coupon code</h4>
                            <p class="margin-bottom-50px">At vero eos et accusam et justo duo dolores et ea rebum. Lorem
                                ipsum
                                dolor sit amet, consetetur sadipscing elitr, sed.</p>
                            <h4 class="coupon-heading">COUPON CODE</h4>
                            <input type="text" name="cupon" value="" class="cupon">
                            <input type="submit" name="cupon" value="apply code" class="calculate">
                        </div>
                    </div> --}}

                    <div class="col-md-4">
                        <div class="cupon-code">
                            <h4>CART TOTALS</h4>
                            <table>
                                <tbody>
                                    <tr class="cart-subtotal">
                                        <th>Tổng tiền</th>
                                        <td><span class="amount-subtotal">{{  Cart::subtotal() }}</span></td>
                                    </tr>
                                    <tr class="order-shipping">
                                        <th>Phí ship</th>
                                        <td><span class="amount-subtotal">free Shipping</span></td>
                                    </tr>
                                    <tr class="order-total">
                                        <th>Tổng đơn hàng</th>
                                        <td><span class="amount-subtotal">{{  Cart::subtotal()}}</span></td>
                                    </tr>
                                </tbody>
                            </table>

                            <?php $id_nd= Auth::guard('nguoi_dung')->user()->id ?>
                            <?php  $ttvc = DB::table('thong_tin_van_chuyen')->where('id_nm',$id_nd)->first()?>

                            @if ($ttvc != null)
                                <a href="{{ route('checkout.index') }}" style="width:250px;"><input type="submit" name="checkout" value="checkout"
                                    class="btn-black calculate margin-bottom-100px"></a>
                            @else
                                {{ dd('thanh toan') }}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @push('Add-list-cart')
    <script>
            // $(document).ready(function () {

            // $('#quanty-item').change(function (e) {
            //     e.preventDefault();
            //     var qty = $('#quanty-item').val()
            //     var rowId = $(this).data('rowid')
            //     console.log(rowId)
            //     // $.ajax({
            //     //     type: "get",
            //     //     url: 'client/cart-list-update/'+rowId+'/'+qty,
            //     //     success: function (response) {
            //     //         location.reload();
            //     //     }
            //     // });
            //     });
            // });

    </script>
    @endpush
@endsection

