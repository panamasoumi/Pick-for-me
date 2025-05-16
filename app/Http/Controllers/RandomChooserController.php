<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RandomChooserController extends Controller
{
    public function choose(Request $request)
    {
        $validated = $request->validate([
            'option1' => 'required|string',
            'option2' => 'required|string',
        ]);

        $result = rand(0, 1) ? $validated['option1'] : $validated['option2'];

        return response()->json(['result' => $result]);
    }
}
