{{-- =========================================================
    ONLINE USERS FOOTER BUTTON
========================================================= --}}

<div class="online-users-footer-btn">
    <a href="javascript:void(0)" onclick="openOnlineUsersPopup()" title="Online Users">

        <i class="fa fa-user"></i>

        <span>ONLINE USERS</span>

        <span id="footerOnlineUserCount" class="footer-online-count">
            0
        </span>
    </a>
</div>


{{-- =========================================================
    ONLINE USERS POPUP
========================================================= --}}

<div id="onlineUsersPopup" class="online-users-popup">

    {{-- Header --}}
    <div class="online-users-header">

        <span class="online-users-title">
            Online Users
        </span>

        <button type="button" class="online-users-close" onclick="closeOnlineUsersPopup()">
            &times;
        </button>

    </div>


    {{-- Table Header --}}
    <div class="online-users-table-head">

        <div>User</div>

        <div class="text-center">
            Status
        </div>

    </div>


    {{-- Dynamic Users --}}
    <div id="onlineUsersList" class="online-users-list">

        <div class="online-users-loading">
            Loading users...
        </div>

    </div>

</div>


<style>
    .online-users-footer-btn {
        position: fixed;
        bottom: 0;
        left: 0;
        height: 32px;
        background: #fff;
        border-top: 1px solid #e5e5e5;
        border-right: 1px solid #e5e5e5;
        z-index: 99998
    }

    .online-users-footer-btn a {
        height: 32px;
        display: flex;
        align-items: center;
        gap: 4px;
        padding: 0 8px;
        color: #e34718;
        text-decoration: none;
        font-size: 11px;
        font-weight: 600
    }

    .online-users-footer-btn a:hover {
        text-decoration: none;
        color: #cf3710
    }

    .online-users-footer-btn i {
        font-size: 12px
    }

    .footer-online-count {
        display: none;
        min-width: 17px;
        height: 17px;
        padding: 0 5px;
        align-items: center;
        justify-content: center;
        background: #149c29;
        color: #fff;
        font-size: 9px;
        border-radius: 15px
    }

    .online-users-popup {
        display: none;
        position: fixed;
        left: 5px;
        bottom: 32px;
        width: 300px;
        background: #fff;
        border: 1px solid #bcc6d0;
        border-left: 5px solid #154969;
        border-radius: 7px 7px 0 0;
        box-shadow: 0 3px 12px rgba(0, 0, 0, .2);
        z-index: 99999;
        overflow: hidden
    }

    .online-users-header {
        height: 38px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 9px 0 11px;
        background: #fff;
        border-bottom: 1px solid #d8dde2
    }

    .online-user-row,
    .online-users-table-head {
        display: grid;
        grid-template-columns: minmax(0, 1fr) 70px;
        align-items: center
    }

    .online-users-title {
        color: #252525;
        font-size: 12px;
        font-weight: 600
    }

    .online-users-close {
        border: 0;
        background: 0 0;
        color: #8d8d8d;
        font-size: 23px;
        font-weight: 700;
        line-height: 1;
        padding: 0;
        cursor: pointer
    }

    .online-users-close:hover {
        color: #444
    }

    .online-users-table-head {
        height: 40px;
        padding: 0 11px;
        color: #222;
        font-size: 11px;
        font-weight: 600;
        border-bottom: 1px solid #d7d7d7
    }

    .text-center {
        text-align: center
    }

    .online-users-list {
        height: 295px;
        overflow-y: auto;
        overflow-x: hidden;
        padding: 0 10px
    }

    .online-users-list::-webkit-scrollbar {
        width: 8px
    }

    .online-users-list::-webkit-scrollbar-track {
        background: #f0f0f0
    }

    .online-users-list::-webkit-scrollbar-thumb {
        background: #888;
        border-radius: 10px
    }

    .online-users-list::-webkit-scrollbar-thumb:hover {
        background: #666
    }

    .online-user-row {
        min-height: 29px;
        border-bottom: 1px solid #d8d8d8
    }

    .online-user-name {
        padding-left: 3px;
        color: #333;
        font-size: 11px;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis
    }

    .online-user-status {
        display: flex;
        align-items: center;
        justify-content: center
    }

    .online-status-dot {
        width: 12px;
        height: 12px;
        display: inline-block;
        border-radius: 50%
    }

    .online-status-dot.online {
        background: #08a11c
    }

    .online-status-dot.offline {
        background: #999
    }

    .online-users-empty,
    .online-users-error,
    .online-users-loading {
        padding: 25px 10px;
        text-align: center;
        color: #888;
        font-size: 11px
    }

    @media (max-width:400px) {
        .online-users-popup {
            width: calc(100% - 10px)
        }
    }
