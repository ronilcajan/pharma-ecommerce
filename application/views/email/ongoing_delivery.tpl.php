<?php
$user = $this->ion_auth->user()->row();
$query = $this->db->query("SELECT * FROM systems WHERE id=1");
$sys = $query->row();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta name="x-apple-disable-message-reformatting">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="telephone=no" name="format-detection">
    <title></title>
    <!--[if (mso 16)]>
    <style type="text/css">
    a {text-decoration: none;}
    </style>
    <![endif]-->
    <!--[if gte mso 9]><style>sup { font-size: 100% !important; }</style><![endif]-->
    <!--[if gte mso 9]>
<xml>
    <o:OfficeDocumentSettings>
    <o:AllowPNG></o:AllowPNG>
    <o:PixelsPerInch>96</o:PixelsPerInch>
    </o:OfficeDocumentSettings>
</xml>
<![endif]-->
</head>

<body>
    <div class="es-wrapper-color">
        <!--[if gte mso 9]>
			<v:background xmlns:v="urn:schemas-microsoft-com:vml" fill="t">
				<v:fill type="tile" color="#eeeeee"></v:fill>
			</v:background>
		<![endif]-->
        <table class="es-wrapper" width="100%" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td class="esd-email-paddings" valign="top">
                        <table class="es-content" cellspacing="0" cellpadding="0" align="center">
                            <tbody>
                                <tr></tr>
                                <tr>
                                    <td class="esd-stripe" esd-custom-block-id="7681" align="center">
                                        <table class="es-header-body" style="background-color: #044767;" width="600" cellspacing="0" cellpadding="0" bgcolor="#044767" align="center">
                                            <tbody>
                                                <tr>
                                                    <td class="esd-structure es-p35t es-p35b es-p35r es-p35l" align="left">
                                                        <!--[if mso]><table width="530" cellpadding="0" cellspacing="0"><tr><td width="340" valign="top"><![endif]-->
                                                        <table class="es-left" cellspacing="0" cellpadding="0" align="left">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="es-m-p0r es-m-p20b esd-container-frame" width="340" valign="top" align="center">
                                                                        <table width="100%" cellspacing="0" cellpadding="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class="esd-block-text es-m-txt-c" align="left">
                                                                                        <h1 style="color: #ffffff; line-height: 100%; padding-left:10px"> <?= $identity ?></h1>
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
                        <table class="es-content" cellspacing="0" cellpadding="0" align="center">
                            <tbody>
                                <tr>
                                    <td class="esd-stripe" align="center">
                                        <table class="es-content-body" width="600" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center">
                                            <tbody>
                                                <tr>
                                                    <td class="esd-structure es-p40t es-p35r es-p35l" align="left">
                                                        <table width="100%" cellspacing="0" cellpadding="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="esd-container-frame" width="530" valign="top" align="center">
                                                                        <table width="100%" cellspacing="0" cellpadding="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class="esd-block-image es-p25t es-p25b es-p35r es-p35l" align="center" style="font-size:0"><a target="_blank" href="#"><img src="https://i.pinimg.com/564x/ce/93/8b/ce938b338c68c984591dd334ac306ddc.jpg" alt style="display: block;" width="120"></a></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="esd-block-text es-p10b" align="center">
                                                                                        <h2>Ongoing Delivery!</h2>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="esd-block-text es-p10b" align="center">
                                                                                        <p>Hey <?= ucwords($name) ?>,</p>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="esd-block-text es-p15t es-p20b" align="center">
                                                                                        <p style="font-size: 16px; color: #777777;">We are going to deliver your parcel.</p>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="esd-block-text es-p15t es-p20b" align="center">
                                                                                        <p style="font-size: 16px; color: #777777;">Please prepare the exact amount for your order.</p>
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
                        <table class="es-content" cellspacing="0" cellpadding="0" align="center">
                            <tbody>
                                <tr>
                                    <td class="esd-stripe" align="center">
                                        <table class="es-content-body" width="600" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center">
                                            <tbody>
                                                <tr>
                                                    <td class="esd-structure es-p20t es-p35r es-p35l" align="left">
                                                        <table width="100%" cellspacing="0" cellpadding="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="esd-container-frame" width="530" valign="top" align="center">
                                                                        <table width="100%" cellspacing="0" cellpadding="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class="esd-block-text es-p10t es-p10b es-p10r es-p10l" bgcolor="#eeeeee" align="left">
                                                                                        <table style="width: 500px;" class="cke_show_border" cellspacing="1" cellpadding="1" border="0" align="left">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td width="80%">
                                                                                                        <h4>Order Confirmation #</h4>
                                                                                                    </td>
                                                                                                    <td width="20%">
                                                                                                        <h4><?= $order_id ?></h4>
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
                                                <tr>
                                                    <td class="esd-structure es-p10t es-p35r es-p35l" align="left">
                                                        <table width="100%" cellspacing="0" cellpadding="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="esd-container-frame" width="530" valign="top" align="center">
                                                                        <table style="border-top: 3px solid #eeeeee; border-bottom: 3px solid #eeeeee;" width="100%" cellspacing="0" cellpadding="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class="esd-block-text es-p15t es-p15b es-p10r es-p10l" align="left">
                                                                                        <table style="width: 500px;" class="cke_show_border" cellspacing="1" cellpadding="1" border="0" align="left">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td width="80%">
                                                                                                        <h4>TOTAL</h4>
                                                                                                    </td>
                                                                                                    <td width="20%">
                                                                                                        <h4>P <?= number_format($total, 2) ?></h4>
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
                                                <tr>
                                                    <td class="esd-structure es-p40t es-p40b es-p35r es-p35l" esd-custom-block-id="7796" align="left">
                                                        <!--[if mso]><table width="530" cellpadding="0" cellspacing="0"><tr><td width="255" valign="top"><![endif]-->
                                                        <table class="es-left" cellspacing="0" cellpadding="0" align="left">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="esd-container-frame es-m-p20b" width="255" align="left">
                                                                        <table width="100%" cellspacing="0" cellpadding="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class="esd-block-text es-p15b" align="left">
                                                                                        <h4>Delivery Address</h4>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="esd-block-text es-p10b" align="left">
                                                                                        <p><?= $address ?></p>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <!--[if mso]></td><td width="20"></td><td width="255" valign="top"><![endif]-->
                                                        <table class="es-right" cellspacing="0" cellpadding="0" align="right">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="esd-container-frame" width="255" align="left">
                                                                        <table width="100%" cellspacing="0" cellpadding="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class="esd-block-text es-p15b" align="left">
                                                                                        <h4>Estimated Delivery Date<br></h4>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="esd-block-text" align="left">
                                                                                        <p><?= date('F d, Y', strtotime("+1 day")) ?></p>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <!--[if mso]></td></tr></table><![endif]-->
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="es-content" cellspacing="0" cellpadding="0" align="center">
                            <tbody>
                                <tr>
                                    <td class="esd-stripe" esd-custom-block-id="7797" align="center">
                                        <table class="es-content-body" style="background-color: #1b9ba3;" width="600" cellspacing="0" cellpadding="0" bgcolor="#1b9ba3" align="center">
                                            <tbody>
                                                <tr>
                                                    <td class="esd-structure es-p35t es-p35b es-p35r es-p35l" align="left">
                                                        <table width="100%" cellspacing="0" cellpadding="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="esd-container-frame" width="530" valign="top" align="center">
                                                                        <table width="100%" cellspacing="0" cellpadding="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class="esd-block-text es-p25t" align="center">
                                                                                        <h2 style="color: #ffffff; font-size: 24px;">Get 25% off your next order.</h2>
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
                        <table cellpadding="0" cellspacing="0" class="es-footer" align="center">
                            <tbody>
                                <tr>
                                    <td class="esd-stripe" esd-custom-block-id="7684" align="center">
                                        <table class="es-footer-body" width="600" cellspacing="0" cellpadding="0" align="center">
                                            <tbody>
                                                <tr>
                                                    <td class="esd-structure es-p35t es-p40b es-p35r es-p35l" align="left">
                                                        <table width="100%" cellspacing="0" cellpadding="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="esd-container-frame" width="530" valign="top" align="center">
                                                                        <table width="100%" cellspacing="0" cellpadding="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class="esd-block-text es-p35b" align="center">
                                                                                        <p><strong><?= $sys->address ?></strong></p>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="esd-block-text es-p35b" align="center">
                                                                                        <p><strong>Thank You!</strong></p>
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