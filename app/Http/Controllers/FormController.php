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
        ]);

        $form->json_values = $request->input('json_value');
        $form->save();

        return response()->json(['message' => 'Form updated successfully!']);
    }
}
