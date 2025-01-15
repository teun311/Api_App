<?php

namespace App\Observers;

use App\Models\Otp;
use function PHPUnit\Logging\JUnit\testAsString;

class OtpObserver
{
    /**
     * Handle the Otp "created" event.
     */
    public function created(Otp $otp): void
    {
        dd('created');
    }

    /**
     * Handle the Otp "updated" event.
     */
    public function updated(Otp $otp): void
    {
        //
    }

    /**
     * Handle the Otp "deleted" event.
     */
    public function deleted(Otp $otp): void
    {
        //
    }

    /**
     * Handle the Otp "restored" event.
     */
    public function restored(Otp $otp): void
    {
        //
    }

    /**
     * Handle the Otp "force deleted" event.
     */
    public function forceDeleted(Otp $otp): void
    {
        //
    }
}
