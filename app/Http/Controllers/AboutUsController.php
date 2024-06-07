<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutUs;

class AboutUsController extends Controller
{
    public function editAboutView()
    {
        $aboutUs = AboutUs::first();
        
        if (!$aboutUs) {
            // Initialize a new instance with default values
            $aboutUs = new AboutUs();
        }

        return view('admin.about-us.edit-aboutus', compact('aboutUs'));
    }

    public function updateAbout(Request $request)
    {
        $request->validate([
            'aboutusmetatitle' => 'nullable|string|max:255',
            'aboutusmetadesc' => 'nullable|string|max:255',
            'aboutusmetakeyword' => 'nullable|string|max:255',
            'aboutsecthreeimageone' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'aboutsecthreeimagetwo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'aboutsecthreeimagethree' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            // Add validation rules for other fields as needed
        ]);

        $aboutUs = AboutUs::first();

        // Create a new record if it doesn't exist
        if (!$aboutUs) {
            $aboutUs = new AboutUs();
        }

        $aboutUsData = $request->except('_token', 'aboutsecthreeimageone', 'aboutsecthreeimagetwo', 'aboutsecthreeimagethree');

        // Handle file uploads
        if ($request->hasFile('aboutsecthreeimageone')) {
            $imagePath = $request->file('aboutsecthreeimageone')->move(public_path('admin/about_image'), 'image_one_'.time().'.'.$request->file('aboutsecthreeimageone')->getClientOriginalExtension());
            $aboutUsData['aboutsecthreeimageone'] = 'admin/about_image/' . $imagePath->getFilename();
        }
        if ($request->hasFile('aboutsecthreeimagetwo')) {
            $imagePath = $request->file('aboutsecthreeimagetwo')->move(public_path('admin/about_image'), 'image_two_'.time().'.'.$request->file('aboutsecthreeimagetwo')->getClientOriginalExtension());
            $aboutUsData['aboutsecthreeimagetwo'] = 'admin/about_image/' . $imagePath->getFilename();
        }
        if ($request->hasFile('aboutsecthreeimagethree')) {
            $imagePath = $request->file('aboutsecthreeimagethree')->move(public_path('admin/about_image'), 'image_three_'.time().'.'.$request->file('aboutsecthreeimagethree')->getClientOriginalExtension());
            $aboutUsData['aboutsecthreeimagethree'] = 'admin/about_image/' . $imagePath->getFilename();
        }

        $aboutUs->fill($aboutUsData);
        $aboutUs->save();

        return redirect()->back()->with('success', 'About Us page updated successfully');
    }
}
