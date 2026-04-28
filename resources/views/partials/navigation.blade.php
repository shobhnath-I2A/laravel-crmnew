<div id="tograypanelmenu">
    <div class="logonavitop">
        <a href="/" class="topmainlogomain">
            <img src="{{asset('assets/images/profilepic/16942404066793789211693635606.jpg')}}">
        </a>
        <a class="topmainlogomainmobile" onclick="$('#navigation').toggle();">
            <i class="fa fa-bars"aria-hidden="true"></i>
        </a>
    </div>
    <div id="searchblk"></div>
    <div class="headersearchbarouter">
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tbody>
                <tr>
                    <td colspan="2">
                        <select name="topsearchtype" id="topsearchtype" onchange="topsearchstart();">
                            <option value="All">All</option>
                            <option value="Queries">Queries</option>
                            <option value="Itineraries">Itineraries</option>
                            <option value="Clients">Clients</option>
                        </select>
                    </td>
                    <td width="90%">
                        <input type="text" name="topsearchkeyword" id="topsearchkeyword" placeholder="Search" style="border-left:1px solid #ddd;" onfocus="opensearch();" onkeyup="topsearchstart();">
                    </td>
                </tr>
            </tbody>
        </table>
        <i class="fa fa-search" aria-hidden="true"></i>
        <div id="topsearchresult"></div>
    </div>
    <script>
        function opensearch() {
            $('#searchblk').show();
            $('.headersearchbarouter').addClass('searchstart');
            $('html').css('overflow', 'hidden');
        }

        function topsearchstart() {
            var topsearchtype = encodeURI($('#topsearchtype').val());
            var topsearchkeyword = encodeURI($('#topsearchkeyword').val());
            $('#topsearchresult').load('topsearchresult.php?keyword=' + topsearchkeyword + '&topsearchtype=' +
                topsearchtype);
        }
        $("#searchblk").click(function() {
            $('#searchblk').hide();
            $('.headersearchbarouter').removeClass('searchstart');
            $('html').css('overflow', 'visible');
        });
    </script>
    <div class="navirightlink" id="welcomename">
        <div class="welcomename" title="User Menu" onclick="$('.prifilemenuouter').show();">
            <div class="inside"><i class="fa fa-user" aria-hidden="true"></i></div>
        </div>
        <div class="prifilemenuouter" id="clickbox" style="display: none;">
            <div class="inside">
                <div class="content" style="border-bottom:2px solid #2d2f31;">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                        <tbody>
                            <tr>
                                <td colspan="2" align="center" valign="top">
                                    <div class="buddyouter">
                                        <div class="buddyimg"><i class="fa fa-user" aria-hidden="true"></i></div>
                                    </div>
                                </td>
                                <td width="80%" align="left" valign="middle">
                                    <div style="font-size:16px; font-weight:600;">{{ Auth::user()->name ?? 'User' }} </div>
                                    <div style="margin-bottom:0px; font-size:12px; font-weight:400; color:#adadad;">
                                        Email: <strong> {{ Auth::user()->email??'' }}</strong></div>
                                    <div style="margin-bottom:0px; font-size:12px; font-weight:400; color:#adadad;">
                                        <strong> {{ Auth::user()->last_login_at
                                        ? \Carbon\Carbon::parse(Auth::user()->last_login_at)->format('d/m/Y - h:i A')
                                        : 'First Login' }}
                                        </strong>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="content" style="border-bottom:2px solid #2d2f31; text-align:center;">
                    <div class="workinghoursstrip" style="background-color: transparent; color: #adadad; padding: 0px;">
                        <i class="fa fa-clock-o" aria-hidden="true"></i> Today's Working Hours: <span id="showcurrentworkinghours"> 02:19</span>
                    </div>
                </div>
                <script>
                    function openalerttaskremincer() {
                        $('#loadremindertask').load('loadremindertask.php');
                    }

                    function showcurrentworkinghours() {
                        openalerttaskremincer();
                        $('#showcurrentworkinghours').load('todaysworkinghours.php');
                    }
                </script>
                <div class="content" style="border-bottom:2px solid #2d2f31; text-align:center;">
                    <a href="display.html?ga=myprofile">
                        <div class="buttonprofile" style="margin-top:5px;"><i class="fa fa-user" aria-hidden="true"></i>
                            &nbsp; &nbsp; Manage Your Profile</div>
                    </a>
                    <a href="display.html?ga=mailsetting">
                        <div class="buttonprofile" style="margin-bottom:5px;"><i class="fa fa-envelope"
                                aria-hidden="true"></i> &nbsp; &nbsp;Mail Setting</div>
                    </a>
                </div>
                <div class="content" style="border-bottom:2px solid #2d2f31; text-align:center;">
                    <div style="text-align: left; padding: 0px 5px; line-height: 22px; font-size: 12px; color: #adadad;">
                        Total Remaining <strong>-545 Days</strong><br>
                        Expiry Date: <strong>08-09-2024</strong></div>
                </div>
            </div>
           <div class="content">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="buttonprofile" style="border: 0; margin: 0; background: none;">
                        <i class="fa fa-sign-out"></i> &nbsp; Logout of my account
                    </button>
                </form>
            </div>
            <a href="#" target="_blank" style="color:#adadad;">
                <div class="content" style="border-top: 1px solid #adadad26; text-align:center; font-size:12px;">
                    <i class="fa fa-question-circle" aria-hidden="true"></i> &nbsp;System Support
                </div>
            </a>
        </div>
    </div>
    <script>
        window.addEventListener('click', function(e) {
            if (document.getElementById('welcomename').contains(e.target)) {
                $('#clickbox').show();
            } else {
                $('#clickbox').hide();
            }
        });
    </script>
    <div class="rightmenu">
        <a title="Create New" style="display:none;"
            onclick="openusermenu();$('.usermenu').hide();$('.createnewmenu').show();$('.createnotification').hide();$('.workinghoursstrip').hide();$('.headerslideright').addClass('width480');"><i
                class="fa fa-plus-circle" aria-hidden="true"></i></a>
        <a href="{{ route('settings.index') }}" title="" style="position:relative; padding-top: 5px; padding-right:0px;"
            data-toggle="tooltip" data-placement="bottom" data-original-title="Setting"><svg
                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="19px"
                height="19px" viewBox="0 0 14 14" version="1.1">
                <svg class="unified360-icon unified360-valign" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20">
                    <g data-name="Layer 2">
                        <path
                            d="M16.9 12.81a.73.73 0 0 1 .71-.42 2.39 2.39 0 1 0 0-4.78h-.14a.7.7 0 0 1-.59-.33 1.09 1.09 0 0 0-.05-.17.71.71 0 0 1 .17-.81 2.33 2.33 0 0 0 .7-1.69 2.38 2.38 0 0 0-.7-1.69 2.43 2.43 0 0 0-3.42 0 .7.7 0 0 1-.78.14.73.73 0 0 1-.42-.71 2.39 2.39 0 0 0-4.78 0v.14a.7.7 0 0 1-.33.59H7.1A.71.71 0 0 1 6.3 3a2.45 2.45 0 0 0-3.38 0 2.38 2.38 0 0 0-.7 1.69A2.43 2.43 0 0 0 3 6.41a.76.76 0 0 1-.57 1.27 2.39 2.39 0 0 0 0 4.78h.14a.7.7 0 0 1 .64.43.71.71 0 0 1-.21.81 2.33 2.33 0 0 0-.7 1.69 2.38 2.38 0 0 0 .7 1.69 2.43 2.43 0 0 0 3.42 0 .76.76 0 0 1 1.27.57 2.39 2.39 0 0 0 4.78 0v-.14a.68.68 0 0 1 .43-.64.71.71 0 0 1 .81.18 2.45 2.45 0 0 0 3.38 0 2.38 2.38 0 0 0 .7-1.69 2.43 2.43 0 0 0-.79-1.77.69.69 0 0 1-.14-.77zm-1.28-.55a2.1 2.1 0 0 0 .47 2.36 1 1 0 0 1 .29.7 1 1 0 0 1-.29.7 1 1 0 0 1-1.46 0 2.05 2.05 0 0 0-2.3-.42 2.08 2.08 0 0 0-1.27 1.92v.14a1 1 0 0 1-1 1 1 1 0 0 1-1-1.08 2.06 2.06 0 0 0-1.33-1.9 2 2 0 0 0-.84-.18 2.2 2.2 0 0 0-1.53.65 1 1 0 0 1-1.4 0 1 1 0 0 1-.29-.7 1.05 1.05 0 0 1 .33-.82 2.07 2.07 0 0 0 .43-2.3 2.11 2.11 0 0 0-1.93-1.27h-.11a1 1 0 0 1-1-1 1 1 0 0 1 1.08-1 2.06 2.06 0 0 0 1.9-1.33 2.11 2.11 0 0 0-.47-2.37 1 1 0 0 1-.29-.7 1 1 0 0 1 .3-.66 1 1 0 0 1 1.46 0 2.08 2.08 0 0 0 2.17.48.66.66 0 0 0 .2-.06A2.09 2.09 0 0 0 9 2.53v-.14a1 1 0 0 1 1-1 1 1 0 0 1 1 1.07 2.08 2.08 0 0 0 1.26 1.91 2.11 2.11 0 0 0 2.37-.47 1 1 0 0 1 1.4 0 1 1 0 0 1 .29.7 1.05 1.05 0 0 1-.34.76 2.08 2.08 0 0 0-.48 2.17.66.66 0 0 0 .06.2A2.09 2.09 0 0 0 17.47 9h.14a1 1 0 0 1 1 1 1 1 0 0 1-1.07 1 2.07 2.07 0 0 0-1.92 1.26z">
                        </path>
                        <path
                            d="M10 7.11A2.89 2.89 0 1 0 12.89 10 2.9 2.9 0 0 0 10 7.11zm0 4.38A1.49 1.49 0 1 1 11.49 10 1.49 1.49 0 0 1 10 11.49z">
                        </path>
                    </g>
                </svg>
            </svg>
        </a>
        <a href="#" title="" style="position:relative; padding-top: 6px;" data-toggle="tooltip"
            data-placement="bottom" data-original-title="Notification"
            onclick="openusermenu();$('.usermenu').hide();$('.createnewmenu').hide();$('.createnotification').show();$('#loadnotificationscreate').load('loadnotificationscreate.php');"><i
                class="fa fa-bell-o" aria-hidden="true"></i>
            <div class="topnotifications" style="display: block;">3</div>
        </a>
