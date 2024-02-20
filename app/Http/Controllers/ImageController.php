<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ItemPrice;
use App\Models\Item;

use App\Models\Image;



class ImageController extends Controller
{
    public function updateImage(Request $request, Item $item)
    {
        //dd($item->id);
        $data = $request->validate([
            'src' => 'required|string',
            'description_arabic' => 'required|string',
            'description_english' => 'required|string',
        ]);
        $data['item_id'] = $item->id; // Assuming $item is the related item

    
    Image::create($data);
    
        return back();
    }
}
