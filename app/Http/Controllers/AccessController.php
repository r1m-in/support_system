<?php

namespace App\Http\Controllers;

use App\Models\AccessRequest;
use App\Services\CoreEngine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Exception;
use App\Enums\AccessStatus;
use Illuminate\Support\Facades\Auth;

class AccessController extends Controller
{
   // Admin
   public function requested_access(Request $request)
   {

      if ($request->takeAction) {
         if ($request->takeAction == 'accepted') {
            $requestAccess = AccessRequest::where('id', $request->access_id)->first();

            $url = 'https://api.pikbike.com/user/support/authorize';
            $apiKey = 'PIK_PT2fGnrMJe63CyaK6EBr9zgvCWvd4Jec';
            $apiEncipt = 'dovStLCbAAX6nOk9';

            $payloadData = [
               'owner_id' => $requestAccess->owner_uid,
               'staff_id' => $requestAccess->user->id,
            ];

            $encryptedPayload = $this->encryptPayload($payloadData, $apiEncipt);

            $headers = [
               'device_type' => 'web',
               'Content-Type' => 'application/json',
            ];

            $response = Http::withHeaders($headers)->post(
               $url,
               [
                  'api_key' => $apiKey,
                  'payload' => $encryptedPayload
               ]
            );

            if ($response->status() == 201 && isset($response['code'])) {
               AccessRequest::where('id', $request->access_id)->update([
                  'access_key' => $response['code'],
                  'admin_note' => $request->admin_note,
                  'expiry' => $request->expiry,
                  'status' => AccessStatus::ACCEPTED
               ]);
               return redirect()->route('requested_access')->with('success', 'Access Acepted Successfully');
            }
            return redirect()->route('requested_access')->with('error', 'Something went wrong Error Code: ' . $response->status());
         } else {
            AccessRequest::where('id', $request->access_id)->update([
               'admin_note' => $request->admin_note,
               'expiry' => $request->expiry,
               'status' => AccessStatus::REJECTED
            ]);
            return redirect()->route('requested_access')->with('error', 'Access Rejected Successfully');
         }
      }

      $data['accessRequests'] = AccessRequest::latest()->paginate(12);
      return view('requested_access', $data);
   }

   // Admin
   public function access_owner_panel(string $uid)
   {
      $url = 'https://api.pikbike.com/user/support/authorize';
      $apiKey = 'PIK_PT2fGnrMJe63CyaK6EBr9zgvCWvd4Jec';
      $apiEncipt = 'dovStLCbAAX6nOk9';

      $payloadData = [
         'owner_id' => $uid,
         'staff_id' => 'Admin',
      ];

      $encryptedPayload = $this->encryptPayload($payloadData, $apiEncipt);

      $headers = [
         'device_type' => 'web',
         'Content-Type' => 'application/json',
      ];

      $response = Http::withHeaders($headers)->post(
         $url,
         [
            'api_key' => $apiKey,
            'payload' => $encryptedPayload
         ]
      );

      if ($response->status() == 201 && isset($response['code'])) {
         $accessCode = $response['code'];
         return redirect()->to('https://owner.pikbike.com/?auth_code=' . $accessCode);
      } else {
         echo 'Error';
      }
   }


   public function access_requested(Request $request)
   {
      $data['accessRequests'] = AccessRequest::latest()->where('user_id', Auth::user()->id)->paginate(12);
      return view('access_requested', $data);
   }

   function encryptPayload(array $data, string $key): string
   {
      $plaintext = json_encode($data);
      $tag = '';

      // Standard IV length for AES-GCM is 12 bytes
      $iv = openssl_random_pseudo_bytes(12);

      // Derive 32-byte key for AES-256-GCM if key length is not 32 bytes
      $key32 = strlen($key) === 32 ? $key : hash('sha256', $key, true);

      $ciphertext = openssl_encrypt(
         $plaintext,
         'aes-256-gcm',
         $key32,
         OPENSSL_RAW_DATA,
         $iv,
         $tag
      );

      if ($ciphertext === false) {
         throw new Exception('Encryption failed: ' . openssl_error_string());
      }

      // Combine binary: IV (12 bytes) + Ciphertext + Auth Tag (16 bytes)
      $combined = $iv . $ciphertext . $tag;

      return base64_encode($combined);
   }

   function decryptPayload(string $base64Payload, string $key): ?string
   {
      $data = base64_decode($base64Payload);

      // Standard GCM parameters: 12-byte IV (nonce) and 16-byte Auth Tag
      $ivLength = 12;
      $tagLength = 16;

      $iv = substr($data, 0, $ivLength);
      $tag = substr($data, -$tagLength);
      $ciphertext = substr($data, $ivLength, -$tagLength);

      // 1. Try AES-256-GCM with SHA-256 derived 32-byte binary key
      $key32 = hash('sha256', $key, true);
      $decrypted = openssl_decrypt($ciphertext, 'aes-256-gcm', $key32, OPENSSL_RAW_DATA, $iv, $tag);
      if ($decrypted !== false) {
         return $decrypted;
      }

      // 2. Try AES-128-GCM with the raw 16-byte key
      $decrypted = openssl_decrypt($ciphertext, 'aes-128-gcm', $key, OPENSSL_RAW_DATA, $iv, $tag);
      if ($decrypted !== false) {
         return $decrypted;
      }

      // 3. Try with 16-byte IV (if legacy 16-byte IV was used)
      $iv16 = substr($data, 0, 16);
      $cipher16 = substr($data, 16, -$tagLength);

      $decrypted = openssl_decrypt($cipher16, 'aes-256-gcm', $key32, OPENSSL_RAW_DATA, $iv16, $tag);
      if ($decrypted !== false) {
         return $decrypted;
      }

      $decrypted = openssl_decrypt($cipher16, 'aes-128-gcm', $key, OPENSSL_RAW_DATA, $iv16, $tag);
      if ($decrypted !== false) {
         return $decrypted;
      }

      return null;
   }
}