<a style="position:relative; display:inline-block;">
    <i class="fa fa-bell-o" aria-hidden="true"></i>
    <span id="notificationBadge"
          style="position:absolute;right:2px;background:red;color:#fff;border-radius:50%;padding:2px 6px;font-size:11px;min-width:18px;text-align:center;">
        0
    </span>
</a>
<audio id="leadNotificationSound" preload="auto">
    <source src="{{ asset('assets/sounds/notification.mp3') }}" type="audio/mpeg">
</audio>

<div id="notificationContainer" class="notification-container"></div>

<style>
.notification-container{
    position: fixed;
    right: 20px;
    bottom: 20px;
    width: 320px;
    z-index: 999999;
}
.notification-toast{
    background: #ffeaea;
    border-radius: 12px;
    padding: 14px;
    margin-top: 12px;
    box-shadow: 0 8px 22px rgba(0,0,0,0.12);
    display: flex;
    align-items: flex-start;
    gap: 10px;
    border-left: 4px solid #f1b81a;
}
.notification-toast .icon{
    font-size: 28px;
    line-height: 1;
}
.notification-toast .content{
    flex: 1;
}
.notification-toast .title{
    font-size: 12px;
    color: #555;
    margin-bottom: 5px;
}
.notification-toast .message{
    font-size: 14px;
    font-weight: 700;
    color: #d94b4b;
    line-height: 1.4;
}
.notification-toast .close{
    cursor: pointer;
    font-size: 16px;
    color: #666;
    margin-left: 8px;
}
</style>
        <a href="display.html?ga=company-expense" title=""
            style="position:relative; padding-top: 5px; padding-right:0px;" data-toggle="tooltip"
            data-placement="bottom" data-original-title="Company Expense"><svg xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink" width="19px" height="19px" viewBox="0 0 14 14"
                version="1.1">
                <g id="icon-sales-activity" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <rect id="Rectangle" fill-opacity="0.01" fill="#FFFFFF" opacity="0.01" x="0" y="0" width="14" height="14"></rect>
                    <g id="icon-group" class="unified360-valignimg" transform="translate(1.000000, 0.000000)" stroke="#000000">
                        <g id="Group-25-Copy" transform="translate(0.500000, 0.500000)">
                            <path d="M8.12797546,0.8125 L10.2916667,0.8125 C10.5908209,0.8125 10.8333333,1.05501243 10.8333333,1.35416667 L10.8333333,12.4583333 C10.8333333,12.7574876 10.5908209,13 10.2916667,13 L0.541666667,13 C0.242512427,13 0,12.7574876 0,12.4583333 L0,1.35416667 C0,1.05501243 0.242512427,0.8125 0.541666667,0.8125 L0.541666667,0.8125 L2.69438171,0.8125"
                                id="Rectangle-4"></path>
                            <rect id="Rectangle-8" stroke-linecap="round" stroke-linejoin="round" x="2.70833333" y="0" width="5.41666667" height="1.625"></rect>
                            <path d="M1.89583333,5.42914206 L2.52198813,6.04041802 C2.54309154,6.06101997 2.57677825,6.06101997 2.59788166,6.04041802 L3.79166667,4.875" id="Path-2" stroke-linecap="round"></path>
                            <path d="M1.89583333,9.22080872 L2.52198813,9.83208469 C2.54309154,9.85268664 2.57677825,9.85268664 2.59788166,9.83208469 L3.79166667,8.66666667"
                                id="Path-2" stroke-linecap="round"></path>
                            <line x1="5.81063139" y1="5.28125" x2="8.80208333" y2="5.28125" id="Line-7"stroke-linecap="round" stroke-linejoin="round"></line>
                            <line x1="5.81063139" y1="9.07291667" x2="8.80208333" y2="9.07291667" id="Line-7" stroke-linecap="round" stroke-linejoin="round"></line>
                        </g>
                    </g>
                </g>
            </svg>
        </a>
    </div>
</div>

