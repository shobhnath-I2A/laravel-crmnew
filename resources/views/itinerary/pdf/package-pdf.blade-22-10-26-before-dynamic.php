<!DOCTYPE html>

<html>
<style type="text/css">
body {
    margin-top: 0;
    margin-bottom: 0;
    padding-top: 0;
    padding-bottom: 0;
}

table {
    page-break-inside: auto
}

tr {
    page-break-inside: avoid;
    page-break-after: auto;
}

thead {
    display: table-header-group;
}

tfoot {
    display: table-footer-group;
}

@media print {
    body {
        page-break-before: always;
        margin: 0;
        padding: 0;
    }
}

@page {
    size: auto;
    margin: 10mm 0 10mm 0;
}
 * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: sans-serif;
    }

    .pdf_wrapper {
        max-width: 816px;
        background: #fff;
        font-family: sans-serif;
        font-size: 14px;
        line-height: 1.7;
        color: #3f3f46;
    }

    .dayHead {
        background: #eefaf0;
        padding: 10px;
    }

    .around-padding {
        padding: 30px;
        border-bottom: 1px solid #ccc;
    }

    .img-box {
        float: left;
        width: 35%;
    }

    .desc-box {
        float: right;
        width: 65%;
        padding-left: 20px;
        padding-right: 20px;
    }

    .desc-box h3 {
        font-size: 17px;
        margin-bottom: 12px;
    }

    .desc-box h4 {
        font-size: 20px;
        color: gray;
        margin-bottom: 15px;
    }

    .clear {
        clear: both;
    }

    .img-desc h2 {
        font-size: 18px;
        line-height: 32px;
        margin-bottom: 10px;
    }

    .image {
        width: 230px;
        margin-right: 20px;
    }

    .desc,
    .desc p {
        font-size: 15px;
        line-height: 20px;
        margin-bottom: 20px;
        text-align: justify;
    }

    .room {
        font-size: 20px;
        color: gray;
        font-weight: 600;
        margin-top: 10px;
        margin-bottom: 10px;
    }

    .check-in {
        font-size: 14px;
        margin-top: 10px;
        margin-bottom: 10px;
        font-family: sans-serif;
        font-weight: bold;
    }

    .pt-custom {
        padding-top: 70px;
    }

    .trev-pic span {
        font-size: 18px;
        color: gray;
        font-weight: 600;
        display: block;
    }

    .peace-in p {
        font-size: 20px;
        color: gray;
        font-weight: bold;
    }

    .peace-in {
        width: 100%;
        padding-top: 20px;
    }

    .trev-pic,
    .trav_hours,
    .peace-in {
        float: left;
    }

    .trev-pic {
        width: 14%;
    }

    .trav-time {
        float: left;
        width: 35%;
        padding-left: 20px;
        padding-right: 20px;
    }

    .trav-time span {
        display: block;
        font-weight: 600;
    }

    .trav_hours {
        float: left;
        width: 100%;
        padding-left: 20px;
    }

    .airo-pic {
        margin-top: -1px;
        text-align: center;
        display: block;
        font-size: 37px;
    }

    .trav_hours .hours {
        display: block;
        text-align: center;
        padding-top: 14px;
    }

    .dayDetails h3 {
        font-size: 18px;
        font-size: 19px;
        margin-bottom: 5px;
    }

    .borderNone {
        border: none;
        padding: 0px 30px;
    }

    ul {
        padding-left: 25px;
    }
</style>

<head>
    <meta charset="UTF-8">
    <title>PDF_WebPage</title>
</head>

