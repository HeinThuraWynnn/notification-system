// Assuming you have the user's ID available
let userId = document.head.querySelector('meta[name="user-id"]').content;

Echo.private(`notifications.${userId}`)
    .listen('NotificationSent', (e) => {
        console.log('New Notification:', e.notification);
        // Update your frontend with the new notification
    });
