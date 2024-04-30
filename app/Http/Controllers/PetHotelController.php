<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\PetHotel;
use App\Models\Product;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PetHotelController extends Controller
{
    public function index(Request $request)
    {
        $data = [];
        $pethotels = PetHotel::query();
        if ($request->end_date && $request->start_date) {
            $pethotels = $pethotels->whereBetween('start_date', [$request->start_date, $request->end_date])
                ->orWhereBetween('end_date', [$request->start_date, $request->end_date]);
            $data['end_date'] = $request->end_date;
            $data['start_date'] = $request->start_date;
        }
        $pethotels = $pethotels->orderBy('start_date', 'desc')->orderBy('end_date', 'asc')->paginate(10);
        $data['pethotels'] = $pethotels;

        return view('dashboard.pethotel.index', $data);
    }

    public function pethotel_page()
    {
        $date_start = Carbon::now()->addDays(1);
        $date_end = Carbon::now()->addMonths(1);
        $period = CarbonPeriod::create($date_start, $date_end);
        $dates = [];
        foreach ($period as $key => $value) {
            $dates[] = $value->format('Y-m-d');
        }

        $invalidDates = [];
        foreach ($dates as $key => $value) {
            $count = PetHotel::whereHas('order', function ($q) {
                return $q->whereIn('confirmation', ['waiting', 'confirm']);
            })
                ->where('start_date', '<=', $value)
                ->where('end_date', '>=', $value)->count();
            if ($count >= 6) {
                $invalidDates[] = $value;
            }
        }
        $data = [
            'date_start' => $date_start,
            'date_end' => $date_end,
            'invalidDates' => $invalidDates,
        ];

        return view('pethotel_page', $data);
    }

    public function store(Request $request)
    {
        $vaccine = $request->file('vaccine_image');
        $medcheck = $request->file('medcheck_image');
        try {
            $vaccine_path = Storage::disk('public')->put('vaccines', $vaccine);
            $medcheck_path = Storage::disk('public')->put('medchecks', $medcheck);
            $request->merge([
                'vaccine' => $vaccine_path,
                'medcheck' => $medcheck_path,
                'user_id' => Auth::user()->id,
                'product_id' => Product::where('name', 'LIKE', '%hotel')->first()->id,
            ]);
            $petHotel = PetHotel::create($request->all());
            $countDays = (int) date_diff(date_create($request['start_date']), date_create($request['end_date']))->format('%a');
            $price = $petHotel->product->price * ($countDays + 1);
            $order = new Order(['user_id' => $request['user_id'], 'price' => $price]);
            $petHotel->order()->save($order);

            return redirect()->route('index_order')->with('success', 'Berhasil Memesan PetHotel, Silahkan Melakukan Pembayaran pada Halaman Order');
        } catch (\Throwable $th) {
            dd($th->getMessage());

            return redirect()->back()->with('errors', 'Gagal Memesan Pethotel'.$th->getMessage());
        }
    }

    public function show(PetHotel $pethotel)
    {
        return view('dashboard.pethotel.show', compact('pethotel'));
    }

    public function destroy(PetHotel $pethotel)
    {
        try {
            $pethotel->order()->delete();
            $pethotel->delete();
        } catch (\Throwable $th) {
            return redirect()->back()->with('errors', 'Gagal Menghapus Data');
        }

        return redirect()->back()->with('success', 'Berhasil Menghapus Data');
    }

    public function edit(PetHotel $pethotel)
    {
        return view('dashboard.pethotel.edit', compact('pethotel'));
    }

    public function update(Request $request, PetHotel $pethotel)
    {
        $today = Carbon::now();

        if ($request->start_date < $today || $request->end_date < $today) {
            return redirect()->back()->with('errors', 'Tidak dapat mengubah tanggal reservasi yang sudah lewat hari ini.');
        }

        try {
            $countDays = (int) date_diff(date_create($request['start_date']), date_create($request['end_date']))->format('%a');
            $price = $pethotel->product->price * $countDays;
            $pethotel->order->update(['price' => $price]);
            $pethotel->update($request->all());
        } catch (\Throwable $th) {
            return redirect()->route('admin.pethotel.index')->with('errors', 'Gagal Update Data');
        }

        return redirect()->route('admin.pethotel.index')->with('success', 'Berhasil Update Data');
    }
}
