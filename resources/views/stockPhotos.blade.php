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


    .userName{

              display: inline-block;
              color: #337ab7;

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
    <form class="navbar-form navbar-left" action="/action_page.php">
      <div  id="srch" class="form-group">
        <input type="text" class="form-control" placeholder="Search">
      </div>
      <button type="submit" class="btn btn-default">Search</button>
      @auth
              
               <div class="section1">            

              <div class="userName">{{ Auth::user()->name }}</div>
              
                   </div>

                  <div class="section2">

              <div class="userName"><a href="{{route('logout')}}">Logout</a>
                  
                  </div>
           
            @endauth

            @guest
            
                    <div class="section3">

              <div class="userName"><a href="{{route('login')}}">Login</a>

                    </div>


                    <div class="section4">

              <a href="{{route('register')}}">Register</a>
                    
                    </div>
        
            @endguest
    </form>
  </div>
</nav>

</body>
</html>

