<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Warehouse;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class WarehouseController extends Controller
{
    public function return_json($code = 200, $data = null, $error = null, $message = '')
    {
        return response()->json([
            'code' => $code,
            'message' => $message,
            'data' => $data,
            'error' => $error
        ], $code);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'key' => ['min:4', 'max:255'],
            'limit' => ['numeric']
        ]);

        if ($validator->fails()) {
            return $this->return_json(400, null, $validator->errors(), 'Validation failed');
        }

        $warehouses = Warehouse::where('name', 'like', '%'.$request->key.'%')->with('products');

        if (isset($pagination_size)) {
            $warehouses = $warehouses->paginate($request->limit);
        } else {
            $warehouses = $warehouses->get();
        }

        return $this->return_json(200, $warehouses, null, 'OK');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:5',
            'address' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->return_json(400, null, $validator->messages(), 'Validation failed');
        }

        $warehouse = new Warehouse();
        $warehouse->name = $request->name;
        $warehouse->address = $request->address;
        $warehouse->save();

        return $this->return_json(200, $warehouse, null, 'Warehouse created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        try {
            $warehouse = Warehouse::where('id', $id)->with('products')->get();
            return $this->return_json(200, $warehouse, null, "OK");
        } catch (ModelNotFoundException $e) {
            return $this->return_json(404, null, $e->getMessage(), "Warehouse doesn't exist.");
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:5',
            'address' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->return_json(400, null, $validator->messages(), 'Validation failed');
        }

        try {
            $warehouse = Warehouse::findOrFail($id);
            $warehouse->name = $request->name;
            $warehouse->address = $request->address;
            $warehouse->save();

            return $this->return_json(200, $warehouse, null, 'Warehouse updated');
        } catch (ModelNotFoundException $e) {
            return $this->return_json(400, null, $e->getMessage(), "Warehouse doesn't exist.");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        try {
            $warehouse = Warehouse::findOrFail($id);
            $warehouse->delete();

            return $this->return_json(200, null, null, 'Warehouse deleted');
        } catch (ModelNotFoundException $e) {
            return $this->return_json(400, null, $e->getMessage(), "Warehouse doesn't exist.");
        }
    }
}
