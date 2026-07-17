<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\Admission\ProcessInquiryAction;
use App\Http\Requests\InquiryRequest;

class AdmissionsController extends Controller
{
    public function index()
    {
        return view('pages.admissions.index');
    }

    public function store(InquiryRequest $request, ProcessInquiryAction $action)
    {
        $inquiry = $action->execute($request->validated());

        return response()->json([
            'message' => 'Inquiry submitted successfully.',
            'inquiry' => $inquiry,
        ], 201);
    }
}
