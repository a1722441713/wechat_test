<?php

namespace App\Http\Controllers\Reply;

use App\Http\Controllers\Controller;
use App\Models\NovelModel;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function LinkStore(Request $request){;
        $title = $request->get('title');
        $link = $request->get('link');
        NovelModel::create([
            'title' => $title,
            'link' => $link
        ]);
        return 1;
    }
}
