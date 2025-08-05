<?php

namespace Tests\Unit\Services;

use Tests\TestCase;
use App\Services\PdfService;
use App\Models\Form;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PdfServiceTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_generates_pdf_content_without_error()
    {
        $form = Form::factory()->create();
        $service = new PdfService();
        $pdfContent = $service->generatePdfContent($form);
        $this->assertIsString($pdfContent);
        $this->assertNotEmpty($pdfContent);
    }
}

