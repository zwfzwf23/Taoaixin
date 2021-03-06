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
    <div class="panel panel-default address-order clearfix">
        <h4 class="agree">我已收到货，同意淘爱心付款</h4>
        <div class="panel-heading">
            <h3 class="shopping_tit">订单信息</h3>
        </div>
        <div class="shopping_item">
            <div class="shopping_cont pb_10">
                <div class="cart_inner">
                    <div class="cart_head clearfix">
                        <div class="cart_item t_name">商品名称</div>
                        <div class="cart_item t_price">单价</div>
                        <div class="cart_item t_num">数量</div>
                        <div class="cart_item t_subtotal">小计</div>
                        <div class="cart_item t_return">运费</div>
                    </div>
                    <div class="cart_cont clearfix">
                        <div class="cart_item t_name">
                            <div class="cart_shopInfo clearfix">
                                <img src="{{url($item['url'])}}" alt="">
                                <div class="cart_shopInfo_cont">
                                    <p class="cart_link"><a href="#">{{$item['content']}}</a></p>
                                    {{--<p class="cart_info">[赠品]：真皮保护套</p>--}}
                                </div>
                            </div>
                        </div>
                        <div class="cart_item t_price">
                            ￥{{$item['price']}}
                        </div>
                        <div class="cart_item t_subtotal">{{$item['number']}}</div>
                        <div class="cart_item t_subtotal t_red">￥{{$item['sum']}}</div>
                        <div class="cart_item t_num">0.00</div>
                    </div>
                    <!--<div class="cart_message">-->
                    <!--若有问题请留言，若有问题请留言-->
                    <!--</div>-->
                    <!--<div class="cart_prompt"><i class="cart_prompt_icon"></i>抱歉，以下商品已失效，无法购买。</div>-->
                    <!--<div class="cart_cont cart_no_bor clearfix">-->
                    <!--<div class="cart_item t_name">-->
                    <!--<div class="cart_shopInfo clearfix">-->
                    <!--<img src="images/details/taxxq-2.jpg" alt="">-->
                    <!--<div class="cart_shopInfo_cont">-->
                    <!--<p class="cart_link"><a href="#">iPad mini2 Apple/苹果 配备Retina显示屏的iPad mini</a></p>-->
                    <!--<p class="cart_info">1450.00［无货］</p>-->
                    <!--</div>-->
                    <!--</div>-->
                    <!--</div>-->
                    <!--</div>-->
                </div>
            </div>
        </div>
        {{--<p class="money">实付款 <span></span></p>--}}
        <p class="money">实付款 <span>{{$item['sum']}}</span></p>
        <!--<input type="button" class="btn btn-danger btn-bought" value="确认收货"></a>-->

    </div>
    <div class="panel panel-default address-order">
        <div class="panel-body">
            <table class="table table-striped">

                <tr>
                    <th>订单编号</th>
                    <td>201612021456</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th>淘爱心账号</th>
                    <td>{{$item['email']}}</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th>卖家昵称</th>
                    <td>{{$item['name']}}</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th>买家信息</th>
                    <td>{{$item['address']}}</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th>交易时间</th>
                    <td>{{$item['created']}}</td>
                    <td></td>
                    <td></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="panel panel-default address-order">
        <div class="panel-heading">
            确认收货
        </div>
        <div class="panel-body">
            @if($item['type'] == 'completed')
                订单状态：<p class="confirm">交易成功</p>
                <a href="{{url('item',$item['order_id'])}}/rate"><input type="button" class="btn btn-danger btn-bought" value="立即评价"></a>
            @else
                <p class="confirm">请收到货后再确认收货！否则您可能钱货两空！</p>
                <p class="password">淘爱心支付密码：</p>
                <input type="password" placeholder="支付密码" class="form-control password">
                <a href="">忘记密码？</a>
                <a href="{{url('/my/order',$item['order_id'])}}/tradesuccess"><input type="button" class="btn btn-danger btn-bought" value="确认收货"></a>
            @endif
        </div>
    </div>
@endsection