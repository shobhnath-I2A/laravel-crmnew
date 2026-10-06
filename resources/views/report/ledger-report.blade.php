@extends('layouts.app')
@section('content')
</div>
<div class=wrapper>
    <div class=container-fluid>
        <div class=main-content>
            <div class=page-content>
                <div class=newboxheading>
                    <div class=newhead>MIS Report<div class=newoptionmenu>
                            <form action="" enctype=multipart/form-data>
                                <table border=0 cellpadding=0 cellspacing=0>
                                    <tbody>
                                        <tr>
                                            <td><input class="form-control hasDatepicker" id=startDate name=startDate
                                                    readonly placeholder=From value=01-06-2025 style=width:130px></td>
                                            <td style=padding-left:5px><input class="form-control hasDatepicker"
                                                    id=endDate name=endDate readonly placeholder=From value=01-08-2025
                                                    style=width:130px></td>
                                            <td style=padding-left:5px><button type=submit
                                                    class="btn btn-secondary btn-lg waves-effect waves-light"
                                                    style="padding:6px 10px"><i class="fa fa-search" aria-hidden=true></i>
                                                    Search</button></td>
                                            <td><button type=button
                                                    class="btn btn-secondary btn-lg waves-effect waves-light"
                                                    style="padding:6px 10px;margin-left:10px" onclick=fnExcelReport()><i
                                                        class="fa fa-download" aria-hidden=true></i> Export
                                                    Report</button></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <input type=hidden name=ga value=misreport>
                            </form>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="col-md-12 col-xl-12" style=padding-top:32px>
                        <div class=card style=overflow:hidden>
                            <div class=card-body style=padding:0>
                                <div class=table-responsive>
                                    <table class="table table-hover mb-0"
                                        style="border:1px solid #ddd;display:1none!important" id=headerTable>
                                        <thead>
                                            <tr>
                                                <th>Sr. </th>
                                                <th>Booked By </th>
                                                <th>Query Date </th>
                                                <th>Email</th>
                                                <th>Mobile</th>
                                                <th>Email</th>
                                                <th> ID </th>
                                                <th>Booking Date </th>
                                                <th>Client </th>
                                                <th>Destination</th>
                                                <th>No. of Pax </th>
                                                <th>Selling Cost </th>
                                                <th>Flight Cost </th>
                                                <th>Hotel Cost </th>
                                                <th>Tour Cost </th>
                                                <th>Visa Cost </th>
                                                <th>Cruise Cost </th>
                                                <th>TCS (%) </th>
                                                <th>Total Cost </th>
                                                <th>Gross Profit </th>
                                                <th>GST</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td align=left valign=top>1</td>
                                                <td align=left valign=top>Sunil S</td>
                                                <td align=left valign=top>26-07-2025</td>
                                                <td align=left valign=top>sa.@sa.com</td>
                                                <td align=left valign=top></td>
                                                <td align=left valign=top>sa.@sa.com</td>
                                                <td align=left valign=top><a
                                                        href="display.html?ga=query&amp;view=1&amp;id=126999"
                                                        target=_blank>126999</a></td>
                                                <td align=left valign=top style=text-transform:uppercase>28-07-2025</td>
                                                <td align=left valign=top style=text-transform:uppercase>Mr. ASIF </td>
                                                <td align=left valign=top style=text-transform:uppercase>Kuala lumpur
                                                </td>
                                                <td align=left valign=top style=text-transform:uppercase>2</td>
                                                <td align=left valign=top style=text-transform:uppercase>55587</td>
                                                <td align=left valign=top style=text-transform:uppercase>0</td>
                                                <td align=left valign=top style=text-transform:uppercase>14187</td>
                                                <td align=left valign=top style=text-transform:uppercase>33900</td>
                                                <td align=left valign=top style=text-transform:uppercase>0</td>
                                                <td align=left valign=top style=text-transform:uppercase>0</td>
                                                <td align=left valign=top style=text-transform:uppercase>0</td>
                                                <td align=left valign=top style=text-transform:uppercase>48087</td>
                                                <td align=left valign=top style=text-transform:uppercase>6356</td>
                                                <td align=left valign=top style=text-transform:uppercase>1144</td>
                                            </tr>
                                            <tr>
                                                <td align=left valign=top>2</td>
                                                <td align=left valign=top>i2a Technologies</td>
                                                <td align=left valign=top>24-07-2025</td>
                                                <td align=left valign=top>sa.@sa.com</td>
                                                <td align=left valign=top></td>
                                                <td align=left valign=top>sa.@sa.com</td>
                                                <td align=left valign=top><a
                                                        href="display.html?ga=query&amp;view=1&amp;id=126974"
                                                        target=_blank>126974</a></td>
                                                <td align=left valign=top style=text-transform:uppercase>24-07-2025</td>
                                                <td align=left valign=top style=text-transform:uppercase>Mr. Sharan
                                                    Sachdeva </td>
                                                <td align=left valign=top style=text-transform:uppercase></td>
                                                <td align=left valign=top style=text-transform:uppercase>3</td>
                                                <td align=left valign=top style=text-transform:uppercase>18200</td>
                                                <td align=left valign=top style=text-transform:uppercase>0</td>
                                                <td align=left valign=top style=text-transform:uppercase>17532</td>
                                                <td align=left valign=top style=text-transform:uppercase>0</td>
                                                <td align=left valign=top style=text-transform:uppercase>0</td>
                                                <td align=left valign=top style=text-transform:uppercase>0</td>
                                                <td align=left valign=top style=text-transform:uppercase>0</td>
                                                <td align=left valign=top style=text-transform:uppercase>17532</td>
                                                <td align=left valign=top style=text-transform:uppercase>566</td>
                                                <td align=left valign=top style=text-transform:uppercase>102</td>
                                            </tr>
                                            <tr>
                                                <td align=left valign=top>3</td>
                                                <td align=left valign=top>Sunil S</td>
                                                <td align=left valign=top>23-07-2025</td>
                                                <td align=left valign=top>sa.@sa.com</td>
                                                <td align=left valign=top>9038000585</td>
                                                <td align=left valign=top>sa.@sa.com</td>
                                                <td align=left valign=top><a
                                                        href="display.html?ga=query&amp;view=1&amp;id=126872"
                                                        target=_blank>126872</a></td>
                                                <td align=left valign=top style=text-transform:uppercase>24-07-2025</td>
                                                <td align=left valign=top style=text-transform:uppercase>Mr. sujan datta
                                                </td>
                                                <td align=left valign=top style=text-transform:uppercase>Vietnam</td>
                                                <td align=left valign=top style=text-transform:uppercase>3</td>
                                                <td align=left valign=top style=text-transform:uppercase>122600</td>
                                                <td align=left valign=top style=text-transform:uppercase>121742</td>
                                                <td align=left valign=top style=text-transform:uppercase>0</td>
                                                <td align=left valign=top style=text-transform:uppercase>0</td>
                                                <td align=left valign=top style=text-transform:uppercase>0</td>
                                                <td align=left valign=top style=text-transform:uppercase>0</td>
                                                <td align=left valign=top style=text-transform:uppercase>0</td>
                                                <td align=left valign=top style=text-transform:uppercase>121742</td>
                                                <td align=left valign=top style=text-transform:uppercase>728</td>
                                                <td align=left valign=top style=text-transform:uppercase>132</td>
                                            </tr>
                                            <tr>
                                                <td align=left valign=top>4</td>
                                                <td align=left valign=top>Sunil S</td>
                                                <td align=left valign=top>22-07-2025</td>
                                                <td align=left valign=top>sa.@sa.com</td>
                                                <td align=left valign=top>9038000585</td>
                                                <td align=left valign=top>sa.@sa.com</td>
                                                <td align=left valign=top><a
                                                        href="display.html?ga=query&amp;view=1&amp;id=126855"
                                                        target=_blank>126855</a></td>
                                                <td align=left valign=top style=text-transform:uppercase>23-07-2025</td>
                                                <td align=left valign=top style=text-transform:uppercase>Mr. sujan datta
                                                </td>
                                                <td align=left valign=top style=text-transform:uppercase>Vietnam</td>
                                                <td align=left valign=top style=text-transform:uppercase>3</td>
                                                <td align=left valign=top style=text-transform:uppercase>119196</td>
                                                <td align=left valign=top style=text-transform:uppercase>0</td>
                                                <td align=left valign=top style=text-transform:uppercase>25449</td>
                                                <td align=left valign=top style=text-transform:uppercase>60000</td>
                                                <td align=left valign=top style=text-transform:uppercase>9000</td>
                                                <td align=left valign=top style=text-transform:uppercase>0</td>
                                                <td align=left valign=top style=text-transform:uppercase>5</td>
                                                <td align=left valign=top style=text-transform:uppercase>94449</td>
                                                <td align=left valign=top style=text-transform:uppercase>16162</td>
                                                <td align=left valign=top style=text-transform:uppercase>2910</td>
                                            </tr>
                                            <tr>
                                                <td align=left valign=top>5</td>
                                                <td align=left valign=top>Anjana Thakur</td>
                                                <td align=left valign=top>21-07-2025</td>
                                                <td align=left valign=top>sa.@sa.com</td>
                                                <td align=left valign=top>8800178383</td>
                                                <td align=left valign=top>sa.@sa.com</td>
                                                <td align=left valign=top><a
                                                        href="display.html?ga=query&amp;view=1&amp;id=126829"
                                                        target=_blank>126829</a></td>
                                                <td align=left valign=top style=text-transform:uppercase>23-07-2025</td>
                                                <td align=left valign=top style=text-transform:uppercase>Mr. Amit
                                                    Rohtagi </td>
                                                <td align=left valign=top style=text-transform:uppercase></td>
                                                <td align=left valign=top style=text-transform:uppercase>1</td>
                                                <td align=left valign=top style=text-transform:uppercase>8900</td>
                                                <td align=left valign=top style=text-transform:uppercase>8102</td>
                                                <td align=left valign=top style=text-transform:uppercase>0</td>
                                                <td align=left valign=top style=text-transform:uppercase>0</td>
                                                <td align=left valign=top style=text-transform:uppercase>0</td>
                                                <td align=left valign=top style=text-transform:uppercase>0</td>
                                                <td align=left valign=top style=text-transform:uppercase>0</td>
                                                <td align=left valign=top style=text-transform:uppercase>8102</td>
                                                <td align=left valign=top style=text-transform:uppercase>676</td>
                                                <td align=left valign=top style=text-transform:uppercase>122</td>
                                            </tr>
                                            <tr>
                                                <td align=left valign=top>6</td>
                                                <td align=left valign=top>Sachin Kumar</td>
                                                <td align=left valign=top>15-07-2025</td>
                                                <td align=left valign=top>sa.@sa.com</td>
                                                <td align=left valign=top></td>
                                                <td align=left valign=top>sa.@sa.com</td>
                                                <td align=left valign=top><a
                                                        href="display.html?ga=query&amp;view=1&amp;id=126742"
                                                        target=_blank>126742</a></td>
                                                <td align=left valign=top style=text-transform:uppercase>15-07-2025</td>
                                                <td align=left valign=top style=text-transform:uppercase>Mr. Kamal
                                                    Xavier </td>
                                                <td align=left valign=top style=text-transform:uppercase>Chennai</td>
                                                <td align=left valign=top style=text-transform:uppercase>1</td>
                                                <td align=left valign=top style=text-transform:uppercase>13062</td>
                                                <td align=left valign=top style=text-transform:uppercase>12964</td>
                                                <td align=left valign=top style=text-transform:uppercase>0</td>
                                                <td align=left valign=top style=text-transform:uppercase>0</td>
                                                <td align=left valign=top style=text-transform:uppercase>0</td>
                                                <td align=left valign=top style=text-transform:uppercase>0</td>
                                                <td align=left valign=top style=text-transform:uppercase>0</td>
                                                <td align=left valign=top style=text-transform:uppercase>12964</td>
                                                <td align=left valign=top style=text-transform:uppercase>84</td>
                                                <td align=left valign=top style=text-transform:uppercase>16</td>
                                            </tr>
                                            <tr>
                                                <td align=left valign=top>7</td>
                                                <td align=left valign=top>Sachin Kumar</td>
                                                <td align=left valign=top>07-07-2025</td>
                                                <td align=left valign=top>sa.@sa.com</td>
                                                <td align=left valign=top></td>
                                                <td align=left valign=top>sa.@sa.com</td>
                                                <td align=left valign=top><a
                                                        href="display.html?ga=query&amp;view=1&amp;id=126385"
                                                        target=_blank>126385</a></td>
                                                <td align=left valign=top style=text-transform:uppercase>07-07-2025</td>
                                                <td align=left valign=top style=text-transform:uppercase>Mr. Sandeep
                                                    Tarkesh </td>
                                                <td align=left valign=top style=text-transform:uppercase>Hyderabad</td>
                                                <td align=left valign=top style=text-transform:uppercase>1</td>
                                                <td align=left valign=top style=text-transform:uppercase>5650</td>
                                                <td align=left valign=top style=text-transform:uppercase>5630</td>
                                                <td align=left valign=top style=text-transform:uppercase>0</td>
                                                <td align=left valign=top style=text-transform:uppercase>0</td>
                                                <td align=left valign=top style=text-transform:uppercase>0</td>
                                                <td align=left valign=top style=text-transform:uppercase>0</td>
                                                <td align=left valign=top style=text-transform:uppercase>0</td>
                                                <td align=left valign=top style=text-transform:uppercase>5630</td>
                                                <td align=left valign=top style=text-transform:uppercase>563</td>
                                                <td align=left valign=top style=text-transform:uppercase>102</td>
                                            </tr>
                                            <tr>
                                                <td align=left valign=top>8</td>
                                                <td align=left valign=top>i2a Technologies</td>
                                                <td align=left valign=top>30-06-2025</td>
                                                <td align=left valign=top>sa.@sa.com</td>
                                                <td align=left valign=top>7986969798</td>
                                                <td align=left valign=top>sa.@sa.com</td>
                                                <td align=left valign=top><a
                                                        href="display.html?ga=query&amp;view=1&amp;id=125881"
                                                        target=_blank>125881</a></td>
                                                <td align=left valign=top style=text-transform:uppercase>01-07-2025</td>
                                                <td align=left valign=top style=text-transform:uppercase>Mr. Pranab
                                                </td>
                                                <td align=left valign=top style=text-transform:uppercase>Bali</td>
                                                <td align=left valign=top style=text-transform:uppercase>2</td>
                                                <td align=left valign=top style=text-transform:uppercase>182200</td>
                                                <td align=left valign=top style=text-transform:uppercase>83000</td>
                                                <td align=left valign=top style=text-transform:uppercase>34700</td>
                                                <td align=left valign=top style=text-transform:uppercase>43000</td>
                                                <td align=left valign=top style=text-transform:uppercase>6400</td>
                                                <td align=left valign=top style=text-transform:uppercase>0</td>
                                                <td align=left valign=top style=text-transform:uppercase>5</td>
                                                <td align=left valign=top style=text-transform:uppercase>167100</td>
                                                <td align=left valign=top style=text-transform:uppercase>5500</td>
                                                <td align=left valign=top style=text-transform:uppercase>990</td>
                                            </tr>
                                            <tr>
                                                <td align=left valign=top>9</td>
                                                <td align=left valign=top>i2a Technologies</td>
                                                <td align=left valign=top>23-06-2025</td>
                                                <td align=left valign=top>sa.@sa.com</td>
                                                <td align=left valign=top>9830154733</td>
                                                <td align=left valign=top>sa.@sa.com</td>
                                                <td align=left valign=top><a
                                                        href="display.html?ga=query&amp;view=1&amp;id=125271"
                                                        target=_blank>125271</a></td>
                                                <td align=left valign=top style=text-transform:uppercase>14-07-2025</td>
                                                <td align=left valign=top style=text-transform:uppercase>Mr. Nitin
                                                    Chandra </td>
                                                <td align=left valign=top style=text-transform:uppercase>Malaysia</td>
                                                <td align=left valign=top style=text-transform:uppercase>3</td>
                                                <td align=left valign=top style=text-transform:uppercase>86000</td>
                                                <td align=left valign=top style=text-transform:uppercase>0</td>
                                                <td align=left valign=top style=text-transform:uppercase>31002</td>
                                                <td align=left valign=top style=text-transform:uppercase>40706</td>
                                                <td align=left valign=top style=text-transform:uppercase>0</td>
                                                <td align=left valign=top style=text-transform:uppercase>0</td>
                                                <td align=left valign=top style=text-transform:uppercase>0</td>
                                                <td align=left valign=top style=text-transform:uppercase>71708</td>
                                                <td align=left valign=top style=text-transform:uppercase>12112</td>
                                                <td align=left valign=top style=text-transform:uppercase>2180</td>
                                            </tr>
                                            <tr>
                                                <td align=left valign=top>10</td>
                                                <td align=left valign=top>Anjana Thakur</td>
                                                <td align=left valign=top>20-06-2025</td>
                                                <td align=left valign=top>sa.@sa.com</td>
                                                <td align=left valign=top></td>
                                                <td align=left valign=top>sa.@sa.com</td>
                                                <td align=left valign=top><a
                                                        href="display.html?ga=query&amp;view=1&amp;id=124938"
                                                        target=_blank>124938</a></td>
                                                <td align=left valign=top style=text-transform:uppercase>25-06-2025</td>
                                                <td align=left valign=top style=text-transform:uppercase>Mr. Girja
                                                    Shanker Srivastava </td>
                                                <td align=left valign=top style=text-transform:uppercase> Goa</td>
                                                <td align=left valign=top style=text-transform:uppercase>2</td>
                                                <td align=left valign=top style=text-transform:uppercase>76673</td>
                                                <td align=left valign=top style=text-transform:uppercase>22890</td>
                                                <td align=left valign=top style=text-transform:uppercase>35490</td>
                                                <td align=left valign=top style=text-transform:uppercase>7000</td>
                                                <td align=left valign=top style=text-transform:uppercase>0</td>
                                                <td align=left valign=top style=text-transform:uppercase>0</td>
                                                <td align=left valign=top style=text-transform:uppercase>0</td>
                                                <td align=left valign=top style=text-transform:uppercase>65380</td>
                                                <td align=left valign=top style=text-transform:uppercase>9571</td>
                                                <td align=left valign=top style=text-transform:uppercase>1722</td>
                                            </tr>
                                            <tr>
                                                <td align=left valign=top>11</td>
                                                <td align=left valign=top>i2a Technologies</td>
                                                <td align=left valign=top>18-06-2025</td>
                                                <td align=left valign=top>sa.@sa.com</td>
                                                <td align=left valign=top></td>
                                                <td align=left valign=top>sa.@sa.com</td>
                                                <td align=left valign=top><a
                                                        href="display.html?ga=query&amp;view=1&amp;id=124806"
                                                        target=_blank>124806</a></td>
                                                <td align=left valign=top style=text-transform:uppercase>18-06-2025</td>
                                                <td align=left valign=top style=text-transform:uppercase>Mr. Nitin Verma
                                                </td>
                                                <td align=left valign=top style=text-transform:uppercase>Jaipur</td>
                                                <td align=left valign=top style=text-transform:uppercase>4</td>
                                                <td align=left valign=top style=text-transform:uppercase>27200</td>
                                                <td align=left valign=top style=text-transform:uppercase>0</td>
                                                <td align=left valign=top style=text-transform:uppercase>27174</td>
                                                <td align=left valign=top style=text-transform:uppercase>0</td>
                                                <td align=left valign=top style=text-transform:uppercase>0</td>
                                                <td align=left valign=top style=text-transform:uppercase>0</td>
                                                <td align=left valign=top style=text-transform:uppercase>0</td>
                                                <td align=left valign=top style=text-transform:uppercase>27174</td>
                                                <td align=left valign=top style=text-transform:uppercase>22</td>
                                                <td align=left valign=top style=text-transform:uppercase>4</td>
                                            </tr>
                                            <tr>
                                                <td align=left valign=top>12</td>
                                                <td align=left valign=top>Alok Kumar</td>
                                                <td align=left valign=top>16-06-2025</td>
                                                <td align=left valign=top>sa.@sa.com</td>
                                                <td align=left valign=top>8072985670</td>
                                                <td align=left valign=top>sa.@sa.com</td>
                                                <td align=left valign=top><a
                                                        href="display.html?ga=query&amp;view=1&amp;id=124677"
                                                        target=_blank>124677</a></td>
                                                <td align=left valign=top style=text-transform:uppercase>18-06-2025</td>
                                                <td align=left valign=top style=text-transform:uppercase>Mr. Tamil
                                                    Arasan </td>
                                                <td align=left valign=top style=text-transform:uppercase>Pattaya,
                                                    Bangkok</td>
                                                <td align=left valign=top style=text-transform:uppercase>2</td>
                                                <td align=left valign=top style=text-transform:uppercase>60000</td>
                                                <td align=left valign=top style=text-transform:uppercase>62614</td>
                                                <td align=left valign=top style=text-transform:uppercase>0</td>
                                                <td align=left valign=top style=text-transform:uppercase>20442</td>
                                                <td align=left valign=top style=text-transform:uppercase>0</td>
                                                <td align=left valign=top style=text-transform:uppercase>0</td>
                                                <td align=left valign=top style=text-transform:uppercase>5</td>
                                                <td align=left valign=top style=text-transform:uppercase>83056</td>
                                                <td align=left valign=top style=text-transform:uppercase>4735</td>
                                                <td align=left valign=top style=text-transform:uppercase>852</td>
                                            </tr>
                                            <tr>
                                                <td align=left valign=top>13</td>
                                                <td align=left valign=top>i2a Technologies</td>
                                                <td align=left valign=top>14-06-2025</td>
                                                <td align=left valign=top>sa.@sa.com</td>
                                                <td align=left valign=top>9340625218</td>
                                                <td align=left valign=top>sa.@sa.com</td>
                                                <td align=left valign=top><a
                                                        href="display.html?ga=query&amp;view=1&amp;id=124475"
                                                        target=_blank>124475</a></td>
                                                <td align=left valign=top style=text-transform:uppercase>30-06-2025</td>
                                                <td align=left valign=top style=text-transform:uppercase>Ms. Apurva
                                                    Bajpai </td>
                                                <td align=left valign=top style=text-transform:uppercase>Phuket, Krabi
                                                </td>
                                                <td align=left valign=top style=text-transform:uppercase>6</td>
                                                <td align=left valign=top style=text-transform:uppercase>201500</td>
                                                <td align=left valign=top style=text-transform:uppercase>110238</td>
                                                <td align=left valign=top style=text-transform:uppercase>34640</td>
                                                <td align=left valign=top style=text-transform:uppercase>46710</td>
                                                <td align=left valign=top style=text-transform:uppercase>0</td>
                                                <td align=left valign=top style=text-transform:uppercase>0</td>
                                                <td align=left valign=top style=text-transform:uppercase>0</td>
                                                <td align=left valign=top style=text-transform:uppercase>191588</td>
                                                <td align=left valign=top style=text-transform:uppercase>8400</td>
                                                <td align=left valign=top style=text-transform:uppercase>1512</td>
                                            </tr>
                                            <tr>
                                                <td align=left valign=top>14</td>
                                                <td align=left valign=top>Sunil S</td>
                                                <td align=left valign=top>11-06-2025</td>
                                                <td align=left valign=top>sa.@sa.com</td>
                                                <td align=left valign=top></td>
                                                <td align=left valign=top>sa.@sa.com</td>
                                                <td align=left valign=top><a
                                                        href="display.html?ga=query&amp;view=1&amp;id=124276"
                                                        target=_blank>124276</a></td>
                                                <td align=left valign=top style=text-transform:uppercase>04-07-2025</td>
                                                <td align=left valign=top style=text-transform:uppercase>Mr. Mr Rahul
                                                </td>
                                                <td align=left valign=top style=text-transform:uppercase>Malaysia</td>
                                                <td align=left valign=top style=text-transform:uppercase>10</td>
                                                <td align=left valign=top style=text-transform:uppercase>999999.5</td>
                                                <td align=left valign=top style=text-transform:uppercase>0</td>
                                                <td align=left valign=top style=text-transform:uppercase>0</td>
                                                <td align=left valign=top style=text-transform:uppercase>430686</td>
                                                <td align=left valign=top style=text-transform:uppercase>499662</td>
                                                <td align=left valign=top style=text-transform:uppercase>0</td>
                                                <td align=left valign=top style=text-transform:uppercase>5</td>
                                                <td align=left valign=top style=text-transform:uppercase>930348</td>
                                                <td align=left valign=top style=text-transform:uppercase>18672.5</td>
                                                <td align=left valign=top style=text-transform:uppercase>3362</td>
                                            </tr>
                                            <tr>
                                                <td align=left valign=top>15</td>
                                                <td align=left valign=top>i2a Technologies</td>
                                                <td align=left valign=top>05-06-2025</td>
                                                <td align=left valign=top>sa.@sa.com</td>
                                                <td align=left valign=top></td>
                                                <td align=left valign=top>sa.@sa.com</td>
                                                <td align=left valign=top><a
                                                        href="display.html?ga=query&amp;view=1&amp;id=123845"
                                                        target=_blank>123845</a></td>
                                                <td align=left valign=top style=text-transform:uppercase>05-06-2025</td>
                                                <td align=left valign=top style=text-transform:uppercase>Mrs. Renu Gupta
                                                </td>
                                                <td align=left valign=top style=text-transform:uppercase>Lucknow</td>
                                                <td align=left valign=top style=text-transform:uppercase>2</td>
                                                <td align=left valign=top style=text-transform:uppercase>20999.8</td>
                                                <td align=left valign=top style=text-transform:uppercase>19970</td>
                                                <td align=left valign=top style=text-transform:uppercase>0</td>
                                                <td align=left valign=top style=text-transform:uppercase>0</td>
                                                <td align=left valign=top style=text-transform:uppercase>0</td>
                                                <td align=left valign=top style=text-transform:uppercase>0</td>
                                                <td align=left valign=top style=text-transform:uppercase>0</td>
                                                <td align=left valign=top style=text-transform:uppercase>19970</td>
                                                <td align=left valign=top style=text-transform:uppercase>873</td>
                                                <td align=left valign=top style=text-transform:uppercase>158</td>
                                            </tr>
                                            <tr>
                                                <td align=left valign=top>16</td>
                                                <td align=left valign=top>i2a Technologies</td>
                                                <td align=left valign=top>05-06-2025</td>
                                                <td align=left valign=top>sa.@sa.com</td>
                                                <td align=left valign=top></td>
                                                <td align=left valign=top>sa.@sa.com</td>
                                                <td align=left valign=top><a
                                                        href="display.html?ga=query&amp;view=1&amp;id=123830"
                                                        target=_blank>123830</a></td>
                                                <td align=left valign=top style=text-transform:uppercase>05-06-2025</td>
                                                <td align=left valign=top style=text-transform:uppercase>Mr. Sanya Tour
                                                </td>
                                                <td align=left valign=top style=text-transform:uppercase>Thailand</td>
                                                <td align=left valign=top style=text-transform:uppercase>4</td>
                                                <td align=left valign=top style=text-transform:uppercase>82200.04</td>
                                                <td align=left valign=top style=text-transform:uppercase>79952</td>
                                                <td align=left valign=top style=text-transform:uppercase>0</td>
                                                <td align=left valign=top style=text-transform:uppercase>0</td>
                                                <td align=left valign=top style=text-transform:uppercase>0</td>
                                                <td align=left valign=top style=text-transform:uppercase>0</td>
                                                <td align=left valign=top style=text-transform:uppercase>0</td>
                                                <td align=left valign=top style=text-transform:uppercase>79952</td>
                                                <td align=left valign=top style=text-transform:uppercase>1906</td>
                                                <td align=left valign=top style=text-transform:uppercase>344</td>
                                            </tr>
                                            <tr>
                                                <td align=left valign=top>17</td>
                                                <td align=left valign=top>Khushi Gupta</td>
                                                <td align=left valign=top>03-06-2025</td>
                                                <td align=left valign=top>sa.@sa.com</td>
                                                <td align=left valign=top>6364407707</td>
                                                <td align=left valign=top>sa.@sa.com</td>
                                                <td align=left valign=top><a
                                                        href="display.html?ga=query&amp;view=1&amp;id=123636"
                                                        target=_blank>123636</a></td>
                                                <td align=left valign=top style=text-transform:uppercase>21-06-2025</td>
                                                <td align=left valign=top style=text-transform:uppercase>Mr. JVN Venyas
                                                </td>
                                                <td align=left valign=top style=text-transform:uppercase>Manali, Kufri
                                                </td>
                                                <td align=left valign=top style=text-transform:uppercase>2</td>
                                                <td align=left valign=top style=text-transform:uppercase>56500</td>
                                                <td align=left valign=top style=text-transform:uppercase>0</td>
                                                <td align=left valign=top style=text-transform:uppercase>42400</td>
                                                <td align=left valign=top style=text-transform:uppercase>0</td>
                                                <td align=left valign=top style=text-transform:uppercase>0</td>
                                                <td align=left valign=top style=text-transform:uppercase>0</td>
                                                <td align=left valign=top style=text-transform:uppercase>0</td>
                                                <td align=left valign=top style=text-transform:uppercase>42400</td>
                                                <td align=left valign=top style=text-transform:uppercase>12000</td>
                                                <td align=left valign=top style=text-transform:uppercase>2160</td>
                                            </tr>
                                            <tr>
                                                <td align=left valign=top>18</td>
                                                <td align=left valign=top>i2a Technologies</td>
                                                <td align=left valign=top>03-06-2025</td>
                                                <td align=left valign=top>sa.@sa.com</td>
                                                <td align=left valign=top>9891147498</td>
                                                <td align=left valign=top>sa.@sa.com</td>
                                                <td align=left valign=top><a
                                                        href="display.html?ga=query&amp;view=1&amp;id=123620"
                                                        target=_blank>123620</a></td>
                                                <td align=left valign=top style=text-transform:uppercase>05-06-2025</td>
                                                <td align=left valign=top style=text-transform:uppercase>Mr. Indu Sharma
                                                </td>
                                                <td align=left valign=top style=text-transform:uppercase>Dubai</td>
                                                <td align=left valign=top style=text-transform:uppercase>2</td>
                                                <td align=left valign=top style=text-transform:uppercase>138300</td>
                                                <td align=left valign=top style=text-transform:uppercase>60044</td>
                                                <td align=left valign=top style=text-transform:uppercase>14108</td>
                                                <td align=left valign=top style=text-transform:uppercase>23958</td>
                                                <td align=left valign=top style=text-transform:uppercase>13198</td>
                                                <td align=left valign=top style=text-transform:uppercase>0</td>
                                                <td align=left valign=top style=text-transform:uppercase>5</td>
                                                <td align=left valign=top style=text-transform:uppercase>111308</td>
                                                <td align=left valign=top style=text-transform:uppercase>17294</td>
                                                <td align=left valign=top style=text-transform:uppercase>3112</td>
                                            </tr>
                                            <tr>
                                                <td align=left valign=top>19</td>
                                                <td align=left valign=top>Anjana Thakur</td>
                                                <td align=left valign=top>02-06-2025</td>
                                                <td align=left valign=top>sa.@sa.com</td>
                                                <td align=left valign=top>8800178383</td>
                                                <td align=left valign=top>sa.@sa.com</td>
                                                <td align=left valign=top><a
                                                        href="display.html?ga=query&amp;view=1&amp;id=123544"
                                                        target=_blank>123544</a></td>
                                                <td align=left valign=top style=text-transform:uppercase>11-06-2025</td>
                                                <td align=left valign=top style=text-transform:uppercase>Mr. Amit
                                                    Rohtagi </td>
                                                <td align=left valign=top style=text-transform:uppercase>Dubai</td>
                                                <td align=left valign=top style=text-transform:uppercase>3</td>
                                                <td align=left valign=top style=text-transform:uppercase>196727.6</td>
                                                <td align=left valign=top style=text-transform:uppercase>89086</td>
                                                <td align=left valign=top style=text-transform:uppercase>65799</td>
                                                <td align=left valign=top style=text-transform:uppercase>0</td>
                                                <td align=left valign=top style=text-transform:uppercase>21287</td>
                                                <td align=left valign=top style=text-transform:uppercase>0</td>
                                                <td align=left valign=top style=text-transform:uppercase>5</td>
                                                <td align=left valign=top style=text-transform:uppercase>176172</td>
                                                <td align=left valign=top style=text-transform:uppercase>9482</td>
                                                <td align=left valign=top style=text-transform:uppercase>1706</td>
                                            </tr>
                                            <tr>
                                                <td align=left valign=top>20</td>
                                                <td align=left valign=top>Sunil S</td>
                                                <td align=left valign=top>28-05-2025</td>
                                                <td align=left valign=top>sa.@sa.com</td>
                                                <td align=left valign=top>9322292291</td>
                                                <td align=left valign=top>sa.@sa.com</td>
                                                <td align=left valign=top><a
                                                        href="display.html?ga=query&amp;view=1&amp;id=123070"
                                                        target=_blank>123070</a></td>
                                                <td align=left valign=top style=text-transform:uppercase>02-06-2025</td>
                                                <td align=left valign=top style=text-transform:uppercase>Ms. sweta
                                                    sahare </td>
                                                <td align=left valign=top style=text-transform:uppercase>Thailand</td>
                                                <td align=left valign=top style=text-transform:uppercase>2</td>
                                                <td align=left valign=top style=text-transform:uppercase>121000</td>
                                                <td align=left valign=top style=text-transform:uppercase>49086</td>
                                                <td align=left valign=top style=text-transform:uppercase>21894</td>
                                                <td align=left valign=top style=text-transform:uppercase>33420</td>
                                                <td align=left valign=top style=text-transform:uppercase>0</td>
                                                <td align=left valign=top style=text-transform:uppercase>0</td>
                                                <td align=left valign=top style=text-transform:uppercase>5</td>
                                                <td align=left valign=top style=text-transform:uppercase>104400</td>
                                                <td align=left valign=top style=text-transform:uppercase>9184</td>
                                                <td align=left valign=top style=text-transform:uppercase>1654</td>
                                            </tr>
                                            <tr>
                                                <td align=left valign=top>21</td>
                                                <td align=left valign=top>Anjana Thakur</td>
                                                <td align=left valign=top>23-05-2025</td>
                                                <td align=left valign=top>sa.@sa.com</td>
                                                <td align=left valign=top>8591222228</td>
                                                <td align=left valign=top>sa.@sa.com</td>
                                                <td align=left valign=top><a
                                                        href="display.html?ga=query&amp;view=1&amp;id=122748"
                                                        target=_blank>122748</a></td>
                                                <td align=left valign=top style=text-transform:uppercase>21-06-2025</td>
                                                <td align=left valign=top style=text-transform:uppercase>Mrs. Manvinder
                                                    Kaur </td>
                                                <td align=left valign=top style=text-transform:uppercase>Kathmandu ,
                                                    Pokhara </td>
                                                <td align=left valign=top style=text-transform:uppercase>2</td>
                                                <td align=left valign=top style=text-transform:uppercase>33250</td>
                                                <td align=left valign=top style=text-transform:uppercase>0</td>
                                                <td align=left valign=top style=text-transform:uppercase>0</td>
                                                <td align=left valign=top style=text-transform:uppercase>26000</td>
                                                <td align=left valign=top style=text-transform:uppercase>0</td>
                                                <td align=left valign=top style=text-transform:uppercase>0</td>
                                                <td align=left valign=top style=text-transform:uppercase>0</td>
                                                <td align=left valign=top style=text-transform:uppercase>26000</td>
                                                <td align=left valign=top style=text-transform:uppercase>6144</td>
                                                <td align=left valign=top style=text-transform:uppercase>1106</td>
                                            </tr>
                                            <tr>
                                                <td align=left valign=top>22</td>
                                                <td align=left valign=top>Anjana Thakur</td>
                                                <td align=left valign=top>16-05-2025</td>
                                                <td align=left valign=top>sa.@sa.com</td>
                                                <td align=left valign=top>9891532266</td>
                                                <td align=left valign=top>sa.@sa.com</td>
                                                <td align=left valign=top><a
                                                        href="display.html?ga=query&amp;view=1&amp;id=122140"
                                                        target=_blank>122140</a></td>
                                                <td align=left valign=top style=text-transform:uppercase>02-06-2025</td>
                                                <td align=left valign=top style=text-transform:uppercase>Mr. Rajeev
                                                    Anand </td>
                                                <td align=left valign=top style=text-transform:uppercase>Phuket</td>
                                                <td align=left valign=top style=text-transform:uppercase>8</td>
                                                <td align=left valign=top style=text-transform:uppercase>407169</td>
                                                <td align=left valign=top style=text-transform:uppercase>211120</td>
                                                <td align=left valign=top style=text-transform:uppercase>181627</td>
                                                <td align=left valign=top style=text-transform:uppercase>4872</td>
                                                <td align=left valign=top style=text-transform:uppercase>0</td>
                                                <td align=left valign=top style=text-transform:uppercase>0</td>
                                                <td align=left valign=top style=text-transform:uppercase>5</td>
                                                <td align=left valign=top style=text-transform:uppercase>397619</td>
                                                <td align=left valign=top style=text-transform:uppercase>8094</td>
                                                <td align=left valign=top style=text-transform:uppercase>1456</td>
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
@endsection
