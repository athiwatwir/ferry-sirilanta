<?php

namespace App\Services;

class UserService
{
    /**
     * @return array{ok: bool, user: ?array, message: ?string, code: ?string}
     */
    public function getById(int|string $userId): array
    {
        $result = app(ApiService::class)->get('/user/' . $userId, [], [
            // lookup user ต้องใช้ API key หลักของระบบ
            'X-API-KEY' => config('services.app_api.key'),
        ]);

        if (! is_array($result)) {
            return [
                'ok' => false,
                'user' => null,
                'message' => 'Unable to verify user.',
                'code' => null,
            ];
        }

        $success = $result['success'] ?? null;
        $isFailed = $success === false
            || $success === 0
            || $success === 'false'
            || ($result['code'] ?? null) === 'US-E-1001'
            || str_starts_with((string) ($result['code'] ?? ''), 'API-E-');

        if ($isFailed) {
            return [
                'ok' => false,
                'user' => null,
                'message' => $result['message'] ?? 'User not found',
                'code' => $result['code'] ?? 'US-E-1001',
            ];
        }

        $user = $result['data'] ?? null;

        if (! is_array($user) || empty($user['id'])) {
            return [
                'ok' => false,
                'user' => null,
                'message' => $result['message'] ?? 'User not found',
                'code' => $result['code'] ?? null,
            ];
        }

        return [
            'ok' => true,
            'user' => $user,
            'message' => null,
            'code' => $result['code'] ?? null,
        ];
    }
}
