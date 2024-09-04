<?php
namespace App\Http\Controllers\admin\payment;

use Illuminate\Http\Request;
use App\Http\Controllers\admin\Controller;
use App\Payment as PaymentModel;
use View, Validator, File;

class Payment extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index(Request $request)
    {
        if ($this->data['route-paramters']['status'] == "request")
            return View::make('admin.payment.request')->with('data', $this->data);
        else
            return View::make('admin.payment.payment')->with('data', $this->data);
    }
    public function listing(Request $request)
    {
        $jtStartIndex = $_REQUEST['jtStartIndex'];
        $jtPageSize = $_REQUEST['jtPageSize'];
        $query = PaymentModel::query();
        $query->join('course', 'course.id', '=', 'payment.course_id');
        if (!empty($_REQUEST['jtSorting']) && $_REQUEST['jtSorting'] != "undefined") {
            $jtSorting = explode(' ', $_REQUEST['jtSorting']);
            $query = $query->orderBy($jtSorting[0], $jtSorting[1]);
        }
        $query->whereIn('payment.status', ['payment', 'bankcheck']);
        $query->orderBy('payment.created_at', 'DESC');
        $dataCount = $query->count();
        $query->limit($jtPageSize)->offset($jtStartIndex);
        $query->select('payment.*', 'course.title as course');
        $data = $query->get();
        $this->response['Result'] = "OK";
        $this->response['TotalRecordCount'] = $dataCount;
        $this->response['Records'] = $data;
        return json_encode($this->response);
    }

    public function delete(Request $request)
    {
        $record = PaymentModel::where('id', $request->id)
            ->first();
        if ($record->delete()) {
            $this->response['Result'] = "OK";
            return json_encode($this->response);
        }
    }
}
