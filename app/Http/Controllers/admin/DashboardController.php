<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $orderBaru = DB::table('order')
            ->select(DB::raw('COUNT(id) as orderNew'))
            ->where('status_order_id', 3)
            ->groupBy('id')
            ->latest()
            ->first();
        $orderMasuk = DB::table('order')
            ->select(DB::raw('COUNT(id) as orderIn'))
            ->where('status_order_id', 1)
            ->groupBy('id')
            ->latest()
            ->first();
        $orderBatal = DB::table('order')
            ->select(DB::raw('COUNT(id) as orderCancel'))
            ->where('status_order_id', 4)
            ->groupBy('id')
            ->first();
        $orderSelesai = DB::table('order')
            ->select(DB::raw('COUNT(id) as orderDone'))
            ->where('status_order_id', 6)
            ->groupBy('id')
            ->first();
        $user = DB::table('users')
            ->select('users.*')
            ->where('role', '!=', 'admin')
            ->get();

        $tahun = date('2024');
        $namaChart = DB::table('detail_order')
            ->join('products', 'products.id', '=', 'detail_order.product_id')
            ->join('order', 'order.id', '=', 'detail_order.order_id')
            ->where('order.status_order_id', 6)
            ->whereYear('detail_order.created_at', $tahun)
            ->groupBy(DB::raw('month(detail_order.created_at)'))
            ->select('products.name as nama')
            ->first();

        $totalSold = DB::table('detail_order')
            ->join('products', 'products.id', '=', 'detail_order.product_id')
            ->join('order', 'order.id', '=', 'detail_order.order_id')
            ->where('order.status_order_id', 6)
            ->whereYear('detail_order.created_at', $tahun)
            ->groupBy(DB::raw('month(detail_order.created_at)'))
            ->select(DB::raw('count(detail_order.id) as total'))
            ->first();
        $bulan = DB::table('detail_order')
            ->select(DB::raw('month(detail_order.created_at) as month'))
            ->whereYear('detail_order.created_at', $tahun)
            ->groupBy(DB::raw('month(detail_order.created_at)'))
            ->pluck('month');
        $stats = DB::table('order')
            ->where('order.status_order_id', 6)
            ->first();
        for ($i = 1; $i <= 12; $i++) {
            $datas[] = 0;
        }
        if($stats){
            foreach ($bulan as $index => $month) {
                $datas[$month - 1] = $totalSold->total;
            }
        }
        $data = [
            'orderBaru' => $orderBaru,
            'orderMasuk' => $orderMasuk,
            'orderBatal' => $orderBatal,
            'orderSelesai' => $orderSelesai,
            'user' => $user,
        ];
        return view('admin.dashboard', $data, compact('bulan', 'datas', 'namaChart'));

    }
}
