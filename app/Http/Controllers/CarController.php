<?php

namespace App\Http\Controllers;

use App\Car;
use Illuminate\Http\Request;
use App\Http\Resources\Car as CarResource;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CarResource::collection(Car::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $car = new Car;
        $car->brand = $request->input('brand');
        $car->model = $request->input('model');
        $car->year = $request->input('year');
        $car->price = $request->input('price');
        $car->description = $request->input('description');
        $car->sold = $request->input('sold');

        $car->save();
        
        return $car;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new CarResource(Car::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $car = Car::find($id);

        $car->brand = $request->input('brand');
        $car->model = $request->input('model');
        $car->year = $request->input('year');
        $car->price = $request->input('price');
        $car->description = $request->input('description');
        $car->sold = $request->input('sold');

        $car->save();

        return $car;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $car = Car::find($id);
        
        $car->delete();

        return $car;
    }
}
