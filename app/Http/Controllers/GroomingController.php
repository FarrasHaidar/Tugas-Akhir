<?php

namespace App\Http\Controllers;

use App\Models\Grooming;
use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GroomingController extends Controller
{
    public function grooming_page()
    {
        $services = Product::whereHas('category', function ($query) {
            $query->where('name', 'LIKE', '%grooming%');
        })->get();

        $date_start = Carbon::now()->addDays(1);
        $date_end = Carbon::now()->addMonths(1);
        $data = [
            'date_start' => $date_start,
            'date_end' => $date_end,
            'services' => $services,
        ];

        return view('grooming_page', $data);
    }

    public function show_groomingForm()
    {
        return view('show_groomingForm');
    }

    public function index(Request $request)
    {
        $data = [];
        $groomings = Grooming::query();
        if ($request->end_date && $request->start_date) {
            $groomings = $groomings->whereBetween('date', [$request->start_date, $request->end_date]);
            $data['end_date'] = $request->end_date;
            $data['start_date'] = $request->start_date;
        }
        $groomings = $groomings->orderBy('date', 'desc')->orderBy('session', 'asc')->paginate(10);
        $data['groomings'] = $groomings;

        return view('dashboard.grooming.index', $data);
    }

    public function store(Request $request)
    {
        try {
            $request->merge(['user_id' => Auth::user()->id]);
            $request['session'] = date('H:i', strtotime($request['session']));
            $grooming = Grooming::create($request->all());
            $order = new Order(['user_id' => $request['user_id'], 'price' => $grooming->product->price]);
            $grooming->order()->save($order);
        } catch (\Throwable $th) {
            dd($th->getMessage());

            return redirect()->back()->with('errors', 'Pemesanan Gagal Dilakukan');
        }

        return redirect()->route('index_order')->with('success', 'Berhasil Memesan Grooming, Silahkan Melakukan Pembayaran pada Halaman Order');
    }

    public function checkJadwal(Request $request)
    {
        $invalidSession = Grooming::select('session', DB::raw('COUNT(*) as jumlah'))
            ->where('date', $request->date)
            ->whereHas('order', function ($q) {
                return $q->whereIn('confirmation', ['waiting', 'confirm']);
            })
            ->groupBy('session')
            ->havingRaw('COUNT(*) > 1')->get();

        return response()->json([
            'session' => $invalidSession,
        ]);
    }

    public function show(Grooming $grooming)
    {
        return view('dashboard.grooming.show', compact('grooming'));
    }

    public function destroy(Grooming $grooming)
    {
        try {
            $grooming->order()->delete();
            $grooming->delete();
        } catch (\Throwable $th) {
            // throw $th;
            return redirect()->back()->with('errors', 'Gagal Menghapus Data');
        }

        return redirect()->back()->with('success', 'Berhasil Menghapus Data');
    }

    public function edit(Grooming $grooming)
    {
        $products = Product::where('name', 'LIKE', '%grooming%')->get();

        return view('dashboard.grooming.edit', compact('grooming', 'products'));
    }

    public function update(Request $request, Grooming $grooming)
    {
        try {
            $product = Product::find($request['product_id']);
            $grooming->order->update(['price' => $product->price]);
            $grooming->update($request->all());
        } catch (\Throwable $th) {
            return redirect()->route('admin.grooming.index')->with('errors', 'Gagal Update Data');
        }

        return redirect()->route('admin.grooming.index')->with('success', 'Berhasil Update Data');
    }
}
