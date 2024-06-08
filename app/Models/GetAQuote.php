<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GetAQuote extends Model
{
    use HasFactory;
    protected $fillable = [
        'contactmetatitle',
        'contactmetadesc',
        'contactmetakeyword',
        'contactmainhead',
        'contactmaindesc',
        'contactlasthead',
        'contactlastdesc',
        'contactlastmail',
    ];
}
