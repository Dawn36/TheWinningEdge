<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="x-apple-disable-message-reformatting">
    <link rel="shortcut icon" href="{{ asset('theme/assets/email_images/logo.png')}}" type="image/x-icon">
    <title>Request Password</title>

    <link href="https://fonts.googleapis.com/css?family=Roboto:400,600" rel="stylesheet" type="text/css">
    <!-- Web Font / @font-face : BEGIN -->
    <!--[if mso]>
        <style>
            * {
                font-family: 'Roboto', sans-serif !important;
            }
        </style>
    <![endif]-->

    <!--[if !mso]>
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,600" rel="stylesheet" type="text/css">
    <![endif]-->

    <!-- Web Font / @font-face : END -->

    <!-- CSS Reset : BEGIN -->


    <style>
        /* What it does: Remove spaces around the email design added by some email clients. */
        /* Beware: It can remove the padding / margin and add a background color to the compose a reply window. */
        
        html,
        body {
            margin: 0 auto !important;
            padding: 0 !important;
            height: 100% !important;
            width: 100% !important;
            font-family: 'Roboto', sans-serif !important;
            font-size: 14px;
            margin-bottom: 10px;
            line-height: 24px;
            color: #fff;
            font-weight: 400;
        }
        
        * {
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
            margin: 0;
            padding: 0;
        }
        
        table,
        td {
            mso-table-lspace: 0pt !important;
            mso-table-rspace: 0pt !important;
        }
        
        table {
            border-spacing: 0 !important;
            border-collapse: collapse !important;
            table-layout: fixed !important;
            margin: 0 auto !important;
        }
        
        table table table {
            table-layout: auto;
        }
        
        a {
            text-decoration: none;
        }
        
        img {
            -ms-interpolation-mode: bicubic;
        }
    </style>

</head>

<body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly; background-color: #262626;">
    <center style="width: 100%; background-color: #f5f6fa;">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#262626">
            <tr>
                <td style="padding: 40px 0;">
                    <table style="width:100%;max-width:620px;margin:0 auto;">
                        <tbody>
                            <tr>
                                <td style="text-align: center; padding-bottom:25px">
                                    <a href="https://thewinningedgeenterprises.com/"><img style="height: 110px" src="{{ asset('theme/assets/email_images/logo.png')}}" alt="logo"></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table style="width:100%;max-width:620px;margin:0 auto;background-color:#00000036;">
                        <tbody style="text-align: center;" style="color: white;">
                            <tr>
                                <td style="padding: 30px 30px 15px 30px;">
                                    <h2 style="font-size: 18px; color: #b79c52; font-weight: 600; margin: 0;">TWE Password Reset Request
                                    </h2>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 0 30px 20px">
                                    <p style="margin-bottom: 10px; margin-top: 1rem;">{{ucwords($data['full_name'])}},</p>
                                    <p style="margin-bottom: 10px;">A password reset has been requested from your email address: <span style="color: #b79c52; text-decoration:none;word-break: break-all;">{{$data['email']}}</span> and this new password has been created for you:
                                        <span style="color: #b79c52; text-decoration:none;word-break: break-all;">{{$data['new_password']}}</span>
                                    </p>
                                    <p style="margin-bottom: 10px;">Please access the CRM and use your new password to log in and update your Account Settings.</p>
                                    <a href="https://app.thewinningedgeenterprises.com/login" style="margin-top: 1rem;background-color:#b79c52;border-radius:4px;color:#ffffff;display:inline-block;font-size:13px;font-weight:600;line-height:44px;text-align:center;text-decoration:none;text-transform: uppercase; padding: 0 30px">Access CRM</a>
                                    <p style="margin-top: 1.5rem;">Make sure you do not share your Password with anyone for the safety of your data.</p>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 10px 30px 0;">
                                    <p style="margin-bottom: 10px;">Happy Selling!</p>
                                    <p style="margin-bottom: 10px;">The Winning Edge Team</p>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 20px 30px 40px">
                                    <p>If you did not make this request, please contact us or ignore this message.</p>
                                    <p style="margin: 0; font-size: 13px; line-height: 22px; color:#9ea8bb;">This is an automatically generated email please do not reply to this email. If you face any issues, please contact us at <b>support@thewinningedgeenterprises.com</b></p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table style="width:100%;max-width:620px;margin:0 auto;">
                        <tbody style="color: white;">
                            <tr>
                                <td style="text-align: center; padding:25px 20px 0;">
                                    <p style="font-size: 13px;">Copyright © 2022 The Winning Edge Enterprises. All rights reserved. <br> Made By <a style="color: #b79c52; text-decoration:none;" href="https://softixs.com/">Softixs</a>.</p>
                                    <ul style="margin: 10px -4px 0;padding: 0;">
                                        <!-- <li style="display: inline-block; list-style: none; padding: 4px;">
                                            <a href="#"><img style="width: 30px" src="images/facebook_logo.png" alt="brand"></a>
                                        </li>
                                        <li style="display: inline-block; list-style: none; padding: 4px;">
                                            <a href="#"><img style="width: 30px" src="images/twitter.png" alt="brand"></a>
                                        </li> -->
                                        <li style="display: inline-block; list-style: none; padding: 4px;">
                                            <a href="https://www.youtube.com/channel/UCDIOwraJ5vS5pMr8reIkVBQ/about"><img style="width: 40px" src="{{ asset('theme/assets/email_images/youtube.png')}}" alt="brand"></a>
                                        </li>
                                        <li style="display: inline-block; list-style: none; padding: 4px;">
                                            <a href="https://www.linkedin.com/company/87228947"><img style="width: 30px" src="{{ asset('theme/assets/email_images/linkedin.png')}}" alt="brand"></a>
                                        </li>
                                    </ul>
                                    <p style="padding-top: 15px; font-size: 12px;">This email was sent to you as a registered user of <a style="color: #b79c52; text-decoration:none;" href="https://thewinningedgeenterprises.com/">The Winning Edge
                                            Enterprises</a></p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </table>
    </center>
</body>

</html>
