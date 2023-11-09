<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){
        $orderBaru = DB::table('order')
                ->select(DB::raw('COUNT(id) as orderNew'))
                ->where('status_order_id',3)
                ->groupBy('id')
                ->latest()
                ->first();
        $orderMasuk = DB::table('order')
                ->select(DB::raw('COUNT(id) as orderIn'))
                ->where('status_order_id',1)
                ->groupBy('id')
                ->latest()
                ->first();
        $orderBatal = DB::table('order')
                ->select(DB::raw('COUNT(id) as orderCancel'))
                ->where('status_order_id',4)
                ->groupBy('id')
                ->first();
        $orderSelesai = DB::table('order')
                ->select(DB::raw('COUNT(id) as orderDone'))
                ->where('status_order_id',6)
                ->groupBy('id')
                ->first();
        $user = DB::table('users')
                ->select('users.*')
                ->where('role','!=','admin')
                ->get();

        $data = [
            'orderBaru' => $orderBaru,
            'orderMasuk' => $orderMasuk,
            'orderBatal' => $orderBatal,
            'orderSelesai' => $orderSelesai,
            'user' => $user
        ];
        return view('admin.dashboard',$data);

    }
}
