function setBadgeCount(count) {
    const badge = document.getElementById('notificationBadge');
    if (!badge) return;
    badge.innerText = count > 0 ? count : 0;
}

function increaseBadgeCount() {
    const badge = document.getElementById('notificationBadge');
    if (!badge) return;
    const current = parseInt(badge.innerText || '0', 10);
    badge.innerText = current + 1;
}

function decreaseBadgeCount() {
    const badge = document.getElementById('notificationBadge');
    if (!badge) return;
    const current = parseInt(badge.innerText || '0', 10);
    badge.innerText = Math.max(0, current - 1);
}

function showLeadNotification(data, increaseCount = true) {
    const container = document.getElementById('notificationContainer');
    const audio = document.getElementById('leadNotificationSound');

    if (!container) return;

    const box = document.createElement('div');
    box.className = 'notification-toast';
    box.innerHTML = `
        <div class="icon">🔔</div>
        <div class="content">
            <div class="title">${data.title} - ${formatDateTime(data.created_at)}</div>
            <div class="message">${data.message}</div>
        </div>
        <div class="close" onclick="markNotificationRead(${data.id}, this.parentNode)">×</div>
    `;

    container.prepend(box);

    try {
        audio.play();
    } catch (e) {
        console.log('Audio blocked until user interacts once.');
    }

    increaseBadgeCount();
}
function formatDateTime(dateString) {
    const date = new Date(dateString);

    return date.toLocaleString('en-IN', {
        day: '2-digit',
        month: 'short',
        year: 'numeric',
        hour: '2-digit',
        minute: '2-digit',
        hour12: true
    });
}

function markNotificationRead(id, element = null) {
    fetch(`/notifications/${id}/mark-read`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({is_read: 1})
    })
    .then(res => res.json())
    .then(() => {
        if (element) {
            element.remove();
        }
        decreaseBadgeCount();
    })
    .catch(err => console.error(err));
}

function loadUnreadCount() {
    fetch('/notifications/unread-count', {
        headers: {
            'Accept': 'application/json'
        }
    })
    .then(res => res.json())
    .then(data => setBadgeCount(data.count || 0))
    .catch(err => console.error(err));
}

document.addEventListener('DOMContentLoaded', function () {
    loadUnreadCount();
  loadUnreadNotifications();
    const userId = document.querySelector('meta[name="auth-user-id"]')?.getAttribute('content');
    if (!userId) return;

    window.Pusher = Pusher;

    window.Echo = new Echo({
        broadcaster: 'pusher',
        key: window.PUSHER_APP_KEY,
        cluster: window.PUSHER_APP_CLUSTER,
        forceTLS: true,
        authEndpoint: '/broadcasting/auth',
        auth: {
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        }
    });

    window.Echo.private('lead-notifications.' + userId)
    .listen('.lead.notification.created', function (e) {
        // console.log('Received:', e);
        showLeadNotification(e);
    });


function loadUnreadNotifications() {
    fetch('/notifications/latest', {
        headers: { 'Accept': 'application/json' }
    })
    .then(res => res.json())
    .then(res => {
        const items = res.data || []; // ✅ FIX

        items.forEach(item => {
            showLeadNotification({
                id: item.id,
                title: item.title,
                message: item.message,
                created_at: item.created_at
            }, false);
        });
    })
    .catch(err => console.error(err));
}

});
