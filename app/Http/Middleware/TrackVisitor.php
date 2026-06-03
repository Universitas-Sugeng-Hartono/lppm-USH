<?php
// app/Http/Middleware/TrackVisitor.php

namespace App\Http\Middleware;

use Closure;
use App\Models\Visitor;
use Illuminate\Http\Request;

class TrackVisitor
{
    public function handle(Request $request, Closure $next)
    {
        // Mendapatkan informasi browser dari User-Agent
        $userAgent = $request->server('HTTP_USER_AGENT');
        $browser = $this->getBrowser($userAgent);

        // Simpan data pengunjung
        Visitor::updateOrCreate(
            ['ip' => $request->ip()],
            [
                'visited_at' => now(),
                'browser' => $browser,
                'coordinates' => $this->getCoordinatesFromIp($request->ip()) // Implementasikan method ini
            ]
        );

        return $next($request);
    }

    private function getBrowser($userAgent)
    {
        // Cek beberapa browser populer
        if (strpos($userAgent, 'Firefox') !== false) {
            return 'Firefox';
        } elseif (strpos($userAgent, 'Chrome') !== false) {
            return 'Chrome';
        } elseif (strpos($userAgent, 'Safari') !== false) {
            return 'Safari';
        } elseif (strpos($userAgent, 'Opera') !== false) {
            return 'Opera';
        } elseif (strpos($userAgent, 'MSIE') !== false || strpos($userAgent, 'Trident') !== false) {
            return 'Internet Explorer';
        }

        return 'Unknown';
    }

    private function getCoordinatesFromIp($ip)
    {
        // Implementasi untuk mendapatkan koordinat dari IP (misalnya menggunakan API eksternal)
        return null; // Placeholder
    }
}
