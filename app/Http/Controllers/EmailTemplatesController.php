<?php

namespace App\Http\Controllers;

use App\Models\EmailTemplates;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmailTemplatesController extends Controller
{
    // Show Index Templates
    public function index()
    {
        return view('email-templates.index', [
            'email_templates' => Auth::user()->prs->email_templates
        ]);
    }
    // Show Single Email Template
    public function show($id)
    {
        return view('email-templates.show', [
            'email_template' => Auth::user()->prs->email_templates->find($id)
        ]);
    }

    // Create Email Template
    public function create()
    {
        return view('email-templates.create');
    }

    // Store Email Template
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'subject' => 'required',
            'body' => 'required',
            'SYSTEM' => 'nullable',
            'ENQ' => 'nullable',
            'APP' => 'nullable',
            'TEN' => 'nullable',
        ]);

        empty($data['SYSTEM']) ? $data['SYSTEM'] = 0 : $data['SYSTEM'] = 1;
        empty($data['ENQ']) ? $data['ENQ'] = 0 : $data['ENQ'] = 1;
        empty($data['APP']) ? $data['APP'] = 0 : $data['APP'] = 1;
        empty($data['TEN']) ? $data['TEN'] = 0 : $data['TEN'] = 1;

        $data['prs_code'] = auth()->user()->prs_code;

        EmailTemplates::create($data);
        return redirect('/email-templates')->with('success', 'Email Template Created Successfully');
    }

    // Edit Email Template
    public function edit(EmailTemplates $email_templates)
    {
        return view('email-templates.edit', [
            'email_template' => $email_templates
        ]);
    }

    // Update Email Template
    public function update(Request $request, EmailTemplates $email_templates)
    {
        $data = $request->validate([
            'property_code' => 'nullable',
            'name' => 'required',
            'subject' => 'required',
            'body' => 'required',
            'SYSTEM' => 'nullable',
            'ENQ' => 'nullable',
            'APP' => 'nullable',
            'TEN' => 'nullable',
        ]);

        empty($data['SYSTEM']) ? $data['SYSTEM'] = 0 : $data['SYSTEM'] = 1;
        empty($data['ENQ']) ? $data['ENQ'] = 0 : $data['ENQ'] = 1;
        empty($data['APP']) ? $data['APP'] = 0 : $data['APP'] = 1;
        empty($data['TEN']) ? $data['TEN'] = 0 : $data['TEN'] = 1;

        $email_templates->update($data);
        return redirect('/email-templates')->with('success', 'Email Template Updated Successfully');
    }

    // Delete Email Template
    public function destroy(EmailTemplates $email_templates)
    {
        $email_templates->delete();
        return redirect('/email-templates')->with('success', 'Email Template Deleted Successfully');
    }
}
