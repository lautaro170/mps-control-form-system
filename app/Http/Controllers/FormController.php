<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Form;
use App\Services\FormService;
use Illuminate\Http\Request;

class FormController extends Controller
{

    public function completeForm(Request $request, Form $form, FormService $formService)
    {
        // Validate the request data (json_value)
        $request->validate([
            'json_value' => 'required|json',
        ]);

        $formService->completeForm($form, $request->input('json_value'));

        return response()->json(['message' => 'Form completed successfully!']);
    }

    public function updateFormJsonValue(Request $request, Form $form, FormService $formService)
    {
        // Validate the request data
        $request->validate([
            'json_value' => 'required|json',
            'last_seen_page' => 'required|string'
        ]);


        $form->json_values = $request->input('json_value');
        $form->last_seen_page = $request->input('last_seen_page');
        $form->save();

        return response()->json(['message' => 'Form updated successfully!']);
    }

    public function downloadPdf(Form $form, FormService $formService)
    {
        return $formService->generateFormPdf($form);
    }

    public function previewPdf(Form $form, FormService $formService)
    {
        return view('pdf.form_default', [
            'form' => $form,
            'json_values' => json_decode($form->json_values, true),
        ]);
    }
}

