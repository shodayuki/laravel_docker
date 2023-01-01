<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\UserRegistPost;

class UserController extends Controller
{
    public function register(UserRegistPost $request)
    {
        $name = $request->get('name');
        $age = $request->get('age');
    }
}
