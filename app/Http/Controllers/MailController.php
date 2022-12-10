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
    /**
     * Send the Email Template object to Enquiry object
     *
     * @param EmailTemplates $email_templates
     * @param Enquiries $enquiry
     * @return void
     */
    public function sendEnquiryEmail(EmailTemplates $email_templates, Enquiries $enquiry)
    {
        /* Send email to the contact_email from enquiry object*/
        Mail::to($enquiry->contact_email)
            ->send(
                /* Send the email with the template object received */
                new TemplatesEmail(
                    $email_templates
                )
            );
        /* Go back to enquiries page with success message */
        return redirect('enquiries')->with('success', 'Email sent successfully');
    }
}
