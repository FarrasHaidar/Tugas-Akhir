<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class OrderController extends Controller
{
    public function show(Request $request, Order $order)
    {
        return view('dashboard.order.show', compact('order'));
    }

    public function destroy(Order $order)
    {
        try {
            $order->service()->delete();
            $order->delete();
        } catch (\Throwable $th) {
            // throw $th;
            return redirect()->back()->with('errors', 'Gagal Menghapus Data');
        }

        return redirect()->back()->with('success', 'Berhasil Menghapus Data');
    }

    public function index_order()
    {
        $user = Auth::user();
        $pethotelOrders = $user->orders()->whereHas('service', function ($query) {
            $query->where('service_type', 'LIKE', '%PetHotel%');
        })->orderBy('created_at', 'desc')->get();
        $groomingOrders = $user->orders()->whereHas('service', function ($query) {
            $query->where('service_type', 'LIKE', '%Grooming%');
        })->orderBy('created_at', 'desc')->get();

        return view('index_order', compact('groomingOrders', 'pethotelOrders'));
    }

    public function show_order(Order $order)
    {
        $user = Auth::user();
        $is_admin = $user->is_admin;

        if ($is_admin || $user->id == $user->id) {
            return view('show_order', compact('order'));
        }

        return Redirect::route('index_order');
    }

    public function submit_payment_receipt(Order $order, Request $request)
    {
        try {
            if ($request->hasFile('payment_receipt')) {
                $file = $request->file('payment_receipt');

                $path = $file->store('payment_receipts', 'public');

                $order->update([
                    'payment_receipt' => $path,
                ]);

                return redirect()->back()->with('success', 'Berhasil Upload Bukti Pembayaran');
            } else {
                return redirect()->back()->with('errors', 'Gagal Upload Bukti Pembayaran: File tidak ditemukan');
            }
        } catch (\Throwable $th) {
            dd($th->getMessage());

            return redirect()->back()->with('errors', 'Gagal Upload Bukti Pembayaran: Terjadi kesalahan');
        }
    }

    public function confirm_payment(Order $order)
    {
        if ($order->payment_receipt == null) {
            Alert::error('Konfirmasi Gagal', 'Pengguna belum upload bukti bayar');

            return redirect()->back();
        }
        $order->update([
            'confirmation' => 'confirm',
            'is_paid' => true,
        ]);

        Alert::success('Payment Confirmed', 'Pembayaran telah dikonfirmasi!');

        return redirect()->back();
    }

    public function reject_payment(Request $request, Order $order)
    {
        try {
            $order->update([
                'payment_receipt' => null,
                'is_paid' => false,
                'confirmation' => 'reject', 'reject_message' => $request->reject_message,
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->with('errors', 'Gagal Update Pembayaran');
        }

        return redirect()->back()->with('success', 'Berhasil Menolak Pembayaran');
    }

    public function index(Request $request)
    {
        $data = [];
        $orders = Order::query();
        if ($request->end_date && $request->start_date) {
            $orders = $orders->whereBetween('created_at', [$request->start_date, $request->end_date]);
            $data['end_date'] = $request->end_date;
            $data['start_date'] = $request->start_date;
        }
        $orders = $orders->orderBy('updated_at', 'desc')->paginate(10);
        $data['orders'] = $orders;

        return view('dashboard.order.index', $data);
    }

    public function filter(Request $request)
    {
        $start_date = $request->start_date;
        $end_date = $request->end_date;

        $orders = Order::whereDate('created_at', '>=', $start_date)
            ->whereDate('created_at', '<=', $end_date)
            ->get();

        return view('order_data', compact('orders'));
    }

    public function acceptOrder(Order $order)
    {
        try {
            $order->update(['confirmation' => 'accept_form']);
        } catch (\Throwable $th) {
            return redirect()->back()->with('errors', 'Gagal Menerima Pesanan');
        }

        return redirect()->back()->with('success', 'Berhasil Menerima Pesanan');
    }

    public function rejectOrder(Request $request, Order $order)
    {
        try {
            $order->update(['confirmation' => 'reject_form', 'reject_message' => $request->reject_message]);
        } catch (\Throwable $th) {
            return redirect()->back()->with('errors', 'Gagal Update Pesanan');
        }

        return redirect()->back()->with('success', 'Berhasil Menolak Pesanan');
    }
}
