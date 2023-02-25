  <!DOCTYPE html>
  <html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HappyShop</title>
    <link rel = "icon" href = "https://toppng.com/uploads/preview/design-for-logo-11549988276bxsuzsd1y1.png" 
    type = "image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">



    <style type="text/css">

     body {
      background: #f4f4f4;
    }


    .big-div{
      display: grid;
      grid-template-columns:repeat(1,1fr) ;
      margin-left: 25px;
      margin-right: 486px;
      margin-top: 150px;
      margin-bottom: -88px;
      grid-gap: 2em ;

      padding: 34px;



    }


    .big-div  img {

      width: 138px;
    }




    .box1{
      position: relative;

      padding: 16px;
      background: white;
    }

    .overlay{
      position: absolute;
      top: 12px;
      margin-left: 164px;

    }

    .box2{

      padding: 16px;
      background: white;
    }

    .Ganesha{
      margin-top: -115px;
      margin-left: 184px;
    }


    .shipping-address {

     display: grid;
     grid-template-rows: 70%;
     
     margin-left: 875px;
     margin-right: 63px;
     margin-top: -356px;

     background: white;

   }


   .shipping-detail{

    margin-left: 20px;
    margin-top: 5px;
    margin-right: 0px;
    margin-bottom: 96px;
  }




  .userName{

    display: inline-block;
    color: white;

  }

  .section1{
   display: inline-block;
   position: relative;
   left: 20px;

 }

 .section2{

   display: inline-block;
   position: relative;
   left: 34px;

 }

 .section3{
  display: inline-block;
  position: relative;
  left: 16px;

}

.section4{
  display: inline-block;
  position: relative;
  left: 18px;

}


.total{

 display: grid;
 background: white;
 width: 770px;
 position: relative;
 top: 0px;
 right: 0px;
 left: 60px;
 bottom: 0px;

}





#srch{
  grid-template-rows: 1fr 1fr;
  grid-gap: 1em;
  margin-left: 26em;

}



</style>
</head>
<body>

  <nav id="nav" class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand " href="/">HappyShop</a>
      </div>
      <ul class="nav navbar-nav">
        <li ><a href="stockPhoto">Stock Photos</a></li>
        <li><a href="sculpture">Sculpture</a></li>
        <li><a href="{{route('cartbox')}}">Cart</a></li>
      </ul>
      <form class="navbar-form navbar-left" action="{{route('search')}}" method="get">
        
        <div  id="srch" class="form-group">
         <input type="text" class="form-control" placeholder="Search" name="query">
       </div>
       <button type="submit" class="btn btn-default">Search</button>
        @auth

        <div class="section1">            

          <div class="userName">{{ Auth::user()->name }}</div>

        </div>

        <div class="section2">

          <div class="userName"><a href="{{route('logout')}}"><input type="button" name="" class="btn btn-primary" value="Logout"></a>

          </div>

          @endauth

          @guest

          <div class="section3">

            <div class="userName"><a href="{{route('login')}}"><input type="button" name="" class="btn btn-primary" value="Login"></a>

            </div>


            <div class="section4">

              <a href="{{route('register')}}"><input type="button" name="" class="btn btn-success" value="Register"></a>

            </div>
            @endguest
          </form>
        </div>
      </nav>

      <?php $totalprice=0; ?>
      <?php $toItem=0; ?>

      @foreach($cart as $cart)
      <div class="big-div">


        <div class="box2">
         <img src="{{$cart->image}}">

       </div>

       <div class="Ganesha">

        <b>{{$cart->itemName}}  <br> {{$cart->amount}}</b>
        <b><s> {{$cart->decreasedAmount}} </s>
         <br>
         <br>
         <b>Only {{$cart->quantity}} items in cart</b>---- {{$cart->discountPercent}} off
         <a class="btn btn-danger" href="{{route('delete',$cart->id)}}">Delete</a>

       </div>


     </div>




     <?php $totalprice=$totalprice+$cart->amount ?>
     <?php $toItem=$toItem+$cart->quantity ?>
     @endforeach


     <div class="total" >


       <center>Total Cart amount :{{$totalprice}}</center>

     </div>


     <div class="shipping-address">

      <div class="box-1">
        <div class="shipping-detail" >
          <br>{{$cart->userName}}<br>

          {{$cart->phoneNumber}}, {{$cart->deliveryAddress}}<br>

          Bill to the same address<br>

          {{$cart->phoneNumber}}<br>



          lalitjoshi621@gmail.com<br>


          Order Summary

          Subtotal ({{$toItem}} Items)<br>

          Rs.{{$totalprice}} <br>

          Shipping Fee<br>

          Rs. 250<br>

          <div id="proceed-buy">
            <button ><a  class="btn btn--green" href="{{route('paymentCashier')}}">Proceed to Pay</a></button>
          </div>
        </div>
      </div>

    </div>




  </body>
  </html>
