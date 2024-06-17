<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Certificate;
use Barryvdh\DomPDF\Facade as PDF;

// Import PDF class from Dompdf library

class CertificateController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Display a listing of the certificates.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('delete')) {
            Certificate::destroy($request->delete);
            return back();
        }

        $certificates = Certificate::query()->latest()->with('user')->get();
        $list_users = User::query()
            ->orderBy('first_name')
            ->select('id', 'first_name', 'last_name')->get();
        return view('super-admin.certificates.index', compact('certificates', 'list_users'));
    }

    /**
     * Store a newly created certificate in storage.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|integer',
            'title' => 'required|string',
        ]);

        Certificate::create($validatedData);
        return redirect()->back()->with('success', 'Certificate created successfully.');
    }

    /**
     * Download the specified certificate.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function download($id)
    {
        $certificate = Certificate::findOrFail($id);
        return view('app.certificate', compact('certificate'));
    }
}
