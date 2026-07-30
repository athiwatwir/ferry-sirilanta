<?php

namespace App\Services;

class AgentService
{
    /**
     * @return array{ok: bool, agent: ?array, message: ?string}
     */
    public function getByPublicKey(string $publicKey): array
    {
        $result = app(ApiService::class)->get('/agent/info', [
            'public_key' => $publicKey,
        ], [
            // ใช้ API key หลักของระบบตอน lookup — ยังไม่มี key ของ agent
            'X-API-KEY' => config('services.app_api.key'),
        ]);

        if (! is_array($result)) {
            return [
                'ok' => false,
                'agent' => null,
                'message' => 'Unable to verify agent.',
            ];
        }

        if (($result['success'] ?? true) === false) {
            return [
                'ok' => false,
                'agent' => null,
                'message' => $result['message'] ?? 'Agent not found',
            ];
        }

        $agent = $result['data'] ?? $result;

        if (! is_array($agent) || empty($agent['id'])) {
            return [
                'ok' => false,
                'agent' => null,
                'message' => $result['message'] ?? 'Agent not found',
            ];
        }

        return [
            'ok' => true,
            'agent' => $agent,
            'message' => null,
        ];
    }
}
