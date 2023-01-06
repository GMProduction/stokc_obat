<?php


namespace App\Http\Controllers;


use App\Helper\CustomController;
use App\Models\Medicine;
use App\Models\MedicineIn;
use App\Models\TransactionIn;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class TransactionInController extends CustomController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function storeCart()
    {
        try {
            $medicine_id = $this->postField('medicine');
            $medicine = Medicine::find($medicine_id);
            $cart_exist = MedicineIn::where('medicine_id', '=', $medicine_id)->first();
            $qty = (int)$this->postField('qty');
            $price = (int)$this->postField('price');
            $total = $qty * $price;
            if ($cart_exist) {
                $qty = $cart_exist->qty + $qty;
                $total = $qty * $price;
                $cart_exist->update([
                    'qty' => $qty,
                    'price' => $price,
                    'total' => $total
                ]);
            } else {
                $data_request = [
                    'user_id' => 1,
                    'transaction_in_id' => null,
                    'medicine_id' => $medicine->id,
                    'unit_id' => $medicine->unit_id,
                    'expired_date' => $this->postField('expired_date'),
                    'qty' => $qty,
                    'price' => $price,
                    'total' => $total,
                ];
                MedicineIn::create($data_request);
            }
            return $this->jsonResponse('success', 200);
        } catch (\Exception $e) {
            return $this->jsonResponse($e->getMessage(), 500);
        }
    }

    public function store()
    {
        DB::beginTransaction();
        try {

            $data_request = [
                'user_id' => 1,
                'budget_source_id' => $this->postField('budget_source'),
                'date' => Carbon::now(),
                'batch_id' => 'TI-' . date('YmdHis'),
                'description' => $this->postField('description')
            ];
            $transaction_in = TransactionIn::create($data_request);
            MedicineIn::whereNull('transaction_in_id')->update([
                'transaction_in_id' => $transaction_in->id
            ]);
            DB::commit();
            return $this->jsonResponse('success', 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->jsonResponse($e->getMessage(), 500);
        }
    }
}