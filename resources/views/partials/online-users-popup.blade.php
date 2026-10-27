{{-- ONLINE USERS FOOTER BUTTON --}}
<div class="online-users-footer-btn">
    <a href="javascript:void(0)" onclick="openOnlineUsersPopup()" title="Online Users">
        <i class="fa fa-user"></i>
        <span>ONLINE USERS</span>
        <span id="footerOnlineUserCount" class="footer-online-count">
            0
        </span>
    </a>
</div>

{{-- ONLINE USERS POPUP  --}}
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

<script>
    /* Popup Open */

    function openOnlineUsersPopup() {
        const popup = document.getElementById('onlineUsersPopup');
        popup.style.display = 'block';
        loadOnlineUsers();
    }

    /* Popup Close  */
    function closeOnlineUsersPopup() {
        document.getElementById('onlineUsersPopup').style.display = 'none';
    }

    /* Load Users From Laravel */

    function loadOnlineUsers() {
        const list = document.getElementById('onlineUsersList');
        list.innerHTML = ` <div class="online-users-loading"> Loading users... </div> `;
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
                  list.innerHTML = ` <div class="online-users-empty"> No users found </div> `;
                    updateOnlineCount(0);
                    return;
                }

                data.users.forEach(function(user) {
                 const statusClass = user.is_online ? 'online' : 'offline';
                    html += `
                        <div class="online-user-row">
                        <divclass="online-user-name"title="${escapeOnlineHtml(user.name)}">
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
                list.innerHTML = ` <div class="online-users-error"> Unable to load online users. </div> `;
            });
    }

    /* Footer Online Count */

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

    /* Escape HTML */

    function escapeOnlineHtml(value) {
        const div = document.createElement('div');

        div.textContent = value ?? '';

        return div.innerHTML;
    }

    /* Initial Online Count */

    document.addEventListener('DOMContentLoaded', function() {

        loadOnlineUsers();

    });

    /* Auto Refresh Every 30 Seconds */

    setInterval(function() {

        loadOnlineUsers();

    }, 30000);
</script>
