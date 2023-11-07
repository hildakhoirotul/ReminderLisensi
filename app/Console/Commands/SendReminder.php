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
            foreach ($licenses as $license) {
                // event(new ReminderEvent($license->nama_dokumen));
                try {
                    foreach ($emails as $email) {
                        Mail::to($email)->send(new ReminderMail($email, $license));
                    }
                } catch (\Exception $e) {
                    report($e);
                    $this->info('Gagal mengirim email');
                }
                // Notifikasi yang muncul di halaman notifikasi
                Notifikasi::create([
                    'nama_dokumen' => $license->nama_dokumen,
                    'start' => $license->start,
                    'end' => $license->end,
                    'read' => 0,
                ]);

            }
        }
    }
}
