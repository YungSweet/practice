<?php

namespace App\Http\Controllers;
use App\Exceptions\IncorrectNameException;
use App\Todolist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CaseController extends Controller
{
    public function addCase(Request $request) {
        $validator = Validator::make($request->all(), [
            'list_id' => ['required'],
            'title' => ['required'],
            'description' => ['required'],
            'urgency' => ['min:1|max:5', 'required'],
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }
        $case = Todolist::create($request->except('done'));
        return response()->json($case, 201);
    }

    public function index() {
        $cases = Todolist::all();
        $done = 0;
        $notdone = 0;
        foreach ($cases as $case) {

            if ($case->done == true) {
                echo $case->title;
                echo " | сделано \n";
                $done++;
            } else {
                echo $case->title;
                echo " | не сделано \n";
                $notdone++;
            }
        }
        echo "Законченных дел - " . $done . " \n";
        echo "Незаконченных дел - " . $notdone . " \n";
    }

    public function updCase(Request $request, Todolist $case) {
        $case->update($request->all());
        return response()->json($case, 200);
    }

    public function markDone(Todolist $case) {
        $case->done = true;
        $case->save();
        return response()->json($case, 200);
    }

    public function delCase(Todolist $case) {
        $case->delete();
        return response()->json($case, 200);
    }
}
