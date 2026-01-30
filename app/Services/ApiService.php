<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ApiService
{
    protected $baseUrl = 'https://recruitment.fastprint.co.id/tes/api_tes_programmer';

    public function fetchProducts()
    {
        // First, get cookies via a GET request (hint: CEK RESPONSE, HEADER, COOKIES)
        $initialResponse = Http::get($this->baseUrl);
        $cookies = $initialResponse->cookies()->toArray();

        $cookieJar = [];
        foreach ($cookies as $cookie) {
            if (isset($cookie['Name']) && isset($cookie['Value'])) {
                $cookieJar[$cookie['Name']] = $cookie['Value'];
            }
        }

        $username = $this->generateUsername();
        $password = $this->generatePassword();

        try {
            $response = Http::asForm()
                ->withCookies($cookieJar, 'recruitment.fastprint.co.id')
                ->post($this->baseUrl, [
                    'username' => $username,
                    'password' => $password,
                ]);

            if ($response->successful() && !str_contains($response->body(), 'tidak sesuai')) {
                return $response->json();
            }

            Log::error('API Request Failed:', [
                'username' => $username,
                'status' => $response->status(),
                'body' => $response->body(),
            ]);

            return null;
        } catch (\Exception $e) {
            Log::error('API Exception:', ['message' => $e->getMessage()]);
            return null;
        }
    }

    protected function generateUsername()
    {
        // Example: tesprogrammer300126C21
        // format: tesprogrammer + ddmmyy + C + hour (24h)
        $date = now()->format('dmy');
        $hour = now()->format('H');
        return "tesprogrammer{$date}C{$hour}";
    }

    protected function generatePassword()
    {
        // format: bisacoding-tanggal-bulan-tahun_2_digit
        // Example logic: bisacoding-12-20-21 (note: 20 can be month, 21 can be year)
        // Usually: bisacoding-d-m-y
        $date = now()->format('d-m-y');
        return md5("bisacoding-{$date}");
    }
}
