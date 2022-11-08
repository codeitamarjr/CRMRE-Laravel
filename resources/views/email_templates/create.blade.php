@extends('layout')

@section('content')
    {{-- Load TinyMCE --}}
    <script src="https://cdn.tiny.cloud/1/wqh1zddiefonsyraeh8x3jwdkrswjtgv49fuarkvu1ggr9ad/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>


    <div class="container-fluid">
        <form method="POST" action="/email-templates">
            @csrf

            <div class="card mb-4 shadow">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="text-primary fw-bold m-0">Action(s) using this template</h6>
                </div>
                <div class="card-body">
                    <p class="form-label">Select the Action Group where this templates will be available</p>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="1" name="SYSTEM">
                        <label class="form-check-label" for="inlineCheckbox1">System</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="1" name="ENQ">
                        <label class="form-check-label" for="inlineCheckbox2">Enquiries</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="1" name="APP">
                        <label class="form-check-label" for="inlineCheckbox2">Applications</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="1" name="TEN">
                        <label class="form-check-label" for="inlineCheckbox2">Tenancy</label>
                    </div>
                </div>
            </div>

            <div class="card mb-4 shadow">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="text-primary fw-bold m-0">Select a Property</h6>
                </div>
                <div class="card-body">
                    <label for="hierarchy" class="form-label">Select a Hierarchy</label>
                    <select class="form-select" id="hierarchy" name="property_code">
                        <option value="{{ old('property_code') ? old('property_code') : '' }}">
                            {{ old('property_code') ? old('property_code') : 'Open this select menu' }}
                        </option>
                        <option value="">General(To use across the clients)</option>
                        {{-- List all properties that belongs to the client that the users access --}}
                        @php
                            $properties = DB::table('properties')
                                ->join('clients', 'clients.client_code', '=', 'properties.client_code')
                                ->where('clients.prs_code', '=', auth()->user()->prs_code)
                                ->select('properties.name', 'properties.client_code', 'properties.property_code')
                                ->get();
                        @endphp
                        @foreach ($properties as $property)
                            <option value="{{ $property->property_code }}">{{ $property->name }}</option>
                        @endforeach
                    </select>
                    @error('property_code')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="card mb-4 shadow">

                <div class="card-body">
                    <div class="row">
                        <div class="mb-3">
                            <label for="subjectFormControl" class="form-label">Subject</label>
                            <input type="text" class="form-control" id="subjectFormControl" name="subject"
                                value="{{ old('subject') }}">
                        </div>
                        @error('subject')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="mb-3">
                            <label for="nameFormControl" class="form-label">Name</label>
                            <input type="text" class="form-control" id="nameFormControl" name="name"
                                value="{{ old('name') }}">
                        </div>
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="card-body">
                    <label for="tinyTextArea" class="form-label">Message Body</label>
                    <textarea name="body" id="tinyTextArea">
                        {{ old('body') }}
                        <div class="undefined stageContainerWrapper">
                            <div class="undefined stageContainer" style="background-color: rgb(246, 248, 248);">
                            <div class="undefined stageContent" style="color: rgb(0, 0, 0); font-family: Montserrat, 'Trebuchet MS', 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', Tahoma, sans-serif;">
                            <div id="10-null-null" class="row-container-outer StageRow_row__3D1iS undefined row-container-outer--first Bee_showStructureRow__3kLAE" style="background-color: rgb(43, 57, 64); background-image: none; background-position: left top; background-repeat: no-repeat; text-align: center;" tabindex="-1" role="presentation">
                            <div class="row-container row-labels row-labels--cs StageRow_rowLabels__ZYA4h">
                            <div class="hidden-row-label hidden-row-label--cs">
                            <div class="undefined stageContainerWrapper">
                            <div class="undefined stageContainer" style="background-color: rgb(246, 248, 248);">
                            <div class="undefined stageContent" style="color: rgb(0, 0, 0); font-family: Montserrat, 'Trebuchet MS', 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', Tahoma, sans-serif;">
                            <div id="10-null-null" class="row-container-outer StageRow_row__3D1iS undefined row-container-outer--first Bee_showStructureRow__3kLAE" style="background-color: rgb(43, 57, 64); background-image: none; background-position: left top; background-repeat: no-repeat; text-align: center;" tabindex="-1" role="presentation">
                            <div class="row-container row-labels row-labels--cs StageRow_rowLabels__ZYA4h">
                            <div class="StageRow_rowLabel__2oG87 row-label--cs"><!-- [if (mso 16)]><style type="text/css"> a {text-decoration: none;} </style><![endif]--><!-- [if gte mso 9]><style>sup { font-size: 100% !important; }</style><![endif]--><!-- [if gte mso 9]><xml> <o:OfficeDocumentSettings> <o:AllowPNG></o:AllowPNG> <o:PixelsPerInch>96</o:PixelsPerInch> </o:OfficeDocumentSettings> </xml><![endif]-->
                            <div class="es-wrapper-color" style="background-color: #f4f4f4;"><!-- [if gte mso 9]><v:background xmlns:v="urn:schemas-microsoft-com:vml" fill="t"> <v:fill type="tile" color="#f4f4f4"></v:fill> </v:background><![endif]-->
                            <table class="es-wrapper" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px; padding: 0; margin: 0; width: 100%; height: 100%; background-repeat: repeat; background-position: center top;" width="100%" cellspacing="0" cellpadding="0">
                            <tbody>
                            <tr class="gmail-fix" style="border-collapse: collapse;">
                            <td style="padding: 0; margin: 0;">
                            <table style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px; width: 600px;" border="0" cellspacing="0" cellpadding="0" align="center">
                            <tbody>
                            <tr style="border-collapse: collapse;">
                            <td style="padding: 0; margin: 0; line-height: 1px; min-width: 600px;" height="0"><img style="display: block; border: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; max-height: 0px; min-height: 0px; min-width: 600px; width: 600px;" src="https://txwyom.stripocdn.email/content/guids/CABINET_837dc1d79e3a5eca5eb1609bfe9fd374/images/41521605538834349.png" alt="" width="600" height="1"></td>
                            </tr>
                            </tbody>
                            </table>
                            </td>
                            </tr>
                            <tr style="border-collapse: collapse;">
                            <td style="padding: 0; margin: 0;" valign="top">
                            <table class="es-content" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px; table-layout: fixed !important; width: 100%;" cellspacing="0" cellpadding="0" align="center">
                            <tbody>
                            <tr style="border-collapse: collapse;">
                            <td style="padding: 0; margin: 0;" align="center">
                            <table class="es-content-body" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px; background-color: transparent; width: 600px;" cellspacing="0" cellpadding="0" align="center">
                            <tbody>
                            <tr style="border-collapse: collapse;">
                            <td style="margin: 0; padding: 15px 10px 15px 10px;" align="left"><!-- [if mso]><table style="width:580px" cellpadding="0" cellspacing="0"><tr><td style="width:282px" valign="top"><![endif]-->
                            <table class="es-left" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px; float: left;" cellspacing="0" cellpadding="0" align="left">
                            <tbody>
                            <tr style="border-collapse: collapse;">
                            <td style="padding: 0; margin: 0; width: 282px;" align="left">
                            <table style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px;" role="presentation" width="100%" cellspacing="0" cellpadding="0">
                            <tbody>
                            <tr style="border-collapse: collapse;">
                            <td class="es-infoblock es-m-txt-c" style="padding: 0; margin: 0; line-height: 14px; font-size: 12px; color: #cccccc;" align="left">
                            <p style="margin: 0; -webkit-text-size-adjust: none; -ms-text-size-adjust: none; mso-line-height-rule: exactly; font-family: arial, \'helvetica\ neue\', helvetica, sans-serif; line-height: 14px; color: #cccccc; font-size: 12px;">Email generated automatically by Real Enquiries</p>
                            </td>
                            </tr>
                            </tbody>
                            </table>
                            </td>
                            </tr>
                            </tbody>
                            </table>
                            <!-- [if mso]></td><td style="width:20px"></td>
                            <td style="width:278px" valign="top"><![endif]-->
                            <table class="es-right" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px; float: right;" cellspacing="0" cellpadding="0" align="right">
                            <tbody>
                            <tr style="border-collapse: collapse;">
                            <td style="padding: 0; margin: 0; width: 278px;" align="left">
                            <table style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px;" role="presentation" width="100%" cellspacing="0" cellpadding="0">
                            <tbody>
                            <tr style="border-collapse: collapse;">
                            <td class="es-infoblock es-m-txt-c" style="padding: 0; margin: 0; line-height: 14px; font-size: 12px; color: #cccccc;" align="right">
                            <p style="margin: 0; -webkit-text-size-adjust: none; -ms-text-size-adjust: none; mso-line-height-rule: exactly; font-family: lato, \'helvetica neue\', helvetica, arial, sans-serif; line-height: 14px; color: #cccccc; font-size: 12px;">&nbsp;</p>
                            </td>
                            </tr>
                            </tbody>
                            </table>
                            </td>
                            </tr>
                            </tbody>
                            </table>
                            <!-- [if mso]></td></tr></table><![endif]--></td>
                            </tr>
                            </tbody>
                            </table>
                            </td>
                            </tr>
                            </tbody>
                            </table>
                            <table class="es-header" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px; table-layout: fixed !important; width: 100%; background-color: #ffa73b; background-repeat: repeat; background-position: center top;" cellspacing="0" cellpadding="0" align="center">
                            <tbody>
                            <tr style="border-collapse: collapse;">
                            <td style="padding: 0; margin: 0; background-color: #1190cb;" align="center" bgcolor="#1190CB">
                            <table class="es-header-body" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px; background-color: transparent; width: 600px;" cellspacing="0" cellpadding="0" align="center">
                            <tbody>
                            <tr style="border-collapse: collapse;">
                            <td style="margin: 0; padding: 20px 10px 10px 10px;" align="left">
                            <table style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px;" width="100%" cellspacing="0" cellpadding="0">
                            <tbody>
                            <tr style="border-collapse: collapse;">
                            <td style="padding: 0; margin: 0; width: 580px;" align="center" valign="top">
                            <table style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px;" role="presentation" width="100%" cellspacing="0" cellpadding="0">
                            <tbody>
                            <tr style="border-collapse: collapse;">
                            <td style="margin: 0; font-size: 0; padding: 25px 10px 25px 10px;" align="center"><img style="border: 0px; outline: none; text-decoration: none; float: right;" src="%prsLogo%" alt="MD Property Management" width="90" height="90"><img style="border: 0px; outline: none; text-decoration: none; float: left;" src="%propertyLogo%" alt="MD Property Management" width="90" height="90"></td>
                            </tr>
                            </tbody>
                            </table>
                            </td>
                            </tr>
                            </tbody>
                            </table>
                            </td>
                            </tr>
                            </tbody>
                            </table>
                            </td>
                            </tr>
                            </tbody>
                            </table>
                            <table class="es-content" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px; table-layout: fixed !important; width: 100%;" cellspacing="0" cellpadding="0" align="center">
                            <tbody>
                            <tr style="border-collapse: collapse;">
                            <td style="padding: 0; margin: 0; background-color: #1190cb;" align="center" bgcolor="#1190CB">
                            <table class="es-content-body" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px; background-color: transparent; width: 600px;" cellspacing="0" cellpadding="0" align="center">
                            <tbody>
                            <tr style="border-collapse: collapse;">
                            <td style="padding: 0; margin: 0;" align="left">
                            <table style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px;" width="100%" cellspacing="0" cellpadding="0">
                            <tbody>
                            <tr style="border-collapse: collapse;">
                            <td style="padding: 0; margin: 0; width: 600px;" align="center" valign="top">
                            <table style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: separate; border-spacing: 0px; background-color: #ffffff; border-radius: 4px;" role="presentation" width="100%" cellspacing="0" cellpadding="0" bgcolor="#ffffff">
                            <tbody>
                            <tr style="border-collapse: collapse;">
                            <td style="margin: 0; padding: 35px 30px 5px 30px;" align="center">
                            <h1 style="margin: 0; line-height: 58px; mso-line-height-rule: exactly; font-family: lato, \'helvetica neue\', helvetica, arial, sans-serif; font-size: 48px; font-style: normal; font-weight: normal; color: #111111;">Welcome to %propertyName%</h1>
                            </td>
                            </tr>
                            <tr style="border-collapse: collapse;">
                            <td style="margin: 0; font-size: 0; padding: 5px 20px 5px 20px;" align="center" bgcolor="#ffffff">
                            <table style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px;" role="presentation" border="0" width="100%" cellspacing="0" cellpadding="0">
                            <tbody>
                            <tr style="border-collapse: collapse;">
                            <td style="padding: 0; margin: 0px; border-bottom: 1px solid #ffffff; background: #FFFFFF none repeat scroll 0% 0%; height: 1px; width: 100%;">&nbsp;</td>
                            </tr>
                            </tbody>
                            </table>
                            </td>
                            </tr>
                            </tbody>
                            </table>
                            </td>
                            </tr>
                            </tbody>
                            </table>
                            </td>
                            </tr>
                            </tbody>
                            </table>
                            </td>
                            </tr>
                            </tbody>
                            </table>
                            <table class="es-content" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px; table-layout: fixed !important; width: 100%;" cellspacing="0" cellpadding="0" align="center">
                            <tbody>
                            <tr style="border-collapse: collapse;">
                            <td style="padding: 0; margin: 0;" align="center">
                            <table class="es-content-body" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px; background-color: transparent; width: 600px;" cellspacing="0" cellpadding="0" align="center">
                            <tbody>
                            <tr style="border-collapse: collapse;">
                            <td style="padding: 0; margin: 0;" align="left">
                            <table style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px;" width="100%" cellspacing="0" cellpadding="0">
                            <tbody>
                            <tr style="border-collapse: collapse;">
                            <td style="padding: 0; margin: 0; width: 600px;" align="center" valign="top">
                            <table style="border-collapse: separate; border-spacing: 0px; border-radius: 4px; background-color: #ffffff; height: 229.172px;" role="presentation" width="100%" cellspacing="0" cellpadding="0" bgcolor="#ffffff">
                            <tbody>
                            <tr style="border-collapse: collapse; height: 54px;">
                            <td class="es-m-txt-l" style="margin: 0px; padding: 20px 30px; height: 54px;" align="left" bgcolor="#ffffff">
                            <p style="margin: 0; -webkit-text-size-adjust: none; -ms-text-size-adjust: none; mso-line-height-rule: exactly; font-family: lato, \'helvetica neue\', helvetica, arial, sans-serif; line-height: 27px; color: #666666; font-size: 18px;"><span style="font-family: arial, helvetica, sans-serif; font-size: 14pt;">Dear %prospectName%,</span></p>
                            <p style="margin: 0; -webkit-text-size-adjust: none; -ms-text-size-adjust: none; mso-line-height-rule: exactly; font-family: lato, \'helvetica neue\', helvetica, arial, sans-serif; line-height: 27px; color: #666666; font-size: 18px;">&nbsp;</p>
                            <p style="margin: 0; -webkit-text-size-adjust: none; -ms-text-size-adjust: none; mso-line-height-rule: exactly; font-family: lato, \'helvetica neue\', helvetica, arial, sans-serif; line-height: 27px; color: #666666; font-size: 18px;"><span style="font-family: arial, helvetica, sans-serif; font-size: 14pt;">Thank you for your interest in our property <strong>%propertyName%.</strong></span></p>
                            <p style="margin: 0; -webkit-text-size-adjust: none; -ms-text-size-adjust: none; mso-line-height-rule: exactly; font-family: lato, \'helvetica neue\', helvetica, arial, sans-serif; line-height: 27px; color: #666666; font-size: 18px;">&nbsp;</p>
                            <p style="margin: 0; -webkit-text-size-adjust: none; -ms-text-size-adjust: none; mso-line-height-rule: exactly; font-family: lato, \'helvetica neue\', helvetica, arial, sans-serif; line-height: 27px; color: #666666; font-size: 18px;"><span style="font-family: arial, helvetica, sans-serif; font-size: 14pt;">Please complete the %propertyName% online application process, to support a quick and positive outcome to arrange a view:</span></p>
                            <p style="margin: 0px; text-size-adjust: none; font-family: lato, '\'helvetica neue\'', helvetica, arial, sans-serif; line-height: 27px; color: #666666; font-size: 18px; text-align: center;">&nbsp;</p>
                            <table style="box-sizing: border-box; border-collapse: separate!important; width: 100%;" width="100%" cellspacing="0" cellpadding="0">
                            <tbody>
                            <tr>
                            <td style="box-sizing: border-box; font-family: -apple-system,BlinkMacSystemFont,'Segoe UI',Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol'; font-size: 16px; vertical-align: top;" align="center" valign="top">
                            <table style="box-sizing: border-box; border-collapse: separate!important; width: auto;" cellspacing="0" cellpadding="0">
                            <tbody>
                            <tr>
                            <td style="box-sizing: border-box; font-family: -apple-system,BlinkMacSystemFont,'Segoe UI',Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol'; font-size: 16px; vertical-align: top; background-color: #0366d6; border-radius: 5px; text-align: center;" align="center" valign="top" bgcolor="#0366d6"><a style="box-sizing: border-box; color: #ffffff; text-decoration: none; background-color: #0366d6; border: solid 1px #0366d6; border-radius: 5px; display: inline-block; font-size: 16px; font-weight: bold; margin: 0; padding: 10px 20px; border-color: #0366d6;" href="%link%" target="_blank" rel="noopener" data-saferedirecturl="%link%">Access Online Application</a></td>
                            </tr>
                            </tbody>
                            </table>
                            </td>
                            </tr>
                            </tbody>
                            </table>
                            <p style="margin: 0px; text-size-adjust: none; font-family: lato, '\'helvetica neue\'', helvetica, arial, sans-serif; line-height: 27px; color: #666666; font-size: 18px; text-align: center;">&nbsp;</p>
                            <p style="margin: 0px; text-size-adjust: none; font-family: lato, '\'helvetica neue\'', helvetica, arial, sans-serif; line-height: 27px; color: #666666; font-size: 18px; text-align: left;"><span style="font-family: arial, helvetica, sans-serif; font-size: 14pt;">Once accepted, one of our agents will be in touch shortly on your email %prospectEmail% or on your phone number provided on your online application.</span></p>
                            <p style="margin: 0; -webkit-text-size-adjust: none; -ms-text-size-adjust: none; mso-line-height-rule: exactly; font-family: lato, \'helvetica neue\', helvetica, arial, sans-serif; line-height: 27px; color: #666666; font-size: 18px;">&nbsp;</p>
                            <p style="margin: 0; -webkit-text-size-adjust: none; -ms-text-size-adjust: none; mso-line-height-rule: exactly; font-family: lato, \'helvetica neue\', helvetica, arial, sans-serif; line-height: 27px; color: #666666; font-size: 18px;"><span style="font-family: arial, helvetica, sans-serif; font-size: 14pt;">If you have any questions please feel free to contact us anytime.</span></p>
                            </td>
                            </tr>
                            <tr style="border-collapse: collapse; height: 54px;">
                            <td class="es-m-txt-l" style="margin: 0px; padding: 20px 30px 40px; height: 54px;" align="left">
                            <p style="margin: 0; -webkit-text-size-adjust: none; -ms-text-size-adjust: none; mso-line-height-rule: exactly; font-family: lato, \'helvetica neue\', helvetica, arial, sans-serif; line-height: 27px; color: #666666; font-size: 18px;">Kind regards<br>%prsName%<br>%prsPhone%<br>%prsEmail%<br>%prsAddress%<br><br></p>
                            <p style="margin: 0; -webkit-text-size-adjust: none; -ms-text-size-adjust: none; mso-line-height-rule: exactly; font-family: lato, \'helvetica neue\', helvetica, arial, sans-serif; line-height: 27px; color: #666666; font-size: 18px;">&nbsp;</p>
                            <p style="margin: 0; -webkit-text-size-adjust: none; -ms-text-size-adjust: none; mso-line-height-rule: exactly; font-family: lato, \'helvetica neue\', helvetica, arial, sans-serif; line-height: 27px; color: #666666; font-size: 18px;">%propertyName%<br>%propertyOfficeName%<br>%PropertyOfficeEmail%<br>%propertyOfficePhone%<br>%PropertyOfficeAddress%<br><br></p>
                            </td>
                            </tr>
                            </tbody>
                            </table>
                            </td>
                            </tr>
                            </tbody>
                            </table>
                            </td>
                            </tr>
                            </tbody>
                            </table>
                            </td>
                            </tr>
                            </tbody>
                            </table>
                            <table class="es-content" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px; table-layout: fixed !important; width: 100%;" cellspacing="0" cellpadding="0" align="center">
                            <tbody>
                            <tr style="border-collapse: collapse;">
                            <td style="padding: 0; margin: 0;" align="center">
                            <table class="es-content-body" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px; background-color: transparent; width: 600px;" cellspacing="0" cellpadding="0" align="center">
                            <tbody>
                            <tr style="border-collapse: collapse;">
                            <td style="padding: 0; margin: 0;" align="left">
                            <table style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px;" width="100%" cellspacing="0" cellpadding="0">
                            <tbody>
                            <tr style="border-collapse: collapse;">
                            <td style="padding: 0; margin: 0; width: 600px;" align="center" valign="top">
                            <table style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px;" role="presentation" width="100%" cellspacing="0" cellpadding="0">
                            <tbody>
                            <tr style="border-collapse: collapse;">
                            <td style="margin: 0; font-size: 0; padding: 10px 20px 20px 20px;" align="center" bgcolor="#ffffff">
                            <table style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px;" role="presentation" border="0" width="100%" cellspacing="0" cellpadding="0">
                            <tbody>
                            <tr style="border-collapse: collapse;">
                            <td style="padding: 0; margin: 0px; border-bottom: 1px solid #f4f4f4; background: #FFFFFF none repeat scroll 0% 0%; height: 1px; width: 100%;">&nbsp;</td>
                            </tr>
                            </tbody>
                            </table>
                            </td>
                            </tr>
                            </tbody>
                            </table>
                            </td>
                            </tr>
                            </tbody>
                            </table>
                            </td>
                            </tr>
                            </tbody>
                            </table>
                            </td>
                            </tr>
                            </tbody>
                            </table>
                            <table class="es-footer" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px; table-layout: fixed !important; width: 100%; background-color: transparent; background-repeat: repeat; background-position: center top;" cellspacing="0" cellpadding="0" align="center">
                            <tbody>
                            <tr style="border-collapse: collapse;">
                            <td style="padding: 0; margin: 0;" align="center">
                            <table class="es-footer-body" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px; background-color: transparent; width: 600px;" cellspacing="0" cellpadding="0" align="center">
                            <tbody>
                            <tr style="border-collapse: collapse;">
                            <td style="margin: 0; background-color: #ffffff; padding: 30px;" align="left" bgcolor="#ffffff">
                            <table style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px;" width="100%" cellspacing="0" cellpadding="0">
                            <tbody>
                            <tr style="border-collapse: collapse;">
                            <td style="padding: 0; margin: 0; width: 540px;" align="center" valign="top">
                            <table style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px;" role="presentation" width="100%" cellspacing="0" cellpadding="0">
                            <tbody>
                            <tr style="border-collapse: collapse;">
                            <td style="padding: 25px 0px 0px; margin: 0px; text-align: center;" align="left">
                            <p style="margin: 0px; text-size-adjust: none; font-family: lato, '\'helvetica neue\'', helvetica, arial, sans-serif; line-height: 21px; color: #666666; font-size: 14px; text-align: justify;"><span style="font-size: 8pt;">You received this email because you sent an inquiry through Daft. </span><span style="font-size: 8pt;">THE INFORMATION CONTAINED IN THIS MESSAGE AND ANY ATTACHMENT MAY BE PRIVILEGED, CONFIDENTIAL, PROPRIETARY, OR OTHERWISE PROTECTED FROM DISCLOSURE. If the reader of this message is not the intended recipient, you are hereby notified that any dissemination, distribution, copying, or use of this message and any attachment is strictly prohibited. If you have received this message in error, please notify us immediately by replying to the message and permanently deleting it from your computer, and destroying any printout thereof.</span></p>
                            </td>
                            </tr>
                            <tr style="border-collapse: collapse;">
                            <td style="padding: 25px 0px 0px; margin: 0px; text-align: center;" align="left">
                            <p style="margin: 0; -webkit-text-size-adjust: none; -ms-text-size-adjust: none; mso-line-height-rule: exactly; font-family: lato, \'helvetica neue\', helvetica, arial, sans-serif; line-height: 21px; color: #666666; font-size: 14px;"><span style="font-size: 8pt;">If these emails get annoying, please feel free to ask us to remove your data from our database.</span></p>
                            </td>
                            </tr>
                            <tr style="border-collapse: collapse;">
                            <td style="padding: 0; margin: 0; padding-top: 25px;" align="left">
                            <p style="margin: 0px; text-size-adjust: none; font-family: lato, '\'helvetica neue\'', helvetica, arial, sans-serif; line-height: 21px; color: #666666; font-size: 14px; text-align: center;"><span style="font-size: 8pt;">%prsName%<br>%prsEmail%<br>%prsPhone%<br>%prsAddress%</span></p>
                            </td>
                            </tr>
                            </tbody>
                            </table>
                            </td>
                            </tr>
                            </tbody>
                            </table>
                            </td>
                            </tr>
                            </tbody>
                            </table>
                            </td>
                            </tr>
                            </tbody>
                            </table>
                            <table class="es-content" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px; table-layout: fixed !important; width: 100%;" cellspacing="0" cellpadding="0" align="center">
                            <tbody>
                            <tr style="border-collapse: collapse;">
                            <td style="padding: 0; margin: 0; background-color: #1190cb;" align="center" bgcolor="#1190CB">
                            <table class="es-content-body" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px; background-color: #1190cb; width: 600px;" cellspacing="0" cellpadding="0" align="center" bgcolor="#1190CB">
                            <tbody>
                            <tr style="border-collapse: collapse;">
                            <td style="margin: 0; padding: 30px 20px 30px 20px;" align="left">
                            <table style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px;" width="100%" cellspacing="0" cellpadding="0">
                            <tbody>
                            <tr style="border-collapse: collapse;">
                            <td style="padding: 0; margin: 0; width: 560px;" align="center" valign="top">
                            <table style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px;" role="presentation" width="100%" cellspacing="0" cellpadding="0">
                            <tbody>
                            <tr style="border-collapse: collapse;">
                            <td style="padding: 0; margin: 0; font-size: 0px;" align="center"><img class="adapt-img" style="display: block; border: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic;" src="https://txwyom.stripocdn.email/content/guids/360ff162-6d28-409e-8a8f-23d5b89d394a/images/logo_size_invert.jpg" alt="" width="480"></td>
                            </tr>
                            </tbody>
                            </table>
                            </td>
                            </tr>
                            </tbody>
                            </table>
                            </td>
                            </tr>
                            </tbody>
                            </table>
                            </td>
                            </tr>
                            </tbody>
                            </table>
                            </td>
                            </tr>
                            </tbody>
                            </table>
                            </div>
                            </div>
                            </div>
                            </div>
                            </div>
                            </div>
                            </div>
                            </div>
                            </div>
                            </div>
                            </div>
                            </div>
                            </div>
                    </textarea>
                    @error('body')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script>
        tinymce.init({
            selector: '#tinyTextArea',
            //toolbar_location: 'bottom',
            visual: false,
            menubar: false,
            statusbar: false,
            height: 700,
        });
    </script>
@endsection
