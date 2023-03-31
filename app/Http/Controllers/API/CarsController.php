<?php

namespace App\Http\Controllers\API;

use App\Models\Car;
use Illuminate\Http\Request;
use App\Http\Resources\CarResource;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $search = $request->q;
        $cars = Car::where('brand', 'LIKE', "%$search%")
            ->orWhere('name', 'LIKE', "%$search%")
            ->orWhere('color', 'LIKE', "%$search%")
            ->orWhere('year', 'LIKE', "%$search%")
            ->orWhere('price_hvat', 'LIKE', "%$search%")
            ->orWhere('price_vat', 'LIKE', "%$search%")
            ->orWhere('description', 'LIKE', "%$search%")
            ->orWhere('is_active', 'LIKE', "%$search%")
            ->paginate(10);
        //$cars = Car::all();
        //$cars = Car::first();
        //$cars = Car::where('is_active', false)->get();
        /* $cars = Car::where(
            [
                ['is_active', '=', true],
                ['price_hvat', '>', 10000],
            ]
        )->first(); */
        return CarResource::collection($cars);
        //return response()->json($cars);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $input = $request->all();

        $validator = Validator::make($input, [
            'brand' => 'required',
            'name' => 'required|min:3',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $car = Car::create($input);
        //$car = Car::create($request->all());
        return response()->json($car);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        //$car = Car::find($id);
        return response()->json($car);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car)
    {
        try {
            $input = $request->all();
            $validator = Validator::make($input, [
                'brand' => 'required',
                'name' => 'required|min:3',
            ]);
            if($validator->fails()){
                return response()->json($validator->errors());
            }


            $car->update($request->all());
            return response()->json($car);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
        finally {
            return response()->json('finally');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        $car->delete();
        return response()->json('Car deleted');
    }

    public function restore($id)
    {
        $car = Car::withTrashed()->find($id);
        $car->restore();
        return response()->json('Car restored');
    }
    
}
