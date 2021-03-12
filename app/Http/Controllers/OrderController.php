<?php

namespace App\Http\Controllers;

use App\Company;
use App\Http\Requests\CreateOrder;
use App\Mail\OrderShipped;
use App\Notifications\OrderCreate;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $sort = $request->input('sort');
        switch ($sort) {
            case "items":
                $orders = Order::select('orders.*')->rightJoin('order_items', 'orders.id', '=', 'order_items.order_id')->orderByDesc('order_items.quantity')->paginate(25);
                break;
            case "total":
                $orders = Order::select('orders.*')->rightJoin('order_items', 'orders.id', '=', 'order_items.order_id')->orderByDesc('order_items.price')->paginate(25);
                break;
            default:

                $orders = Order::orderBy('id','desc')->paginate(25);
                break;
        }

        return view('order.index', compact('orders'));
    }

    public function create()
    {
        $order = new Order();
        $companies = Company::pluck('name', 'id');

        return view('order.create', compact('order', 'companies'));
    }

    public function store(CreateOrder $request)
    {
        $data = $request->except('_token');

        $order = Order::create($data);
        if(is_numeric($order->id)) {
            if(isset($data['items']) and count($data['items'])) {
                $totalItems = [];
                foreach($data['items'] as $key => $item) {
                    if(isset($data['price'][$key]) && $data['price'][$key] > 0) {
                        $totalItems[] = $order->items()->create([
                            'product' => $item,
                            'price' => $data['price'][$key],
                            'quantity' => isset($data['quantity'][$key]) ? $data['quantity'][$key] : 1
                        ]);
                    }

                }
                Mail::to('info@pretendcompany.com')->send(new OrderShipped($order));
                $order->notify(new OrderCreate($order));
                dd('done');
            }
        }


        return redirect()->route('order')->with('alert', 'Order created!');
    }

    public function notifications()
    {
        $notifications = DB::select("select * from notifications where notifications.notifiable_type LIKE '%Order%' and notifications.read_at is null order by notifications.id DESC");
        DB::update("update notifications set notifications.read_at = CURRENT_TIMESTAMP() where notifications.notifiable_type LIKE '%Order%' and notifications.read_at is null");
        return $notifications;

    }


}
