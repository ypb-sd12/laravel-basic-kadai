<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;

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
        // return view('posts.index');


        $posts = DB::table('posts')->get();

        return view('posts.index', compact('posts'));
    }

    public function show($id) {
        $post = Post::find($id);
        return view('posts.show', compact('post'));
    }

    public function create() {
        return view('posts.create');
    }

    public function store(Request $request) {
        // バリデーションを設定する
        $request->validate([
            'title' => 'required|max:20',
            'content' => 'required|max:200'
        ]);
        // フォームの入力内容をもとに、テーブルにデータを追加する
        $post = new Post();
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->save();

        // リダイレクトさせる
        return redirect("/posts");
    }
}
