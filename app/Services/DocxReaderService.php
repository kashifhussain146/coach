<?php

// app/Services/DocxReaderService.php

namespace App\Services;

use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Shared\Html;
use PhpOffice\PhpWord\IOFactory;

class DocxReaderService
{
    public function convert($filePath)
    {
       $phpWord = \PhpOffice\PhpWord\IOFactory::load($filePath); 
       $htmlWriter = new \PhpOffice\PhpWord\Writer\HTML($phpWord); 
       $htmlWriter->save('test.html');
       return file_get_contents('test.html');
    }

    public function convertToDocx($htmlContent, $outputFilePath){
         // Create a new PhpWord instance
        $phpWord = new PhpWord();

        // Add HTML content to the document
        $section = $phpWord->addSection();
        Html::addHtml($section, $htmlContent);

        // Save the document as a DOCX file
        $objWriter = IOFactory::createWriter($phpWord, 'Word2013');
        $objWriter->save($outputFilePath);
    }
}

