<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ApiService
{
    protected $baseUrl;
    protected $apiKey;

    public function __construct()
    {
        $this->baseUrl = config('services.app_api.url');
        $this->apiKey = session('api_key') ?: config('services.app_api.key');
    }

    public function get($endpoint, $params = [], $headers = [])
    {
        $response = Http::withHeaders(array_merge([
            'X-API-KEY' => $this->apiKey,
            'Accept'    => 'application/json',
        ], $headers))->get($this->baseUrl . $endpoint, $params);

        return $this->handleResponse($response);
    }

    public function post($endpoint, $data = [], $headers = [])
    {
        $response = Http::withHeaders(array_merge([
            'X-API-KEY' => $this->apiKey,
            'Accept'    => 'application/json',
        ], $headers))->post($this->baseUrl . $endpoint, $data);

        return $this->handleResponse($response);
    }

    protected function handleResponse($response)
    {
        // คืน JSON แม้เป็น error เพื่อให้ service ชั้นบนจัดการเอง
        // ไม่ throw เพื่อไม่ให้หน้าเว็บล้มทั้งหน้าเมื่อ API ภายนอกล่ม
        $json = $response->json();

        if (is_array($json)) {
            return $json;
        }

        if ($response->serverError()) {
            return [
                'success' => false,
                'message' => 'API server error. Please try again later.',
                'code' => 'API-E-500',
                'status' => $response->status(),
            ];
        }

        return [
            'success' => false,
            'message' => 'Unable to reach API.',
            'code' => 'API-E-000',
            'status' => $response->status(),
        ];
    }
}
