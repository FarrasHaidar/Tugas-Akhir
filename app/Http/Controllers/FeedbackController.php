<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = [];
        $feedbacks = Feedback::query();
        if ($request->end_date && $request->start_date) {
            $feedbacks = $feedbacks->whereBetween('created_at', [$request->start_date, $request->end_date]);
            $data['end_date'] = $request->end_date;
            $data['start_date'] = $request->start_date;
        }
        $feedbacks = $feedbacks->orderBy('created_at', 'desc')->paginate(10);
        $data['feedbacks'] = $feedbacks;

        return view('dashboard.feedback.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            Feedback::create($request->all());
        } catch (\Throwable $th) {
            dd($th->getMessage());

            return redirect()->back()->with('errors', 'Gagal Mengirimkan Feedback');
        }

        return redirect()->back()->with('success', 'Berhasil Mengirimkan Feedback');
    }

    /**
     * Display the specified resource.
     */
    public function show(feedback $feedback)
    {
        // dd($feedback);
        return view('dashboard.feedback.show', compact('feedback'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(feedback $feedback)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, feedback $feedback)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(feedback $feedback)
    {
        try {
            $feedback->delete();
        } catch (\Throwable $th) {
            // throw $th;
            return redirect()->back()->with('errors', 'Gagal Menghapus Data');
        }

        return redirect()->back()->with('success', 'Berhasil Menghapus Data');
    }
}
