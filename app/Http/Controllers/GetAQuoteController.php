<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GetAQuote;

class GetAQuoteController extends Controller
{
    public function editGetAQuoteView()
    {
        $contactUs = GetAQuote::first();
        return view('admin.get-a-quote.edit-get-a-quote', compact('contactUs'));
    }

    public function updateGetAQuote(Request $request)
    {
        // $request->validate([
        //     'contactmetatitle' => 'nullable|string|max:255',
        //     'contactmetadesc' => 'nullable|string|max:255',
        //     'contactmetakeyword' => 'nullable|string|max:255',
        //     'contactmainhead' => 'nullable|string|max:255',
        //     'contactmaindesc' => 'nullable|string|max:255',
        //     'contactlasthead' => 'nullable|string|max:255',
        //     'contactlastdesc' => 'nullable|string|max:255',
        //     'contactlastmail' => 'nullable|string|max:255',
        // ]);

        $contactUs = GetAQuote::first();

        if (!$contactUs) {
            $contactUs = new GetAQuote();
        }

        $contactUsData = $request->except('_token');
        $contactUs->fill($contactUsData);
        $contactUs->save();

        return redirect()->back()->with('success', 'Get a Quote page updated successfully');
    }
}
