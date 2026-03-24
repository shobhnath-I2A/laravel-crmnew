  <div id="load_build_day_details">
      <style>
          .eventimgclass .fa-pencil-blk {
              position: absolute;
              right: 4px !IMPORTANT;
              top: 54px !important;
              font-size: 12px;
              color: #45bbff;
              border: 1px solid #45bbff;
              border-radius: 30px;
              padding: 6px 7px;
              cursor: pointer;
              z-index: 999;
              background-color: #000 !IMPORTANT;
              color: #fff !important;
              border: 0px !important;
          }

          .daydetailsbox {
              padding: 15px;
              font-size: 13px;
              margin: 11px;
              box-shadow: 0px 0px 13px #e2e2e2;
              border-radius: 5px;
              position: relative;
          }

          .daydetailsbox .heading {
              font-size: 15px;
              margin-bottom: 5px;
              font-weight: 800;
          }

          .daydetailsbox .daywisedetailsdefault {
              font-size: 14px;
              color: #999999;
          }

          .daydetailsbox .fa-pencil {
              position: absolute;
              right: 10px;
              top: 10px;
              font-size: 12px;
              color: #45bbff;
              border: 1px solid #45bbff;
              border-radius: 30px;
              padding: 6px 7px;
              cursor: pointer;
              z-index: 1;
          }

          .daydetailsbox .fa-pencil:hover {
              background-color: #45bbff;
              color: #FFFFFF;
              border: 1px solid #45bbff;
          }

          .eventimgclass {
              width: 85px;
              height: 80px;
              overflow: hidden;
              border-radius: 5px;
              position: relative;
          }

          .eventimgclass img {
              width: 100%;
              height: auto;
              height: 100%;
          }

          .eventheading {
              font-size: 16px;
              font-weight: 600;
              margin-bottom: 6px;
              color: #333333;
          }

          .eventheadingtime {
              color: #627e8c;
              font-size: 12px;
              font-weight: 600;
              margin-bottom: 5px;
              position: relative;
              position: relative;
          }

          .eventcontent {
              font-size: 12px;
              color: #666666;
              line-height: 15px;
          }

          .eventsectionicon {
              position: absolute;
              left: -5px;
              top: -6px;
              background-color: #627e8c;
              color: #fff;
              width: 25px;
              height: 25px;
              text-align: center;
              border-radius: 20px;
              font-size: 12px;
              line-height: 23px;
              border: 1px solid #fff;
          }

          .eventsectioniconOrder {
              position: absolute;
              left: 50%;
              top: -12px;
              background-color: #c7d1c7a1;
              color: #71717a;
              width: 25px;
              height: 25px;
              text-align: center;
              border-radius: 20px;
              font-size: 12px;
              line-height: 23px;
              border: 1px solid #fff;
          }

          .hoteloption1 {
              background-color: #4FBDFF;
              padding: 2px 8px;
              color: #FFFFFF;
              font-weight: 600;
              display: inline-block;
              font-size: 12px;
              border-radius: 3px;
              margin-left: 5px;
          }

          .hoteloption2 {
              background-color: #04BF58;
              padding: 2px 8px;
              color: #FFFFFF;
              font-weight: 600;
              display: inline-block;
              font-size: 12px;
              border-radius: 3px;
              margin-left: 5px;
          }

          .hoteloption3 {
              background-color: #E24B03;
              padding: 2px 8px;
              color: #FFFFFF;
              font-weight: 600;
              display: inline-block;
              font-size: 12px;
              border-radius: 3px;
              margin-left: 5px;
          }

          .summaryRow {
              display: flex;
              justify-content: space-between;
              align-items: center;
              background: #f9f9f9;
              padding: 12px;
          }

          .airline {
              display: flex;
              align-items: center;
              gap: 10px;
          }

          .airline img {
              width: 50px;
          }

          .route {
              font-size: 14px;
              text-align: center;
          }

          .toggleDetails {
              cursor: pointer;
              color: #007bff;
              font-weight: bold;
          }

          .flightDetails {
              display: none;
              background: #fff;
              padding: 10px;
          }

          .detailTitle {
              font-size: 14px;
              font-weight: bold;
              margin: 10px 0;
              color: #23ae73;
          }

          .segmentRow {
              display: flex;
              gap: 12px;
              padding: 10px;
              border-top: 1px solid #eee;
              align-items: center;
          }

          .segmentRow img {
              width: 45px;
          }

          .segmentInfo small {
              color: #666;
              font-size: 12px;
          }

          .custom_flight_details .toggleDetails {
              padding: 5px 10px;
              background-color: #eaedef;
              border-radius: 5px;
              margin-left: 10px;
          }

          .custom_flight_details .toggleDetails svg {
              margin-left: 5px;
          }

          .flight_detail_flex {
              display: flex;
              flex-wrap: wrap;
              align-items: center;
              border-top: 1px solid #ddd;
              margin-top: 7px;
          }

          .flight_detail_flex .segmentRow {
              border-top: none;
          }

          .flight_detail_flex .layoverTime {
              padding: 2px 10px;
              background-color: #23ae73;
              color: #fff;
              border-radius: 30px;
              margin: 0px 10px;
          }

          .flight_detail_flex .segmentRow img {
              border-radius: 5px;
          }

          .duration_flight_info {
              font-weight: 500;
              color: #000;
          }

          .flight_detail_flex .segmentRow svg {
              vertical-align: sub
          }
      </style>
      <div style="padding: 8px 20px; border-bottom: 1px solid #ecf0f2; font-size: 18px;">

          <strong>Day {{ $day ?? '' }} - {{ $date ?? '' }} &nbsp;<i class="fa fa-long-arrow-right" aria-hidden="true"></i>&nbsp;
              delhi {{ $destinationId ?? '' }}</strong>

      </div>
      <div class="daydetailsbox">
          <div class="daywisedetailsdefault" style="cursor:pointer;" aria-hidden="true"
              onclick="loadpop('Day 1 Details',this,'600px')" data-toggle="modal" data-target=".bs-example-modal-center"
              popaction="action=editDayDetails2&amp;pid=109135&amp;d=1&amp;date=2026-04-01">
              <em>Enter Day Wise Details</em>
          </div>
          <i class="fa fa-pencil" aria-hidden="true" onclick="loadpop('Day 1 Details',this,'600px')" data-toggle="modal"
              data-target=".bs-example-modal-center"
              popaction="action=editDayDetails2&amp;pid=109135&amp;d=1&amp;date=2026-04-01"></i>
      </div>
      <div class="daydetailsbox">
          <i class="fa fa-pencil" aria-hidden="true" onclick="loadpop('Activity From 01-04-2026',this,'600px')"
              data-toggle="modal" data-target=".bs-example-modal-center"
              popaction="action=addActivity&amp;toatlPax=&amp;pid=109135&amp;d=2026-04-01&amp;id=2433355&amp;loaddestinationidload=delhi"></i>

          <table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tbody>
                  <tr>
                      <td colspan="2" align="left" valign="top">
                          <div class="eventimgclass" onclick="loadpop('Media library',this,'600px')" data-toggle="modal"
                              data-target=".bs-example-modal-center"
                              popaction="action=medialibrary&amp;afunctin=changeeventimage2333355&amp;pid=109135&amp;destinations=delhi"
                              style="cursor:pointer;"><img id="eventimage2333355"
                                  src="data:image/png;base64,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">

                              <i class="fa fa-pencil fa-pencil-blk" aria-hidden="true"
                                  onclick="loadpop('Media library',this,'600px')" data-toggle="modal"
                                  data-target=".bs-example-modal-center"
                                  popaction="action=medialibrary&amp;afunctin=changeeventimage2333355&amp;pid=109135&amp;destinations=delhi"></i>

                          </div>
                          <script>
                              function changeeventimage2333355(img) {
                                  if (img.indexOf('https://') > -1) {
                                      $('#eventimage2333355').attr('src', img);

                                  } else {
                                      $('#eventimage2333355').attr('src', 'http://localhost:8081/API/package_image/' + img);
                                  }
                                  $(".close").trigger("click");
                                  $('#ActionDiv').load('actionpage.php?pid=109135&id=2333355&action=seteventcoverphoto&imagename=' + img);
                              }
                          </script>
                      </td>
                      <td width="99%" align="left" valign="top" style="padding-left:10px;">

                          <div class="eventheading">
                              <div class="eventsectioniconOrder">0 </div>
                              <div class="eventsectionicon"><i style="" class="fa fa-picture-o"
                                      aria-hidden="true"></i></div> tesfd
                              <span style="color:#FF9900; padding-left:10px;"></span>
                          </div>
                          <div class="eventcontent"></div>
                      </td>
                  </tr>
              </tbody>
          </table>

      </div>
      <div class="daydetailsbox">
          <i class="fa fa-pencil" aria-hidden="true" onclick="loadpop('Flight From 01-04-2026',this,'600px')"
              data-toggle="modal" data-target=".bs-example-modal-center"
              popaction="action=addFlight&amp;toatlPax=&amp;pid=109135&amp;d=2026-04-01&amp;id=2433356&amp;loaddestinationidload=delhi"></i>

          <table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tbody>
                  <tr>
                      <td colspan="2" align="left" valign="top">
                          <div class="eventimgclass" onclick="loadpop('Media library',this,'600px')" data-toggle="modal"
                              data-target=".bs-example-modal-center"
                              popaction="action=medialibrary&amp;afunctin=changeeventimage2333356&amp;pid=109135&amp;destinations=delhi"
                              style="cursor:pointer;"><img id="eventimage2333356"
                                  src="data:image/png;base64,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">

                              <i class="fa fa-pencil fa-pencil-blk" aria-hidden="true"
                                  onclick="loadpop('Media library',this,'600px')" data-toggle="modal"
                                  data-target=".bs-example-modal-center"
                                  popaction="action=medialibrary&amp;afunctin=changeeventimage2333356&amp;pid=109135&amp;destinations=delhi"></i>

                          </div>
                          <script>
                              function changeeventimage2333356(img) {
                                  if (img.indexOf('https://') > -1) {
                                      $('#eventimage2333356').attr('src', img);

                                  } else {
                                      $('#eventimage2333356').attr('src', 'http://localhost:8081/API/package_image/' + img);
                                  }
                                  $(".close").trigger("click");
                                  $('#ActionDiv').load('actionpage.php?pid=109135&id=2333356&action=seteventcoverphoto&imagename=' + img);
                              }
                          </script>
                      </td>
                      <td width="99%" align="left" valign="top" style="padding-left:10px;">
                          <div class="eventheading">
                              <div class="eventsectioniconOrder">0 </div>
                              <div class="eventsectionicon"><i style="" class="fa fa-plane"
                                      aria-hidden="true"></i></div> 232 <span
                                  style="color:#FF9900; padding-left:10px;">(F12021)</span>
                              <span style="color:#FF9900; padding-left:10px;"></span>
                          </div>
                          <div style="margin-bottom:10px;">
                              <table border="0" cellpadding="0" cellspacing="0">
                                  <tbody>
                                      <tr>
                                          <td align="center" style="font-size:12px;">
                                              <div
                                                  style="font-size: 12px; border: 1px solid #ddd; padding: 6px 10px; background-color: #f9f9f9; border-radius: 4px;">
                                                  <div
                                                      style="font-size:14px; font-weight:700; color:#000; margin-bottom:3px;">
                                                      1:00 PM</div>delhi
                                              </div>
                                          </td>
                                          <td align="center" style="width:100px;">
                                              <div
                                                  style="text-align:center; font-size:11px; color:#666666;padding-bottom: 4px;">
                                                  5</div>
                                              <div
                                                  style="font-size:0px; border-top:2px solid #ddd; position:relative;">
                                                  <i class="fa fa-plane" aria-hidden="true"
                                                      style="position: absolute; font-size: 18px; transform: rotate(45deg); top: -9px; left: 40%;"></i>
                                              </div>
                                          </td>
                                          <td align="center">
                                              <div
                                                  style="font-size: 12px; border: 1px solid #ddd; padding: 6px 10px; background-color: #f9f9f9; border-radius: 4px;">
                                                  <div
                                                      style="font-size:14px; font-weight:700; color:#000; margin-bottom:3px;">
                                                      2:00 PM</div>mumbai
                                              </div>
                                          </td>
                                      </tr>
                                  </tbody>
                              </table>
                          </div>
                          <div class="eventcontent"></div>
                      </td>
                  </tr>
              </tbody>
          </table>
      </div>
      <div class="daydetailsbox">
          <i class="fa fa-pencil" aria-hidden="true" onclick="loadpop('Accommodation From 01-04-2026',this,'600px')"
              data-toggle="modal" data-target=".bs-example-modal-center"
              popaction="action=addAccommodation&amp;toatlPax=&amp;pid=109135&amp;d=2026-04-01&amp;id=2433357&amp;loaddestinationidload=delhi"></i>
          <table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tbody>
                  <tr>
                      <td colspan="2" align="left" valign="top">
                          <div class="eventimgclass" onclick="loadpop('Media library',this,'600px')"
                              data-toggle="modal" data-target=".bs-example-modal-center"
                              popaction="action=medialibrary&amp;afunctin=changeeventimage2333357&amp;pid=109135&amp;destinations=delhi"
                              style="cursor:pointer;"><img id="eventimage2333357"
                                  src="data:image/png;base64,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">

                              <i class="fa fa-pencil fa-pencil-blk" aria-hidden="true"
                                  onclick="loadpop('Media library',this,'600px')" data-toggle="modal"
                                  data-target=".bs-example-modal-center"
                                  popaction="action=medialibrary&amp;afunctin=changeeventimage2333357&amp;pid=109135&amp;destinations=delhi"></i>

                          </div>
                          <script>
                              function changeeventimage2333357(img) {
                                  if (img.indexOf('https://') > -1) {
                                      $('#eventimage2333357').attr('src', img);
                                  } else {
                                      $('#eventimage2333357').attr('src', 'http://localhost:8081/API/package_image/' + img);
                                  }
                                  $(".close").trigger("click");
                                  $('#ActionDiv').load('actionpage.php?pid=109135&id=2333357&action=seteventcoverphoto&imagename=' + img);
                              }
                          </script>
                      </td>
                      <td width="99%" align="left" valign="top" style="padding-left:10px;">
                          <div class="eventheading">
                              <div class="eventsectioniconOrder">0 </div>
                              <div class="eventsectionicon"><i style="" class="fa fa-bed"
                                      aria-hidden="true"></i></div> tesffs
                              <span style="color:#FF9900; padding-left:10px;"><i class="fa fa-star"
                                      aria-hidden="true"></i></span> <span class="hoteloption1">Option 1</span>
                          </div>
                          <div style="margin-bottom:10px;">
                              <div
                                  style="border-top:1px solid #ddd;border-bottom:1px solid #ddd; padding-top:10px; margin-bottom:10px;">
                                  <table border="0" cellpadding="0" cellspacing="0">
                                      <tbody>
                                          <tr>
                                              <td colspan="2">
                                                  <div style="margin-bottom:10px;">
                                                      <div style="margin-bottom:2px;">
                                                          Check-in</div>
                                                      <div style="margin-bottom:5px; font-weight:700;">
                                                          <i class="fa fa-calendar" aria-hidden="true"></i>
                                                          &nbsp;01 Apr 2026
                                                      </div>
                                                  </div>
                                              </td>
                                              <td>
                                                  <div style="margin-bottom:10px;">
                                                      <div style="margin-bottom:2px; padding-left:20px;">
                                                          Check-out</div>
                                                      <div
                                                          style="margin-bottom:5px;padding-left:20px; font-weight:700;">
                                                          <i class="fa fa-calendar" aria-hidden="true"></i>
                                                          &nbsp;01 Apr 2026
                                                      </div>
                                                  </div>
                                              </td>
                                              <td>
                                                  <div style="margin-bottom:10px;">
                                                      <div style="margin-bottom:2px; padding-left:20px;">
                                                          Room Type</div>
                                                      <div
                                                          style="margin-bottom:5px;padding-left:20px; font-weight:700;">
                                                          <i class="fa fa-home" aria-hidden="true"></i>
                                                          &nbsp;Room test
                                                      </div>
                                                  </div>
                                              </td>
                                          </tr>
                                      </tbody>
                                  </table>
                              </div>
                                <div style="margin-bottom:20px;"><strong>Room:
                                  </strong> 1 Double &nbsp;&nbsp;|
                                  &nbsp;&nbsp;<strong><i class="fa fa-cutlery" aria-hidden="true"></i> Meal:
                                  </strong>
                                </div>
                          </div>
                          <div class="eventcontent"></div>
                      </td>
                  </tr>
              </tbody>
          </table>
      </div>
      <script>
          $(document).ready(function() {
              $('.toggleDetails').click(function() {
                  var targetId = $(this).data('target'); // get corresponding div ID
                  var $targetDiv = $('#' + targetId);
                  // Toggle the flight details with slide effect
                  $targetDiv.slideToggle(300);
                  // Optional: toggle "open" class for styling
                  $(this).toggleClass('open');
              });
          });
      </script>
      <input id="destinationNameload" type="hidden" value="delhi">
      <input id="fromdateload" type="hidden" value="2026-04-01">
      <input id="dayloader" type="hidden" value="1">
      <input id="loadp" type="hidden" value="109135">
      <script>
          $('.itidaytab').removeClass('activedaytab');
          $('#dayid1').addClass('activedaytab');

          loadeventlibrary();
      </script>
  </div>
