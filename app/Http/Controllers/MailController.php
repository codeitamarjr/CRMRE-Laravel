<?php

namespace App\Http\Controllers;

use App\Models\Enquiries;
use App\Mail\EnquiriesMail;
use App\Mail\TemplatesEmail;
use Illuminate\Http\Request;
use App\Models\EmailTemplates;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    //
    public function sendEnquiryEmail(EmailTemplates $email_templates, Enquiries $enquiry)
    {
        Mail::to($enquiry->contact_email)->send(new TemplatesEmail($email_templates));
        // Go back with success message
        return redirect()->back()->with('success', 'Email sent successfully');
    }
}
