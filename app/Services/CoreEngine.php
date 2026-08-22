<?php

namespace App\Services;

use Exception;

class CoreEngine
{

    protected string $key;

    public function __construct()
    {
        $this->key = 'dovStLCbAAX6nOk9';
    }

    public function encrypt(array $data): string
    {
        // Standard IV length for AES-GCM is 12 bytes (96 bits)
        $iv = openssl_random_pseudo_bytes(12);
        $tag = '';
        $plaintext = json_encode($data);

        // Standard JWE header matching your doc sample
        $header = json_encode(['alg' => 'dir', 'enc' => 'A256GCM']);
        $encodedHeader = $this->base64UrlEncode($header);

        // AES-256-GCM encryption with authenticated data (AAD)
        $ciphertext = openssl_encrypt(
            $plaintext,
            'aes-256-gcm',
            $this->key,
            OPENSSL_RAW_DATA,
            $iv,
            $tag,
            $encodedHeader
        );

        if ($ciphertext === false) {
            throw new Exception('Payload encryption failed: ' . openssl_error_string());
        }

        // Compact JWE representation: <header>.<encrypted_key>.<iv>.<ciphertext>.<tag>
        return implode('.', [
            $encodedHeader,
            '', // empty encrypted_key when alg is 'dir'
            $this->base64UrlEncode($iv),
            $this->base64UrlEncode($ciphertext),
            $this->base64UrlEncode($tag),
        ]);
    }

    /**
     * URL-safe Base64 encoding.
     */
    protected function base64UrlEncode(string $data): string
    {
        return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
    }
}
