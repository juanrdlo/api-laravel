<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\RouteResource;
use App\Models\Route;
use App\Models\RouterModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RoutesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return RouteResource::collection(Route::paginate(5));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'id' => 'required',
            'driver_id' => 'required',
            'notes' => 'required',
            'date' => 'required',
        ]);

        if ($validated->fails()) {
            return response()->json([
                'message' => 'Validation errors',
                'errors' => $validated->errors(),
            ], 422);
        } else {
            $query = collect(Route::where('id', $request->post('id'))->get());

            if ($query->count() > 0) {
                return response()->json([
                   'message' => 'Route with the same ID already exists',
                    'route' => new RouteResource(Route::where('id', Route::latest('id')->first()->id)->first()),
                ], 409);
            } else {
                Route::create([
                    'id' => $request->post('id'),
                    'driverId' => $request->post('driver_id'),
                    'notes' => $request->post('notes'),
                    'date' => $request->post('date'),
                ]);

                return response()->json([
                   'message' => 'Route created successfully',
                    'route' => new RouteResource(Route::where('id', Route::latest('id')->first()->id)->first()),
                ], 201);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return RouteResource::collection(Route::where('id', $id)->get());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return array
     */
    public function update(Request $request, $id)
    {
        $validated = Validator::make($request->all(), [
            'driver_id' => 'required',
            'notes' => 'required',
            'date' => 'required',
        ]);

        if ($validated->fails()) {
            return response()->json([
                'message' => 'Validation errors',
                'errors' => $validated->errors(),
            ], 422);
        } else {
            Route::where('id', $id)->update([
                'driverId' => $request->post('driver_id'),
                'notes' => $request->post('notes'),
                'date' => $request->post('date'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

            return response()->json([
                'message' => 'Route updated successfully',
                'route' => new RouteResource(Route::find($id)),
            ], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
