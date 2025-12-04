<?php

namespace App\Http\Controllers\Api;

use App\Models\Purchases;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PurchasesController extends Controller
{
    public function hello()
    {
        return response()->json([
            'message' => 'Hello World'
            
        ]);
    }

    public function index()
    {
        $purchases = Purchases::all();

        return response()->json([
            'success' => true,
            'message' => 'Users successfully retrieved',
            'data' => $purchases,
            'total' => $purchases->count()        ]);
    }

    public function show(Purchases $purchases)
    {
        return response()->json([
            'success' => true,
            'message' => 'Users successfully retrieved',
            'data' => $purchases
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:1|max:100',
            'pastpurchases' => 'required|string|max:255'
        ]);

        $purchases = Purchases::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'User created',
            'data' => $purchases
        ], 201);
    
    }

    public function update(Request $request, Purchases $purchases)
    {
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'age' => 'sometimes|required|integer|min:1|max:100',
            'pastpurchases' => 'sometimes|required|string|max:255'
        ]);

        $purchases->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'User updated',
            'data' => $purchases->fresh()
        ]);
    }

    public function destroy(Purchases $purchases)
    {
        $purchases->delete();
        return response()->json([
            'success' => true,
            'message' => 'User deleted'
        ]);
    }

    public function getByPastPurchases($pastpurchases)
    {
        $purchases = Purchases::where('pastpurchases', $pastpurchases)->get();
        
        return response()->json([
            'success' => true,
            'message' => "Users who have bought {$pastpurchases} have been retrieved",
            'data' => $purchases,
            'total' => $purchases->count()
        ]);
    }

    public function deleteByName($name)
    {
        $purchases = Purchases::where('name', $name)->delete();
        return response()->json([
            'success' => true,
            'message' => 'User deleted'
        ]);
    }

    public function deleteByPastPurchases($pastpurchases)
    {
        $purchases = Purchases::where('pastpurchases', $pastpurchases)->delete();
        return response()->json([
            'success' => true,
            'message' => 'User deleted'


        ]);
    }

    public function getByName($name)
    {
        return response()->json([
            'success' => true,
            'message' => "User with the name {$name} has been retrieved",
            'data' => $purchases,
            'total' => $purchases->count()
        ]);

        
    }
}
