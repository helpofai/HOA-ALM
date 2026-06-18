<?php

namespace App\Features\SecurityEngine\Actions;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class SecurityEngineCryptoAction
{
    /**
     * Encrypt a payload array into a secure string token.
     */
    public function encryptPayload(array $payload): string
    {
        // Embed a timestamp for potential expiration checks
        $payload['_timestamp'] = now()->timestamp;
        
        return Crypt::encryptString(json_encode($payload));
    }

    /**
     * Decrypt a token back into an array.
     * Returns null if tampering is detected.
     */
    public function decryptPayload(string $token): ?array
    {
        try {
            $decrypted = Crypt::decryptString($token);
            $payload = json_decode($decrypted, true);
            
            // Basic validity check: must be array and have our timestamp signature
            if (is_array($payload) && isset($payload['_timestamp'])) {
                return $payload;
            }
            
            return null;
        } catch (DecryptException $e) {
            // Tampering detected, token invalid, or wrong APP_KEY
            return null;
        }
    }
}
