<?php

namespace App\Http\Controllers;

use App\Http\Requests\HistoryRequest;
use App\Http\Resources\HistoryResource;
use App\Models\History;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Http\Resources\Json\ResourceCollection;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return ResourceCollection
     */
    public function index()
    {
        $history = History::all();

        return HistoryResource::collection($history);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return HistoryResource
     */
    public function show($id)
    {
        $history = History::findOrFail($id);

        return new HistoryResource($history);
    }

    public function edit($id)
    {
        $history = History::findOrFail($id);

        return response()->json($history);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param HistoryRequest $request
     * @param  int $id
     * @return HistoryResource
     */
    public function update(HistoryRequest $request, $id)
    {
        $data = $request->all();
        $history = History::findOrFail($id);
        $name = $history->name;
        $how = $history->how;
        $howUp = $request->get('how');
        $userId = $history->user_id;
        $from = DB::table('users')->where('id', $userId)->get();
        $to = DB::table('users')->where('name', $name)->get();
        foreach ($to as $toItem) {
            $nameTo = $toItem->name;
            $balanceTo = $toItem->balance;
            foreach ($from as $fromItem) {
                $balanceFrom = $fromItem->balance;
                if ($balanceFrom > $howUp) {
                    DB::table('users')->where('name', $nameTo)->update(['balance' => $balanceTo - $how + $howUp]);
                    DB::table('users')->where('id', $userId)->update(['balance' => $balanceFrom + $how - $howUp]);
                    $history->update($data);

                    return new HistoryResource($history);
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
