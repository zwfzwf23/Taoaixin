<?php

namespace App\Http\Controllers\Portal;

use App\Models\User;
use App\Models\Item;
use App\Models\ItemRate;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use Illuminate\Support\Facades\Session;

class ItemController extends Controller
{
    public function index(Request $request)
    {
        $this->validate($request, [
            'offset'    =>  'integer|min:0',
            'limit'     =>  'integer|min:0'
        ]);

        $items = Item::skip($request->input('offset', 0))->take($request->input('limit', 16))->get();
        $sellers = User::whereIn('id', $items->pluck('user_id'))->get()->keyBy('id');
//        return response()->json(['items' => $items, 'sellers' => $sellers]);
        return view('home.index',['items' => $items, 'sellers' => $sellers]);
    }

    public function show(Request $request, $item_id)
    {
        $this->validate($request, [
            'offset'    =>  'integer|min:0',
            'limit'     =>  'integer|min:0'
        ]);

        $item = Item::findOrFail($item_id);
        $seller = User::findOrFail($item->user_id);
        $rates = ItemRate::where('item_id', $item->id)->skip($request->input('offset', 0))->take($request->input('limit', 10))->get()->keyBy('id');
        $buyers = User::whereIn('id', $rates->pluck('buyer_user_id'))->get();
//        $rates = $rates -> toArray();
//        foreach ($buyers as $buyer) {
//            $rates[$buyer['id']]['name'] = $buyer->name;
//        }
//        var_dump($rates);
//        return response()->json(['item' => $item, 'seller' => $seller, 'rates' => $rates]);
        return view('item.show',['item' => $item, 'seller' => $seller, 'rates' => $rates]);
    }
    public function showAll(Request $request)
    {
        $type = $request->get("type");
        $this->validate($request, [
            'offset'    =>  'integer|min:0',
            'limit'     =>  'integer|min:0'
        ]);
        $items = Item::where('type', $type)->skip($request->input('offset', 0))->take($request->input('limit', 10))->orderBy('id','desc')->get()->keyBy('id');
        return view('item.items',['items' => $items, 'type' => $type]);
    }
    public function rateShow(Request $request, $order_id)
    {
        $order = Order::find($order_id);
        $item = Item::find($order->item_id);
        return view('user.buy.rate', ['item' => $item, 'orderId' => $order->id]);
    }
    public function buy(Request $request,$id)
    {
        $number=$request->get("amount");
        $item = Item::find($id);
        $sum=$item->price*$number;
        $info = UserProfile::where('user_id', Session::get('userid'))->orderBy('id','desc')->first();

        return view("user.buy.buy",["items"=>$item,"number"=>$number,"sum"=>$sum, "info" => $info]);
    }
    public function pay($id)
    {
//        $number=Session::get("number");
        $item = Item::find($id);
        $order = Order::where('item_id', $id)->first();
        $sum=$order->number*$order->price;
        $seller=DB::table("users")->where("id",$item->user_id)->first();
        $info = UserProfile::where('user_id', Session::get('userid'))->orderBy('id','desc')->first();
        if(empty($info)){
            $address = '请添加地址';
        }else {
            $address = $info->province.' '.$info->city.' '.$info->area.' '.$info->address.' '.$info->name.' '.$info->mobile;
        }
        return view("user.buy.pay",["items"=>$item,"seller"=>$seller,"sum"=>$sum, 'address'=>$address]);
    }
    public function paySuccess($id)
    {
//        $number=Session::get("number");
        $item = Item::find($id);
        $order = Order::where('item_id', $id)->orderBy('id', 'desc')->first();
        $order -> update([
           'type' => 'payed'
        ]);
        $sum=$order->number*$order->price;
        $seller=DB::table("users")->where("id",$item->user_id)->first();
        $info = UserProfile::where('user_id', Session::get('userid'))->orderBy('id','desc')->first();
        $address = $info->province.' '.$info->city.' '.$info->area.' '.$info->address.' '.$info->name.' '.$info->mobile;
        return view("user.buy.paySuccess",["items"=>$item,"seller"=>$seller,"sum"=>$sum,"order"=>$order, 'address' => $address]);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'item_id'   =>  'required|integer|min:0',
            'note'      =>  'string',
            'type'    =>   'integer|min:0'
        ]);
    }
    public function search(Request $request) {
        $this->validate($request, [
            'offset'    =>  'integer|min:0',
            'limit'     =>  'integer|min:0',
            'name'      =>  'string',
            'price_min' =>  'integer|min:0',
            'price_max' =>  'integer|min:0',
            'order'     =>  'in:view,sold,price,id',
            'by'        =>  'in:asc,desc',
        ]);
        $type = $request->get("type");
        $search = array_filter($request->only('name', 'price_min', 'price_max', 'order', 'by'), function($var){
            return !empty($var);}
            );

        $items = new Item;
        if (isset($search['name'])) {
            $items = $items->where('name', 'LIKE', '%'.$search['name'].'%');
        }
        if (isset($search['price_min'])) {
            $items = $items->where('price', '>', $search['price_min']);
        }
        if (isset($search['price_max'])) {
            $items = $items->where('price', '<', $search['price_max']);
        }
        $items = $items->skip($request->input('offset', 0))->take($request->input('limit', 10))->orderBy($request->input('order', 'id'), $request->input('by', 'DESC'))->get();
        $sellers = User::whereIn('id', $items->pluck('user_id'))->get()->keyBy('id');

        return view('item.items',['items' => $items, 'type' => $type]);
//        return response()->json(['items' => $items, 'sellers' => $sellers, 'search' => $search]);
    }
}