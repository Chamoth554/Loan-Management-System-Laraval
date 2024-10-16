<?php

namespace App\Http\Controllers;

use App\Models\LoanApplication;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    // Store the loan application (already implemented)
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'tel' => 'required',
            'occupation' => 'required',
            'monthly_salary' => 'required|numeric',
            'paysheet' => 'required|mimes:pdf|max:2048',
        ]);

        $paysheetPath = $request->file('paysheet')->store('paysheets');

        LoanApplication::create([
            'name' => $request->name,
            'email' => $request->email,
            'tel' => $request->tel,
            'occupation' => $request->occupation,
            'monthly_salary' => $request->monthly_salary,
            'paysheet' => $paysheetPath,
        ]);

        return redirect()->back()->with('success', 'Loan Application Submitted');
    }

    // Show all loan applications (for Bank Manager's dashboard)
    public function index()
    {
        $loanApplications = LoanApplication::all();
        return view('dashboard', compact('loanApplications'));
    }

    // Edit a loan application
    public function edit($id)
    {
        $loanApplication = LoanApplication::findOrFail($id);
        return view('edit_loan_application', compact('loanApplication'));
    }

    // Update the loan application after editing
    public function update(Request $request, $id)
    {
        $loanApplication = LoanApplication::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'tel' => 'required',
            'occupation' => 'required',
            'monthly_salary' => 'required|numeric',
            'paysheet' => 'mimes:pdf|max:2048', // Optional: file update
        ]);

        if ($request->hasFile('paysheet')) {
            $paysheetPath = $request->file('paysheet')->store('paysheets');
            $loanApplication->paysheet = $paysheetPath;
        }

        $loanApplication->update([
            'name' => $request->name,
            'email' => $request->email,
            'tel' => $request->tel,
            'occupation' => $request->occupation,
            'monthly_salary' => $request->monthly_salary,
        ]);

        return redirect()->route('dashboard')->with('success', 'Loan Application updated successfully!');
    }

    // Delete a loan application
    public function destroy($id)
    {
        $loanApplication = LoanApplication::findOrFail($id);
        $loanApplication->delete();

        return redirect()->route('dashboard')->with('success', 'Loan Application deleted successfully!');
    }

    public function downloadPaysheet($id)
{
    $loanApplication = LoanApplication::findOrFail($id);
    $filePath = storage_path('app/' . $loanApplication->paysheet);

    if (file_exists($filePath)) {
        return response()->download($filePath);
    } else {
        return redirect()->back()->with('error', 'File not found.');
    }
}

}

