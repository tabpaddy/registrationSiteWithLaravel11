<?php

namespace App\Jobs;

use App\Mail\Otpmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendNewOtpMailJob implements ShouldQueue
{
    use Queueable, Dispatchable,InteractsWithQueue, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public array $incoming)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //
        Mail::to($this->incoming['email'])->send(new Otpmail(['email' => $this->incoming['email'], 'otp' => $this->incoming['otp']]));
    }
}
