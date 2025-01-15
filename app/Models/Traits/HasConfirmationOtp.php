<?php


namespace App\Models\Traits;


use App\Models\Otp;

trait HasConfirmationOtp
{
    public function generateConfirmationOtp(){
        return $this->confirmationOtp()->create([
           'otp'         => random_int(1000, 9999),
           'expired_at'  => $this->otpExpired()
        ]);
    }

    public function confirmationOtp(){
        return $this->hasOne(Otp::class);
    }

    protected function otpExpired(){
     return $this->freshTimestamp()->addMinutes(5);
     }
}
