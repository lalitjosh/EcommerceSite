<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\shoppingitem;
use App\Models\User;
use App\Models\cart_item;
use App\Models\cart;
use Illuminate\Support\Facades\Auth;
use DB;

class ECommerceController extends Controller
{
    
  public function index(Request $request)
  {
   
    $datas = shoppingitem::paginate(5);
    return view('welcome',['datas'=>$datas]);
  }

  //public function show(Request $request,$id)
  //{
    //$data = DB::table('ShoppingItems')->find($id);
    //return view('shop',['data'=>$data]);
  //}

  public function add(Request $request,$id)
  {
    $table = DB::table('cart_items')->find($id);
    return view('shop',['table'=>$table]);
  }

  
  public function addcart(Request $request,$id){
    
    if(Auth::id())

    {   
        $user = auth()->user();

        $table = DB::table('cart_items')->find($id);



        $data =DB::table('ShoppingItems')->find($id);

        $cart = new cart;
        
        
        $cart->userName=$user->name;


        
        $cart->phoneNumber=$request->phoneNumber;

        $cart->deliveryAddress=$request->deliveryAddress;

        $cart->itemName=$table->itemName;

        $cart->quantity=$request->quantity;

        $cart->amount=$table->amount;

        $cart->decreasedAmount=$table->decreasedAmount;

        $cart->discountPercent=$table->discountPercent;

        $cart->image = $table->image;

        $cart->save();



        return redirect()->route('welcome')->with('message','Product Added Sucessfully');

    }

    else
    {
        return redirect('login');
    }



  }



    public function showAddCart()
    {
       
       $name=Auth::user()->name; 

       $cart=cart::where('userName','=',$name)->get();
       return view('cartbox',compact('cart'));



    }

    public function deleteCart($id)
    {

       $cart =cart::find($id);

       $cart->delete();

       return redirect()->back();

    }


    public function ship()

    {

       $name=Auth::user()->name; 

       $cart=cart::where('userName','=',$name)->get();
       return view('shipping',compact('cart'));
    }


    public function payment()
    {
       
       $name=Auth::user()->name; 

       $cart=cart::where('userName','=',$name)->get();
       return view('paymentCashier',compact('cart'));

      
    
    }


    public function searchData()
    {

        $search_text = $_GET['query'];
        $cart = shoppingitem::where('god_name','LIKE','%'.$search_text.'%')->get();


        return view('search',compact('cart'));

    }


  
     public function sucess(Request $request)
   {
      
   
     //$status = $request->q;
     //dd($status);

      $url = "https://uat.esewa.com.np/epay/transrec";
     
     $data =[
    'amt'=> 100,
    'rid'=> '000AE01',
    'pid'=>'1234567891417',
    'scd'=> 'EPAYTEST'
        ];

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);
    curl_close($curl);

    $response_code = $this->get_xml_node_value('response_code',$response );
                //dd($response_code);
                if( trim($response_code) == 'Success')
                {
                    
                    return redirect()->route('http://127.0.0.1:8000/sucess')->with('success_message', 'Transaction completed.');
                }

   }
   

public function failure(Request $request){

    return redirect()->route('esewa.failure')->with('error_message', ' You have cancelled your transaction .');
}


 public function get_xml_node_value($node, $xml) {
        if ($xml == false) {
            return false;
        }
        $found = preg_match('#<'.$node.'(?:\s+[^>]+)?>(.*?)'.
                '</'.$node.'>#s', $xml, $matches);
        if ($found != false) {
            
                return $matches[1]; 
             
        }     

    return false;
    }

public function store_payment(Request $request){

      return redirect()->route('welcome');

}
 


 public function verify(Request $request){

   $args = http_build_query(array(
    'token' => 'QUao9cqFzxPgvWJNi9aKac',
    'amount'  => 1000,
));

   $url = "https://khalti.com/api/v2/payment/verify/";

# Make the call using API.
   $ch = curl_init();
   curl_setopt($ch, CURLOPT_URL, $url);
   curl_setopt($ch, CURLOPT_POST, 1);
   curl_setopt($ch, CURLOPT_POSTFIELDS,$args);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

   $headers = ['Authorization: Key test_secret_key_6b6a4c4e84784fdfaedf65a1844fc70e'];
   curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

// Response
   $response = curl_exec($ch);
   $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
   curl_close($ch);


   if($status_code==200){
    
     return response()->json(['message'=>'success'],200);
   }

   else{
     
      return response()->json(['error'=>1,'message'=>'Payment Failed']);
   }

 }



}




