<div class="col-lg-12">
    <!-- Ls widget -->
    <div class="ls-widget">
        <div class="tabs-box">
            <div class="widget-title">
                <h4>Đơn hàng</h4>
            </div>
            <form class="widget-content" action="{{route('company.payment')}}" method="POST">
              @csrf
                <div class="row">
                    <div class="col-sm-12 col-lg-12">
                        Hóa đơn số : 10
                    </div>
                    <div class="col-sm-12 col-lg-12">
                        Tên gói cước : Gói 100c
                    </div>
                    <div class="col-sm-12 col-lg-12">
                        Giá trị : 100coin
                    </div>
                    <div class="col-sm-12 col-lg-12">
                        Số tiền thanh toán : 2.000.000.vnđ
                    </div>
                    <input type="hidden" name="invoice_id" value="{{$invoice['id']}}">
                    <input type="hidden" name="redirect" value="1">
                    <button class="btn btn-primary btn_payment">Thanh toán</button>
                    <br>
                    <button class="btn btn-secondary">Hủy</button>
                </div>
              </form>
        </div>
    </div>
</div>
