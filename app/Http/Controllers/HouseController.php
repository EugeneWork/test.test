<?php

namespace App\Http\Controllers;

use App\Models\House;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class HouseController extends Controller
{
    public function __construct(protected House $houseModel)
    {
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function search(Request $request): JsonResponse
    {
        $houses = $this->houseModel;
        if ($request->get('name')) {
            $houses = $houses->where('name', 'LIKE', '%' . $request->get('name') . '%');
        }
        if ($request->get('bedrooms')) {
            $houses = $houses->where('bedrooms', $request->get('bedrooms'));
        }
        if ($request->get('bathrooms')) {
            $houses = $houses->where('bathrooms', $request->get('bathrooms'));
        }
        if ($request->get('storeys')) {
            $houses = $houses->where('storeys', $request->get('storeys'));
        }
        if ($request->get('garages')) {
            $houses = $houses->where('garages', $request->get('garages'));
        }
        if ($request->get('start_price') && $request->get('end_price')) {
            $houses = $houses->whereBetween('price',
                [$request->get('start_price'), $request->get('end_price')]);
        }
        return response()->json(['houses' => $houses->get()], 200);
    }
}
