<?php
/**
 * Generates the Amanda backdoor OTP mail template.
 *
 * This function creates the template for the OTP (One-Time Password) email
 * that is sent through Amanda's backdoor mailing system.
 *
 * @param string $otp The one-time password to be included in the email template.
 *
 * @return string The generated email template containing the OTP.
 */
function amanda_backdoor_otp_mail_template($otp) {
    $otp = (string) $otp;
    $output = '
        <html dir="ltr" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">
        <head>
            <link rel="stylesheet" href="lcs.ng/assets/amanda/css/backdoor-mailing-template.css">
            <meta charset="UTF-8">
            <meta content="width=device-width, initial-scale=1" name="viewport">
            <meta name="x-apple-disable-message-reformatting">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta content="telephone=no" name="format-detection">
            <style>
                /* CONFIG STYLES Please do not delete and edit CSS styles below */
        /* IMPORTANT THIS STYLES MUST BE ON FINAL EMAIL */
        .rollover:hover .rollover-first {
            max-height: 0px !important;
            display: none !important;
        }
        .rollover:hover .rollover-second {
            max-height: none !important;
            display: block !important;
        }
        .rollover span {
            font-size: 0px;
        }
        u + .body img ~ div div {
            display: none;
        }
        #outlook a {
            padding: 0;
        }
        span.MsoHyperlink,
        span.MsoHyperlinkFollowed {
            color: inherit;
            mso-style-priority: 99;
        }
        a.es-button {
            mso-style-priority: 100 !important;
            text-decoration: none !important;
        }
        a[x-apple-data-detectors],
        #MessageViewBody a {
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }
        .es-desk-hidden {
            display: none;
            float: left;
            overflow: hidden;
            width: 0;
            max-height: 0;
            line-height: 0;
            mso-hide: all;
        }
        /*
            END OF IMPORTANT
        */
        body {
            width: 100%;
            height: 100%;
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }
        table {
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
            border-collapse: collapse;
            border-spacing: 0px;
        }
        table td,
        body,
        .es-wrapper {
            padding: 0;
            Margin: 0;
        }
        table td {
            padding: 1rem;
        }
        .es-content,
        .es-header,
        .es-footer {
            width: 100%;
            table-layout: fixed !important;
        }
        img {
            display: block;
            font-size: 14px;
            border: 0;
            outline: none;
            text-decoration: none;
        }
        p,
        hr {
            Margin: 0;
        }
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            Margin: 0;
            font-family: arial, \'helvetica neue\', helvetica, sans-serif;
            mso-line-height-rule: exactly;
            letter-spacing: 0;
        }
        p,
        a {
            mso-line-height-rule: exactly;
        }
        .es-left {
            float: left;
        }
        .es-right {
            float: right;
        }
        .es-menu td {
            border: 0;
        }
        .es-menu div {
            vertical-align: middle;
            display: block;
        }
        .es-menu td a img {
            display: inline !important;
            vertical-align: middle;
        }
        sub,
        sup {
            display: inline-block;
            font-size: 83% !important;
            line-height: 1 !important;
        }
        sub {
            vertical-align: bottom;
            mso-text-raise: -30%;
        }
        sup {
            mso-text-raise: 30%;
            vertical-align: top;
        }
        /*
            END CONFIG STYLES
            */
        s {
            text-decoration: line-through;
        }
        ul, ol {
            font-family: arial, \'helvetica neue\', helvetica, sans-serif;
            padding: 0px 0px 0px 40px;
            margin-top: 15px;
            margin-bottom: 15px;
        }
        ul li {
            color: #333333;
        }
        ol li {
            color: #333333;
        }
        li {
            margin: 0px 0px 15px;
            font-size: 14px;
        }
        li p {
            mso-margin-bottom-alt: 15px;
        }
        a {
            text-decoration: underline;
        }
        .es-menu td a {
            font-family: arial, \'helvetica neue\', helvetica, sans-serif;
            text-decoration: none;
            display: block;
        }
        .es-wrapper {
            width: 100%;
            height: 100%;
            background-repeat: repeat;
            background-position: center top;
        }
        .es-wrapper-color,
        .es-wrapper {
            background-color: #fafafa;
        }
        .es-content-body p,
        .es-footer-body p,
        .es-header-body p,
        .es-infoblock p {
            font-family: arial, \'helvetica neue\', helvetica, sans-serif;
            line-height: 150%;
            letter-spacing: 0;
        }
        .es-header {
            background-color: transparent;
            background-repeat: repeat;
            background-position: center top;
        }
        .es-header-body {
            background-color: transparent;
        }
        .es-header-body p {
            color: #333333;
            font-size: 14px;
        }
        .es-header-body a {
            color: #666666;
            font-size: 14px;
        }
        .es-footer {
            background-color: transparent;
            background-repeat: repeat;
            background-position: center top;
        }
        .es-footer-body {
            background-color: #ffffff;
        }
        .es-footer-body p {
            color: #333333;
            font-size: 12px;
        }
        .es-footer-body a {
            color: #333333;
            font-size: 12px;
        }
        .es-content-body {
            background-color: #ffffff;
        }
        .es-content-body p {
            color: #333333;
            font-size: 14px;
        }
        .es-content-body a {
            color: #5c68e2;
            font-size: 14px;
        }
        .es-infoblock p {
            font-size: 12px;
            color: #cccccc;
        }
        .es-infoblock a {
            font-size: 12px;
            color: #cccccc;
        }
        h1 {
            font-size: 46px;
            font-style: normal;
            font-weight: bold;
            line-height: 120%;
            color: #333333;
        }
        h2 {
            font-size: 26px;
            font-style: normal;
            font-weight: bold;
            line-height: 120%;
            color: #333333;
        }
        h3 {
            font-size: 20px;
            font-style: normal;
            font-weight: bold;
            line-height: 120%;
            color: #333333;
        }
        h4 {
            font-size: 24px;
            font-style: normal;
            font-weight: normal;
            line-height: 120%;
            color: #333333;
        }
        h5 {
            font-size: 20px;
            font-style: normal;
            font-weight: normal;
            line-height: 120%;
            color: #333333;
        }
        h6 {
            font-size: 16px;
            font-style: normal;
            font-weight: normal;
            line-height: 120%;
            color: #333333;
        }
        .es-header-body h1 a,
        .es-content-body h1 a,
        .es-footer-body h1 a {
            font-size: 46px;
        }
        .es-header-body h2 a,
        .es-content-body h2 a,
        .es-footer-body h2 a {
            font-size: 26px;
        }
        .es-header-body h3 a,
        .es-content-body h3 a,
        .es-footer-body h3 a {
            font-size: 20px;
        }
        .es-header-body h4 a,
        .es-content-body h4 a,
        .es-footer-body h4 a {
            font-size: 24px;
        }
        .es-header-body h5 a,
        .es-content-body h5 a,
        .es-footer-body h5 a {
            font-size: 20px;
        }
        .es-header-body h6 a,
        .es-content-body h6 a,
        .es-footer-body h6 a {
            font-size: 16px;
        }
        a.es-button, button.es-button {
            padding: 10px 30px 10px 30px;
            display: inline-block;
            background: #5c68e2;
            border-radius: 0px 0px 0px 0px;
            font-size: 20px;
            font-family: arial, \'helvetica neue\', helvetica, sans-serif;
            font-weight: normal;
            font-style: normal;
            line-height: 120%;
            color: #ffffff;
            text-decoration: none !important;
            width: auto;
            text-align: center;
            letter-spacing: 0;
            mso-padding-alt: 0;
            mso-border-alt: 10px solid #5c68e2;
        }
        .es-button-border {
            border-style: solid;
            border-color: #2cb543 #2cb543 #2cb543 #2cb543;
            background: #5c68e2;
            border-width: 0px 0px 0px 0px;
            display: inline-block;
            border-radius: 0px 0px 0px 0px;
            width: auto;
        }
        .es-button img {
            display: inline-block;
            vertical-align: middle;
        }
        .es-fw,
        .es-fw .es-button {
            display: block;
        }
        .es-il,
        .es-il .es-button {
            display: inline-block;
        }
        .es-text-rtl h1,
        .es-text-rtl h2,
        .es-text-rtl h3,
        .es-text-rtl h4,
        .es-text-rtl h5,
        .es-text-rtl h6,
        .es-text-rtl input,
        .es-text-rtl label,
        .es-text-rtl textarea,
        .es-text-rtl p,
        .es-text-rtl ol,
        .es-text-rtl ul,
        .es-text-rtl .es-menu a,
        .es-text-rtl .es-table {
            direction: rtl;
        }
        .es-text-ltr h1,
        .es-text-ltr h2,
        .es-text-ltr h3,
        .es-text-ltr h4,
        .es-text-ltr h5,
        .es-text-ltr h6,
        .es-text-ltr input,
        .es-text-ltr label,
        .es-text-ltr textarea,
        .es-text-ltr p,
        .es-text-ltr ol,
        .es-text-ltr ul,
        .es-text-ltr .es-menu a,
        .es-text-ltr .es-table {
            direction: ltr;
        }
        .es-text-rtl ol, .es-text-rtl ul {
            padding: 0px 40px 0px 0px;
        }
        .es-text-ltr ul, .es-text-ltr ol {
            padding: 0px 0px 0px 40px;
        }
        /*
            RESPONSIVE STYLES
            Please do not delete and edit CSS styles below.
        
            If you don\'t need responsive layout, please delete this section.
            */
        @media only screen and (max-width: 600px) {
            *[class="gmail-fix"] {
            display: none !important;
            }
            p,
            a {
            line-height: 150% !important;
            }
            h1,
            h1 a {
            line-height: 120% !important;
            }
            h2,
            h2 a {
            line-height: 120% !important;
            }
            h3,
            h3 a {
            line-height: 120% !important;
            }
            h4,
            h4 a {
            line-height: 120% !important;
            }
            h5,
            h5 a {
            line-height: 120% !important;
            }
            h6,
            h6 a {
            line-height: 120% !important;
            }
            .es-header-body p {
            }
            .es-content-body p {
            }
            .es-footer-body p {
            }
            .es-infoblock p {
            }
            h1 {
            font-size: 36px !important;
            text-align: left;
            }
            h2 {
            font-size: 26px !important;
            text-align: left;
            }
            h3 {
            font-size: 20px !important;
            text-align: left;
            }
            h4 {
            font-size: 24px !important;
            text-align: left;
            }
            h5 {
            font-size: 20px !important;
            text-align: left;
            }
            h6 {
            font-size: 16px !important;
            text-align: left;
            }
            .es-header-body h1 a,
            .es-content-body h1 a,
            .es-footer-body h1 a {
            font-size: 36px !important;
            }
            .es-header-body h2 a,
            .es-content-body h2 a,
            .es-footer-body h2 a {
            font-size: 26px !important;
            }
            .es-header-body h3 a,
            .es-content-body h3 a,
            .es-footer-body h3 a {
            font-size: 20px !important;
            }
            .es-header-body h4 a,
            .es-content-body h4 a,
            .es-footer-body h4 a {
            font-size: 24px !important;
            }
            .es-header-body h5 a,
            .es-content-body h5 a,
            .es-footer-body h5 a {
            font-size: 20px !important;
            }
            .es-header-body h6 a,
            .es-content-body h6 a,
            .es-footer-body h6 a {
            font-size: 16px !important;
            }
            .es-menu td a {
            font-size: 12px !important;
            }
            .es-header-body p,
            .es-header-body a {
            font-size: 14px !important;
            }
            .es-content-body p,
            .es-content-body a {
            font-size: 16px !important;
            }
            .es-footer-body p,
            .es-footer-body a {
            font-size: 14px !important;
            }
            .es-infoblock p,
            .es-infoblock a {
            font-size: 12px !important;
            }
            .es-m-txt-c,
            .es-m-txt-c h1,
            .es-m-txt-c h2,
            .es-m-txt-c h3,
            .es-m-txt-c h4,
            .es-m-txt-c h5,
            .es-m-txt-c h6 {
            text-align: center !important;
            }
            .es-m-txt-r,
            .es-m-txt-r h1,
            .es-m-txt-r h2,
            .es-m-txt-r h3,
            .es-m-txt-r h4,
            .es-m-txt-r h5,
            .es-m-txt-r h6 {
            text-align: right !important;
            }
            .es-m-txt-j,
            .es-m-txt-j h1,
            .es-m-txt-j h2,
            .es-m-txt-j h3,
            .es-m-txt-j h4,
            .es-m-txt-j h5,
            .es-m-txt-j h6 {
            text-align: justify !important;
            }
            .es-m-txt-l,
            .es-m-txt-l h1,
            .es-m-txt-l h2,
            .es-m-txt-l h3,
            .es-m-txt-l h4,
            .es-m-txt-l h5,
            .es-m-txt-l h6 {
            text-align: left !important;
            }
            .es-m-txt-r img,
            .es-m-txt-c img,
            .es-m-txt-l img {
            display: inline !important;
            }
            .es-m-txt-r .rollover:hover .rollover-second,
            .es-m-txt-c .rollover:hover .rollover-second,
            .es-m-txt-l .rollover:hover .rollover-second {
            display: inline !important;
            }
            .es-m-txt-r .rollover span,
            .es-m-txt-c .rollover span,
            .es-m-txt-l .rollover span {
            line-height: 0 !important;
            font-size: 0 !important;
            display: block;
            }
            .es-spacer {
            display: inline-table;
            }
            a.es-button,
            button.es-button {
            font-size: 20px !important;
            padding: 10px 20px 10px 20px !important;
            line-height: 120% !important;
            }
            a.es-button,
            button.es-button,
            .es-button-border {
            display: inline-block !important;
            }
            .es-m-fw,
            .es-m-fw.es-fw,
            .es-m-fw .es-button {
            display: block !important;
            }
            .es-m-il,
            .es-m-il .es-button,
            .es-social,
            .es-social td,
            .es-menu {
            display: inline-block !important;
            }
            .es-adaptive table,
            .es-left,
            .es-right {
            width: 100% !important;
            }
            .es-content table,
            .es-header table,
            .es-footer table,
            .es-content,
            .es-footer,
            .es-header {
            width: 100% !important;
            max-width: 600px !important;
            }
            .adapt-img {
            width: 100% !important;
            height: auto !important;
            }
            .es-mobile-hidden,
            .es-hidden {
            display: none !important;
            }
            .es-desk-hidden {
            width: auto !important;
            overflow: visible !important;
            float: none !important;
            max-height: inherit !important;
            line-height: inherit !important;
            }
            tr.es-desk-hidden {
            display: table-row !important;
            }
            table.es-desk-hidden {
            display: table !important;
            }
            td.es-desk-menu-hidden {
            display: table-cell !important;
            }
            .es-menu td {
            width: 1% !important;
            }
            table.es-table-not-adapt,
            .esd-block-html table {
            width: auto !important;
            }
            .h-auto {
            height: auto !important;
            }
        }
        /* END RESPONSIVE STYLES */
            </style>
            <!--[if (mso 16)]>
            <style type="text/css">
            a {text-decoration: none;}
            </style>
            <![endif]-->
            <!--[if gte mso 9]><style>sup { font-size: 100% !important; }</style><![endif]-->
            <!--[if gte mso 9]>
        <noscript>
                <xml>
                <o:OfficeDocumentSettings>
                <o:AllowPNG></o:AllowPNG>
                <o:PixelsPerInch>96</o:PixelsPerInch>
                </o:OfficeDocumentSettings>
                </xml>
            </noscript>
        <![endif]-->
            <!--[if mso]><xml>
            <w:WordDocument xmlns:w="urn:schemas-microsoft-com:office:word">
            <w:DontUseAdvancedTypographyReadingMail/>
            </w:WordDocument>
            </xml><![endif]-->
        </head>
        <body class="body">
            <div dir="ltr" class="es-wrapper-color">
            <!--[if gte mso 9]>
                    <v:background xmlns:v="urn:schemas-microsoft-com:vml" fill="t">
                        <v:fill type="tile" color="#fafafa"></v:fill>
                    </v:background>
                <![endif]-->
            <table width="100%" cellspacing="0" cellpadding="0" class="es-wrapper">
                <tbody>
                <tr>
                    <td valign="top" class="esd-email-paddings">
                    <table cellpadding="0" cellspacing="0" align="center" class="es-header">
                        <tbody></tbody>
                    </table>
                    <table cellpadding="0" cellspacing="0" align="center" class="es-content">
                        <tbody>
                        <tr>
                            <td align="center" class="esd-stripe">
                            <table bgcolor="#ffffff" align="center" cellpadding="0" cellspacing="0" width="600" class="es-content-body">
                                <tbody>
                                <tr>
                                    <td align="left" class="esd-structure es-p30t es-p10b es-p20r es-p20l">
                                    <table cellpadding="0" cellspacing="0" width="100%">
                                        <tbody>
                                        <tr>
                                            <td width="560" align="center" valign="top" class="esd-container-frame">
                                            <table cellpadding="0" cellspacing="0" width="100%">
                                                <tbody>
                                                <tr>
                                                    <td align="center" class="esd-block-image es-p10t es-p10b" style="font-size:0px">
                                                    <a target="_blank" href="https://lcs.ng/amanda">
                                                        <img src="https://lcs.ng/assets/amanda/img/AMANDA-IconText.png" alt="" width="75.4" class="adapt-img" style="display: block">
                                                    </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center" class="esd-block-text es-p10b">
                                                    <h1 class="es-m-txt-c" style="font-size:46px;line-height:100%">
                                                        Authenticate your access to Amanda backdoor
                                                    </h1>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center" class="esd-block-text es-p5t es-p5b es-p40r es-p40l es-m-p0r es-m-p0l">
                                                    <p>
                                                        Use the code below to authenticate your access to the&nbsp;<a href="'. AMANDA_URL .'" target="_blank">'. AMANDA_HOST .'</a>&nbsp;backdoor
                                                    </p>
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
                                <tr>
                                    <td align="left" class="esd-structure es-p10t es-p10b es-p20r es-p20l">
                                    <table cellpadding="0" cellspacing="0" width="100%">
                                        <tbody>
                                        <tr>
                                            <td width="560" align="center" valign="top" class="esd-container-frame">
                                            <table cellpadding="0" cellspacing="0" width="100%" style="border-radius: 5px">
                                                <tbody>
                                                <tr>
                                                    <td align="center" esd-links-underline="none" class="esd-block-text es-p10t es-p20b es-p20r es-p20l">
                                                    <h1 class="es-m-txt-c" style="color:#5c68e2">
                                                        <strong>'. $otp .'</strong>
                                                    </h1>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center" class="esd-block-text es-p5t es-p5b es-p40r es-p40l es-m-p0r es-m-p0l">
                                                    <p>
                                                        If you did not request this, it means your Amanda backdoor credentials for&nbsp;<a href="'. AMANDA_URL .'" target="_blank">'. AMANDA_HOST .'</a>&nbsp;have been compromised. Quickly log in to your site\'s server and change your credentials immediately.
                                                    </p>
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
                    <table cellpadding="0" cellspacing="0" align="center" class="es-footer">
                        <tbody>
                        <tr>
                            <td align="center" class="esd-stripe">
                            <table align="center" cellpadding="0" cellspacing="0" width="640" class="es-footer-body" style="background-color:transparent">
                                <tbody>
                                <tr>
                                    <td align="left" class="esd-structure es-p20t es-p20b es-p20r es-p20l">
                                    <table cellpadding="0" cellspacing="0" width="100%">
                                        <tbody>
                                        <tr>
                                            <td width="600" align="left" class="esd-container-frame">
                                            <table cellpadding="0" cellspacing="0" width="100%">
                                                <tbody>
                                                <tr>
                                                    <td align="center" class="esd-block-social es-p15t es-p15b" style="font-size:0">
                                                    <table cellpadding="0" cellspacing="0" class="es-table-not-adapt es-social">
                                                        <tbody>
                                                        <tr>
                                                            <td align="center" valign="top" class="es-p20r">
                                                            <a target="_blank" href="https://x.com/lcsnigeria">
                                                                <img title="X" src="https://etnryly.stripocdn.email/content/assets/img/social-icons/rounded-black-bordered/x-rounded-black-bordered.png" alt="X" width="32" height="32">
                                                            </a>
                                                            </td>
                                                            <td align="center" valign="top" class="es-p20r">
                                                            <a target="_blank" href="https://linkedin.com/company/lcsnigeria">
                                                                <img title="LinkedIn" src="https://etnryly.stripocdn.email/content/assets/img/social-icons/rounded-black-bordered/linkedin-rounded-black-bordered.png" alt="In" width="32" height="32">
                                                            </a>
                                                            </td>
                                                            <td align="center" valign="top" class="es-p40r">
                                                            <a target="_blank" href="mailto:loadedchannelsolutions@gmail.com?subject=What%20Is%20LCS%20Amanda&body=Hi%2C%0AI%20want%20to%20know%20more%20about%20LCS%20Amanda">
                                                                <img title="Gmail" src="https://etnryly.stripocdn.email/content/assets/img/other-icons/rounded-black-bordered/gmail-rounded-black-bordered.png" alt="gm" width="32" height="32">
                                                            </a>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center" class="esd-block-text es-p35b">
                                                    <p>
                                                        <strong style="color: #2146dc"><a target="_blank" href="https://lcs.ng/amanda" style="color: #2146dc; text-decoration: none">LCS Amanda</a></strong> © 2025 <strong style="color: #2146dc"><a href="https://lcs.ng" target="_blank" style="color: #2146dc; text-decoration: none">LOADED CHANNEL SOLUTIONS LTD</a></strong><strong>.</strong>
                                                    </p>
                                                    <p>
                                                        All Rights Reserved.
                                                    </p>
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
                    </td>
                </tr>
                </tbody>
            </table>
            </div>
        </body>
        </html>
    ';

    return $output;
}