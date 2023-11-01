<?php

namespace App\Console\Commands;

use App\Events\ReminderEvent;
use App\Jobs\SendPushNotification;
use App\Mail\ReminderMail;
use Illuminate\Console\Command;
use App\Models\Lisensi;
use App\Models\Notifikasi;
use App\Models\User;
use App\Notifications\PushNotification;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class SendReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:license-reminders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send license reminders';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $emails = User::pluck('email')->all();
        $licenses = Lisensi::where(function ($query) {
            $query->where('reminder1', now()->format('Y-m-d'))
                ->orWhere('reminder2', now()->format('Y-m-d'))
                ->orWhere('reminder3', now()->format('Y-m-d'));
        })->get();

        if ($licenses->count() > 0) {
            // Notifikasi yang muncul di desktop
            // $firebaseToken = User::whereNotNull('device_token')->pluck('device_token')->all();
            // $SERVER_API_KEY = 'AAAA4ETAcyY:APA91bF2667ab6Sk4pHcdnP7xS6To_-v51baOvMN2gl6YoxUqLn9TSmblyzVJaMrS2oKvfTrwz52TM3EeMeMwbXcxV-M-8X8opjSesIX00Qm7-Lvp_cySTnMRWQ__eAJ9v8kMsiRBVfR';

            foreach ($licenses as $license) {
                $notificationData = [
                    'message' => 'Ini adalah pesan notifikasi.'
                ];
                // Notification::send($user, new PushNotification($notificationData));
                event(new ReminderEvent($notificationData));

                // $result = shell_exec('node notifier.js');
                // Log::info('SKrip Node.js dijalankan: ' . $result);
                //     $data = [
                //         "registration_ids" => $firebaseToken,
                //         "notification" => [
                //             "title" => "License Reminder",
                //             "body" => "Lisensi {$license->nama_dokumen} akan segera berakhir masa waktunya.",
                //         ],
                //         "data" => [
                //             "click_action" => "http://127.0.0.1:8000/notifications"
                //         ]
                //     ];
                //     $dataString = json_encode($data);

                //     $headers = [
                //         'Authorization: key=' . $SERVER_API_KEY,
                //         'Content-Type: application/json',
                //     ];

                //     $ch = curl_init();

                //     curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
                //     curl_setopt($ch, CURLOPT_POST, true);
                //     curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                //     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                //     curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

                //     $response = curl_exec($ch);
                // Notifikasi yang muncul di email
                // if (!empty($firebaseToken)) {
                // try {
                //     foreach ($emails as $email) {
                //         Mail::to($email)->send(new ReminderMail($email, $license));
                //     }
                // } catch (\Exception $e) {
                //     report($e);
                //     $this->info('Gagal mengirim email');
                // }
                // Notifikasi yang muncul di halaman notifikasi
                // Notifikasi::create([
                //     'nama_dokumen' => $license->nama_dokumen,
                //     'start' => $license->start,
                //     'end' => $license->end,
                //     'read' => 0,
                // ]);

            }
            // }
        }
    }
}
