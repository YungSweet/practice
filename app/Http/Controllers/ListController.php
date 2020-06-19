<?php

namespace App\Http\Controllers;

use App\Exceptions\IncorrectNameException;
use App\Listall;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ListController extends Controller
{

    public function addList(Request $request) {
       # $conn = pg_connect("host=localhost port=5432 dbname=todo user=postgres password=123456");

        $validator = Validator::make($request->all(), [
            'title' => ['required'],
        ]);

        if ($validator->fails()) {
            throw new IncorrectNameException;
        }

        $list = Listall::create($request->all());

        return response()->json($list, 201);
    }

    public function index(Request $request) {

        $count = $request->count; // получаем число для вывода списков(по умолчанию 10)
        $filterBy = $request->filter; // фильтрация по полям title, created_at, updated_at
        if ($count > 100) {
            $count = 10;
        }
        return Listall::take($count)->get()->sortBy($filterBy);
    }

    public function updList(Request $request, Listall $list) {
        $validator = Validator::make($request->all(), [
            'title' => ['required'],
        ]);

        if ($validator->fails()) {
            throw new IncorrectNameException;
        }
        $list->update($request->all());
        return response()->json($list, 200);
    }

    public function delList(Listall $list) {
        $list->delete();
        return response()->json($list, 200);
    }
}
