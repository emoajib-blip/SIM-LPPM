<?php

namespace App\Http\Controllers;

use App\Models\DocumentSignature;
use App\Services\DocumentSignatureService;
use Illuminate\Contracts\View\View;

class DocumentSignatureVerificationController extends Controller
{
    public function show(DocumentSignature $documentSignature, DocumentSignatureService $signatureService): View
    {
        return view('signatures.verify', [
            'signature' => $documentSignature,
            'isValid' => $signatureService->verify($documentSignature),
        ]);
    }
}
