<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class QuoteController extends Controller
{
    public function submitQuote(Request $request)
    {
        // Validate the request
        $request->validate([
            'full_name' => 'required',
            'subject' => 'required',
            'email' => 'required|email',
            'helpRequire' => 'required',
            'assignmentDetails' => 'file|mimes:pdf,doc,docx,zip|max:20480',
            'syllabus' => 'file|mimes:pdf,doc,docx,zip|max:20480',
            'discussionFile' => 'file|mimes:pdf,doc,docx,zip|max:20480',
        ]);

        $data = $request->all();
        Log::info('Email data:', $data);

        $attachments = [];
        if ($request->hasFile('assignmentDetails')) {
            $assignmentDetails = $request->file('assignmentDetails');
            $assignmentDetailsPath = $assignmentDetails->store('uploads');
            $attachments[] = storage_path('app/' . $assignmentDetailsPath);
        }

        if ($request->hasFile('syllabus')) {
            $syllabus = $request->file('syllabus');
            $syllabusPath = $syllabus->store('uploads');
            $attachments[] = storage_path('app/' . $syllabusPath);
        }

        if ($request->hasFile('discussionFile')) {
            $discussionFile = $request->file('discussionFile');
            $discussionFilePath = $discussionFile->store('uploads');
            $attachments[] = storage_path('app/' . $discussionFilePath);
        }

        
        Log::info('Attachments:', $attachments);

        Mail::send('emails.quote', $data, function($message) use ($attachments) {
            $message->to('akash.webshark@gmail.com')->subject('New Quote Request');

            foreach ($attachments as $attachment) {
                $message->attach($attachment);
            }
        });

        if (Mail::failures()) {
            Log::error('Mail failed to send.');
        } else {
            Log::info('Mail sent successfully.');
        }

        return redirect()->back()->with('success', 'Your quote request has been submitted.');
    }
}

// class QuoteController extends Controller
// {
//     public function submitQuote(Request $request)
//     {
//         $data = $request->all();

//         Mail::send('emails.quote', $data, function($message) {
//             $message->to('akash.webshark@gmail.com')->subject('New Quote Request');
//         });

//         return redirect()->back()->with('success', 'Your quote request has been submitted.');
//     }
// }
