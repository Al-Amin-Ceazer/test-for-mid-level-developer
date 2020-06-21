<?php

namespace App\Http\Controllers;

use App\Buyer;
use App\Record;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function secondBuyerNoEloquent()
    {
        $buyer = DB::select(DB::raw(" SELECT buyer_table.* FROM
                             ( SELECT buyers.*,
                                   dt.total_diary,
                                   et.total_eraser,
                                   pt.total_pen,
                                   ( Coalesce(pt.total_pen, 0)
                                     + Coalesce(et.total_eraser, 0)
                                     + Coalesce(dt.total_diary, 0) ) AS total_item
                            FROM   `buyers`
                                   LEFT JOIN (SELECT buyer_id,
                                                     Sum(amount) AS total_diary
                                              FROM   `diary_taken`
                                              GROUP  BY buyer_id) dt
                                          ON dt.buyer_id = buyers.id
                                   LEFT JOIN (SELECT buyer_id,
                                                     Sum(amount) AS total_eraser
                                              FROM   `eraser_taken`
                                              GROUP  BY buyer_id) et
                                          ON et.buyer_id = buyers.id
                                   LEFT JOIN (SELECT buyer_id,
                                                     Sum(amount) AS total_pen
                                              FROM   `pen_taken`
                                              GROUP  BY buyer_id) pt
                                          ON pt.buyer_id = buyers.id
                            ORDER  BY total_item DESC LIMIT 2) AS buyer_table ORDER BY total_item LIMIT 1"))[0];

        return view('buyer',compact('buyer'));
    }

    public function purchaseListEloquent()
    {
        $buyers = Buyer::all()->sortBy(function($data)
        {
            return $data->total_item;
        });

        return view('purchase-list', compact('buyers'));
    }

    public function purchaseListNoEloquent()
    {
        $buyers = DB::select(DB::raw("SELECT buyers.*, dt.total_diary, et.total_eraser, pt.total_pen, (COALESCE(pt.total_pen,0) + COALESCE(et.total_eraser,0) + COALESCE(dt.total_diary,0)) as total_item FROM `buyers`
                LEFT JOIN
                    (SELECT buyer_id,SUM(amount) AS total_diary FROM `diary_taken` GROUP BY buyer_id) dt
                    ON dt.buyer_id = buyers.id
                LEFT JOIN
                    (SELECT buyer_id,SUM(amount) AS total_eraser FROM `eraser_taken` GROUP BY buyer_id) et
                    ON et.buyer_id = buyers.id
                LEFT JOIN
                    (SELECT buyer_id,SUM(amount) AS total_pen FROM `pen_taken` GROUP BY buyer_id) pt
                    ON pt.buyer_id = buyers.id
                ORDER BY total_item") );

        //dd($buyers);
        return view('purchase-list', compact('buyers'));
    }

    public function recordTransfer()
    {
        $jsonData = File::get(storage_path('app\public\records1.json'));
        $jsonData = json_decode($jsonData);
        $records = $jsonData->RECORDS;
        //dd($records);

        $data = [];

        foreach ($records as $record) {
            $data[] = [
                'id' => $record->id,
                'from_statement' => $record->from_statement,
                'financial_instrument_code' => $record->financial_instrument_code,
                'action' => $record->action,
                'entry_price' => $record->entry_price,
                'closed_price' => $record->closed_price,
                'take_profit_1' => $record->take_profit_1,
                'stop_loss_1' => $record->stop_loss_1,
                'signal_result' => $record->signal_result,
                'status' => $record->status,
                'statement_batch' => $record->statement_batch,
                'closed_on' => $record->closed_on

            ];
        }

        $chunks = array_chunk($data, 10);
        dd($chunks);

        foreach ($chunks as $chunk) {
            Record::insert($data);
        }

        dd($data);
    }
}
