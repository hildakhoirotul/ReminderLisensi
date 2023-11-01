<?php

namespace App\Jobs;

use App\Models\User;
use App\Notifications\PushNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Notification;

class SendPushNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $notificationData;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($notificationData)
    {
        $this->notificationData = $notificationData;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $users = User::all();

        foreach ($users as $user) {
            Notification::send($user, new PushNotification($this->notificationData));
        }
    }
}
