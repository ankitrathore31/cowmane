<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\message;

class MsgController extends Controller
{
    public function msgpage()
    {
        return view('admin.message.send-msg');
    }



    public function store(Request $request)
    {
        $request->validate([
            'campaign_name' => 'required|string|max:255',
            'message' => 'required|string|max:1000',
            'numbers' => 'required|string',
            'image.*' => 'nullable|image|max:1024',
            'video' => 'nullable|mimes:mp4,avi,mov|max:3072',
            'pdf' => 'nullable|mimes:pdf|max:2048',
        ]);


        $rawNumbers = $request->input('numbers');
        $cleaned = preg_replace('/\D+/', '', $rawNumbers);
        $numberList = str_split($cleaned, 10);

        $validNumbers = [];
        foreach ($numberList as $number) {
            if (preg_match('/^[6-9]\d{9}$/', $number)) {
                $validNumbers[] = $number;
            }
        }


        $imagePaths = [];
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                $imagePaths[] = $image->store('uploads/images', 'public');
            }
        }

        $videoPath = $request->hasFile('video') ? $request->file('video')->store('uploads/videos', 'public') : null;
        $pdfPath = $request->hasFile('pdf') ? $request->file('pdf')->store('uploads/pdfs', 'public') : null;

    }
}
