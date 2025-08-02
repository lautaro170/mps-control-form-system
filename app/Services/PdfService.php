<?php

namespace App\Services;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Form;

class PdfService
{
    /**
     * Generate a PDF for a form result.
     *
     * @param Form $form
     * @param string $layout
     * @return \Illuminate\Http\Response
     */
    public function generate(Form $form, string $layout = 'default')
    {
        // Select the correct Blade view based on layout
        $view = "pdf.form_{$layout}";
        if (!view()->exists($view)) {
            $view = 'pdf.form_default';
        }

        $pdf = Pdf::loadView($view, [
            'form' => $form,
            'json_values' => json_decode($form->json_values, true),
        ]);

        // Set PDF options to remove margins
        $pdf->setPaper('A4', 'portrait');
        $pdf->setOptions([
            'margin_top' => 0,
            'margin_right' => 0,
            'margin_bottom' => 0,
            'margin_left' => 0,
        ]);

        $filename = 'form_' . $form->id . '.pdf';
        return $pdf->download($filename);
    }
}
