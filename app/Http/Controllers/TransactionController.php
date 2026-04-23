<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transaction;
use App\Models\Product;
use App\Models\ProductReview;

class TransactionController extends Controller
{
    public function cart(Request $request)
    {
        $store = User::where('username', $request->username)->first();

        if (!$store) {
            abort(404);
        }

        return view('pages.cart', compact('store'));
    }

    public function customerInformation(Request $request)
    {
        $store = User::where('username', $request->username)->first();

        if (!$store) {
            abort(404);
        }

        return view('pages.customer-information', compact('store'));
    }

    public function checkout(Request $request)
    {
        $store = User::where('username', $request->username)->first();

        if (!$store) {
            abort(404);
        }

        $carts = json_decode($request->cart, true);

        $totalPrice = 0;
        foreach ($carts as $cart) {
            $product = Product::where('id', $cart['id'])->first();
            $totalPrice += $product->price * $cart['qty'];
        } 

        $transaction = $store->transactions()->create([
            'code' => 'TRX-' . mt_rand(10000, 99999),
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'table_number' => $request->table_number,
            'payment_method' => $request->payment_method,
            'total_price' => $totalPrice,
            'status' => 'pending',
        ]);

        foreach ($carts as $cart) {
          $product = Product::where('id', $cart['id'])->first();
            $transaction->transactionDetails()->create([
                'product_id' => $product->id,
                'quantity' => $cart['qty'],
                'note' => $cart['notes'],
            ]);
        }
        if ($request->payment_method == 'cash') {
            return redirect()->route('success', ['username' => $store->username, 'order_id' => $transaction->code]);
        } else {
            //Atur Kunci Server Merchant Anda
            \Midtrans\Config::$serverKey = config('midtrans.server_key');
            //Set to Development/Sandbox Environment (default)
            \Midtrans\Config::$isProduction = config('midtrans.is_production');
            \Midtrans\Config::$isSanitized = config('midtrans.is_sanitized');
            \Midtrans\Config::$is3ds = config('midtrans.is_3ds');

            $params = [
                'transaction_details' => [
                    'order_id' => $transaction->code,
                    'gross_amount' => $totalPrice,
                ],
                'customer_details' => [
                    'first_name' => $request->name,
                    'phone' => $request->phone_number,
                ],
                'callbacks' => [
                    'finish' => route('success', ['username' => $store->username, 'order_id' => $transaction->code]),
                ],

            ];

            $paymentUrl = \Midtrans\Snap::createTransaction($params)->redirect_url;
            
            return redirect($paymentUrl);
            
            
        }
    }

    public function success(Request $request)
    {
        $transaction = Transaction::where('code', $request->order_id)->first();

        if (!$transaction) {
            abort(404);
        }

        $store = $transaction->user;

        // Update status ke success hanya untuk pembayaran non-tunai (Midtrans)
        if ($transaction->payment_method !== 'cash' && $transaction->status !== 'success') {
            $transaction->update(['status' => 'success']);
        }

        return view('pages.success', compact('transaction', 'store'));
    }

    public function rating(Request $request)
    {
        $store = User::where('username', $request->username)->first();

        if (!$store) {
            abort(404);
        }

        $transaction = Transaction::with('transactionDetails.product')
            ->where('code', $request->transaction_code)
            ->first();

        if (!$transaction) {
            abort(404);
        }

        // Cek apakah sudah di-rating
        if ($transaction->is_rated) {
            return redirect()->route('index', $store->username)
                ->with('message', 'Pesanan ini sudah diberi rating.');
        }

        return view('pages.rating', compact('store', 'transaction'));
    }

    public function submitRating(Request $request)
    {
        $store = User::where('username', $request->username)->first();

        if (!$store) {
            abort(404);
        }

        $transaction = Transaction::where('code', $request->transaction_code)->first();

        if (!$transaction || $transaction->is_rated) {
            abort(404);
        }

        $ratings = $request->input('ratings', []);
        $reviews = $request->input('reviews', []);

        foreach ($ratings as $productId => $rating) {
            ProductReview::create([
                'transaction_id' => $transaction->id,
                'product_id' => $productId,
                'user_id' => $store->id,
                'rating' => $rating,
                'review' => $reviews[$productId] ?? null,
            ]);
        }

        $transaction->update(['is_rated' => true]);

        return redirect()->route('index', $store->username)
            ->with('rating_success', 'Terima kasih atas rating Anda!');
    }
}
