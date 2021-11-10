<div class="col-md-3 col-md-pull-9 col-sm-12">
    <div class="side-bar">
        <div class="sidebar-list widget">
            <h4>Khoảng giá</h4>
            <ul>
                <li><a id="price" href="{{request()->fullUrlWithQuery(['price'=>1])}}" class="triangle"><span>Dưới 500.000</span></a></li>
                <li><a id="price" href="{{request()->fullUrlWithQuery(['price'=>2])}}" class="triangle"><span>500.000 - 1.000.000</span></a></li>
                <li><a  id="price" href="{{request()->fullUrlWithQuery(['price'=>3])}}" class="triangle"><span>1.000.000 - 1.500.000</span></a></li>
                <li><a  id="price" href="{{request()->fullUrlWithQuery(['price'=>4])}}" class="triangle"><span>1.500.000 - 2.000.000</span></a></li>
                <li><a  id="price" href="{{request()->fullUrlWithQuery(['price'=>5])}}" class="triangle"><span>Trên 2.000.000</span></a></li>
            </ul>
        </div>
    </div>
</div>
