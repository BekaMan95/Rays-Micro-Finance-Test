<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CityCreateRequest;
use App\Http\Requests\CityUpdateRequest;

class CityController extends Controller
{
    //
    private $file = 'store.json'; 
    
    private function loadCities() { 
        $path = storage_path($this->file); 
        
        if (!file_exists($path)) { 
            return []; 
        }
        
        return json_decode(file_get_contents($path), true); 
    }

    private function findOrFail(string $id) {
        $store = $this->loadCities();

        foreach($store as $item) {
            if ($item['id'] === $id) {
                return $item;
            }
        }
        
        return;
    }
    
    private function saveCities($cities) { 
        file_put_contents(storage_path($this->file), json_encode($cities)); 
    }
    
    public function create(CityCreateRequest $request) {
        $data = $request->validated();

        if ($this->findOrFail($data['id'])) {
            return response()->json([
                "message" => "City ID must be unique!",
                "success" => false
            ], 400);
        }

        $store = $this->loadCities();
        $store[] = $data;
        $this->saveCities($store);
        
        return response()->json([
            "data" => $data,
            "message" => "City added.",
            "success" => true
        ]);
    }

    public function get(Request $request) {
        $store = $this->loadCities();

        if ($request['id']) {
            $data = $this->findOrFail($request['id']);

            if ($data) {
                return response()->json([
                    "data" => $data,
                    "message" => "City retrieved.",
                    "success" => true
                ]);
            }

            return response()->json([
                "message" => "City not found!",
                "success" => false
            ], 404);
        }

        return response()->json([
            "data" => $store,
            "message" => "Cities retrieved.",
            "success" => true
        ]);
    }

    public function update(CityUpdateRequest $request) {
        $data = $request->validated();
        $index = "";
        $store = $this->loadCities();

        foreach($store as $key => $city) {
            if ($city['id'] == $request['id']) {
                $index = $key;
                break;
            }
        }

        if ($index == "") {
            return response()->json([
                "message" => "City not found!",
                "success" => false
            ], 404);
        }

        foreach($store[$index] as $key => $value) {
            if ($key == 'id') continue;
            $store[$index][$key] = (array_key_exists($key, $data)) ? $data[$key] : $store[$index][$key];
        }

        $this->saveCities($store);

        return response()->json([
            "data" => $store[$index],
            "message" => "City updated.",
            "success" => true
        ]);
    }

    public function delete(Request $request) {
        $data = $this->findOrFail($request['id']);

        if (!$data) {
            return response()->json([
                "message" => "City not found!",
                "success" => false
            ], 404);
        }

        $store = $this->loadCities();
        
        foreach ($store as $index => $city) {
            if ($city['id'] === $request['id']) {
                unset($store[$index]);
            }
        }

        $this->saveCities($store);

        return response()->json([
            "data" => $data,
            "message" => "City deleted.",
            "success" => true
        ]);
    }
}
