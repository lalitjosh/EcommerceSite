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

    body{
      background: #f4f4f4;
    }

    .big-div{
      display: grid;
      grid-template-columns:repeat(2,1fr) ;
      margin-left: 100px;
      margin-right: 464px;
      margin-top: 150px;
      margin-bottom: 80px;
      grid-gap: 5em ;
      background: white;
      padding: 25px;


    }


    .big-div  img {

      width: 392px;
    }

    .box2{
      margin-top: 0px;

      margin-right: 40px;


    }


    .intro {
     margin-top: 34px;
     margin-left: 34px;
     color:#e84118;

   }


   .addcart {
    margin-top: 68px;
    margin-left: 4px;
  }

  #buy-link {
    margin-top: -32px;
    margin-left: 145px;

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

.section-Item {
  color: #487eb0;
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

          </div>
        </form>
      </div>
    </nav>


    <div class="big-div">

      <div class="box1">
        <img src="{{$table->image}}">

      </div>


      <div class="box2">

        <div class="intro" >
          <strong><div class="section-Item">
            Item Name : {{$table->itemName}}<br>


            <br>Total Items In Store : {{$table->quantity}}
          </div>

          <hr>
          <p style="color:#44bd32;"><br>Amount    : {{$table->amount}}</p><br>
          <s>{{$table->decreasedAmount}}</s><br>

          <p style="color:powderblue;">{{$table->discountPercent}} off</style>
          </strong>  



        </div>
        <div class="intro"> 
          <form action="{{route('cart',$table->id) }}" method="post">

            @csrf
            <br><strong>Quantity:</strong>


            <input type="number" value="1" min="1" class="form-control" style="width:100px" name="quantity" value="{{old('quantity')}}">

            <br>Delivery address :
            <input type="text" class="form-control" style="width:200px" name="deliveryAddress">

            <br>Phone Number :
            <input type="text" class="form-control" style="width:200px" name="phoneNumber">

            <div class="addcart">

              <input type="submit" class="btn btn-primary" value="Add Cart">
            </div>

          </form>  



        </div>

      </form>
    </div>
  </div>
  <br>
  jknkhkjh



</body>
</html>
