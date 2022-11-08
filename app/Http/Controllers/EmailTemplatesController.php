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
        return view('email_templates.index', [
            'email_templates' => Auth::user()->prs->email_templates
        ]);
    }
    // Show Single Email Template
    public function show($id)
    {
        return view('email_templates.show', [
            'email_template' => Auth::user()->prs->email_templates->find($id)
        ]);
    }

    // Create Email Template
    public function create()
    {
        return view('email_templates.create');
    }

    // Store Email Template
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'subject' => 'required',
            'body' => 'required',
        ]);

        $data['prs_code'] = auth()->user()->prs_code;

        EmailTemplates::create($data);
        return redirect('/email-templates')->with('success', 'Email Template Created Successfully');
    }

    // Edit Email Template
    public function edit(EmailTemplates $email_templates)
    {
        return view('email_templates.edit', [
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
        ]);

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