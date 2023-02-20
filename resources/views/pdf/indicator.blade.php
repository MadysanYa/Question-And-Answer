<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Internal Indication Report</title>
    <!-- <script src="../../js/html2canvas.js"></script>
    <script src="../../js/html2canvas.min.js"></script>
    <script src="../../js/jspdf.js"></script> -->
    <!-- <script src="../../js/QrCode.js"></script> -->

    <style>
        /* Font Definitions */
        @font-face {
            font-family: Wingdings;
            panose-1: 5 0 0 0 0 0 0 0 0 0;
        }

        @font-face {
            font-family: SimSun;
            panose-1: 2 1 6 0 3 1 1 1 1 1;
        }

        @font-face {
            font-family: "Cambria Math";
            panose-1: 2 4 5 3 5 4 6 3 2 4;
        }

        @font-face {
            font-family: Calibri;
            panose-1: 2 15 5 2 2 2 4 3 2 4;
        }

        @font-face {
            font-family: DaunPenh;
            panose-1: 2 0 5 0 0 0 0 2 0 4;
        }

        @font-face {
            font-family: "Segoe UI";
            panose-1: 2 11 5 2 4 2 4 2 2 3;
        }

        @font-face {
            font-family: "OneShinhan Bold";
        }

        @font-face {
            font-family: "OneShinhan Light";
        }

        @font-face {
            font-family: "\@SimSun";
            panose-1: 2 1 6 0 3 1 1 1 1 1;
        }

        @font-face {
            font-family: "\@OneShinhan Bold";
        }

        @font-face {
            font-family: "\@OneShinhan Light";
        }

        /* Style Definitions */
        p.MsoNormal,
        li.MsoNormal,
        div.MsoNormal {
            margin-top: 0in;
            margin-right: 0in;
            margin-bottom: 8.0pt;
            margin-left: 0in;
            line-height: 107%;
            font-size: 11.0pt;
            font-family: "Calibri", sans-serif;
        }

        p.MsoListParagraph,
        li.MsoListParagraph,
        div.MsoListParagraph {
            margin-top: 0in;
            margin-right: 0in;
            margin-bottom: 8.0pt;
            margin-left: .5in;
            line-height: 107%;
            font-size: 11.0pt;
            font-family: "Calibri", sans-serif;
        }

        p.MsoListParagraphCxSpFirst,
        li.MsoListParagraphCxSpFirst,
        div.MsoListParagraphCxSpFirst {
            margin-top: 0in;
            margin-right: 0in;
            margin-bottom: 0in;
            margin-left: .5in;
            line-height: 107%;
            font-size: 11.0pt;
            font-family: "Calibri", sans-serif;
        }

        p.MsoListParagraphCxSpMiddle,
        li.MsoListParagraphCxSpMiddle,
        div.MsoListParagraphCxSpMiddle {
            margin-top: 0in;
            margin-right: 0in;
            margin-bottom: 0in;
            margin-left: .5in;
            line-height: 107%;
            font-size: 11.0pt;
            font-family: "Calibri", sans-serif;
        }

        p.MsoListParagraphCxSpLast,
        li.MsoListParagraphCxSpLast,
        div.MsoListParagraphCxSpLast {
            margin-top: 0in;
            margin-right: 0in;
            margin-bottom: 8.0pt;
            margin-left: .5in;
            line-height: 107%;
            font-size: 11.0pt;
            font-family: "Calibri", sans-serif;
        }

        .MsoChpDefault {
            font-family: "Calibri", sans-serif;
        }

        .MsoPapDefault {
            margin-bottom: 8.0pt;
            line-height: 107%;
        }

        /* #map {
            height: 550px;
            width: 100%;
        } */

        /* Page Definitions */
        @page WordSection1 {
            size: 8.5in 11.0in;
            margin: 28.35pt 49.6pt 42.55pt 45.1pt;
        }

        div.WordSection1 {
            page: WordSection1;
        }

        /* List Definitions */
        ol {
            margin-bottom: 0in;
        }

        ul {
            margin-bottom: 0in;
        }
    </style>
</head>

