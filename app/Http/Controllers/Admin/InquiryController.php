<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inquiry;

class InquiryController extends Controller
{
    public function index(Request $request)
    {
        $query = Inquiry::latest();
        if ($request->status) {
            $query->where('status', $request->status);
        }
        $inquiries = $query->paginate(20);
        return view('admin.inquiries.index', compact('inquiries'));
    }

    public function show(Inquiry $inquiry)
    {
        if ($inquiry->status === 'new') {
            $inquiry->update(['status' => 'read']);
        }
        return view('admin.inquiries.show', compact('inquiry'));
    }

    public function markAsRead(Inquiry $inquiry)
    {
        $inquiry->update(['status' => 'contacted']);
        return back()->with('success', 'Inquiry marked as contacted.');
    }

    public function updateStatus(Request $request, Inquiry $inquiry)
    {
        $request->validate(['status' => 'required|string|in:new,read,contacted,completed']);
        $inquiry->update(['status' => $request->status]);
        return back()->with('success', 'Status updated successfully.');
    }

    public function destroy(Inquiry $inquiry)
    {
        $inquiry->delete();
        return redirect()->route('admin.inquiries.index')->with('success', 'Inquiry deleted successfully.');
    }
}