<body style="background:#fff;">
    <table width="800px" cellspacing="0" cellpadding="0" border="0" style="background:#fff;font-family:sans-serif;font-size:14px;line-height:1.7;color:#000;padding:0 30px 0;">
        <tbody>
            <tr>
                <td>
                    <table width="100%" cellspacing="0" cellpadding="0" border="0" style="min-width:100%;">
                        <tbody>
                            <tr>
                                <td style="padding:30px 30px 0 0;vertical-align:top;">
                                    <table width="100%" cellspacing="0" cellpadding="0" border="0" style="min-width:100%;">
                                        <tbody>
                                            <tr>
                                                <td style="font-size:0;">
                                                    <div style="font-size:20px;display:inline-block;font-weight:bold;">Mr. Nandu Sai &nbsp;</div>
                                                    <div style="font-size:20px;display:inline-block;color:#888;">trip to</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight:bold;font-size:30px;line-height:1.1;color:#6cc072;word-break: break-all;">Langkawi, Kuala Lumpur
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="height:10px;"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td style="width:250px;height:121px;font-size:0;text-align:center;background:url(http://localhost:8081/project/I2ACrm/staging/pdf/images/sideCircle.png) no-repeat top center;vertical-align:top;">
                                    <a htef="#" style="width:150px;height:100px;background:url(http://localhost:8081/project/I2ACrm/staging/profilepic/17911997792813523531791199779.png) no-repeat top center;display:inline-block;margin-top:35px;"></a>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" style="padding-bottom:10px;">
                                    <div style="display:inline-block;font-weight:bold;background:#e4e2df;border-radius:20px;padding:8px 15px;line-height:1;color:#888;vertical-align:middle;">5N/6D
                                    </div>
                                    <div style="display:inline-block;font-size:20px;vertical-align:middle;line-height: 1;">
                                        <div style="display:inline-block;">
                                            <img src="http://localhost:8081/project/I2ACrm/staging/pdf/images/parallel.png" style="width:30px;display: inline-block;" />
                                        </div>

                                    </div>
                                    <div style="display:inline-block;color:#888;vertical-align:middle;line-height: 1; font-size:20px">Customizable</div>
                                    <div style="display:block;font-size:20px;font-weight:bold;vertical-align:middle;padding-top:10px;">Mr. Nandu Sai trail to Langkawi and Kuala Lumpur for 5N / 6D </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <table width="100%" cellspacing="0" cellpadding="0" border="0" style="min-width:100%;">
                                        <tbody>
                                            <tr>
                                                <td colspan="2" style="height:2px;background:#eefaf0;"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" style="height:20px;"></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <table width="100%" cellspacing="0" cellpadding="0" border="0" style="min-width:100%;">
                                        <tbody>
                                            <tr>
                                                <td style="width:320px;padding:0 30px 20px 0;vertical-align:top;">
                                                    <table width="100%" cellspacing="0" cellpadding="0" border="0" style="min-width:100%;font-weight:bold;">
                                                        <tbody>
                                                            <tr>
                                                                <td style="font-size:20px;padding-bottom:10px;">Contents</td>
                                                            </tr>
                                                            <tr>
                                                                <td style="padding-bottom:10px;">
                                                                    <table width="100%" cellspacing="0" cellpadding="0" border="0" style="min-width:100%;font-weight:bold;">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td style="vertical-align:top;">
                                                                                    <span style="background:#eefaf0;width:30px;height:30px;line-height:30px;border-radius:100%;text-align:center;color:#666;display:inline-block;vertical-align:middle;">1</span>
                                                                                </td>
                                                                                <td style="color:#6cc072;padding-left:10px;width:100%;">Your Itinerary</td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="padding-bottom:10px;">
                                                                    <table width="100%" cellspacing="0" cellpadding="0" border="0" style="min-width:100%;font-weight:bold;">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td style="vertical-align:top;">
                                                                                    <span style="background:#eefaf0;width:30px;height:30px;line-height:30px;border-radius:100%;text-align:center;color:#666;display:inline-block;vertical-align:middle;">2</span>
                                                                                </td>
                                                                                <td style="color:#6cc072;padding-left:10px;width:100%;">Day Wise Details</td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="padding-bottom:10px;">
                                                                    <table width="100%" cellspacing="0" cellpadding="0" border="0" style="min-width:100%;font-weight:bold;">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td style="vertical-align:top;">
                                                                                    <span style="background:#eefaf0;width:30px;height:30px;line-height:30px;border-radius:100%;text-align:center;color:#666;display:inline-block;vertical-align:middle;">3</span>
                                                                                </td>
                                                                                <td style="color:#6cc072;padding-left:10px;width:100%;">Cancellation & Date Change Policies</td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td>
                                                    <table width="100%" cellspacing="0" cellpadding="0" border="0" style="min-width:100%;background:#eefaf0;border-radius:20px;padding:30px;line-height:1.5;">
                                                        <tbody>
                                                            <tr>
                                                                <td style="font-style:italic;color:#333;">Curated by</td>
                                                            </tr>
                                                            <tr>
                                                                <td style="font-size:22px;font-weight:bold;">trekhops.in </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="color:#333;padding-bottom:20px;"></td>
                                                            </tr>
                                                            <tr>
                                                                <td style="color:#888;">
                                                                    Call :&nbsp; 9871148759
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="color:#888;padding-bottom:20px;">
                                                                    Email :&nbsp; holidays@trekhops.in
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div style="display:inline;">Quotation Created on&nbsp;</div>
                                                                    <b style="display:inline;">
                                                                        2025-08-01 17:27:32</b>
                                                                </td>
                                                            </tr>
                                                            <tr>
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
                                <td colspan="2">
                                    <table width="100%" cellspacing="0" cellpadding="0" border="0" style="min-width:100%;">
                                        <tr>
                                            <td style="font-weight:bold;font-size:20px;color:#666;">Highlights</td>
                                        </tr>
                                        <tr>
                                            <td style="height:10px;"></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <table width="100%" cellspacing="0" cellpadding="0" border="0" style="min-width:100%;white-space:nowrap;">
                                                    <tbody>
                                                        <tr>
                                                            <td style="width:150px;vertical-align:top;">
                                                                <table width="100%" cellspacing="0" cellpadding="0" border="0" style="max-width: 100%; text-align: center; border: 2px solid #eefaf0; border-radius: 4px;">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td style="height:10px;"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <div style="width:50px;height:50px;background:#eefaf0;border-radius:100%;margin:auto;">
                                                                                    <img src="http://localhost:8081/project/I2ACrm/staging/pdf/images/plane.png" width="35" style="margin-top:20px;">
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="height:5px"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="color:#333;font-weight:bold;">2 Flights</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="height:10px;"></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                            <td style="width:10px"></td>
                                                            <td style="width:150px;vertical-align:top;">
                                                                <table width="100%" cellspacing="0" cellpadding="0" border="0" style="max-width: 100%; text-align: center; border: 2px solid #eefaf0; border-radius: 4px;">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td style="height:10px;"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <div style="width:50px;height:50px;background:#eefaf0;border-radius:100%;margin:auto;">
                                                                                    <img src="http://localhost:8081/project/I2ACrm/staging/pdf/images/hotel.png" width="35" style="margin-top:12px;">
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="height:5px"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="color:#333;font-weight:bold;">2 Hotels</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="height:10px;"></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                            <td style="width:10px"></td>
                                                            <td style="width:150px;vertical-align:top;">
                                                                <table width="100%" cellspacing="0" cellpadding="0" border="0" style="max-width: 100%; text-align: center; border: 2px solid #eefaf0; border-radius: 4px;">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td style="height:10px;"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <div style="width:50px;height:50px;background:#eefaf0;border-radius:100%;margin:auto;">
                                                                                    <img src="http://localhost:8081/project/I2ACrm/staging/pdf/images/activities.png" width="35" style="margin-top:18px;">
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="height:5px"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="color:#333;font-weight:bold;">7 Activities</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="height:10px;"></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                            <td style="width:10px"></td>
                                                            <td style="width:150px;vertical-align:top;">
                                                                <table width="100%" cellspacing="0" cellpadding="0" border="0" style="max-width: 100%; text-align: center; border: 2px solid #eefaf0; border-radius: 4px;">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td style="height:10px;"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <div style="width:50px;height:50px;background:#eefaf0;border-radius:100%;margin:auto;">
                                                                                    <img src="http://localhost:8081/project/I2ACrm/staging/pdf/images/car.png" width="35" style="margin-top:12px;">
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="height:5px"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="color:#333;font-weight:bold;">4 Transfers</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="height:10px;"></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                            <td style="width:100px;vertical-align:top;">&nbsp;</td>
                                                            <td style="width:100px;vertical-align:top;">&nbsp;</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="height:20px;"></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table width="100%" cellspacing="0" cellpadding="0" border="0" style="min-width:100%;padding:0 00px 0; display:none">
                        <tbody>
                            <tr>
                                <td style="background:#6cc072;border-radius:5px;padding:30px;">
                                    <table width="100%" cellspacing="0" cellpadding="0" border="0" style="min-width:100%;color:#fff;">
                                        <tbody>
                                            <tr>
                                                <td style="width:100%;">
                                                    <div style="display:block;">
                                                        <img src="http://localhost:8081/project/I2ACrm/staging/pdf/images/bag.png" width="14" style="display:inline;">
                                                        <div style="margin-left:5px;font-size:20px;font-weight:bold;display:inline;">Now, Plan Your Trips with ******</div>
                                                    </div>
                                                    <ul style="width:100%;font-style:italic;margin:10px 0 0;padding:0 0 0 20px;list-style:disc;">
                                                        <li style="margin-right:30px;float: left;">Track quotations</li>
                                                        <li style="margin-right:30px;float: left;">Customize your quotes</li>
                                                        <li style="margin-right:30px;float: left;">Communicate in real-time </li>
                                                    </ul>
                                                </td>
                                                <td>
                                                    <a href="#" target="_blank" style="text-decoration:none;width:120px;display:block;text-align:center;line-height:1.1;background:white;padding:15px 40px;border-radius:40px;font-weight:bold;color:#6cc072;border:2px solid #6cc072;text-transform:uppercase;">View Your Quotes</a>
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
                <td>
                    <table width="100%" cellspacing="0" cellpadding="0" border="0" style="min-width:100%;background:#eefaf0;border-radius:20px;padding:30px;">
                        <tbody>
                            <tr>
                                <td colspan="2" style="font-weight:bold;font-size:20px;padding-bottom:5px;">Total Cost Including Tax</td>
                            </tr>
                            <tr>
                                <td colspan="2" style="color:#666;padding-bottom:10px;">Note: Package price, payment schedule and cancellation policy are tentative and subject to change. Package price, payment schedule and cancellation policy as shown on the Package Review Page prior to the payment will be final.</td>
                            </tr>
                            <tr>
                                <td style="color:#6cc072;font-weight:bold;font-size:0;">
                                    <span style="display:inline-block;margin-right:5px;">
                                        <div style="font-size: 30px;display:inline-block;vertical-align:middle;"><img src="http://localhost:8081/project/I2ACrm/staging/pdf/images/inr.png" style="width:15px;display:inline-block;margin-right:5px;" /></div>

                                        <span style="display:inline-block;font-size:24px;vertical-align:middle;">25164.32</span>
                                    </span>
                                    <span style="display:inline-block;font-size:14px;vertical-align:middle;">For 2 Adults </span>
                                </td>
                                <td style="text-align:right;font-size:0;">

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="padding:15px 30px 30px;font-style:italic;color:#666;">
                    <span style="width:40px;height:40px;background:#eefaf0;color:#666;border-radius:100%;display:inline-block;font-size:0;text-align:center;margin-right:10px;vertical-align:middle;">
                        <img src="http://localhost:8081/project/I2ACrm/staging/pdf/images/leaves.png" width="24" style="margin-top:10px;">
                    </span>
                    <span style="display:inline;vertical-align:middle;">Please think twice before printing this mail.&nbsp;</span>
                    <b style="display:inline;vertical-align:middle;">Save paper</b>
                    <span style="display:inline;vertical-align:middle;">, it is good for the environment.</span>
                </td>
            </tr>
        </tbody>
    </table>
    <div style="page-break-before: always;"></div>
    <table width="800px" cellspacing="0" cellpadding="0" border="0" style="background:#fff;font-family:sans-serif;font-size:14px;line-height:1.7;color:#000;padding:0 30px 0; margin-top:10px;">
        <tbody>
            <tr>
                <td>
                    <table width="100%" cellspacing="0" cellpadding="0" border="0" style="min-width:100%;">
                        <tbody>
                            <tr>
                                <th colspan="2" style="background:#6cc072;color:#fff;padding:5px;font-size:18px;text-align:center;">Vacation Itinerary Template</th>
                            </tr>
                            <tr style="vertical-align:top;">
                                <td style="padding:20px 0 10px;width:60%;">
                                    <table width="100%" cellspacing="0" cellpadding="0" border="0" style="min-width:100%;">
                                        <tbody>
                                            <tr>
                                                <td colspan="2" style="font-weight:bold;font-size:18px;padding-bottom:10px;">Client Information</td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight:bold;padding-bottom:10px;width:35%;padding-right:15px;">Name </td>
                                                <td style="color:#666;padding-bottom:10px;">Mr. Nandu Sai</td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight:bold;padding-bottom:10px;width:35%;padding-right:15px;">Phone Number </td>
                                                <td style="color:#666;padding-bottom:10px;">7730013686</td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight:bold;padding-bottom:10px;width:35%;padding-right:15px;">Start Date </td>
                                                <td style="color:#666;padding-bottom:10px;">2025-08-21</td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight:bold;padding-bottom:10px;width:35%;padding-right:15px;">End Date </td>
                                                <td style="color:#666;padding-bottom:10px;">2025-08-26</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td style="text-align:center;padding:20px 0;width:40%;">
                                    <img src="http://localhost:8081/project/I2ACrm/staging/pdf/images/traveller.jpg" width="200">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table width="100%" cellspacing="0" cellpadding="0" border="0" style="min-width:100%;border:1px solid #6cc072;border-collapse:collapse;text-align:center;">
                        <tbody>
                            <tr>
                                <td colspan="4" style="background:#6cc072;color:#fff;padding:5px;font-size:18px;text-align:center;font-weight:bold;">Flight Details</td>
                            </tr>
                            <tr>
                                <td colspan="4" style="border-top:1px solid transparent;border-left:1px solid transparent;border-right:1px solid transparent;border-collapse:collapse;height:5px;"></td>
                            </tr>
                            <tr style="vertical-align:top;">
                                <td style="border:1px solid #ccc;border-collapse:collapse;background:#eee;font-weight:bold;padding:5px;width:25%;">Flight Details</td>
                                <td style="border:1px solid #ccc;border-collapse:collapse;background:#eee;font-weight:bold;padding:5px;width:25%;">Date</td>
                                <td style="border:1px solid #ccc;border-collapse:collapse;background:#eee;font-weight:bold;padding:5px;width:25%;">Duration</td>
                                <td style="border:1px solid #ccc;border-collapse:collapse;background:#eee;font-weight:bold;padding:5px;width:25%;">Flight No.</td>
                            </tr>

                            <tr style="vertical-align:top;color:#666;">
                                <td style="border:1px solid #ccc;border-collapse:collapse;padding:5px;width:25%;">Air Asia, </td>
                                <td style="border:1px solid #ccc;border-collapse:collapse;padding:5px;width:25%;">21-Aug-2025</td>
                                <td style="border:1px solid #ccc;border-collapse:collapse;padding:5px;width:25%;">1h 05m |Non Stop</td>
                                <td style="border:1px solid #ccc;border-collapse:collapse;padding:5px;width:25%;">AK-6320</td>
                            </tr>

                            <tr style="vertical-align:top;color:#666;">
                                <td style="border:1px solid #ccc;border-collapse:collapse;padding:5px;width:25%;">Air Asia,</td>
                                <td style="border:1px solid #ccc;border-collapse:collapse;padding:5px;width:25%;">24-Aug-2025</td>
                                <td style="border:1px solid #ccc;border-collapse:collapse;padding:5px;width:25%;">1h 10m |Non Stop</td>
                                <td style="border:1px solid #ccc;border-collapse:collapse;padding:5px;width:25%;"> AK-6307</td>
                            </tr>

                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table width="100%" cellspacing="0" cellpadding="0" border="0" style="min-width:100%;border:1px solid #6cc072;border-collapse:collapse;text-align:center;margin-top:20px;">
                        <tbody>
                            <tr>
                                <td colspan="4" style="background:#6cc072;color:#fff;padding:5px;font-size:18px;text-align:center;font-weight:bold;">Hotel Details</td>
                            </tr>
                            <tr>
                                <td colspan="4" style="border-top:1px solid transparent;border-left:1px solid transparent;border-right:1px solid transparent;border-collapse:collapse;height:5px;"></td>
                            </tr>
                            <tr style="vertical-align:top;">
                                <td style="border:1px solid #ccc;border-collapse:collapse;background:#eee;font-weight:bold;padding:5px;width:50%;">Hotel</td>
                                <td style="border:1px solid #ccc;border-collapse:collapse;background:#eee;font-weight:bold;padding:5px;width:20%;">Check in</td>
                                <td style="border:1px solid #ccc;border-collapse:collapse;background:#eee;font-weight:bold;padding:5px;width:15%;">Check out</td>
                                <td style="border:1px solid #ccc;border-collapse:collapse;background:#eee;font-weight:bold;padding:5px;width:15%;">Inclusion</td>
                            </tr>

                            <tr style="vertical-align:top;color:#666;">

                                <td style="border:1px solid #ccc;border-collapse:collapse;padding:5px;">Bella Vista Waterfront Resort (3 Star)<br />
                                </td>
                                <td style="border:1px solid #ccc;border-collapse:collapse;padding:5px;">21-Aug-2025</td>
                                <td style="border:1px solid #ccc;border-collapse:collapse;padding:5px;">23-Aug-2025 </td>
                                <td style="border:1px solid #ccc;border-collapse:collapse;padding:5px;">Bed & Breakfast</td>
                            </tr>

                            <tr style="vertical-align:top;color:#666;">

                                <td style="border:1px solid #ccc;border-collapse:collapse;padding:5px;">Seri Pacific Hotel Kuala Lumpur(5 Star)<br />
                                </td>
                                <td style="border:1px solid #ccc;border-collapse:collapse;padding:5px;">24-Aug-2025</td>
                                <td style="border:1px solid #ccc;border-collapse:collapse;padding:5px;">25-Aug-2025 </td>
                                <td style="border:1px solid #ccc;border-collapse:collapse;padding:5px;">Breakfast</td>
                            </tr>

                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table width="100%" cellspacing="0" cellpadding="0" border="0" style="min-width:100%;border:1px solid #6cc072;border-collapse:collapse;text-align:center; margin-top:20px;">
                        <tbody>
                            <tr>
                                <td colspan="2" style="background:#6cc072;color:#fff;padding:5px;font-size:18px;text-align:center;font-weight:bold;">Activities</td>
                            </tr>
                            <tr>
                                <td colspan="2" style="border-top:1px solid transparent;border-left:1px solid transparent;border-right:1px solid transparent;border-collapse:collapse;height:5px;"></td>
                            </tr>
                            <tr style="vertical-align:top;">
                                <td style="border:1px solid #ccc;border-collapse:collapse;background:#eee;font-weight:bold;padding:5px;width:65%;">Destination/Place</td>
                                <td style="border:1px solid #ccc;border-collapse:collapse;background:#eee;font-weight:bold;padding:5px;width:35%;">Date</td>
                            </tr>

                            <tr style="vertical-align:top;color:#666;">
                                <td style="border:1px solid #ccc;border-collapse:collapse;padding:5px;width:65%;">Langkawi City Tour</td>
                                <td style="border:1px solid #ccc;border-collapse:collapse;padding:5px;width:35%;">21 Aug 2025</td>
                            </tr>

                            <tr style="vertical-align:top;color:#666;">
                                <td style="border:1px solid #ccc;border-collapse:collapse;padding:5px;width:65%;">Langkawi Island Hopping</td>
                                <td style="border:1px solid #ccc;border-collapse:collapse;padding:5px;width:35%;">22 Aug 2025</td>
                            </tr>

                            <tr style="vertical-align:top;color:#666;">
                                <td style="border:1px solid #ccc;border-collapse:collapse;padding:5px;width:65%;">Langkawi Sharing Boat Trip</td>
                                <td style="border:1px solid #ccc;border-collapse:collapse;padding:5px;width:35%;">22 Aug 2025</td>
                            </tr>

                            <tr style="vertical-align:top;color:#666;">
                                <td style="border:1px solid #ccc;border-collapse:collapse;padding:5px;width:65%;">Genting Highlands Day Trip from Kuala Lumpur with Skyway Cable Car Ride with Enroute Batu caves</td>
                                <td style="border:1px solid #ccc;border-collapse:collapse;padding:5px;width:35%;">23 Aug 2025</td>
                            </tr>

                            <tr style="vertical-align:top;color:#666;">
                                <td style="border:1px solid #ccc;border-collapse:collapse;padding:5px;width:65%;">Genting Cable Car Ride</td>
                                <td style="border:1px solid #ccc;border-collapse:collapse;padding:5px;width:35%;">23 Aug 2025</td>
                            </tr>

                            <tr style="vertical-align:top;color:#666;">
                                <td style="border:1px solid #ccc;border-collapse:collapse;padding:5px;width:65%;">Kuala Lumpur Evening City Tour</td>
                                <td style="border:1px solid #ccc;border-collapse:collapse;padding:5px;width:35%;">24 Aug 2025</td>
                            </tr>

                            <tr style="vertical-align:top;color:#666;">
                                <td style="border:1px solid #ccc;border-collapse:collapse;padding:5px;width:65%;">KLCC Aquaria Tour</td>
                                <td style="border:1px solid #ccc;border-collapse:collapse;padding:5px;width:35%;">25 Aug 2025</td>
                            </tr>

                        </tbody>
                    </table>
                </td>
            </tr>
        <tbody>
    </table>
    <!-- days start vvv -->
    <div style="page-break-before: always;"></div>

    <script>
    function imgError(image) {
        image.onerror = "";
        image.src = "images/noother.png";
        return true;
    }
    </script>
    <table width="816px" cellspacing="0" cellpadding="0" border="0" style="background:#fff;font-family:sans-serif;font-size:14px;line-height:1.7;color:#000;">
        <tr>
            <td>
                <table width="100%" cellspacing="0" cellpadding="0" border="0" style="min-width:100%;padding-right: 30px;">
                    <thead>
                        <tr>
                            <td style="background:url(<br />
