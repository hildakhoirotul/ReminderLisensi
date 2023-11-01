const notifier = require('node-notifier');

const notification = {
    title: 'Notifikasi anda',
    message: 'Ini adalah pesan notifikasi.',
};

notifier.notify(notification);

notifier.on('click', function (notifierObject, options) {
    console.log('Notifikasi diklik.');
});

notifier.on('close', function (notifierObject, options) {
    console.log('Notifikasi ditutup.');
});