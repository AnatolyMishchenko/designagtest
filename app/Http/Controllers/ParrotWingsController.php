<?php

namespace App\Http\Controllers;

use App\Http\Resources\HistoryResource;
use App\Http\Requests\ParrotWingsRequest;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Models\History;

class ParrotWingsController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param ParrotWingsRequest $request
     * @return HistoryResource
     */
    public function givePW(ParrotWingsRequest $request)
    {
        $name = $request->get('name');
        $balance = $request->get('balance');
        $idFrom = Auth::user()->id;
        $user = new User;
        $user->transferPW($name, $balance, $idFrom, $request);
    }
}
