<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use App\Models\Models\Transaction;
use App\Models\Models\TransactionDetail;
use App\Models\Models\Product;
use App\Http\Requests\API\CheckoutRequest;

use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class CheckoutController extends Controller
{
    public function checkout(CheckoutRequest $request)
    {
        $data = $request->except('transaction_details');
        $data['uuid'] = 'TRX' . mt_rand(10000, 99999) . mt_rand(100, 999);
        // dd($request->all());
        $transaction = Transaction::create($data);
        // dd($transaction->all());
        foreach ($request->transaction_details as $product) {
            $details[] = new TransactionDetail([
                'transactions_id' => $transaction->id,
                'products_id' => $product,
            ]);

            // Product::find($product)->decrement('quantity');
            Product::find($product)->decrement('quantity');
        }

        $transaction->details()->saveMany($details);
        // dd($transaction);
        return ResponseFormatter::success($transaction);
    }
}