<b>Warning</b>:  Undefined variable $fullurl in <b>C:\xampp\htdocs\Project\I2ACrm\staging\pdf\itineraries4.php</b> on line <b>44</b><br />
pdf/images/sideCircle.png) no-repeat top left;background-size:250px 121px;padding:30px 0 30px 30px;font-weight:bold;font-size:36px;color:#6cc072;">Day Wise Details</td>
                        </tr>
                    </thead>
                </table>
            </td>
        </tr>
    </table>

    <div class="pdf_wrapper dayHead">
        <div class="around-padding borderNone">
            <div style="font-weight:bold;">
                <div style="width:100%;font-size:32px;color:#000;line-height:1.1;margin-top:5px;">Day 1 <div style="    float: right;font-size: 20px; font-weight: bold; color: #000; line-height: 1.1; vertical-align: bottom; text-align: right;">Thu, 21 Aug 2025</div>
                </div>

            </div>
        </div>
    </div>
    <!-- heading end -->
    <div class="pdf_wrapper">

        <div class="dayDetails around-padding">
            <h3>Aquaria KLCC followed by free day at leisure</h3>
            <p>Aquaria KLCC is a state of the art located in the heart of the city, beneath the Kuala Lumpur City Centre and a stone's throw from the iconic Twin Towers. An amazing showcase of 5,000 land bound and aquatic creature exhibits spread over a a sprawling 60,000sqft<br />
            </p>
        </div>

        <!-- section1 Activity -->
        <!-- section1 Activity -->
        <div class="img-desc around-padding">

            <h2>Transportation</h2>
            <div class="img-box">
                <div class="image">
                    <img src="http://localhost:8081/project/I2ACrm/staging/package_image/3seabalconydouble17060141981766409089.png" width="200">
                </div>
            </div>
            <div class="desc-box">
                <h3>Langkawi Airport to Langkawi Hotel</h3>
                <div class="check-in"><i class="fa fa-calendar" aria-hidden="true"></i> 21 Aug 2025</div>
                <div class="desc">
                    <p>f sdfd dfdfd</p>
                </div>
            </div>
            <div class="clear"></div>
        </div>
        <!-- end section1 Activity -->
        <div class="img-desc around-padding">
            <h2>Hotel</h2>
            <div class="img-box">
                <div class="image">
                    <img src="http://localhost:8081/project/I2ACrm/staging/package_image/87bd9f5f-8def-4878-9abc-2ceb9fb34e1e17068758971766409152.jpg" onerror="imgError(this);" width="200">
                </div>
            </div>
            <div class="desc-box">
                <h3>Bella Vista Waterfront Resort </h3>
                <div class="check-in">
                    <strong>Double Room:1</strong><br />
                </div>
                <div style="border-top:1px solid #ddd;border-bottom:1px solid #ddd;margin-bottom:10px;">
                    <table border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td colspan="2">
                                <div style="margin-bottom:10px;">
                                    <div style="margin-bottom:2px;">Check-in</div>
                                    <div style="margin-bottom:5px; font-weight:700;"><i class="fa fa-calendar" aria-hidden="true"></i>21 Aug 2025</div>
                                </div>
                            </td>
                            <td>
                                <div style="margin-bottom:10px;">
                                    <div style="margin-bottom:2px; padding-left:20px;">Check-out</div>
                                    <div style="margin-bottom:5px;padding-left:20px; font-weight:700;"><i class="fa fa-calendar" aria-hidden="true"></i>23 Aug 2025</div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="check-in"><strong>Room Type:</strong> Deluxe Room | <b>Meal: </b>Bed & Breakfast</div>

                <div class="desc">
                </div>
            </div>
            <div class="clear"></div>
        </div>
        <!-- end section1 Accommodation -->
        <!-- section1 Activity -->
        <!-- section1 Activity -->

        <div class="img-desc around-padding">
            <h2>Activity</h2>
            <div class="img-box">
                <div class="image">
                    <img src="http://localhost:8081/project/I2ACrm/staging/package_image/sidecircle21769086675.png" width="200">
                </div>
            </div>
            <div class="desc-box">
                <h3>Langkawi City Tour</h3>
                <div class="check-in"><i class="fa fa-calendar" aria-hidden="true"></i>21 Aug 2025</div>
                <div class="desc">
                </div>
            </div>
            <div class="clear"></div>
        </div>
        <!-- end section1 Activity -->
        <div class="img-desc around-padding">
            <h2>Flight</h2>
            <div class="img-box">
                <div class="image">
                    <img src="http://localhost:8081/project/I2ACrm/staging/package_image/airasia17013280611766408876.jfif" width="200">
                </div>
            </div>
            <div class="desc-box">
                <h3>Air Asia, AK-6320</h3>
                <div class="check-in"><i class="fa fa-calendar" aria-hidden="true"></i>21 Aug 2025 </div>
                <div style="display:table;padding-bottom:30px;">
                    <table border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                            <td align="center" style="padding-right:20px; font-size:12px;">
                                <div style="font-size:14px; font-weight:700; color:#000; margin-bottom:3px;">12:05 AM</div>Kuala Lumpur (KUL)
                            </td>
                            <td align="center" style="width:100px;">
                                <div style="text-align:center; font-size:11px; color:#666666;padding-bottom: 4px;">1h 05m |Non Stop</div>
                                <div style="font-size:0px; border-top:2px solid #ddd; position:relative;"><i class="fa fa-plane" aria-hidden="true" style="position: absolute; font-size: 18px; transform: rotate(45deg); top: -9px; left: 40%;"></i></div>
                            </td>
                            <td align="center" style="padding-left:20px;font-size:12px;">
                                <div style="font-size:14px; font-weight:700; color:#000; margin-bottom:3px;">12:00 AM</div>Langkawi (LGK)
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="desc">
                    Baggage Rules Cabin Check-in
                    Adult 7-10 kg 0Kg
                </div>
            </div>
            <div class="clear"></div>
        </div>
        <!-- end section1 Flight -->
        <!-- section1 Activity -->
        <!-- section1 Activity -->
        <div class="img-desc around-padding">
            <h2>FeesInsurance</h2>
            <div class="img-box">
                <div class="image">
                    <img src="http://localhost:8081/project/I2ACrm/staging/images/noother.png" width="200">
                </div>
            </div>
            <div class="desc-box">
                <h3>insurance</h3>
                <div class="check-in"><i class="fa fa-calendar" aria-hidden="true"></i> &nbsp;21 Aug 2025</div>
                <div class="desc">
                    <p>insurance</p>
                </div>
            </div>
            <div class="clear"></div>
        </div>
        <!-- end section1 Activity -->
        <!-- section1 Activity -->
        <div class="img-desc around-padding">
            <h2>Meal</h2>
            <div class="img-box">
                <div class="image">
                    <img src="http://localhost:8081/project/I2ACrm/staging/images/noother.png" width="200">
                </div>
            </div>
            <div class="desc-box">
                <h3>test meal</h3>
                <div class="check-in"><i class="fa fa-calendar" aria-hidden="true"></i> &nbsp;21 Aug 2025 &nbsp;<i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp; 1:00 PM TO 2:00 PM</div>
                <div class="desc">
                    <p>testing</p>
                </div>
            </div>
            <div class="clear"></div>
        </div>
        <!-- end section1 Activity -->

    </div>

    <div class="pdf_wrapper dayHead">
        <div class="around-padding borderNone">
            <div style="font-weight:bold;">
                <div style="width:100%;font-size:32px;color:#000;line-height:1.1;margin-top:5px;">Day 2 <div style="    float: right;font-size: 20px; font-weight: bold; color: #000; line-height: 1.1; vertical-align: bottom; text-align: right;">Fri, 22 Aug 2025</div>
                </div>

            </div>
        </div>
    </div>
    <!-- heading end -->
    <div class="pdf_wrapper">

        <div class="dayDetails around-padding">
            <h3>Langkawi Island Hopping (Sharing boat)</h3>
            <p>Langkawi island hopping is a popular tour that allows visitors to explore the stunning islands surrounding Langkawi. It typically involves a boat tour that visits several islands, often including spots like Pulau Dayang Bunting (Lake of the Pregnant Maiden) and Pulau Beras Basah (Wet Rice Island). These islands are known for their pristine beaches, crystal-clear waters, and opportunities for wildlife viewing, especially eagles.</p>
        </div>
        <!-- section1 Activity -->

        <!-- section1 Activity -->
        <div class="img-desc around-padding">
            <h2>Activity</h2>
            <div class="img-box">
                <div class="image">
                    <img src="http://localhost:8081/project/I2ACrm/staging/package_image/lalunaresort17053927151766409173.png" width="200">
                </div>
            </div>
            <div class="desc-box">
                <h3>Langkawi Island Hopping</h3>
                <div class="check-in"><i class="fa fa-calendar" aria-hidden="true"></i>22 Aug 2025</div>
                <div class="desc">
                    <div class="eventheading" style="box-sizing: border-box; font-size: 16px; font-weight: 600; margin-bottom: 6px; color: #333333; font-family: Lato, sans-serif; outline: 0px !important;">&nbsp;</div>
                    <div class="eventcontent" style="box-sizing: border-box; font-size: 12px; color: #666666; line-height: 15px; font-family: Lato, sans-serif; outline: 0px !important;">Langkawi island hopping is&nbsp;a popular tour that allows visitors to explore the stunning islands surrounding Langkawi.&nbsp;It typically involves a boat tour that visits several islands, often including spots like Pulau Dayang Bunting (Lake of the Pregnant Maiden) and Pulau Beras Basah (Wet Rice Island).&nbsp;These islands are known for their pristine beaches, crystal-clear waters, and opportunities for wildlife viewing, especially eagles.&nbsp;</div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
        <!-- end section1 Activity -->
        <!-- section1 Activity -->

        <div class="img-desc around-padding">
            <h2>Activity</h2>
            <div class="img-box">
                <div class="image">
                    <img src="http://localhost:8081/project/I2ACrm/staging/package_image/1672665394ninhbinhtourindovietnam116988459721766409192.jpg" width="200">
                </div>
            </div>
            <div class="desc-box">
                <h3>Langkawi Sharing Boat Trip</h3>
                <div class="check-in"><i class="fa fa-calendar" aria-hidden="true"></i>22 Aug 2025</div>
                <div class="desc">
                    <div class="eventheading" style="box-sizing: border-box; font-size: 16px; font-weight: 600; margin-bottom: 6px; color: #333333; font-family: Lato, sans-serif; outline: 0px !important;">&nbsp;</div>
                    <div class="eventcontent" style="box-sizing: border-box; font-size: 12px; color: #666666; line-height: 15px; font-family: Lato, sans-serif; outline: 0px !important;">Transfers &amp; Boat trip to Pregnant Maiden Island, Beras Basah Island &amp; Singa Besar Island on Seat In Coach Boat)</div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
        <!-- end section1 Activity -->
    </div>

    <div class="pdf_wrapper dayHead">
        <div class="around-padding borderNone">
            <div style="font-weight:bold;">
                <div style="width:100%;font-size:32px;color:#000;line-height:1.1;margin-top:5px;">Day 3 <div style="    float: right;font-size: 20px; font-weight: bold; color: #000; line-height: 1.1; vertical-align: bottom; text-align: right;">Sat, 23 Aug 2025</div>
                </div>

            </div>
        </div>
    </div>
    <!-- heading end -->
    <div class="pdf_wrapper">

        <div class="dayDetails around-padding">
            <h3> Full Day Genting Highland Tour with One Way Cable Car Ride + Enroute Batu Caves Tour</h3>
            <p>See a quieter side of Kuala Lumpur on this day-long tour to Batu Caves and the Genting Highlands, a cool 6,000 feet (1,830 meters) above sea-level. An iconic site, the Batu Caves houses a significant Hindu temple and shrine. Take in stunning views of the city skyline after climbing the 272-step flight of stairs that winds steeply up this rocky limestone outcrop on the cityâ€™s edges.</p>
        </div>
        <!-- section1 Activity -->
        <!-- section1 Activity -->

        <div class="img-desc around-padding">
            <h2>Activity</h2>
            <div class="img-box">
                <div class="image">
                    <img src="http://localhost:8081/project/I2ACrm/staging/package_image/batu-cave11708926948.png" width="200">
                </div>
            </div>
            <div class="desc-box">
                <h3>Genting Highlands Day Trip from Kuala Lumpur with Skyway Cable Car Ride with Enroute Batu caves</h3>
                <div class="check-in"><i class="fa fa-calendar" aria-hidden="true"></i>23 Aug 2025</div>
                <div class="desc">
                </div>
            </div>
            <div class="clear"></div>
        </div>
        <!-- end section1 Activity -->



        <!-- section1 Activity -->

        <div class="img-desc around-padding">
            <h2>Activity</h2>
            <div class="img-box">
                <div class="image">
                    <img src="http://localhost:8081/project/I2ACrm/staging/package_image/cab217031575261766409254.jpg" width="200">
                </div>
            </div>
            <div class="desc-box">
                <h3>Genting Cable Car Ride</h3>
                <div class="check-in"><i class="fa fa-calendar" aria-hidden="true"></i>23 Aug 2025</div>
                <div class="desc">
                </div>
            </div>
            <div class="clear"></div>
        </div>
        <!-- end section1 Activity -->

    </div>

    <div class="pdf_wrapper dayHead">
        <div class="around-padding borderNone">
            <div style="font-weight:bold;">
                <div style="width:100%;font-size:32px;color:#000;line-height:1.1;margin-top:5px;">Day 4 <div style="    float: right;font-size: 20px; font-weight: bold; color: #000; line-height: 1.1; vertical-align: bottom; text-align: right;">Sun, 24 Aug 2025</div>
                </div>

            </div>
        </div>
    </div>
    <!-- heading end -->
    <div class="pdf_wrapper">

        <div class="dayDetails around-padding">
            <h3> Departure from Langkawi + Arrival in Kuala Lumpur Arrival in Kuala Lumpur + KL Evening City Tour</h3>
            <p>Experience the vibrant charm of Kuala Lumpur at night on this 4-hour evening tour, which is also solo traveler-friendly. Visit iconic landmarks such as the Petronas Twin Towers, Independence Square, the Old Quarter, and the bustling Chinatown and Central Market.</p>
        </div>
        <!-- section1 Activity -->

        <div class="img-desc around-padding">
            <h2>Transportation</h2>
            <div class="img-box">
                <div class="image">
                    <img src="http://localhost:8081/project/I2ACrm/staging/package_image/rental_transport1703675300.png" width="200">
                </div>
            </div>
            <div class="desc-box">
                <h3>Langkawi Hotel to Langkawi Airport</h3>
                <div class="check-in"><i class="fa fa-calendar" aria-hidden="true"></i> 24 Aug 2025</div>
                <div class="desc">
                </div>
            </div>
            <div class="clear"></div>
        </div>
        <!-- section1 Activity -->

        <div class="img-desc around-padding">
            <h2>Transportation</h2>
            <div class="img-box">
                <div class="image">
                    <img src="http://localhost:8081/project/I2ACrm/staging/package_image/rental_transport1703675300.png" width="200">
                </div>
            </div>
            <div class="desc-box">
                <h3>Kuala Lumpur Airport to Kuala Lumpur Hotel</h3>
                <div class="check-in"><i class="fa fa-calendar" aria-hidden="true"></i> 24 Aug 2025</div>
                <div class="desc">
                </div>
            </div>
            <div class="clear"></div>
        </div>
        <!-- section1 Activity -->

        <div class="img-desc around-padding">
            <h2>Activity</h2>
            <div class="img-box">
                <div class="image">
                    <img src="http://localhost:8081/project/I2ACrm/staging/package_image/kaanipalm17055795191766409208.png" width="200">
                </div>
            </div>
            <div class="desc-box">
                <h3>Kuala Lumpur Evening City Tour</h3>
                <div class="check-in"><i class="fa fa-calendar" aria-hidden="true"></i>24 Aug 2025</div>
                <div class="desc">
                    <table style="border-collapse: collapse; color: #212529; font-family: Lato, sans-serif; outline: 0px !important;" border="0" width="100%" cellspacing="0" cellpadding="0">
                        <tbody>
                            <tr style="box-sizing: border-box; outline: 0px !important;">
                                <td style="box-sizing: border-box; outline: 0px !important;" align="left" valign="top">
                                    <div id="load_build_day_details" style="box-sizing: border-box; outline: 0px !important;">
                                        <div class="daydetailsbox" style="box-sizing: border-box; outline: 0px !important; padding: 15px 15px 15px 25px; font-size: 13px; margin: 11px; box-shadow: #e2e2e2 0px 0px 13px; border-radius: 5px; position: relative;">&nbsp;</div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="clear"></div>
        </div>
        <!-- end section1 Activity -->
        <div class="img-desc around-padding">
            <h2>Hotel</h2>
            <div class="img-box">
                <div class="image">
                    <img src="http://localhost:8081/project/I2ACrm/staging/package_image/padmanabhaswamytemple16974377271766409236.jfif" onerror="imgError(this);" width="200">
                </div>
            </div>
            <div class="desc-box">
                <h3>Seri Pacific Hotel Kuala Lumpur</h3>
                <div class="check-in">
                    <strong>Single Room: 1</strong><br /><strong>Double Room:1</strong><br />
                </div>
                <div style="border-top:1px solid #ddd;border-bottom:1px solid #ddd;margin-bottom:10px;">
                    <table border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td colspan="2">
                                <div style="margin-bottom:10px;">
                                    <div style="margin-bottom:2px;">Check-in</div>
                                    <div style="margin-bottom:5px; font-weight:700;"><i class="fa fa-calendar" aria-hidden="true"></i>24 Aug 2025</div>
                                </div>
                            </td>
                            <td>
                                <div style="margin-bottom:10px;">
                                    <div style="margin-bottom:2px; padding-left:20px;">Check-out</div>
                                    <div style="margin-bottom:5px;padding-left:20px; font-weight:700;"><i class="fa fa-calendar" aria-hidden="true"></i>25 Aug 2025</div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="check-in"><strong>Room Type:</strong> Superior King Room | <b>Meal: </b>Breakfast</div>

                <div class="desc">
                </div>
            </div>
            <div class="clear"></div>
        </div>
        <!-- end section1 Accommodation -->
        <!-- section1 Activity -->

        <div class="img-desc around-padding">
            <h2>Flight</h2>
            <div class="img-box">
                <div class="image">
                    <img src="http://localhost:8081/project/I2ACrm/staging/package_image/airasia17013280611766408876.jfif" width="200">
                </div>
            </div>
            <div class="desc-box">
                <h3>Air Asia, AK-6307</h3>
                <div class="check-in"><i class="fa fa-calendar" aria-hidden="true"></i>24 Aug 2025 </div>
                <div style="display:table;padding-bottom:30px;">
                    <table border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                            <td align="center" style="padding-right:20px; font-size:12px;">
                                <div style="font-size:14px; font-weight:700; color:#000; margin-bottom:3px;">12:00 AM</div>Langkawi (LGK)
                            </td>
                            <td align="center" style="width:100px;">
                                <div style="text-align:center; font-size:11px; color:#666666;padding-bottom: 4px;">1h 10m |Non Stop</div>
                                <div style="font-size:0px; border-top:2px solid #ddd; position:relative;"><i class="fa fa-plane" aria-hidden="true" style="position: absolute; font-size: 18px; transform: rotate(45deg); top: -9px; left: 40%;"></i></div>
                            </td>
                            <td align="center" style="padding-left:20px;font-size:12px;">
                                <div style="font-size:14px; font-weight:700; color:#000; margin-bottom:3px;">11:59 PM</div>Kuala Lumpur (KUL)
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="desc">
                    Baggage Rules Cabin Check-in
                    Adult 7-10 kg 0Kg
                </div>
            </div>
            <div class="clear"></div>
        </div>
        <!-- end section1 Flight -->
        <!-- section1 Activity -->
    </div>

    <div class="pdf_wrapper dayHead">
        <div class="around-padding borderNone">
            <div style="font-weight:bold;">
                <div style="width:100%;font-size:32px;color:#000;line-height:1.1;margin-top:5px;">Day 5 <div style="    float: right;font-size: 20px; font-weight: bold; color: #000; line-height: 1.1; vertical-align: bottom; text-align: right;">Mon, 25 Aug 2025</div>
                </div>

            </div>
        </div>
    </div>
    <!-- heading end -->
    <div class="pdf_wrapper">

        <div class="dayDetails around-padding">
            <h3>Aquaria KLCC followed by free day at leisure</h3>
            <p>Aquaria KLCC is a state of the art located in the heart of the city, beneath the Kuala Lumpur City Centre and a stone's throw from the iconic Twin Towers. An amazing showcase of 5,000 land bound and aquatic creature exhibits spread over a a sprawling 60,000sqft</p>
        </div>

        <!-- section1 Activity -->

        <div class="img-desc around-padding">
            <h2>Activity</h2>
            <div class="img-box">
                <div class="image">
                    <img src="http://localhost:8081/project/I2ACrm/staging/package_image/Aquaria_KLCC1708514330.jpg" width="200">
                </div>
            </div>
            <div class="desc-box">
                <h3>KLCC Aquaria Tour</h3>
                <div class="check-in"><i class="fa fa-calendar" aria-hidden="true"></i>25 Aug 2025</div>
                <div class="desc">
                </div>
            </div>
            <div class="clear"></div>
        </div>
        <!-- end section1 Activity -->
    </div>

    <div class="pdf_wrapper dayHead">
        <div class="around-padding borderNone">
            <div style="font-weight:bold;">
                <div style="width:100%;font-size:32px;color:#000;line-height:1.1;margin-top:5px;">Day 6 <div style="    float: right;font-size: 20px; font-weight: bold; color: #000; line-height: 1.1; vertical-align: bottom; text-align: right;">Tue, 26 Aug 2025</div>
                </div>

            </div>
        </div>
    </div>
    <!-- heading end -->
    <div class="pdf_wrapper">

        <div class="dayDetails around-padding">
            <h3>Departure from Kuala Lumpur (PVT)</h3>
            <p>Today after breakfast, check out from the hotel and get transferred to the airport to board your return flight to India. Tour ends with ever lasting memories.</p>
        </div>


        <!-- section1 Activity -->



        <!-- section1 Activity -->

        <div class="img-desc around-padding">

            <h2>Transportation</h2>
            <div class="img-box">
                <div class="image">
                    <img src="http://localhost:8081/project/I2ACrm/staging/package_image/rental_transport1703675300.png" width="200">
                </div>
            </div>
            <div class="desc-box">
                <h3>Kuala Lumpur Hotel to Airport</h3>
                <div class="check-in"><i class="fa fa-calendar" aria-hidden="true"></i> 26 Aug 2025</div>
                <div class="desc">
                </div>
            </div>
            <div class="clear"></div>
        </div>
        <!-- end section1 Activity -->


    </div>


    </table>


    <div style="page-break-before: always;"></div>
    <table width="816px" cellspacing="0" cellpadding="0" border="0" style="background:#fff;font-family:sans-serif;font-size:14px;line-height:1.7;color:#000;">
        <tbody>
            <tr>
                <td>
                    <table width="100%" cellspacing="0" cellpadding="0" border="0" style="min-width:100%;padding-right:30px;">
                        <tbody>
                            <tr>
                                <td style="background:url(https://www.deltaskyair.com/images/sideCircle1.png) no-repeat top left;background-size:250px 121px;padding:30px 0 30px 30px;font-weight:bold;font-size:36px;color:#6cc072;">Policy</td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>

    <div class="pdf_wrapper around-padding">
        <p style="font-weight:bold;font-size:24px;color:#6cc072;display:block;margin:0;padding:0 0 5px;">Inclusions & Exclusions</p>
        <div style="margin-bottom:10px;">
            <p><span style="color: #222222;"><strong>Inclusions:</strong>&nbsp;</span></p>
            <ul>
                <li><span style="color: #222222;">Room stay on Double sharing basis</span></li>
                <li><span style="color: #222222;">Breakfast on all days except Day 1.</span></li>
                <li><span style="color: #222222;">All Tours and Transfers on S.I.C or Private basis as mentioned</span></li>
                <li><span style="color: #222222;">5% GST Included</span></li>
                <li><span style="color: #222222;">5% TCS Included</span></li>
                <li><span style="color: #222222;">Flights Domestic flights&nbsp; Included</span></li>
                <li><span style="color: #222222;">Accomodation Included</span></li>
                <li><span style="color: #222222;">Activity Entrance Tickets Included.</span></li>
            </ul>
            <p><span style="color: #222222;"><strong>Exclusions:</strong>&nbsp;</span></p>
            <ul>
                <li><span style="color: #222222;">Any other services or meals which are not mentioned in the above "Includes" section.</span></li>
                <li><span style="color: #222222;">Lunch and Dinner unless specified</span></li>
                <li><span style="color: #222222;">Early Check-in/Check-Out (Unless Specified)</span></li>
                <li>Island fees directly payable at spot.</li>
                <li>Tourism Tax Directly Payable At Hotel (If Applicable or Mandatory From Country)</li>
                <li><span style="color: #222222;">Expense of personal nature such as mineral water, laundry, telephones, beverages etc.</span></li>
                <li><span style="color: #222222;">Any tips to the hotel or tour organisers orr guide</span></li>
                <li><span style="color: #222222;">Camera Charges if any. (Depends upon the Sizes of the Lens)</span></li>
            </ul>
        </div>
        <p style="font-weight:bold;font-size:24px;color:#6cc072;display:block;margin:0;padding:0 0 5px;">Payment Policy & Our Scope of Services</p>
        <div style="margin-bottom:10px;">
            <ul>
                <li><strong>Account Name: I2A Technologies Private Limited<br />
                        Account Number: 114505002013<br />
                        Bank Name: ICICI Bank Ltd<br />
                        IFSC Code: ICIC0001145</strong></li>
            </ul>

            <p><strong><span style="background-color:#ffff00">All payments to be made in Current Account only. We do not accept cash collections or any other account payments.</span></strong></p>
        </div>
        <p style="font-weight:bold;font-size:24px;color:#6cc072;display:block;margin:0;padding:0 0 5px;">Useful Tips Before Booking</p>
        <div style="margin-bottom:10px;">
            <ul>
                <li>If your flights involve a combination of different airlines, you may have to collect your luggage on arrival at the connecting hub and register it again while checking in for the return journey to your origin.</li>
                <li>For queries regarding cancellations and refunds, please refer to our Cancellation Policy.</li>
                <li>Vehicle as per the current availability</li>
                <li>Disputes, if any, shall be subject to the exclusive jurisdiction of the courts in Gurgaon- Haryana</li>
                <li>We reserve the right to issue a full refund in case we believe that we are unable to fulfil the services for any technical reasons.</li>
            </ul>
        </div>
        <p style="font-weight:bold;font-size:24px;color:#6cc072;display:block;margin:0;padding:0 0 5px;">Cancellation Policy & Airline Cancellation Policy</p>
        <div style="margin-bottom:10px;">
            <ul style="list-style-type:square">
                <li>Date of booking to 30 days before travel the cancellation charges will be 25% of the tour cost</li>
                <li>30 to 15 days before travel - cancellation charges will be 50% of the tour cost</li>
                <li>15 to 7 days before travel - cancellation charges will be 75% of the tour cost</li>
                <li>0 to 7 days before travel - cancellation charges will be 100% of the tour cost. No refund shall be given</li>
                <li>Please Note: Cancellation policy is subject to change. It depends on the hotel policy.</li>
                <li>In peak season (example: long weekends, festival season, summer vacation etc.) most of the hotels charge 100% cancellation</li>
            </ul>

            <h3><strong>Airline Cancellation Policy:</strong></h3>

            <ul style="list-style-type:square">
                <li>Your flights are non-refundable. In the event of cancellation, you will not get any refund for flights.</li>
            </ul>
        </div>
    </div>
    <div style="page-break-before: always;"></div>
    <!--  style="page-break-before:always;" -->
    <table width="816px" cellspacing="0" cellpadding="0" border="0" style="background:#fff;font-family:sans-serif;font-size:14px;line-height:1.7;color:#000;">
        <tbody>
            <tr>
                <td>
                    <table width="100%" cellspacing="0" cellpadding="0" border="0" style="min-width:100%;padding-right:30px;">
                        <tbody>
                            <tr>
                                <td style="background:url(https://www.deltaskyair.com/images/sideCircle1.png) no-repeat top left;background-size:250px 121px;padding:30px 0 30px 30px;font-weight:bold;font-size:36px;color:#6cc072;">Get in touch</td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table width="100%" cellspacing="0" cellpadding="0" border="0" style="min-width:100%;padding:0 30px;">
                        <tbody>
                            <tr>
                                <td style="height:20px;"></td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="100%" cellspacing="0" cellpadding="0" border="0" style="min-width:100%;background:#eefaf0;border-radius:10px;padding:30px;">
                                        <tbody>
                                            <tr>
                                                <td style="padding-right:30px;line-height:1.3;">
                                                    <i style="display:block;font-size:18px;font-weight:bold;">Curated by</i>
                                                    <b style="display:block;font-size:30px;font-weight:bold;">trekhops.in</b>
                                                </td>
                                                <td style="border-left:2px solid #ccc;padding-left:30px;font-weight:bold;color:#666;">
                                                    <span style="display:block;">
                                                        Call:&nbsp; <b style="display:inline-block;color:#333;"> 9871148759</b>
                                                    </span>
                                                    <span style="display:block;">
                                                        Email:&nbsp; <b style="display:inline-block;color:#333;">holidays@trekhops.in</b>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="height:20px;"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="color:#666;font-size:18px;vertical-align: middle;">
                                                    <span style="vertical-align: middle;display: inline;"></span>
                                                    <b style="display:inline;color:#333;vertical-align: middle;"></b>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td style="height:20px;"></td>
                            </tr>
                            <tr>
                                <td style="border:none;background:#eefaf0;border-radius:10px;padding:30px 30px 25px;color:#666;">This is an initial quote based on our most popular holiday package to your chosen destination. The pricing is indicative and can change depending on hotels etc. chosen. Once your Travel Expert gets in touch with you, feel free to ask for any customisation in this itinerary or have a fresh itinerary designed, as per your preference. When you are making the booking, please do check that all the selected package inclusions are showing on the package review page and confirm that all elements including flights, hotels and sightseeing are exactly as finalised by you.</td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>
