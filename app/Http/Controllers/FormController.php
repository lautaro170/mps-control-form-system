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
            'formatted_form_id' => str_pad($form->id, 7, '0', STR_PAD_LEFT),
            'formatted_date' => $form->created_at ? $form->created_at->format('d/m/Y') : '',

        ]);
    }

    public function sendClientMail(Request $request, Form $form, FormService $formService){
        $request->validate([
            'mails' => 'required|array',
            'mails.*' => 'email',
        ]);

        $mails = $request->input('mails');
        $formService->sendMails($form, $mails);

        return response()->json(['message' => 'Emails sent successfully!']);
    }
}

