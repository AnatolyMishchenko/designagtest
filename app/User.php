<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\HistoryResource;
use App\Http\Requests\ParrotWingsRequest;
use App\Models\History;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'balance', 'banned',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
    public function transferPW($name, $balance, $idFrom, ParrotWingsRequest $request)
    {
        $from = DB::table('users')->where('id', $idFrom)->get();
        $to = DB::table('users')->where('name', $name)->get();
        foreach ($to as $toItem) {
            $nameTo = $toItem->name;
            $balanceTo = $toItem->balance;
            foreach ($from as $fromItem) {
                $balanceFrom = $fromItem->balance;
                if ($balanceFrom > $balance) {
                    DB::table('users')->where('name', $nameTo)->update(['balance' => $balanceTo + $balance]);
                    DB::table('users')->where('id', $idFrom)->update(['balance' => $balanceFrom - $balance]);
                    $data['name'] = $request->get('name');
                    $data['how'] = $request->get('balance');
                    $data['user_id'] = $idFrom;
                    $created = History::create($data);

                    return new HistoryResource($created);
                } else {
                    
                    return response()->json(
                        [
                            'status' => 'Not enought money!',
                        ]);
                }
            }
        }
    }

}
