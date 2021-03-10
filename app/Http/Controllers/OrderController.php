<?php

namespace App\Http\Controllers;

use App\Company;
use App\Contact;
use App\ContactRole;
use App\Http\Requests\CreateContact;
use App\Http\Requests\CreateOrder;
use App\Http\Requests\UpdateContact;
use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy('id','desc')->paginate(25);

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

                //prepare notification
            }
        }


        return redirect()->route('order')->with('alert', 'Order created!');
    }

    public function mail(Order $order)
    {
        return view('mailing.order', compact('order'));
    }
}
