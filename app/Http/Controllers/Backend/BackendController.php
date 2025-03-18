<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Spatie\Activitylog\Models\Activity;


class BackendController extends Controller
{
    public function index(Request $request)
    {
        // Ambil daftar user yang online berdasarkan cache  
        $onlineUsers = [];
        foreach (User::all() as $user) {
            if (Cache::has('user_online_' . $user->id)) {
                $onlineUsers[] = $user;
            }
        }
        // Ambil 20 aktivitas terbaru dari tabel activity_log
        $activities = Activity::latest()->take(10)->get();


        // Contoh mencatat aktivitas di dalam controller
        activity()
            ->causedBy(auth()->user())
            ->withProperties(['ip' => $request->ip()])
            ->log('User melakukan login');


        if (!auth()->user()->can('backend.index')) {
            return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk melihat daftar booking.');
        }
        return view('backend.index', compact('onlineUsers', 'activities'));
    }
}
