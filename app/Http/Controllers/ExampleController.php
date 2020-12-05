<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class ExampleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function getDataBuku() {

        $data = Buku::get();

        return $data;
    }

    public function getDetailBuku($id) {

        $data = Buku::find($id);

        if (!$data) {
            return \response($this->setErrorResult('Data tidak ditemukan'), 404);
        }

        return $data;
    }
    
    public function insertDataBuku(Request $request) {

        $result = Buku::create($request->all());

        return !$result ? \response()->json($this->setErrorResult(), 400) 
            : \response()->json($this->setSuccessResult([], 'Success create new data'), 201);
    }

    public function updateDataBuku($id, Request $request) {

        $result = Buku::find($id)->update($request->all());

        return !$result ? \response()->json($this->setErrorResult(), 400) 
            : \response()->json($this->setSuccessResult([], 'Success update data'), 200);
    } 

    public function deleteDataBuku($id) {

        $result = Buku::find($id)->delete();

        return !$result ? \response()->json($this->setErrorResult(), 400) 
            : \response()->json($this->setSuccessResult([], 'Success delete data'), 200);
    }

    public function setSuccessResult($data = [], $message = '') {
        return [
            'status' => 'OK',
            'message' => $message,
            'data' => $data
        ];
    }

    public function setErrorResult($message = 'Something went wrong...') {
        return [
            'status' => 'ERROR',
            'message' => $message
        ];
    }
}
