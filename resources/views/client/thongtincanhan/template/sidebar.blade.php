<div class="col-md-3 col-md-pull-9 col-sm-12">
    <div class="side-bar">
        <div class="sidebar-list widget">
            <h4>CÀI ĐẶT</h4>
            <ul>
                <li><a href="{{ route('profile.edit', ['id'=> Auth::guard('nguoi_dung')->user()->id]) }}"class="triangle">Thông tin cá nhân</a></a></li>
                <li><a href="#" class="triangle">Thông tin cửa hàng</a></li>
                <li><a href="{{ route('password.edit', ['id'=>Auth::guard('nguoi_dung')->user()->id]) }}" class="triangle">Đổi mật khẩu</a></a></li>
                <li><a href="{{ route('order.index') }}" class="triangle">Đơn hàng đã đặt</a></a></li>

            </ul>
        </div>
    </div>
</div>
