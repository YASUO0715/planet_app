<?php

namespace App\Http\Controllers;

use App\Models\Planet;
use App\Http\Requests\PlanetRequest;

class PlanetController extends Controller
{
    // showページへ移動
    public function show($id)
    {
        $planet = Planet::find($id);
        return view('planets.show', ['planet' => $planet]);
    }

    // indexページへ移動
    public function index()
    {
        // モデル名::テーブル全件取得
        $planets = Planet::all();
        // Itemsティレクトリーの中のindexページを指定し、itemsの連想配列を代入
        return view('planets.index', ['planets' => $planets]);
    }

    public function create()
    {
        return view('planets.create');
    }

    public function store(PlanetRequest $request)
    {
        // インスタンスの作成
        $planet = new Planet;
        // 値の用意
        $planet->name = $request->name;
        $planet->englishname = $request->englishname;
        $planet->radius = $request->radius;
        $planet->weight = $request->weight;

        $planet->save();
        // 登録したらindexに戻る
        return redirect('/planets');
    }

    public function edit($id)
    {
        $planet = Planet::find($id);
        return view('planets.edit', ['planet' => $planet]);
    }

    public function update(PlanetRequest $request, $id)
    {
        // ここはidで探して持ってくる以外はstoreと同じ
        $planet = Planet::find($id);

        // 値の用意
        $planet->name = $request->name;
        $planet->englishname = $request->englishname;
        $planet->radius= $request->radius;
        $planet->weight = $request->weight;

        // 保存
        $planet->save();

        // 登録したらindexに戻る
        return redirect('/planets');
    }

    public function destroy($id)
    {
        $planet = Planet::find($id);
        $planet->delete();

        return redirect('/planets');
    }
}
