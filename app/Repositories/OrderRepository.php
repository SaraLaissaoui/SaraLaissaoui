<?php

namespace App\Repositories;

use App\Interfaces\Repositories\OrderRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderRepository implements OrderRepositoryInterface
{
    public function create(array $order)
    {
        return Order::create($order);
    }

    public function bulkInsert($dto){
         return Order::insert($dto);
    }

    public function getAll()
    {
        return Order::all();
    }

    public function getById($orderId)
    {
        $order = Order::find($orderId);
        return $order;
    }

    public function update($orderId, array $order)
    {
        //update order if want to change it before 5 min
    }

    public function delete($orderId)
    {
        //delete order in case client left
    }
}