<body style="height: 100%; width: 100%;">
    <div class="WordSection1" style=" height: 850px;">

        <!-- Logo Shinhan -->
        <div>
            <img src="{{asset('upload/images/Logo.png')}}" style="height: 70px; "/>
        </div>

        <p class=MsoNormal align=center style='text-align:center'>
            <u>
                <span style='font-size:14.0pt;line-height:107%;font-family:"OneShinhan Bold",sans-serif'>INTERNAL INDICATION REPORT</span>
            </u>
        </p>
        <div class="card-body">
        </div>

        <table align=center class=MsoTableGrid border=1 cellspacing=0 cellpadding=0 width=690 style='width:527.25pt; border-collapse:collapse;border:none;'>
            <tr>
                <td style="border:none; width:50pt;">
                    <p style='margin-top:0in; margin-right:0in; margin-bottom:0in; margin-left:0in; line-height:normal; font-size:15px; font-family:"Calibri",sans-serif;text-align:left;'>
                        <span style='font-size:11px;font-family:"OneShinhan Light",sans-serif;color:black;'>
                            Reference No
                        </span>
                        <span style='margin-left: 27px; font-size:11px;font-family:"OneShinhan Light",sans-serif;color:black;'>
                            :
                        </span>
                    </p>
                </td>
                <td style="border:none; padding-left: 25px; width:90pt; text-align:left;">
                    <p style='margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                        <span style='font-size:11px;font-family:   "OneShinhan Light",sans-serif;'>
                            {{ $indicator->property_reference }}
                        </span>
                    </p>
                </td>
                <td style="border:none; width:55pt; padding-left: 20px;">
                    <p style='margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:left;'>
                        <span style='font-size:11px;font-family:"OneShinhan Light",sans-serif;color:black;'>
                            Branch Name
                        </span>
                        <span style='margin-left: 25.5px; font-size:11px;font-family:"OneShinhan Light",sans-serif;color:black;'>
                            :
                        </span>
                    </p>
                </td>
                <td style="border:none; width:50pt; padding:0in 5.4pt 0in 5.4pt;">
                    <p style='margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:left;'>
                        <span style='font-size:11px;font-family:"OneShinhan Light",sans-serif;color:black;'>
                            {{ $indicator->BranchName }}
                        </span>
                    </p>
                </td>
            </tr>
            <tr>
                <td style="border:none; width:50pt;">
                    <p style='margin-top:0in; margin-right:0in; margin-bottom:0in; margin-left:0in; line-height:normal; font-size:15px; font-family:"Calibri",sans-serif;text-align:left;'>
                        <span style='font-size:11px;font-family:"OneShinhan Light",sans-serif;color:black;'>
                            Requested Date
                        </span>
                        <span style='margin-left: 15px; font-size:11px;font-family:"OneShinhan Light",sans-serif;color:black;'>
                            :
                        </span>
                    </p>
                </td>
                <td style="border:none; padding-left: 25px; width:50pt; text-align:left;">
                    <p style='margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                        <span style='font-size:11px;font-family:   "OneShinhan Light",sans-serif;'>
                            {{ $indicator->requested_date }}
                        </span>
                    </p>
                </td>
                <td style="border:none; width:50pt; padding-left: 20px;">
                    <p style='margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:left;'>
                        <span style='font-size:11px;font-family:"OneShinhan Light",sans-serif;color:black;'>
                            Loan Officer
                        </span>
                        <span style='margin-left: 33px; font-size:11px;font-family:"OneShinhan Light",sans-serif;color:black;'>
                            :
                        </span>
                    </p>
                </td>
                <td style="border:none; width:50pt; padding:0in 5.4pt 0in 5.4pt;">
                    <p style='margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:left;'>
                        <span style='font-size:11px;font-family:"OneShinhan Light",sans-serif;color:black;'>
                            {{ $indicator->rm_name }}
                        </span>
                    </p>
                </td>
            </tr>
            <tr>
                <td style="border:none; width:50pt;">
                    <p style='margin-top:0in; margin-right:0in; margin-bottom:0in; margin-left:0in; line-height:normal; font-size:15px; font-family:"Calibri",sans-serif;text-align:left;'>
                        <span style='font-size:11px;font-family:"OneShinhan Light",sans-serif;color:black;'>
                            Report Date
                        </span>
                        <span style='margin-left: 35px; font-size:11px;font-family:"OneShinhan Light",sans-serif;color:black;'>
                            :
                        </span>
                    </p>
                </td>
                <td style="border:none; padding-left: 25px; width:50pt;text-align:left;">
                    <p style='margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                        <span style='font-size:11px;font-family:   "OneShinhan Light",sans-serif;'>
                            {{ $indicator->reported_date }}
                        </span>
                    </p>
                </td>
                <td style="border:none; width:50pt; padding-left: 20px;">
                    <p style='margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:left;'>
                        <span style='font-size:11px;font-family:"OneShinhan Light",sans-serif;color:black;'>
                            Telephone
                        </span>
                        <span style='margin-left: 41.5px; font-size:11px;font-family:"OneShinhan Light",sans-serif;color:black;'>
                            :
                        </span>
                    </p>
                </td>
                <td style="border:none; width:50pt; padding:0in 5.4pt 0in 5.4pt;">
                    <p style='margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:left;'>
                        <span style='font-size:11px;font-family:"OneShinhan Light",sans-serif;color:black;'>
                            {{ $indicator->telephone }}
                        </span>
                    </p>
                </td>
            </tr>
        </table>
        <br>
        <div align=center>
            <table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0 style='width:527.25pt;border-collapse:collapse;border:none'>
                <tr style='height:13.35pt'>
                    <td colspan=6 style='width:527.25pt; border:solid windowtext 1.0pt; background:#0070C0; padding:0in 5.4pt 0in 5.4pt; height:18.45pt'>
                        <p class=MsoNormal align=center style='margin-top:0in;margin-right:-5.75pt; margin-bottom:0in;margin-left:0in;text-align:center;line-height:normal'>
                            <span style='font-size:10.0pt;font-family:"OneShinhan Bold",sans-serif;color:white'>PROPERTY DETAILS</span>
                        </p>
                    </td>
                </tr>
                <tr style='height:13.35pt'>
                    <td colspan=6 style='width:527.25pt; border:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;'>
                        <p class=MsoListParagraphCxSpFirst style='margin-left:0in'>
                            <span style='font-size:8.0pt;line-height:107%;font-family:"OneShinhan Light",sans-serif'>Address: {{ $indicator->FullAddress }}</span>
                        </p>
                    </td>
                </tr>
                <tr style='height:13.35pt'>
                    <td valign=top style='width:100pt; border:solid windowtext 1.0pt; border-top:none;padding:0in 5.4pt 0in 5.4pt;height:13.35pt'>
                        <p class=MsoListParagraphCxSpMiddle style='margin:0in;line-height:normal'>
                            <span style='font-size:8.0pt;font-family:"OneShinhan Light",sans-serif'>
                                Tittle No.
                            </span>
                            <span style='margin-top: 2px; float: right; font-size:8.0pt;font-family:"OneShinhan Light",sans-serif; text-align: right;'>
                                :
                            </span>
                        </p>
                    </td>
                    <td valign=top style='width:140pt; border:solid windowtext 1.0pt; border-left:none;padding:0in 5.4pt 0in 5.4pt'>
                        <p class=MsoListParagraphCxSpMiddle style='margin:0in;line-height:normal'>
                            <span style='font-size:8.0pt;font-family:"OneShinhan Light",sans-serif'>
                                {{ $indicator->land_title_no }}
                            </span>
                        </p>
                    </td>
                    <td valign=top style='width:100pt; border:solid windowtext 1.0pt; border-left:none;padding:0in 5.4pt 0in 5.4pt'>
                        <p class=MsoListParagraphCxSpMiddle style='margin:0in;line-height:normal'>
                            <span style='font-size:8.0pt;font-family:"OneShinhan Light",sans-serif'>
                                Customer Name
                            </span>
                            <span style='margin-top: 2px; float: right; font-size:8.0pt;font-family:"OneShinhan Light",sans-serif; text-align: right;'>
                                :
                            </span>
                        </p>
                    </td>
                    <td colspan=6 style='width:140pt; border:solid windowtext 1.0pt; border-left:none;padding:0in 5.4pt 0in 5.4pt'>
                        <p class=MsoListParagraphCxSpLast style='margin:0in;line-height:normal'>
                            <span style='font-size:8.0pt;font-family:"OneShinhan Light",sans-serif'>
                                {{ $indicator->customer_name }}
                            </span>
                        </p>
                    </td>
                </tr>
                <tr style='height:13.35pt'>
                    <td valign=top style='width:100pt;border:solid windowtext 1.0pt; border-top:none;padding:0in 5.4pt 0in 5.4pt'>
                        <p class=MsoListParagraphCxSpFirst style='margin:0in;line-height:normal'>
                            <span style='font-size:8.0pt;font-family:"OneShinhan Light",sans-serif'>
                                Property Type
                            </span>
                            <span style='margin-top: 2px; float: right; font-size:8.0pt;font-family:"OneShinhan Light",sans-serif; text-align: right;'>
                                :
                            </span>
                        </p>
                    </td>
                    <td valign=top style='width:100pt;border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt'>
                        <p class=MsoListParagraphCxSpMiddle style='margin:0in;line-height:normal'>
                            <span style='font-size:8.0pt;font-family:"OneShinhan Light",sans-serif'>
                                {{ $indicator->PropertyTypeName }}
                            </span>
                        </p>
                    </td>
                    <td valign=top style='width:100pt;border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt'>
                        <p class=MsoListParagraphCxSpMiddle style='margin:0in;line-height:normal'>
                            <span style='font-size:8.0pt;font-family:"OneShinhan Light",sans-serif'>
                                Collateral Owner
                            </span>
                            <span style='margin-top: 2px; float: right; font-size:8.0pt;font-family:"OneShinhan Light",sans-serif; text-align: right;'>
                                :
                            </span>
                        </p>
                    </td>
                    <td colspan=6 style='width:180pt;border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt'>
                        <p class=MsoListParagraphCxSpLast style='margin:0in;line-height:normal'>
                            <span style='font-size:8.0pt;font-family:"OneShinhan Light",sans-serif'>
                                {{ $indicator->collateral_owner }}
                            </span>
                        </p>
                    </td>
                </tr>
                <tr style='height:13.35pt'>
                    <td valign=top style='width:100pt;border:solid windowtext 1.0pt; border-top:none;padding:0in 5.4pt 0in 5.4pt'>
                        <p class=MsoListParagraphCxSpFirst style='margin:0in;line-height:normal'>
                            <span style='font-size:8.0pt;font-family:"OneShinhan Light",sans-serif'>
                                Land Area
                            </span>
                            <span style='margin-top: 2px; float: right; font-size:8.0pt;font-family:"OneShinhan Light",sans-serif; text-align: right;'>
                                :
                            </span>
                        </p>
                    </td>
                    <td valign=top style='width:100pt;border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt'>
                        <p class=MsoListParagraphCxSpMiddle style='margin:0in;line-height:normal'>
                            <span style='font-size:8.0pt;font-family:"OneShinhan Light",sans-serif'>
                                {{ $indicator->LandSizeFormat }}
                            </span>
                        </p>
                    </td>
                    <td valign=top style='width:100pt;border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt'>
                        <p class=MsoListParagraphCxSpMiddle style='margin:0in;line-height:normal'>
                            <span style='font-size:8.0pt;font-family:"OneShinhan Light",sans-serif'>
                                Building Status
                            </span>
                            <span style='margin-top: 2px; float: right; font-size:8.0pt;font-family:"OneShinhan Light",sans-serif; text-align: right;'>
                                :
                            </span>
                        </p>
                    </td>
                    <td colspan=6 style='width:180pt;border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt'>
                        <p class=MsoListParagraphCxSpLast style='margin:0in;line-height:normal'>
                            <span style='font-size:8.0pt;font-family:"OneShinhan Light",sans-serif'>
                                {{ $indicator->building_status }}
                            </span>
                        </p>
                    </td>
                </tr>
                <tr style='height:13.35pt'>
                    <td valign=top style='width:100pt;border:solid windowtext 1.0pt; border-top:none;padding:0in 5.4pt 0in 5.4pt'>
                        <p class=MsoListParagraphCxSpFirst style='margin:0in;line-height:normal'>
                            <span style='font-size:8.0pt;font-family:"OneShinhan Light",sans-serif'>
                                Estimate Build Up Area
                            </span>
                            <span style='margin-top: 2px; float: right; font-size:8.0pt;font-family:"OneShinhan Light",sans-serif; text-align: right;'>
                                :
                            </span>
                        </p>
                    </td>
                    <td valign=top style='width:100pt;border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt'>
                        <p class=MsoListParagraphCxSpMiddle style='margin:0in;line-height:normal'>
                            <span style='font-size:8.0pt;font-family:"OneShinhan Light",sans-serif'>
                                {{ $indicator->BuildingSizeFormat }}
                            </span>
                        </p>
                    </td>
                    <td valign=top style='width:100pt;border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt'>
                        <p class=MsoListParagraphCxSpMiddle style='margin:0in;line-height:normal'>
                            <span style='font-size:8.0pt;font-family:"OneShinhan Light",sans-serif'>
                                Geo Code
                            </span>
                            <span style='margin-top: 2px; float: right; font-size:8.0pt;font-family:"OneShinhan Light",sans-serif; text-align: right;'>
                                :
                            </span>
                        </p>
                    </td>
                    <td colspan=6 style='width:180pt;border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt'>
                        <p class=MsoListParagraphCxSpLast style='margin:0in;line-height:normal'>
                            <span style='font-size:8.0pt;font-family:"OneShinhan Light",sans-serif'>
                                {{ $indicator->GeoCode }}
                            </span>
                        </p>
                    </td>
                </tr>
            </table>

            <div style="position: relative;">
                <div style="position: relative; left: 0px; top: 0px;">
                    <table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0 style='width: 700px !important; border-collapse:collapse;border:none'>
                        <tr>
                            <td style="text-align: center">
                                <img src="{{asset('upload/'.$indicator->front_photo)}}" style="height: 260px; max-width: 350px;">
                            </td>
                            <td style="text-align: center">
                                <img src="{{asset('upload/'.$indicator->title_front_photo)}}" style="height: 260px; max-width: 350px;">
                            </td>
                        </tr>
                    </table>
                </div>
                <div style="position: absolute ; right: 0px; top: 190px;">
                    <img src="{{ $qrImage }}" style="height: 60px; width: 60px; border: 1px solid #0070C0; padding: 5px; background-color: white;"/>
                </div>
            </div>
            <!-- </div> -->
            <br>
            <!-- PROPERTY ADJUSTMENT -->
            <table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0 width=690 style='width:527.25pt; border-collapse:collapse;border:none'>
                <tr style='height:13.35pt'>
                    <td colspan=7 style='width:527.25pt; border:solid windowtext 1.0pt; background:#0070C0;padding:0in 5.4pt 0in 5.4pt;height:18.45pt'>
                        <p class=MsoNormal align=center style='margin-top:0in;margin-right:-5.65pt; margin-bottom:0in;margin-left:0in;text-align:center;line-height:normal'>
                            <span style='font-size:10.0pt;font-family:"OneShinhan Bold",sans-serif;color:white'>PROPERTY ADJUSTMENT</span>
                        </p>
                    </td>
                </tr>
                <tr style='height:13.35pt'>
                    <td valign=top style='width:10pt; border:solid windowtext 1.0pt; border-top:none; padding:0in 5.4pt 0in 5.4pt;height:13.35pt'>
                        <p class=MsoListParagraphCxSpFirst style='margin:0in; text-align: center; line-height:normal'>
                            <span style='font-size:8.0pt;font-family:"OneShinhan Light",sans-serif'><b>No</b></span>
                        </p>
                    </td>
                    <td valign=top style='width:70pt; border-top:none; border-left:none; border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:13.35pt'>
                        <p class=MsoListParagraphCxSpMiddle style='margin:0in; text-align: center; line-height:normal'>
                            <span style='font-size:8.0pt;font-family:"OneShinhan Light",sans-serif'><b>Subject Property</b></span>
                        </p>
                    </td>
                    <td valign=top style='width:61pt; border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:13.35pt'>
                        <p class=MsoListParagraphCxSpMiddle style='margin:0in; text-align: center; line-height:normal'>
                            <span style='font-size:8.0pt;font-family:"OneShinhan Light",sans-serif'><b>Title Deed</b></span>
                        </p>
                    </td>
                    <td valign=top style='width:71pt; border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:13.35pt'>
                        <p class=MsoListParagraphCxSpMiddle style='margin:0in; text-align: center; line-height:normal'>
                            <span style='font-size:8.0pt;font-family:"OneShinhan Light",sans-serif'><b>Building Cost</b></span>
                        </p>
                    </td>
                    <td valign=top style='width:61pt; border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:13.35pt'>
                        <p class=MsoListParagraphCxSpMiddle style='margin:0in;text-align: center; line-height:normal'>
                            <span style='font-size:8.0pt;font-family:"OneShinhan Light",sans-serif'><b>Size per sqm</b></span>
                        </p>
                    </td>
                    <td valign=top style='width:81pt; border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:13.35pt'>
                        <p class=MsoListParagraphCxSpLast style='margin:0in;text-align: center; line-height:normal'>
                            <span style='font-size:8.0pt;font-family:"OneShinhan Light",sans-serif'><b>Property Value/sqm</b></span>
                        </p>
                    </td>
                    <td colspan=top style='width:91pt; border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:13.35pt'>
                        <p class=MsoListParagraphCxSpLast style='margin:0in;text-align: center; line-height:normal'>
                            <span style='font-size:8.0pt;font-family:"OneShinhan Light",sans-serif'><b>Total Property Value</b></span>
                        </p>
                    </td>
                </tr>
                <tr style='height:13.35pt'>
                    <td colspan=8 style='width:527.25pt; padding:0in 5.4pt 0in 5.4pt; background:#2196f3a1'>
                        <p class=MsoListParagraphCxSpFirst style='margin-left:0in' align=center>
                            <span style='font-size:8.0pt;line-height:107%;font-family:"OneShinhan Light",sans-serif'>Land</span>
                        </p>
                    </td>
                </tr>
                <tr style='height:13.05pt'>
                    <td colspan=2 valign=top style='width:60pt; border:solid windowtext 1.0pt; border-top:none;padding:0in 5.4pt 0in 5.4pt;height:13.05pt'>
                        <p class=MsoListParagraphCxSpFirst align=center style='margin:0in;text-align: center;line-height:normal'>
                            <span style='font-size:8.0pt;font-family:"OneShinhan Bold",sans-serif'>Description</span>
                        </p>
                    </td>
                    <td valign=top style='width:60pt; border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:13.05pt'>
                        <p class=MsoListParagraphCxSpMiddle align=center style='margin:0in; text-align:center;line-height:normal'>
                            <span style='font-size:8.0pt; font-family:"OneShinhan Bold",sans-serif'>Title No.</span>
                        </p>
                    </td>
                    <td valign=top style='width:60pt; border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:13.05pt'>
                        <p class=MsoListParagraphCxSpMiddle align=center style='margin:0in; text-align:center;line-height:normal'>
                            <span style='font-size:8.0pt; font-family:"OneShinhan Bold",sans-serif'>Building New Cost</span>
                        </p>
                    </td>
                    <td valign=top style='width:60pt; border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:13.05pt'>
                        <p class=MsoListParagraphCxSpMiddle align=center style='margin:0in; text-align:center;line-height:normal'>
                            <span style='font-size:8.0pt; font-family:"OneShinhan Bold",sans-serif'>Size</span>
                        </p>
                    </td>
                    <td valign=top style='width:60pt; border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:13.05pt'>
                        <p class=MsoListParagraphCxSpLast align=center style='margin:0in;text-align: center;line-height:normal'>
                            <span style='font-size:8.0pt;font-family:"OneShinhan Bold",sans-serif'>Value per Sqm</span>
                        </p>
                    </td>
                    <td colspan=6 style='width:70pt; border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:13.05pt'>
                        <p class=MsoListParagraphCxSpLast align=center style='margin:0in;text-align: center;line-height:normal'>
                            <span style='font-size:8.0pt;font-family:"OneShinhan Bold",sans-serif'>Total Value</span>
                        </p>
                    </td>
                </tr>

                <tr style='height:13.05pt'>
                    <td valign=top style='width:5pt; border:solid windowtext 1.0pt; border-top:none;padding:0in 5.4pt 0in 5.4pt;height:13.05pt'>
                        <p class=MsoListParagraphCxSpFirst align=center style='margin:0in;text-align: center;line-height:normal'>
                            <span style='font-size:8.0pt;font-family:"OneShinhan Bold",sans-serif'>1</span>
                        </p>
                    </td>
                    <td valign=top style='width:60pt; border:solid windowtext 1.0pt; border-top:none;padding:0in 5.4pt 0in 5.4pt;height:13.05pt'>
                        <p class=MsoListParagraphCxSpFirst align=center style='margin:0in;text-align: center;line-height:normal'>
                            <span style='font-size:8.0pt;font-family:"OneShinhan Bold",sans-serif'>Land</span>
                        </p>
                    </td>
                    <!-- Merge Two Row -->
                    <td rowspan="2" valign=top style='background-color: #ff98002e; width:60pt; border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:13.05pt'>
                        <p class=MsoListParagraphCxSpMiddle align=center style='margin:0in; text-align:center;line-height:normal'>
                            <span style='font-size:8.0pt; font-family:"OneShinhan Bold",sans-serif;'>{{ $indicator->land_title_no }}</span>
                        </p>
                    </td>
                    <!-- Merge Two Row -->
                    <td rowspan="2" valign=top style='width:60pt; border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:13.05pt'>
                        <p class=MsoListParagraphCxSpMiddle align=center style='margin:0in; text-align:center;line-height:normal'>
                            <span style='font-size:8.0pt; font-family:"OneShinhan Bold",sans-serif'>
                                <!-- No Data  -->
                            </span>
                        </p>
                    </td>
                    <td valign=top style='background-color: #ff98002e; width:60pt; border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:13.05pt'>
                        <p class=MsoListParagraphCxSpMiddle align=center style='margin:0in; text-align:center;line-height:normal'>
                            <span style='font-size:8.0pt; font-family:"OneShinhan Bold",sans-serif'>{{ $indicator->LandSizeFormat }}</span>
                        </p>
                    </td>
                    <td valign=top style='background-color: #ff98002e; width:60pt; border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:13.05pt'>
                        <p class=MsoListParagraphCxSpLast align=center style='margin:0in;text-align: center;line-height:normal'>
                            <span style='font-size:8.0pt;font-family:"OneShinhan Bold",sans-serif'>{{ $indicator->LandValuePerSqmFormat }}</span>
                        </p>
                    </td>
                    <td colspan=6 style='width:70pt; border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:13.05pt'>
                        <p class=MsoListParagraphCxSpLast align=center style='margin:0in;text-align: center;line-height:normal'>
                            <span style='font-size:8.0pt;font-family:"OneShinhan Bold",sans-serif'>{{ $indicator->LandTotalValuePerSqmFormat }}</span>
                        </p>
                    </td>
                </tr>

                <tr style='height:13.05pt'>
                    <td colspan=2 valign=top style='width:60pt; border:solid windowtext 1.0pt; border-top:none;padding:0in 5.4pt 0in 5.4pt;height:13.05pt'>
                        <p class=MsoListParagraphCxSpFirst align=center style='margin:0in;text-align: center;line-height:normal'>
                            <span style='color: red; font-size:8.0pt;font-family:"OneShinhan Bold",sans-serif'>Sub-total</span>
                        </p>
                    </td>
                    <td valign=top style='width:60pt; border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:13.05pt'>
                        <p class=MsoListParagraphCxSpMiddle align=center style='margin:0in; text-align:center; line-height:normal'>
                            <span style='color: red; font-size:8.0pt; font-family:"OneShinhan Bold",sans-serif'>{{ $indicator->LandSizeFormat }}</span>
                        </p>
                    </td>
                    <td valign=top style='width:60pt; border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:13.05pt'>
                        <p class=MsoListParagraphCxSpLast align=center style='margin:0in;text-align: center; line-height:normal'>
                            <span style='color: red; font-size:8.0pt;font-family:"OneShinhan Bold",sans-serif'>{{ $indicator->LandValuePerSqmFormat }}</span>
                        </p>
                    </td>
                    <td colspan=6 style='width:70pt; border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:13.05pt'>
                        <p class=MsoListParagraphCxSpLast align=center style='margin:0in;text-align: center; line-height:normal'>
                            <span style='color: red; font-size:8.0pt;font-family:"OneShinhan Bold",sans-serif'>{{ $indicator->LandTotalValuePerSqmFormat }}</span>
                        </p>
                    </td>
                </tr>

                <tr style='height:13.35pt'>
                    <td colspan=8 style='width:527.25pt; border:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt; background:#2196f3a1'>
                        <p class=MsoListParagraphCxSpFirst style='margin-left:0in' align=center>
                            <span style='font-size:8.0pt;line-height:107%;font-family:"OneShinhan Light",sans-serif'>Building</span>
                        </p>
                    </td>
                </tr>

                <tr style='height:13.05pt'>
                    <td valign=top style='width:5pt; border:solid windowtext 1.0pt; border-top:none;padding:0in 5.4pt 0in 5.4pt;height:13.05pt'>
                        <p class=MsoListParagraphCxSpFirst align=center style='margin:0in;text-align: center;line-height:normal'>
                            <span style='font-size:8.0pt;font-family:"OneShinhan Bold",sans-serif'>1</span>
                        </p>
                    </td>
                    <td valign=top style='width:60pt; border:solid windowtext 1.0pt; border-top:none;padding:0in 5.4pt 0in 5.4pt;height:13.05pt'>
                        <p class=MsoListParagraphCxSpFirst align=center style='margin:0in;text-align: center;line-height:normal'>
                            <span style='font-size:8.0pt;font-family:"OneShinhan Bold",sans-serif'>{{ $indicator->PropertyTypeName }}</span>
                        </p>
                    </td>

                    <td valign=top style='background-color: #ff98002e; width:60pt; border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:13.05pt'>
                        <p class=MsoListParagraphCxSpMiddle align=center style='margin:0in; text-align:center;line-height:normal'>
                            <span style='font-size:8.0pt; font-family:"OneShinhan Bold",sans-serif'> 
                                <!-- No Data -->
                            </span>
                        </p>
                    </td>

                    <td valign=top style='width:60pt; border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:13.05pt'>
                        <p class=MsoListParagraphCxSpMiddle align=center style='margin:0in; text-align:center;line-height:normal'>
                            <span style='font-size:8.0pt; font-family:"OneShinhan Bold",sans-serif'>
                                <!-- No Data -->
                            </span>
                        </p>
                    </td>
                    <td valign=top style='width:60pt; border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:13.05pt'>
                        <p class=MsoListParagraphCxSpMiddle align=center style='margin:0in; text-align:center;line-height:normal'>
                            <span style='font-size:8.0pt; font-family:"OneShinhan Bold",sans-serif'>{{ $indicator->BuildingSizeFormat }}</span>
                        </p>
                    </td>
                    <td valign=top style='width:60pt; border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:13.05pt'>
                        <p class=MsoListParagraphCxSpLast align=center style='margin:0in;text-align: center;line-height:normal'>
                            <span style='font-size:8.0pt;font-family:"OneShinhan Bold",sans-serif'>{{ $indicator->BuildingValuePerSqmFormat }}</span>
                        </p>
                    </td>
                    <td colspan=6 style='width:70pt; border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:13.05pt'>
                        <p class=MsoListParagraphCxSpLast align=center style='margin:0in;text-align: center;line-height:normal'>
                            <span style='font-size:8.0pt;font-family:"OneShinhan Bold",sans-serif'>{{ $indicator->BuildingTotalValuePerSqmFormat }}</span>
                        </p>
                    </td>
                </tr>
                <tr style='height:13.05pt'>
                    <td valign=top style='width:5pt; border:solid windowtext 1.0pt; border-top:none;padding:0in 5.4pt 0in 5.4pt;height:13.05pt'>
                        <p class=MsoListParagraphCxSpFirst align=center style='margin:0in;text-align: center;line-height:normal'>
                            <span style='font-size:8.0pt;font-family:"OneShinhan Bold",sans-serif'>
                                <!-- No Data -->
                            </span>
                        </p>
                    </td>
                    <td valign=top style='width:60pt; border:solid windowtext 1.0pt; border-top:none;padding:0in 5.4pt 0in 5.4pt;height:13.05pt'>
                        <p class=MsoListParagraphCxSpFirst align=center style='margin:0in;text-align: center;line-height:normal'>
                            <span style='font-size:8.0pt;font-family:"OneShinhan Bold",sans-serif'>
                                <!-- No Data -->
                            </span>
                        </p>
                    </td>

                    <td valign=top style='background-color: #ff98002e; width:60pt; border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:13.05pt'>
                        <p class=MsoListParagraphCxSpMiddle align=center style='margin:0in; text-align:center;line-height:normal'>
                            <span style='font-size:8.0pt; font-family:"OneShinhan Bold",sans-serif'>
                                <!-- No Data -->
                            </span>
                        </p>
                    </td>

                    <td valign=top style='width:60pt; border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:13.05pt'>
                        <p class=MsoListParagraphCxSpMiddle align=center style='margin:0in; text-align:center;line-height:normal'>
                            <span style='font-size:8.0pt; font-family:"OneShinhan Bold",sans-serif'>
                                <!-- No Data -->
                            </span>
                        </p>
                    </td>
                    <td valign=top style='width:60pt; border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:13.05pt'>
                        <p class=MsoListParagraphCxSpMiddle align=center style='margin:0in; text-align:center;line-height:normal'>
                            <span style='font-size:8.0pt; font-family:"OneShinhan Bold",sans-serif'>
                                <!-- No Data -->
                            </span>
                        </p>
                    </td>
                    <td valign=top style='width:60pt; border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:13.05pt'>
                        <p class=MsoListParagraphCxSpLast align=center style='margin:0in;text-align: center;line-height:normal'>
                            <span style='font-size:8.0pt;font-family:"OneShinhan Bold",sans-serif'>
                                <!-- No Data -->
                            </span>
                        </p>
                    </td>
                    <td colspan=6 style='width:70pt; border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:13.05pt'>
                        <p class=MsoListParagraphCxSpLast align=center style='margin:0in;text-align: center;line-height:normal'>
                            <span style='font-size:8.0pt;font-family:"OneShinhan Bold",sans-serif'>
                                <!-- No Data -->
                            </span>
                        </p>
                    </td>
                </tr>

                <tr style='height:13.05pt'>
                    <td colspan=2 valign=top style='width:60pt; border:solid windowtext 1.0pt; border-top:none;padding:0in 5.4pt 0in 5.4pt;height:13.05pt'>
                        <p class=MsoListParagraphCxSpFirst align=center style='margin:0in;text-align: center;line-height:normal'>
                            <span style='color: red; font-size:8.0pt;font-family:"OneShinhan Bold",sans-serif'>Sub-total</span>
                        </p>
                    </td>
                    <td valign=top style='width:60pt; border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:13.05pt'>
                        <p class=MsoListParagraphCxSpMiddle align=center style='margin:0in; text-align:center;line-height:normal'>
                            <span style='font-size:8.0pt; font-family:"OneShinhan Bold",sans-serif'>
                                <!-- No Data -->
                            </span>
                        </p>
                    </td>
                    <td valign=top style='width:60pt; border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:13.05pt'>
                        <p class=MsoListParagraphCxSpMiddle align=center style='margin:0in; text-align:center;line-height:normal'>
                            <span style='font-size:8.0pt; font-family:"OneShinhan Bold",sans-serif'>
                                <!-- No Data -->
                            </span>
                        </p>
                    </td>
                    <td valign=top style='width:60pt; border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:13.05pt'>
                        <p class=MsoListParagraphCxSpMiddle align=center style='margin:0in; text-align:center;line-height:normal'>
                            <span style='color: red; font-size:8.0pt; font-family:"OneShinhan Bold",sans-serif'>{{ $indicator->BuildingSizeFormat }}</span>
                        </p>
                    </td>
                    <td valign=top style='width:60pt; border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:13.05pt'>
                        <p class=MsoListParagraphCxSpLast align=center style='margin:0in;text-align: center; line-height:normal'>
                            <span style='color: red; font-size:8.0pt;font-family:"OneShinhan Bold",sans-serif'>{{ $indicator->BuildingValuePerSqmFormat }}</span>
                        </p>
                    </td>
                    <td colspan=6 style='width:70pt; border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:13.05pt'>
                        <p class=MsoListParagraphCxSpLast align=center style='margin:0in;text-align: center; line-height:normal'>
                            <span style='color: red; font-size:8.0pt;font-family:"OneShinhan Bold",sans-serif'>{{ $indicator->BuildingTotalValuePerSqmFormat }}</span>
                        </p>
                    </td>
                </tr>

                <tr style='height:13.05pt'>
                    <td colspan=3 valign=top style='width:150pt; border:solid windowtext 1.0pt; border-top:none;padding:0in 5.4pt 0in 5.4pt;height:13.05pt'>
                        <p class=MsoListParagraphCxSpFirst align=center style='margin:0in;text-align: center;line-height:normal'>
                            <span style='color: red; font-size:8.0pt;font-family:"OneShinhan Bold",sans-serif'>Grand Total</span>
                        </p>
                    </td>
                    <td valign=top style='width:50pt; border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:13.05pt'>
                        <p class=MsoListParagraphCxSpMiddle align=center style='margin:0in; text-align:center;line-height:normal'>
                            <span style='font-size:8.0pt; font-family:"OneShinhan Bold",sans-serif'>
                                <!-- No Data -->
                            </span>
                        </p>
                    </td>
                    <td colspan=6 style='width:200pt; border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:13.05pt'>
                        <p class=MsoListParagraphCxSpMiddle align=center style='margin:0in; text-align: center; line-height:normal'>
                            <span style='color: red; font-size:8.0pt; font-family:"OneShinhan Bold",sans-serif'>{{ $indicator->LandBuildingGrandTotalFormat }}</span>
                        </p>
                    </td>
                </tr>
            </table>
            <br>

            <!-- REFERENCE -->
            <table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0 width=690 style='width:527.25pt;border-collapse:collapse;border:none'>
                <tr style='height:18.45pt'>
                    <td width=689 colspan=6 style='width:527.25pt;border:solid windowtext 1.0pt; background:#0070C0;padding:0in 5.4pt 0in 5.4pt;height:18.45pt'>
                        <p class=MsoNormal align=center style='margin-top:0in;margin-right:-5.65pt; margin-bottom:0in;margin-left:0in;text-align:center;line-height:normal'>
                            <span style='font-size:10.0pt;font-family:"OneShinhan Bold",sans-serif;color:white'>REFERENCE</span>
                        </p>
                    </td>
                </tr>
                <tr style='height:13.05pt'>
                    <td colspan=2 valign=top style='width:100pt; border:solid windowtext 1.0pt; border-top:none;padding:0in 5.4pt 0in 5.4pt;height:13.05pt'>
                        <p class=MsoListParagraphCxSpFirst align=center style='margin:0in;text-align: center;line-height:normal'>
                            <span style='font-size:8.0pt;font-family:"OneShinhan Bold",sans-serif'>CIF No./Name</span>
                        </p>
                    </td>
                    <td valign=top style='width:100pt; border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:13.05pt'>
                        <p class=MsoListParagraphCxSpMiddle align=center style='margin:0in; text-align:center;line-height:normal'>
                            <span style='font-size:8.0pt; font-family:"OneShinhan Bold",sans-serif'>Geo Code</span>
                        </p>
                    </td>
                    <td valign=top style='width:100pt; border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:13.05pt'>
                        <p class=MsoListParagraphCxSpMiddle align=center style='margin:0in; text-align:center;line-height:normal'>
                            <span style='font-size:8.0pt; font-family:"OneShinhan Bold",sans-serif'>Size</span>
                        </p>
                    </td>
                    <td valign=top style='width:100pt; border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:13.05pt'>
                        <p class=MsoListParagraphCxSpMiddle align=center style='margin:0in; text-align:center;line-height:normal'>
                            <span style='font-size:8.0pt; font-family:"OneShinhan Bold",sans-serif'>Value per Sqm</span>
                        </p>
                    </td>
                    <td valign=top style='width:100pt; border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:13.05pt'>
                        <p class=MsoListParagraphCxSpLast align=center style='margin:0in;text-align: center;line-height:normal'>
                            <span style='font-size:8.0pt;font-family:"OneShinhan Bold",sans-serif'>Total Value</span>
                        </p>
                    </td>
                </tr>
                <tr style='height:13.35pt'>
                    <td valign=top style='width:10pt; border:solid windowtext 1.0pt; border-top:none;padding:0in 5.4pt 0in 5.4pt;height:13.35pt'>
                        <p class=MsoListParagraphCxSpFirst style='margin:0in;line-height:normal'>
                            <span style='font-size:8.0pt;font-family:"OneShinhan Light",sans-serif'>1</span>
                        </p>
                    </td>
                    <td valign=top style='width:40pt; border-top:none;border-left:none; border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:13.35pt'>
                        <p class=MsoListParagraphCxSpMiddle style='margin:0in;line-height:normal'>
                            <span style='font-size:8.0pt;font-family:"OneShinhan Light",sans-serif'>{{ $indicator->comparable_cif_no1 }}</span>
                        </p>
                    </td>
                    <td valign=top style='width:40pt; border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:13.35pt'>
                        <p class=MsoListParagraphCxSpMiddle style='margin:0in;line-height:normal'>
                            <span style='font-size:8.0pt;font-family:"OneShinhan Light",sans-serif'>{{ $indicator->comparable_geo_code1 }}</span>
                        </p>
                    </td>
                    <td valign=top style='width:40pt; border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:13.35pt'>
                        <p class=MsoListParagraphCxSpMiddle align=right style='margin:0in;text-align: right;line-height:normal'>
                            <span style='font-size:8.0pt;font-family:"OneShinhan Light",sans-serif'>{{ $indicator->ComparableSizeOne }}</span>
                        </p>
                    </td>
                    <td valign=top style='width:40pt; border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:13.35pt'>
                        <p class=MsoListParagraphCxSpMiddle align=right style='margin:0in;text-align: right;line-height:normal'>
                            <span style='font-size:8.0pt;font-family:"OneShinhan Light",sans-serif'>{{ $indicator->ComparaleValuePerSqmOneFormat }}</span>
                        </p>
                    </td>
                    <td valign=top style='width:40pt; border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:13.35pt'>
                        <p class=MsoListParagraphCxSpLast align=right style='margin:0in;text-align: right;line-height:normal'>
                            <span style='font-size:8.0pt;font-family:"OneShinhan Light",sans-serif'>{{ $indicator->ComparableTotalValueOneFormat }}</span>
                        </p>
                    </td>
                </tr>
                <tr style='height:13.35pt'>
                    <td valign=top style='width:10pt; border:solid windowtext 1.0pt; border-top:none;padding:0in 5.4pt 0in 5.4pt;height:13.35pt'>
                        <p class=MsoListParagraphCxSpFirst style='margin:0in;line-height:normal'>
                            <span style='font-size:8.0pt;font-family:"OneShinhan Light",sans-serif'>2</span>
                        </p>
                    </td>
                    <td valign=top style='width:40pt; border-top:none;border-left:none; border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:13.35pt'>
                        <p class=MsoListParagraphCxSpMiddle style='margin:0in;line-height:normal'>
                            <span style='font-size:8.0pt;font-family:"OneShinhan Light",sans-serif'>{{ $indicator->comparable_cif_no2 }}</span>
                        </p>
                    </td>
                    <td valign=top style='width:40pt; border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:13.35pt'>
                        <p class=MsoListParagraphCxSpMiddle style='margin:0in;line-height:normal'>
                            <span style='font-size:8.0pt;font-family:"OneShinhan Light",sans-serif'>{{ $indicator->comparable_geo_code2 }}</span>
                        </p>
                    </td>
                    <td valign=top style='width:40pt; border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:13.35pt'>
                        <p class=MsoListParagraphCxSpMiddle align=right style='margin:0in;text-align: right;line-height:normal'>
                            <span style='font-size:8.0pt;font-family:"OneShinhan Light",sans-serif'>{{ $indicator->ComparableSizeTwo }}</span>
                        </p>
                    </td>
                    <td valign=top style='width:40pt; border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:13.35pt'>
                        <p class=MsoListParagraphCxSpMiddle align=right style='margin:0in;text-align: right;line-height:normal'>
                            <span style='font-size:8.0pt;font-family:"OneShinhan Light",sans-serif'>{{ $indicator->ComparaleValuePerSqmTwoFormat }}</span>
                        </p>
                    </td>
                    <td valign=top style='width:40pt; border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt;height:13.35pt'>
                        <p class=MsoListParagraphCxSpLast align=right style='margin:0in;text-align: right;line-height:normal'>
                            <span style='font-size:8.0pt;font-family:"OneShinhan Light",sans-serif'>{{ $indicator->ComparableTotalValueTwoFormat }}</span>
                        </p>
                    </td>
                </tr>
            </table>
            <br>
            <table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0 width=690 style='width:527.25pt; border-collapse:collapse;border:none'>
                <tr>
                    <td style="width:50pt; border:0; padding:0in 5.4pt 0in 5.4pt;">
                        <p style='margin-top:0in; margin-right:0in; margin-bottom:0in; margin-left:0in; line-height:normal; font-size:15px; font-family:"Calibri",sans-serif;text-align:left; height: 25pt;'>
                            <strong>
                                <span style='font-size:11px;font-family:"OneShinhan Light",sans-serif;color:black;'>
                                    Prepared By:
                                </span>
                            </strong>
                        </p>
                    </td>
                    <td style="width:50pt;border:0;padding:0in 5.4pt 0in 5.4pt;text-align:center;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif; height: 25pt;'>
                            <strong>
                                <span style='font-size:11px; font-family: "OneShinhan Light",sans-serif;'>
                                    <!-- No Data -->
                                </span>
                            </strong>
                        </p>
                    </td>
                    <td style="width:50pt;border:0; padding:0in 5.4pt 0in 5.4pt;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:right; height: 25pt;'>
                            <strong>
                                <span style='font-size:11px;font-family:"OneShinhan Light",sans-serif;color:black;'>
                                    Approved By:
                                </span>
                            </strong>
                        </p>
                    </td>
                </tr>
                <br>
                <br>
                <br>
                <tr>
                    <td style="width:50pt; border:0; padding:0in 5.4pt 0in 5.4pt; ">
                        <p style='margin-top:0in; margin-right:0in; margin-bottom:0in; margin-left:0in; line-height:normal; font-size:15px; font-family:"Calibri",sans-serif;text-align:left;'>
                            <span style='font-size:11px;font-family:"OneShinhan Light",sans-serif;color:black;'>
                                Ms. Nhor Sreynet
                            </span>
                        </p>
                    </td>
                    <td style="width:50pt;border:0;padding:0in 5.4pt 0in 5.4pt; text-align:center;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <span style='font-size:11px;font-family:   "OneShinhan Light",sans-serif;'>
                                <!-- No Data -->
                            </span>
                        </p>
                    </td>
                    <td style="width:50pt;border:0;padding:0in 5.4pt 0in 5.4pt;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:right;'>
                            <span style='font-size:11px;font-family:"OneShinhan Light",sans-serif;color:black;'>
                                Mr. Kheng Nith
                            </span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="width:50pt; border:0; padding:0in 5.4pt 0in 5.4pt;">
                        <p style='margin-top:0in; margin-right:0in; margin-bottom:0in; margin-left:0in; line-height:normal; font-size:15px; font-family:"Calibri",sans-serif;text-align:left;'>
                            <span style='font-size:11px;font-family:"OneShinhan Light",sans-serif;color:black;'>
                                Tel: 097 338 0278
                            </span>
                        </p>
                    </td>
                    <td style="width:50pt;border:0;padding:0in 5.4pt 0in 5.4pt; text-align:center;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                            <span style='font-size:11px;font-family:   "OneShinhan Light",sans-serif;'>
                                <!-- No Data -->
                            </span>
                        </p>
                    </td>
                    <td style="width:50pt;border:0;padding:0in 5.4pt 0in 5.4pt;">
                        <p style='margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:right;'>
                            <span style='font-size:11px;font-family:"OneShinhan Light",sans-serif;color:black;'>
                                Tel: 017 686 097
                            </span>
                        </p>
                    </td>
                </tr>
            </table>

            <!-- QR Code Map Place -->
            <!-- <div id="qrcode-2" style="position: absolute; right: 0; top: 310;">
                <img src="{{ $qrImage }}" style="height: 60px; width: 60px; border: 1px solid #0070C0; padding: 5px; background-color: white;"/>
            </div> -->
            
            <!-- <a target="_blank" class="btn btn-primary" href="http://localhost/pms/property-management/public/api/pdfindicator/145">Export to PDF</a> -->
        </div>
    </div>
</body>
</html>