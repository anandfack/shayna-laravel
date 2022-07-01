<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Models\Product;
use App\Models\Models\Transaction;
use App\Models\Models\TransactionDetail;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function get(Request $request, $id)
    {
        $product = Transaction::with(['details.product'])->find($id);

        if ($product)
            return ResponseFormatter::success($product, 'Data berhasil diambil');
        else
            return ResponseFormatter::error(null, 'Data tidak ada', 404);
    }
}
