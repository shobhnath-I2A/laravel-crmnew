@extends('layouts.app')
@section('content')

</div>

<style>

.table td, .table th {

    vertical-align: top;

}

.statusbox{margin-right: 5px; padding: 10px; text-align: center; background-color: #000000; font-size: 13px; color: #fff; border-radius: 4px; text-transform:uppercase;}

.notes{font-size: 12px; background-color: #FFFFCC; border: 1px solid #FFCC33; padding: 0px 5px; color: #ff6a00; font-weight: 600; float: left; margin-top: 2px; border-radius: 2px;}




/*
.container-fluid {

    max-width: 100%;
    padding-left: 92px;
    padding-right: 22px;
    padding-top: 8px;
  }
  .wrapper {
    margin-top: 56px;
    padding-left: 20px;
  }
  .card {
    -webkit-box-shadow: 0 0 1.25rem rgb(255 255 255 / 10%);
    box-shadow: 0 0 1.25rem rgb(255 255 255 / 10%);
  }
  .table>tbody>tr>td,
  .table>tfoot>tr>td,
  .table>thead>tr>td {
    padding: 10px 12px;
  } */
</style>

<div class="wrapper">
  <div class="container-fluid">
    <div class="main-content">
      <div class="page-content">
        <div class="newboxheading">
          <div class="newhead">Queries
            <div class="newoptionmenu">
                <div>
                  <a onclick="$('.searchquerymain').toggle();"><button type="button" class="btn btn-secondary btn-lg waves-effect waves-light btn-primary-gray" style="margin-bottom:10px;">
                      <i class="fa fa-filter" aria-hidden="true"></i> Filter</button></a>
                </div>
                <div>
                  <button type="button" class="btn btn-secondary btn-lg waves-effect waves-light btn-primary-gray hideinmobile" data-toggle="dropdown" aria-expanded="false" style="margin-bottom:10px;">
                    Options <i class="fa fa-angle-down" aria-hidden="true"></i></button>
                  <div class="dropdown-menu" style="position: absolute; transform: translate3d(1222px, 224px, 0px); top: 0px; left: 0px; will-change: transform;" x-placement="bottom-start">
                    <a class="dropdown-item" style="cursor:pointer;" href="client-Import.xls" target="_blank">Download Excel Format</a><a class="dropdown-item" style="cursor:pointer;" onclick="loadpop('Import',this,'400px')" data-toggle="modal" data-target=".bs-example-modal-center" popaction="action=importFBleads">Import Excel</a><a class="dropdown-item" style="cursor:pointer;" href="http://localhost:8081/crmreview/exportQuery.php?startDate=&endDate=&statusid=&searchcity=&searchsource=&searchconfirmproposal=&searchusers=&keyword=&keyword=" target="_blank">Export Data</a>
                  </div>
                </div>
                <div>
                    <a href="getloadfromdocs.php" target="actoinfrm"><button type="button" class="btn btn-secondary btn-lg waves-effect waves-light btn-primary-gray" style="margin-bottom:10px;" onclick="$('#loadleads').show();">
                        Load Leads <img src="loadleads.webp" style="width:16px;display:none;" id="loadleads" /></button></a>
                </div>
                <div>
                  <a onclick="openSidebar('Create Query','/queries/create')"><button type="button" class="btn btn-secondary btn-lg waves-effect waves-light" style="margin-bottom:10px;">Add Query</button></a>
                </div>
            </div>
          </div>
        </div>
        @if ($errors->any())
        <script>
        $(document).ready(function(){

            $('.crm-sidebar').show();
            $('body').css('overflow','hidden');

        });
        </script>
        @endif
        <!-- start page title -->
        {{-- <div class="row">
          <div class="col-md-12 col-xl-12" style="margin-left: 5px; margin-top: 35px;">
            <div class="card" style="min-height:500px;    border-radius: 0px; margin-bottom:0px; background-color:transparent;">
              <div class="card-body" style="padding:0px;">
                <div class="hideinmobile searchquerymain" style="  margin-bottom: 10px; float: left; width: 100%; border-top: 1px solid #dee2e6; border-bottom: 2px solid #dee2e6; background-color: #f3f3f3; padding: 8px;">
                  <div class="row" style="margin-right: 0px; margin-left: 0px;">
                    <div class="col-md-3 col-xl-3 ">
                      <form action="" method="get" enctype="multipart/form-data" class="querytabsleadsearch ">
                        <table border="0" cellpadding="0" cellspacing="0">
                          <tr>
                            <td><input type="text" class="form-control" id="startDate" name="startDate" readonly="" placeholder="From" value="" style="width:130px;"></td>
                            <td style="padding-left:5px;"><input type="text" class="form-control" id="endDate" name="endDate" readonly="" placeholder="From" value="" style="width:130px;"></td>
                            <td style="padding-left:5px;"><input type="text" name="keyword" class="form-control" placeholder="Search by ID, name, email, mobile" value="" style=" width:250px;">
                              <input name="page" type="hidden" value="1" /><input name="ga" type="hidden" value="query" />
                            </td>
                            <td style="padding-left:5px;"><select name="searchcity" class="form-control" style="width:160px;">
                                <option value="">All Destinations</option>
                                                                  <option value="7942" >Affligem</option>
                                                                  <option value="33466" >Abramut</option>
                                                                  <option value="47511" >Mumbwa</option>
                                                                  <option value="21838" >al-Hadithah</option>
                                                                  <option value="39908" >Nakhon Thai</option>
                                                                  <option value="46423" >Longview</option>
                                                                  <option value="42405" >Irvine</option>
                                                                  <option value="43791" >North Fort Myers</option>
                                                                  <option value="43131" >Northridge</option>
                                                                  <option value="43361" >West Covina</option>
                                                                  <option value="4460" >Hyderabad</option>
                                                                  <option value="5583" >Kolkata</option>
                                                                  <option value="3378" >Jaipur</option>
                                                                  <option value="3540" >Gangtok</option>
                                                                  <option value="43412" >Englewood</option>
                                                                  <option value="48724" >JAPAN</option>
                                                                  <option value="43929" >Atlanta</option>
                                                                  <option value="5236" >Dehradun</option>
                                                                  <option value="47712" >Nutley</option>
                                                                  <option value="48390" >Manali,Shimla</option>
                                                                  <option value="45299" >Houston</option>
                                                                  <option value="2229" >Indore</option>
                                                                  <option value="48333" >Himachal</option>
                                                                  <option value="10457" >Perth</option>
                                                                  <option value="46054" >Lansdowne</option>
                                                                  <option value="48720" >Darjeeling</option>
                                                                  <option value="42709" >Glendale</option>
                                                                  <option value="48458" >Meghalaya</option>
                                                                  <option value="29799" >Nepalganj</option>
                                                                  <option value="706" >Delhi</option>
                                                                  <option value="5297" >Roorkee</option>
                                                                  <option value="4933" >Lucknow</option>
                                                                  <option value="48347" >Mussoorie</option>
                                                                  <option value="4050" >OOTY</option>
                                                                  <option value="5283" >Nainital</option>
                                                                  <option value="5312" >24 Parganas (n)</option>
                                                                  <option value="48466" >Goa</option>
                                                                  <option value="27587" >China</option>
                                                                  <option value="21468" >Kuta</option>
                                                                  <option value="38254" >Barcelona</option>
                                                                  <option value="48346" >Mcleodganj</option>
                                                                  <option value="9366" >Colombo</option>
                                                                  <option value="3659" >Chennai</option>
                                                                  <option value="48742" >Chardham</option>
                                                                  <option value="48699" >Delhi Shimla Manali Delhi</option>
                                                                  <option value="25534" >Washington</option>
                                                                  <option value="744" >Miramar</option>
                                                                  <option value="38841" >Portugalete</option>
                                                                  <option value="33215" >Brazii</option>
                                                                  <option value="10519" >Toronto</option>
                                                                  <option value="1233" >Kasauli</option>
                                                                  <option value="32250" >Manila</option>
                                                                  <option value="4014" >Narasingapuram</option>
                                                                  <option value="6496" >San Francisco</option>
                                                                  <option value="27612" >Cancuc</option>
                                                                  <option value="42633" >Jacksonville</option>
                                                                  <option value="43449" >Sanford</option>
                                                                  <option value="46171" >Waynesboro</option>
                                                                  <option value="13697" >Nassau</option>
                                                                  <option value="43614" >Brownsville</option>
                                                                  <option value="48465" >Cochin</option>
                                                                  <option value="48697" >Cochin</option>
                                                                  <option value="21465" >Denpasar</option>
                                                                  <option value="48738" >Hong Kong</option>
                                                                  <option value="10322" >Crystal Beach</option>
                                                                  <option value="205" >Port Blair</option>
                                                                  <option value="48729" >Azerbaijan</option>
                                                                  <option value="1558" >Bengaluru</option>
                                                                  <option value="33080" >Aguadilla</option>
                                                                  <option value="44039" >Savannah</option>
                                                                  <option value="48762" >Saint Lucia</option>
                                                                  <option value="31773" >Panama</option>
                                                                  <option value="45448" >Fulton</option>
                                                                  <option value="10400" >London</option>
                                                                  <option value="48073" >Rome</option>
                                                                  <option value="45577" >Las Vegas</option>
                                                                  <option value="45628" >Brooklyn</option>
                                                                  <option value="44173" >Chicago</option>
                                                                  <option value="43618" >Cape Coral</option>
                                                                  <option value="43629" >Coconut Creek</option>
                                                                  <option value="48760" >Jamaica</option>
                                                                  <option value="42317" >Newark</option>
                                                                  <option value="40673" >Istanbul</option>
                                                                  <option value="48759" >Barbados</option>
                                                                  <option value="48763" >Hedonism II Resort</option>
                                                                  <option value="12981" >San Diego</option>
                                                                  <option value="20758" >Antigua</option>
                                                                  <option value="43070" >Los Angeles</option>
                                                                  <option value="6646" >Miami</option>
                                                                  <option value="45257" >Austin</option>
                                                                  <option value="45477" >Mexico</option>
                                                                  <option value="21472" >Ubud</option>
                                                                  <option value="47950" >Hempstead</option>
                                                                  <option value="44965" >Jamaica Plain</option>
                                                                  <option value="47754" >Hillside</option>
                                                                  <option value="30178" >Amsterdam</option>
                                                                  <option value="6554" >Aruba</option>
                                                                  <option value="48019" >New York</option>
                                                                  <option value="48732" >UAE</option>
                                                                  <option value="12894" >Puerto Rico</option>
                                                                  <option value="8076" >Belize</option>
                                                                  <option value="43228" >Sacramento</option>
                                                                  <option value="42832" >Bakersfield</option>
                                                                  <option value="43151" >Oxnard</option>
                                                                  <option value="48757" >Phuket and Krabi</option>
                                                                  <option value="42912" >Corona</option>
                                                                  <option value="43609" >Boynton Beach</option>
                                                                  <option value="25085" >Tokyo</option>
                                                                  <option value="43809" >Orlando</option>
                                                                  <option value="40161" >Carthage</option>
                                                                  <option value="45111" >Dearborn</option>
                                                                  <option value="40332" >Antalya</option>
                                                                  <option value="39858" >Krabi</option>
                                                                  <option value="44455" >Noblesville</option>
                                                                  <option value="45100" >Charlotte</option>
                                                                  <option value="19089" >Hamburg</option>
                                                                  <option value="46466" >Plano</option>
                                                                  <option value="6571" >Melbourne</option>
                                                                  <option value="43515" >New Haven</option>
                                                                  <option value="43138" >Oakland</option>
                                                                  <option value="45377" >Grenada</option>
                                                                  <option value="27725" >Madera</option>
                                                                  <option value="42813" >Anderson</option>
                                                                  <option value="14845" >Dubi</option>
                                                                  <option value="1222" >Dharamshala</option>
                                                                  <option value="11182" >Beijing</option>
                                                                  <option value="46965" >Milwaukee</option>
                                                                  <option value="31118" >Bali</option>
                                                                  <option value="41872" >Oxford</option>
                                                                  <option value="48758" >Bangkok and Pattaya</option>
                                                                  <option value="3548" >Sikkim</option>
                                                                  <option value="6" >Adivivaram</option>
                                                                  <option value="48464" >Alleppey</option>
                                                                  <option value="1590" >Coorg</option>
                                                                  <option value="10453" >Paris</option>
                                                                  <option value="48362" >Uttrakhand</option>
                                                                  <option value="48321" >Ladakh</option>
                                                                  <option value="48753" >Tanzania</option>
                                                                  <option value="39596" >Zurich</option>
                                                                  <option value="48749" >Atlantis Dubai</option>
                                                                  <option value="32882" >A Ver-o-Mar</option>
                                                                  <option value="2707" >Mumbai</option>
                                                                  <option value="41006" >Turkeli</option>
                                                                  <option value="48701" >Umrah</option>
                                                                  <option value="37420" >Makkah</option>
                                                                  <option value="48745" >Malaysia</option>
                                                                  <option value="10324" >Delhi</option>
                                                                  <option value="48469" >Manali</option>
                                                                  <option value="48744" >Lakshadweep</option>
                                                                  <option value="48456" >GULMARG, KASHMIR, INDIA</option>
                                                                  <option value="1237" >Manali</option>
                                                                  <option value="1341" >Srinagar</option>
                                                                  <option value="16652" >Krabi</option>
                                                                  <option value="29790" >Kathmandu</option>
                                                                  <option value="3" >Port Blair</option>
                                                                  <option value="48540" >Kenya</option>
                                                                  <option value="48319" >HANOI</option>
                                                                  <option value="48740" >Singapore with Cruise</option>
                                                                  <option value="48741" >Singapore+Malaysia</option>
                                                                  <option value="48475" >Jammu & Kashmir</option>
                                                                  <option value="48735" >Mauritius</option>
                                                                  <option value="48467" >EUROPE</option>
                                                                  <option value="48734" >Sri Lanka</option>
                                                                  <option value="48472" >Maldives</option>
                                                                  <option value="39824" >Bangkhen</option>
                                                                  <option value="5211" >Varanasi</option>
                                                                  <option value="48361" >Kerala</option>
                                                                  <option value="48473" >Pattaya</option>
                                                                  <option value="48686" >Switzerland</option>
                                                                  <option value="48335" >Andaman</option>
                                                                  <option value="48317" >Europe</option>
                                                                  <option value="48743" >Seychelles</option>
                                                                  <option value="733" >Goa</option>
                                                                  <option value="48332" >Uttarakhand</option>
                                                                  <option value="25507" >Nairobi</option>
                                                                  <option value="48739" >Kuala Lumpur</option>
                                                                  <option value="5264" >Kedarnath</option>
                                                                  <option value="48366" >Kashmir</option>
                                                                  <option value="39825" >Bangkok</option>
                                                                  <option value="39915" >Phuket</option>
                                                                  <option value="48685" >Vietnam</option>
                                                                  <option value="10070" >Bali</option>
                                                                  <option value="41391" >Dubai</option>
                                                                  <option value="48316" >Maldives</option>
                                                                  <option value="3306" >Bali</option>
                                                                  <option value="48368" >Thailand</option>
                                                                  <option value="37541" >Singapore</option>
                                                              </select></td>
                             <td style="padding-left:5px;"><select name="searchusers" class="form-control" style="width:130px;">
                                  <option value="">All Users</option>
                                                                      <option value="4021" >Zuhair  Abbas	</option>
                                                                      <option value="4070" >Yuvraj  Singh</option>
                                                                      <option value="4061" >Yatin y</option>
                                                                      <option value="4053" >Yashika Sharma</option>
                                                                      <option value="4025" >vivek kumar</option>
                                                                      <option value="4077" >Vinay singh</option>
                                                                      <option value="4020" >Vaasu  Arora	</option>
                                                                      <option value="4018" >umesh singh</option>
                                                                      <option value="4045" >Tannu T</option>
                                                                      <option value="4015" >Swapnil Sinha</option>
                                                                      <option value="4046" >Suraj Sahu</option>
                                                                      <option value="4050" >Sunil S</option>
                                                                      <option value="4012" >Sujeet Kumar</option>
                                                                      <option value="4048" >Suchita Massey</option>
                                                                      <option value="4078" >shobhnath l2a</option>
                                                                      <option value="4022" >Shivani Sharma</option>
                                                                      <option value="4016" >Saurabh Rai</option>
                                                                      <option value="4017" >Sajad Khan</option>
                                                                      <option value="4044" >Sachin  Singh Maher</option>
                                                                      <option value="4013" >Sachin Kumar</option>
                                                                      <option value="4023" >Radha R</option>
                                                                      <option value="4030" >Prashant Kumar Sharma</option>
                                                                      <option value="4043" >Prashant Sharma</option>
                                                                      <option value="4040" >Pintu Kumar</option>
                                                                      <option value="4052" >Noman  Ahmed	</option>
                                                                      <option value="4014" >Nishant Kumar</option>
                                                                      <option value="4054" >Neha  Singh	</option>
                                                                      <option value="4029" >Mohsin Hussain</option>
                                                                      <option value="4073" >Mohd Arsh Khan</option>
                                                                      <option value="4076" >MIS i2a</option>
                                                                      <option value="4071" >Khushi Gupta</option>
                                                                      <option value="4051" >Kavita Shahi</option>
                                                                      <option value="4075" >Jennifer Chanu</option>
                                                                      <option value="4026" >Jake AS</option>
                                                                      <option value="1" >i2a Technologies</option>
                                                                      <option value="4038" >Honey hm</option>
                                                                      <option value="4027" >Harshita Singh</option>
                                                                      <option value="4019" >Gokul K</option>
                                                                      <option value="4049" >Ekta Shrestha</option>
                                                                      <option value="4028" >Daud Khan</option>
                                                                      <option value="4024" >Ayush Pandey</option>
                                                                      <option value="4055" >Ayush  Gupta</option>
                                                                      <option value="4072" >Anjana Thakur</option>
                                                                      <option value="4047" >Anjali A</option>
                                                                      <option value="4068" >Alok  Kumar</option>
                                                                      <option value="4057" >Akshay Chikara</option>
                                                                      <option value="4069" >Akash Shrestha</option>
                                                                      <option value="4074" >Adarsh  Ojha</option>
                                                                  </select></td>                            <td style="padding-left:5px;"><select name="searchsource" class="form-control" id="searchsource" style="width:140px;">
                                <option value="">All Source</option>
                                                                  <option value="16" >Advertisment</option>
                                                                  <option value="44" >Agent</option>
                                                                  <option value="45" >AkbarTravel</option>
                                                                  <option value="11" >Chat</option>
                                                                  <option value="13" >Facebook</option>
                                                                  <option value="46" >Flamingo Travels</option>
                                                                  <option value="47" >Google</option>
                                                                  <option value="12" >Hello Travel</option>
                                                                  <option value="14" >Instagram</option>
                                                                  <option value="9" >Ixigo</option>
                                                                  <option value="6" >Justdial</option>
                                                                  <option value="15" >Online</option>
                                                                  <option value="10" >Others</option>
                                                                  <option value="19" >PPC</option>
                                                                  <option value="17" >Referral</option>
                                                                  <option value="3" >Telephone</option>
                                                                  <option value="7" >Travel Triangle</option>
                                                                  <option value="1" >Walk-In</option>
                                                                  <option value="2" >Website</option>
                                                                  <option value="18" >WhatsApp</option>
                                                              </select></td>
                            <td style="padding-left:5px;"><button type="submit" class="btn btn-secondary btn-lg waves-effect waves-light" style="padding: 6px 10px;"><i class="fa fa-search" aria-hidden="true"></i> Search</button></td>
                            <td style="padding-left:5px;"><a href="display.html?ga=query"><button type="button" class="btn btn-secondary btn-lg waves-effect waves-light" style="padding: 6px 10px;">All</button></a></td>
                          </tr>
                        </table>
                      </form>
                    </div>
                  </div>
                </div>
                <div style="margin-bottom: 0px; padding: 10px; padding-right: 20px;" class="querytabslead">
                  <table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="6%" align="left" valign="top">
                        <a href="display.html?ga=query">
                          <div class="statusbox" style="background-color:#000;">
                            <div style="margin-bottom: 0px; font-size: 30px; line-height: 38px;">
                              <div class="ripple" style="animation-delay: 0s"></div>                              12008                            </div>Total
                          </div>
                        </a>
                      </td>
                      <td width="10%" align="left" valign="top"><a href="display.html?ga=query&statusid=1&startDate=&endDate=&keyword=&page=1&searchcity=&searchusers=">
                          <div class="statusbox" style="background-color:#655be6;">
                            <div style="margin-bottom: 0px; font-size: 30px; line-height: 38px;">
                                                            245                            </div>New
                          </div>
                        </a>
                      </td>
                      <td width="10%" align="left" valign="top"><a href="display.html?ga=query&statusid=2&startDate=&endDate=&keyword=&page=1&searchcity=&searchusers=">

                          <div class="statusbox" style="background-color:#0cb5b5;">
                                                        <div style="margin-bottom: 0px; font-size: 30px; line-height: 38px;">146</div>Active
                          </div>
                        </a></td>

                      <td width="10%" align="left" valign="top"><a href="display.html?ga=query&statusid=3&startDate=&endDate=&keyword=&page=1&searchcity=&searchusers=">
                          <div class="statusbox" style="background-color:#0f1f3e;">
                                                        <div style="margin-bottom: 0px; font-size: 30px; line-height: 38px;">374</div>No Connect
                          </div>
                        </a></td>
                      <td width="6%" align="left" valign="top"><a href="display.html?ga=query&statusid=3&startDate=&endDate=&keyword=&page=1&searchcity=&searchusers=">
                          <div class="statusbox" style="background-color:#0f1f3e;">
                                                        <div style="margin-bottom: 0px; font-size: 30px; line-height: 38px;">51</div>No Revert
                          </div>
                        </a></td>
                      <td width="10%" align="left" valign="top"><a href="display.html?ga=query&statusid=4&startDate=&endDate=&keyword=&page=1&searchcity=&searchusers=">
                          <div class="statusbox" style="background-color:#e45555;">
                                                        <div style="margin-bottom: 0px; font-size: 30px; line-height: 38px;">3</div>Hot Lead
                          </div>
                        </a></td>

                      <td width="10%" align="left" valign="top"><a href="display.html?ga=query&statusid=9&startDate=&endDate=&keyword=&page=1&searchcity=&searchusers=">
                          <div class="statusbox" style="background-color:#FF6600;">
                                                        <div style="margin-bottom: 0px; font-size: 30px; line-height: 38px;">108</div>Follow Up
                          </div>
                        </a></td>
                      <td width="10%" align="left" valign="top"><a href="display.html?ga=query&statusid=8&startDate=&endDate=&keyword=&page=1&searchcity=&searchusers=">
                          <div class="statusbox" style="background-color:#cc00a9;">
                                                        <div style="margin-bottom: 0px; font-size: 30px; line-height: 38px;">145</div>Proposal Sent
                          </div>
                        </a></td>

                      <td width="10%" align="left" valign="top"><a href="display.html?ga=query&statusid=5&startDate=&endDate=&keyword=&page=1&searchcity=&searchusers=">
                          <div class="statusbox" style="background-color:#46cd93;">
                                                        <div style="margin-bottom: 0px; font-size: 30px; line-height: 38px;">152</div>Confirmed
                          </div>
                        </a></td>
                      <td width="10%" align="left" valign="top"><a href="display.html?ga=query&statusid=6&startDate=&endDate=&keyword=&page=1&searchcity=&searchusers=">
                          <div class="statusbox" style="background-color:#6c757d;">
                                                        <div style="margin-bottom: 0px; font-size: 30px; line-height: 38px;">9903</div>Cancelled
                          </div>
                        </a></td>

                      <td width="10%" align="left" valign="top"><a href="display.html?ga=query&statusid=7&startDate=&endDate=&keyword=&page=1&searchcity=&searchusers=">
                          <div class="statusbox" style="background-color:#f9392f; margin-right:0px;">
                                                        <div style="margin-bottom: 0px; font-size: 30px; line-height: 38px;">881</div>
                            Invalid
                          </div>
                        </a></td>
                    </tr>
                  </table>
                </div>
                <form action="frmaction.html" method="post" enctype="multipart/form-data" name="addeditfrm" target="actoinfrm" id="addeditfrm" style="padding:0px 10px 20px;">
                  <div id="bulkassign" style="display:none;padding: 5px 2px; background-color: #f0f0f0; border-bottom: 2px solid #ddd; border-radius: 3px; margin-bottom: 10px;">
                    <table border="0" cellspacing="0" cellpadding="5">
                      <tr>
                        <td style="font-size:13px;"><input type="checkbox" id="ckbCheckAll" style="width: 16px; height: 16px;" /></td>
                        <td style="font-size:13px;">Select All&nbsp;</td>
                        <td><select id="assignToPerson" name="assignToPerson" class="form-control" style="padding: 5px; font-size: 12px; height: 30px; line-height: 20px; color: #000; font-weight: 600;" autocomplete="off">
                            <option value="0">Assign To</option>
                                                          <option value="4041" >
                                                                  Aaron AK</option>
                                                          <option value="4036" >
                                                                  Abby ak</option>
                                                          <option value="4074" >
                                                                  Adarsh  Ojha</option>
                                                          <option value="4069" >
                                                                  Akash Shrestha</option>
                                                          <option value="4057" >
                                                                  Akshay Chikara</option>
                                                          <option value="4068" >
                                                                  Alok  Kumar</option>
                                                          <option value="4047" >
                                                                  Anjali A</option>
                                                          <option value="4072" >
                                                                  Anjana Thakur</option>
                                                          <option value="4024" >
                                                                  Ayush Pandey</option>
                                                          <option value="4055" >
                                                                  Ayush  Gupta</option>
                                                          <option value="4031" >
                                                                  Darius ah</option>
                                                          <option value="4028" >
                                                                  Daud Khan</option>
                                                          <option value="4060" >
                                                                  Diana kl</option>
                                                          <option value="4049" >
                                                                  Ekta Shrestha</option>
                                                          <option value="4033" >
                                                                  Emily ad</option>
                                                          <option value="4059" >
                                                                  George yk</option>
                                                          <option value="4019" >
                                                                  Gokul K</option>
                                                          <option value="4027" >
                                                                  Harshita Singh</option>
                                                          <option value="4034" >
                                                                  Hazel hs</option>
                                                          <option value="4038" >
                                                                  Honey hm</option>
                                                          <option value="1" >
                                Not Assign</option>
                                                          <option value="4079" >
                                                                  i2a Technologies</option>
                                                          <option value="4056" >
                                                                  Jack rc</option>
                                                          <option value="4026" >
                                                                  Jake AS</option>
                                                          <option value="4062" >
                                                                  Jena sj</option>
                                                          <option value="4075" >
                                                                  Jennifer Chanu</option>
                                                          <option value="4058" >
                                                                  Jenny jc</option>
                                                          <option value="4051" >
                                                                  Kavita Shahi</option>
                                                          <option value="4071" >
                                                                  Khushi Gupta</option>
                                                          <option value="4076" >
                                                                  MIS i2a</option>
                                                          <option value="4073" >
                                                                  Mohd Arsh Khan</option>
                                                          <option value="4029" >
                                                                  Mohsin Hussain</option>
                                                          <option value="4054" >
                                                                  Neha  Singh	</option>
                                                          <option value="4064" >
                                                                  nick nick</option>
                                                          <option value="4014" >
                                                                  Nishant Kumar</option>
                                                          <option value="4052" >
                                                                  Noman  Ahmed	</option>
                                                          <option value="4039" >
                                                                  Patrick ps</option>
                                                          <option value="4035" >
                                                                  Percy ks</option>
                                                          <option value="4067" >
                                                                  Phillip T</option>
                                                          <option value="4040" >
                                                                  Pintu Kumar</option>
                                                          <option value="4043" >
                                                                  Prashant Sharma</option>
                                                          <option value="4030" >
                                                                  Prashant Kumar Sharma</option>
                                                          <option value="4023" >
                                                                  Radha R</option>
                                                          <option value="4013" >
                                                                  Sachin Kumar</option>
                                                          <option value="4044" >
                                                                  Sachin  Singh Maher</option>
                                                          <option value="4017" >
                                                                  Sajad Khan</option>
                                                          <option value="4016" >
                                                                  Saurabh Rai</option>
                                                          <option value="4022" >
                                                                  Shivani Sharma</option>
                                                          <option value="4078" >
                                                                  shobhnath l2a</option>
                                                          <option value="4080" >
                                                                  shobhnath AE</option>
                                                          <option value="4048" >
                                                                  Suchita Massey</option>
                                                          <option value="4012" >
                                                                  Sujeet Kumar</option>
                                                          <option value="4050" >
                                                                  Sunil S</option>
                                                          <option value="4046" >
                                                                  Suraj Sahu</option>
                                                          <option value="4015" >
                                                                  Swapnil Sinha</option>
                                                          <option value="4045" >
                                                                  Tannu T</option>
                                                          <option value="4032" >
                                                                  Trekhops Technologies</option>
                                                          <option value="4063" >
                                                                  Trekhops Technologies</option>
                                                          <option value="4042" >
                                                                  Tyler PB</option>
                                                          <option value="4065" >
                                                                  Umar Baktoo</option>
                                                          <option value="4066" >
                                                                  Umar Baktoo</option>
                                                          <option value="4018" >
                                                                  umesh singh</option>
                                                          <option value="4037" >
                                                                  umesh singh</option>
                                                          <option value="4020" >
                                                                  Vaasu  Arora	</option>
                                                          <option value="4077" >
                                                                  Vinay singh</option>
                                                          <option value="4025" >
                                                                  vivek kumar</option>
                                                          <option value="4053" >
                                                                  Yashika Sharma</option>
                                                          <option value="4061" >
                                                                  Yatin y</option>
                                                          <option value="4070" >
                                                                  Yuvraj  Singh</option>
                                                          <option value="4021" >
                                                                  Zuhair  Abbas	</option>
                                                      </select></td>
                        <td><button type="submit" id="savingbutton" class="btn btn-primary" onclick="this.form.submit(); this.value='Saving...';" style="float:right;padding: 3px 10px;">
                            Save
                          </button></td>
                        <td><input autocomplete="false" name="action" type="hidden" id="action" value="bulkassignquery" /></td>
                      </tr>
                    </table>
                  </div>
                                                        <div class="querylistbox">
                      <div class="qtp">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                          <tbody>
                            <tr>
                              <td width="3%" align="left" valign="top" style="padding-right:10px;"><input type="checkbox" name="assignall[]" class="checkBoxClass" id="assignqury" value="127497" onclick="selectedfun();" style="width: 16px; height: 16px;"> </td>
                              <td width="14%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:15px; font-weight:500;line-height: 16px; margin-bottom:3px; font-weight:600;"><a href="display.html?ga=query&view=1&id=127497">127497</a></div>
                                <span class="badge badge-success">Confirmed</span>                              </td>
                              <td width="20%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:13px; line-height: 16px; margin-bottom:3px;white-space: nowrap; max-width:200px; overflow: hidden; text-overflow: ellipsis;font-weight:600;">Mr. umesh singh singh singh</div>
                                <div style="font-size:13px; color:#686868;">8383035899</div>
                              </td>
                              <td width="17%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:13px; color:#686868;">8383035899</div>
                              </td>
                              <td width="17%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:13px; line-height: 16px;"><span style="color:#686868; font-weight: 600;">International</span><br /><span style="color:#686868;">Origin<br />
                                  </span><span style="max-width:180px; overflow:hidden;overflow-wrap: break-word;">                                      <span class="badge badge-boxed  badge-soft-success" style=" background-color: #737373 !important; color:#fff; font-size: 11px; padding: 5px 6px;">Delhi</span>
                                    </span></div>
                                <div style="font-size:13px; line-height: 16px;"><span style="color:#686868;">Destination<br />
                                  </span><span style="max-width:180px; overflow:hidden;overflow-wrap: break-word;">                                      <span class="badge badge-boxed  badge-soft-success" style=" background-color: #737373 !important; color:#fff; font-size: 11px; padding: 5px 6px;">Dubai</span>
                                    </span></div>
                              </td>
                              <td width="15%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;"><span style="color:#686868;"><i class="fa fa-calendar" aria-hidden="true"></i></span> 02-04-2026</div>
                                <div style="font-size:12px; line-height: 16px;"><span style="color:#686868;">Till</span> 10-04-2026</div>
                              </td>
                              <td align="left" valign="top" style="font-size:13px; line-height: 16px;">No Task</span>

                                <div style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; font-size:12px;color:#686868;white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width:200px;"><i class="fa fa-sticky-note" aria-hidden="true" style=" color:#ffa500;"></i> &nbsp;No Notes                                </div>
                              </td>
                              <td width="13%" align="right" valign="middle">
                                <div class="btn-group" role="group" aria-label="Option">
                                  <a href="display.html?ga=query&view=1&id=127497"><button type="button" class="btn btn-secondary"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                                                                                            <a target="_blank" href="https://api.whatsapp.com/send?text=Hi&phone=+918383035899"><button type="button" class="btn btn-secondary"><i class="fa fa-whatsapp" aria-hidden="true"></i></button></a>
                                                                        <a popaction="action=composemail&queryId=127497" onclick="loadpop('Compose Mail',this,'900px')" data-toggle="modal" data-target=".bs-example-modal-center"><button type="button" class="btn btn-secondary"><i class="fa fa-envelope-o" aria-hidden="true"></i></button></a>
                                    <a onclick="createquery('127497');"><button type="button" class="btn btn-secondary"><i class="fa fa-pencil" aria-hidden="true"></i></button></a>
                                                                  </div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <div class="qbt">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                          <tbody>
                            <tr>
                              <td width="3%" align="center" valign="top" style="padding-right:10px;">                               </td>
                              <td width="14%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;color:#686868;">Requirement</div>
                                <div class="blueicons" style="font-size:12px; font-weight:600;"></div>
                              </td>
                              <td width="20%" align="left" valign="top" style="padding-right:20px;">
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">umesh@akounto.com</div>
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">Advertisment</div>
                              </td>
                              <td width="17%" align="left" valign="top" style="padding-right:20px;">
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">Travellers</div>
                                <div style="font-size:13px; line-height: 16px;">1 <span style="color:#686868; font-size:11px;">Adult</span> 0 <span style="color:#686868; font-size:11px;">Clild</span> 0 <span style="color:#686868; font-size:11px;">Infant</span></div>
                              </td>
                              <td width="15%" align="left" valign="top" style="padding-right:20px;">
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">Assigned to</div>
                                <div style="font-size:12px;"><select id="assignTo127497" name="assignTo127497" class="form-control" style="padding: 3px; font-size: 12px; height: 25px; line-height: 15px; color: #000; font-weight: 600;" autocomplete="off" onchange="changeAssignTo('127497');">
                                    <option value="1">Assign to me</option>
                                                                          <option value="4074" >
                                                                                  Adarsh  Ojha</option>
                                                                          <option value="4069" >
                                                                                  Akash Shrestha</option>
                                                                          <option value="4057" >
                                                                                  Akshay Chikara</option>
                                                                          <option value="4068" >
                                                                                  Alok  Kumar</option>
                                                                          <option value="4047" >
                                                                                  Anjali A</option>
                                                                          <option value="4072" >
                                                                                  Anjana Thakur</option>
                                                                          <option value="4024" >
                                                                                  Ayush Pandey</option>
                                                                          <option value="4055" >
                                                                                  Ayush  Gupta</option>
                                                                          <option value="4028" >
                                                                                  Daud Khan</option>
                                                                          <option value="4049" >
                                                                                  Ekta Shrestha</option>
                                                                          <option value="4019" >
                                                                                  Gokul K</option>
                                                                          <option value="4027" >
                                                                                  Harshita Singh</option>
                                                                          <option value="4038" >
                                                                                  Honey hm</option>
                                                                          <option value="4026" >
                                                                                  Jake AS</option>
                                                                          <option value="4075" >
                                                                                  Jennifer Chanu</option>
                                                                          <option value="4051" >
                                                                                  Kavita Shahi</option>
                                                                          <option value="4071" >
                                                                                  Khushi Gupta</option>
                                                                          <option value="4076" >
                                                                                  MIS i2a</option>
                                                                          <option value="4073" >
                                                                                  Mohd Arsh Khan</option>
                                                                          <option value="4029" >
                                                                                  Mohsin Hussain</option>
                                                                          <option value="4054" >
                                                                                  Neha  Singh	</option>
                                                                          <option value="4014" >
                                                                                  Nishant Kumar</option>
                                                                          <option value="4052" >
                                                                                  Noman  Ahmed	</option>
                                                                          <option value="4040" >
                                                                                  Pintu Kumar</option>
                                                                          <option value="4043" >
                                                                                  Prashant Sharma</option>
                                                                          <option value="4030" >
                                                                                  Prashant Kumar Sharma</option>
                                                                          <option value="4023" >
                                                                                  Radha R</option>
                                                                          <option value="4013" >
                                                                                  Sachin Kumar</option>
                                                                          <option value="4044" >
                                                                                  Sachin  Singh Maher</option>
                                                                          <option value="4017" >
                                                                                  Sajad Khan</option>
                                                                          <option value="4016" >
                                                                                  Saurabh Rai</option>
                                                                          <option value="4022" >
                                                                                  Shivani Sharma</option>
                                                                          <option value="4078" >
                                                                                  shobhnath l2a</option>
                                                                          <option value="4048" >
                                                                                  Suchita Massey</option>
                                                                          <option value="4012" >
                                                                                  Sujeet Kumar</option>
                                                                          <option value="4050" >
                                                                                  Sunil S</option>
                                                                          <option value="4046" >
                                                                                  Suraj Sahu</option>
                                                                          <option value="4015" >
                                                                                  Swapnil Sinha</option>
                                                                          <option value="4045" >
                                                                                  Tannu T</option>
                                                                          <option value="4018" >
                                                                                  umesh singh</option>
                                                                          <option value="4020" >
                                                                                  Vaasu  Arora	</option>
                                                                          <option value="4077" >
                                                                                  Vinay singh</option>
                                                                          <option value="4025" >
                                                                                  vivek kumar</option>
                                                                          <option value="4053" >
                                                                                  Yashika Sharma</option>
                                                                          <option value="4061" >
                                                                                  Yatin y</option>
                                                                          <option value="4070" >
                                                                                  Yuvraj  Singh</option>
                                                                          <option value="4021" >
                                                                                  Zuhair  Abbas	</option>
                                                                      </select> </div>
                              </td>
                              <td align="left" valign="top">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;"><span style="color:#686868;"><i class="fa fa-clock-o" aria-hidden="true"></i> Created</span></div>
                                <div style="font-size:11px; line-height: 16px; margin-bottom:3px;">03-03-2026</div>
                              </td>
                              <td width="13%" align="left" valign="top">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;"><span style="color:#686868;"><i class="fa fa-clock-o" aria-hidden="true"></i> Last Updated</span></div>
                                <div style="font-size:11px; line-height: 16px; margin-bottom:3px;">09/03/2026 - 04:32 PM</div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                                              <div class="viewpackageheader" onclick="$('#pro27497').toggle();"><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp;View Proposal (1)</div>
                        <div class="proposallistouter" style="display:none;" id="pro27497">
                                                      <a href="display.html?ga=itineraries&view=1&id=109135"><i class="fa fa-list-alt" aria-hidden="true"></i> &nbsp;shobhnath1321 (&#8377; 1,050 ) &nbsp; <i class="fa fa-check" aria-hidden="true" style="color:#00CC00;"></i></a>
                                                  </div>
                                          </div>
                                      <div class="querylistbox">
                      <div class="qtp">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                          <tbody>
                            <tr>
                              <td width="3%" align="left" valign="top" style="padding-right:10px;"><input type="checkbox" name="assignall[]" class="checkBoxClass" id="assignqury" value="127495" onclick="selectedfun();" style="width: 16px; height: 16px;"> </td>
                              <td width="14%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:15px; font-weight:500;line-height: 16px; margin-bottom:3px; font-weight:600;"><a href="display.html?ga=query&view=1&id=127495">127495</a></div>
                                <span class="badge badge-primary">New</span>                              </td>
                              <td width="20%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:13px; line-height: 16px; margin-bottom:3px;white-space: nowrap; max-width:200px; overflow: hidden; text-overflow: ellipsis;font-weight:600;">Mr. sd000 updated</div>
                                <div style="font-size:13px; color:#686868;">2020202000</div>
                              </td>
                              <td width="17%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:13px; color:#686868;">2020202000</div>
                              </td>
                              <td width="17%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:13px; line-height: 16px;"><span style="color:#686868; font-weight: 600;"></span><br /><span style="color:#686868;">Origin<br />
                                  </span><span style="max-width:180px; overflow:hidden;overflow-wrap: break-word;">                                      <span class="badge badge-boxed  badge-soft-success" style=" background-color: #737373 !important; color:#fff; font-size: 11px; padding: 5px 6px;">Abadeh</span>
                                    </span></div>
                                <div style="font-size:13px; line-height: 16px;"><span style="color:#686868;">Destination<br />
                                  </span><span style="max-width:180px; overflow:hidden;overflow-wrap: break-word;">                                      <span class="badge badge-boxed  badge-soft-success" style=" background-color: #737373 !important; color:#fff; font-size: 11px; padding: 5px 6px;">Mumbai</span>
                                    </span></div>
                              </td>
                              <td width="15%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;"><span style="color:#686868;"><i class="fa fa-calendar" aria-hidden="true"></i></span> 07-02-2026</div>
                                <div style="font-size:12px; line-height: 16px;"><span style="color:#686868;">Till</span> 09-02-2026</div>
                              </td>
                              <td align="left" valign="top" style="font-size:13px; line-height: 16px;">No Task</span>

                                <div style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; font-size:12px;color:#686868;white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width:200px;"><i class="fa fa-sticky-note" aria-hidden="true" style=" color:#ffa500;"></i> &nbsp;No Notes                                </div>
                              </td>
                              <td width="13%" align="right" valign="middle">
                                <div class="btn-group" role="group" aria-label="Option">
                                  <a href="display.html?ga=query&view=1&id=127495"><button type="button" class="btn btn-secondary"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                                                                                            <a target="_blank" href="https://api.whatsapp.com/send?text=Hi&phone=+912020202000"><button type="button" class="btn btn-secondary"><i class="fa fa-whatsapp" aria-hidden="true"></i></button></a>
                                                                        <a popaction="action=composemail&queryId=127495" onclick="loadpop('Compose Mail',this,'900px')" data-toggle="modal" data-target=".bs-example-modal-center"><button type="button" class="btn btn-secondary"><i class="fa fa-envelope-o" aria-hidden="true"></i></button></a>
                                    <a onclick="createquery('127495');"><button type="button" class="btn btn-secondary"><i class="fa fa-pencil" aria-hidden="true"></i></button></a>
                                                                  </div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <div class="qbt">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                          <tbody>
                            <tr>
                              <td width="3%" align="center" valign="top" style="padding-right:10px;">                               </td>
                              <td width="14%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;color:#686868;">Requirement</div>
                                <div class="blueicons" style="font-size:12px; font-weight:600;"></div>
                              </td>
                              <td width="20%" align="left" valign="top" style="padding-right:20px;">
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">sdf000@gmail.com</div>
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">Advertisment</div>
                              </td>
                              <td width="17%" align="left" valign="top" style="padding-right:20px;">
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">Travellers</div>
                                <div style="font-size:13px; line-height: 16px;">1 <span style="color:#686868; font-size:11px;">Adult</span> 0 <span style="color:#686868; font-size:11px;">Clild</span> 0 <span style="color:#686868; font-size:11px;">Infant</span></div>
                              </td>
                              <td width="15%" align="left" valign="top" style="padding-right:20px;">
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">Assigned to</div>
                                <div style="font-size:12px;"><select id="assignTo127495" name="assignTo127495" class="form-control" style="padding: 3px; font-size: 12px; height: 25px; line-height: 15px; color: #000; font-weight: 600;" autocomplete="off" onchange="changeAssignTo('127495');">
                                    <option value="1">Assign to me</option>
                                                                          <option value="4074" selected="selected" >
                                                                                  Adarsh  Ojha</option>
                                                                          <option value="4069" >
                                                                                  Akash Shrestha</option>
                                                                          <option value="4057" >
                                                                                  Akshay Chikara</option>
                                                                          <option value="4068" >
                                                                                  Alok  Kumar</option>
                                                                          <option value="4047" >
                                                                                  Anjali A</option>
                                                                          <option value="4072" >
                                                                                  Anjana Thakur</option>
                                                                          <option value="4024" >
                                                                                  Ayush Pandey</option>
                                                                          <option value="4055" >
                                                                                  Ayush  Gupta</option>
                                                                          <option value="4028" >
                                                                                  Daud Khan</option>
                                                                          <option value="4049" >
                                                                                  Ekta Shrestha</option>
                                                                          <option value="4019" >
                                                                                  Gokul K</option>
                                                                          <option value="4027" >
                                                                                  Harshita Singh</option>
                                                                          <option value="4038" >
                                                                                  Honey hm</option>
                                                                          <option value="4026" >
                                                                                  Jake AS</option>
                                                                          <option value="4075" >
                                                                                  Jennifer Chanu</option>
                                                                          <option value="4051" >
                                                                                  Kavita Shahi</option>
                                                                          <option value="4071" >
                                                                                  Khushi Gupta</option>
                                                                          <option value="4076" >
                                                                                  MIS i2a</option>
                                                                          <option value="4073" >
                                                                                  Mohd Arsh Khan</option>
                                                                          <option value="4029" >
                                                                                  Mohsin Hussain</option>
                                                                          <option value="4054" >
                                                                                  Neha  Singh	</option>
                                                                          <option value="4014" >
                                                                                  Nishant Kumar</option>
                                                                          <option value="4052" >
                                                                                  Noman  Ahmed	</option>
                                                                          <option value="4040" >
                                                                                  Pintu Kumar</option>
                                                                          <option value="4043" >
                                                                                  Prashant Sharma</option>
                                                                          <option value="4030" >
                                                                                  Prashant Kumar Sharma</option>
                                                                          <option value="4023" >
                                                                                  Radha R</option>
                                                                          <option value="4013" >
                                                                                  Sachin Kumar</option>
                                                                          <option value="4044" >
                                                                                  Sachin  Singh Maher</option>
                                                                          <option value="4017" >
                                                                                  Sajad Khan</option>
                                                                          <option value="4016" >
                                                                                  Saurabh Rai</option>
                                                                          <option value="4022" >
                                                                                  Shivani Sharma</option>
                                                                          <option value="4078" >
                                                                                  shobhnath l2a</option>
                                                                          <option value="4048" >
                                                                                  Suchita Massey</option>
                                                                          <option value="4012" >
                                                                                  Sujeet Kumar</option>
                                                                          <option value="4050" >
                                                                                  Sunil S</option>
                                                                          <option value="4046" >
                                                                                  Suraj Sahu</option>
                                                                          <option value="4015" >
                                                                                  Swapnil Sinha</option>
                                                                          <option value="4045" >
                                                                                  Tannu T</option>
                                                                          <option value="4018" >
                                                                                  umesh singh</option>
                                                                          <option value="4020" >
                                                                                  Vaasu  Arora	</option>
                                                                          <option value="4077" >
                                                                                  Vinay singh</option>
                                                                          <option value="4025" >
                                                                                  vivek kumar</option>
                                                                          <option value="4053" >
                                                                                  Yashika Sharma</option>
                                                                          <option value="4061" >
                                                                                  Yatin y</option>
                                                                          <option value="4070" >
                                                                                  Yuvraj  Singh</option>
                                                                          <option value="4021" >
                                                                                  Zuhair  Abbas	</option>
                                                                      </select> </div>
                              </td>
                              <td align="left" valign="top">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;"><span style="color:#686868;"><i class="fa fa-clock-o" aria-hidden="true"></i> Created</span></div>
                                <div style="font-size:11px; line-height: 16px; margin-bottom:3px;">05-02-2026</div>
                              </td>
                              <td width="13%" align="left" valign="top">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;"><span style="color:#686868;"><i class="fa fa-clock-o" aria-hidden="true"></i> Last Updated</span></div>
                                <div style="font-size:11px; line-height: 16px; margin-bottom:3px;">06/02/2026 - 05:16 PM</div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                                          </div>
                                      <div class="querylistbox">
                      <div class="qtp">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                          <tbody>
                            <tr>
                              <td width="3%" align="left" valign="top" style="padding-right:10px;"><input type="checkbox" name="assignall[]" class="checkBoxClass" id="assignqury" value="127494" onclick="selectedfun();" style="width: 16px; height: 16px;"> </td>
                              <td width="14%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:15px; font-weight:500;line-height: 16px; margin-bottom:3px; font-weight:600;"><a href="display.html?ga=query&view=1&id=127494">127494</a></div>
                                <span class="badge badge-primary">New</span>                              </td>
                              <td width="20%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:13px; line-height: 16px; margin-bottom:3px;white-space: nowrap; max-width:200px; overflow: hidden; text-overflow: ellipsis;font-weight:600;">Mr. function test update</div>
                                <div style="font-size:13px; color:#686868;">9874563210</div>
                              </td>
                              <td width="17%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:13px; color:#686868;">9874563210</div>
                              </td>
                              <td width="17%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:13px; line-height: 16px;"><span style="color:#686868; font-weight: 600;"></span><br /><span style="color:#686868;">Origin<br />
                                  </span><span style="max-width:180px; overflow:hidden;overflow-wrap: break-word;">                                      <span class="badge badge-boxed  badge-soft-success" style=" background-color: #737373 !important; color:#fff; font-size: 11px; padding: 5px 6px;">Delhi</span>
                                    </span></div>
                                <div style="font-size:13px; line-height: 16px;"><span style="color:#686868;">Destination<br />
                                  </span><span style="max-width:180px; overflow:hidden;overflow-wrap: break-word;">                                      <span class="badge badge-boxed  badge-soft-success" style=" background-color: #737373 !important; color:#fff; font-size: 11px; padding: 5px 6px;">Mumbai</span>
                                    </span></div>
                              </td>
                              <td width="15%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;"><span style="color:#686868;"><i class="fa fa-calendar" aria-hidden="true"></i></span> 07-02-2026</div>
                                <div style="font-size:12px; line-height: 16px;"><span style="color:#686868;">Till</span> 09-02-2026</div>
                              </td>
                              <td align="left" valign="top" style="font-size:13px; line-height: 16px;">No Task</span>

                                <div style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; font-size:12px;color:#686868;white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width:200px;"><i class="fa fa-sticky-note" aria-hidden="true" style=" color:#ffa500;"></i> &nbsp;No Notes                                </div>
                              </td>
                              <td width="13%" align="right" valign="middle">
                                <div class="btn-group" role="group" aria-label="Option">
                                  <a href="display.html?ga=query&view=1&id=127494"><button type="button" class="btn btn-secondary"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                                                                                            <a target="_blank" href="https://api.whatsapp.com/send?text=Hi&phone=+919874563210"><button type="button" class="btn btn-secondary"><i class="fa fa-whatsapp" aria-hidden="true"></i></button></a>
                                                                        <a popaction="action=composemail&queryId=127494" onclick="loadpop('Compose Mail',this,'900px')" data-toggle="modal" data-target=".bs-example-modal-center"><button type="button" class="btn btn-secondary"><i class="fa fa-envelope-o" aria-hidden="true"></i></button></a>
                                    <a onclick="createquery('127494');"><button type="button" class="btn btn-secondary"><i class="fa fa-pencil" aria-hidden="true"></i></button></a>
                                                                  </div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <div class="qbt">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                          <tbody>
                            <tr>
                              <td width="3%" align="center" valign="top" style="padding-right:10px;">                               </td>
                              <td width="14%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;color:#686868;">Requirement</div>
                                <div class="blueicons" style="font-size:12px; font-weight:600;"></div>
                              </td>
                              <td width="20%" align="left" valign="top" style="padding-right:20px;">
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">9874563210@gmail.com</div>
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">Advertisment</div>
                              </td>
                              <td width="17%" align="left" valign="top" style="padding-right:20px;">
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">Travellers</div>
                                <div style="font-size:13px; line-height: 16px;">1 <span style="color:#686868; font-size:11px;">Adult</span> 0 <span style="color:#686868; font-size:11px;">Clild</span> 0 <span style="color:#686868; font-size:11px;">Infant</span></div>
                              </td>
                              <td width="15%" align="left" valign="top" style="padding-right:20px;">
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">Assigned to</div>
                                <div style="font-size:12px;"><select id="assignTo127494" name="assignTo127494" class="form-control" style="padding: 3px; font-size: 12px; height: 25px; line-height: 15px; color: #000; font-weight: 600;" autocomplete="off" onchange="changeAssignTo('127494');">
                                    <option value="1">Assign to me</option>
                                                                          <option value="4074" >
                                                                                  Adarsh  Ojha</option>
                                                                          <option value="4069" >
                                                                                  Akash Shrestha</option>
                                                                          <option value="4057" >
                                                                                  Akshay Chikara</option>
                                                                          <option value="4068" >
                                                                                  Alok  Kumar</option>
                                                                          <option value="4047" >
                                                                                  Anjali A</option>
                                                                          <option value="4072" >
                                                                                  Anjana Thakur</option>
                                                                          <option value="4024" >
                                                                                  Ayush Pandey</option>
                                                                          <option value="4055" >
                                                                                  Ayush  Gupta</option>
                                                                          <option value="4028" >
                                                                                  Daud Khan</option>
                                                                          <option value="4049" >
                                                                                  Ekta Shrestha</option>
                                                                          <option value="4019" >
                                                                                  Gokul K</option>
                                                                          <option value="4027" >
                                                                                  Harshita Singh</option>
                                                                          <option value="4038" >
                                                                                  Honey hm</option>
                                                                          <option value="4026" >
                                                                                  Jake AS</option>
                                                                          <option value="4075" >
                                                                                  Jennifer Chanu</option>
                                                                          <option value="4051" >
                                                                                  Kavita Shahi</option>
                                                                          <option value="4071" >
                                                                                  Khushi Gupta</option>
                                                                          <option value="4076" >
                                                                                  MIS i2a</option>
                                                                          <option value="4073" >
                                                                                  Mohd Arsh Khan</option>
                                                                          <option value="4029" >
                                                                                  Mohsin Hussain</option>
                                                                          <option value="4054" >
                                                                                  Neha  Singh	</option>
                                                                          <option value="4014" >
                                                                                  Nishant Kumar</option>
                                                                          <option value="4052" >
                                                                                  Noman  Ahmed	</option>
                                                                          <option value="4040" >
                                                                                  Pintu Kumar</option>
                                                                          <option value="4043" >
                                                                                  Prashant Sharma</option>
                                                                          <option value="4030" >
                                                                                  Prashant Kumar Sharma</option>
                                                                          <option value="4023" >
                                                                                  Radha R</option>
                                                                          <option value="4013" >
                                                                                  Sachin Kumar</option>
                                                                          <option value="4044" >
                                                                                  Sachin  Singh Maher</option>
                                                                          <option value="4017" >
                                                                                  Sajad Khan</option>
                                                                          <option value="4016" >
                                                                                  Saurabh Rai</option>
                                                                          <option value="4022" >
                                                                                  Shivani Sharma</option>
                                                                          <option value="4078" >
                                                                                  shobhnath l2a</option>
                                                                          <option value="4048" >
                                                                                  Suchita Massey</option>
                                                                          <option value="4012" >
                                                                                  Sujeet Kumar</option>
                                                                          <option value="4050" >
                                                                                  Sunil S</option>
                                                                          <option value="4046" >
                                                                                  Suraj Sahu</option>
                                                                          <option value="4015" >
                                                                                  Swapnil Sinha</option>
                                                                          <option value="4045" >
                                                                                  Tannu T</option>
                                                                          <option value="4018" >
                                                                                  umesh singh</option>
                                                                          <option value="4020" >
                                                                                  Vaasu  Arora	</option>
                                                                          <option value="4077" >
                                                                                  Vinay singh</option>
                                                                          <option value="4025" >
                                                                                  vivek kumar</option>
                                                                          <option value="4053" >
                                                                                  Yashika Sharma</option>
                                                                          <option value="4061" >
                                                                                  Yatin y</option>
                                                                          <option value="4070" >
                                                                                  Yuvraj  Singh</option>
                                                                          <option value="4021" >
                                                                                  Zuhair  Abbas	</option>
                                                                      </select> </div>
                              </td>
                              <td align="left" valign="top">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;"><span style="color:#686868;"><i class="fa fa-clock-o" aria-hidden="true"></i> Created</span></div>
                                <div style="font-size:11px; line-height: 16px; margin-bottom:3px;">05-02-2026</div>
                              </td>
                              <td width="13%" align="left" valign="top">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;"><span style="color:#686868;"><i class="fa fa-clock-o" aria-hidden="true"></i> Last Updated</span></div>
                                <div style="font-size:11px; line-height: 16px; margin-bottom:3px;">05/02/2026 - 11:30 AM</div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                                          </div>
                                      <div class="querylistbox">
                      <div class="qtp">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                          <tbody>
                            <tr>
                              <td width="3%" align="left" valign="top" style="padding-right:10px;"><input type="checkbox" name="assignall[]" class="checkBoxClass" id="assignqury" value="127493" onclick="selectedfun();" style="width: 16px; height: 16px;"> </td>
                              <td width="14%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:15px; font-weight:500;line-height: 16px; margin-bottom:3px; font-weight:600;"><a href="display.html?ga=query&view=1&id=127493">127493</a></div>
                                <span class="badge badge-primary">New</span>                              </td>
                              <td width="20%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:13px; line-height: 16px; margin-bottom:3px;white-space: nowrap; max-width:200px; overflow: hidden; text-overflow: ellipsis;font-weight:600;">Mr. shobhnath</div>
                                <div style="font-size:13px; color:#686868;">3333300000</div>
                              </td>
                              <td width="17%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:13px; color:#686868;">3333300000</div>
                              </td>
                              <td width="17%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:13px; line-height: 16px;"><span style="color:#686868; font-weight: 600;"></span><br /><span style="color:#686868;">Origin<br />
                                  </span><span style="max-width:180px; overflow:hidden;overflow-wrap: break-word;">                                      <span class="badge badge-boxed  badge-soft-success" style=" background-color: #737373 !important; color:#fff; font-size: 11px; padding: 5px 6px;">Dubai</span>
                                    </span></div>
                                <div style="font-size:13px; line-height: 16px;"><span style="color:#686868;">Destination<br />
                                  </span><span style="max-width:180px; overflow:hidden;overflow-wrap: break-word;">                                      <span class="badge badge-boxed  badge-soft-success" style=" background-color: #737373 !important; color:#fff; font-size: 11px; padding: 5px 6px;">Delhi</span>
                                    </span></div>
                              </td>
                              <td width="15%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;"><span style="color:#686868;"><i class="fa fa-calendar" aria-hidden="true"></i></span> 29-11-2025</div>
                                <div style="font-size:12px; line-height: 16px;"><span style="color:#686868;">Till</span> 01-12-2025</div>
                              </td>
                              <td align="left" valign="top" style="font-size:13px; line-height: 16px;">No Task</span>

                                <div style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; font-size:12px;color:#686868;white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width:200px;"><i class="fa fa-sticky-note" aria-hidden="true" style=" color:#ffa500;"></i> &nbsp;No Notes                                </div>
                              </td>
                              <td width="13%" align="right" valign="middle">
                                <div class="btn-group" role="group" aria-label="Option">
                                  <a href="display.html?ga=query&view=1&id=127493"><button type="button" class="btn btn-secondary"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                                                                                            <a target="_blank" href="https://api.whatsapp.com/send?text=Hi&phone=+913333300000"><button type="button" class="btn btn-secondary"><i class="fa fa-whatsapp" aria-hidden="true"></i></button></a>
                                                                        <a popaction="action=composemail&queryId=127493" onclick="loadpop('Compose Mail',this,'900px')" data-toggle="modal" data-target=".bs-example-modal-center"><button type="button" class="btn btn-secondary"><i class="fa fa-envelope-o" aria-hidden="true"></i></button></a>
                                    <a onclick="createquery('127493');"><button type="button" class="btn btn-secondary"><i class="fa fa-pencil" aria-hidden="true"></i></button></a>
                                                                  </div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <div class="qbt">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                          <tbody>
                            <tr>
                              <td width="3%" align="center" valign="top" style="padding-right:10px;">                               </td>
                              <td width="14%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;color:#686868;">Requirement</div>
                                <div class="blueicons" style="font-size:12px; font-weight:600;"></div>
                              </td>
                              <td width="20%" align="left" valign="top" style="padding-right:20px;">
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">shobhnath.s@i2a.co</div>
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">Advertisment</div>
                              </td>
                              <td width="17%" align="left" valign="top" style="padding-right:20px;">
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">Travellers</div>
                                <div style="font-size:13px; line-height: 16px;">1 <span style="color:#686868; font-size:11px;">Adult</span> 0 <span style="color:#686868; font-size:11px;">Clild</span> 0 <span style="color:#686868; font-size:11px;">Infant</span></div>
                              </td>
                              <td width="15%" align="left" valign="top" style="padding-right:20px;">
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">Assigned to</div>
                                <div style="font-size:12px;"><select id="assignTo127493" name="assignTo127493" class="form-control" style="padding: 3px; font-size: 12px; height: 25px; line-height: 15px; color: #000; font-weight: 600;" autocomplete="off" onchange="changeAssignTo('127493');">
                                    <option value="1">Assign to me</option>
                                                                          <option value="4074" >
                                                                                  Adarsh  Ojha</option>
                                                                          <option value="4069" >
                                                                                  Akash Shrestha</option>
                                                                          <option value="4057" >
                                                                                  Akshay Chikara</option>
                                                                          <option value="4068" >
                                                                                  Alok  Kumar</option>
                                                                          <option value="4047" >
                                                                                  Anjali A</option>
                                                                          <option value="4072" >
                                                                                  Anjana Thakur</option>
                                                                          <option value="4024" >
                                                                                  Ayush Pandey</option>
                                                                          <option value="4055" >
                                                                                  Ayush  Gupta</option>
                                                                          <option value="4028" >
                                                                                  Daud Khan</option>
                                                                          <option value="4049" >
                                                                                  Ekta Shrestha</option>
                                                                          <option value="4019" >
                                                                                  Gokul K</option>
                                                                          <option value="4027" >
                                                                                  Harshita Singh</option>
                                                                          <option value="4038" >
                                                                                  Honey hm</option>
                                                                          <option value="4026" >
                                                                                  Jake AS</option>
                                                                          <option value="4075" >
                                                                                  Jennifer Chanu</option>
                                                                          <option value="4051" >
                                                                                  Kavita Shahi</option>
                                                                          <option value="4071" >
                                                                                  Khushi Gupta</option>
                                                                          <option value="4076" >
                                                                                  MIS i2a</option>
                                                                          <option value="4073" >
                                                                                  Mohd Arsh Khan</option>
                                                                          <option value="4029" >
                                                                                  Mohsin Hussain</option>
                                                                          <option value="4054" >
                                                                                  Neha  Singh	</option>
                                                                          <option value="4014" >
                                                                                  Nishant Kumar</option>
                                                                          <option value="4052" >
                                                                                  Noman  Ahmed	</option>
                                                                          <option value="4040" >
                                                                                  Pintu Kumar</option>
                                                                          <option value="4043" >
                                                                                  Prashant Sharma</option>
                                                                          <option value="4030" >
                                                                                  Prashant Kumar Sharma</option>
                                                                          <option value="4023" >
                                                                                  Radha R</option>
                                                                          <option value="4013" >
                                                                                  Sachin Kumar</option>
                                                                          <option value="4044" >
                                                                                  Sachin  Singh Maher</option>
                                                                          <option value="4017" >
                                                                                  Sajad Khan</option>
                                                                          <option value="4016" >
                                                                                  Saurabh Rai</option>
                                                                          <option value="4022" >
                                                                                  Shivani Sharma</option>
                                                                          <option value="4078" >
                                                                                  shobhnath l2a</option>
                                                                          <option value="4048" >
                                                                                  Suchita Massey</option>
                                                                          <option value="4012" >
                                                                                  Sujeet Kumar</option>
                                                                          <option value="4050" >
                                                                                  Sunil S</option>
                                                                          <option value="4046" >
                                                                                  Suraj Sahu</option>
                                                                          <option value="4015" >
                                                                                  Swapnil Sinha</option>
                                                                          <option value="4045" >
                                                                                  Tannu T</option>
                                                                          <option value="4018" >
                                                                                  umesh singh</option>
                                                                          <option value="4020" >
                                                                                  Vaasu  Arora	</option>
                                                                          <option value="4077" >
                                                                                  Vinay singh</option>
                                                                          <option value="4025" >
                                                                                  vivek kumar</option>
                                                                          <option value="4053" >
                                                                                  Yashika Sharma</option>
                                                                          <option value="4061" >
                                                                                  Yatin y</option>
                                                                          <option value="4070" >
                                                                                  Yuvraj  Singh</option>
                                                                          <option value="4021" >
                                                                                  Zuhair  Abbas	</option>
                                                                      </select> </div>
                              </td>
                              <td align="left" valign="top">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;"><span style="color:#686868;"><i class="fa fa-clock-o" aria-hidden="true"></i> Created</span></div>
                                <div style="font-size:11px; line-height: 16px; margin-bottom:3px;">27-11-2025</div>
                              </td>
                              <td width="13%" align="left" valign="top">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;"><span style="color:#686868;"><i class="fa fa-clock-o" aria-hidden="true"></i> Last Updated</span></div>
                                <div style="font-size:11px; line-height: 16px; margin-bottom:3px;">07/01/2026 - 07:14 PM</div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                                              <div class="viewpackageheader" onclick="$('#pro27493').toggle();"><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp;View Proposal (1)</div>
                        <div class="proposallistouter" style="display:none;" id="pro27493">
                                                      <a href="display.html?ga=itineraries&view=1&id=109128"><i class="fa fa-list-alt" aria-hidden="true"></i> &nbsp;package description (&#8377; 0 ) &nbsp; </a>
                                                  </div>
                                          </div>
                                      <div class="querylistbox">
                      <div class="qtp">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                          <tbody>
                            <tr>
                              <td width="3%" align="left" valign="top" style="padding-right:10px;"><input type="checkbox" name="assignall[]" class="checkBoxClass" id="assignqury" value="127492" onclick="selectedfun();" style="width: 16px; height: 16px;"> </td>
                              <td width="14%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:15px; font-weight:500;line-height: 16px; margin-bottom:3px; font-weight:600;"><a href="display.html?ga=query&view=1&id=127492">127492</a></div>
                                <span class="badge badge-primary">New</span>                              </td>
                              <td width="20%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:13px; line-height: 16px; margin-bottom:3px;white-space: nowrap; max-width:200px; overflow: hidden; text-overflow: ellipsis;font-weight:600;">Mr. 555 </div>
                                <div style="font-size:13px; color:#686868;">7894521555</div>
                              </td>
                              <td width="17%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:13px; color:#686868;">7894521555</div>
                              </td>
                              <td width="17%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:13px; line-height: 16px;"><span style="color:#686868; font-weight: 600;"></span><br /><span style="color:#686868;">Origin<br />
                                  </span><span style="max-width:180px; overflow:hidden;overflow-wrap: break-word;">                                      <span class="badge badge-boxed  badge-soft-success" style=" background-color: #737373 !important; color:#fff; font-size: 11px; padding: 5px 6px;">Delhi</span>
                                    </span></div>
                                <div style="font-size:13px; line-height: 16px;"><span style="color:#686868;">Destination<br />
                                  </span><span style="max-width:180px; overflow:hidden;overflow-wrap: break-word;">                                      <span class="badge badge-boxed  badge-soft-success" style=" background-color: #737373 !important; color:#fff; font-size: 11px; padding: 5px 6px;">Dubai</span>
                                    </span></div>
                              </td>
                              <td width="15%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;"><span style="color:#686868;"><i class="fa fa-calendar" aria-hidden="true"></i></span> 29-11-2025</div>
                                <div style="font-size:12px; line-height: 16px;"><span style="color:#686868;">Till</span> 01-12-2025</div>
                              </td>
                              <td align="left" valign="top" style="font-size:13px; line-height: 16px;">No Task</span>

                                <div style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; font-size:12px;color:#686868;white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width:200px;"><i class="fa fa-sticky-note" aria-hidden="true" style=" color:#ffa500;"></i> &nbsp;No Notes                                </div>
                              </td>
                              <td width="13%" align="right" valign="middle">
                                <div class="btn-group" role="group" aria-label="Option">
                                  <a href="display.html?ga=query&view=1&id=127492"><button type="button" class="btn btn-secondary"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                                                                                            <a target="_blank" href="https://api.whatsapp.com/send?text=Hi&phone=+917894521555"><button type="button" class="btn btn-secondary"><i class="fa fa-whatsapp" aria-hidden="true"></i></button></a>
                                                                        <a popaction="action=composemail&queryId=127492" onclick="loadpop('Compose Mail',this,'900px')" data-toggle="modal" data-target=".bs-example-modal-center"><button type="button" class="btn btn-secondary"><i class="fa fa-envelope-o" aria-hidden="true"></i></button></a>
                                    <a onclick="createquery('127492');"><button type="button" class="btn btn-secondary"><i class="fa fa-pencil" aria-hidden="true"></i></button></a>
                                                                  </div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <div class="qbt">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                          <tbody>
                            <tr>
                              <td width="3%" align="center" valign="top" style="padding-right:10px;">                               </td>
                              <td width="14%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;color:#686868;">Requirement</div>
                                <div class="blueicons" style="font-size:12px; font-weight:600;"></div>
                              </td>
                              <td width="20%" align="left" valign="top" style="padding-right:20px;">
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">55@gmail.com</div>
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">Advertisment</div>
                              </td>
                              <td width="17%" align="left" valign="top" style="padding-right:20px;">
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">Travellers</div>
                                <div style="font-size:13px; line-height: 16px;">1 <span style="color:#686868; font-size:11px;">Adult</span> 0 <span style="color:#686868; font-size:11px;">Clild</span> 0 <span style="color:#686868; font-size:11px;">Infant</span></div>
                              </td>
                              <td width="15%" align="left" valign="top" style="padding-right:20px;">
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">Assigned to</div>
                                <div style="font-size:12px;"><select id="assignTo127492" name="assignTo127492" class="form-control" style="padding: 3px; font-size: 12px; height: 25px; line-height: 15px; color: #000; font-weight: 600;" autocomplete="off" onchange="changeAssignTo('127492');">
                                    <option value="1">Assign to me</option>
                                                                          <option value="4074" >
                                                                                  Adarsh  Ojha</option>
                                                                          <option value="4069" >
                                                                                  Akash Shrestha</option>
                                                                          <option value="4057" >
                                                                                  Akshay Chikara</option>
                                                                          <option value="4068" >
                                                                                  Alok  Kumar</option>
                                                                          <option value="4047" >
                                                                                  Anjali A</option>
                                                                          <option value="4072" >
                                                                                  Anjana Thakur</option>
                                                                          <option value="4024" >
                                                                                  Ayush Pandey</option>
                                                                          <option value="4055" >
                                                                                  Ayush  Gupta</option>
                                                                          <option value="4028" >
                                                                                  Daud Khan</option>
                                                                          <option value="4049" >
                                                                                  Ekta Shrestha</option>
                                                                          <option value="4019" >
                                                                                  Gokul K</option>
                                                                          <option value="4027" >
                                                                                  Harshita Singh</option>
                                                                          <option value="4038" >
                                                                                  Honey hm</option>
                                                                          <option value="4026" >
                                                                                  Jake AS</option>
                                                                          <option value="4075" >
                                                                                  Jennifer Chanu</option>
                                                                          <option value="4051" >
                                                                                  Kavita Shahi</option>
                                                                          <option value="4071" >
                                                                                  Khushi Gupta</option>
                                                                          <option value="4076" >
                                                                                  MIS i2a</option>
                                                                          <option value="4073" >
                                                                                  Mohd Arsh Khan</option>
                                                                          <option value="4029" >
                                                                                  Mohsin Hussain</option>
                                                                          <option value="4054" >
                                                                                  Neha  Singh	</option>
                                                                          <option value="4014" >
                                                                                  Nishant Kumar</option>
                                                                          <option value="4052" >
                                                                                  Noman  Ahmed	</option>
                                                                          <option value="4040" >
                                                                                  Pintu Kumar</option>
                                                                          <option value="4043" >
                                                                                  Prashant Sharma</option>
                                                                          <option value="4030" >
                                                                                  Prashant Kumar Sharma</option>
                                                                          <option value="4023" >
                                                                                  Radha R</option>
                                                                          <option value="4013" >
                                                                                  Sachin Kumar</option>
                                                                          <option value="4044" >
                                                                                  Sachin  Singh Maher</option>
                                                                          <option value="4017" >
                                                                                  Sajad Khan</option>
                                                                          <option value="4016" >
                                                                                  Saurabh Rai</option>
                                                                          <option value="4022" >
                                                                                  Shivani Sharma</option>
                                                                          <option value="4078" >
                                                                                  shobhnath l2a</option>
                                                                          <option value="4048" >
                                                                                  Suchita Massey</option>
                                                                          <option value="4012" >
                                                                                  Sujeet Kumar</option>
                                                                          <option value="4050" >
                                                                                  Sunil S</option>
                                                                          <option value="4046" >
                                                                                  Suraj Sahu</option>
                                                                          <option value="4015" >
                                                                                  Swapnil Sinha</option>
                                                                          <option value="4045" >
                                                                                  Tannu T</option>
                                                                          <option value="4018" >
                                                                                  umesh singh</option>
                                                                          <option value="4020" >
                                                                                  Vaasu  Arora	</option>
                                                                          <option value="4077" >
                                                                                  Vinay singh</option>
                                                                          <option value="4025" >
                                                                                  vivek kumar</option>
                                                                          <option value="4053" >
                                                                                  Yashika Sharma</option>
                                                                          <option value="4061" >
                                                                                  Yatin y</option>
                                                                          <option value="4070" >
                                                                                  Yuvraj  Singh</option>
                                                                          <option value="4021" >
                                                                                  Zuhair  Abbas	</option>
                                                                      </select> </div>
                              </td>
                              <td align="left" valign="top">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;"><span style="color:#686868;"><i class="fa fa-clock-o" aria-hidden="true"></i> Created</span></div>
                                <div style="font-size:11px; line-height: 16px; margin-bottom:3px;">27-11-2025</div>
                              </td>
                              <td width="13%" align="left" valign="top">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;"><span style="color:#686868;"><i class="fa fa-clock-o" aria-hidden="true"></i> Last Updated</span></div>
                                <div style="font-size:11px; line-height: 16px; margin-bottom:3px;">27/11/2025 - 07:22 PM</div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                                          </div>
                                      <div class="querylistbox">
                      <div class="qtp">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                          <tbody>
                            <tr>
                              <td width="3%" align="left" valign="top" style="padding-right:10px;"><input type="checkbox" name="assignall[]" class="checkBoxClass" id="assignqury" value="127491" onclick="selectedfun();" style="width: 16px; height: 16px;"> </td>
                              <td width="14%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:15px; font-weight:500;line-height: 16px; margin-bottom:3px; font-weight:600;"><a href="display.html?ga=query&view=1&id=127491">127491</a></div>
                                <span class="badge badge-primary">New</span>                              </td>
                              <td width="20%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:13px; line-height: 16px; margin-bottom:3px;white-space: nowrap; max-width:200px; overflow: hidden; text-overflow: ellipsis;font-weight:600;">Mr. 555 </div>
                                <div style="font-size:13px; color:#686868;">7894521555</div>
                              </td>
                              <td width="17%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:13px; color:#686868;">7894521555</div>
                              </td>
                              <td width="17%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:13px; line-height: 16px;"><span style="color:#686868; font-weight: 600;"></span><br /><span style="color:#686868;">Origin<br />
                                  </span><span style="max-width:180px; overflow:hidden;overflow-wrap: break-word;">                                      <span class="badge badge-boxed  badge-soft-success" style=" background-color: #737373 !important; color:#fff; font-size: 11px; padding: 5px 6px;">Delhi</span>
                                    </span></div>
                                <div style="font-size:13px; line-height: 16px;"><span style="color:#686868;">Destination<br />
                                  </span><span style="max-width:180px; overflow:hidden;overflow-wrap: break-word;">                                      <span class="badge badge-boxed  badge-soft-success" style=" background-color: #737373 !important; color:#fff; font-size: 11px; padding: 5px 6px;">Mumbai</span>
                                    </span></div>
                              </td>
                              <td width="15%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;"><span style="color:#686868;"><i class="fa fa-calendar" aria-hidden="true"></i></span> 29-11-2025</div>
                                <div style="font-size:12px; line-height: 16px;"><span style="color:#686868;">Till</span> 01-12-2025</div>
                              </td>
                              <td align="left" valign="top" style="font-size:13px; line-height: 16px;">No Task</span>

                                <div style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; font-size:12px;color:#686868;white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width:200px;"><i class="fa fa-sticky-note" aria-hidden="true" style=" color:#ffa500;"></i> &nbsp;No Notes                                </div>
                              </td>
                              <td width="13%" align="right" valign="middle">
                                <div class="btn-group" role="group" aria-label="Option">
                                  <a href="display.html?ga=query&view=1&id=127491"><button type="button" class="btn btn-secondary"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                                                                                            <a target="_blank" href="https://api.whatsapp.com/send?text=Hi&phone=+917894521555"><button type="button" class="btn btn-secondary"><i class="fa fa-whatsapp" aria-hidden="true"></i></button></a>
                                                                        <a popaction="action=composemail&queryId=127491" onclick="loadpop('Compose Mail',this,'900px')" data-toggle="modal" data-target=".bs-example-modal-center"><button type="button" class="btn btn-secondary"><i class="fa fa-envelope-o" aria-hidden="true"></i></button></a>
                                    <a onclick="createquery('127491');"><button type="button" class="btn btn-secondary"><i class="fa fa-pencil" aria-hidden="true"></i></button></a>
                                                                  </div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <div class="qbt">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                          <tbody>
                            <tr>
                              <td width="3%" align="center" valign="top" style="padding-right:10px;">                               </td>
                              <td width="14%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;color:#686868;">Requirement</div>
                                <div class="blueicons" style="font-size:12px; font-weight:600;"></div>
                              </td>
                              <td width="20%" align="left" valign="top" style="padding-right:20px;">
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">55@gmail.com</div>
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">Advertisment</div>
                              </td>
                              <td width="17%" align="left" valign="top" style="padding-right:20px;">
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">Travellers</div>
                                <div style="font-size:13px; line-height: 16px;">1 <span style="color:#686868; font-size:11px;">Adult</span> 0 <span style="color:#686868; font-size:11px;">Clild</span> 0 <span style="color:#686868; font-size:11px;">Infant</span></div>
                              </td>
                              <td width="15%" align="left" valign="top" style="padding-right:20px;">
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">Assigned to</div>
                                <div style="font-size:12px;"><select id="assignTo127491" name="assignTo127491" class="form-control" style="padding: 3px; font-size: 12px; height: 25px; line-height: 15px; color: #000; font-weight: 600;" autocomplete="off" onchange="changeAssignTo('127491');">
                                    <option value="1">Assign to me</option>
                                                                          <option value="4074" >
                                                                                  Adarsh  Ojha</option>
                                                                          <option value="4069" >
                                                                                  Akash Shrestha</option>
                                                                          <option value="4057" >
                                                                                  Akshay Chikara</option>
                                                                          <option value="4068" >
                                                                                  Alok  Kumar</option>
                                                                          <option value="4047" >
                                                                                  Anjali A</option>
                                                                          <option value="4072" >
                                                                                  Anjana Thakur</option>
                                                                          <option value="4024" >
                                                                                  Ayush Pandey</option>
                                                                          <option value="4055" >
                                                                                  Ayush  Gupta</option>
                                                                          <option value="4028" >
                                                                                  Daud Khan</option>
                                                                          <option value="4049" >
                                                                                  Ekta Shrestha</option>
                                                                          <option value="4019" >
                                                                                  Gokul K</option>
                                                                          <option value="4027" >
                                                                                  Harshita Singh</option>
                                                                          <option value="4038" >
                                                                                  Honey hm</option>
                                                                          <option value="4026" >
                                                                                  Jake AS</option>
                                                                          <option value="4075" >
                                                                                  Jennifer Chanu</option>
                                                                          <option value="4051" >
                                                                                  Kavita Shahi</option>
                                                                          <option value="4071" >
                                                                                  Khushi Gupta</option>
                                                                          <option value="4076" >
                                                                                  MIS i2a</option>
                                                                          <option value="4073" >
                                                                                  Mohd Arsh Khan</option>
                                                                          <option value="4029" >
                                                                                  Mohsin Hussain</option>
                                                                          <option value="4054" >
                                                                                  Neha  Singh	</option>
                                                                          <option value="4014" >
                                                                                  Nishant Kumar</option>
                                                                          <option value="4052" >
                                                                                  Noman  Ahmed	</option>
                                                                          <option value="4040" >
                                                                                  Pintu Kumar</option>
                                                                          <option value="4043" >
                                                                                  Prashant Sharma</option>
                                                                          <option value="4030" >
                                                                                  Prashant Kumar Sharma</option>
                                                                          <option value="4023" >
                                                                                  Radha R</option>
                                                                          <option value="4013" >
                                                                                  Sachin Kumar</option>
                                                                          <option value="4044" >
                                                                                  Sachin  Singh Maher</option>
                                                                          <option value="4017" >
                                                                                  Sajad Khan</option>
                                                                          <option value="4016" >
                                                                                  Saurabh Rai</option>
                                                                          <option value="4022" >
                                                                                  Shivani Sharma</option>
                                                                          <option value="4078" >
                                                                                  shobhnath l2a</option>
                                                                          <option value="4048" >
                                                                                  Suchita Massey</option>
                                                                          <option value="4012" >
                                                                                  Sujeet Kumar</option>
                                                                          <option value="4050" >
                                                                                  Sunil S</option>
                                                                          <option value="4046" >
                                                                                  Suraj Sahu</option>
                                                                          <option value="4015" >
                                                                                  Swapnil Sinha</option>
                                                                          <option value="4045" >
                                                                                  Tannu T</option>
                                                                          <option value="4018" >
                                                                                  umesh singh</option>
                                                                          <option value="4020" >
                                                                                  Vaasu  Arora	</option>
                                                                          <option value="4077" >
                                                                                  Vinay singh</option>
                                                                          <option value="4025" >
                                                                                  vivek kumar</option>
                                                                          <option value="4053" >
                                                                                  Yashika Sharma</option>
                                                                          <option value="4061" >
                                                                                  Yatin y</option>
                                                                          <option value="4070" >
                                                                                  Yuvraj  Singh</option>
                                                                          <option value="4021" >
                                                                                  Zuhair  Abbas	</option>
                                                                      </select> </div>
                              </td>
                              <td align="left" valign="top">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;"><span style="color:#686868;"><i class="fa fa-clock-o" aria-hidden="true"></i> Created</span></div>
                                <div style="font-size:11px; line-height: 16px; margin-bottom:3px;">27-11-2025</div>
                              </td>
                              <td width="13%" align="left" valign="top">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;"><span style="color:#686868;"><i class="fa fa-clock-o" aria-hidden="true"></i> Last Updated</span></div>
                                <div style="font-size:11px; line-height: 16px; margin-bottom:3px;">27/11/2025 - 06:55 PM</div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                                          </div>
                                      <div class="querylistbox">
                      <div class="qtp">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                          <tbody>
                            <tr>
                              <td width="3%" align="left" valign="top" style="padding-right:10px;"><input type="checkbox" name="assignall[]" class="checkBoxClass" id="assignqury" value="127490" onclick="selectedfun();" style="width: 16px; height: 16px;"> </td>
                              <td width="14%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:15px; font-weight:500;line-height: 16px; margin-bottom:3px; font-weight:600;"><a href="display.html?ga=query&view=1&id=127490">127490</a></div>
                                <span class="badge badge-dark">No Revert</span>                              </td>
                              <td width="20%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:13px; line-height: 16px; margin-bottom:3px;white-space: nowrap; max-width:200px; overflow: hidden; text-overflow: ellipsis;font-weight:600;">Mr. itnery fsdadfdfdf</div>
                                <div style="font-size:13px; color:#686868;">3333333333</div>
                              </td>
                              <td width="17%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:13px; color:#686868;">3333333333</div>
                              </td>
                              <td width="17%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:13px; line-height: 16px;"><span style="color:#686868; font-weight: 600;"></span><br /><span style="color:#686868;">Origin<br />
                                  </span><span style="max-width:180px; overflow:hidden;overflow-wrap: break-word;">                                      <span class="badge badge-boxed  badge-soft-success" style=" background-color: #737373 !important; color:#fff; font-size: 11px; padding: 5px 6px;">Dubai</span>
                                    </span></div>
                                <div style="font-size:13px; line-height: 16px;"><span style="color:#686868;">Destination<br />
                                  </span><span style="max-width:180px; overflow:hidden;overflow-wrap: break-word;">                                      <span class="badge badge-boxed  badge-soft-success" style=" background-color: #737373 !important; color:#fff; font-size: 11px; padding: 5px 6px;">Affligem</span>
                                    </span></div>
                              </td>
                              <td width="15%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;"><span style="color:#686868;"><i class="fa fa-calendar" aria-hidden="true"></i></span> 23-11-2025</div>
                                <div style="font-size:12px; line-height: 16px;"><span style="color:#686868;">Till</span> 25-11-2025</div>
                              </td>
                              <td align="left" valign="top" style="font-size:13px; line-height: 16px;">No Task</span>

                                <div style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; font-size:12px;color:#686868;white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width:200px;"><i class="fa fa-sticky-note" aria-hidden="true" style=" color:#ffa500;"></i> &nbsp;No Notes                                </div>
                              </td>
                              <td width="13%" align="right" valign="middle">
                                <div class="btn-group" role="group" aria-label="Option">
                                  <a href="display.html?ga=query&view=1&id=127490"><button type="button" class="btn btn-secondary"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                                                                                            <a target="_blank" href="https://api.whatsapp.com/send?text=Hi&phone=+913333333333"><button type="button" class="btn btn-secondary"><i class="fa fa-whatsapp" aria-hidden="true"></i></button></a>
                                                                        <a popaction="action=composemail&queryId=127490" onclick="loadpop('Compose Mail',this,'900px')" data-toggle="modal" data-target=".bs-example-modal-center"><button type="button" class="btn btn-secondary"><i class="fa fa-envelope-o" aria-hidden="true"></i></button></a>
                                    <a onclick="createquery('127490');"><button type="button" class="btn btn-secondary"><i class="fa fa-pencil" aria-hidden="true"></i></button></a>
                                                                  </div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <div class="qbt">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                          <tbody>
                            <tr>
                              <td width="3%" align="center" valign="top" style="padding-right:10px;">                               </td>
                              <td width="14%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;color:#686868;">Requirement</div>
                                <div class="blueicons" style="font-size:12px; font-weight:600;"></div>
                              </td>
                              <td width="20%" align="left" valign="top" style="padding-right:20px;">
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">shobhnath.s@i2a.co</div>
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">Advertisment</div>
                              </td>
                              <td width="17%" align="left" valign="top" style="padding-right:20px;">
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">Travellers</div>
                                <div style="font-size:13px; line-height: 16px;">1 <span style="color:#686868; font-size:11px;">Adult</span> 0 <span style="color:#686868; font-size:11px;">Clild</span> 0 <span style="color:#686868; font-size:11px;">Infant</span></div>
                              </td>
                              <td width="15%" align="left" valign="top" style="padding-right:20px;">
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">Assigned to</div>
                                <div style="font-size:12px;"><select id="assignTo127490" name="assignTo127490" class="form-control" style="padding: 3px; font-size: 12px; height: 25px; line-height: 15px; color: #000; font-weight: 600;" autocomplete="off" onchange="changeAssignTo('127490');">
                                    <option value="1">Assign to me</option>
                                                                          <option value="4074" >
                                                                                  Adarsh  Ojha</option>
                                                                          <option value="4069" >
                                                                                  Akash Shrestha</option>
                                                                          <option value="4057" >
                                                                                  Akshay Chikara</option>
                                                                          <option value="4068" >
                                                                                  Alok  Kumar</option>
                                                                          <option value="4047" >
                                                                                  Anjali A</option>
                                                                          <option value="4072" >
                                                                                  Anjana Thakur</option>
                                                                          <option value="4024" >
                                                                                  Ayush Pandey</option>
                                                                          <option value="4055" >
                                                                                  Ayush  Gupta</option>
                                                                          <option value="4028" >
                                                                                  Daud Khan</option>
                                                                          <option value="4049" >
                                                                                  Ekta Shrestha</option>
                                                                          <option value="4019" >
                                                                                  Gokul K</option>
                                                                          <option value="4027" >
                                                                                  Harshita Singh</option>
                                                                          <option value="4038" >
                                                                                  Honey hm</option>
                                                                          <option value="4026" >
                                                                                  Jake AS</option>
                                                                          <option value="4075" >
                                                                                  Jennifer Chanu</option>
                                                                          <option value="4051" >
                                                                                  Kavita Shahi</option>
                                                                          <option value="4071" >
                                                                                  Khushi Gupta</option>
                                                                          <option value="4076" >
                                                                                  MIS i2a</option>
                                                                          <option value="4073" >
                                                                                  Mohd Arsh Khan</option>
                                                                          <option value="4029" >
                                                                                  Mohsin Hussain</option>
                                                                          <option value="4054" >
                                                                                  Neha  Singh	</option>
                                                                          <option value="4014" >
                                                                                  Nishant Kumar</option>
                                                                          <option value="4052" >
                                                                                  Noman  Ahmed	</option>
                                                                          <option value="4040" >
                                                                                  Pintu Kumar</option>
                                                                          <option value="4043" >
                                                                                  Prashant Sharma</option>
                                                                          <option value="4030" >
                                                                                  Prashant Kumar Sharma</option>
                                                                          <option value="4023" >
                                                                                  Radha R</option>
                                                                          <option value="4013" >
                                                                                  Sachin Kumar</option>
                                                                          <option value="4044" >
                                                                                  Sachin  Singh Maher</option>
                                                                          <option value="4017" >
                                                                                  Sajad Khan</option>
                                                                          <option value="4016" >
                                                                                  Saurabh Rai</option>
                                                                          <option value="4022" >
                                                                                  Shivani Sharma</option>
                                                                          <option value="4078" >
                                                                                  shobhnath l2a</option>
                                                                          <option value="4048" >
                                                                                  Suchita Massey</option>
                                                                          <option value="4012" >
                                                                                  Sujeet Kumar</option>
                                                                          <option value="4050" >
                                                                                  Sunil S</option>
                                                                          <option value="4046" >
                                                                                  Suraj Sahu</option>
                                                                          <option value="4015" >
                                                                                  Swapnil Sinha</option>
                                                                          <option value="4045" >
                                                                                  Tannu T</option>
                                                                          <option value="4018" >
                                                                                  umesh singh</option>
                                                                          <option value="4020" >
                                                                                  Vaasu  Arora	</option>
                                                                          <option value="4077" >
                                                                                  Vinay singh</option>
                                                                          <option value="4025" >
                                                                                  vivek kumar</option>
                                                                          <option value="4053" >
                                                                                  Yashika Sharma</option>
                                                                          <option value="4061" >
                                                                                  Yatin y</option>
                                                                          <option value="4070" >
                                                                                  Yuvraj  Singh</option>
                                                                          <option value="4021" >
                                                                                  Zuhair  Abbas	</option>
                                                                      </select> </div>
                              </td>
                              <td align="left" valign="top">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;"><span style="color:#686868;"><i class="fa fa-clock-o" aria-hidden="true"></i> Created</span></div>
                                <div style="font-size:11px; line-height: 16px; margin-bottom:3px;">21-11-2025</div>
                              </td>
                              <td width="13%" align="left" valign="top">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;"><span style="color:#686868;"><i class="fa fa-clock-o" aria-hidden="true"></i> Last Updated</span></div>
                                <div style="font-size:11px; line-height: 16px; margin-bottom:3px;">27/11/2025 - 05:53 PM</div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                                          </div>
                                      <div class="querylistbox">
                      <div class="qtp">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                          <tbody>
                            <tr>
                              <td width="3%" align="left" valign="top" style="padding-right:10px;"><input type="checkbox" name="assignall[]" class="checkBoxClass" id="assignqury" value="127481" onclick="selectedfun();" style="width: 16px; height: 16px;"> </td>
                              <td width="14%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:15px; font-weight:500;line-height: 16px; margin-bottom:3px; font-weight:600;"><a href="display.html?ga=query&view=1&id=127481">127481</a></div>
                                <span class="badge badge-orange">Follow Up</span>                              </td>
                              <td width="20%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:13px; line-height: 16px; margin-bottom:3px;white-space: nowrap; max-width:200px; overflow: hidden; text-overflow: ellipsis;font-weight:600;">Mr. umesh singh singh singh</div>
                                <div style="font-size:13px; color:#686868;">8383035899</div>
                              </td>
                              <td width="17%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:13px; color:#686868;">8383035899</div>
                              </td>
                              <td width="17%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:13px; line-height: 16px;"><span style="color:#686868; font-weight: 600;"></span><br /><span style="color:#686868;">Origin<br />
                                  </span><span style="max-width:180px; overflow:hidden;overflow-wrap: break-word;">                                      <span class="badge badge-boxed  badge-soft-success" style=" background-color: #737373 !important; color:#fff; font-size: 11px; padding: 5px 6px;">Acquarica del Capo</span>
                                    </span></div>
                                <div style="font-size:13px; line-height: 16px;"><span style="color:#686868;">Destination<br />
                                  </span><span style="max-width:180px; overflow:hidden;overflow-wrap: break-word;">                                      <span class="badge badge-boxed  badge-soft-success" style=" background-color: #737373 !important; color:#fff; font-size: 11px; padding: 5px 6px;">Abramut</span>
                                    </span></div>
                              </td>
                              <td width="15%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;"><span style="color:#686868;"><i class="fa fa-calendar" aria-hidden="true"></i></span> 15-11-2025</div>
                                <div style="font-size:12px; line-height: 16px;"><span style="color:#686868;">Till</span> 17-11-2025</div>
                              </td>
                              <td align="left" valign="top" style="font-size:13px; line-height: 16px;">No Task</span>

                                <div style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; font-size:12px;color:#686868;white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width:200px;"><i class="fa fa-sticky-note" aria-hidden="true" style=" color:#ffa500;"></i> &nbsp;No Notes                                </div>
                              </td>
                              <td width="13%" align="right" valign="middle">
                                <div class="btn-group" role="group" aria-label="Option">
                                  <a href="display.html?ga=query&view=1&id=127481"><button type="button" class="btn btn-secondary"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                                                                                            <a target="_blank" href="https://api.whatsapp.com/send?text=Hi&phone=+918383035899"><button type="button" class="btn btn-secondary"><i class="fa fa-whatsapp" aria-hidden="true"></i></button></a>
                                                                        <a popaction="action=composemail&queryId=127481" onclick="loadpop('Compose Mail',this,'900px')" data-toggle="modal" data-target=".bs-example-modal-center"><button type="button" class="btn btn-secondary"><i class="fa fa-envelope-o" aria-hidden="true"></i></button></a>
                                    <a onclick="createquery('127481');"><button type="button" class="btn btn-secondary"><i class="fa fa-pencil" aria-hidden="true"></i></button></a>
                                                                  </div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <div class="qbt">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                          <tbody>
                            <tr>
                              <td width="3%" align="center" valign="top" style="padding-right:10px;">                               </td>
                              <td width="14%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;color:#686868;">Requirement</div>
                                <div class="blueicons" style="font-size:12px; font-weight:600;"></div>
                              </td>
                              <td width="20%" align="left" valign="top" style="padding-right:20px;">
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">umesh@akounto.com</div>
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">Advertisment</div>
                              </td>
                              <td width="17%" align="left" valign="top" style="padding-right:20px;">
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">Travellers</div>
                                <div style="font-size:13px; line-height: 16px;">1 <span style="color:#686868; font-size:11px;">Adult</span> 0 <span style="color:#686868; font-size:11px;">Clild</span> 0 <span style="color:#686868; font-size:11px;">Infant</span></div>
                              </td>
                              <td width="15%" align="left" valign="top" style="padding-right:20px;">
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">Assigned to</div>
                                <div style="font-size:12px;"><select id="assignTo127481" name="assignTo127481" class="form-control" style="padding: 3px; font-size: 12px; height: 25px; line-height: 15px; color: #000; font-weight: 600;" autocomplete="off" onchange="changeAssignTo('127481');">
                                    <option value="1">Assign to me</option>
                                                                          <option value="4074" >
                                                                                  Adarsh  Ojha</option>
                                                                          <option value="4069" >
                                                                                  Akash Shrestha</option>
                                                                          <option value="4057" >
                                                                                  Akshay Chikara</option>
                                                                          <option value="4068" >
                                                                                  Alok  Kumar</option>
                                                                          <option value="4047" >
                                                                                  Anjali A</option>
                                                                          <option value="4072" >
                                                                                  Anjana Thakur</option>
                                                                          <option value="4024" >
                                                                                  Ayush Pandey</option>
                                                                          <option value="4055" >
                                                                                  Ayush  Gupta</option>
                                                                          <option value="4028" >
                                                                                  Daud Khan</option>
                                                                          <option value="4049" >
                                                                                  Ekta Shrestha</option>
                                                                          <option value="4019" >
                                                                                  Gokul K</option>
                                                                          <option value="4027" >
                                                                                  Harshita Singh</option>
                                                                          <option value="4038" >
                                                                                  Honey hm</option>
                                                                          <option value="4026" >
                                                                                  Jake AS</option>
                                                                          <option value="4075" >
                                                                                  Jennifer Chanu</option>
                                                                          <option value="4051" >
                                                                                  Kavita Shahi</option>
                                                                          <option value="4071" >
                                                                                  Khushi Gupta</option>
                                                                          <option value="4076" >
                                                                                  MIS i2a</option>
                                                                          <option value="4073" >
                                                                                  Mohd Arsh Khan</option>
                                                                          <option value="4029" >
                                                                                  Mohsin Hussain</option>
                                                                          <option value="4054" >
                                                                                  Neha  Singh	</option>
                                                                          <option value="4014" >
                                                                                  Nishant Kumar</option>
                                                                          <option value="4052" >
                                                                                  Noman  Ahmed	</option>
                                                                          <option value="4040" >
                                                                                  Pintu Kumar</option>
                                                                          <option value="4043" >
                                                                                  Prashant Sharma</option>
                                                                          <option value="4030" >
                                                                                  Prashant Kumar Sharma</option>
                                                                          <option value="4023" >
                                                                                  Radha R</option>
                                                                          <option value="4013" >
                                                                                  Sachin Kumar</option>
                                                                          <option value="4044" >
                                                                                  Sachin  Singh Maher</option>
                                                                          <option value="4017" >
                                                                                  Sajad Khan</option>
                                                                          <option value="4016" >
                                                                                  Saurabh Rai</option>
                                                                          <option value="4022" >
                                                                                  Shivani Sharma</option>
                                                                          <option value="4078" >
                                                                                  shobhnath l2a</option>
                                                                          <option value="4048" >
                                                                                  Suchita Massey</option>
                                                                          <option value="4012" >
                                                                                  Sujeet Kumar</option>
                                                                          <option value="4050" >
                                                                                  Sunil S</option>
                                                                          <option value="4046" >
                                                                                  Suraj Sahu</option>
                                                                          <option value="4015" >
                                                                                  Swapnil Sinha</option>
                                                                          <option value="4045" >
                                                                                  Tannu T</option>
                                                                          <option value="4018" >
                                                                                  umesh singh</option>
                                                                          <option value="4020" >
                                                                                  Vaasu  Arora	</option>
                                                                          <option value="4077" >
                                                                                  Vinay singh</option>
                                                                          <option value="4025" >
                                                                                  vivek kumar</option>
                                                                          <option value="4053" >
                                                                                  Yashika Sharma</option>
                                                                          <option value="4061" >
                                                                                  Yatin y</option>
                                                                          <option value="4070" >
                                                                                  Yuvraj  Singh</option>
                                                                          <option value="4021" >
                                                                                  Zuhair  Abbas	</option>
                                                                      </select> </div>
                              </td>
                              <td align="left" valign="top">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;"><span style="color:#686868;"><i class="fa fa-clock-o" aria-hidden="true"></i> Created</span></div>
                                <div style="font-size:11px; line-height: 16px; margin-bottom:3px;">13-11-2025</div>
                              </td>
                              <td width="13%" align="left" valign="top">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;"><span style="color:#686868;"><i class="fa fa-clock-o" aria-hidden="true"></i> Last Updated</span></div>
                                <div style="font-size:11px; line-height: 16px; margin-bottom:3px;">21/11/2025 - 03:58 PM</div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                                              <div class="viewpackageheader" onclick="$('#pro27481').toggle();"><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp;View Proposal (2)</div>
                        <div class="proposallistouter" style="display:none;" id="pro27481">
                                                      <a href="display.html?ga=itineraries&view=1&id=109121"><i class="fa fa-list-alt" aria-hidden="true"></i> &nbsp;itnery 13 (&#8377; 315 ) &nbsp; </a>
                                                      <a href="display.html?ga=itineraries&view=1&id=109119"><i class="fa fa-list-alt" aria-hidden="true"></i> &nbsp;test perposal  (&#8377; 0 ) &nbsp; </a>
                                                  </div>
                                          </div>
                                      <div class="querylistbox">
                      <div class="qtp">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                          <tbody>
                            <tr>
                              <td width="3%" align="left" valign="top" style="padding-right:10px;"><input type="checkbox" name="assignall[]" class="checkBoxClass" id="assignqury" value="127480" onclick="selectedfun();" style="width: 16px; height: 16px;"> </td>
                              <td width="14%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:15px; font-weight:500;line-height: 16px; margin-bottom:3px; font-weight:600;"><a href="display.html?ga=query&view=1&id=127480">127480</a></div>
                                <span class="badge badge-dark">No Revert</span>                              </td>
                              <td width="20%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:13px; line-height: 16px; margin-bottom:3px;white-space: nowrap; max-width:200px; overflow: hidden; text-overflow: ellipsis;font-weight:600;">Mr. Milind Deshmukh</div>
                                <div style="font-size:13px; color:#686868;">9820212312</div>
                              </td>
                              <td width="17%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:13px; color:#686868;">9820212312</div>
                              </td>
                              <td width="17%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:13px; line-height: 16px;"><span style="color:#686868; font-weight: 600;"></span><br /><span style="color:#686868;">Origin<br />
                                  </span><span style="max-width:180px; overflow:hidden;overflow-wrap: break-word;">                                      <span class="badge badge-boxed  badge-soft-success" style=" background-color: #737373 !important; color:#fff; font-size: 11px; padding: 5px 6px;">Delhi</span>
                                    </span></div>
                                <div style="font-size:13px; line-height: 16px;"><span style="color:#686868;">Destination<br />
                                  </span><span style="max-width:180px; overflow:hidden;overflow-wrap: break-word;">                                      <span class="badge badge-boxed  badge-soft-success" style=" background-color: #737373 !important; color:#fff; font-size: 11px; padding: 5px 6px;">Mumbai</span>
                                    </span></div>
                              </td>
                              <td width="15%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;"><span style="color:#686868;"><i class="fa fa-calendar" aria-hidden="true"></i></span> 02-10-2025</div>
                                <div style="font-size:12px; line-height: 16px;"><span style="color:#686868;">Till</span> 04-10-2025</div>
                              </td>
                              <td align="left" valign="top" style="font-size:13px; line-height: 16px;">No Task</span>

                                <div style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; font-size:12px;color:#686868;white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width:200px;"><i class="fa fa-sticky-note" aria-hidden="true" style=" color:#ffa500;"></i> &nbsp;No Notes                                </div>
                              </td>
                              <td width="13%" align="right" valign="middle">
                                <div class="btn-group" role="group" aria-label="Option">
                                  <a href="display.html?ga=query&view=1&id=127480"><button type="button" class="btn btn-secondary"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                                                                                            <a target="_blank" href="https://api.whatsapp.com/send?text=Hi&phone=+919820212312"><button type="button" class="btn btn-secondary"><i class="fa fa-whatsapp" aria-hidden="true"></i></button></a>
                                                                        <a popaction="action=composemail&queryId=127480" onclick="loadpop('Compose Mail',this,'900px')" data-toggle="modal" data-target=".bs-example-modal-center"><button type="button" class="btn btn-secondary"><i class="fa fa-envelope-o" aria-hidden="true"></i></button></a>
                                    <a onclick="createquery('127480');"><button type="button" class="btn btn-secondary"><i class="fa fa-pencil" aria-hidden="true"></i></button></a>
                                                                  </div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <div class="qbt">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                          <tbody>
                            <tr>
                              <td width="3%" align="center" valign="top" style="padding-right:10px;">                               </td>
                              <td width="14%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;color:#686868;">Requirement</div>
                                <div class="blueicons" style="font-size:12px; font-weight:600;"></div>
                              </td>
                              <td width="20%" align="left" valign="top" style="padding-right:20px;">
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">ss.mdeshmukh52@gmail.com</div>
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">Advertisment</div>
                              </td>
                              <td width="17%" align="left" valign="top" style="padding-right:20px;">
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">Travellers</div>
                                <div style="font-size:13px; line-height: 16px;">1 <span style="color:#686868; font-size:11px;">Adult</span> 0 <span style="color:#686868; font-size:11px;">Clild</span> 0 <span style="color:#686868; font-size:11px;">Infant</span></div>
                              </td>
                              <td width="15%" align="left" valign="top" style="padding-right:20px;">
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">Assigned to</div>
                                <div style="font-size:12px;"><select id="assignTo127480" name="assignTo127480" class="form-control" style="padding: 3px; font-size: 12px; height: 25px; line-height: 15px; color: #000; font-weight: 600;" autocomplete="off" onchange="changeAssignTo('127480');">
                                    <option value="1">Assign to me</option>
                                                                          <option value="4074" >
                                                                                  Adarsh  Ojha</option>
                                                                          <option value="4069" >
                                                                                  Akash Shrestha</option>
                                                                          <option value="4057" >
                                                                                  Akshay Chikara</option>
                                                                          <option value="4068" >
                                                                                  Alok  Kumar</option>
                                                                          <option value="4047" >
                                                                                  Anjali A</option>
                                                                          <option value="4072" >
                                                                                  Anjana Thakur</option>
                                                                          <option value="4024" >
                                                                                  Ayush Pandey</option>
                                                                          <option value="4055" >
                                                                                  Ayush  Gupta</option>
                                                                          <option value="4028" >
                                                                                  Daud Khan</option>
                                                                          <option value="4049" >
                                                                                  Ekta Shrestha</option>
                                                                          <option value="4019" >
                                                                                  Gokul K</option>
                                                                          <option value="4027" >
                                                                                  Harshita Singh</option>
                                                                          <option value="4038" >
                                                                                  Honey hm</option>
                                                                          <option value="4026" >
                                                                                  Jake AS</option>
                                                                          <option value="4075" >
                                                                                  Jennifer Chanu</option>
                                                                          <option value="4051" >
                                                                                  Kavita Shahi</option>
                                                                          <option value="4071" >
                                                                                  Khushi Gupta</option>
                                                                          <option value="4076" >
                                                                                  MIS i2a</option>
                                                                          <option value="4073" >
                                                                                  Mohd Arsh Khan</option>
                                                                          <option value="4029" >
                                                                                  Mohsin Hussain</option>
                                                                          <option value="4054" >
                                                                                  Neha  Singh	</option>
                                                                          <option value="4014" >
                                                                                  Nishant Kumar</option>
                                                                          <option value="4052" >
                                                                                  Noman  Ahmed	</option>
                                                                          <option value="4040" >
                                                                                  Pintu Kumar</option>
                                                                          <option value="4043" >
                                                                                  Prashant Sharma</option>
                                                                          <option value="4030" >
                                                                                  Prashant Kumar Sharma</option>
                                                                          <option value="4023" >
                                                                                  Radha R</option>
                                                                          <option value="4013" >
                                                                                  Sachin Kumar</option>
                                                                          <option value="4044" >
                                                                                  Sachin  Singh Maher</option>
                                                                          <option value="4017" >
                                                                                  Sajad Khan</option>
                                                                          <option value="4016" >
                                                                                  Saurabh Rai</option>
                                                                          <option value="4022" >
                                                                                  Shivani Sharma</option>
                                                                          <option value="4078" >
                                                                                  shobhnath l2a</option>
                                                                          <option value="4048" >
                                                                                  Suchita Massey</option>
                                                                          <option value="4012" >
                                                                                  Sujeet Kumar</option>
                                                                          <option value="4050" >
                                                                                  Sunil S</option>
                                                                          <option value="4046" >
                                                                                  Suraj Sahu</option>
                                                                          <option value="4015" >
                                                                                  Swapnil Sinha</option>
                                                                          <option value="4045" >
                                                                                  Tannu T</option>
                                                                          <option value="4018" >
                                                                                  umesh singh</option>
                                                                          <option value="4020" >
                                                                                  Vaasu  Arora	</option>
                                                                          <option value="4077" >
                                                                                  Vinay singh</option>
                                                                          <option value="4025" >
                                                                                  vivek kumar</option>
                                                                          <option value="4053" >
                                                                                  Yashika Sharma</option>
                                                                          <option value="4061" >
                                                                                  Yatin y</option>
                                                                          <option value="4070" >
                                                                                  Yuvraj  Singh</option>
                                                                          <option value="4021" >
                                                                                  Zuhair  Abbas	</option>
                                                                      </select> </div>
                              </td>
                              <td align="left" valign="top">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;"><span style="color:#686868;"><i class="fa fa-clock-o" aria-hidden="true"></i> Created</span></div>
                                <div style="font-size:11px; line-height: 16px; margin-bottom:3px;">30-09-2025</div>
                              </td>
                              <td width="13%" align="left" valign="top">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;"><span style="color:#686868;"><i class="fa fa-clock-o" aria-hidden="true"></i> Last Updated</span></div>
                                <div style="font-size:11px; line-height: 16px; margin-bottom:3px;">30/09/2025 - 01:38 PM</div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                                              <div class="viewpackageheader" onclick="$('#pro27480').toggle();"><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp;View Proposal (3)</div>
                        <div class="proposallistouter" style="display:none;" id="pro27480">
                                                      <a href="display.html?ga=itineraries&view=1&id=109114"><i class="fa fa-list-alt" aria-hidden="true"></i> &nbsp;create new itinery 12 (&#8377; 474 ) &nbsp; <i class="fa fa-check" aria-hidden="true" style="color:#00CC00;"></i></a>
                                                      <a href="display.html?ga=itineraries&view=1&id=109101"><i class="fa fa-list-alt" aria-hidden="true"></i> &nbsp;Memorable Bali Tour Package (&#8377; 55 ) &nbsp; </a>
                                                      <a href="display.html?ga=itineraries&view=1&id=109100"><i class="fa fa-list-alt" aria-hidden="true"></i> &nbsp;shobhnath test (&#8377; 122 ) &nbsp; </a>
                                                  </div>
                                          </div>
                                      <div class="querylistbox">
                      <div class="qtp">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                          <tbody>
                            <tr>
                              <td width="3%" align="left" valign="top" style="padding-right:10px;"><input type="checkbox" name="assignall[]" class="checkBoxClass" id="assignqury" value="127479" onclick="selectedfun();" style="width: 16px; height: 16px;"> </td>
                              <td width="14%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:15px; font-weight:500;line-height: 16px; margin-bottom:3px; font-weight:600;"><a href="display.html?ga=query&view=1&id=127479">127479</a></div>
                                <span class="badge badge-primary">New</span>                              </td>
                              <td width="20%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:13px; line-height: 16px; margin-bottom:3px;white-space: nowrap; max-width:200px; overflow: hidden; text-overflow: ellipsis;font-weight:600;">Mr. Milind Deshmukh</div>
                                <div style="font-size:13px; color:#686868;">9820212312</div>
                              </td>
                              <td width="17%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:13px; color:#686868;">9820212312</div>
                              </td>
                              <td width="17%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:13px; line-height: 16px;"><span style="color:#686868; font-weight: 600;"></span><br /><span style="color:#686868;">Origin<br />
                                  </span><span style="max-width:180px; overflow:hidden;overflow-wrap: break-word;">                                      <span class="badge badge-boxed  badge-soft-success" style=" background-color: #737373 !important; color:#fff; font-size: 11px; padding: 5px 6px;">Delhi</span>
                                    </span></div>
                                <div style="font-size:13px; line-height: 16px;"><span style="color:#686868;">Destination<br />
                                  </span><span style="max-width:180px; overflow:hidden;overflow-wrap: break-word;">                                      <span class="badge badge-boxed  badge-soft-success" style=" background-color: #737373 !important; color:#fff; font-size: 11px; padding: 5px 6px;">Mumbai</span>
                                    </span></div>
                              </td>
                              <td width="15%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;"><span style="color:#686868;"><i class="fa fa-calendar" aria-hidden="true"></i></span> 02-10-2025</div>
                                <div style="font-size:12px; line-height: 16px;"><span style="color:#686868;">Till</span> 04-10-2025</div>
                              </td>
                              <td align="left" valign="top" style="font-size:13px; line-height: 16px;">No Task</span>

                                <div style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; font-size:12px;color:#686868;white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width:200px;"><i class="fa fa-sticky-note" aria-hidden="true" style=" color:#ffa500;"></i> &nbsp;No Notes                                </div>
                              </td>
                              <td width="13%" align="right" valign="middle">
                                <div class="btn-group" role="group" aria-label="Option">
                                  <a href="display.html?ga=query&view=1&id=127479"><button type="button" class="btn btn-secondary"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                                                                                            <a target="_blank" href="https://api.whatsapp.com/send?text=Hi&phone=+919820212312"><button type="button" class="btn btn-secondary"><i class="fa fa-whatsapp" aria-hidden="true"></i></button></a>
                                                                        <a popaction="action=composemail&queryId=127479" onclick="loadpop('Compose Mail',this,'900px')" data-toggle="modal" data-target=".bs-example-modal-center"><button type="button" class="btn btn-secondary"><i class="fa fa-envelope-o" aria-hidden="true"></i></button></a>
                                    <a onclick="createquery('127479');"><button type="button" class="btn btn-secondary"><i class="fa fa-pencil" aria-hidden="true"></i></button></a>
                                                                  </div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <div class="qbt">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                          <tbody>
                            <tr>
                              <td width="3%" align="center" valign="top" style="padding-right:10px;">                               </td>
                              <td width="14%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;color:#686868;">Requirement</div>
                                <div class="blueicons" style="font-size:12px; font-weight:600;"></div>
                              </td>
                              <td width="20%" align="left" valign="top" style="padding-right:20px;">
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">ss.mdeshmukh52@gmail.com</div>
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">Advertisment</div>
                              </td>
                              <td width="17%" align="left" valign="top" style="padding-right:20px;">
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">Travellers</div>
                                <div style="font-size:13px; line-height: 16px;">1 <span style="color:#686868; font-size:11px;">Adult</span> 0 <span style="color:#686868; font-size:11px;">Clild</span> 0 <span style="color:#686868; font-size:11px;">Infant</span></div>
                              </td>
                              <td width="15%" align="left" valign="top" style="padding-right:20px;">
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">Assigned to</div>
                                <div style="font-size:12px;"><select id="assignTo127479" name="assignTo127479" class="form-control" style="padding: 3px; font-size: 12px; height: 25px; line-height: 15px; color: #000; font-weight: 600;" autocomplete="off" onchange="changeAssignTo('127479');">
                                    <option value="1">Assign to me</option>
                                                                          <option value="4074" >
                                                                                  Adarsh  Ojha</option>
                                                                          <option value="4069" >
                                                                                  Akash Shrestha</option>
                                                                          <option value="4057" >
                                                                                  Akshay Chikara</option>
                                                                          <option value="4068" >
                                                                                  Alok  Kumar</option>
                                                                          <option value="4047" >
                                                                                  Anjali A</option>
                                                                          <option value="4072" >
                                                                                  Anjana Thakur</option>
                                                                          <option value="4024" >
                                                                                  Ayush Pandey</option>
                                                                          <option value="4055" >
                                                                                  Ayush  Gupta</option>
                                                                          <option value="4028" >
                                                                                  Daud Khan</option>
                                                                          <option value="4049" >
                                                                                  Ekta Shrestha</option>
                                                                          <option value="4019" >
                                                                                  Gokul K</option>
                                                                          <option value="4027" >
                                                                                  Harshita Singh</option>
                                                                          <option value="4038" >
                                                                                  Honey hm</option>
                                                                          <option value="4026" >
                                                                                  Jake AS</option>
                                                                          <option value="4075" >
                                                                                  Jennifer Chanu</option>
                                                                          <option value="4051" >
                                                                                  Kavita Shahi</option>
                                                                          <option value="4071" >
                                                                                  Khushi Gupta</option>
                                                                          <option value="4076" >
                                                                                  MIS i2a</option>
                                                                          <option value="4073" >
                                                                                  Mohd Arsh Khan</option>
                                                                          <option value="4029" >
                                                                                  Mohsin Hussain</option>
                                                                          <option value="4054" >
                                                                                  Neha  Singh	</option>
                                                                          <option value="4014" >
                                                                                  Nishant Kumar</option>
                                                                          <option value="4052" >
                                                                                  Noman  Ahmed	</option>
                                                                          <option value="4040" >
                                                                                  Pintu Kumar</option>
                                                                          <option value="4043" >
                                                                                  Prashant Sharma</option>
                                                                          <option value="4030" >
                                                                                  Prashant Kumar Sharma</option>
                                                                          <option value="4023" >
                                                                                  Radha R</option>
                                                                          <option value="4013" >
                                                                                  Sachin Kumar</option>
                                                                          <option value="4044" >
                                                                                  Sachin  Singh Maher</option>
                                                                          <option value="4017" >
                                                                                  Sajad Khan</option>
                                                                          <option value="4016" >
                                                                                  Saurabh Rai</option>
                                                                          <option value="4022" >
                                                                                  Shivani Sharma</option>
                                                                          <option value="4078" >
                                                                                  shobhnath l2a</option>
                                                                          <option value="4048" >
                                                                                  Suchita Massey</option>
                                                                          <option value="4012" >
                                                                                  Sujeet Kumar</option>
                                                                          <option value="4050" >
                                                                                  Sunil S</option>
                                                                          <option value="4046" >
                                                                                  Suraj Sahu</option>
                                                                          <option value="4015" >
                                                                                  Swapnil Sinha</option>
                                                                          <option value="4045" >
                                                                                  Tannu T</option>
                                                                          <option value="4018" >
                                                                                  umesh singh</option>
                                                                          <option value="4020" >
                                                                                  Vaasu  Arora	</option>
                                                                          <option value="4077" >
                                                                                  Vinay singh</option>
                                                                          <option value="4025" >
                                                                                  vivek kumar</option>
                                                                          <option value="4053" >
                                                                                  Yashika Sharma</option>
                                                                          <option value="4061" >
                                                                                  Yatin y</option>
                                                                          <option value="4070" >
                                                                                  Yuvraj  Singh</option>
                                                                          <option value="4021" >
                                                                                  Zuhair  Abbas	</option>
                                                                      </select> </div>
                              </td>
                              <td align="left" valign="top">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;"><span style="color:#686868;"><i class="fa fa-clock-o" aria-hidden="true"></i> Created</span></div>
                                <div style="font-size:11px; line-height: 16px; margin-bottom:3px;">30-09-2025</div>
                              </td>
                              <td width="13%" align="left" valign="top">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;"><span style="color:#686868;"><i class="fa fa-clock-o" aria-hidden="true"></i> Last Updated</span></div>
                                <div style="font-size:11px; line-height: 16px; margin-bottom:3px;">30/09/2025 - 01:37 PM</div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                                              <div class="viewpackageheader" onclick="$('#pro27479').toggle();"><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp;View Proposal (6)</div>
                        <div class="proposallistouter" style="display:none;" id="pro27479">
                                                      <a href="display.html?ga=itineraries&view=1&id=109113"><i class="fa fa-list-alt" aria-hidden="true"></i> &nbsp;itnery 13 (&#8377; 13,200,254 ) &nbsp; </a>
                                                      <a href="display.html?ga=itineraries&view=1&id=109108"><i class="fa fa-list-alt" aria-hidden="true"></i> &nbsp;Memorable Bali Tour Package (&#8377; 0 ) &nbsp; </a>
                                                      <a href="display.html?ga=itineraries&view=1&id=109107"><i class="fa fa-list-alt" aria-hidden="true"></i> &nbsp;Memorable Bali Tour Package (&#8377; 0 ) &nbsp; </a>
                                                      <a href="display.html?ga=itineraries&view=1&id=109106"><i class="fa fa-list-alt" aria-hidden="true"></i> &nbsp;Memorable Bali Tour Package (&#8377; 0 ) &nbsp; </a>
                                                      <a href="display.html?ga=itineraries&view=1&id=109105"><i class="fa fa-list-alt" aria-hidden="true"></i> &nbsp;Memorable Bali Tour Package (&#8377; 0 ) &nbsp; </a>
                                                      <a href="display.html?ga=itineraries&view=1&id=109104"><i class="fa fa-list-alt" aria-hidden="true"></i> &nbsp;shobhnath test event (&#8377; 0 ) &nbsp; </a>
                                                  </div>
                                          </div>
                                      <div class="querylistbox">
                      <div class="qtp">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                          <tbody>
                            <tr>
                              <td width="3%" align="left" valign="top" style="padding-right:10px;"><input type="checkbox" name="assignall[]" class="checkBoxClass" id="assignqury" value="127478" onclick="selectedfun();" style="width: 16px; height: 16px;"> </td>
                              <td width="14%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:15px; font-weight:500;line-height: 16px; margin-bottom:3px; font-weight:600;"><a href="display.html?ga=query&view=1&id=127478">127478</a></div>
                                <span class="badge badge-primary">New</span>                              </td>
                              <td width="20%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:13px; line-height: 16px; margin-bottom:3px;white-space: nowrap; max-width:200px; overflow: hidden; text-overflow: ellipsis;font-weight:600;">Mr. Gopal Lal Verma</div>
                                <div style="font-size:13px; color:#686868;">9414179990</div>
                              </td>
                              <td width="17%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:13px; color:#686868;">9414179990</div>
                              </td>
                              <td width="17%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:13px; line-height: 16px;"><span style="color:#686868; font-weight: 600;">Domestic</span><br /><span style="color:#686868;">Origin<br />
                                  </span><span style="max-width:180px; overflow:hidden;overflow-wrap: break-word;">                                      <span class="badge badge-boxed  badge-soft-success" style=" background-color: #737373 !important; color:#fff; font-size: 11px; padding: 5px 6px;">Delhi</span>
                                    </span></div>
                                <div style="font-size:13px; line-height: 16px;"><span style="color:#686868;">Destination<br />
                                  </span><span style="max-width:180px; overflow:hidden;overflow-wrap: break-word;">                                      <span class="badge badge-boxed  badge-soft-success" style=" background-color: #737373 !important; color:#fff; font-size: 11px; padding: 5px 6px;">Jaipur</span>
                                    </span></div>
                              </td>
                              <td width="15%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;"><span style="color:#686868;"><i class="fa fa-calendar" aria-hidden="true"></i></span> 01-01-1970</div>
                                <div style="font-size:12px; line-height: 16px;"><span style="color:#686868;">Till</span> 01-01-1970</div>
                              </td>
                              <td align="left" valign="top" style="font-size:13px; line-height: 16px;">No Task</span>

                                <div style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; font-size:12px;color:#686868;white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width:200px;"><i class="fa fa-sticky-note" aria-hidden="true" style=" color:#ffa500;"></i> &nbsp;No Notes                                </div>
                              </td>
                              <td width="13%" align="right" valign="middle">
                                <div class="btn-group" role="group" aria-label="Option">
                                  <a href="display.html?ga=query&view=1&id=127478"><button type="button" class="btn btn-secondary"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                                                                                            <a target="_blank" href="https://api.whatsapp.com/send?text=Hi&phone=+919414179990"><button type="button" class="btn btn-secondary"><i class="fa fa-whatsapp" aria-hidden="true"></i></button></a>
                                                                        <a popaction="action=composemail&queryId=127478" onclick="loadpop('Compose Mail',this,'900px')" data-toggle="modal" data-target=".bs-example-modal-center"><button type="button" class="btn btn-secondary"><i class="fa fa-envelope-o" aria-hidden="true"></i></button></a>
                                    <a onclick="createquery('127478');"><button type="button" class="btn btn-secondary"><i class="fa fa-pencil" aria-hidden="true"></i></button></a>
                                                                  </div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <div class="qbt">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                          <tbody>
                            <tr>
                              <td width="3%" align="center" valign="top" style="padding-right:10px;">                               </td>
                              <td width="14%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;color:#686868;">Requirement</div>
                                <div class="blueicons" style="font-size:12px; font-weight:600;"></div>
                              </td>
                              <td width="20%" align="left" valign="top" style="padding-right:20px;">
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">ss.vermagldr@gmail.com</div>
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">Facebook</div>
                              </td>
                              <td width="17%" align="left" valign="top" style="padding-right:20px;">
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">Travellers</div>
                                <div style="font-size:13px; line-height: 16px;">1 <span style="color:#686868; font-size:11px;">Adult</span> 0 <span style="color:#686868; font-size:11px;">Clild</span> 0 <span style="color:#686868; font-size:11px;">Infant</span></div>
                              </td>
                              <td width="15%" align="left" valign="top" style="padding-right:20px;">
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">Assigned to</div>
                                <div style="font-size:12px;"><select id="assignTo127478" name="assignTo127478" class="form-control" style="padding: 3px; font-size: 12px; height: 25px; line-height: 15px; color: #000; font-weight: 600;" autocomplete="off" onchange="changeAssignTo('127478');">
                                    <option value="1">Assign to me</option>
                                                                          <option value="4074" >
                                                                                  Adarsh  Ojha</option>
                                                                          <option value="4069" >
                                                                                  Akash Shrestha</option>
                                                                          <option value="4057" >
                                                                                  Akshay Chikara</option>
                                                                          <option value="4068" >
                                                                                  Alok  Kumar</option>
                                                                          <option value="4047" >
                                                                                  Anjali A</option>
                                                                          <option value="4072" >
                                                                                  Anjana Thakur</option>
                                                                          <option value="4024" >
                                                                                  Ayush Pandey</option>
                                                                          <option value="4055" >
                                                                                  Ayush  Gupta</option>
                                                                          <option value="4028" >
                                                                                  Daud Khan</option>
                                                                          <option value="4049" >
                                                                                  Ekta Shrestha</option>
                                                                          <option value="4019" >
                                                                                  Gokul K</option>
                                                                          <option value="4027" >
                                                                                  Harshita Singh</option>
                                                                          <option value="4038" >
                                                                                  Honey hm</option>
                                                                          <option value="4026" >
                                                                                  Jake AS</option>
                                                                          <option value="4075" >
                                                                                  Jennifer Chanu</option>
                                                                          <option value="4051" >
                                                                                  Kavita Shahi</option>
                                                                          <option value="4071" >
                                                                                  Khushi Gupta</option>
                                                                          <option value="4076" >
                                                                                  MIS i2a</option>
                                                                          <option value="4073" >
                                                                                  Mohd Arsh Khan</option>
                                                                          <option value="4029" >
                                                                                  Mohsin Hussain</option>
                                                                          <option value="4054" >
                                                                                  Neha  Singh	</option>
                                                                          <option value="4014" >
                                                                                  Nishant Kumar</option>
                                                                          <option value="4052" >
                                                                                  Noman  Ahmed	</option>
                                                                          <option value="4040" >
                                                                                  Pintu Kumar</option>
                                                                          <option value="4043" >
                                                                                  Prashant Sharma</option>
                                                                          <option value="4030" >
                                                                                  Prashant Kumar Sharma</option>
                                                                          <option value="4023" >
                                                                                  Radha R</option>
                                                                          <option value="4013" >
                                                                                  Sachin Kumar</option>
                                                                          <option value="4044" >
                                                                                  Sachin  Singh Maher</option>
                                                                          <option value="4017" >
                                                                                  Sajad Khan</option>
                                                                          <option value="4016" >
                                                                                  Saurabh Rai</option>
                                                                          <option value="4022" >
                                                                                  Shivani Sharma</option>
                                                                          <option value="4078" >
                                                                                  shobhnath l2a</option>
                                                                          <option value="4048" >
                                                                                  Suchita Massey</option>
                                                                          <option value="4012" >
                                                                                  Sujeet Kumar</option>
                                                                          <option value="4050" >
                                                                                  Sunil S</option>
                                                                          <option value="4046" >
                                                                                  Suraj Sahu</option>
                                                                          <option value="4015" >
                                                                                  Swapnil Sinha</option>
                                                                          <option value="4045" >
                                                                                  Tannu T</option>
                                                                          <option value="4018" >
                                                                                  umesh singh</option>
                                                                          <option value="4020" >
                                                                                  Vaasu  Arora	</option>
                                                                          <option value="4077" >
                                                                                  Vinay singh</option>
                                                                          <option value="4025" >
                                                                                  vivek kumar</option>
                                                                          <option value="4053" >
                                                                                  Yashika Sharma</option>
                                                                          <option value="4061" >
                                                                                  Yatin y</option>
                                                                          <option value="4070" >
                                                                                  Yuvraj  Singh</option>
                                                                          <option value="4021" >
                                                                                  Zuhair  Abbas	</option>
                                                                      </select> </div>
                              </td>
                              <td align="left" valign="top">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;"><span style="color:#686868;"><i class="fa fa-clock-o" aria-hidden="true"></i> Created</span></div>
                                <div style="font-size:11px; line-height: 16px; margin-bottom:3px;">30-09-2025</div>
                              </td>
                              <td width="13%" align="left" valign="top">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;"><span style="color:#686868;"><i class="fa fa-clock-o" aria-hidden="true"></i> Last Updated</span></div>
                                <div style="font-size:11px; line-height: 16px; margin-bottom:3px;">30/09/2025 - 01:33 PM</div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                                              <div class="viewpackageheader" onclick="$('#pro27478').toggle();"><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp;View Proposal (1)</div>
                        <div class="proposallistouter" style="display:none;" id="pro27478">
                                                      <a href="display.html?ga=itineraries&view=1&id=109116"><i class="fa fa-list-alt" aria-hidden="true"></i> &nbsp;itinery  test 29  (&#8377; 0 ) &nbsp; </a>
                                                  </div>
                                          </div>
                                      <div class="querylistbox">
                      <div class="qtp">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                          <tbody>
                            <tr>
                              <td width="3%" align="left" valign="top" style="padding-right:10px;"><input type="checkbox" name="assignall[]" class="checkBoxClass" id="assignqury" value="127477" onclick="selectedfun();" style="width: 16px; height: 16px;"> </td>
                              <td width="14%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:15px; font-weight:500;line-height: 16px; margin-bottom:3px; font-weight:600;"><a href="display.html?ga=query&view=1&id=127477">127477</a></div>
                                <span class="badge badge-primary">New</span>                              </td>
                              <td width="20%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:13px; line-height: 16px; margin-bottom:3px;white-space: nowrap; max-width:200px; overflow: hidden; text-overflow: ellipsis;font-weight:600;">Mr. Milind Deshmukh</div>
                                <div style="font-size:13px; color:#686868;">9820212312</div>
                              </td>
                              <td width="17%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:13px; color:#686868;">9820212312</div>
                              </td>
                              <td width="17%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:13px; line-height: 16px;"><span style="color:#686868; font-weight: 600;">Domestic</span><br /><span style="color:#686868;">Origin<br />
                                  </span><span style="max-width:180px; overflow:hidden;overflow-wrap: break-word;">                                      <span class="badge badge-boxed  badge-soft-success" style=" background-color: #737373 !important; color:#fff; font-size: 11px; padding: 5px 6px;">Delhi</span>
                                    </span></div>
                                <div style="font-size:13px; line-height: 16px;"><span style="color:#686868;">Destination<br />
                                  </span><span style="max-width:180px; overflow:hidden;overflow-wrap: break-word;">                                      <span class="badge badge-boxed  badge-soft-success" style=" background-color: #737373 !important; color:#fff; font-size: 11px; padding: 5px 6px;">Mumbai</span>
                                    </span></div>
                              </td>
                              <td width="15%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;"><span style="color:#686868;"><i class="fa fa-calendar" aria-hidden="true"></i></span> 01-01-1970</div>
                                <div style="font-size:12px; line-height: 16px;"><span style="color:#686868;">Till</span> 01-01-1970</div>
                              </td>
                              <td align="left" valign="top" style="font-size:13px; line-height: 16px;">No Task</span>

                                <div style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; font-size:12px;color:#686868;white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width:200px;"><i class="fa fa-sticky-note" aria-hidden="true" style=" color:#ffa500;"></i> &nbsp;No Notes                                </div>
                              </td>
                              <td width="13%" align="right" valign="middle">
                                <div class="btn-group" role="group" aria-label="Option">
                                  <a href="display.html?ga=query&view=1&id=127477"><button type="button" class="btn btn-secondary"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                                                                                            <a target="_blank" href="https://api.whatsapp.com/send?text=Hi&phone=+919820212312"><button type="button" class="btn btn-secondary"><i class="fa fa-whatsapp" aria-hidden="true"></i></button></a>
                                                                        <a popaction="action=composemail&queryId=127477" onclick="loadpop('Compose Mail',this,'900px')" data-toggle="modal" data-target=".bs-example-modal-center"><button type="button" class="btn btn-secondary"><i class="fa fa-envelope-o" aria-hidden="true"></i></button></a>
                                    <a onclick="createquery('127477');"><button type="button" class="btn btn-secondary"><i class="fa fa-pencil" aria-hidden="true"></i></button></a>
                                                                  </div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <div class="qbt">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                          <tbody>
                            <tr>
                              <td width="3%" align="center" valign="top" style="padding-right:10px;">                               </td>
                              <td width="14%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;color:#686868;">Requirement</div>
                                <div class="blueicons" style="font-size:12px; font-weight:600;"></div>
                              </td>
                              <td width="20%" align="left" valign="top" style="padding-right:20px;">
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">ss.mdeshmukh52@gmail.com</div>
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">Facebook</div>
                              </td>
                              <td width="17%" align="left" valign="top" style="padding-right:20px;">
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">Travellers</div>
                                <div style="font-size:13px; line-height: 16px;">1 <span style="color:#686868; font-size:11px;">Adult</span> 0 <span style="color:#686868; font-size:11px;">Clild</span> 0 <span style="color:#686868; font-size:11px;">Infant</span></div>
                              </td>
                              <td width="15%" align="left" valign="top" style="padding-right:20px;">
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">Assigned to</div>
                                <div style="font-size:12px;"><select id="assignTo127477" name="assignTo127477" class="form-control" style="padding: 3px; font-size: 12px; height: 25px; line-height: 15px; color: #000; font-weight: 600;" autocomplete="off" onchange="changeAssignTo('127477');">
                                    <option value="1">Assign to me</option>
                                                                          <option value="4074" >
                                                                                  Adarsh  Ojha</option>
                                                                          <option value="4069" >
                                                                                  Akash Shrestha</option>
                                                                          <option value="4057" >
                                                                                  Akshay Chikara</option>
                                                                          <option value="4068" >
                                                                                  Alok  Kumar</option>
                                                                          <option value="4047" >
                                                                                  Anjali A</option>
                                                                          <option value="4072" >
                                                                                  Anjana Thakur</option>
                                                                          <option value="4024" >
                                                                                  Ayush Pandey</option>
                                                                          <option value="4055" >
                                                                                  Ayush  Gupta</option>
                                                                          <option value="4028" >
                                                                                  Daud Khan</option>
                                                                          <option value="4049" >
                                                                                  Ekta Shrestha</option>
                                                                          <option value="4019" >
                                                                                  Gokul K</option>
                                                                          <option value="4027" >
                                                                                  Harshita Singh</option>
                                                                          <option value="4038" >
                                                                                  Honey hm</option>
                                                                          <option value="4026" >
                                                                                  Jake AS</option>
                                                                          <option value="4075" >
                                                                                  Jennifer Chanu</option>
                                                                          <option value="4051" >
                                                                                  Kavita Shahi</option>
                                                                          <option value="4071" >
                                                                                  Khushi Gupta</option>
                                                                          <option value="4076" >
                                                                                  MIS i2a</option>
                                                                          <option value="4073" >
                                                                                  Mohd Arsh Khan</option>
                                                                          <option value="4029" >
                                                                                  Mohsin Hussain</option>
                                                                          <option value="4054" >
                                                                                  Neha  Singh	</option>
                                                                          <option value="4014" >
                                                                                  Nishant Kumar</option>
                                                                          <option value="4052" >
                                                                                  Noman  Ahmed	</option>
                                                                          <option value="4040" >
                                                                                  Pintu Kumar</option>
                                                                          <option value="4043" >
                                                                                  Prashant Sharma</option>
                                                                          <option value="4030" >
                                                                                  Prashant Kumar Sharma</option>
                                                                          <option value="4023" >
                                                                                  Radha R</option>
                                                                          <option value="4013" >
                                                                                  Sachin Kumar</option>
                                                                          <option value="4044" >
                                                                                  Sachin  Singh Maher</option>
                                                                          <option value="4017" >
                                                                                  Sajad Khan</option>
                                                                          <option value="4016" >
                                                                                  Saurabh Rai</option>
                                                                          <option value="4022" >
                                                                                  Shivani Sharma</option>
                                                                          <option value="4078" >
                                                                                  shobhnath l2a</option>
                                                                          <option value="4048" >
                                                                                  Suchita Massey</option>
                                                                          <option value="4012" >
                                                                                  Sujeet Kumar</option>
                                                                          <option value="4050" >
                                                                                  Sunil S</option>
                                                                          <option value="4046" >
                                                                                  Suraj Sahu</option>
                                                                          <option value="4015" >
                                                                                  Swapnil Sinha</option>
                                                                          <option value="4045" >
                                                                                  Tannu T</option>
                                                                          <option value="4018" >
                                                                                  umesh singh</option>
                                                                          <option value="4020" >
                                                                                  Vaasu  Arora	</option>
                                                                          <option value="4077" >
                                                                                  Vinay singh</option>
                                                                          <option value="4025" >
                                                                                  vivek kumar</option>
                                                                          <option value="4053" >
                                                                                  Yashika Sharma</option>
                                                                          <option value="4061" >
                                                                                  Yatin y</option>
                                                                          <option value="4070" >
                                                                                  Yuvraj  Singh</option>
                                                                          <option value="4021" >
                                                                                  Zuhair  Abbas	</option>
                                                                      </select> </div>
                              </td>
                              <td align="left" valign="top">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;"><span style="color:#686868;"><i class="fa fa-clock-o" aria-hidden="true"></i> Created</span></div>
                                <div style="font-size:11px; line-height: 16px; margin-bottom:3px;">30-09-2025</div>
                              </td>
                              <td width="13%" align="left" valign="top">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;"><span style="color:#686868;"><i class="fa fa-clock-o" aria-hidden="true"></i> Last Updated</span></div>
                                <div style="font-size:11px; line-height: 16px; margin-bottom:3px;">30/09/2025 - 01:27 PM</div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                                          </div>
                                      <div class="querylistbox">
                      <div class="qtp">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                          <tbody>
                            <tr>
                              <td width="3%" align="left" valign="top" style="padding-right:10px;"><input type="checkbox" name="assignall[]" class="checkBoxClass" id="assignqury" value="127476" onclick="selectedfun();" style="width: 16px; height: 16px;"> </td>
                              <td width="14%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:15px; font-weight:500;line-height: 16px; margin-bottom:3px; font-weight:600;"><a href="display.html?ga=query&view=1&id=127476">127476</a></div>
                                <span class="badge badge-primary">New</span>                              </td>
                              <td width="20%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:13px; line-height: 16px; margin-bottom:3px;white-space: nowrap; max-width:200px; overflow: hidden; text-overflow: ellipsis;font-weight:600;">Mr. itnery fsdadfdfdf</div>
                                <div style="font-size:13px; color:#686868;">3333333333</div>
                              </td>
                              <td width="17%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:13px; color:#686868;">3333333333</div>
                              </td>
                              <td width="17%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:13px; line-height: 16px;"><span style="color:#686868; font-weight: 600;">Domestic</span><br /><span style="color:#686868;">Origin<br />
                                  </span><span style="max-width:180px; overflow:hidden;overflow-wrap: break-word;">                                      <span class="badge badge-boxed  badge-soft-success" style=" background-color: #737373 !important; color:#fff; font-size: 11px; padding: 5px 6px;">Delhi</span>
                                    </span></div>
                                <div style="font-size:13px; line-height: 16px;"><span style="color:#686868;">Destination<br />
                                  </span><span style="max-width:180px; overflow:hidden;overflow-wrap: break-word;">                                      <span class="badge badge-boxed  badge-soft-success" style=" background-color: #737373 !important; color:#fff; font-size: 11px; padding: 5px 6px;">Bali</span>
                                    </span></div>
                              </td>
                              <td width="15%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;"><span style="color:#686868;"><i class="fa fa-calendar" aria-hidden="true"></i></span> 30-09-2025</div>
                                <div style="font-size:12px; line-height: 16px;"><span style="color:#686868;">Till</span> 06-10-2025</div>
                              </td>
                              <td align="left" valign="top" style="font-size:13px; line-height: 16px;">No Task</span>

                                <div style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; font-size:12px;color:#686868;white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width:200px;"><i class="fa fa-sticky-note" aria-hidden="true" style=" color:#ffa500;"></i> &nbsp;No Notes                                </div>
                              </td>
                              <td width="13%" align="right" valign="middle">
                                <div class="btn-group" role="group" aria-label="Option">
                                  <a href="display.html?ga=query&view=1&id=127476"><button type="button" class="btn btn-secondary"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                                                                                            <a target="_blank" href="https://api.whatsapp.com/send?text=Hi&phone=+913333333333"><button type="button" class="btn btn-secondary"><i class="fa fa-whatsapp" aria-hidden="true"></i></button></a>
                                                                        <a popaction="action=composemail&queryId=127476" onclick="loadpop('Compose Mail',this,'900px')" data-toggle="modal" data-target=".bs-example-modal-center"><button type="button" class="btn btn-secondary"><i class="fa fa-envelope-o" aria-hidden="true"></i></button></a>
                                    <a onclick="createquery('127476');"><button type="button" class="btn btn-secondary"><i class="fa fa-pencil" aria-hidden="true"></i></button></a>
                                                                  </div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <div class="qbt">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                          <tbody>
                            <tr>
                              <td width="3%" align="center" valign="top" style="padding-right:10px;">                               </td>
                              <td width="14%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;color:#686868;">Requirement</div>
                                <div class="blueicons" style="font-size:12px; font-weight:600;"></div>
                              </td>
                              <td width="20%" align="left" valign="top" style="padding-right:20px;">
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">shobhnath.s@i2a.co</div>
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">Website</div>
                              </td>
                              <td width="17%" align="left" valign="top" style="padding-right:20px;">
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">Travellers</div>
                                <div style="font-size:13px; line-height: 16px;">1 <span style="color:#686868; font-size:11px;">Adult</span> 0 <span style="color:#686868; font-size:11px;">Clild</span> 0 <span style="color:#686868; font-size:11px;">Infant</span></div>
                              </td>
                              <td width="15%" align="left" valign="top" style="padding-right:20px;">
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">Assigned to</div>
                                <div style="font-size:12px;"><select id="assignTo127476" name="assignTo127476" class="form-control" style="padding: 3px; font-size: 12px; height: 25px; line-height: 15px; color: #000; font-weight: 600;" autocomplete="off" onchange="changeAssignTo('127476');">
                                    <option value="1">Assign to me</option>
                                                                          <option value="4074" >
                                                                                  Adarsh  Ojha</option>
                                                                          <option value="4069" >
                                                                                  Akash Shrestha</option>
                                                                          <option value="4057" >
                                                                                  Akshay Chikara</option>
                                                                          <option value="4068" >
                                                                                  Alok  Kumar</option>
                                                                          <option value="4047" >
                                                                                  Anjali A</option>
                                                                          <option value="4072" >
                                                                                  Anjana Thakur</option>
                                                                          <option value="4024" >
                                                                                  Ayush Pandey</option>
                                                                          <option value="4055" >
                                                                                  Ayush  Gupta</option>
                                                                          <option value="4028" >
                                                                                  Daud Khan</option>
                                                                          <option value="4049" >
                                                                                  Ekta Shrestha</option>
                                                                          <option value="4019" >
                                                                                  Gokul K</option>
                                                                          <option value="4027" >
                                                                                  Harshita Singh</option>
                                                                          <option value="4038" >
                                                                                  Honey hm</option>
                                                                          <option value="4026" >
                                                                                  Jake AS</option>
                                                                          <option value="4075" >
                                                                                  Jennifer Chanu</option>
                                                                          <option value="4051" >
                                                                                  Kavita Shahi</option>
                                                                          <option value="4071" >
                                                                                  Khushi Gupta</option>
                                                                          <option value="4076" >
                                                                                  MIS i2a</option>
                                                                          <option value="4073" >
                                                                                  Mohd Arsh Khan</option>
                                                                          <option value="4029" >
                                                                                  Mohsin Hussain</option>
                                                                          <option value="4054" >
                                                                                  Neha  Singh	</option>
                                                                          <option value="4014" >
                                                                                  Nishant Kumar</option>
                                                                          <option value="4052" >
                                                                                  Noman  Ahmed	</option>
                                                                          <option value="4040" >
                                                                                  Pintu Kumar</option>
                                                                          <option value="4043" >
                                                                                  Prashant Sharma</option>
                                                                          <option value="4030" >
                                                                                  Prashant Kumar Sharma</option>
                                                                          <option value="4023" >
                                                                                  Radha R</option>
                                                                          <option value="4013" >
                                                                                  Sachin Kumar</option>
                                                                          <option value="4044" >
                                                                                  Sachin  Singh Maher</option>
                                                                          <option value="4017" >
                                                                                  Sajad Khan</option>
                                                                          <option value="4016" >
                                                                                  Saurabh Rai</option>
                                                                          <option value="4022" >
                                                                                  Shivani Sharma</option>
                                                                          <option value="4078" >
                                                                                  shobhnath l2a</option>
                                                                          <option value="4048" >
                                                                                  Suchita Massey</option>
                                                                          <option value="4012" >
                                                                                  Sujeet Kumar</option>
                                                                          <option value="4050" >
                                                                                  Sunil S</option>
                                                                          <option value="4046" >
                                                                                  Suraj Sahu</option>
                                                                          <option value="4015" >
                                                                                  Swapnil Sinha</option>
                                                                          <option value="4045" >
                                                                                  Tannu T</option>
                                                                          <option value="4018" >
                                                                                  umesh singh</option>
                                                                          <option value="4020" >
                                                                                  Vaasu  Arora	</option>
                                                                          <option value="4077" >
                                                                                  Vinay singh</option>
                                                                          <option value="4025" >
                                                                                  vivek kumar</option>
                                                                          <option value="4053" >
                                                                                  Yashika Sharma</option>
                                                                          <option value="4061" >
                                                                                  Yatin y</option>
                                                                          <option value="4070" >
                                                                                  Yuvraj  Singh</option>
                                                                          <option value="4021" >
                                                                                  Zuhair  Abbas	</option>
                                                                      </select> </div>
                              </td>
                              <td align="left" valign="top">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;"><span style="color:#686868;"><i class="fa fa-clock-o" aria-hidden="true"></i> Created</span></div>
                                <div style="font-size:11px; line-height: 16px; margin-bottom:3px;">30-09-2025</div>
                              </td>
                              <td width="13%" align="left" valign="top">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;"><span style="color:#686868;"><i class="fa fa-clock-o" aria-hidden="true"></i> Last Updated</span></div>
                                <div style="font-size:11px; line-height: 16px; margin-bottom:3px;">30/09/2025 - 01:18 PM</div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                                              <div class="viewpackageheader" onclick="$('#pro27476').toggle();"><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp;View Proposal (1)</div>
                        <div class="proposallistouter" style="display:none;" id="pro27476">
                                                      <a href="display.html?ga=itineraries&view=1&id=109097"><i class="fa fa-list-alt" aria-hidden="true"></i> &nbsp;Memorable Bali Tour Package (&#8377; 0 ) &nbsp; </a>
                                                  </div>
                                          </div>
                                      <div class="querylistbox">
                      <div class="qtp">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                          <tbody>
                            <tr>
                              <td width="3%" align="left" valign="top" style="padding-right:10px;"><input type="checkbox" name="assignall[]" class="checkBoxClass" id="assignqury" value="127475" onclick="selectedfun();" style="width: 16px; height: 16px;"> </td>
                              <td width="14%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:15px; font-weight:500;line-height: 16px; margin-bottom:3px; font-weight:600;"><a href="display.html?ga=query&view=1&id=127475">127475</a></div>
                                <span class="badge badge-primary">New</span>                              </td>
                              <td width="20%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:13px; line-height: 16px; margin-bottom:3px;white-space: nowrap; max-width:200px; overflow: hidden; text-overflow: ellipsis;font-weight:600;">Mr. jasmine</div>
                                <div style="font-size:13px; color:#686868;">7017273764</div>
                              </td>
                              <td width="17%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:13px; color:#686868;">7017273764</div>
                              </td>
                              <td width="17%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:13px; line-height: 16px;"><span style="color:#686868; font-weight: 600;">Domestic</span><br /><span style="color:#686868;">Origin<br />
                                  </span><span style="max-width:180px; overflow:hidden;overflow-wrap: break-word;">                                      <span class="badge badge-boxed  badge-soft-success" style=" background-color: #737373 !important; color:#fff; font-size: 11px; padding: 5px 6px;">Delhi</span>
                                    </span></div>
                                <div style="font-size:13px; line-height: 16px;"><span style="color:#686868;">Destination<br />
                                  </span><span style="max-width:180px; overflow:hidden;overflow-wrap: break-word;">                                      <span class="badge badge-boxed  badge-soft-success" style=" background-color: #737373 !important; color:#fff; font-size: 11px; padding: 5px 6px;">Bali</span>
                                    </span></div>
                              </td>
                              <td width="15%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;"><span style="color:#686868;"><i class="fa fa-calendar" aria-hidden="true"></i></span> 30-09-2025</div>
                                <div style="font-size:12px; line-height: 16px;"><span style="color:#686868;">Till</span> 06-10-2025</div>
                              </td>
                              <td align="left" valign="top" style="font-size:13px; line-height: 16px;">No Task</span>

                                <div style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; font-size:12px;color:#686868;white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width:200px;"><i class="fa fa-sticky-note" aria-hidden="true" style=" color:#ffa500;"></i> &nbsp;No Notes                                </div>
                              </td>
                              <td width="13%" align="right" valign="middle">
                                <div class="btn-group" role="group" aria-label="Option">
                                  <a href="display.html?ga=query&view=1&id=127475"><button type="button" class="btn btn-secondary"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                                                                                            <a target="_blank" href="https://api.whatsapp.com/send?text=Hi&phone=+917017273764"><button type="button" class="btn btn-secondary"><i class="fa fa-whatsapp" aria-hidden="true"></i></button></a>
                                                                        <a popaction="action=composemail&queryId=127475" onclick="loadpop('Compose Mail',this,'900px')" data-toggle="modal" data-target=".bs-example-modal-center"><button type="button" class="btn btn-secondary"><i class="fa fa-envelope-o" aria-hidden="true"></i></button></a>
                                    <a onclick="createquery('127475');"><button type="button" class="btn btn-secondary"><i class="fa fa-pencil" aria-hidden="true"></i></button></a>
                                                                  </div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <div class="qbt">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                          <tbody>
                            <tr>
                              <td width="3%" align="center" valign="top" style="padding-right:10px;">                               </td>
                              <td width="14%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;color:#686868;">Requirement</div>
                                <div class="blueicons" style="font-size:12px; font-weight:600;"></div>
                              </td>
                              <td width="20%" align="left" valign="top" style="padding-right:20px;">
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">jasmineeee0918@gmail.com</div>
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">Website</div>
                              </td>
                              <td width="17%" align="left" valign="top" style="padding-right:20px;">
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">Travellers</div>
                                <div style="font-size:13px; line-height: 16px;">0 <span style="color:#686868; font-size:11px;">Adult</span> 0 <span style="color:#686868; font-size:11px;">Clild</span> 0 <span style="color:#686868; font-size:11px;">Infant</span></div>
                              </td>
                              <td width="15%" align="left" valign="top" style="padding-right:20px;">
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">Assigned to</div>
                                <div style="font-size:12px;"><select id="assignTo127475" name="assignTo127475" class="form-control" style="padding: 3px; font-size: 12px; height: 25px; line-height: 15px; color: #000; font-weight: 600;" autocomplete="off" onchange="changeAssignTo('127475');">
                                    <option value="1">Assign to me</option>
                                                                          <option value="4074" >
                                                                                  Adarsh  Ojha</option>
                                                                          <option value="4069" >
                                                                                  Akash Shrestha</option>
                                                                          <option value="4057" >
                                                                                  Akshay Chikara</option>
                                                                          <option value="4068" >
                                                                                  Alok  Kumar</option>
                                                                          <option value="4047" >
                                                                                  Anjali A</option>
                                                                          <option value="4072" >
                                                                                  Anjana Thakur</option>
                                                                          <option value="4024" >
                                                                                  Ayush Pandey</option>
                                                                          <option value="4055" >
                                                                                  Ayush  Gupta</option>
                                                                          <option value="4028" >
                                                                                  Daud Khan</option>
                                                                          <option value="4049" >
                                                                                  Ekta Shrestha</option>
                                                                          <option value="4019" >
                                                                                  Gokul K</option>
                                                                          <option value="4027" >
                                                                                  Harshita Singh</option>
                                                                          <option value="4038" >
                                                                                  Honey hm</option>
                                                                          <option value="4026" >
                                                                                  Jake AS</option>
                                                                          <option value="4075" >
                                                                                  Jennifer Chanu</option>
                                                                          <option value="4051" >
                                                                                  Kavita Shahi</option>
                                                                          <option value="4071" >
                                                                                  Khushi Gupta</option>
                                                                          <option value="4076" >
                                                                                  MIS i2a</option>
                                                                          <option value="4073" >
                                                                                  Mohd Arsh Khan</option>
                                                                          <option value="4029" >
                                                                                  Mohsin Hussain</option>
                                                                          <option value="4054" >
                                                                                  Neha  Singh	</option>
                                                                          <option value="4014" >
                                                                                  Nishant Kumar</option>
                                                                          <option value="4052" >
                                                                                  Noman  Ahmed	</option>
                                                                          <option value="4040" >
                                                                                  Pintu Kumar</option>
                                                                          <option value="4043" >
                                                                                  Prashant Sharma</option>
                                                                          <option value="4030" >
                                                                                  Prashant Kumar Sharma</option>
                                                                          <option value="4023" >
                                                                                  Radha R</option>
                                                                          <option value="4013" >
                                                                                  Sachin Kumar</option>
                                                                          <option value="4044" >
                                                                                  Sachin  Singh Maher</option>
                                                                          <option value="4017" >
                                                                                  Sajad Khan</option>
                                                                          <option value="4016" >
                                                                                  Saurabh Rai</option>
                                                                          <option value="4022" >
                                                                                  Shivani Sharma</option>
                                                                          <option value="4078" >
                                                                                  shobhnath l2a</option>
                                                                          <option value="4048" >
                                                                                  Suchita Massey</option>
                                                                          <option value="4012" >
                                                                                  Sujeet Kumar</option>
                                                                          <option value="4050" >
                                                                                  Sunil S</option>
                                                                          <option value="4046" >
                                                                                  Suraj Sahu</option>
                                                                          <option value="4015" >
                                                                                  Swapnil Sinha</option>
                                                                          <option value="4045" >
                                                                                  Tannu T</option>
                                                                          <option value="4018" >
                                                                                  umesh singh</option>
                                                                          <option value="4020" >
                                                                                  Vaasu  Arora	</option>
                                                                          <option value="4077" >
                                                                                  Vinay singh</option>
                                                                          <option value="4025" >
                                                                                  vivek kumar</option>
                                                                          <option value="4053" >
                                                                                  Yashika Sharma</option>
                                                                          <option value="4061" >
                                                                                  Yatin y</option>
                                                                          <option value="4070" >
                                                                                  Yuvraj  Singh</option>
                                                                          <option value="4021" >
                                                                                  Zuhair  Abbas	</option>
                                                                      </select> </div>
                              </td>
                              <td align="left" valign="top">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;"><span style="color:#686868;"><i class="fa fa-clock-o" aria-hidden="true"></i> Created</span></div>
                                <div style="font-size:11px; line-height: 16px; margin-bottom:3px;">30-09-2025</div>
                              </td>
                              <td width="13%" align="left" valign="top">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;"><span style="color:#686868;"><i class="fa fa-clock-o" aria-hidden="true"></i> Last Updated</span></div>
                                <div style="font-size:11px; line-height: 16px; margin-bottom:3px;">30/09/2025 - 01:14 PM</div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                                              <div class="viewpackageheader" onclick="$('#pro27475').toggle();"><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp;View Proposal (1)</div>
                        <div class="proposallistouter" style="display:none;" id="pro27475">
                                                      <a href="display.html?ga=itineraries&view=1&id=109096"><i class="fa fa-list-alt" aria-hidden="true"></i> &nbsp;Memorable Bali Tour Package (&#8377; 0 ) &nbsp; </a>
                                                  </div>
                                          </div>
                                      <div class="querylistbox">
                      <div class="qtp">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                          <tbody>
                            <tr>
                              <td width="3%" align="left" valign="top" style="padding-right:10px;"><input type="checkbox" name="assignall[]" class="checkBoxClass" id="assignqury" value="127474" onclick="selectedfun();" style="width: 16px; height: 16px;"> </td>
                              <td width="14%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:15px; font-weight:500;line-height: 16px; margin-bottom:3px; font-weight:600;"><a href="display.html?ga=query&view=1&id=127474">127474</a></div>
                                <span class="badge badge-primary">New</span>                              </td>
                              <td width="20%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:13px; line-height: 16px; margin-bottom:3px;white-space: nowrap; max-width:200px; overflow: hidden; text-overflow: ellipsis;font-weight:600;">Dr. Camilla Carr</div>
                                <div style="font-size:13px; color:#686868;">Ipsa sed </div>
                              </td>
                              <td width="17%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:13px; color:#686868;">Ipsa sed </div>
                              </td>
                              <td width="17%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:13px; line-height: 16px;"><span style="color:#686868; font-weight: 600;">International</span><br /><span style="color:#686868;">Origin<br />
                                  </span><span style="max-width:180px; overflow:hidden;overflow-wrap: break-word;">                                      <span class="badge badge-boxed  badge-soft-success" style=" background-color: #737373 !important; color:#fff; font-size: 11px; padding: 5px 6px;">Do rerum et anim ull</span>
                                    </span></div>
                                <div style="font-size:13px; line-height: 16px;"><span style="color:#686868;">Destination<br />
                                  </span><span style="max-width:180px; overflow:hidden;overflow-wrap: break-word;">                                      <span class="badge badge-boxed  badge-soft-success" style=" background-color: #737373 !important; color:#fff; font-size: 11px; padding: 5px 6px;">Voluptatem culpa fu</span>
                                    </span></div>
                              </td>
                              <td width="15%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;"><span style="color:#686868;"><i class="fa fa-calendar" aria-hidden="true"></i></span> 20-09-2025</div>
                                <div style="font-size:12px; line-height: 16px;"><span style="color:#686868;">Till</span> 22-09-2025</div>
                              </td>
                              <td align="left" valign="top" style="font-size:13px; line-height: 16px;">No Task</span>

                                <div style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; font-size:12px;color:#686868;white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width:200px;"><i class="fa fa-sticky-note" aria-hidden="true" style=" color:#ffa500;"></i> &nbsp;No Notes                                </div>
                              </td>
                              <td width="13%" align="right" valign="middle">
                                <div class="btn-group" role="group" aria-label="Option">
                                  <a href="display.html?ga=query&view=1&id=127474"><button type="button" class="btn btn-secondary"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                                                                                            <a target="_blank" href="https://api.whatsapp.com/send?text=Hi&phone=+91"><button type="button" class="btn btn-secondary"><i class="fa fa-whatsapp" aria-hidden="true"></i></button></a>
                                                                        <a popaction="action=composemail&queryId=127474" onclick="loadpop('Compose Mail',this,'900px')" data-toggle="modal" data-target=".bs-example-modal-center"><button type="button" class="btn btn-secondary"><i class="fa fa-envelope-o" aria-hidden="true"></i></button></a>
                                    <a onclick="createquery('127474');"><button type="button" class="btn btn-secondary"><i class="fa fa-pencil" aria-hidden="true"></i></button></a>
                                                                  </div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <div class="qbt">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                          <tbody>
                            <tr>
                              <td width="3%" align="center" valign="top" style="padding-right:10px;">                               </td>
                              <td width="14%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;color:#686868;">Requirement</div>
                                <div class="blueicons" style="font-size:12px; font-weight:600;">Activities only</div>
                              </td>
                              <td width="20%" align="left" valign="top" style="padding-right:20px;">
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">pawex@mailinator.com</div>
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">Hello Travel</div>
                              </td>
                              <td width="17%" align="left" valign="top" style="padding-right:20px;">
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">Travellers</div>
                                <div style="font-size:13px; line-height: 16px;">3 <span style="color:#686868; font-size:11px;">Adult</span> 92 <span style="color:#686868; font-size:11px;">Clild</span> 2 <span style="color:#686868; font-size:11px;">Infant</span></div>
                              </td>
                              <td width="15%" align="left" valign="top" style="padding-right:20px;">
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">Assigned to</div>
                                <div style="font-size:12px;"><select id="assignTo127474" name="assignTo127474" class="form-control" style="padding: 3px; font-size: 12px; height: 25px; line-height: 15px; color: #000; font-weight: 600;" autocomplete="off" onchange="changeAssignTo('127474');">
                                    <option value="1">Assign to me</option>
                                                                          <option value="4074" >
                                                                                  Adarsh  Ojha</option>
                                                                          <option value="4069" >
                                                                                  Akash Shrestha</option>
                                                                          <option value="4057" >
                                                                                  Akshay Chikara</option>
                                                                          <option value="4068" >
                                                                                  Alok  Kumar</option>
                                                                          <option value="4047" >
                                                                                  Anjali A</option>
                                                                          <option value="4072" >
                                                                                  Anjana Thakur</option>
                                                                          <option value="4024" >
                                                                                  Ayush Pandey</option>
                                                                          <option value="4055" >
                                                                                  Ayush  Gupta</option>
                                                                          <option value="4028" >
                                                                                  Daud Khan</option>
                                                                          <option value="4049" >
                                                                                  Ekta Shrestha</option>
                                                                          <option value="4019" >
                                                                                  Gokul K</option>
                                                                          <option value="4027" >
                                                                                  Harshita Singh</option>
                                                                          <option value="4038" >
                                                                                  Honey hm</option>
                                                                          <option value="4026" >
                                                                                  Jake AS</option>
                                                                          <option value="4075" >
                                                                                  Jennifer Chanu</option>
                                                                          <option value="4051" >
                                                                                  Kavita Shahi</option>
                                                                          <option value="4071" >
                                                                                  Khushi Gupta</option>
                                                                          <option value="4076" >
                                                                                  MIS i2a</option>
                                                                          <option value="4073" >
                                                                                  Mohd Arsh Khan</option>
                                                                          <option value="4029" >
                                                                                  Mohsin Hussain</option>
                                                                          <option value="4054" >
                                                                                  Neha  Singh	</option>
                                                                          <option value="4014" >
                                                                                  Nishant Kumar</option>
                                                                          <option value="4052" >
                                                                                  Noman  Ahmed	</option>
                                                                          <option value="4040" >
                                                                                  Pintu Kumar</option>
                                                                          <option value="4043" >
                                                                                  Prashant Sharma</option>
                                                                          <option value="4030" >
                                                                                  Prashant Kumar Sharma</option>
                                                                          <option value="4023" >
                                                                                  Radha R</option>
                                                                          <option value="4013" >
                                                                                  Sachin Kumar</option>
                                                                          <option value="4044" selected="selected" >
                                                                                  Sachin  Singh Maher</option>
                                                                          <option value="4017" >
                                                                                  Sajad Khan</option>
                                                                          <option value="4016" >
                                                                                  Saurabh Rai</option>
                                                                          <option value="4022" >
                                                                                  Shivani Sharma</option>
                                                                          <option value="4078" >
                                                                                  shobhnath l2a</option>
                                                                          <option value="4048" >
                                                                                  Suchita Massey</option>
                                                                          <option value="4012" >
                                                                                  Sujeet Kumar</option>
                                                                          <option value="4050" >
                                                                                  Sunil S</option>
                                                                          <option value="4046" >
                                                                                  Suraj Sahu</option>
                                                                          <option value="4015" >
                                                                                  Swapnil Sinha</option>
                                                                          <option value="4045" >
                                                                                  Tannu T</option>
                                                                          <option value="4018" >
                                                                                  umesh singh</option>
                                                                          <option value="4020" >
                                                                                  Vaasu  Arora	</option>
                                                                          <option value="4077" >
                                                                                  Vinay singh</option>
                                                                          <option value="4025" >
                                                                                  vivek kumar</option>
                                                                          <option value="4053" >
                                                                                  Yashika Sharma</option>
                                                                          <option value="4061" >
                                                                                  Yatin y</option>
                                                                          <option value="4070" >
                                                                                  Yuvraj  Singh</option>
                                                                          <option value="4021" >
                                                                                  Zuhair  Abbas	</option>
                                                                      </select> </div>
                              </td>
                              <td align="left" valign="top">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;"><span style="color:#686868;"><i class="fa fa-clock-o" aria-hidden="true"></i> Created</span></div>
                                <div style="font-size:11px; line-height: 16px; margin-bottom:3px;">18-09-2025</div>
                              </td>
                              <td width="13%" align="left" valign="top">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;"><span style="color:#686868;"><i class="fa fa-clock-o" aria-hidden="true"></i> Last Updated</span></div>
                                <div style="font-size:11px; line-height: 16px; margin-bottom:3px;">24/09/2025 - 06:34 PM</div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                                          </div>
                                      <div class="querylistbox">
                      <div class="qtp">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                          <tbody>
                            <tr>
                              <td width="3%" align="left" valign="top" style="padding-right:10px;"><input type="checkbox" name="assignall[]" class="checkBoxClass" id="assignqury" value="127473" onclick="selectedfun();" style="width: 16px; height: 16px;"> </td>
                              <td width="14%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:15px; font-weight:500;line-height: 16px; margin-bottom:3px; font-weight:600;"><a href="display.html?ga=query&view=1&id=127473">127473</a></div>
                                <span class="badge badge-primary">New</span>                              </td>
                              <td width="20%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:13px; line-height: 16px; margin-bottom:3px;white-space: nowrap; max-width:200px; overflow: hidden; text-overflow: ellipsis;font-weight:600;">Mr. shobhnath upaer</div>
                                <div style="font-size:13px; color:#686868;">7788458485</div>
                              </td>
                              <td width="17%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:13px; color:#686868;">7788458485</div>
                              </td>
                              <td width="17%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:13px; line-height: 16px;"><span style="color:#686868; font-weight: 600;"></span><br /><span style="color:#686868;">Origin<br />
                                  </span><span style="max-width:180px; overflow:hidden;overflow-wrap: break-word;">                                      <span class="badge badge-boxed  badge-soft-success" style=" background-color: #737373 !important; color:#fff; font-size: 11px; padding: 5px 6px;">Delhi</span>
                                    </span></div>
                                <div style="font-size:13px; line-height: 16px;"><span style="color:#686868;">Destination<br />
                                  </span><span style="max-width:180px; overflow:hidden;overflow-wrap: break-word;">                                      <span class="badge badge-boxed  badge-soft-success" style=" background-color: #737373 !important; color:#fff; font-size: 11px; padding: 5px 6px;">Mumbai</span>
                                    </span></div>
                              </td>
                              <td width="15%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;"><span style="color:#686868;"><i class="fa fa-calendar" aria-hidden="true"></i></span> 14-11-2025</div>
                                <div style="font-size:12px; line-height: 16px;"><span style="color:#686868;">Till</span> 15-11-2025</div>
                              </td>
                              <td align="left" valign="top" style="font-size:13px; line-height: 16px;">                                  <div style="font-size:13px; line-height: 16px; margin-bottom:3px;"><span style="color:#686868;">                                                                                                                    <i class="fa fa-handshake-o" aria-hidden="true"></i>
                                        &nbsp;<span style="text-decoration: line-through;">testing</span></span></div>
                                </span>

                                <div style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; font-size:12px;color:#686868;white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width:200px;"><i class="fa fa-sticky-note" aria-hidden="true" style=" color:#ffa500;"></i> &nbsp;No Notes                                </div>
                              </td>
                              <td width="13%" align="right" valign="middle">
                                <div class="btn-group" role="group" aria-label="Option">
                                  <a href="display.html?ga=query&view=1&id=127473"><button type="button" class="btn btn-secondary"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                                                                                            <a target="_blank" href="https://api.whatsapp.com/send?text=Hi&phone=+917788458485"><button type="button" class="btn btn-secondary"><i class="fa fa-whatsapp" aria-hidden="true"></i></button></a>
                                                                        <a popaction="action=composemail&queryId=127473" onclick="loadpop('Compose Mail',this,'900px')" data-toggle="modal" data-target=".bs-example-modal-center"><button type="button" class="btn btn-secondary"><i class="fa fa-envelope-o" aria-hidden="true"></i></button></a>
                                    <a onclick="createquery('127473');"><button type="button" class="btn btn-secondary"><i class="fa fa-pencil" aria-hidden="true"></i></button></a>
                                                                  </div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <div class="qbt">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                          <tbody>
                            <tr>
                              <td width="3%" align="center" valign="top" style="padding-right:10px;">                               </td>
                              <td width="14%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;color:#686868;">Requirement</div>
                                <div class="blueicons" style="font-size:12px; font-weight:600;">Activities only</div>
                              </td>
                              <td width="20%" align="left" valign="top" style="padding-right:20px;">
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">shobhnath.s@i2a.com</div>
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">Agent</div>
                              </td>
                              <td width="17%" align="left" valign="top" style="padding-right:20px;">
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">Travellers</div>
                                <div style="font-size:13px; line-height: 16px;">1 <span style="color:#686868; font-size:11px;">Adult</span> 1 <span style="color:#686868; font-size:11px;">Clild</span> 0 <span style="color:#686868; font-size:11px;">Infant</span></div>
                              </td>
                              <td width="15%" align="left" valign="top" style="padding-right:20px;">
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">Assigned to</div>
                                <div style="font-size:12px;"><select id="assignTo127473" name="assignTo127473" class="form-control" style="padding: 3px; font-size: 12px; height: 25px; line-height: 15px; color: #000; font-weight: 600;" autocomplete="off" onchange="changeAssignTo('127473');">
                                    <option value="1">Assign to me</option>
                                                                          <option value="4074" >
                                                                                  Adarsh  Ojha</option>
                                                                          <option value="4069" >
                                                                                  Akash Shrestha</option>
                                                                          <option value="4057" >
                                                                                  Akshay Chikara</option>
                                                                          <option value="4068" >
                                                                                  Alok  Kumar</option>
                                                                          <option value="4047" >
                                                                                  Anjali A</option>
                                                                          <option value="4072" >
                                                                                  Anjana Thakur</option>
                                                                          <option value="4024" >
                                                                                  Ayush Pandey</option>
                                                                          <option value="4055" >
                                                                                  Ayush  Gupta</option>
                                                                          <option value="4028" >
                                                                                  Daud Khan</option>
                                                                          <option value="4049" >
                                                                                  Ekta Shrestha</option>
                                                                          <option value="4019" >
                                                                                  Gokul K</option>
                                                                          <option value="4027" >
                                                                                  Harshita Singh</option>
                                                                          <option value="4038" >
                                                                                  Honey hm</option>
                                                                          <option value="4026" >
                                                                                  Jake AS</option>
                                                                          <option value="4075" >
                                                                                  Jennifer Chanu</option>
                                                                          <option value="4051" >
                                                                                  Kavita Shahi</option>
                                                                          <option value="4071" >
                                                                                  Khushi Gupta</option>
                                                                          <option value="4076" >
                                                                                  MIS i2a</option>
                                                                          <option value="4073" >
                                                                                  Mohd Arsh Khan</option>
                                                                          <option value="4029" >
                                                                                  Mohsin Hussain</option>
                                                                          <option value="4054" >
                                                                                  Neha  Singh	</option>
                                                                          <option value="4014" >
                                                                                  Nishant Kumar</option>
                                                                          <option value="4052" >
                                                                                  Noman  Ahmed	</option>
                                                                          <option value="4040" >
                                                                                  Pintu Kumar</option>
                                                                          <option value="4043" >
                                                                                  Prashant Sharma</option>
                                                                          <option value="4030" >
                                                                                  Prashant Kumar Sharma</option>
                                                                          <option value="4023" >
                                                                                  Radha R</option>
                                                                          <option value="4013" >
                                                                                  Sachin Kumar</option>
                                                                          <option value="4044" >
                                                                                  Sachin  Singh Maher</option>
                                                                          <option value="4017" >
                                                                                  Sajad Khan</option>
                                                                          <option value="4016" >
                                                                                  Saurabh Rai</option>
                                                                          <option value="4022" >
                                                                                  Shivani Sharma</option>
                                                                          <option value="4078" >
                                                                                  shobhnath l2a</option>
                                                                          <option value="4048" >
                                                                                  Suchita Massey</option>
                                                                          <option value="4012" >
                                                                                  Sujeet Kumar</option>
                                                                          <option value="4050" >
                                                                                  Sunil S</option>
                                                                          <option value="4046" >
                                                                                  Suraj Sahu</option>
                                                                          <option value="4015" >
                                                                                  Swapnil Sinha</option>
                                                                          <option value="4045" >
                                                                                  Tannu T</option>
                                                                          <option value="4018" selected="selected" >
                                                                                  umesh singh</option>
                                                                          <option value="4020" >
                                                                                  Vaasu  Arora	</option>
                                                                          <option value="4077" >
                                                                                  Vinay singh</option>
                                                                          <option value="4025" >
                                                                                  vivek kumar</option>
                                                                          <option value="4053" >
                                                                                  Yashika Sharma</option>
                                                                          <option value="4061" >
                                                                                  Yatin y</option>
                                                                          <option value="4070" >
                                                                                  Yuvraj  Singh</option>
                                                                          <option value="4021" >
                                                                                  Zuhair  Abbas	</option>
                                                                      </select> </div>
                              </td>
                              <td align="left" valign="top">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;"><span style="color:#686868;"><i class="fa fa-clock-o" aria-hidden="true"></i> Created</span></div>
                                <div style="font-size:11px; line-height: 16px; margin-bottom:3px;">18-09-2025</div>
                              </td>
                              <td width="13%" align="left" valign="top">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;"><span style="color:#686868;"><i class="fa fa-clock-o" aria-hidden="true"></i> Last Updated</span></div>
                                <div style="font-size:11px; line-height: 16px; margin-bottom:3px;">14/11/2025 - 06:05 PM</div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                                              <div class="viewpackageheader" onclick="$('#pro27473').toggle();"><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp;View Proposal (7)</div>
                        <div class="proposallistouter" style="display:none;" id="pro27473">
                                                      <a href="display.html?ga=itineraries&view=1&id=109099"><i class="fa fa-list-alt" aria-hidden="true"></i> &nbsp;mumbai (&#8377; 3,850 ) &nbsp; </a>
                                                      <a href="display.html?ga=itineraries&view=1&id=109098"><i class="fa fa-list-alt" aria-hidden="true"></i> &nbsp;mumbai (&#8377; 3,850 ) &nbsp; </a>
                                                      <a href="display.html?ga=itineraries&view=1&id=109095"><i class="fa fa-list-alt" aria-hidden="true"></i> &nbsp;mumbai (&#8377; 3,850 ) &nbsp; </a>
                                                      <a href="display.html?ga=itineraries&view=1&id=109094"><i class="fa fa-list-alt" aria-hidden="true"></i> &nbsp;test (&#8377; 0 ) &nbsp; </a>
                                                      <a href="display.html?ga=itineraries&view=1&id=109093"><i class="fa fa-list-alt" aria-hidden="true"></i> &nbsp;test (&#8377; 0 ) &nbsp; </a>
                                                      <a href="display.html?ga=itineraries&view=1&id=109092"><i class="fa fa-list-alt" aria-hidden="true"></i> &nbsp;mumbai (&#8377; 3,850 ) &nbsp; <i class="fa fa-check" aria-hidden="true" style="color:#00CC00;"></i></a>
                                                      <a href="display.html?ga=itineraries&view=1&id=109091"><i class="fa fa-list-alt" aria-hidden="true"></i> &nbsp;shobhnath (&#8377; 3,581 ) &nbsp; </a>
                                                  </div>
                                          </div>
                                      <div class="querylistbox">
                      <div class="qtp">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                          <tbody>
                            <tr>
                              <td width="3%" align="left" valign="top" style="padding-right:10px;"><input type="checkbox" name="assignall[]" class="checkBoxClass" id="assignqury" value="127472" onclick="selectedfun();" style="width: 16px; height: 16px;"> </td>
                              <td width="14%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:15px; font-weight:500;line-height: 16px; margin-bottom:3px; font-weight:600;"><a href="display.html?ga=query&view=1&id=127472">127472</a></div>
                                <span class="badge badge-primary">New</span>                              </td>
                              <td width="20%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:13px; line-height: 16px; margin-bottom:3px;white-space: nowrap; max-width:200px; overflow: hidden; text-overflow: ellipsis;font-weight:600;">Mr. shobhnath upaer</div>
                                <div style="font-size:13px; color:#686868;">7788458485</div>
                              </td>
                              <td width="17%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:13px; color:#686868;">7788458485</div>
                              </td>
                              <td width="17%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:13px; line-height: 16px;"><span style="color:#686868; font-weight: 600;"></span><br /><span style="color:#686868;">Origin<br />
                                  </span><span style="max-width:180px; overflow:hidden;overflow-wrap: break-word;">                                      <span class="badge badge-boxed  badge-soft-success" style=" background-color: #737373 !important; color:#fff; font-size: 11px; padding: 5px 6px;">Delhi</span>
                                    </span></div>
                                <div style="font-size:13px; line-height: 16px;"><span style="color:#686868;">Destination<br />
                                  </span><span style="max-width:180px; overflow:hidden;overflow-wrap: break-word;">                                      <span class="badge badge-boxed  badge-soft-success" style=" background-color: #737373 !important; color:#fff; font-size: 11px; padding: 5px 6px;">Mumbwa</span>
                                    </span></div>
                              </td>
                              <td width="15%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;"><span style="color:#686868;"><i class="fa fa-calendar" aria-hidden="true"></i></span> 20-09-2025</div>
                                <div style="font-size:12px; line-height: 16px;"><span style="color:#686868;">Till</span> 22-09-2025</div>
                              </td>
                              <td align="left" valign="top" style="font-size:13px; line-height: 16px;">No Task</span>

                                <div style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; font-size:12px;color:#686868;white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width:200px;"><i class="fa fa-sticky-note" aria-hidden="true" style=" color:#ffa500;"></i> &nbsp;No Notes                                </div>
                              </td>
                              <td width="13%" align="right" valign="middle">
                                <div class="btn-group" role="group" aria-label="Option">
                                  <a href="display.html?ga=query&view=1&id=127472"><button type="button" class="btn btn-secondary"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                                                                                            <a target="_blank" href="https://api.whatsapp.com/send?text=Hi&phone=+917788458485"><button type="button" class="btn btn-secondary"><i class="fa fa-whatsapp" aria-hidden="true"></i></button></a>
                                                                        <a popaction="action=composemail&queryId=127472" onclick="loadpop('Compose Mail',this,'900px')" data-toggle="modal" data-target=".bs-example-modal-center"><button type="button" class="btn btn-secondary"><i class="fa fa-envelope-o" aria-hidden="true"></i></button></a>
                                    <a onclick="createquery('127472');"><button type="button" class="btn btn-secondary"><i class="fa fa-pencil" aria-hidden="true"></i></button></a>
                                                                  </div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <div class="qbt">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                          <tbody>
                            <tr>
                              <td width="3%" align="center" valign="top" style="padding-right:10px;">                               </td>
                              <td width="14%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;color:#686868;">Requirement</div>
                                <div class="blueicons" style="font-size:12px; font-weight:600;">Hotel + Flight</div>
                              </td>
                              <td width="20%" align="left" valign="top" style="padding-right:20px;">
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">shobhnath.s@i2a.com</div>
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">Agent</div>
                              </td>
                              <td width="17%" align="left" valign="top" style="padding-right:20px;">
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">Travellers</div>
                                <div style="font-size:13px; line-height: 16px;">1 <span style="color:#686868; font-size:11px;">Adult</span> 0 <span style="color:#686868; font-size:11px;">Clild</span> 0 <span style="color:#686868; font-size:11px;">Infant</span></div>
                              </td>
                              <td width="15%" align="left" valign="top" style="padding-right:20px;">
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">Assigned to</div>
                                <div style="font-size:12px;"><select id="assignTo127472" name="assignTo127472" class="form-control" style="padding: 3px; font-size: 12px; height: 25px; line-height: 15px; color: #000; font-weight: 600;" autocomplete="off" onchange="changeAssignTo('127472');">
                                    <option value="1">Assign to me</option>
                                                                          <option value="4074" >
                                                                                  Adarsh  Ojha</option>
                                                                          <option value="4069" >
                                                                                  Akash Shrestha</option>
                                                                          <option value="4057" >
                                                                                  Akshay Chikara</option>
                                                                          <option value="4068" >
                                                                                  Alok  Kumar</option>
                                                                          <option value="4047" >
                                                                                  Anjali A</option>
                                                                          <option value="4072" >
                                                                                  Anjana Thakur</option>
                                                                          <option value="4024" >
                                                                                  Ayush Pandey</option>
                                                                          <option value="4055" >
                                                                                  Ayush  Gupta</option>
                                                                          <option value="4028" >
                                                                                  Daud Khan</option>
                                                                          <option value="4049" >
                                                                                  Ekta Shrestha</option>
                                                                          <option value="4019" >
                                                                                  Gokul K</option>
                                                                          <option value="4027" >
                                                                                  Harshita Singh</option>
                                                                          <option value="4038" >
                                                                                  Honey hm</option>
                                                                          <option value="4026" >
                                                                                  Jake AS</option>
                                                                          <option value="4075" >
                                                                                  Jennifer Chanu</option>
                                                                          <option value="4051" >
                                                                                  Kavita Shahi</option>
                                                                          <option value="4071" >
                                                                                  Khushi Gupta</option>
                                                                          <option value="4076" >
                                                                                  MIS i2a</option>
                                                                          <option value="4073" >
                                                                                  Mohd Arsh Khan</option>
                                                                          <option value="4029" >
                                                                                  Mohsin Hussain</option>
                                                                          <option value="4054" >
                                                                                  Neha  Singh	</option>
                                                                          <option value="4014" selected="selected" >
                                                                                  Nishant Kumar</option>
                                                                          <option value="4052" >
                                                                                  Noman  Ahmed	</option>
                                                                          <option value="4040" >
                                                                                  Pintu Kumar</option>
                                                                          <option value="4043" >
                                                                                  Prashant Sharma</option>
                                                                          <option value="4030" >
                                                                                  Prashant Kumar Sharma</option>
                                                                          <option value="4023" >
                                                                                  Radha R</option>
                                                                          <option value="4013" >
                                                                                  Sachin Kumar</option>
                                                                          <option value="4044" >
                                                                                  Sachin  Singh Maher</option>
                                                                          <option value="4017" >
                                                                                  Sajad Khan</option>
                                                                          <option value="4016" >
                                                                                  Saurabh Rai</option>
                                                                          <option value="4022" >
                                                                                  Shivani Sharma</option>
                                                                          <option value="4078" >
                                                                                  shobhnath l2a</option>
                                                                          <option value="4048" >
                                                                                  Suchita Massey</option>
                                                                          <option value="4012" >
                                                                                  Sujeet Kumar</option>
                                                                          <option value="4050" >
                                                                                  Sunil S</option>
                                                                          <option value="4046" >
                                                                                  Suraj Sahu</option>
                                                                          <option value="4015" >
                                                                                  Swapnil Sinha</option>
                                                                          <option value="4045" >
                                                                                  Tannu T</option>
                                                                          <option value="4018" >
                                                                                  umesh singh</option>
                                                                          <option value="4020" >
                                                                                  Vaasu  Arora	</option>
                                                                          <option value="4077" >
                                                                                  Vinay singh</option>
                                                                          <option value="4025" >
                                                                                  vivek kumar</option>
                                                                          <option value="4053" >
                                                                                  Yashika Sharma</option>
                                                                          <option value="4061" >
                                                                                  Yatin y</option>
                                                                          <option value="4070" >
                                                                                  Yuvraj  Singh</option>
                                                                          <option value="4021" >
                                                                                  Zuhair  Abbas	</option>
                                                                      </select> </div>
                              </td>
                              <td align="left" valign="top">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;"><span style="color:#686868;"><i class="fa fa-clock-o" aria-hidden="true"></i> Created</span></div>
                                <div style="font-size:11px; line-height: 16px; margin-bottom:3px;">18-09-2025</div>
                              </td>
                              <td width="13%" align="left" valign="top">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;"><span style="color:#686868;"><i class="fa fa-clock-o" aria-hidden="true"></i> Last Updated</span></div>
                                <div style="font-size:11px; line-height: 16px; margin-bottom:3px;">18/09/2025 - 07:06 PM</div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                                          </div>
                                      <div class="querylistbox">
                      <div class="qtp">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                          <tbody>
                            <tr>
                              <td width="3%" align="left" valign="top" style="padding-right:10px;"><input type="checkbox" name="assignall[]" class="checkBoxClass" id="assignqury" value="127371" onclick="selectedfun();" style="width: 16px; height: 16px;"> </td>
                              <td width="14%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:15px; font-weight:500;line-height: 16px; margin-bottom:3px; font-weight:600;"><a href="display.html?ga=query&view=1&id=127371">127371</a></div>
                                <span class="badge badge-dark">No Revert</span>                              </td>
                              <td width="20%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:13px; line-height: 16px; margin-bottom:3px;white-space: nowrap; max-width:200px; overflow: hidden; text-overflow: ellipsis;font-weight:600;">Mr. Raja S</div>
                                <div style="font-size:13px; color:#686868;">8056843475</div>
                              </td>
                              <td width="17%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:13px; color:#686868;">8056843475</div>
                              </td>
                              <td width="17%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:13px; line-height: 16px;"><span style="color:#686868; font-weight: 600;">International</span><br /><span style="color:#686868;">Origin<br />
                                  </span><span style="max-width:180px; overflow:hidden;overflow-wrap: break-word;">                                      <span class="badge badge-boxed  badge-soft-success" style=" background-color: #737373 !important; color:#fff; font-size: 11px; padding: 5px 6px;">A Estrada</span>
                                    </span></div>
                                <div style="font-size:13px; line-height: 16px;"><span style="color:#686868;">Destination<br />
                                  </span><span style="max-width:180px; overflow:hidden;overflow-wrap: break-word;">                                      <span class="badge badge-boxed  badge-soft-success" style=" background-color: #737373 !important; color:#fff; font-size: 11px; padding: 5px 6px;">Malaysia</span>
                                    </span></div>
                              </td>
                              <td width="15%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;"><span style="color:#686868;"><i class="fa fa-calendar" aria-hidden="true"></i></span> 09-09-2025</div>
                                <div style="font-size:12px; line-height: 16px;"><span style="color:#686868;">Till</span> 13-09-2025</div>
                              </td>
                              <td align="left" valign="top" style="font-size:13px; line-height: 16px;">No Task</span>

                                <div style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; font-size:12px;color:#686868;white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width:200px;"><i class="fa fa-sticky-note" aria-hidden="true" style=" color:#ffa500;"></i> &nbsp;Call not answering                                 </div>
                              </td>
                              <td width="13%" align="right" valign="middle">
                                <div class="btn-group" role="group" aria-label="Option">
                                  <a href="display.html?ga=query&view=1&id=127371"><button type="button" class="btn btn-secondary"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                                                                                            <a target="_blank" href="https://api.whatsapp.com/send?text=Hi&phone=+918056843475"><button type="button" class="btn btn-secondary"><i class="fa fa-whatsapp" aria-hidden="true"></i></button></a>
                                                                        <a popaction="action=composemail&queryId=127371" onclick="loadpop('Compose Mail',this,'900px')" data-toggle="modal" data-target=".bs-example-modal-center"><button type="button" class="btn btn-secondary"><i class="fa fa-envelope-o" aria-hidden="true"></i></button></a>
                                    <a onclick="createquery('127371');"><button type="button" class="btn btn-secondary"><i class="fa fa-pencil" aria-hidden="true"></i></button></a>
                                                                  </div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <div class="qbt">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                          <tbody>
                            <tr>
                              <td width="3%" align="center" valign="top" style="padding-right:10px;">                               </td>
                              <td width="14%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;color:#686868;">Requirement</div>
                                <div class="blueicons" style="font-size:12px; font-weight:600;">Full package</div>
                              </td>
                              <td width="20%" align="left" valign="top" style="padding-right:20px;">
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">umesh@akounto.com</div>
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">Agent</div>
                              </td>
                              <td width="17%" align="left" valign="top" style="padding-right:20px;">
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">Travellers</div>
                                <div style="font-size:13px; line-height: 16px;">2 <span style="color:#686868; font-size:11px;">Adult</span> 0 <span style="color:#686868; font-size:11px;">Clild</span> 0 <span style="color:#686868; font-size:11px;">Infant</span></div>
                              </td>
                              <td width="15%" align="left" valign="top" style="padding-right:20px;">
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">Assigned to</div>
                                <div style="font-size:12px;"><select id="assignTo127371" name="assignTo127371" class="form-control" style="padding: 3px; font-size: 12px; height: 25px; line-height: 15px; color: #000; font-weight: 600;" autocomplete="off" onchange="changeAssignTo('127371');">
                                    <option value="1">Assign to me</option>
                                                                          <option value="4074" >
                                                                                  Adarsh  Ojha</option>
                                                                          <option value="4069" >
                                                                                  Akash Shrestha</option>
                                                                          <option value="4057" >
                                                                                  Akshay Chikara</option>
                                                                          <option value="4068" >
                                                                                  Alok  Kumar</option>
                                                                          <option value="4047" >
                                                                                  Anjali A</option>
                                                                          <option value="4072" >
                                                                                  Anjana Thakur</option>
                                                                          <option value="4024" >
                                                                                  Ayush Pandey</option>
                                                                          <option value="4055" >
                                                                                  Ayush  Gupta</option>
                                                                          <option value="4028" >
                                                                                  Daud Khan</option>
                                                                          <option value="4049" >
                                                                                  Ekta Shrestha</option>
                                                                          <option value="4019" >
                                                                                  Gokul K</option>
                                                                          <option value="4027" >
                                                                                  Harshita Singh</option>
                                                                          <option value="4038" >
                                                                                  Honey hm</option>
                                                                          <option value="4026" >
                                                                                  Jake AS</option>
                                                                          <option value="4075" >
                                                                                  Jennifer Chanu</option>
                                                                          <option value="4051" >
                                                                                  Kavita Shahi</option>
                                                                          <option value="4071" >
                                                                                  Khushi Gupta</option>
                                                                          <option value="4076" >
                                                                                  MIS i2a</option>
                                                                          <option value="4073" >
                                                                                  Mohd Arsh Khan</option>
                                                                          <option value="4029" >
                                                                                  Mohsin Hussain</option>
                                                                          <option value="4054" >
                                                                                  Neha  Singh	</option>
                                                                          <option value="4014" >
                                                                                  Nishant Kumar</option>
                                                                          <option value="4052" >
                                                                                  Noman  Ahmed	</option>
                                                                          <option value="4040" >
                                                                                  Pintu Kumar</option>
                                                                          <option value="4043" >
                                                                                  Prashant Sharma</option>
                                                                          <option value="4030" >
                                                                                  Prashant Kumar Sharma</option>
                                                                          <option value="4023" >
                                                                                  Radha R</option>
                                                                          <option value="4013" >
                                                                                  Sachin Kumar</option>
                                                                          <option value="4044" >
                                                                                  Sachin  Singh Maher</option>
                                                                          <option value="4017" >
                                                                                  Sajad Khan</option>
                                                                          <option value="4016" >
                                                                                  Saurabh Rai</option>
                                                                          <option value="4022" >
                                                                                  Shivani Sharma</option>
                                                                          <option value="4078" >
                                                                                  shobhnath l2a</option>
                                                                          <option value="4048" >
                                                                                  Suchita Massey</option>
                                                                          <option value="4012" >
                                                                                  Sujeet Kumar</option>
                                                                          <option value="4050" >
                                                                                  Sunil S</option>
                                                                          <option value="4046" >
                                                                                  Suraj Sahu</option>
                                                                          <option value="4015" >
                                                                                  Swapnil Sinha</option>
                                                                          <option value="4045" >
                                                                                  Tannu T</option>
                                                                          <option value="4018" >
                                                                                  umesh singh</option>
                                                                          <option value="4020" >
                                                                                  Vaasu  Arora	</option>
                                                                          <option value="4077" selected="selected" >
                                                                                  Vinay singh</option>
                                                                          <option value="4025" >
                                                                                  vivek kumar</option>
                                                                          <option value="4053" >
                                                                                  Yashika Sharma</option>
                                                                          <option value="4061" >
                                                                                  Yatin y</option>
                                                                          <option value="4070" >
                                                                                  Yuvraj  Singh</option>
                                                                          <option value="4021" >
                                                                                  Zuhair  Abbas	</option>
                                                                      </select> </div>
                              </td>
                              <td align="left" valign="top">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;"><span style="color:#686868;"><i class="fa fa-clock-o" aria-hidden="true"></i> Created</span></div>
                                <div style="font-size:11px; line-height: 16px; margin-bottom:3px;">04-08-2025</div>
                              </td>
                              <td width="13%" align="left" valign="top">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;"><span style="color:#686868;"><i class="fa fa-clock-o" aria-hidden="true"></i> Last Updated</span></div>
                                <div style="font-size:11px; line-height: 16px; margin-bottom:3px;">24/09/2025 - 06:34 PM</div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                                              <div class="viewpackageheader" onclick="$('#pro27371').toggle();"><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp;View Proposal (1)</div>
                        <div class="proposallistouter" style="display:none;" id="pro27371">
                                                      <a href="display.html?ga=itineraries&view=1&id=109087"><i class="fa fa-list-alt" aria-hidden="true"></i> &nbsp;Bali- a Fascinating Island with Private Pool Villa (&#8377; 0 ) &nbsp; <i class="fa fa-check" aria-hidden="true" style="color:#00CC00;"></i></a>
                                                  </div>
                                          </div>
                                      <div class="querylistbox">
                      <div class="qtp">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                          <tbody>
                            <tr>
                              <td width="3%" align="left" valign="top" style="padding-right:10px;"><input type="checkbox" name="assignall[]" class="checkBoxClass" id="assignqury" value="127370" onclick="selectedfun();" style="width: 16px; height: 16px;"> </td>
                              <td width="14%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:15px; font-weight:500;line-height: 16px; margin-bottom:3px; font-weight:600;"><a href="display.html?ga=query&view=1&id=127370">127370</a></div>
                                <span class="badge badge-orange">Follow Up</span>                              </td>
                              <td width="20%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:13px; line-height: 16px; margin-bottom:3px;white-space: nowrap; max-width:200px; overflow: hidden; text-overflow: ellipsis;font-weight:600;">Ms. Priyanka Eswaram</div>
                                <div style="font-size:13px; color:#686868;">9047346000</div>
                              </td>
                              <td width="17%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:13px; color:#686868;">9047346000</div>
                              </td>
                              <td width="17%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:13px; line-height: 16px;"><span style="color:#686868; font-weight: 600;">Domestic</span><br /><span style="color:#686868;">Origin<br />
                                  </span><span style="max-width:180px; overflow:hidden;overflow-wrap: break-word;">                                      <span class="badge badge-boxed  badge-soft-success" style=" background-color: #737373 !important; color:#fff; font-size: 11px; padding: 5px 6px;"></span>
                                    </span></div>
                                <div style="font-size:13px; line-height: 16px;"><span style="color:#686868;">Destination<br />
                                  </span><span style="max-width:180px; overflow:hidden;overflow-wrap: break-word;">                                      <span class="badge badge-boxed  badge-soft-success" style=" background-color: #737373 !important; color:#fff; font-size: 11px; padding: 5px 6px;">Malaysia</span>
                                    </span></div>
                              </td>
                              <td width="15%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;"><span style="color:#686868;"><i class="fa fa-calendar" aria-hidden="true"></i></span> 29-09-2025</div>
                                <div style="font-size:12px; line-height: 16px;"><span style="color:#686868;">Till</span> 04-10-2025</div>
                              </td>
                              <td align="left" valign="top" style="font-size:13px; line-height: 16px;">No Task</span>

                                <div style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; font-size:12px;color:#686868;white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width:200px;"><i class="fa fa-sticky-note" aria-hidden="true" style=" color:#ffa500;"></i> &nbsp;sent package                                </div>
                              </td>
                              <td width="13%" align="right" valign="middle">
                                <div class="btn-group" role="group" aria-label="Option">
                                  <a href="display.html?ga=query&view=1&id=127370"><button type="button" class="btn btn-secondary"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                                                                                            <a target="_blank" href="https://api.whatsapp.com/send?text=Hi&phone=+919047346000"><button type="button" class="btn btn-secondary"><i class="fa fa-whatsapp" aria-hidden="true"></i></button></a>
                                                                        <a popaction="action=composemail&queryId=127370" onclick="loadpop('Compose Mail',this,'900px')" data-toggle="modal" data-target=".bs-example-modal-center"><button type="button" class="btn btn-secondary"><i class="fa fa-envelope-o" aria-hidden="true"></i></button></a>
                                    <a onclick="createquery('127370');"><button type="button" class="btn btn-secondary"><i class="fa fa-pencil" aria-hidden="true"></i></button></a>
                                                                  </div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <div class="qbt">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                          <tbody>
                            <tr>
                              <td width="3%" align="center" valign="top" style="padding-right:10px;">                               </td>
                              <td width="14%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;color:#686868;">Requirement</div>
                                <div class="blueicons" style="font-size:12px; font-weight:600;">Full package</div>
                              </td>
                              <td width="20%" align="left" valign="top" style="padding-right:20px;">
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">Priyankaeas@gmail.com</div>
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">Agent</div>
                              </td>
                              <td width="17%" align="left" valign="top" style="padding-right:20px;">
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">Travellers</div>
                                <div style="font-size:13px; line-height: 16px;">4 <span style="color:#686868; font-size:11px;">Adult</span> 0 <span style="color:#686868; font-size:11px;">Clild</span> 0 <span style="color:#686868; font-size:11px;">Infant</span></div>
                              </td>
                              <td width="15%" align="left" valign="top" style="padding-right:20px;">
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">Assigned to</div>
                                <div style="font-size:12px;"><select id="assignTo127370" name="assignTo127370" class="form-control" style="padding: 3px; font-size: 12px; height: 25px; line-height: 15px; color: #000; font-weight: 600;" autocomplete="off" onchange="changeAssignTo('127370');">
                                    <option value="1">Assign to me</option>
                                                                          <option value="4074" >
                                                                                  Adarsh  Ojha</option>
                                                                          <option value="4069" >
                                                                                  Akash Shrestha</option>
                                                                          <option value="4057" >
                                                                                  Akshay Chikara</option>
                                                                          <option value="4068" >
                                                                                  Alok  Kumar</option>
                                                                          <option value="4047" selected="selected" >
                                                                                  Anjali A</option>
                                                                          <option value="4072" >
                                                                                  Anjana Thakur</option>
                                                                          <option value="4024" >
                                                                                  Ayush Pandey</option>
                                                                          <option value="4055" >
                                                                                  Ayush  Gupta</option>
                                                                          <option value="4028" >
                                                                                  Daud Khan</option>
                                                                          <option value="4049" >
                                                                                  Ekta Shrestha</option>
                                                                          <option value="4019" >
                                                                                  Gokul K</option>
                                                                          <option value="4027" >
                                                                                  Harshita Singh</option>
                                                                          <option value="4038" >
                                                                                  Honey hm</option>
                                                                          <option value="4026" >
                                                                                  Jake AS</option>
                                                                          <option value="4075" >
                                                                                  Jennifer Chanu</option>
                                                                          <option value="4051" >
                                                                                  Kavita Shahi</option>
                                                                          <option value="4071" >
                                                                                  Khushi Gupta</option>
                                                                          <option value="4076" >
                                                                                  MIS i2a</option>
                                                                          <option value="4073" >
                                                                                  Mohd Arsh Khan</option>
                                                                          <option value="4029" >
                                                                                  Mohsin Hussain</option>
                                                                          <option value="4054" >
                                                                                  Neha  Singh	</option>
                                                                          <option value="4014" >
                                                                                  Nishant Kumar</option>
                                                                          <option value="4052" >
                                                                                  Noman  Ahmed	</option>
                                                                          <option value="4040" >
                                                                                  Pintu Kumar</option>
                                                                          <option value="4043" >
                                                                                  Prashant Sharma</option>
                                                                          <option value="4030" >
                                                                                  Prashant Kumar Sharma</option>
                                                                          <option value="4023" >
                                                                                  Radha R</option>
                                                                          <option value="4013" >
                                                                                  Sachin Kumar</option>
                                                                          <option value="4044" >
                                                                                  Sachin  Singh Maher</option>
                                                                          <option value="4017" >
                                                                                  Sajad Khan</option>
                                                                          <option value="4016" >
                                                                                  Saurabh Rai</option>
                                                                          <option value="4022" >
                                                                                  Shivani Sharma</option>
                                                                          <option value="4078" >
                                                                                  shobhnath l2a</option>
                                                                          <option value="4048" >
                                                                                  Suchita Massey</option>
                                                                          <option value="4012" >
                                                                                  Sujeet Kumar</option>
                                                                          <option value="4050" >
                                                                                  Sunil S</option>
                                                                          <option value="4046" >
                                                                                  Suraj Sahu</option>
                                                                          <option value="4015" >
                                                                                  Swapnil Sinha</option>
                                                                          <option value="4045" >
                                                                                  Tannu T</option>
                                                                          <option value="4018" >
                                                                                  umesh singh</option>
                                                                          <option value="4020" >
                                                                                  Vaasu  Arora	</option>
                                                                          <option value="4077" >
                                                                                  Vinay singh</option>
                                                                          <option value="4025" >
                                                                                  vivek kumar</option>
                                                                          <option value="4053" >
                                                                                  Yashika Sharma</option>
                                                                          <option value="4061" >
                                                                                  Yatin y</option>
                                                                          <option value="4070" >
                                                                                  Yuvraj  Singh</option>
                                                                          <option value="4021" >
                                                                                  Zuhair  Abbas	</option>
                                                                      </select> </div>
                              </td>
                              <td align="left" valign="top">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;"><span style="color:#686868;"><i class="fa fa-clock-o" aria-hidden="true"></i> Created</span></div>
                                <div style="font-size:11px; line-height: 16px; margin-bottom:3px;">04-08-2025</div>
                              </td>
                              <td width="13%" align="left" valign="top">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;"><span style="color:#686868;"><i class="fa fa-clock-o" aria-hidden="true"></i> Last Updated</span></div>
                                <div style="font-size:11px; line-height: 16px; margin-bottom:3px;">04/08/2025 - 04:40 PM</div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                                              <div class="viewpackageheader" onclick="$('#pro27370').toggle();"><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp;View Proposal (2)</div>
                        <div class="proposallistouter" style="display:none;" id="pro27370">
                                                      <a href="display.html?ga=itineraries&view=1&id=109049"><i class="fa fa-list-alt" aria-hidden="true"></i> &nbsp;Ms Priyanka's Trail To Malaysia 5N/6D   (&#8377; 170,800 ) &nbsp; </a>
                                                      <a href="display.html?ga=itineraries&view=1&id=109048"><i class="fa fa-list-alt" aria-hidden="true"></i> &nbsp;Ms. Seema Trail's To Malaysia 5N/6D  (&#8377; 93,450 ) &nbsp; </a>
                                                  </div>
                                          </div>
                                      <div class="querylistbox">
                      <div class="qtp">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                          <tbody>
                            <tr>
                              <td width="3%" align="left" valign="top" style="padding-right:10px;"><input type="checkbox" name="assignall[]" class="checkBoxClass" id="assignqury" value="127369" onclick="selectedfun();" style="width: 16px; height: 16px;"> </td>
                              <td width="14%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:15px; font-weight:500;line-height: 16px; margin-bottom:3px; font-weight:600;"><a href="display.html?ga=query&view=1&id=127369">127369</a></div>
                                <span class="badge badge-primary">New</span>                              </td>
                              <td width="20%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:13px; line-height: 16px; margin-bottom:3px;white-space: nowrap; max-width:200px; overflow: hidden; text-overflow: ellipsis;font-weight:600;">Mr. Nikhil Bapat</div>
                                <div style="font-size:13px; color:#686868;">8446577052</div>
                              </td>
                              <td width="17%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:13px; color:#686868;">8446577052</div>
                              </td>
                              <td width="17%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:13px; line-height: 16px;"><span style="color:#686868; font-weight: 600;">International</span><br /><span style="color:#686868;">Origin<br />
                                  </span><span style="max-width:180px; overflow:hidden;overflow-wrap: break-word;">                                      <span class="badge badge-boxed  badge-soft-success" style=" background-color: #737373 !important; color:#fff; font-size: 11px; padding: 5px 6px;">Mumbai</span>
                                    </span></div>
                                <div style="font-size:13px; line-height: 16px;"><span style="color:#686868;">Destination<br />
                                  </span><span style="max-width:180px; overflow:hidden;overflow-wrap: break-word;">                                      <span class="badge badge-boxed  badge-soft-success" style=" background-color: #737373 !important; color:#fff; font-size: 11px; padding: 5px 6px;">Dubai</span>
                                    </span></div>
                              </td>
                              <td width="15%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;"><span style="color:#686868;"><i class="fa fa-calendar" aria-hidden="true"></i></span> 23-11-2025</div>
                                <div style="font-size:12px; line-height: 16px;"><span style="color:#686868;">Till</span> 27-11-2025</div>
                              </td>
                              <td align="left" valign="top" style="font-size:13px; line-height: 16px;">No Task</span>

                                <div style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; font-size:12px;color:#686868;white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width:200px;"><i class="fa fa-sticky-note" aria-hidden="true" style=" color:#ffa500;"></i> &nbsp;No Notes                                </div>
                              </td>
                              <td width="13%" align="right" valign="middle">
                                <div class="btn-group" role="group" aria-label="Option">
                                  <a href="display.html?ga=query&view=1&id=127369"><button type="button" class="btn btn-secondary"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                                                                                            <a target="_blank" href="https://api.whatsapp.com/send?text=Hi&phone=+918446577052"><button type="button" class="btn btn-secondary"><i class="fa fa-whatsapp" aria-hidden="true"></i></button></a>
                                                                        <a popaction="action=composemail&queryId=127369" onclick="loadpop('Compose Mail',this,'900px')" data-toggle="modal" data-target=".bs-example-modal-center"><button type="button" class="btn btn-secondary"><i class="fa fa-envelope-o" aria-hidden="true"></i></button></a>
                                    <a onclick="createquery('127369');"><button type="button" class="btn btn-secondary"><i class="fa fa-pencil" aria-hidden="true"></i></button></a>
                                                                  </div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <div class="qbt">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                          <tbody>
                            <tr>
                              <td width="3%" align="center" valign="top" style="padding-right:10px;">                               </td>
                              <td width="14%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;color:#686868;">Requirement</div>
                                <div class="blueicons" style="font-size:12px; font-weight:600;">Full package</div>
                              </td>
                              <td width="20%" align="left" valign="top" style="padding-right:20px;">
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">nikhilbap2704@gmail.com</div>
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">Agent</div>
                              </td>
                              <td width="17%" align="left" valign="top" style="padding-right:20px;">
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">Travellers</div>
                                <div style="font-size:13px; line-height: 16px;">2 <span style="color:#686868; font-size:11px;">Adult</span> 0 <span style="color:#686868; font-size:11px;">Clild</span> 0 <span style="color:#686868; font-size:11px;">Infant</span></div>
                              </td>
                              <td width="15%" align="left" valign="top" style="padding-right:20px;">
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">Assigned to</div>
                                <div style="font-size:12px;"><select id="assignTo127369" name="assignTo127369" class="form-control" style="padding: 3px; font-size: 12px; height: 25px; line-height: 15px; color: #000; font-weight: 600;" autocomplete="off" onchange="changeAssignTo('127369');">
                                    <option value="1">Assign to me</option>
                                                                          <option value="4074" >
                                                                                  Adarsh  Ojha</option>
                                                                          <option value="4069" >
                                                                                  Akash Shrestha</option>
                                                                          <option value="4057" >
                                                                                  Akshay Chikara</option>
                                                                          <option value="4068" >
                                                                                  Alok  Kumar</option>
                                                                          <option value="4047" >
                                                                                  Anjali A</option>
                                                                          <option value="4072" >
                                                                                  Anjana Thakur</option>
                                                                          <option value="4024" >
                                                                                  Ayush Pandey</option>
                                                                          <option value="4055" >
                                                                                  Ayush  Gupta</option>
                                                                          <option value="4028" >
                                                                                  Daud Khan</option>
                                                                          <option value="4049" >
                                                                                  Ekta Shrestha</option>
                                                                          <option value="4019" >
                                                                                  Gokul K</option>
                                                                          <option value="4027" >
                                                                                  Harshita Singh</option>
                                                                          <option value="4038" >
                                                                                  Honey hm</option>
                                                                          <option value="4026" >
                                                                                  Jake AS</option>
                                                                          <option value="4075" >
                                                                                  Jennifer Chanu</option>
                                                                          <option value="4051" >
                                                                                  Kavita Shahi</option>
                                                                          <option value="4071" >
                                                                                  Khushi Gupta</option>
                                                                          <option value="4076" >
                                                                                  MIS i2a</option>
                                                                          <option value="4073" >
                                                                                  Mohd Arsh Khan</option>
                                                                          <option value="4029" >
                                                                                  Mohsin Hussain</option>
                                                                          <option value="4054" >
                                                                                  Neha  Singh	</option>
                                                                          <option value="4014" >
                                                                                  Nishant Kumar</option>
                                                                          <option value="4052" >
                                                                                  Noman  Ahmed	</option>
                                                                          <option value="4040" >
                                                                                  Pintu Kumar</option>
                                                                          <option value="4043" >
                                                                                  Prashant Sharma</option>
                                                                          <option value="4030" selected="selected" >
                                                                                  Prashant Kumar Sharma</option>
                                                                          <option value="4023" >
                                                                                  Radha R</option>
                                                                          <option value="4013" >
                                                                                  Sachin Kumar</option>
                                                                          <option value="4044" >
                                                                                  Sachin  Singh Maher</option>
                                                                          <option value="4017" >
                                                                                  Sajad Khan</option>
                                                                          <option value="4016" >
                                                                                  Saurabh Rai</option>
                                                                          <option value="4022" >
                                                                                  Shivani Sharma</option>
                                                                          <option value="4078" >
                                                                                  shobhnath l2a</option>
                                                                          <option value="4048" >
                                                                                  Suchita Massey</option>
                                                                          <option value="4012" >
                                                                                  Sujeet Kumar</option>
                                                                          <option value="4050" >
                                                                                  Sunil S</option>
                                                                          <option value="4046" >
                                                                                  Suraj Sahu</option>
                                                                          <option value="4015" >
                                                                                  Swapnil Sinha</option>
                                                                          <option value="4045" >
                                                                                  Tannu T</option>
                                                                          <option value="4018" >
                                                                                  umesh singh</option>
                                                                          <option value="4020" >
                                                                                  Vaasu  Arora	</option>
                                                                          <option value="4077" >
                                                                                  Vinay singh</option>
                                                                          <option value="4025" >
                                                                                  vivek kumar</option>
                                                                          <option value="4053" >
                                                                                  Yashika Sharma</option>
                                                                          <option value="4061" >
                                                                                  Yatin y</option>
                                                                          <option value="4070" >
                                                                                  Yuvraj  Singh</option>
                                                                          <option value="4021" >
                                                                                  Zuhair  Abbas	</option>
                                                                      </select> </div>
                              </td>
                              <td align="left" valign="top">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;"><span style="color:#686868;"><i class="fa fa-clock-o" aria-hidden="true"></i> Created</span></div>
                                <div style="font-size:11px; line-height: 16px; margin-bottom:3px;">04-08-2025</div>
                              </td>
                              <td width="13%" align="left" valign="top">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;"><span style="color:#686868;"><i class="fa fa-clock-o" aria-hidden="true"></i> Last Updated</span></div>
                                <div style="font-size:11px; line-height: 16px; margin-bottom:3px;">24/09/2025 - 06:34 PM</div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                                          </div>
                                      <div class="querylistbox">
                      <div class="qtp">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                          <tbody>
                            <tr>
                              <td width="3%" align="left" valign="top" style="padding-right:10px;"><input type="checkbox" name="assignall[]" class="checkBoxClass" id="assignqury" value="127368" onclick="selectedfun();" style="width: 16px; height: 16px;"> </td>
                              <td width="14%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:15px; font-weight:500;line-height: 16px; margin-bottom:3px; font-weight:600;"><a href="display.html?ga=query&view=1&id=127368">127368</a></div>
                                <span class="badge badge-blue">Proposal Sent</span>                              </td>
                              <td width="20%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:13px; line-height: 16px; margin-bottom:3px;white-space: nowrap; max-width:200px; overflow: hidden; text-overflow: ellipsis;font-weight:600;">Ms. Seema</div>
                                <div style="font-size:13px; color:#686868;">8892078092</div>
                              </td>
                              <td width="17%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:13px; color:#686868;">8892078092</div>
                              </td>
                              <td width="17%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:13px; line-height: 16px;"><span style="color:#686868; font-weight: 600;">International</span><br /><span style="color:#686868;">Origin<br />
                                  </span><span style="max-width:180px; overflow:hidden;overflow-wrap: break-word;">                                      <span class="badge badge-boxed  badge-soft-success" style=" background-color: #737373 !important; color:#fff; font-size: 11px; padding: 5px 6px;">Bengaluru</span>
                                    </span></div>
                                <div style="font-size:13px; line-height: 16px;"><span style="color:#686868;">Destination<br />
                                  </span><span style="max-width:180px; overflow:hidden;overflow-wrap: break-word;">                                      <span class="badge badge-boxed  badge-soft-success" style=" background-color: #737373 !important; color:#fff; font-size: 11px; padding: 5px 6px;">Malaysia</span>
                                    </span></div>
                              </td>
                              <td width="15%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;"><span style="color:#686868;"><i class="fa fa-calendar" aria-hidden="true"></i></span> 15-09-2025</div>
                                <div style="font-size:12px; line-height: 16px;"><span style="color:#686868;">Till</span> 20-09-2025</div>
                              </td>
                              <td align="left" valign="top" style="font-size:13px; line-height: 16px;">No Task</span>

                                <div style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; font-size:12px;color:#686868;white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width:200px;"><i class="fa fa-sticky-note" aria-hidden="true" style=" color:#ffa500;"></i> &nbsp;package send                                 </div>
                              </td>
                              <td width="13%" align="right" valign="middle">
                                <div class="btn-group" role="group" aria-label="Option">
                                  <a href="display.html?ga=query&view=1&id=127368"><button type="button" class="btn btn-secondary"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                                                                                            <a target="_blank" href="https://api.whatsapp.com/send?text=Hi&phone=+918892078092"><button type="button" class="btn btn-secondary"><i class="fa fa-whatsapp" aria-hidden="true"></i></button></a>
                                                                        <a popaction="action=composemail&queryId=127368" onclick="loadpop('Compose Mail',this,'900px')" data-toggle="modal" data-target=".bs-example-modal-center"><button type="button" class="btn btn-secondary"><i class="fa fa-envelope-o" aria-hidden="true"></i></button></a>
                                    <a onclick="createquery('127368');"><button type="button" class="btn btn-secondary"><i class="fa fa-pencil" aria-hidden="true"></i></button></a>
                                                                  </div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <div class="qbt">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                          <tbody>
                            <tr>
                              <td width="3%" align="center" valign="top" style="padding-right:10px;">                               </td>
                              <td width="14%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;color:#686868;">Requirement</div>
                                <div class="blueicons" style="font-size:12px; font-weight:600;">Full package</div>
                              </td>
                              <td width="20%" align="left" valign="top" style="padding-right:20px;">
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">rahamatunnisa7@gmail.com</div>
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">Agent</div>
                              </td>
                              <td width="17%" align="left" valign="top" style="padding-right:20px;">
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">Travellers</div>
                                <div style="font-size:13px; line-height: 16px;">2 <span style="color:#686868; font-size:11px;">Adult</span> 0 <span style="color:#686868; font-size:11px;">Clild</span> 0 <span style="color:#686868; font-size:11px;">Infant</span></div>
                              </td>
                              <td width="15%" align="left" valign="top" style="padding-right:20px;">
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">Assigned to</div>
                                <div style="font-size:12px;"><select id="assignTo127368" name="assignTo127368" class="form-control" style="padding: 3px; font-size: 12px; height: 25px; line-height: 15px; color: #000; font-weight: 600;" autocomplete="off" onchange="changeAssignTo('127368');">
                                    <option value="1">Assign to me</option>
                                                                          <option value="4074" >
                                                                                  Adarsh  Ojha</option>
                                                                          <option value="4069" >
                                                                                  Akash Shrestha</option>
                                                                          <option value="4057" >
                                                                                  Akshay Chikara</option>
                                                                          <option value="4068" >
                                                                                  Alok  Kumar</option>
                                                                          <option value="4047" >
                                                                                  Anjali A</option>
                                                                          <option value="4072" >
                                                                                  Anjana Thakur</option>
                                                                          <option value="4024" >
                                                                                  Ayush Pandey</option>
                                                                          <option value="4055" >
                                                                                  Ayush  Gupta</option>
                                                                          <option value="4028" >
                                                                                  Daud Khan</option>
                                                                          <option value="4049" >
                                                                                  Ekta Shrestha</option>
                                                                          <option value="4019" >
                                                                                  Gokul K</option>
                                                                          <option value="4027" >
                                                                                  Harshita Singh</option>
                                                                          <option value="4038" >
                                                                                  Honey hm</option>
                                                                          <option value="4026" >
                                                                                  Jake AS</option>
                                                                          <option value="4075" >
                                                                                  Jennifer Chanu</option>
                                                                          <option value="4051" >
                                                                                  Kavita Shahi</option>
                                                                          <option value="4071" >
                                                                                  Khushi Gupta</option>
                                                                          <option value="4076" >
                                                                                  MIS i2a</option>
                                                                          <option value="4073" >
                                                                                  Mohd Arsh Khan</option>
                                                                          <option value="4029" >
                                                                                  Mohsin Hussain</option>
                                                                          <option value="4054" >
                                                                                  Neha  Singh	</option>
                                                                          <option value="4014" >
                                                                                  Nishant Kumar</option>
                                                                          <option value="4052" >
                                                                                  Noman  Ahmed	</option>
                                                                          <option value="4040" >
                                                                                  Pintu Kumar</option>
                                                                          <option value="4043" >
                                                                                  Prashant Sharma</option>
                                                                          <option value="4030" >
                                                                                  Prashant Kumar Sharma</option>
                                                                          <option value="4023" >
                                                                                  Radha R</option>
                                                                          <option value="4013" >
                                                                                  Sachin Kumar</option>
                                                                          <option value="4044" >
                                                                                  Sachin  Singh Maher</option>
                                                                          <option value="4017" >
                                                                                  Sajad Khan</option>
                                                                          <option value="4016" >
                                                                                  Saurabh Rai</option>
                                                                          <option value="4022" >
                                                                                  Shivani Sharma</option>
                                                                          <option value="4078" >
                                                                                  shobhnath l2a</option>
                                                                          <option value="4048" >
                                                                                  Suchita Massey</option>
                                                                          <option value="4012" >
                                                                                  Sujeet Kumar</option>
                                                                          <option value="4050" >
                                                                                  Sunil S</option>
                                                                          <option value="4046" >
                                                                                  Suraj Sahu</option>
                                                                          <option value="4015" >
                                                                                  Swapnil Sinha</option>
                                                                          <option value="4045" >
                                                                                  Tannu T</option>
                                                                          <option value="4018" selected="selected" >
                                                                                  umesh singh</option>
                                                                          <option value="4020" >
                                                                                  Vaasu  Arora	</option>
                                                                          <option value="4077" >
                                                                                  Vinay singh</option>
                                                                          <option value="4025" >
                                                                                  vivek kumar</option>
                                                                          <option value="4053" >
                                                                                  Yashika Sharma</option>
                                                                          <option value="4061" >
                                                                                  Yatin y</option>
                                                                          <option value="4070" >
                                                                                  Yuvraj  Singh</option>
                                                                          <option value="4021" >
                                                                                  Zuhair  Abbas	</option>
                                                                      </select> </div>
                              </td>
                              <td align="left" valign="top">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;"><span style="color:#686868;"><i class="fa fa-clock-o" aria-hidden="true"></i> Created</span></div>
                                <div style="font-size:11px; line-height: 16px; margin-bottom:3px;">04-08-2025</div>
                              </td>
                              <td width="13%" align="left" valign="top">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;"><span style="color:#686868;"><i class="fa fa-clock-o" aria-hidden="true"></i> Last Updated</span></div>
                                <div style="font-size:11px; line-height: 16px; margin-bottom:3px;">18/09/2025 - 06:42 PM</div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                                              <div class="viewpackageheader" onclick="$('#pro27368').toggle();"><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp;View Proposal (2)</div>
                        <div class="proposallistouter" style="display:none;" id="pro27368">
                                                      <a href="display.html?ga=itineraries&view=1&id=109047"><i class="fa fa-list-alt" aria-hidden="true"></i> &nbsp;Ms. Seema Trail's To Malaysia 5N/6D  (&#8377; 98,679 ) &nbsp; </a>
                                                      <a href="display.html?ga=itineraries&view=1&id=109046"><i class="fa fa-list-alt" aria-hidden="true"></i> &nbsp;Mr. Ajay  Trail's To Malaysia 4N/5D  (&#8377; 51,400 ) &nbsp; </a>
                                                  </div>
                                          </div>
                                      <div class="querylistbox">
                      <div class="qtp">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                          <tbody>
                            <tr>
                              <td width="3%" align="left" valign="top" style="padding-right:10px;"><input type="checkbox" name="assignall[]" class="checkBoxClass" id="assignqury" value="127367" onclick="selectedfun();" style="width: 16px; height: 16px;"> </td>
                              <td width="14%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:15px; font-weight:500;line-height: 16px; margin-bottom:3px; font-weight:600;"><a href="display.html?ga=query&view=1&id=127367">127367</a></div>
                                <span class="badge badge-dark">No Connect</span>                              </td>
                              <td width="20%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:13px; line-height: 16px; margin-bottom:3px;white-space: nowrap; max-width:200px; overflow: hidden; text-overflow: ellipsis;font-weight:600;">Mr. Adnan Qaiser</div>
                                <div style="font-size:13px; color:#686868;">9168181797</div>
                              </td>
                              <td width="17%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:13px; color:#686868;">9168181797</div>
                              </td>
                              <td width="17%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:13px; line-height: 16px;"><span style="color:#686868; font-weight: 600;">International</span><br /><span style="color:#686868;">Origin<br />
                                  </span><span style="max-width:180px; overflow:hidden;overflow-wrap: break-word;">                                      <span class="badge badge-boxed  badge-soft-success" style=" background-color: #737373 !important; color:#fff; font-size: 11px; padding: 5px 6px;">Delhi</span>
                                    </span></div>
                                <div style="font-size:13px; line-height: 16px;"><span style="color:#686868;">Destination<br />
                                  </span><span style="max-width:180px; overflow:hidden;overflow-wrap: break-word;">                                      <span class="badge badge-boxed  badge-soft-success" style=" background-color: #737373 !important; color:#fff; font-size: 11px; padding: 5px 6px;">Malaysia</span>
                                    </span></div>
                              </td>
                              <td width="15%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;"><span style="color:#686868;"><i class="fa fa-calendar" aria-hidden="true"></i></span> 06-09-2025</div>
                                <div style="font-size:12px; line-height: 16px;"><span style="color:#686868;">Till</span> 15-09-2025</div>
                              </td>
                              <td align="left" valign="top" style="font-size:13px; line-height: 16px;">No Task</span>

                                <div style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; font-size:12px;color:#686868;white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width:200px;"><i class="fa fa-sticky-note" aria-hidden="true" style=" color:#ffa500;"></i> &nbsp;Guest didn't pickup. Msg dropped on whatsappp                                </div>
                              </td>
                              <td width="13%" align="right" valign="middle">
                                <div class="btn-group" role="group" aria-label="Option">
                                  <a href="display.html?ga=query&view=1&id=127367"><button type="button" class="btn btn-secondary"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                                                                                            <a target="_blank" href="https://api.whatsapp.com/send?text=Hi&phone=+919168181797"><button type="button" class="btn btn-secondary"><i class="fa fa-whatsapp" aria-hidden="true"></i></button></a>
                                                                        <a popaction="action=composemail&queryId=127367" onclick="loadpop('Compose Mail',this,'900px')" data-toggle="modal" data-target=".bs-example-modal-center"><button type="button" class="btn btn-secondary"><i class="fa fa-envelope-o" aria-hidden="true"></i></button></a>
                                    <a onclick="createquery('127367');"><button type="button" class="btn btn-secondary"><i class="fa fa-pencil" aria-hidden="true"></i></button></a>
                                                                  </div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <div class="qbt">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                          <tbody>
                            <tr>
                              <td width="3%" align="center" valign="top" style="padding-right:10px;">                               </td>
                              <td width="14%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;color:#686868;">Requirement</div>
                                <div class="blueicons" style="font-size:12px; font-weight:600;">Full package</div>
                              </td>
                              <td width="20%" align="left" valign="top" style="padding-right:20px;">
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">adnanqaiser12@gmail.com</div>
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">Agent</div>
                              </td>
                              <td width="17%" align="left" valign="top" style="padding-right:20px;">
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">Travellers</div>
                                <div style="font-size:13px; line-height: 16px;">2 <span style="color:#686868; font-size:11px;">Adult</span> 0 <span style="color:#686868; font-size:11px;">Clild</span> 0 <span style="color:#686868; font-size:11px;">Infant</span></div>
                              </td>
                              <td width="15%" align="left" valign="top" style="padding-right:20px;">
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">Assigned to</div>
                                <div style="font-size:12px;"><select id="assignTo127367" name="assignTo127367" class="form-control" style="padding: 3px; font-size: 12px; height: 25px; line-height: 15px; color: #000; font-weight: 600;" autocomplete="off" onchange="changeAssignTo('127367');">
                                    <option value="1">Assign to me</option>
                                                                          <option value="4074" >
                                                                                  Adarsh  Ojha</option>
                                                                          <option value="4069" selected="selected" >
                                                                                  Akash Shrestha</option>
                                                                          <option value="4057" >
                                                                                  Akshay Chikara</option>
                                                                          <option value="4068" >
                                                                                  Alok  Kumar</option>
                                                                          <option value="4047" >
                                                                                  Anjali A</option>
                                                                          <option value="4072" >
                                                                                  Anjana Thakur</option>
                                                                          <option value="4024" >
                                                                                  Ayush Pandey</option>
                                                                          <option value="4055" >
                                                                                  Ayush  Gupta</option>
                                                                          <option value="4028" >
                                                                                  Daud Khan</option>
                                                                          <option value="4049" >
                                                                                  Ekta Shrestha</option>
                                                                          <option value="4019" >
                                                                                  Gokul K</option>
                                                                          <option value="4027" >
                                                                                  Harshita Singh</option>
                                                                          <option value="4038" >
                                                                                  Honey hm</option>
                                                                          <option value="4026" >
                                                                                  Jake AS</option>
                                                                          <option value="4075" >
                                                                                  Jennifer Chanu</option>
                                                                          <option value="4051" >
                                                                                  Kavita Shahi</option>
                                                                          <option value="4071" >
                                                                                  Khushi Gupta</option>
                                                                          <option value="4076" >
                                                                                  MIS i2a</option>
                                                                          <option value="4073" >
                                                                                  Mohd Arsh Khan</option>
                                                                          <option value="4029" >
                                                                                  Mohsin Hussain</option>
                                                                          <option value="4054" >
                                                                                  Neha  Singh	</option>
                                                                          <option value="4014" >
                                                                                  Nishant Kumar</option>
                                                                          <option value="4052" >
                                                                                  Noman  Ahmed	</option>
                                                                          <option value="4040" >
                                                                                  Pintu Kumar</option>
                                                                          <option value="4043" >
                                                                                  Prashant Sharma</option>
                                                                          <option value="4030" >
                                                                                  Prashant Kumar Sharma</option>
                                                                          <option value="4023" >
                                                                                  Radha R</option>
                                                                          <option value="4013" >
                                                                                  Sachin Kumar</option>
                                                                          <option value="4044" >
                                                                                  Sachin  Singh Maher</option>
                                                                          <option value="4017" >
                                                                                  Sajad Khan</option>
                                                                          <option value="4016" >
                                                                                  Saurabh Rai</option>
                                                                          <option value="4022" >
                                                                                  Shivani Sharma</option>
                                                                          <option value="4078" >
                                                                                  shobhnath l2a</option>
                                                                          <option value="4048" >
                                                                                  Suchita Massey</option>
                                                                          <option value="4012" >
                                                                                  Sujeet Kumar</option>
                                                                          <option value="4050" >
                                                                                  Sunil S</option>
                                                                          <option value="4046" >
                                                                                  Suraj Sahu</option>
                                                                          <option value="4015" >
                                                                                  Swapnil Sinha</option>
                                                                          <option value="4045" >
                                                                                  Tannu T</option>
                                                                          <option value="4018" >
                                                                                  umesh singh</option>
                                                                          <option value="4020" >
                                                                                  Vaasu  Arora	</option>
                                                                          <option value="4077" >
                                                                                  Vinay singh</option>
                                                                          <option value="4025" >
                                                                                  vivek kumar</option>
                                                                          <option value="4053" >
                                                                                  Yashika Sharma</option>
                                                                          <option value="4061" >
                                                                                  Yatin y</option>
                                                                          <option value="4070" >
                                                                                  Yuvraj  Singh</option>
                                                                          <option value="4021" >
                                                                                  Zuhair  Abbas	</option>
                                                                      </select> </div>
                              </td>
                              <td align="left" valign="top">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;"><span style="color:#686868;"><i class="fa fa-clock-o" aria-hidden="true"></i> Created</span></div>
                                <div style="font-size:11px; line-height: 16px; margin-bottom:3px;">04-08-2025</div>
                              </td>
                              <td width="13%" align="left" valign="top">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;"><span style="color:#686868;"><i class="fa fa-clock-o" aria-hidden="true"></i> Last Updated</span></div>
                                <div style="font-size:11px; line-height: 16px; margin-bottom:3px;">04/08/2025 - 03:10 PM</div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                                          </div>
                                      <div class="querylistbox">
                      <div class="qtp">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                          <tbody>
                            <tr>
                              <td width="3%" align="left" valign="top" style="padding-right:10px;"><input type="checkbox" name="assignall[]" class="checkBoxClass" id="assignqury" value="127366" onclick="selectedfun();" style="width: 16px; height: 16px;"> </td>
                              <td width="14%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:15px; font-weight:500;line-height: 16px; margin-bottom:3px; font-weight:600;"><a href="display.html?ga=query&view=1&id=127366">127366</a></div>
                                <span class="badge badge-blue">Proposal Sent</span>                              </td>
                              <td width="20%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:13px; line-height: 16px; margin-bottom:3px;white-space: nowrap; max-width:200px; overflow: hidden; text-overflow: ellipsis;font-weight:600;">Mr. Sajith</div>
                                <div style="font-size:13px; color:#686868;">9910419005</div>
                              </td>
                              <td width="17%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:13px; color:#686868;">9910419005</div>
                              </td>
                              <td width="17%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:13px; line-height: 16px;"><span style="color:#686868; font-weight: 600;">International</span><br /><span style="color:#686868;">Origin<br />
                                  </span><span style="max-width:180px; overflow:hidden;overflow-wrap: break-word;">                                      <span class="badge badge-boxed  badge-soft-success" style=" background-color: #737373 !important; color:#fff; font-size: 11px; padding: 5px 6px;"></span>
                                    </span></div>
                                <div style="font-size:13px; line-height: 16px;"><span style="color:#686868;">Destination<br />
                                  </span><span style="max-width:180px; overflow:hidden;overflow-wrap: break-word;">                                      <span class="badge badge-boxed  badge-soft-success" style=" background-color: #737373 !important; color:#fff; font-size: 11px; padding: 5px 6px;">Thailand</span>
                                    </span></div>
                              </td>
                              <td width="15%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;"><span style="color:#686868;"><i class="fa fa-calendar" aria-hidden="true"></i></span> 17-12-2025</div>
                                <div style="font-size:12px; line-height: 16px;"><span style="color:#686868;">Till</span> 21-12-2025</div>
                              </td>
                              <td align="left" valign="top" style="font-size:13px; line-height: 16px;">No Task</span>

                                <div style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; font-size:12px;color:#686868;white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width:200px;"><i class="fa fa-sticky-note" aria-hidden="true" style=" color:#ffa500;"></i> &nbsp;package sent                                 </div>
                              </td>
                              <td width="13%" align="right" valign="middle">
                                <div class="btn-group" role="group" aria-label="Option">
                                  <a href="display.html?ga=query&view=1&id=127366"><button type="button" class="btn btn-secondary"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                                                                                            <a target="_blank" href="https://api.whatsapp.com/send?text=Hi&phone=+919910419005"><button type="button" class="btn btn-secondary"><i class="fa fa-whatsapp" aria-hidden="true"></i></button></a>
                                                                        <a popaction="action=composemail&queryId=127366" onclick="loadpop('Compose Mail',this,'900px')" data-toggle="modal" data-target=".bs-example-modal-center"><button type="button" class="btn btn-secondary"><i class="fa fa-envelope-o" aria-hidden="true"></i></button></a>
                                    <a onclick="createquery('127366');"><button type="button" class="btn btn-secondary"><i class="fa fa-pencil" aria-hidden="true"></i></button></a>
                                                                  </div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <div class="qbt">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                          <tbody>
                            <tr>
                              <td width="3%" align="center" valign="top" style="padding-right:10px;">                               </td>
                              <td width="14%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;color:#686868;">Requirement</div>
                                <div class="blueicons" style="font-size:12px; font-weight:600;">Full package</div>
                              </td>
                              <td width="20%" align="left" valign="top" style="padding-right:20px;">
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">xyx@gmail.com</div>
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">Agent</div>
                              </td>
                              <td width="17%" align="left" valign="top" style="padding-right:20px;">
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">Travellers</div>
                                <div style="font-size:13px; line-height: 16px;">2 <span style="color:#686868; font-size:11px;">Adult</span> 0 <span style="color:#686868; font-size:11px;">Clild</span> 0 <span style="color:#686868; font-size:11px;">Infant</span></div>
                              </td>
                              <td width="15%" align="left" valign="top" style="padding-right:20px;">
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">Assigned to</div>
                                <div style="font-size:12px;"><select id="assignTo127366" name="assignTo127366" class="form-control" style="padding: 3px; font-size: 12px; height: 25px; line-height: 15px; color: #000; font-weight: 600;" autocomplete="off" onchange="changeAssignTo('127366');">
                                    <option value="1">Assign to me</option>
                                                                          <option value="4074" >
                                                                                  Adarsh  Ojha</option>
                                                                          <option value="4069" >
                                                                                  Akash Shrestha</option>
                                                                          <option value="4057" >
                                                                                  Akshay Chikara</option>
                                                                          <option value="4068" >
                                                                                  Alok  Kumar</option>
                                                                          <option value="4047" >
                                                                                  Anjali A</option>
                                                                          <option value="4072" >
                                                                                  Anjana Thakur</option>
                                                                          <option value="4024" >
                                                                                  Ayush Pandey</option>
                                                                          <option value="4055" >
                                                                                  Ayush  Gupta</option>
                                                                          <option value="4028" >
                                                                                  Daud Khan</option>
                                                                          <option value="4049" >
                                                                                  Ekta Shrestha</option>
                                                                          <option value="4019" >
                                                                                  Gokul K</option>
                                                                          <option value="4027" >
                                                                                  Harshita Singh</option>
                                                                          <option value="4038" >
                                                                                  Honey hm</option>
                                                                          <option value="4026" >
                                                                                  Jake AS</option>
                                                                          <option value="4075" >
                                                                                  Jennifer Chanu</option>
                                                                          <option value="4051" >
                                                                                  Kavita Shahi</option>
                                                                          <option value="4071" selected="selected" >
                                                                                  Khushi Gupta</option>
                                                                          <option value="4076" >
                                                                                  MIS i2a</option>
                                                                          <option value="4073" >
                                                                                  Mohd Arsh Khan</option>
                                                                          <option value="4029" >
                                                                                  Mohsin Hussain</option>
                                                                          <option value="4054" >
                                                                                  Neha  Singh	</option>
                                                                          <option value="4014" >
                                                                                  Nishant Kumar</option>
                                                                          <option value="4052" >
                                                                                  Noman  Ahmed	</option>
                                                                          <option value="4040" >
                                                                                  Pintu Kumar</option>
                                                                          <option value="4043" >
                                                                                  Prashant Sharma</option>
                                                                          <option value="4030" >
                                                                                  Prashant Kumar Sharma</option>
                                                                          <option value="4023" >
                                                                                  Radha R</option>
                                                                          <option value="4013" >
                                                                                  Sachin Kumar</option>
                                                                          <option value="4044" >
                                                                                  Sachin  Singh Maher</option>
                                                                          <option value="4017" >
                                                                                  Sajad Khan</option>
                                                                          <option value="4016" >
                                                                                  Saurabh Rai</option>
                                                                          <option value="4022" >
                                                                                  Shivani Sharma</option>
                                                                          <option value="4078" >
                                                                                  shobhnath l2a</option>
                                                                          <option value="4048" >
                                                                                  Suchita Massey</option>
                                                                          <option value="4012" >
                                                                                  Sujeet Kumar</option>
                                                                          <option value="4050" >
                                                                                  Sunil S</option>
                                                                          <option value="4046" >
                                                                                  Suraj Sahu</option>
                                                                          <option value="4015" >
                                                                                  Swapnil Sinha</option>
                                                                          <option value="4045" >
                                                                                  Tannu T</option>
                                                                          <option value="4018" >
                                                                                  umesh singh</option>
                                                                          <option value="4020" >
                                                                                  Vaasu  Arora	</option>
                                                                          <option value="4077" >
                                                                                  Vinay singh</option>
                                                                          <option value="4025" >
                                                                                  vivek kumar</option>
                                                                          <option value="4053" >
                                                                                  Yashika Sharma</option>
                                                                          <option value="4061" >
                                                                                  Yatin y</option>
                                                                          <option value="4070" >
                                                                                  Yuvraj  Singh</option>
                                                                          <option value="4021" >
                                                                                  Zuhair  Abbas	</option>
                                                                      </select> </div>
                              </td>
                              <td align="left" valign="top">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;"><span style="color:#686868;"><i class="fa fa-clock-o" aria-hidden="true"></i> Created</span></div>
                                <div style="font-size:11px; line-height: 16px; margin-bottom:3px;">04-08-2025</div>
                              </td>
                              <td width="13%" align="left" valign="top">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;"><span style="color:#686868;"><i class="fa fa-clock-o" aria-hidden="true"></i> Last Updated</span></div>
                                <div style="font-size:11px; line-height: 16px; margin-bottom:3px;">04/08/2025 - 04:53 PM</div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                                              <div class="viewpackageheader" onclick="$('#pro27366').toggle();"><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp;View Proposal (2)</div>
                        <div class="proposallistouter" style="display:none;" id="pro27366">
                                                      <a href="display.html?ga=itineraries&view=1&id=109051"><i class="fa fa-list-alt" aria-hidden="true"></i> &nbsp;Mr. Sajith Thailand 4N/5D  - Duplicate (&#8377; 98,800 ) &nbsp; </a>
                                                      <a href="display.html?ga=itineraries&view=1&id=109050"><i class="fa fa-list-alt" aria-hidden="true"></i> &nbsp;Mr. Rudresh Thailand 4N/5D  (&#8377; 127,600 ) &nbsp; </a>
                                                  </div>
                                          </div>
                                      <div class="querylistbox">
                      <div class="qtp">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                          <tbody>
                            <tr>
                              <td width="3%" align="left" valign="top" style="padding-right:10px;"><input type="checkbox" name="assignall[]" class="checkBoxClass" id="assignqury" value="127365" onclick="selectedfun();" style="width: 16px; height: 16px;"> </td>
                              <td width="14%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:15px; font-weight:500;line-height: 16px; margin-bottom:3px; font-weight:600;"><a href="display.html?ga=query&view=1&id=127365">127365</a></div>
                                <span class="badge badge-orange">Follow Up</span>                              </td>
                              <td width="20%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:13px; line-height: 16px; margin-bottom:3px;white-space: nowrap; max-width:200px; overflow: hidden; text-overflow: ellipsis;font-weight:600;">Mr. V. Srinivas</div>
                                <div style="font-size:13px; color:#686868;">9246169666</div>
                              </td>
                              <td width="17%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:13px; color:#686868;">9246169666</div>
                              </td>
                              <td width="17%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:13px; line-height: 16px;"><span style="color:#686868; font-weight: 600;">International</span><br /><span style="color:#686868;">Origin<br />
                                  </span><span style="max-width:180px; overflow:hidden;overflow-wrap: break-word;">                                      <span class="badge badge-boxed  badge-soft-success" style=" background-color: #737373 !important; color:#fff; font-size: 11px; padding: 5px 6px;">Hyderabad</span>
                                    </span></div>
                                <div style="font-size:13px; line-height: 16px;"><span style="color:#686868;">Destination<br />
                                  </span><span style="max-width:180px; overflow:hidden;overflow-wrap: break-word;">                                      <span class="badge badge-boxed  badge-soft-success" style=" background-color: #737373 !important; color:#fff; font-size: 11px; padding: 5px 6px;">Thailand</span>
                                    </span></div>
                              </td>
                              <td width="15%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;"><span style="color:#686868;"><i class="fa fa-calendar" aria-hidden="true"></i></span> 20-08-2025</div>
                                <div style="font-size:12px; line-height: 16px;"><span style="color:#686868;">Till</span> 26-08-2025</div>
                              </td>
                              <td align="left" valign="top" style="font-size:13px; line-height: 16px;">No Task</span>

                                <div style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; font-size:12px;color:#686868;white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width:200px;"><i class="fa fa-sticky-note" aria-hidden="true" style=" color:#ffa500;"></i> &nbsp;5N and 6 days
                                phuket  krabi  bangkok
                                Jame  bond
                                tiger Safari
                                pHi phi
                                Tiger safari
                                Leisure  day  for
                                1 lac 5 thousand and 1  lac  20 thousand
                                not standard hotels
                                3, 4 star category  hotel


                                </div>
                              </td>
                              <td width="13%" align="right" valign="middle">
                                <div class="btn-group" role="group" aria-label="Option">
                                  <a href="display.html?ga=query&view=1&id=127365"><button type="button" class="btn btn-secondary"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                                                                                            <a target="_blank" href="https://api.whatsapp.com/send?text=Hi&phone=+919246169666"><button type="button" class="btn btn-secondary"><i class="fa fa-whatsapp" aria-hidden="true"></i></button></a>
                                                                        <a popaction="action=composemail&queryId=127365" onclick="loadpop('Compose Mail',this,'900px')" data-toggle="modal" data-target=".bs-example-modal-center"><button type="button" class="btn btn-secondary"><i class="fa fa-envelope-o" aria-hidden="true"></i></button></a>
                                    <a onclick="createquery('127365');"><button type="button" class="btn btn-secondary"><i class="fa fa-pencil" aria-hidden="true"></i></button></a>
                                                                  </div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <div class="qbt">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                          <tbody>
                            <tr>
                              <td width="3%" align="center" valign="top" style="padding-right:10px;">                               </td>
                              <td width="14%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;color:#686868;">Requirement</div>
                                <div class="blueicons" style="font-size:12px; font-weight:600;">Full package</div>
                              </td>
                              <td width="20%" align="left" valign="top" style="padding-right:20px;">
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">anuradhaanuradha304@gmail.com</div>
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">Agent</div>
                              </td>
                              <td width="17%" align="left" valign="top" style="padding-right:20px;">
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">Travellers</div>
                                <div style="font-size:13px; line-height: 16px;">2 <span style="color:#686868; font-size:11px;">Adult</span> 0 <span style="color:#686868; font-size:11px;">Clild</span> 0 <span style="color:#686868; font-size:11px;">Infant</span></div>
                              </td>
                              <td width="15%" align="left" valign="top" style="padding-right:20px;">
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">Assigned to</div>
                                <div style="font-size:12px;"><select id="assignTo127365" name="assignTo127365" class="form-control" style="padding: 3px; font-size: 12px; height: 25px; line-height: 15px; color: #000; font-weight: 600;" autocomplete="off" onchange="changeAssignTo('127365');">
                                    <option value="1">Assign to me</option>
                                                                          <option value="4074" >
                                                                                  Adarsh  Ojha</option>
                                                                          <option value="4069" >
                                                                                  Akash Shrestha</option>
                                                                          <option value="4057" >
                                                                                  Akshay Chikara</option>
                                                                          <option value="4068" >
                                                                                  Alok  Kumar</option>
                                                                          <option value="4047" >
                                                                                  Anjali A</option>
                                                                          <option value="4072" >
                                                                                  Anjana Thakur</option>
                                                                          <option value="4024" >
                                                                                  Ayush Pandey</option>
                                                                          <option value="4055" >
                                                                                  Ayush  Gupta</option>
                                                                          <option value="4028" >
                                                                                  Daud Khan</option>
                                                                          <option value="4049" >
                                                                                  Ekta Shrestha</option>
                                                                          <option value="4019" >
                                                                                  Gokul K</option>
                                                                          <option value="4027" >
                                                                                  Harshita Singh</option>
                                                                          <option value="4038" >
                                                                                  Honey hm</option>
                                                                          <option value="4026" >
                                                                                  Jake AS</option>
                                                                          <option value="4075" >
                                                                                  Jennifer Chanu</option>
                                                                          <option value="4051" >
                                                                                  Kavita Shahi</option>
                                                                          <option value="4071" selected="selected" >
                                                                                  Khushi Gupta</option>
                                                                          <option value="4076" >
                                                                                  MIS i2a</option>
                                                                          <option value="4073" >
                                                                                  Mohd Arsh Khan</option>
                                                                          <option value="4029" >
                                                                                  Mohsin Hussain</option>
                                                                          <option value="4054" >
                                                                                  Neha  Singh	</option>
                                                                          <option value="4014" >
                                                                                  Nishant Kumar</option>
                                                                          <option value="4052" >
                                                                                  Noman  Ahmed	</option>
                                                                          <option value="4040" >
                                                                                  Pintu Kumar</option>
                                                                          <option value="4043" >
                                                                                  Prashant Sharma</option>
                                                                          <option value="4030" >
                                                                                  Prashant Kumar Sharma</option>
                                                                          <option value="4023" >
                                                                                  Radha R</option>
                                                                          <option value="4013" >
                                                                                  Sachin Kumar</option>
                                                                          <option value="4044" >
                                                                                  Sachin  Singh Maher</option>
                                                                          <option value="4017" >
                                                                                  Sajad Khan</option>
                                                                          <option value="4016" >
                                                                                  Saurabh Rai</option>
                                                                          <option value="4022" >
                                                                                  Shivani Sharma</option>
                                                                          <option value="4078" >
                                                                                  shobhnath l2a</option>
                                                                          <option value="4048" >
                                                                                  Suchita Massey</option>
                                                                          <option value="4012" >
                                                                                  Sujeet Kumar</option>
                                                                          <option value="4050" >
                                                                                  Sunil S</option>
                                                                          <option value="4046" >
                                                                                  Suraj Sahu</option>
                                                                          <option value="4015" >
                                                                                  Swapnil Sinha</option>
                                                                          <option value="4045" >
                                                                                  Tannu T</option>
                                                                          <option value="4018" >
                                                                                  umesh singh</option>
                                                                          <option value="4020" >
                                                                                  Vaasu  Arora	</option>
                                                                          <option value="4077" >
                                                                                  Vinay singh</option>
                                                                          <option value="4025" >
                                                                                  vivek kumar</option>
                                                                          <option value="4053" >
                                                                                  Yashika Sharma</option>
                                                                          <option value="4061" >
                                                                                  Yatin y</option>
                                                                          <option value="4070" >
                                                                                  Yuvraj  Singh</option>
                                                                          <option value="4021" >
                                                                                  Zuhair  Abbas	</option>
                                                                      </select> </div>
                              </td>
                              <td align="left" valign="top">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;"><span style="color:#686868;"><i class="fa fa-clock-o" aria-hidden="true"></i> Created</span></div>
                                <div style="font-size:11px; line-height: 16px; margin-bottom:3px;">04-08-2025</div>
                              </td>
                              <td width="13%" align="left" valign="top">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;"><span style="color:#686868;"><i class="fa fa-clock-o" aria-hidden="true"></i> Last Updated</span></div>
                                <div style="font-size:11px; line-height: 16px; margin-bottom:3px;">04/08/2025 - 03:06 PM</div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                                              <div class="viewpackageheader" onclick="$('#pro27365').toggle();"><i class="fa fa-dot-circle-o" aria-hidden="true"></i> &nbsp;View Proposal (1)</div>
                        <div class="proposallistouter" style="display:none;" id="pro27365">
                                                      <a href="display.html?ga=itineraries&view=1&id=109123"><i class="fa fa-list-alt" aria-hidden="true"></i> &nbsp;mumbai (&#8377; 3,500 ) &nbsp; <i class="fa fa-check" aria-hidden="true" style="color:#00CC00;"></i></a>
                                                  </div>
                                          </div>
                                      <div class="querylistbox">
                      <div class="qtp">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                          <tbody>
                            <tr>
                              <td width="3%" align="left" valign="top" style="padding-right:10px;"><input type="checkbox" name="assignall[]" class="checkBoxClass" id="assignqury" value="127364" onclick="selectedfun();" style="width: 16px; height: 16px;"> </td>
                              <td width="14%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:15px; font-weight:500;line-height: 16px; margin-bottom:3px; font-weight:600;"><a href="display.html?ga=query&view=1&id=127364">127364</a></div>
                                <span class="badge badge-dark">No Connect</span>                              </td>
                              <td width="20%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:13px; line-height: 16px; margin-bottom:3px;white-space: nowrap; max-width:200px; overflow: hidden; text-overflow: ellipsis;font-weight:600;">Mr. Vimanessh</div>
                                <div style="font-size:13px; color:#686868;">6385218882</div>
                              </td>
                              <td width="17%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:13px; color:#686868;">6385218882</div>
                              </td>
                              <td width="17%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:13px; line-height: 16px;"><span style="color:#686868; font-weight: 600;">International</span><br /><span style="color:#686868;">Origin<br />
                                  </span><span style="max-width:180px; overflow:hidden;overflow-wrap: break-word;">                                      <span class="badge badge-boxed  badge-soft-success" style=" background-color: #737373 !important; color:#fff; font-size: 11px; padding: 5px 6px;">Chennai</span>
                                    </span></div>
                                <div style="font-size:13px; line-height: 16px;"><span style="color:#686868;">Destination<br />
                                  </span><span style="max-width:180px; overflow:hidden;overflow-wrap: break-word;">                                      <span class="badge badge-boxed  badge-soft-success" style=" background-color: #737373 !important; color:#fff; font-size: 11px; padding: 5px 6px;">Thailand</span>
                                    </span></div>
                              </td>
                              <td width="15%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;"><span style="color:#686868;"><i class="fa fa-calendar" aria-hidden="true"></i></span> 24-11-2025</div>
                                <div style="font-size:12px; line-height: 16px;"><span style="color:#686868;">Till</span> 28-11-2025</div>
                              </td>
                              <td align="left" valign="top" style="font-size:13px; line-height: 16px;">No Task</span>

                                <div style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; font-size:12px;color:#686868;white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width:200px;"><i class="fa fa-sticky-note" aria-hidden="true" style=" color:#ffa500;"></i> &nbsp;I am busy i will call u later                                 </div>
                              </td>
                              <td width="13%" align="right" valign="middle">
                                <div class="btn-group" role="group" aria-label="Option">
                                  <a href="display.html?ga=query&view=1&id=127364"><button type="button" class="btn btn-secondary"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                                                                                            <a target="_blank" href="https://api.whatsapp.com/send?text=Hi&phone=+916385218882"><button type="button" class="btn btn-secondary"><i class="fa fa-whatsapp" aria-hidden="true"></i></button></a>
                                                                        <a popaction="action=composemail&queryId=127364" onclick="loadpop('Compose Mail',this,'900px')" data-toggle="modal" data-target=".bs-example-modal-center"><button type="button" class="btn btn-secondary"><i class="fa fa-envelope-o" aria-hidden="true"></i></button></a>
                                    <a onclick="createquery('127364');"><button type="button" class="btn btn-secondary"><i class="fa fa-pencil" aria-hidden="true"></i></button></a>
                                                                  </div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <div class="qbt">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                          <tbody>
                            <tr>
                              <td width="3%" align="center" valign="top" style="padding-right:10px;">                               </td>
                              <td width="14%" align="left" valign="top" style="padding-right:20px;">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;color:#686868;">Requirement</div>
                                <div class="blueicons" style="font-size:12px; font-weight:600;">Full package</div>
                              </td>
                              <td width="20%" align="left" valign="top" style="padding-right:20px;">
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">vimanessh31@gmail.com</div>
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">Agent</div>
                              </td>
                              <td width="17%" align="left" valign="top" style="padding-right:20px;">
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">Travellers</div>
                                <div style="font-size:13px; line-height: 16px;">2 <span style="color:#686868; font-size:11px;">Adult</span> 0 <span style="color:#686868; font-size:11px;">Clild</span> 0 <span style="color:#686868; font-size:11px;">Infant</span></div>
                              </td>
                              <td width="15%" align="left" valign="top" style="padding-right:20px;">
                                <div style="color:#303030; font-size:12px; margin-bottom:3px;">Assigned to</div>
                                <div style="font-size:12px;"><select id="assignTo127364" name="assignTo127364" class="form-control" style="padding: 3px; font-size: 12px; height: 25px; line-height: 15px; color: #000; font-weight: 600;" autocomplete="off" onchange="changeAssignTo('127364');">
                                    <option value="1">Assign to me</option>
                                                                          <option value="4074" >
                                                                                  Adarsh  Ojha</option>
                                                                          <option value="4069" >
                                                                                  Akash Shrestha</option>
                                                                          <option value="4057" >
                                                                                  Akshay Chikara</option>
                                                                          <option value="4068" >
                                                                                  Alok  Kumar</option>
                                                                          <option value="4047" >
                                                                                  Anjali A</option>
                                                                          <option value="4072" >
                                                                                  Anjana Thakur</option>
                                                                          <option value="4024" >
                                                                                  Ayush Pandey</option>
                                                                          <option value="4055" >
                                                                                  Ayush  Gupta</option>
                                                                          <option value="4028" >
                                                                                  Daud Khan</option>
                                                                          <option value="4049" >
                                                                                  Ekta Shrestha</option>
                                                                          <option value="4019" >
                                                                                  Gokul K</option>
                                                                          <option value="4027" >
                                                                                  Harshita Singh</option>
                                                                          <option value="4038" >
                                                                                  Honey hm</option>
                                                                          <option value="4026" >
                                                                                  Jake AS</option>
                                                                          <option value="4075" >
                                                                                  Jennifer Chanu</option>
                                                                          <option value="4051" >
                                                                                  Kavita Shahi</option>
                                                                          <option value="4071" selected="selected" >
                                                                                  Khushi Gupta</option>
                                                                          <option value="4076" >
                                                                                  MIS i2a</option>
                                                                          <option value="4073" >
                                                                                  Mohd Arsh Khan</option>
                                                                          <option value="4029" >
                                                                                  Mohsin Hussain</option>
                                                                          <option value="4054" >
                                                                                  Neha  Singh	</option>
                                                                          <option value="4014" >
                                                                                  Nishant Kumar</option>
                                                                          <option value="4052" >
                                                                                  Noman  Ahmed	</option>
                                                                          <option value="4040" >
                                                                                  Pintu Kumar</option>
                                                                          <option value="4043" >
                                                                                  Prashant Sharma</option>
                                                                          <option value="4030" >
                                                                                  Prashant Kumar Sharma</option>
                                                                          <option value="4023" >
                                                                                  Radha R</option>
                                                                          <option value="4013" >
                                                                                  Sachin Kumar</option>
                                                                          <option value="4044" >
                                                                                  Sachin  Singh Maher</option>
                                                                          <option value="4017" >
                                                                                  Sajad Khan</option>
                                                                          <option value="4016" >
                                                                                  Saurabh Rai</option>
                                                                          <option value="4022" >
                                                                                  Shivani Sharma</option>
                                                                          <option value="4078" >
                                                                                  shobhnath l2a</option>
                                                                          <option value="4048" >
                                                                                  Suchita Massey</option>
                                                                          <option value="4012" >
                                                                                  Sujeet Kumar</option>
                                                                          <option value="4050" >
                                                                                  Sunil S</option>
                                                                          <option value="4046" >
                                                                                  Suraj Sahu</option>
                                                                          <option value="4015" >
                                                                                  Swapnil Sinha</option>
                                                                          <option value="4045" >
                                                                                  Tannu T</option>
                                                                          <option value="4018" >
                                                                                  umesh singh</option>
                                                                          <option value="4020" >
                                                                                  Vaasu  Arora	</option>
                                                                          <option value="4077" >
                                                                                  Vinay singh</option>
                                                                          <option value="4025" >
                                                                                  vivek kumar</option>
                                                                          <option value="4053" >
                                                                                  Yashika Sharma</option>
                                                                          <option value="4061" >
                                                                                  Yatin y</option>
                                                                          <option value="4070" >
                                                                                  Yuvraj  Singh</option>
                                                                          <option value="4021" >
                                                                                  Zuhair  Abbas	</option>
                                                                      </select> </div>
                              </td>
                              <td align="left" valign="top">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;"><span style="color:#686868;"><i class="fa fa-clock-o" aria-hidden="true"></i> Created</span></div>
                                <div style="font-size:11px; line-height: 16px; margin-bottom:3px;">04-08-2025</div>
                              </td>
                              <td width="13%" align="left" valign="top">
                                <div style="font-size:12px; line-height: 16px; margin-bottom:3px;"><span style="color:#686868;"><i class="fa fa-clock-o" aria-hidden="true"></i> Last Updated</span></div>
                                <div style="font-size:11px; line-height: 16px; margin-bottom:3px;">04/08/2025 - 03:04 PM</div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                                          </div>
                                  </form>
                                  <div class="mt-3 pageingouter">
                    <div style="float: left; font-size: 13px; padding: 7px 11px; border: 1px solid #ededed; background-color: #fff; color: #000;">Total Records: <strong>12008</strong></div>
                    <div class="pagingnumbers"><div class='paginate'><span class='disabled'>Previous</span><span class='current'>1</span><a href='display.html?ga=query&keyword=&searchcity&statusid=&startDate=&endDate=&searchusers=&page=2'>2</a><a href='display.html?ga=query&keyword=&searchcity&statusid=&startDate=&endDate=&searchusers=&page=3'>3</a><a href='display.html?ga=query&keyword=&searchcity&statusid=&startDate=&endDate=&searchusers=&page=4'>4</a><a href='display.html?ga=query&keyword=&searchcity&statusid=&startDate=&endDate=&searchusers=&page=5'>5</a><a href='display.html?ga=query&keyword=&searchcity&statusid=&startDate=&endDate=&searchusers=&page=6'>6</a><a href='display.html?ga=query&keyword=&searchcity&statusid=&startDate=&endDate=&searchusers=&page=7'>7</a><a href='display.html?ga=query&keyword=&searchcity&statusid=&startDate=&endDate=&searchusers=&page=8'>8</a><a href='display.html?ga=query&keyword=&searchcity&statusid=&startDate=&endDate=&searchusers=&page=9'>9</a>...<a href='display.html?ga=query&keyword=&searchcity&statusid=&startDate=&endDate=&searchusers=&page=480'>480</a><a href='display.html?ga=query&keyword=&searchcity&statusid=&startDate=&endDate=&searchusers=&page=481'>481</a><a href='display.html?ga=query&keyword=&searchcity&statusid=&startDate=&endDate=&searchusers=&page=2'>Next</a></div></div>
                  </div>
                              </div>
            </div>
          </div>
        </div><!--end col--> --}}
        <!-- end row -->
      </div>
      <!-- End Page-content -->
    </div>
  </div>
</div>
@endsection
