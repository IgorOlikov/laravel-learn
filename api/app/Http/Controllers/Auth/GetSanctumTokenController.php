<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use Laravel\Sanctum\HasApiTokens;

class GetSanctumTokenController extends Controller
{
    use HasApiTokens;
    public array $user_abilities = [
        'role:user',

    ];
    public array $redactor_abilities = [
        'role:redactor',
    ];


    public function getToken(Request $request):Response
    {
        $user = $request->user();
        $user_agent = $request->userAgent();
        $user_id = $request->user()->id;
        $user_role = User::where('id','=',$user_id)->value('user_role_id');

        //sanctum token roles abilities
        if ($user_role  === 3) {
            $token = $user->createToken("user " . $user_agent, $this->user_abilities)->plainTextToken;
            return response($token, 200);
        }elseif($user_role  === 2) {
            $token = $user->createToken("redactor " . $user_agent, $this->redactor_abilities)->plainTextToken;
            return response($token, 200);
        }elseif ($user_role  === 1) {
            $token = $user->createToken("admin " . $user_agent)->plainTextToken;
            return response($token, 200);

        }
        return response('role not exist',404);
    }
}
