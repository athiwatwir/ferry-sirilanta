<?php

namespace App\Http\Controllers;

use App\Services\AgentService;
use App\Services\UserService;

class HomeController extends Controller
{
    public function index()
    {
        $aff_id = request()->get('aff'); // user_id
        $publicKey = request()->get('ap');

        session()->forget('api_key');
        session()->forget('agent');
        session()->forget('aff_id');
        session()->forget('referral');
        session()->forget('booking');
        session()->forget('booking_routes');

        if ($aff_id) {
            $result = app(UserService::class)->getById($aff_id);

            if (! $result['ok']) {
                return view('pages.home.agent-not-found', [
                    'title' => 'User not found',
                    'message' => $result['message'] ?? 'User not found',
                    'code' => $result['code'] ?? null,
                ]);
            }

            $user = $result['user'];
            $aff_id = $user['id'];

            // เข้าผ่าน aff ไม่ใช้ api_key ของ agent จากลิงก์ ap เดิม
            session()->forget('api_key');
            session()->forget('agent');

            session()->put('aff_id', $aff_id);

            session()->put('referral', [
                'source' => 'aff',
                'aff_id' => $user['id'],
                'name' => $user['name'] ?? null,
                'agent_id' => $user['agent_id'] ?? null,
                'sales_partner_id' => $user['sales_partner_id'] ?? null,
                'agent_name' => $user['agent']['name'] ?? null,
                'sales_partner_name' => $user['sales_partner']['name'] ?? null,
            ]);
        }

        if ($publicKey) {
            $result = app(AgentService::class)->getByPublicKey($publicKey);
            //dd($result);
            if (! $result['ok']) {
                return view('pages.home.agent-not-found', [
                    'title' => 'Agent not found',
                    'message' => $result['message'] ?? 'Agent not found',
                ]);
            }

            $agent = $result['agent'];

            $apiKey = $agent['api_agent']['api_key'] ?? null;


            session()->put('agent', [
                'id' => $agent['id'],
                'name' => $agent['name'] ?? null,
            ]);

            if ($apiKey) {
                session()->put('api_key', $apiKey);
            }
        }

        if (! $aff_id && session()->has('aff_id')) {
            $aff_id = session()->get('aff_id');
        }

        return view('pages.home.index', compact('aff_id'));
    }
}
