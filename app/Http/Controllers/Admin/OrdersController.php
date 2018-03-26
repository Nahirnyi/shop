<?php

namespace App\Http\Controllers\Admin;

use App\Order;
use App\User;
use App\Mobile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::where('status', 'delivered')->get();
        return view('admin.orders.index', ['orders' => $orders, 'name' => 'Нові замовлення']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::pluck('email', 'id')->all();
        $mobiles = Mobile::pluck('name', 'id')->all();
        return view('admin.orders.create', ['mobiles' => $mobiles, 'users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $order = Order::add($request->get('user_id'));
        $order->addMobiles($request->get('mobiles'));
        $order->setDefaultStatus();
        return redirect()->route('orders.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::find($id);
        $mobiles = Mobile::pluck('name', 'id')->all();
        return view('admin.orders.edit', ['order' => $order,'mobiles' => $mobiles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'firstName' => 'required',
            'lastName' => 'required',
            'anotherName' => 'required',
            'city' => 'required',
            'numberDepartment' => 'required'
        ]);

        $order = Order::find($id);
        $order->edit($request->all());
        $order->addMobiles($request->get('mobiles'));
        $order->setDefaultStatus();
        return redirect()->route('orders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Order::find($id)->delete();
        return redirect()->route('orders.index');
    }

    public function sawIndex()
    {
        $orders = Order::where('status', 'saw')->get();
        return view('admin.orders.index', ['orders' => $orders, 'name' => 'Переглянуті замовлення']);
    }

    public function saw($id)
    {
        $order = Order::find($id);
        $order->setStatusSaw();
        return redirect()->back();
    }

    public function roadIndex()
    {
        $orders = Order::where('status', 'road')->get();
        return view('admin.orders.index', ['orders' => $orders, 'name' => 'Замовлення \'У дорозі\'']);
    }

    public function road($id)
    {
        $order = Order::find($id);
        $order->setStatusRoad();
        return redirect()->back();
    }

    public function successIndex()
    {
        $orders = Order::where('status', 'success')->get();
        return view('admin.orders.index', ['orders' => $orders, 'name' => 'Виконані замовлення']);
    }

    public function success($id)
    {
        $order = Order::find($id);
        $order->setStatusSuccess();
        return redirect()->back();
    }
}