</style>


<script>
    /*
|--------------------------------------------------------------------------
| Popup Open
|--------------------------------------------------------------------------
*/

    function openOnlineUsersPopup() {
        const popup = document.getElementById('onlineUsersPopup');

        popup.style.display = 'block';

        loadOnlineUsers();
    }


    /*
    |--------------------------------------------------------------------------
    | Popup Close
    |--------------------------------------------------------------------------
    */

    function closeOnlineUsersPopup() {
        document.getElementById('onlineUsersPopup').style.display = 'none';
    }


    /*
    |--------------------------------------------------------------------------
    | Load Users From Laravel
    |--------------------------------------------------------------------------
    */

    function loadOnlineUsers() {
        const list = document.getElementById('onlineUsersList');

        list.innerHTML = `
        <div class="online-users-loading">
            Loading users...
        </div>
    `;


        fetch('{{ route('online-users') }}', {
                headers: {
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })

            .then(response => {

                if (!response.ok) {
                    throw new Error('Unable to load users');
                }

                return response.json();
            })

            .then(data => {

                let html = '';


                if (!data.users || data.users.length === 0) {

                    list.innerHTML = `
                <div class="online-users-empty">
                    No users found
                </div>
            `;

                    updateOnlineCount(0);

                    return;
                }


                data.users.forEach(function(user) {

                    const statusClass =
                        user.is_online ?
                        'online' :
                        'offline';


                    html += `

                <div class="online-user-row">

                    <div
                        class="online-user-name"
                        title="${escapeOnlineHtml(user.name)}"
                    >

                        ${escapeOnlineHtml(user.name)}

                    </div>


                    <div class="online-user-status">

                        <span
                            class="online-status-dot ${statusClass}"
                            title="${user.is_online ? 'Online' : 'Offline'}"
                        ></span>

                    </div>

                </div>

            `;
                });


                list.innerHTML = html;

                updateOnlineCount(data.online_count ?? 0);

            })

            .catch(error => {

                console.error(error);

                list.innerHTML = `
            <div class="online-users-error">
                Unable to load online users.
            </div>
        `;

            });
    }


    /*
    |--------------------------------------------------------------------------
    | Footer Online Count
    |--------------------------------------------------------------------------
    */

    function updateOnlineCount(count) {
        const countBox =
            document.getElementById('footerOnlineUserCount');


        countBox.innerText = count;


        if (count > 0) {

            countBox.style.display = 'inline-flex';

        } else {

            countBox.style.display = 'none';
        }
    }


    /*
    |--------------------------------------------------------------------------
    | Escape HTML
    |--------------------------------------------------------------------------
    */

    function escapeOnlineHtml(value) {
        const div = document.createElement('div');

        div.textContent = value ?? '';

        return div.innerHTML;
    }


    /*
    |--------------------------------------------------------------------------
    | Initial Online Count
    |--------------------------------------------------------------------------
    */

    document.addEventListener('DOMContentLoaded', function() {

        loadOnlineUsers();

    });


    /*
    |--------------------------------------------------------------------------
    | Auto Refresh Every 30 Seconds
    |--------------------------------------------------------------------------
    */

    setInterval(function() {

        loadOnlineUsers();

    }, 30000);
</script>
