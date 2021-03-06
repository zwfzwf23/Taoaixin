@extends('user.buy.layout')
@section('title','下单')

@section('topbar')
    <ol class="tb-rate-nav-steps">
        <li class="done">
            <span class="">1.拍下商品</span>
        </li>
        <li class="done current-prev">
            <span class="">2.付款到淘爱心</span>
        </li>
        <li class="zhifufukuan">
            <span>3.确认收货</span>
        </li>
        <li class="fklast-current ">
            <strong>4.评价</strong>
        </li>
    </ol>
@endsection
@section('content')
    <div class="section trade-success">
        <div class="trade-info">
            <p class="status">
                交易成功！宝贝等您评价
            </p>
            <div class="message">
                <span>为了帮助更多的小伙伴，了解商品，请您 <a href="{{url('/item', $items->id)}}/rate">【立即评价】</a></span>
            </div>
            <div class="trade-info-center">
            </div>
            <div class="operate">
                <p>
                    <a class="view-more">已买到宝贝列表</a>
                    <a class="view-more" href="{{url('my/order',$items->id)}}">订单详情</a>
                    <span>
                    	联系卖家：
                        <a>{{$seller->name}}</a>
                    </span>
                </p>
            </div>
            <div class="remind">
                <p>
                    <a>点击领取爱心大使积分</a>
                    :淘爱心赠送50个
                </p>
                <p>
                    宝贝享受
                </p>
                <a>
                    <img  src="/img/pay-sucesss/taxps-1.png">
                </a>
                售后保障
            </div>
            <div class="other">
            </div>
            <div class="security-note">
                <div class="tms-securityTips">
                    <i>重要</i>
                    <strong>安全提醒：</strong>
                    下单后，
                    <span style="color:#c30000;font-weight:bold;">用QQ给您发送链接办理退款的都是骗子</span>！
                    <br>淘爱心不存在
                    <span style="color:#c30000;font-weight:bold;">系统升级，订单异常</span>
                    等问题，谨防假冒客服电话诈骗！
                    <a href="#" target="_blank">安心购物，安全无忧。&gt;&gt;</a>
                </div>
            </div>

        </div>
    </div>
    <div class="fav-bottom clearfix" style="width: 1000px;">
        <div class="fav-var3-top fl">
            <div class="var3-top">
                <ul>
                    <li><a href="#" class="var2-left fl">猜你喜欢</a></li>
                    <li><a href="#" class="var2-left fl">淘爱心发现</a></li>
                    <!-- <li><span><hr/></span></li> -->
                    <li><a href="#" class="var2-left fr">根据你最近的浏览发现</a></li>
                </ul>
            </div>
            <div class="fav-item3 fl">
                <div class="fav-list3">
                    <a href="#"><img src="/img/favourite/danpin/danpin1.jpg" alt="taoaixin">
                    </a>
                </div>
                <div class="fav-list3">
                    <a href="#"><img src="/img/favourite/danpin/danpin2.jpg" alt="taoaixin">
                    </a>
                </div>
                <div class="fav-list3">
                    <a href="#"><img src="/img/favourite/danpin/danpin3.jpg" alt="taoaixin">
                    </a>
                </div>
                <div class="fav-list3">
                    <a href="#"><img src="/img/favourite/danpin/danpin1.jpg" alt="taoaixin">
                    </a>
                </div>
            </div>
            <div class="fav-item3 fl">
                <div class="fav-list3">
                    <a href="#"><img src="/img/favourite/danpin/danpin1.jpg" alt="taoaixin">
                    </a>
                </div>
                <div class="fav-list3">
                    <a href="#"><img src="/img/favourite/danpin/danpin2.jpg" alt="taoaixin">
                    </a>
                </div>
                <div class="fav-list3">
                    <a href="#"><img src="/img/favourite/danpin/danpin3.jpg" alt="taoaixin">
                    </a>
                </div>
                <div class="fav-list3">
                    <a href="#"><img src="/img/favourite/danpin/danpin1.jpg" alt="taoaixin">
                    </a>
                </div>
            </div>
        </div>
@endsection