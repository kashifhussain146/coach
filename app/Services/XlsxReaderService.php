<?php
namespace App\Services;
use PhpOffice\PhpSpreadsheet\IOFactory;
class XlsxReaderService
{
    public function convert($filePath)
    {
      
        $spreadsheet = IOFactory::load($filePath);

        $htmlContents = "";

        foreach ($spreadsheet->getAllSheets() as $sheet) {
            $sheetData = $sheet->toArray();
            $htmlContent = '<table border="0" style="width:100%">';
            $htmlContent.="<h3>".$sheet->getTitle()."</h3>";
            foreach ($sheetData as $row) {
                $htmlContent .= '<tr>';
                foreach ($row as $cell) {
                    $htmlContent .= '<td>' . htmlspecialchars($cell) . '</td>';
                }
                $htmlContent .= '</tr>';
            }
            $htmlContent .= '</table>';
            $htmlContents.=$htmlContent;
        }

        return $htmlContents;
    }
}

