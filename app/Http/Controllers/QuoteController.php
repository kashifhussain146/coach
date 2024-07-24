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
            'confirm_email' => 'required|email|same:email',
            'help_require' => 'required',
            'assignment_details_file' => 'file|mimes:pdf,doc,docx,zip|max:20480',
            'syllabus_file' => 'file|mimes:pdf,doc,docx,zip|max:20480',
            'discussion_board_file' => 'file|mimes:pdf,doc,docx,zip|max:20480',
            // Add more validation rules as per your form fields
        ]);

        // Process form data
        $data = $request->except(['_token', 'confirm_email']);

        // Handle file uploads and store paths in $attachments array
        $attachments = [];
        
        if ($request->hasFile('assignment_details_file')) {
            $assignmentDetails = $request->file('assignment_details_file');
            $assignmentDetailsPath = $assignmentDetails->store('uploads');
            $attachments[] = storage_path('app/' . $assignmentDetailsPath);
        }

        if ($request->hasFile('syllabus_file')) {
            $syllabus = $request->file('syllabus_file');
            $syllabusPath = $syllabus->store('uploads');
            $attachments[] = storage_path('app/' . $syllabusPath);
        }

        if ($request->hasFile('discussion_board_file')) {
            $discussionFile = $request->file('discussion_board_file');
            $discussionFilePath = $discussionFile->store('uploads');
            $attachments[] = storage_path('app/' . $discussionFilePath);
        }

        // Log attachments for debugging purposes
        Log::info('Attachments:', $attachments);

        // Send email
        try {
            Mail::send('emails.quote', $data, function($message) use ($attachments) {
                $recipients = [
                    'akash.webshark@gmail.com',
                    'learn@coachoncouch.com'
                ];
            
                $message->to($recipients)
                        ->subject('New Quote Request');
            
                foreach ($attachments as $attachment) {
                    $message->attach($attachment);
                }
            });
            // Mail::send('emails.quote', $data, function($message) use ($attachments) {
            //     $message->to('akash.webshark@gmail.com')->subject('New Quote Request');

            //     foreach ($attachments as $attachment) {
            //         $message->attach($attachment);
            //     }
            // });

            Log::info('Mail sent successfully.');

        } catch (\Exception $e) {
            Log::error('Error sending mail: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to send email. Please try again later.');
        }

        return redirect()->back()->with('success', 'Your quote request has been submitted.');
    }
}

// class QuoteController extends Controller
// {
//     public function submitQuote(Request $request)
//     {
//         // Validate the request
//         $request->validate([
//             'full_name' => 'required',
//             'subject' => 'required',
//             'email' => 'required|email',
//             'helpRequire' => 'required',
//             'assignmentDetails' => 'file|mimes:pdf,doc,docx,zip|max:20480',
//             'syllabus' => 'file|mimes:pdf,doc,docx,zip|max:20480',
//             'discussionFile' => 'file|mimes:pdf,doc,docx,zip|max:20480',
//         ]);

//         $data = $request->all();
//         Log::info('Email data:', $data);

//         $attachments = [];
//         if ($request->hasFile('assignmentDetails')) {
//             $assignmentDetails = $request->file('assignmentDetails');
//             $assignmentDetailsPath = $assignmentDetails->store('uploads');
//             $attachments[] = storage_path('app/' . $assignmentDetailsPath);
//         }

//         if ($request->hasFile('syllabus')) {
//             $syllabus = $request->file('syllabus');
//             $syllabusPath = $syllabus->store('uploads');
//             $attachments[] = storage_path('app/' . $syllabusPath);
//         }

//         if ($request->hasFile('discussionFile')) {
//             $discussionFile = $request->file('discussionFile');
//             $discussionFilePath = $discussionFile->store('uploads');
//             $attachments[] = storage_path('app/' . $discussionFilePath);
//         }

        
//         Log::info('Attachments:', $attachments);

//         Mail::send('emails.quote', $data, function($message) use ($attachments) {
//             $message->to('akash.webshark@gmail.com')->subject('New Quote Request');

//             foreach ($attachments as $attachment) {
//                 $message->attach($attachment);
//             }
//         });

//         if (Mail::failures()) {
//             Log::error('Mail failed to send.');
//         } else {
//             Log::info('Mail sent successfully.');
//         }

//         return redirect()->back()->with('success', 'Your quote request has been submitted.');
//     }
// }

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
