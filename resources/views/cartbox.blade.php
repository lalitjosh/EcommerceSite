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
    margin-top: 25px;
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

.section-5{

  display: grid;
  position: relative;
  top: -332px;
  left: 862px;
  right: 0px;
  bottom: 0px;

  grid-template-columns:repeat(1,1fr) ;
  width: 205px;
  padding:168px;
  background-color: white;

}

.checkout{

  display: grid;
  position: relative;
  top: 158px;
  left: -98px;





}


.orderSummary{

  display: inline-block;
  position: relative;
  top: -48em;
  left: 64em;


}

.line{
  display: inline-block;
  position: absolute;
  top: 70px; 
  border-top: 1px solid red;
  width: 284px;
}

.remove{

  display: inline-block;
  position: absolute;
  top: 274px;
  left:628px ;

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
        <li><a href="cart">Cart</a></li>
      </ul>
      <form class="navbar-form navbar-left" action="{{route('search')}}" method="get">
        <div  id="srch" class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Search</button>

        <div class="section1">

          @auth
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

        <b>{{$cart->itemName}}  <br> Rs{{$cart->amount}}</b>
        <b><s> {{$cart->decreasedAmount}} </s>
         <br>
         <br>
         <b>Ordered {{$cart->quantity}} items </b>with {{$cart->discountPercent}} off
         <a class="btn btn-danger" href="{{route('delete',$cart->id)}}">Delete</a>
       </div>


     </div>




     <?php $totalprice=$totalprice+$cart->amount ?>
     <?php $toItem=$toItem+$cart->quantity ?>
     @endforeach


     <div class="total" >


       <center>Total Cart amount :{{$totalprice}}</center>


     </div>


     <div class="section-5">




      <div class="checkout">

        <a href="{{route('shipping')}}"><input type="button" name="" class="btn btn-primary" value="PROCEED TO CHECKOUT"></a>

      </div>

    </div>
    <div class="orderSummary"><b><u>Order Summary</u></b>

      <br> Subtotal: {{$toItem}} items
      <br>Shipping fee: Rs 250

      <div><br>Total: Rs {{$totalprice+250}}

      </div>

      <div class="line"></div>

    </body>
    </html>
