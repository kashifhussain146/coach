<?php

// app/Services/DocxReaderService.php

namespace App\Services;

use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Writer\HTML;
use PhpOffice\PhpWord\IOFactory;

class DocxReaderService
{
    public function convert($filePath)
    {
       $phpWord = IOFactory::load($filePath); 
       $htmlWriter = new HTML($phpWord); 
       $htmlWriter->save('test.html');
       return file_get_contents('test.html');
    }

    public function convertToDocx($filePath){
        $phpWord = IOFactory::load($filePath); 
        $htmlWriter = new HTML($phpWord); 
        $htmlWriter->save('test.html');
        return file_get_contents('test.html');
    }
}

