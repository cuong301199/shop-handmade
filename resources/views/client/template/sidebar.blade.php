{{-- {{ dd($lsp) }} --}}
<style>
.side-bar .widget .active
{
    color:#9560f5;
}
</style>
            <div class="col-md-3 col-md-pull-9 col-sm-12">
                <div class="side-bar">
                    <div class="sidebar-list widget">
                        <h4>Loại sản phẩm</h4>
                        <ul>
                            @foreach ($lsp as $item)
                            {{-- <li><a data-id="{{ $item->id }}" href="{{ route('sanpham.loaisanpham', ['id_dm'=>$item->id_dm,'id_lsp'=>$item->id]) }}" class="triangle">{{ $item->ten_lsp }}<span>(8)</span></a></li> --}}
                            <li><a class="{{Request::get('productType')==$item->id?'active':''}}" id="product-type"  href="{{request()->fullUrlWithQuery(['productType'=>$item->id])}}" class="triangle">{{ $item->ten_lsp }}<span>(8)</span></a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="sidebar-list widget">
                        <h4>Khoảng giá</h4>
                        <ul>
                            <li><a class="{{Request::get('price')==1?'active':''}}" id="price" href="{{request()->fullUrlWithQuery(['price'=>1])}}" class="triangle"><span>Dưới 500.000</span></a></li>
                            <li><a class="{{Request::get('price')==2?'active':''}}" id="price" href="{{request()->fullUrlWithQuery(['price'=>2])}}" class="triangle"><span>500.000 - 1.000.000</span></a></li>
                            <li><a class="{{Request::get('price')==3?'active':''}}" id="price" href="{{request()->fullUrlWithQuery(['price'=>3])}}" class="triangle"><span>1.000.000 - 1.500.000</span></a></li>
                            <li><a class="{{Request::get('price')==4?'active':''}}" id="price" href="{{request()->fullUrlWithQuery(['price'=>4])}}" class="triangle"><span>1.500.000 - 2.000.000</span></a></li>
                            <li><a class="{{Request::get('price')==5?'active':''}}" id="price" href="{{request()->fullUrlWithQuery(['price'=>5])}}" class="triangle"><span>Trên 2.000.000</span></a></li>
                            <li><a id="price" href="{{request()->fullUrlWithQuery(['price'=>null])}}" class="triangle"><span>Bỏ lọc theo khoản giá</span></a></li>
                        </ul>
                    </div>

                    {{-- <div class="checkboxes widget">
                        <h4>Chọn loại sản phẩm</h4>
                        <ul>
                            @foreach ($lsp as $item)
                            <li>
                                <li><a data-id="" href="{{ route('sanpham.loaisanpham', ['id'=>$item->id]) }}" class="triangle">{{ $item->ten_lsp }}<span>(8)</span></a></li>
                            </li>
                            @endforeach
                        </ul>
                    </div> --}}
                </div>
            </div>
