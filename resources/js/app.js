import './bootstrap';


window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: import.meta.env.VITE_PUSHER_APP_KEY,
    cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
    forceTLS: true,
    authorizer: (channel, options) => {
        return {
            authorize: (socketId, callback) => {
                fetch('/broadcasting/auth', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Accept': 'application/json',
                    },
                    body: JSON.stringify({
                        socket_id: socketId,
                        channel_name: channel.name,
                    }),
                })
                .then(response => response.json())
                .then(data => callback(false, data))
                .catch(error => callback(true, error));
            }
        };
    }
});

const userIdMeta = document.querySelector('meta[name="auth-user-id"]');

if (userIdMeta && window.Echo) {
    const userId = userIdMeta.getAttribute('content');

    window.Echo.private(`lead-notifications.${userId}`)
        .listen('.lead.notification.created', (e) => {
            if (typeof window.showLeadNotification === 'function') {
                window.showLeadNotification(e);
            }
        });
}
