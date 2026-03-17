 {{-- Reminder popup --}}
 <div id="reminderouterrightbottom" style="display: block;">
     <div style="padding:20px;">
         <table width="100%" border="0" cellpadding="0" cellspacing="0">
             <tbody>
                 <tr>
                     <td colspan="2"><img src="{{ asset('assets/images/remindertask.gif') }}" style="width:70px;"></td>
                     <td width="90%" id="loadremindertask" style="padding-left:10px;">
                         <a href="display.html?ga=query&amp;view=1&amp;id=127504&amp;c=3" style="color:#333333;">
                             <div style="font-size:10px; text-transform:uppercase; font-weight:600;">Reminder -
                                 17 Mar 2026 - 01:00 PM</div>
                             <div style="  font-weight: 600; color: #c33030; font-size: 14px; margin-bottom:8px;">
                                 test</div>
                         </a>
                         <button type="button" class="btn btn-secondary btn-lg waves-effect waves-light"
                             style="background: linear-gradient(180deg, rgb(178 41 41) 0%, rgb(200 47 47) 46%, rgb(167 21 21) 100%);"
                             onclick="loadpop('Alert',this,'600px')" data-toggle="modal"
                             data-target=".bs-example-modal-center"
                             popaction="action=confirmtask&amp;id=100339&amp;qid=127504">Confirm</button>
                     </td>
                 </tr>
             </tbody>
         </table>
     </div>
</div>

 {{-- End reminder popup --}}
{{-- <script>
    function formatDate(datetime) {

    let date = new Date(datetime);

    return date.toLocaleString('en-IN', {
        day: '2-digit',
        month: 'short',
        year: 'numeric',
        hour: '2-digit',
        minute: '2-digit',
        hour12: true
    });
}
let shownTasks = [];
setInterval(function () {
    $.ajax({
        url: "/check-reminders",
        type: "GET",
        success: function (tasks) {
            console.log("Checked reminders:", tasks);
            tasks.forEach(function (task) {
                if (!shownTasks.includes(task.id)) {
                    shownTasks.push(task.id);
                    showReminder(task);
                }
            });
        }
    });
}, 30000); // every 30 sec
function markDone(id) {

    $.ajax({
        url: "/task-done/" + id,
        type: "POST",
        data: {
            _token: "{{ csrf_token() }}"
        },
        success: function () {
            $('#reminderouterrightbottom').fadeOut();
        }
    });

}
</script> --}}
