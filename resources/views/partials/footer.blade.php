{{-- <div style="height:30px;"></div> --}}
<div class="footerstripboxouter">
    <div class="leftar">
        <a style="cursor:pointer;" title="Online Users" onclick="openfooterpop2('onlineusers','Online Users',this,'online_user','300px','400px','10px','531px');">
            <i class="fa fa-user" aria-hidden="true"></i> &nbsp;<span>Online Users</span>
        </a>
    </div>
    <div class="righar">
        <a style="cursor:pointer;" onclick="openfooterpop('footernotebook','Notebook',this,'user_notebook','374px','488px','0px','531px');" title="Notebook">
            <i class="fa fa-sticky-note-o" aria-hidden="true"></i> &nbsp;<span>Notebook</span></a>
        <a style="cursor:pointer;" onclick="openfooterpop('footernotebook','Updates',this,'user_news_updates','500px','600px','96px','531px');" title="Notebook">
            <i class="fa fa-bullhorn" aria-hidden="true"></i> &nbsp;<span>Updates</span>
        </a>
        <a style="cursor:pointer;" href="display.html?ga=&amp;nighttheme=2" title="Night Theme"><i class="fa fa-moon-o" aria-hidden="true"></i> &nbsp;<span>Night Theme Off</span></a>
    </div>
</div>

@include('followups.task-reminder')
