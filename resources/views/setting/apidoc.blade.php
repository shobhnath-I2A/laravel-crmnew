<td align="left" valign="top" width="90%">
    <div class="page-content">
        <div class=" ">
            <div class="col-md-12 col-xl-12">
                <div>
                    <div class="card-body" style="padding:10px;">
                        <h4 class="card-title"
                            style="margin-top: 0px !important; padding-left: 10px !important; padding-top: 10px !important; padding-bottom: 5px !IMPORTANT;padding-right: 0px !important;">
                            API Documentation
                        </h4>
                        <div style="border:1px solid #ddd; margin:10px;">
                            <table width="100%" class="table  " style="    margin-bottom: 10px; ">
                                <thead>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td colspan="2">
                                            <h6>API Call Method By CURL</h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <div
                                                style="background-color:#f7f7f7; border:2px dashed #ccc; padding:30px; color:#000000;">
                                                function getHotelApiData($url,$jsonPost,$apiKey){<br>
                                                $crl = curl_init($url);<br>
                                                curl_setopt($crl, CURLOPT_RETURNTRANSFER, true);<br>
                                                curl_setopt($crl, CURLINFO_HEADER_OUT, true);<br>
                                                curl_setopt($crl, CURLOPT_POST, true);<br>
                                                curl_setopt($crl, CURLOPT_POSTFIELDS, json_decode($jsonPost)); <br>
                                                return $result = curl_exec($crl);<br>
                                                curl_close($crl);<br>

                                                }</div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table width="100%" class="table  " style="    margin-bottom: 10px; ">
                                <thead>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="2">
                                            <h6>Get Package Destinations</h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <div
                                                style="background-color:#f7f7f7; border:2px dashed #ccc; padding:30px; color:#000000;">
                                                <p>$apiKey='1';<br>
                                                $TokenId='1';<br>
                                                $url = "https://crm2.i2a.co/API/destinationlist.php"; </p>
                                                <p> $jsonPost = '{<br>
											    "EndUserIp": "'.$_SERVER['REMOTE_ADDR'].'",<br>
                                                    "type": "domestic",<br>
                                                    "TokenId": "'.$TokenId.'"<br>
                                                    }';<br>
                                                    <br>
                                                    $getdata=getHotelApiData($url,$jsonPost,$apiKey);
                                                </p>
                                                <p> echo '&lt;pre&gt;';<br>
                                                    print_r($getdata);</p>
                                                <div style="background-color:#FFFFCC; padding:5px 10px;">For domestic
                                                    destinations use "type": "domestic" or for International use "type":
                                                    "international" </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table width="100%" class="table  " style="    margin-bottom: 10px; ">
                                <thead>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="2">
                                            <h6>Get Package List</h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <div
                                                style="background-color:#f7f7f7; border:2px dashed #ccc; padding:30px; color:#000000;">
                                                <p>$apiKey='1';<br>
                                                $TokenId='1'; <br>
                                                $url = "https://crm2.i2a.co/API/packagelist.php"; </p>
                                                <p> $jsonPost = '{<br>
											    "EndUserIp": "'.$_SERVER['REMOTE_ADDR'].'",<br>
                                                    "searchdestination": "",<br>
                                                    "TokenId": "'.$TokenId.'"<br>
                                                    }';<br>
                                                    <br>
                                                    $getdata=getHotelApiData($url,$jsonPost,$apiKey);
                                                </p>
                                                <p> echo '&lt;pre&gt;';<br>
                                                    print_r($getdata);</p>
                                                <div style="background-color:#FFFFCC; padding:5px 10px;">For search by
                                                    destination enter destination name in searchdestination </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table width="100%" class="table  " style="    margin-bottom: 10px; ">
                                <thead>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="2">
                                            <h6>Get Package Detail </h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <div
                                                style="background-color:#f7f7f7; border:2px dashed #ccc; padding:30px; color:#000000;">
                                                <p>$apiKey='1';<br>
                                                $TokenId='1'; <br>
                                                $url = "https://crm2.i2a.co/API/packagedetails.php"; </p>
                                                <p> $jsonPost = '{<br>
											    "EndUserIp": "'.$_SERVER['REMOTE_ADDR'].'",<br>
                                                    "type": "domestic",<br>
                                                    "packageId": "2135"<br>
                                                    }';<br>
                                                    <br>
                                                    $getdata=getHotelApiData($url,$jsonPost,$apiKey);
                                                </p>
                                                <p> echo '&lt;pre&gt;';<br>
                                                    print_r($getdata);</p>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table width="100%" class="table  " style="    margin-bottom: 10px; ">
                                <thead>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="2">
                                            <h6>Get CMS Page Detail </h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <div
                                                style="background-color:#f7f7f7; border:2px dashed #ccc; padding:30px; color:#000000;">
                                                <p>$apiKey='1';<br>
                                                $TokenId='1';<br>
                                                $url = "https://crm2.i2a.co/API/cmspages.php"; </p>
                                                <p>$jsonPost = '{<br>
											    "EndUserIp": "'.$_SERVER['REMOTE_ADDR'].'",<br>
                                                "slug": "home-about-content" <br>
                                                }';</p>
                                                <p>$getdata=getHotelApiData($url,$jsonPost,$apiKey);</p>
                                                <p>echo '&lt;pre&gt;';<br>
                                                    print_r($getdata);<br>
                                                </p>
                                                <div style="background-color:#FFFFCC; padding:5px 10px;">Enter slug name
                                                    for get page data </div>
                                            </div>
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
</td>
