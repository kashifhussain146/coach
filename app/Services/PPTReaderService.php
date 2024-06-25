<?php
namespace App\Services;
use PhpOffice\PhpPresentation\PhpPresentation;
use PhpOffice\PhpPresentation\IOFactory;
use PhpOffice\PhpPresentation\Shape\RichText;
use PhpOffice\PhpPresentation\Shape\MemoryDrawing;
use PhpOffice\PhpPresentation\Shape\AbstractDrawing;
use Intervention\Image\ImageManagerStatic as Image;
use PhpOffice\PhpPresentation\Shape\Drawing\Gd;
class PPTReaderService
{
public function convert($filePath)
    {
        $presentation = IOFactory::load($filePath);
        $htmlContents = '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">';

        foreach ($presentation->getAllSlides() as $index => $slide) {
            $htmlContents .= '<div class="card mb-4">';
            //$htmlContents .= '<div class="card-header">Slide ' . ($index + 1) . '</div>';
            $htmlContents .= '<div class="card-body">';

            foreach ($slide->getShapeCollection() as $shape) {
                if ($shape instanceof RichText) {
                    foreach ($shape->getParagraphs() as $paragraph) {
                        foreach ($paragraph->getRichTextElements() as $textRun) {
                            $style = $this->getTextRunStyle($textRun);
                            $htmlContents .= '<p style="' . $style . '">' . $textRun->getText() . '</p>';
                        }
                    }
                } elseif ($shape instanceof MemoryDrawing) {
                    $imageData = $shape->getImageContents();
                    $base64 = 'data:' . $shape->getMimeType() . ';base64,' . base64_encode($imageData);
                    $htmlContents .= '<img src="' . $base64 . '" class="img-fluid" alt="Slide Image"><br>';
                } elseif ($shape instanceof Gd) {
                    $imageResource = $shape->getImageResource();
                    ob_start();
                    imagepng($imageResource);
                    $imageData = ob_get_contents();
                    ob_end_clean();
                    $imageMimeType = $shape->getMimeType();
                    $imageBase64 = 'data:' . $imageMimeType . ';base64,' . base64_encode($imageData);
                    $htmlContents .= '<div > <img  src="' . $imageBase64 . '" class="img-fluid" alt="Slide Image"></div><br>';
                } elseif ($shape instanceof Drawing) {
                    $imageData = $shape->getImageContents();
                    $base64 = 'data:' . $shape->getMimeType() . ';base64,' . base64_encode($imageData);
                    $htmlContents .= '<img src="' . $base64 . '" class="img-fluid" alt="Slide Image"><br>';
                } else {
                    $htmlContents .= '<p>Unhandled Shape</p>';
                }
            }

            $htmlContents .= '</div>'; // Close card-body
            $htmlContents .= '</div>'; // Close card
        }

        return $htmlContents;
    }

    private function getTextRunStyle($textRun)
    {
        $style = '';
        $font = $textRun->getFont();

        if ($font) {
            $style .= 'font-family:' . $font->getName() . ';';
            $style .= 'font-size:' . $font->getSize() . 'pt;';
            $style .= 'color:#' . $font->getColor()->getRGB() . ';';
            if ($font->isBold()) {
                $style .= 'font-weight:bold;';
            }
            if ($font->isItalic()) {
                $style .= 'font-style:italic;';
            }
            if ($font->getUnderline() !== 'none') {
                $style .= 'text-decoration:underline;';
            }
        }

        return $style;
    }
}

