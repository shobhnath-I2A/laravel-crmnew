<div class="card-body">
    <div style="padding:10px;">
        <script language="JavaScript" type="text/javascript" src="ckeditor/ckeditor.js"></script>
        <script language="JavaScript" type="text/javascript" src="ckeditor/ckfinder/ckfinder.js"></script>


        <style>
            .statusbox {
                margin-right: 5px;
                padding: 10px;
                text-align: center;
                background-color: #000000;
                font-size: 13px;
                color: #fff;
                border-radius: 4px;
                text-transform: uppercase;
            }

            .bulbblue2 {
                height: 30px;
                width: 30px;
                background-color: #3b5de7;
                border-radius: 100%;
                text-align: center;
                overflow: hidden;
                line-height: 34px;
                font-size: 16px;
                font-weight: 600;
                color: #fff;
                margin-right: 20px;
            }
        </style>
        <div class=" ">
            <div>
                <h4 class="mt-0 header-title" style="margin-bottom:10px; position:relative;">Customer / Query Details
                    <a target="_blank" href="http://localhost:8081/crmreview/sharepackage/109135/shobhnath1321.html"
                        style="position: absolute; font-size: 12px; font-weight: 600; right: 5px; top: 5px; background-color: #005ee2; color: #fff; padding: 1px 10px; border-radius: 3px; cursor:pointer;">
                        View Proposal</a></h4>
                <div class="card">
                    <div style="padding:10px;">
                        <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
                            <tbody>
                                <tr>
                                    <td><strong>Customer Name </strong></td>
                                    <td>Mr. umesh singh singh singh singh</td>
                                    <td><strong>Enquiry ID </strong></td>
                                    <td>127497</td>
                                    <td><strong>Enquiry For </strong></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="6" bgcolor="#F8F8F8"><strong>Query Details </strong></td>
                                </tr>
                                <tr>
                                    <td><strong>Check-In</strong></td>
                                    <td>02-04-2026</td>
                                    <td><strong>Check-Out </strong></td>
                                    <td>10-04-2026</td>
                                    <td><strong>Nights</strong></td>
                                    <td>8</td>
                                </tr>
                                <tr>
                                    <td><strong>From City </strong></td>
                                    <td></td>
                                    <td><strong>Destination</strong></td>
                                    <td>Dubai</td>
                                    <td><strong>Total Pax</strong></td>
                                    <td>1 Adult - 0 Child - 0 Infant </td>
                                </tr>
                                <tr>
                                    <td><strong>Remarks</strong></td>
                                    <td colspan="5"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <h4 class="mt-0 header-title" style="margin-bottom:10px; position:relative;">Vouchers <a
                        href="display.html?ga=query&amp;view=1&amp;id=127497&amp;c=8&amp;addvoucher=1"
                        style="position: absolute; font-size: 12px; font-weight: 600; right: 5px; top: 5px; background-color: #005ee2; color: #fff; padding: 1px 10px; border-radius: 3px; cursor:pointer;">
                        + Create New Voucher</a></h4>
                <div style="text-align:center; font-size:16px; padding:30px; color:#999999; ">
                    <div style="text-align:center; font-size:60px;"><i class="fa fa-file-o" aria-hidden="true"></i>
                    </div>No Voucher Created
                </div>
            </div>
        </div>
        <script>
            function changeCoverPhoto(img) {
                $('#bannerphoto').attr('src', 'http://localhost:8081/crmreview/package_image/' + img);
                $('#bannerImage').val(img);
                $(".close").trigger("click");
            }
        </script>
    </div>
</div>
