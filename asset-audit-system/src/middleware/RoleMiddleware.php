<?php

namespace App\Middleware;

use App\Models\User;

class RoleMiddleware
{
    public function handle($request, $next, $roles)
    {
        $user = $_SESSION['user'] ?? null;

        if (!$user || !in_array($user->role, (array) $roles)) {
            http_response_code(403);
            echo json_encode(['error' => 'Access denied']);
            exit;
        }

        return $next($request);
    }
}