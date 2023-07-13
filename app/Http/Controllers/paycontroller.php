<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class paycontroller extends Controller
{
    //
    public function mypayment()
    {
        return view('pay.index');

    }

     //this is the payment call back function
     public function payment_callback()
     {
        $response = json_decode($this->verify_payment(request('reference')));
        //dd($response);
        if($response)
        {
           if($response->status)
           {
            $data = $response->data;
            return view('pay.callback_page')-with(compact('data'));
           }
           else{
            return back()-withError($response->message);
           }
        }
        else{
            return back()->withError('Something is wrong with the connection');

        }
         return view('pay.callback_page');
     }
 

    //make payment function 
    public function make_payment()
    {
        $formData =[
            'name'=>Request('name'),
            'email'=>Request('email'),
            'amount'=>Request('amount')*100,
            'callback_url'=> route('pay.callback')
        ];

        $pay = json_decode($this->initiate_payment($formData));
        //dd($pay);
       if($pay)
        {
            if($pay->status)
            {
              return redirect($pay->data->authorization_url);
                //dd($pay);
            }
            else
            {
                return back()->withError($pay->message);
            }
        }
        else 
        {
            return back()->withError("something went wrong");
        }
    }


    public function initiate_payment($formData)
    {
         $url ="https://api.paystack.co/transaction/initialize";
         //this is the customer url that will be generated for payment initialization
         $fields_string=http_build_query($formData);
         $ch = curl_init();
         curl_setopt($ch,CURLOPT_URL,$url);
         curl_setopt($ch,CURLOPT_POST,true);
         curl_setopt($ch,CURLOPT_POSTFIELDS,$fields_string);
         curl_setopt($ch,CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer sk_test_11e67348332cdd39b26c2d7a77b3b4c3517325d5",
            "Cache-Control: no-cache",
         ));
         curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
         $result =curl_exec($ch);
         curl_close($ch);
         return $result;

    }


    public function verify_payment($reference)
    {
        $curl =curl_init();
        curl_setopt_array($curl,array(
            CURLOPT_URL => "https://api.paystack.co/transaction/verify/$reference",
            CURLOPT_RETURNTRANSFER=> true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "authorization:Bearer sk_test_11e67348332cdd39b26c2d7a77b3b4c3517325d5" ,
                "cache-control:no-cache",
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }
}
