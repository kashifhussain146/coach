<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    use HasFactory;

    protected $fillable = [
        'aboutusmetatitle',
        'aboutusmetadesc',
        'aboutusmetakeyword',
        'aboutusbannerdesc',
        'aboutsectwotagline',
        'aboutsectwoheading',
        'aboutsectwoinnerheadingone',
        'aboutsectwoinnertextone',
        'aboutsectwoinnerheadingtwo',
        'aboutsectwoinnertexttwo',
        'aboutsecthreetagline',
        'aboutsecthreeimageone',
        'aboutsecthreeimagetwo',
        'aboutsecthreeimagethree',
        'aboutsecthreeheadone',
        'aboutsecthreeheadtwo',
        'aboutsecthreeheadthree',
        'aboutsecthreedescone',
        'aboutsecthreedesctwo',
        'aboutsecthreedescthree',
        'aboutsecfourtagline',
        'aboutsecfourheading',
        'aboutsecfourinnerheadone',
        'aboutsecfourinnerdescone',
        'aboutsecfourinnerheadtwo',
        'aboutsecfourinnerdesctwo',
        'aboutsecfaqtagline',
        'aboutsecfaqheadone',
        'aboutsecfaqdescone',
        'aboutsecfaqheadtwo',
        'aboutsecfaqdesctwo',
        'aboutsecfaqheadthree',
        'aboutsecfaqdescthree',
        'aboutsecfaqheadfour',
        'aboutsecfaqdescfour',
    ];
}
