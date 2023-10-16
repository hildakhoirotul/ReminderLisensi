<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Push Notification</title>
    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
</head>
<body>
  <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm m-0">
        <a href="{{ route('home') }}" class="navbar-brand">Push Notification</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item {{ request()->is('/') ? 'active':'' }}">
                    <a href="{{ route('home') }}" class="nav-link">Home <span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>
    
    <div class="container mt-4">
        <h3>Pusher</h3>
        <p>This page is for showing what sender page has sent. it will removed when you reload page (temporary)</p>
        <div id="notification" class="list-group">

        </div>
    </div>
    
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="https://js.pusher.com/5.1/pusher.min.js"></script>
    
    <script>
        var notificationWrapper = $('#notification');
        // Enable pusher logging - don't include this in production
        // Pusher.logToConsole = true;
        var pusher = new Pusher('db9136b21d42ca21e6a0', {
          cluster: 'ap1',
          forceTLS: false
        });
        // Subscribe to the channel we specified in our Laravel Event
        var channel = pusher.subscribe('notification');
        // Bind a function to a Event (the full Laravel class)
        channel.bind('App\\Events\\ReminderNotification', function(data){
            var existingNotification = notificationWrapper.html();
            var newNotificationHtml = `
            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">`+data.name+`</h5>
                </div>
                <p class="mb-1">`+data.message+`</p>
            </a>
            `;
            notificationWrapper.html(newNotificationHtml + existingNotification);
            notificationWrapper.fadeIn('slow');
        });
    </script>
</body>
</html>