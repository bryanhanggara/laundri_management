<?php

namespace App\Http\Controllers\Order;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index($category)
    {
        $services = Service::where('category', $category)->get();
        return view('pages.order.index', compact('services','category'));
    }
}
