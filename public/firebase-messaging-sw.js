/*
Give the service worker access to Firebase Messaging.
Note that you can only use Firebase Messaging here, other Firebase libraries are not available in the service worker.
*/
importScripts('https://www.gstatic.com/firebasejs/7.23.0/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/7.23.0/firebase-messaging.js');

/*
Initialize the Firebase app in the service worker by passing in the messagingSenderId.
* New configuration for app@pulseservice.com
*/
firebase.initializeApp({
    apiKey: "AIzaSyCBdAE9wpP_a-SZXQFVECwG5mG8tjzkj3A",
    authDomain: "reminder-9c0db.firebaseapp.com",
    databaseURL: "https://reminder-9c0db-default-rtdb.firebaseio.com",
    projectId: "reminder-9c0db",
    storageBucket: "reminder-9c0db.appspot.com",
    messagingSenderId: "963226137382",
    appId: "1:963226137382:web:5db0be89b7c0f84f3547e7",
    measurementId: "G-6QDMHQ9WS7"
});

/*
Retrieve an instance of Firebase Messaging so that it can handle background messages.
*/
const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function (payload) {
    console.log(
        "[firebase-messaging-sw.js] Received background message ",
        payload,
    );
    const data = payload.data;
    const clickAction = data.click_action;
    /* Customize notification here */
    const notificationTitle = "Background Message Title";
    const notificationOptions = {
        body: "Background Message body.",
        icon: "/itwonders-web-logo.png",
    };

    return self.registration.showNotification(
        notificationTitle,
        notificationOptions
    ).then(function () {
        self.addEventListener('notificationclick', function (event) {
            event.notification.close();
            event.waitUntil(
                clients.openWindow(clickAction)
            );
        });
    });
});