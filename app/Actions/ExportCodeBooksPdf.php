<?php

namespace App\Actions;

use TCPDF;
use App\Models\Book;

class ExportCodeBooksPdf
{
    private TCPDF $pdf;

    /**
     * Initialize the TCPDF object.
     */
    public function __construct()
    {
        $this->pdf = new TCPDF;
    }

    /**
     * Export books codes to PDF.
     *
     * @param bool $isSelectAll Whether to select all codes or not.
     * @param $start_from The start of the range.
     * @param $end_to The end of the range.
     *
     * @return \Symfony\Component\HttpFoundation\StreamedResponse
     */
    public function handle(bool $isSelectAll, $start_from = null, $end_to = null)
    {
        $codes = Book::when(!$isSelectAll, function ($query) use ($start_from, $end_to) {
            return $query->whereBetween('code', [$start_from, $end_to]);
        })
            ->orderBy('code')
            ->get(['current_unit_number', 'row', 'position_book', 'copies']);

        $this->configTCPDF();

        $this->printCodes($codes);
        $pdfName = 'books_codes_' . $this->convertFormatCode($codes->first(), '') . '_' . $this->convertFormatCode($codes->last(), '')  . '.pdf';

        return response()->streamDownload(function () use ($pdfName) {
            $this->pdf->Output($pdfName, 'I');
        }, $pdfName);
    }

    /**
     * Configure the TCPDF settings.
     * This method sets the page unit to mm, sets the print header and footer to false,
     * sets the creator and author to 'Library', sets the title to 'أكواد الكتب',
     * sets the margins to 5mm on all sides, adds a new page and sets the font to Helvetica with size 14.
     */
    private function configTCPDF()
    {
        $this->pdf->setPageUnit('mm');
        $this->pdf->setPrintHeader(false);
        $this->pdf->setPrintFooter(false);
        $this->pdf->SetCreator('Library');
        $this->pdf->SetAuthor('Library');
        $this->pdf->SetTitle('أكواد الكتب');
        $this->pdf->SetMargins(3, 3, 3);
        $this->pdf->AddPage();
        $this->pdf->SetFont('helvetica', '', 14);
    }

    /**
     * Prints the given codes as rounded rectangles on the PDF page.
     * Each code is centered inside its respective rectangle.
     * The rectangles are arranged in a grid of $perRow columns.
     * The gap between each rectangle (horizontally and vertically) is $gap mm.
     * Each rectangle's width and height are $cellW and $cellH mm respectively.
     * Each rectangle's corner radius is $radius mm.
     * If the total height of the rectangles exceeds 280mm, a new page is started.
     *
     * @param iterable $codes The codes to be printed.
     */
    private function printCodes($codes)
    {
        $perRow = 5;
        $gap   = 2;
        $cellW = (($this->pdf->getPageWidth() - ($this->pdf->getMargins()['left'] + $this->pdf->getMargins()['right']) - ($perRow - 1) * $gap) / 5);
        $cellH = 10;
        $radius = 3;

        $startX = 3;
        $startY = 3;

        $x = 3;
        $y = 3;
        $col = 0;

        foreach ($codes as $code) {
            for ($i = 0; $i < $code->copies; $i++) {
                $this->pdf->RoundedRect(
                    $x,
                    $y,
                    $cellW,
                    $cellH,
                    $radius,
                    '1111',
                    'S'
                );

                $this->pdf->SetXY($x, $y + 2);
                $this->pdf->Cell(
                    $cellW,
                    6,
                    $this->convertFormatCode($code),
                    0,
                    0,
                    'C'
                );

                $col++;
                $x += $cellW + $gap;

                if ($col == $perRow) {
                    $col = 0;
                    $x = $startX;
                    $y += $cellH + $gap;

                    if ($y + $cellH > 280) {
                        $this->pdf->AddPage();
                        $y = $startY;
                    }
                }
            }
        }
    }

    /**
     * Converts a Book object to a string in the format:
     * current_unit_number / row row / the position_book
     *
     * @param Book $code The Book object to be converted
     * @param string $separator The separator to use between the components of the string
     * @return string The string representation of the Book object
     */
    private function convertFormatCode($code, string $separator = '/')
    {
        return "#" .  $code->current_unit_number . $separator . $code->row . $separator . $code->position_book;
    }
}
