<!DOCTYPE html>

<!-- <html lang="el"> -->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Internal Indication Report</title>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="../../resources/js/html2canvas.js"></script>
    <script src="../../resources/js/html2canvas.min.js"></script>
    <script src="../../resources/js/jspdf.js"></script>
    


</head>
<body style="height: 100%; width: 100%;">

<div class="WordSection1" style=" height: 850px;">
    <div style="padding:3.6pt 7.2pt 3.6pt 7.2pt;">
        <p style='text-align: right; margin-top:0in;margin-bottom:8.0pt;margin-left:0in;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'>
            <span style='font-size:11px;line-height:107%font-family:"OneShinhanLight"sans-serif'>
                Ref: <strong>IAC-23-000009</strong>
            </span>
        </p>
    </div>

    <p class=MsoNormal align = center style='text-align:center'>
        <u>
            <span style='font-size:14.0pt;line-height:107%;font-family:"OneShinhan Bold",sans-serif'>Internal Appraisal Certificate</span>
        </u>
    </p>

    <div align = center>
        <p class=MsoListParagraphCxSpFirst style='margin-top:0in; margin-bottom:8.0pt; margin-left:0in'>
            <span style='font-size:8.0pt; line-height:107%; font-family:"OneShinhan Light",sans-serif'>
                Held Under Certificate of Real Estate Ownership No. PP 60008 (7/23/2018)
            </span> 
    </div>
    <div align = center>
        <table  class=MsoTableGrid border=1 cellspacing=0 cellpadding=0 style='width:527.25pt;border-collapse:collapse;border:none'>
            <tbody>
                <tr>
                    <td style="width: 134.45pt;border: 1pt solid windowtext;background: rgb(156, 194, 229);padding: 0in 5.4pt;vertical-align: top;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <span style='font-size:12px;font-family:"OneShinhan Light",sans-serif;color:black;'>
                                Under Legal Interest of
                            </span>
                        </p>
                    </td>
                    <td style="width: 112.6pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0in 5.4pt;vertical-align: top;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <span style='font-size:11px;font-family:"OneShinhan Light",sans-serif;'>
                                : Mr. Sel Samet and Mrs. Vorn Kimly
                            </span>
                        </p>
                    </td>
                    <!-- <td rowspan="12">Testing Image Side</td> -->
                    <td rowspan="12" style="width: 155.5pt; border: solid windowtext 1pt; padding: 0in 0in 0in 0in;">
                        <!-- <p style='margin-top:0in;margin-right:0in;margin-bottom:8.0pt;margin-left:0in;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'>&nbsp;
                        </p> -->
                        <img src="{{ storage_path('app/public/images/Borey_Infront_of.jpg') }}" style="width: 100%;">
                    </td>
                </tr>
                <tr>
                    <td style="width: 134.45pt;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-left: 1pt solid windowtext;border-image: initial;border-top: none;background: rgb(156, 194, 229);padding: 0in 5.4pt;vertical-align: top;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <span style='font-size:12px;font-family:"OneShinhan Light",sans-serif;color:black;'>
                                Customer Name
                            </span>
                        </p>
                    </td>
                    <td style="width: 212.6pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0in 5.4pt;vertical-align: top;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <span style='font-size:11px;font-family:"OneShinhan Light",sans-serif;'>
                                : Mr. Sel Samet and Mrs. Vorn Kimly&nbsp;
                            </span>
                        </p>
                    </td>
                    <!-- <td style="border:none;padding:0in 0in 0in 0in;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:8.0pt;margin-left:0in;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'>&nbsp;
                        </p>
                    </td> -->
                </tr>
                <tr>
                    <td style="width: 134.45pt;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-left: 1pt solid windowtext;border-image: initial;border-top: none;background: rgb(156, 194, 229);padding: 0in 5.4pt;vertical-align: top;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <span style='font-size:12px;font-family:"OneShinhan Light",sans-serif;color:black;'>
                                Customer CIF No.
                            </span>
                        </p>
                    </td>
                    <td style="width: 212.6pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0in 5.4pt;vertical-align: top;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <span style='font-size:11px;font-family:"OneShinhan Light",sans-serif;'>
                                : <strong>2010559741</strong>
                            </span>
                        </p>
                    </td>
                    <!-- <td style="border:none;padding:0in 0in 0in 0in;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:8.0pt;margin-left:0in;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'>&nbsp;
                        </p>
                    </td> -->
                </tr>
                <tr>
                    <td style="width: 134.45pt;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-left: 1pt solid windowtext;border-image: initial;border-top: none;background: rgb(156, 194, 229);padding: 0in 5.4pt;vertical-align: top;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <span style='font-size:12px;font-family:"OneShinhan Light",sans-serif;color:black;'>Branch Name</span>
                        </p>
                    </td>
                    <td style="width: 212.6pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0in 5.4pt;vertical-align: top;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <span style='font-size:11px;font-family:"OneShinhan Light",sans-serif;'>
                                : Chbar Ampov
                            </span>
                        </p>
                    </td>
                    <!-- <td style="border:none;padding:0in 0in 0in 0in;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:8.0pt;margin-left:0in;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'>&nbsp;
                        </p>
                    </td> -->
                </tr>
                <tr>
                    <td style="width: 134.45pt;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-left: 1pt solid windowtext;border-image: initial;border-top: none;background: rgb(156, 194, 229);padding: 0in 5.4pt;vertical-align: top;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <span style='font-size:12px;font-family:"OneShinhan Light",sans-serif;color:black;'>
                                RM Name
                            </span>
                        </p>
                    </td>
                    <td style="width: 212.6pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0in 5.4pt;vertical-align: top;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <span style='font-size:11px;font-family:"OneShinhan Light",sans-serif;'>
                                : Mr. Pream Srann&nbsp;
                            </span>
                        </p>
                    </td>
                    <!-- <td style="border:none;padding:0in 0in 0in 0in;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:8.0pt;margin-left:0in;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'>&nbsp;
                        </p>
                    </td> -->
                </tr>
                <tr>
                    <td style="width: 134.45pt;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-left: 1pt solid windowtext;border-image: initial;border-top: none;background: rgb(156, 194, 229);padding: 0in 5.4pt;vertical-align: top;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <span style='font-size:12px;font-family:"OneShinhan Light",sans-serif;color:black;'>
                                Telephone
                            </span>
                        </p>
                    </td>
                    <td style="width: 212.6pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0in 5.4pt;vertical-align: top;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <span style='font-size:11px;font-family:"OneShinhan Light",sans-serif;'>
                                : 096 321 23 11
                            </span>
                        </p>
                    </td>
                    <!-- <td style="border:none;padding:0in 0in 0in 0in;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:8.0pt;margin-left:0in;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'>&nbsp;
                        </p>
                    </td> -->
                </tr>
                <tr>
                    <td style="width: 134.45pt;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-left: 1pt solid windowtext;border-image: initial;border-top: none;background: rgb(156, 194, 229);padding: 0in 5.4pt;vertical-align: top;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <span style='font-size:12px;font-family:"OneShinhan Light",sans-serif;color:black;'>
                                Requested Date
                            </span>
                        </p>
                    </td>
                    <td style="width: 212.6pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0in 5.4pt;vertical-align: top;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <span style='font-size:11px;font-family:"OneShinhan Light",sans-serif;'>
                                : January 13, 2023
                            </span>
                        </p>
                    </td>
                    <!-- <td style="border:none;padding:0in 0in 0in 0in;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:8.0pt;margin-left:0in;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'>&nbsp;
                        </p>
                    </td> -->
                </tr>
                <tr>
                    <td style="width: 134.45pt;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-left: 1pt solid windowtext;border-image: initial;border-top: none;background: rgb(156, 194, 229);padding: 0in 5.4pt;vertical-align: top;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <span style='font-size:12px;font-family:"OneShinhan Light",sans-serif;color:black;'>
                                Report Date
                            </span>
                        </p>
                    </td>
                    <td style="width: 212.6pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0in 5.4pt;vertical-align: top;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <span style='font-size:11px;font-family:"OneShinhan Light",sans-serif;'>
                                : January 13, 2023
                            </span>
                        </p>
                    </td>
                    <!-- <td style="border:none;padding:0in 0in 0in 0in;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:8.0pt;margin-left:0in;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'>&nbsp;
                        </p>
                    </td> -->
                </tr>
                <tr>
                    <td style="width: 134.45pt;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-left: 1pt solid windowtext;border-image: initial;border-top: none;background: rgb(156, 194, 229);padding: 0in 5.4pt;vertical-align: top;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <span style='font-size:12px;font-family:"OneShinhan Light",sans-serif;color:black;'>
                                Land Area
                            </span>
                        </p>
                    </td>
                    <td style="width: 212.6pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0in 5.4pt;vertical-align: top;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <span style='font-size:11px;font-family:"OneShinhan Light",sans-serif;'>
                                : 55.00 Sq. m&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;(By Title Deed)
                            </span>
                        </p>
                    </td>
                    <!-- <td style="border:none;padding:0in 0in 0in 0in;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:8.0pt;margin-left:0in;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'>&nbsp;
                        </p>
                    </td> -->
                </tr>
                <tr>
                    <td style="width: 134.45pt;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-left: 1pt solid windowtext;border-image: initial;border-top: none;background: rgb(156, 194, 229);padding: 0in 5.4pt;vertical-align: top;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <span style='font-size:12px;font-family:"OneShinhan Light",sans-serif;color:black;'>
                            Land Area by Measurement
                            </span>
                        </p>
                    </td>
                    <td style="width: 212.6pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0in 5.4pt;vertical-align: top;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <span style='font-size:11px;font-family:"OneShinhan Light",sans-serif;'>
                                : 55.35 Sq. m &nbsp; &nbsp; &nbsp; &nbsp;(Actual Site Measurement)
                            </span>
                        </p>
                    </td>
                    <!-- <td style="border:none;padding:0in 0in 0in 0in;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:8.0pt;margin-left:0in;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'>&nbsp;
                        </p>
                    </td> -->
                </tr>
                <tr>
                    <td style="width: 134.45pt;border-right: 1pt solid windowtext;border-bottom: 0pt solid windowtext;border-left: 1pt solid windowtext;border-image: initial;border-top: none;background: rgb(156, 194, 229);padding: 0in 5.4pt;vertical-align: top;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <span style='font-size:12px;font-family:"OneShinhan Light",sans-serif;color:black;'>
                                Build Up Area
                            </span>
                        </p>
                    </td>
                    <td style="width: 212.6pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0in 5.4pt;vertical-align: top;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <span style='font-size:11px;font-family:"OneShinhan Light",sans-serif;'>
                                : 77.90 Sq. m &nbsp; &nbsp; &nbsp; &nbsp;(Actual Site Measurement)
                            </span>
                        </p>
                    </td>
                    <!-- <td style="border:none;border-bottom:solid windowtext 1.0pt;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:8.0pt;margin-left:0in;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'>&nbsp;
                        </p>
                    </td> -->
                </tr>
                <tr>
                    <td style="width: 134.45pt; border: 1pt solid windowtext;background: rgb(156, 194, 229);padding: 0in 5.4pt;vertical-align: top;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <span style='font-size:12px;font-family:"OneShinhan Light",sans-serif;color:black;'>
                                Under Test New Border
                            </span>
                        </p>
                    </td>
                    <td style="width: 212.6pt;border-top: none;border-left: none;border-bottom: 0pt solid windowtext;border-right: 1pt solid windowtext;padding: 0in 5.4pt;vertical-align: top;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <span style='font-size:11px;font-family:"OneShinhan Light",sans-serif;'>
                                : 77.90 Sq. m &nbsp; &nbsp; &nbsp; &nbsp;(Actual Site Measurement)
                            </span>
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>

        <!-- End make space for image -->

        <table  class=MsoTableGrid border=1 cellspacing=0 cellpadding=0 style='width:527.25pt; border-collapse:collapse;'>
            <tbody>
                <tr>
                    <td style="width: 134.45pt;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-left: 1pt solid windowtext;border-image: initial;border-top: none;background: rgb(156, 194, 229);padding: 0in 5.4pt;vertical-align: top;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <span style='font-size:12px;font-family:"OneShinhan Light",sans-serif;color:black;'>
                                Address of the Property
                            </span>
                        </p>
                    </td>
                    <td colspan="2" style="width: 375.6pt; border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0in 5.4pt;vertical-align: top;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <span style='font-size:11px;font-family:"OneShinhan Light",sans-serif;'>
                                : Borey Grand Park City, #6, Street F09 Toul Kei Village, Sangkat Phleung Chheh Roteh, Khan Pur Senchey, Phnom Penh.
                            </span>
                        </p>

                        <!-- <p style='margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <span style='font-size:11px;font-family:"OneShinhan Light",sans-serif;'>
                                &nbsp; Pur Senchey, Phnom Penh.
                            </span>
                        </p> -->
                    </td>
                </tr>
                <tr>
                    <td style="width: 134.45pt;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-left: 1pt solid windowtext;border-image: initial;border-top: none;background: rgb(156, 194, 229);padding: 0in 5.4pt;vertical-align: top;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <span style='font-size:12px;font-family:"OneShinhan Light",sans-serif;color:black;'>
                                Geo Code
                            </span>
                        </p>
                    </td>
                    <td colspan="2" style="width: 375.6pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0in 5.4pt;vertical-align: top;">
                        <h2 style='margin-top:3.0pt;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:17px;font-family:"Calibri Light",sans-serif;color:#2E74B5;font-weight:normal;background:white;vertical-align:  baseline;'>
                            <span style='font-size:11px;font-family:"OneShinhan Light",sans-serif;'>
                                11.505869,104.814881
                            </span>
                        </h2>
                    </td>
                </tr>
            </tbody>
        </table>

        <br>

        <table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0 style='width:527.25pt;border-collapse:collapse;border:none'>
            <tbody>
                <tr>
                    <td style="width:50pt; border:solid windowtext 1.0pt; background:#9CC2E5; padding:0in 5.4pt 0in 5.4pt; height:50pt;">
                        <p style='margin-top:0in; margin-right:0in; margin-bottom:0in; margin-left:0in; line-height:normal; font-size:15px; font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong>
                                <span style='font-size:11px;font-family:"OneShinhan Light",sans-serif;color:black;'>
                                    Strength
                                </span>
                            </strong>
                        </p>
                    </td>
                    <td style="width:150pt;border-top:solid windowtext 1.0pt;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:50pt;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <span style='font-size:11px;font-family:   "OneShinhan Light",sans-serif;'>
                                - Property registered with a hard title deed,
                            </span>
                            <br>
                            <span style='font-size:11px;font-family:   "OneShinhan Light",sans-serif;'>
                                - It is in the area of high population density and suitable for running a business,
                            </span>
                        </p>
                    </td>
                    <td style="width:150pt;border-top:solid windowtext 1.0pt;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:50pt;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <span style='font-size:11px;font-family:   "OneShinhan Light",sans-serif;'>
                                - Good access road &amp; generate income from
                            </span>
                        </p>
                    </td>
                    <td style="width:50pt;border:solid windowtext 1.0pt;border-left:none;background:#9CC2E5;padding:0in 5.4pt 0in 5.4pt;height:50pt;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong>
                                <span style='font-size:11px;font-family:"OneShinhan Light",sans-serif;color:black;'>
                                    Opportunity
                                </span>
                            </strong>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:50pt;border:solid windowtext 1.0pt;border-top:none;background:#9CC2E5;padding:0in 5.4pt 0in 5.4pt;height:50pt;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong>
                                <span style='font-size:11px;font-family:"OneShinhan Light",sans-serif;color:black;'>
                                    Weakness
                                </span>
                            </strong>
                        </p>
                    </td>
                    <td style="width:150pt;border-top:none;border-left:none;border-bottom:1pt solid windowtext ;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:50pt;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <span style='font-size:11px;font-family:   "OneShinhan Light",sans-serif;'>
                                - Limited parking space,
                            </span>
                        </p>
                    </td>
                    <td style="width:150pt;border-top:none;border-left:none;border-bottom:1pt solid windowtext;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:50pt;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <span style='font-size:11px;font-family:   "OneShinhan Light",sans-serif;'>
                                - Real estate market fluctuation.
                            </span>
                        </p>
                    </td>
                    <td style="width:50pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;background:#9CC2E5;padding:0in 5.4pt 0in 5.4pt;height:50pt;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong>
                                <span style='font-size:11px;font-family:"OneShinhan Light",sans-serif;color:black;'>
                                    Threat
                                </span>
                            </strong>
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>

        <br>
        <table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0 style='width:527.25pt;border-collapse:collapse;border:none'>
            <tbody>
                <tr>
                    <td colspan="2" style='color:black; font-size:12px; font-weight:700; font-style:normal; text-decoration:none; font-family:"OneShinhan Light", sans-serif; text-align:center; vertical-align:bottom; border:.5pt solid windowtext; background:#9BC2E6; width:100pt;'>Description</td>
                    <td style='color:black; font-size:12px; font-weight:700; font-style:normal; text-decoration:none; font-family:"OneShinhan Light", sans-serif; text-align:center; vertical-align:bottom; border:.5pt solid windowtext; background:#9BC2E6; width:70pt;'>Building Age</td>
                    <td style='color:black; font-size:12px; font-weight:700; font-style:normal; text-decoration:none; font-family:"OneShinhan Light", sans-serif; text-align:center; vertical-align:bottom; border:.5pt solid windowtext; background:#9BC2E6; width:80pt;'>Size</td>
                    <td style='color:black; font-size:12px; font-weight:700; font-style:normal; text-decoration:none; font-family:"OneShinhan Light", sans-serif; text-align:center; vertical-align:bottom; border:.5pt solid windowtext; background:#9BC2E6; width:90pt;'>Building New Cost</td>
                    <td style='color:black; font-size:12px; font-weight:700; font-style:normal; text-decoration:none; font-family:"OneShinhan Light", sans-serif; text-align:center; vertical-align:bottom; border:.5pt solid windowtext; background:#9BC2E6; width:80pt;'>Value per Sqm</td>
                    <td style='color:black; font-size:12px; font-weight:700; font-style:normal; text-decoration:none; font-family:"OneShinhan Light", sans-serif; text-align:center; vertical-align:bottom; border:.5pt solid windowtext; background:#9BC2E6; width:90pt;'>Total Value</td>
                </tr>
                <tr>
                    <td style='color:black;font-size:12px;font-weight:400;font-style:normal;text-decoration:none;font-family:"OneShinhan Light", sans-serif;text-align:left;vertical-align:bottom;border:.5pt solid windowtext;height:14.4pt;border-top:none;width:20pt;'>1</td>
                    <td style='color:black;font-size:12px;font-weight:400;font-style:normal;text-decoration:none;font-family:"OneShinhan Light", sans-serif;text-align:left;vertical-align:bottom;border:.5pt solid windowtext;border-top:none;border-left:none;width:80pt;'>Land</td>
                    <td style='color:black;font-size:12px;font-weight:400;font-style:normal;text-decoration:none;font-family:"OneShinhan Light", sans-serif;text-align:left;vertical-align:bottom;border:.5pt solid windowtext;border-top:none;border-left:none;width:70pt;'></td>
                    <td style='color:black;font-size:12px;font-weight:400;font-style:normal;text-decoration:none;font-family:"OneShinhan Light", sans-serif;text-align:general;vertical-align:bottom;border:.5pt solid windowtext;text-align:left;border-top:none;border-left:none;width:80pt;'> 72.00</td>
                    <td style='color:black;font-size:12px;font-weight:400;font-style:normal;text-decoration:none;font-family:"OneShinhan Light", sans-serif;text-align:general;vertical-align:bottom;border:.5pt solid windowtext;text-align:left;border-top:none;border-left:none;width:90pt;'></td>
                    <td style='color:black;font-size:12px;font-weight:400;font-style:normal;text-decoration:none;font-family:"OneShinhan Light", sans-serif;text-align:general;vertical-align:bottom;border:.5pt solid windowtext;text-align:left;border-top:none;border-left:none;width:80pt;'>$ 830.00</td>
                    <td style='color:black;font-size:12px;font-weight:400;font-style:normal;text-decoration:none;font-family:"OneShinhan Light", sans-serif;text-align:general;vertical-align:bottom;border:.5pt solid windowtext;text-align:left;border-top:none;border-left:none;width:90pt;'>$ 59,760.00</td>
                </tr>
                <tr>
                    <td style='color:black;font-size:12px;font-weight:400;font-style:normal;text-decoration:none;font-family:"OneShinhan Light", sans-serif;text-align:left;vertical-align:bottom;border:.5pt solid windowtext;height:14.4pt;border-top:none;width:20pt;'>2</td>
                    <td style='color:black;font-size:12px;font-weight:400;font-style:normal;text-decoration:none;font-family:"OneShinhan Light", sans-serif;text-align:left;vertical-align:bottom;border:.5pt solid windowtext;border-top:none;border-left:none;width:80pt;'>Land</td>
                    <td style='color:black;font-size:12px;font-weight:400;font-style:normal;text-decoration:none;font-family:"OneShinhan Light", sans-serif;text-align:left;vertical-align:bottom;border:.5pt solid windowtext;border-top:none;border-left:none;width:70pt;'></td>
                    <td style='color:black;font-size:12px;font-weight:400;font-style:normal;text-decoration:none;font-family:"OneShinhan Light", sans-serif;text-align:general;vertical-align:bottom;border:.5pt solid windowtext;text-align:left;border-top:none;border-left:none;width:80pt;'> 72.00</td>
                    <td style='color:black;font-size:12px;font-weight:400;font-style:normal;text-decoration:none;font-family:"OneShinhan Light", sans-serif;text-align:general;vertical-align:bottom;border:.5pt solid windowtext;text-align:left;border-top:none;border-left:none;width:90pt;'></td>
                    <td style='color:black;font-size:12px;font-weight:400;font-style:normal;text-decoration:none;font-family:"OneShinhan Light", sans-serif;text-align:general;vertical-align:bottom;border:.5pt solid windowtext;text-align:left;border-top:none;border-left:none;width:80pt;'>$ 830.00</td>
                    <td style='color:black;font-size:12px;font-weight:400;font-style:normal;text-decoration:none;font-family:"OneShinhan Light", sans-serif;text-align:general;vertical-align:bottom;border:.5pt solid windowtext;text-align:left;border-top:none;border-left:none;width:90pt;'>$ 59,760.00</td>
                </tr>
                <tr>
                    <td style='color:black;font-size:12px;font-weight:400;font-style:normal;text-decoration:none;font-family:"OneShinhan Light", sans-serif;text-align:left;vertical-align:bottom;border:.5pt solid windowtext;height:14.4pt;border-top:none;width:20pt;'>3</td>
                    <td style='color:black;font-size:12px;font-weight:400;font-style:normal;text-decoration:none;font-family:"OneShinhan Light", sans-serif;text-align:left;vertical-align:bottom;border:.5pt solid windowtext;border-top:none;border-left:none;width:80pt;'>Land</td>
                    <td style='color:black;font-size:12px;font-weight:400;font-style:normal;text-decoration:none;font-family:"OneShinhan Light", sans-serif;text-align:left;vertical-align:bottom;border:.5pt solid windowtext;border-top:none;border-left:none;width:70pt;'></td>
                    <td style='color:black;font-size:12px;font-weight:400;font-style:normal;text-decoration:none;font-family:"OneShinhan Light", sans-serif;text-align:general;vertical-align:bottom;border:.5pt solid windowtext;text-align:left;border-top:none;border-left:none;width:80pt;'> 72.00</td>
                    <td style='color:black;font-size:12px;font-weight:400;font-style:normal;text-decoration:none;font-family:"OneShinhan Light", sans-serif;text-align:general;vertical-align:bottom;border:.5pt solid windowtext;text-align:left;border-top:none;border-left:none;width:90pt;'></td>
                    <td style='color:black;font-size:12px;font-weight:400;font-style:normal;text-decoration:none;font-family:"OneShinhan Light", sans-serif;text-align:general;vertical-align:bottom;border:.5pt solid windowtext;text-align:left;border-top:none;border-left:none;width:80pt;'>$ 830.00</td>
                    <td style='color:black;font-size:12px;font-weight:400;font-style:normal;text-decoration:none;font-family:"OneShinhan Light", sans-serif;text-align:general;vertical-align:bottom;border:.5pt solid windowtext;text-align:left;border-top:none;border-left:none;width:90pt;'>$ 59,760.00</td>
                </tr>
            </tbody>
        </table>

        <br>

        <table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0 style='width:527.25pt;border-collapse:collapse;border:none'>
            <tbody>
                <tr>
                    <!-- <td colspan="top" style='color:black;font-size:12px;font-weight:700;font-style:normal;text-decoration:none;font-family:"OneShinhan Light", sans-serif;text-align:center;vertical-align:bottom;border:none;border-top:.5pt solid windowtext;border-right:.5pt solid black;border-bottom:.5pt solid windowtext;border-left:.5pt solid windowtext;height:14.4pt;width:107pt;'>Description</td> -->
                    <td style='width: 527px !important; font-size:12px;font-weight:350;font-style:normal;text-decoration:none;font-family:"OneShinhan Light", sans-serif;text-align:left;vertical-align:bottom;border:.5pt solid windowtext;height:14.4pt;'>Fair Market Value:</td>
                    <!-- border-right:none; -->
                    <td style='color: red; font-size:12px;font-weight:50;font-style:normal;text-decoration:none;font-family:"OneShinhan Light", sans-serif;text-align:left;vertical-align:bottom;border:.5pt solid windowtext;height:14.4pt;border-left:none;'><span style="margin-left: 5px;">$</span> <span style="float: right; margin-right: 5px;">80,588</span></td>
                </tr>
                <tr>
                    <!-- <td colspan="top" style='color:black;font-size:12px;font-weight:700;font-style:normal;text-decoration:none;font-family:"OneShinhan Light", sans-serif;text-align:center;vertical-align:bottom;border:none;border-top:.5pt solid windowtext;border-right:.5pt solid black;border-bottom:.5pt solid windowtext;border-left:.5pt solid windowtext;height:14.4pt;width:107pt;'>Description</td> -->
                    <td style='width: 527px !important; font-size:12px;font-weight:350;font-style:normal;text-decoration:none;font-family:"OneShinhan Light", sans-serif;text-align:left;vertical-align:bottom;border:.5pt solid windowtext;height:14.4pt;'>Fair Market Value:</td>
                    <!-- border-right:none; -->
                    <td style='color: red; font-size:12px;font-weight:50;font-style:normal;text-decoration:none;font-family:"OneShinhan Light", sans-serif;text-align:left;vertical-align:bottom;border:.5pt solid windowtext;height:14.4pt;border-left:none;'><span style="margin-left: 5px;">$</span> <span style="float: right; margin-right: 5px;">80,588</span></td>
                </tr>
                <tr>
                    <!-- <td colspan="top" style='color:black;font-size:12px;font-weight:700;font-style:normal;text-decoration:none;font-family:"OneShinhan Light", sans-serif;text-align:center;vertical-align:bottom;border:none;border-top:.5pt solid windowtext;border-right:.5pt solid black;border-bottom:.5pt solid windowtext;border-left:.5pt solid windowtext;height:14.4pt;width:107pt;'>Description</td> -->
                    <td style='width: 527px !important; font-size:12px;font-weight:350;font-style:normal;text-decoration:none;font-family:"OneShinhan Light", sans-serif;text-align:left;vertical-align:bottom;border:.5pt solid windowtext;height:14.4pt;'>Fair Market Value:</td>
                    <!-- border-right:none; -->
                    <td style='color: red; font-size:12px;font-weight:50;font-style:normal;text-decoration:none;font-family:"OneShinhan Light", sans-serif;text-align:left;vertical-align:bottom;border:.5pt solid windowtext;height:14.4pt;border-left:none;'><span style="margin-left: 5px;">$</span> <span style="float: right; margin-right: 5px;">80,588</span></td>
                </tr>
            </tbody>
        </table>

        <br>

        <table  class=MsoTableGrid border=1 cellspacing=0 cellpadding=0 width=690 style='width:527.25pt; border-collapse:collapse;border:none'>
            <tbody>
                <tr>
                    <td colspan="7" style="width: 509.75pt;border: 1pt solid windowtext;background: rgb(156, 194, 229);padding: 0in 5.4pt;vertical-align: top;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <strong>
                                <span style='font-size:12px;font-family:"OneShinhan Light",sans-serif;color:black;'>
                                    COMPARABLE REFERENCE
                                </span>
                            </strong>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="width: 100pt;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-left: 1pt solid windowtext;border-image: initial;border-top: none;padding: 0in 5.4pt;vertical-align: top;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <span style='font-size:11px;font-family:"OneShinhan Bold",sans-serif;'>
                                CIF No. / Name
                            </span>
                        </p>
                    </td>
                    <td style="width: 80pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0in 5.4pt;vertical-align: top;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <span style='font-size:11px;font-family:"OneShinhan Bold",sans-serif;'>
                                Geo Code
                            </span>
                        </p>
                    </td>
                    <td style="width: 90pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0in 5.4pt;vertical-align: top;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <span style='font-size:11px;font-family:"OneShinhan Bold",sans-serif;'>
                                Distance
                            </span>
                        </p>
                    </td>
                    <td style="width: 50pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0in 5.4pt;vertical-align: top;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <span style='font-size:11px;font-family:"OneShinhan Bold",sans-serif;'>
                                Size
                            </span>
                        </p>
                    </td>
                    <td style="width: 80pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0in 5.4pt;vertical-align: top;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <span style='font-size:11px;font-family:"OneShinhan Bold",sans-serif;'>
                                Value per Sq. m
                            </span>
                        </p>
                    </td>
                    <td style="width: 80pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0in 5.4pt;vertical-align: top;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                            <span style='font-size:11px;font-family:"OneShinhan Bold",sans-serif;'>
                                Total Value
                            </span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 5pt;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-left: 1pt solid windowtext;border-image: initial;border-top: none;padding: 0in 5.4pt;vertical-align: top;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <span style='font-size:11px;font-family:"OneShinhan Light",sans-serif;'>1</span>
                        </p>
                    </td>
                    <td style="width: 50pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0in 5.4pt;vertical-align: top;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <span style='font-size:11px;font-family:"OneShinhan Light",sans-serif;'>2010552911</span>
                        </p>
                    </td>
                    <td style="width: 90pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0in 5.4pt;vertical-align: top;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <span style='font-size:11px;font-family:"OneShinhan Light",sans-serif;'>11.505829, 104.814403</span>
                        </p>
                    </td>
                    <td style="width: 50pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0in 5.4pt;vertical-align: top;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <span style='font-size:11px;font-family:"OneShinhan Light",sans-serif;'>30m to West</span>
                        </p>
                    </td>
                    <td style="width: 40pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0in 5.4pt;vertical-align: top;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:right;'>
                            <span style='font-size:11px;font-family:"OneShinhan Light",sans-serif;'>55.00</span>
                        </p>
                    </td>
                    <td style="width: 50pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0in 5.4pt;vertical-align: top;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:right;'>
                            <span style='font-size:11px;font-family:"OneShinhan Light",sans-serif;'>$ 900.00</span>
                        </p>
                    </td>
                    <td style="width: 50pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0in 5.4pt;vertical-align: top;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:right;'>
                            <span style='font-size:11px;font-family:"OneShinhan Light",sans-serif;'>$ 66,638.00</span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 5pt;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-left: 1pt solid windowtext;border-image: initial;border-top: none;padding: 0in 5.4pt;vertical-align: top;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <span style='font-size:11px;font-family:"OneShinhan Light",sans-serif;'>1</span>
                        </p>
                    </td>
                    <td style="width: 50pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0in 5.4pt;vertical-align: top;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <span style='font-size:11px;font-family:"OneShinhan Light",sans-serif;'>2010552911</span>
                        </p>
                    </td>
                    <td style="width: 90pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0in 5.4pt;vertical-align: top;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <span style='font-size:11px;font-family:"OneShinhan Light",sans-serif;'>11.505829, 104.814403</span>
                        </p>
                    </td>
                    <td style="width: 50pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0in 5.4pt;vertical-align: top;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <span style='font-size:11px;font-family:"OneShinhan Light",sans-serif;'>30m to West</span>
                        </p>
                    </td>
                    <td style="width: 40pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0in 5.4pt;vertical-align: top;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:right;'>
                            <span style='font-size:11px;font-family:"OneShinhan Light",sans-serif;'>55.00</span>
                        </p>
                    </td>
                    <td style="width: 50pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0in 5.4pt;vertical-align: top;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:right;'>
                            <span style='font-size:11px;font-family:"OneShinhan Light",sans-serif;'>$ 900.00</span>
                        </p>
                    </td>
                    <td style="width: 50pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0in 5.4pt;vertical-align: top;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:right;'>
                            <span style='font-size:11px;font-family:"OneShinhan Light",sans-serif;'>$ 66,638.00</span>
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>


            <table  class=MsoTableGrid border=1 cellspacing=0 cellpadding=0 width=690 style='width:527.25pt; border-collapse:collapse;border:none'>
                <tr>
                    <td style="width:50pt; border:0; padding:0in 5.4pt 0in 5.4pt;">
                        <p style='margin-top:0in; margin-right:0in; margin-bottom:0in; margin-left:0in; line-height:normal; font-size:15px; font-family:"Calibri",sans-serif;text-align:left;'>
                            <strong>
                                <span style='font-size:11px;font-family:"OneShinhan Light",sans-serif;color:black;'>
                                    Prepared By:
                                </span>
                            </strong>
                        </p>
                    </td>
                    <td style="width:50pt;border:0;padding:0in 5.4pt 0in 5.4pt;text-align:center;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <strong>
                                <span style='font-size:11px;font-family:   "OneShinhan Light",sans-serif;'>
                                    Reviewed By:
                                </span>
                            </strong>
                        </p>
                    </td>
                    <td style="width:50pt;border:0; padding:0in 5.4pt 0in 5.4pt;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:right;'>
                            <strong>
                                <span style='font-size:11px;font-family:"OneShinhan Light",sans-serif;color:black;'>
                                    Approved By:
                                </span>
                            </strong>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:50pt; border:0; padding:0in 5.4pt 0in 5.4pt; height:50pt;">
                        <p style='margin-top:0in; margin-right:0in; margin-bottom:0in; margin-left:0in; line-height:normal; font-size:15px; font-family:"Calibri",sans-serif;text-align:left;'>
                            <span style='font-size:11px;font-family:"OneShinhan Light",sans-serif;color:black;'>
                                Ms. Nhor Sreynet
                            </span>
                            <!-- <br>
                            <span style='font-size:11px;font-family:"OneShinhan Light",sans-serif;color:black;'>
                                Ms. Nhor Sreynet
                            </span> -->
                        </p>
                    </td>
                    <td style="width:50pt;border:0;padding:0in 5.4pt 0in 5.4pt;height:50pt;text-align:center;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <span style='font-size:11px;font-family:   "OneShinhan Light",sans-serif;'>
                                Mr. Kheng Nith Testing
                            </span>
                        </p>
                    </td>
                    <td style="width:50pt;border:0;padding:0in 5.4pt 0in 5.4pt;height:50pt;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:right;'>
                            <span style='font-size:11px;font-family:"OneShinhan Light",sans-serif;color:black;'>
                                Mr. Suong Reaksmey
                            </span>
                        </p>
                    </td>
                </tr>
            </table>

        <!-- <p style='margin-top:0in;margin-right:0in;margin-bottom:8.0pt;margin-left:0in;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'>
            <span style='font-size:11px;line-height:107%;font-family:"OneShinhan Light",sans-serif;'>
                Prepared By: Reviewed By: Approved By:
            </span>
            <span style='font-size:3px;line-height:107%;font-family:"OneShinhan Light",sans-serif;'>
                <br>&nbsp;<br>&nbsp;
            </span>
            <span style='font-size:9px;line-height:107%;font-family:"OneShinhan Light",sans-serif;'>
                <br>&nbsp;
            </span>
            <span style='font-size:11px;line-height:107%;font-family:"OneShinhan Light",sans-serif;'>
                Ms. Nhor Sreynet &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Mr. Kheng Nith &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Mr. Suong Reaksmey
            </span>
        </p> -->
    </div>
</div>

    <a target="_blank" class="btn btn-primary" href="http://localhost/pms/property-management/public/api/pdfappraisal">Export to PDF</a>
</body>
</html>