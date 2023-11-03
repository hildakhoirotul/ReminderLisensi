const express = require('express');
const app = express();
const notifier = require('node-notifier');

app.use(express.json());
fetch('http://localhost:3000/api/posts/')
.then(response => response.json())
.then(data => {
    notifier.notify({
    title: 'Reminder 1',
    message: data,
})})
app.post('http://localhost:3000/api/posts/store', (req, res) => {
    sendDesktopNotif(req.body.message);
    res.status(200).send('Notification sent');
})

function sendDesktopNotif(message) {
    notifier.notify({
        title: 'Reminder',
        message: message,
        timeout: 5
    });
}

setInterval(() => {
    const message = 'Ini adalah pesan notifikasi';
    sendDesktopNotif(message);
}, 10 * 60 * 1000);
// const notification = {
//     title: 'Notifikasi anda',
//     message: 'Ini adalah pesan notifikasi.',
// };

// notifier.notify(notification);

// notifier.on('click', function (notifierObject, options) {
//     console.log('Notifikasi diklik.');
// });

// notifier.on('close', function (notifierObject, options) {
//     console.log('Notifikasi ditutup.');
// });