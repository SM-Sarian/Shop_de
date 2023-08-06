<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\pay\zarinpal;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function storeCart(Request $request)
    {
        \Cart::add([
            'id'=> $request->id,
            'name'=>$request->name,
            'price'=>$request->price,
            'quantity'=>$request->quantity,
            'attributes'=> [
                'image'=>$request->image,
                'guarantee'=>$request->guarantee,
                'slug'=>$request->slug,
                ]
        ]);

        session()->flash('success','Das gewünschte Produkt wurde dem Warenkorb hinzugefügt');
        return redirect(route('fronts.cart'));
    }

    public function updateCart(Request $request)
    {
        \Cart::update(
            $request->id,
            [
                'quantity'=>[
                    'relative'=> false,
                    'value'=> $request->quantity
                ]
            ]
        );


        session()->flash('success','Die gewünschte Produktnummer wurde erfolgreich bearbeitet');
        return redirect(route('fronts.cart'));
    }



    public function removeCart(Request $request)
    {
        \Cart::remove($request->id);

        session()->flash('success','Das Produkt wurde erfolgreich entfernt');
        return redirect(route('fronts.cart'));
    }


    public function request()
    {
        $MerchantID 	= "xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx";
        $Amount 		= session()->get('total');
        $Description 	= "Sarian Store";
        $Email 			= auth()->user()->email;
        $Mobile 		= "";
        $CallbackURL 	= url('callback/pay');
        $ZarinGate 		= false;
        $SandBox 		= true;

        $zp 	= new zarinpal();
        $result = $zp->request($MerchantID, $Amount, $Description, $Email, $Mobile, $CallbackURL, $SandBox, $ZarinGate);

        if (isset($result["Status"]) && $result["Status"] == 100)
        {
            // Success and redirect to pay
            $zp->redirect($result["StartPay"]);
        } else {
            // error
            echo "خطا در ایجاد تراکنش";
        }
    }

    public function verify()
    {
        $MerchantID 	= "xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx";
        $Amount 		= session()->get('total');
        $ZarinGate 		= false;
        $SandBox 		= true;

        $zp 	= new zarinpal();
        $result = $zp->verify($MerchantID, $Amount, $SandBox, $ZarinGate);

        if (isset($result["Status"]) && $result["Status"] == 100)
        {
            foreach(\Cart::getContent() as $item){
                Order::create([
                    'user_id'=>auth()->user()->id,
                    'product_id'=> $item->id,
                    'price'=>$item->price,
                    'status'=>'active',
                    'quantity'=>$item->quantity,
                ]);
            }
            // Success
            \Cart::clear();
            session()->flash('success','Die Transaktion wurde erfolgreich abgeschlossen');
            return redirect(route('fronts.cart'));
//            echo "تراکنش با موفقیت انجام شد";
        } else {
            // error
            echo "Bezahlung fehlgeschlagen";
        }

    }
}
