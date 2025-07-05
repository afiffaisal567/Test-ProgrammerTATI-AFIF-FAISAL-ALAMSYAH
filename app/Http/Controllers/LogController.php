<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogController extends Controller
{
    public function index()
    {
        $logs = Log::where('user_id', Auth::id())->latest()->get();

        return view('log.index', compact('logs'));
    }

    public function create()
    {
        return view('log.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'aktivitas' => 'required'
        ]);

        Log::create([
            'user_id' => Auth::id(),
            'aktivitas' => $request->aktivitas,
            'status' => 'Pending',
        ]);

        return redirect()->route('logs.index')->with('status', 'Log berhasil disimpan!');
    }

    public function verify()
    {
        $bawahanIds = Auth::user()->bawahan->pluck('id');

        $logs = Log::whereIn('user_id', $bawahanIds)->latest()->get();

        return view('log.verify', compact('logs'));
    }

    public function updateStatus(Request $request, Log $log)
    {
        $request->validate([
            'status' => 'required|in:Disetujui,Ditolak'
        ]);

        $log->update([
            'status' => $request->status
        ]);

        return redirect()->back()->with('status', 'Status log berhasil diperbarui!');
    }
}
