<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// ルーティングを設定するコントローラーを宣言する
use App\Http\Controllers\HelloController;

class PostController extends Controller
{
    public function index() {

        // ここをindexからposts.indexに変更したら治ったが、なぜなのか全然理解してない-------------------

        // InvalidArgumentException
        // PHP 8.2.12
        // 10.48.29
        // View [index] not found.
        // index was not found.

        // Are you sure the view exists and is a .blade.php file?

        // return view('index');
        return view('posts.index');
    }
}
