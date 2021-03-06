<div class="col-lg-10 col-md-10">
    <div class="row clearfix love-more">
        <div class="col-md-12 column">
            <a href="{{url('item?type=2')}}" class="more">更多&gt;&gt;</a>
        </div>
    </div>
    {{--{{$items}}--}}
    @foreach ($items as $item)
        @if($item->type == 2)
        <div class="col-lg-3 col-md-3 col-sm-6" style="padding: 0px;">
            <div class="product-item">
                <div class="product-img">
                    <a href="{{url("item",$item->id)}}" class="link-dark">
                        <img src="{{$item->url}}" class="img-responsive">
                    </a>
                </div>
                <div class="product-info">
                    <div class="title">
                        <a href="" class="link-dark">{{$item->content }}</a>
                    </div>
                    <p class="text-double"></p>
                    <div class="metas clearfix">
                        <span class="price">￥{{$item->price}}/小时</span>
                        <span class="num">{{$item->sold}}人已付款</span>
                    </div>
                </div>
            </div>
        </div>
        @endif
    @endforeach
</div>