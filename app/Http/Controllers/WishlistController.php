<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use App\Models\Wishlist;          
use App\Models\Product; 

class WishlistController extends Controller
{
    //
    public function toggle(Request $request)
    {
        try {
            $userId = Auth::id();
            $productId = $request->input('product_id');

            if (!$userId || !$productId) {
                return response()->json(['success' => false, 'message' => 'Invalid input data.'], 400);
            }

            $wishlistItem = Wishlist::where('user_id', $userId)
                ->where('product_id', $productId)
                ->first();

            if ($wishlistItem) {
                $wishlistItem->delete();
                return response()->json(['success' => true, 'message' => 'Product removed from wishlist.']);
            } else {
                Wishlist::create([
                    'user_id' => $userId,
                    'product_id' => $productId,
                ]);
                return response()->json(['success' => true, 'message' => 'Product added to wishlist.']);
            }
        } catch (\Exception $e) {
            \Log::error('Error toggling wishlist: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'An error occurred. Please try again.'], 500);
        }
    }

    public function wishlist()
    {
        $userId = Auth::id();
        $wishlistItems = Wishlist::with('product')->where('user_id', $userId)->get();

        return view('account.wishlist', compact('wishlistItems'));
    }

}
