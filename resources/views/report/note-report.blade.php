@extends('layouts.app')
@section('content')

<div class=wrapper>
    <div class=container-fluid>
        <div class=main-content>
            <div class=page-content>
                <div class=newboxheading>
                    <div class=newhead>Notes Report<div class=newoptionmenu>
                            <form action="" enctype=multipart/form-data>
                                <table border=0 cellpadding=0 cellspacing=0>
                                    <tbody>
                                        <tr>
                                            <td><input class="form-control hasDatepicker" id=startDate name=startDate
                                                    readonly placeholder=From value=30-08-2026 style=width:130px></td>
                                            <td style=padding-left:5px><input class="form-control hasDatepicker"
                                                    id=endDate name=endDate readonly placeholder=From value=29-09-2026
                                                    style=width:130px></td>
                                            <td style=padding-left:5px><input name=keyword class=form-control
                                                    placeholder="Search by ID, name, email, mobile" style=width:150px>
                                                <input name=page type=hidden><input name=ga type=hidden
                                                    value=notesreport>
                                            </td>
                                            <td style=padding-left:5px><select name=searchcity class=form-control
                                                    style=width:130px>
                                                    <option value="">All Destinations</option>
                                                    <option value=48436>Delhi Airport</option>
                                                    <option value=371>Guwahati</option>
                                                    <option value=31247>Muscat</option>
                                                    <option value=38422>Girona</option>
                                                    <option value=475>Bihar</option>
                                                    <option value=4601>Balrampur</option>
                                                    <option value=44461>Poland</option>
                                                    <option value=21838>al-Hadithah</option>
                                                    <option value=39908>Nakhon Thai</option>
                                                    <option value=46423>Longview</option>
                                                    <option value=42405>Irvine</option>
                                                    <option value=43791>North Fort Myers</option>
                                                    <option value=43131>Northridge</option>
                                                    <option value=43361>West Covina</option>
                                                    <option value=4460>Hyderabad</option>
                                                    <option value=5583>Kolkata</option>
                                                    <option value=3378>Jaipur</option>
                                                    <option value=3540>Gangtok</option>
                                                    <option value=43412>Englewood</option>
                                                    <option value=48724>JAPAN</option>
                                                    <option value=43929>Atlanta</option>
                                                    <option value=5236>Dehradun</option>
                                                    <option value=47712>Nutley</option>
                                                    <option value=48390>Manali,Shimla</option>
                                                    <option value=45299>Houston</option>
                                                    <option value=2229>Indore</option>
                                                    <option value=48333>Himachal</option>
                                                    <option value=10457>Perth</option>
                                                    <option value=46054>Lansdowne</option>
                                                    <option value=48720>Darjeeling</option>
                                                    <option value=42709>Glendale</option>
                                                    <option value=48458>Meghalaya</option>
                                                    <option value=29799>Nepalganj</option>
                                                    <option value=706>Delhi</option>
                                                    <option value=5297>Roorkee</option>
                                                    <option value=4933>Lucknow</option>
                                                    <option value=48347>Mussoorie</option>
                                                    <option value=4050>OOTY</option>
                                                    <option value=5283>Nainital</option>
                                                    <option value=5312>24 Parganas (n)</option>
                                                    <option value=48466>Goa</option>
                                                    <option value=27587>China</option>
                                                    <option value=21468>Kuta</option>
                                                    <option value=38254>Barcelona</option>
                                                    <option value=48346>Mcleodganj</option>
                                                    <option value=9366>Colombo</option>
                                                    <option value=3659>Chennai</option>
                                                    <option value=48742>Chardham</option>
                                                    <option value=48699>Delhi Shimla Manali Delhi</option>
                                                    <option value=25534>Washington</option>
                                                    <option value=744>Miramar</option>
                                                    <option value=38841>Portugalete</option>
                                                    <option value=33215>Brazii</option>
                                                    <option value=10519>Toronto</option>
                                                    <option value=1233>Kasauli</option>
                                                    <option value=32250>Manila</option>
                                                    <option value=4014>Narasingapuram</option>
                                                    <option value=6496>San Francisco</option>
                                                    <option value=27612>Cancuc</option>
                                                    <option value=42633>Jacksonville</option>
                                                    <option value=43449>Sanford</option>
                                                    <option value=46171>Waynesboro</option>
                                                    <option value=13697>Nassau</option>
                                                    <option value=43614>Brownsville</option>
                                                    <option value=48465>Cochin</option>
                                                    <option value=48697>Cochin</option>
                                                    <option value=21465>Denpasar</option>
                                                    <option value=48738>Hong Kong</option>
                                                    <option value=10322>Crystal Beach</option>
                                                    <option value=205>Port Blair</option>
                                                    <option value=48729>Azerbaijan</option>
                                                    <option value=1558>Bengaluru</option>
                                                    <option value=33080>Aguadilla</option>
                                                    <option value=44039>Savannah</option>
                                                    <option value=48762>Saint Lucia</option>
                                                    <option value=31773>Panama</option>
                                                    <option value=45448>Fulton</option>
                                                    <option value=10400>London</option>
                                                    <option value=48073>Rome</option>
                                                    <option value=45577>Las Vegas</option>
                                                    <option value=45628>Brooklyn</option>
                                                    <option value=44173>Chicago</option>
                                                    <option value=43618>Cape Coral</option>
                                                    <option value=43629>Coconut Creek</option>
                                                    <option value=48760>Jamaica</option>
                                                    <option value=42317>Newark</option>
                                                    <option value=40673>Istanbul</option>
                                                    <option value=48759>Barbados</option>
                                                    <option value=48763>Hedonism II Resort</option>
                                                    <option value=12981>San Diego</option>
                                                    <option value=20758>Antigua</option>
                                                    <option value=43070>Los Angeles</option>
                                                    <option value=6646>Miami</option>
                                                    <option value=45257>Austin</option>
                                                    <option value=45477>Mexico</option>
                                                    <option value=21472>Ubud</option>
                                                    <option value=47950>Hempstead</option>
                                                    <option value=44965>Jamaica Plain</option>
                                                    <option value=47754>Hillside</option>
                                                    <option value=30178>Amsterdam</option>
                                                    <option value=6554>Aruba</option>
                                                    <option value=48019>New York</option>
                                                    <option value=48732>UAE</option>
                                                    <option value=12894>Puerto Rico</option>
                                                    <option value=8076>Belize</option>
                                                    <option value=43228>Sacramento</option>
                                                    <option value=42832>Bakersfield</option>
                                                    <option value=43151>Oxnard</option>
                                                    <option value=48757>Phuket and Krabi</option>
                                                    <option value=42912>Corona</option>
                                                    <option value=43609>Boynton Beach</option>
                                                    <option value=25085>Tokyo</option>
                                                    <option value=43809>Orlando</option>
                                                    <option value=40161>Carthage</option>
                                                    <option value=45111>Dearborn</option>
                                                    <option value=40332>Antalya</option>
                                                    <option value=39858>Krabi</option>
                                                    <option value=44455>Noblesville</option>
                                                    <option value=45100>Charlotte</option>
                                                    <option value=19089>Hamburg</option>
                                                    <option value=46466>Plano</option>
                                                    <option value=6571>Melbourne</option>
                                                    <option value=43515>New Haven</option>
                                                    <option value=43138>Oakland</option>
                                                    <option value=45377>Grenada</option>
                                                    <option value=27725>Madera</option>
                                                    <option value=42813>Anderson</option>
                                                    <option value=14845>Dubi</option>
                                                    <option value=1222>Dharamshala</option>
                                                    <option value=11182>Beijing</option>
                                                    <option value=46965>Milwaukee</option>
                                                    <option value=31118>Bali</option>
                                                    <option value=41872>Oxford</option>
                                                    <option value=48758>Bangkok and Pattaya</option>
                                                    <option value=3548>Sikkim</option>
                                                    <option value=6>Adivivaram</option>
                                                    <option value=48464>Alleppey</option>
                                                    <option value=1590>Coorg</option>
                                                    <option value=10453>Paris</option>
                                                    <option value=48362>Uttrakhand</option>
                                                    <option value=48321>Ladakh</option>
                                                    <option value=48753>Tanzania</option>
                                                    <option value=39596>Zurich</option>
                                                    <option value=48749>Atlantis Dubai</option>
                                                    <option value=32882>A Ver-o-Mar</option>
                                                    <option value=2707>Mumbai</option>
                                                    <option value=41006>Turkeli</option>
                                                    <option value=48701>Umrah</option>
                                                    <option value=37420>Makkah</option>
                                                    <option value=48745>Malaysia</option>
                                                    <option value=10324>Delhi</option>
                                                    <option value=48469>Manali</option>
                                                    <option value=48744>Lakshadweep</option>
                                                    <option value=48456>GULMARG, KASHMIR, INDIA</option>
                                                    <option value=1237>Manali</option>
                                                    <option value=1341>Srinagar</option>
                                                    <option value=16652>Krabi</option>
                                                    <option value=29790>Kathmandu</option>
                                                    <option value=3>Port Blair</option>
                                                    <option value=48540>Kenya</option>
                                                    <option value=48319>HANOI</option>
                                                    <option value=48740>Singapore with Cruise</option>
                                                    <option value=48741>Singapore+Malaysia</option>
                                                    <option value=48475>Jammu &amp; Kashmir</option>
                                                    <option value=48735>Mauritius</option>
                                                    <option value=48467>EUROPE</option>
                                                    <option value=48734>Sri Lanka</option>
                                                    <option value=48472>Maldives</option>
                                                    <option value=39824>Bangkhen</option>
                                                    <option value=5211>Varanasi</option>
                                                    <option value=48361>Kerala</option>
                                                    <option value=48473>Pattaya</option>
                                                    <option value=48686>Switzerland</option>
                                                    <option value=48335>Andaman</option>
                                                    <option value=48317>Europe</option>
                                                    <option value=48743>Seychelles</option>
                                                    <option value=733>Goa</option>
                                                    <option value=48332>Uttarakhand</option>
                                                    <option value=25507>Nairobi</option>
                                                    <option value=48739>Kuala Lumpur</option>
                                                    <option value=5264>Kedarnath</option>
                                                    <option value=48366>Kashmir</option>
                                                    <option value=39825>Bangkok</option>
                                                    <option value=39915>Phuket</option>
                                                    <option value=48685>Vietnam</option>
                                                    <option value=10070>Bali</option>
                                                    <option value=41391>Dubai</option>
                                                    <option value=48316>Maldives</option>
                                                    <option value=3306>Bali</option>
                                                    <option value=48368>Thailand</option>
                                                    <option value=37541>Singapore</option>
                                                </select></td>
                                            <td style=padding-left:5px><select name=searchusers class=form-control
                                                    style=width:130px>
                                                    <option value="">All Users</option>
                                                    <option value=4021>Zuhair Abbas </option>
                                                    <option value=4070>Yuvraj Singh</option>
                                                    <option value=4061>Yatin y</option>
                                                    <option value=4053>Yashika Sharma</option>
                                                    <option value=4025>vivek kumar</option>
                                                    <option value=4077>Vinay singh</option>
                                                    <option value=4080>vidur vs</option>
                                                    <option value=4020>Vaasu Arora </option>
                                                    <option value=4018>umesh singh</option>
                                                    <option value=4045>Tannu T</option>
                                                    <option value=4015>Swapnil Sinha</option>
                                                    <option value=4046>Suraj Sahu</option>
                                                    <option value=4050>Sunil S</option>
                                                    <option value=4012>Sujeet Kumar</option>
                                                    <option value=4048>Suchita Massey</option>
                                                    <option value=4022>Shivani Sharma</option>
                                                    <option value=4016>Saurabh Rai</option>
                                                    <option value=4017>Sajad Khan</option>
                                                    <option value=4044>Sachin Singh Maher</option>
                                                    <option value=4013>Sachin Kumar</option>
                                                    <option value=4023>Radha R</option>
                                                    <option value=4030>Prashant Kumar Sharma</option>
                                                    <option value=4043>Prashant Sharma</option>
                                                    <option value=4040>Pintu Kumar</option>
                                                    <option value=4052>Noman Ahmed </option>
                                                    <option value=4014>Nishant Kumar</option>
                                                    <option value=4054>Neha Singh </option>
                                                    <option value=4029>Mohsin Hussain</option>
                                                    <option value=4073>Mohd Arsh Khan</option>
                                                    <option value=4076>MIS i2a</option>
                                                    <option value=4071>Khushi Gupta</option>
                                                    <option value=4051>Kavita Shahi</option>
                                                    <option value=4075>Jennifer Chanu</option>
                                                    <option value=4026>Jake AS</option>
                                                    <option value=1>i2a Technologies</option>
                                                    <option value=4038>Honey hm</option>
                                                    <option value=4027>Harshita Singh</option>
                                                    <option value=4019>Gokul K</option>
                                                    <option value=4049>Ekta Shrestha</option>
                                                    <option value=4028>Daud Khan</option>
                                                    <option value=4024>Ayush Pandey</option>
                                                    <option value=4055>Ayush Gupta</option>
                                                    <option value=4072>Anjana Thakur</option>
                                                    <option value=4047>Anjali A</option>
                                                    <option value=4068>Alok Kumar</option>
                                                    <option value=4057>Akshay Chikara</option>
                                                    <option value=4069>Akash Shrestha</option>
                                                    <option value=4074>Adarsh Ojha</option>
                                                </select></td>
                                            <td style=padding-left:5px><button type=submit
                                                    class="btn btn-secondary btn-lg waves-effect waves-light"
                                                    style="padding:6px 10px"><i class="fa fa-search" aria-hidden=true></i>
                                                    Search</button></td>
                                            <td style=padding-left:5px><a href="display.html?ga=query"><button
                                                        type=submit
                                                        class="btn btn-secondary btn-lg waves-effect waves-light"
                                                        style="padding:6px 10px">All</button></a></td>
                                            <td>&nbsp;</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="col-md-12 col-xl-12" style=padding-top:32px>
                        <div class=card style=min-height:500px>
                            <div class=card-body style=padding:0>
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Client</th>
                                            <th>Source</th>
                                            <th>Notes</th>
                                            <th>Destination</th>
                                            <th>Pax</th>
                                            <th>Status</th>
                                            <th>Assigned To </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                                <div style="text-align:center;padding:40px 0;font-size:14px;color:#999">No Query</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
