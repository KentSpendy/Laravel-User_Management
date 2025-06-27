<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ActivityLog;

class ActivityLogController extends Controller
{
    public function index()
    {
        $user = session('user');

        if (!$user || $user->role !== 'admin') {
            abort(403, 'Unauthorized');
        }

        $logs = ActivityLog::with('user')->latest()->get();
        return view('logs.index', compact('logs'));
    }
}
