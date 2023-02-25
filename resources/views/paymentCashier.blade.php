<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>HappyShop</title>
  <link rel = "icon" href = "https://toppng.com/uploads/preview/design-for-logo-11549988276bxsuzsd1y1.png" 
  type = "image/x-icon">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="http://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <script src="https://khalti.s3.ap-south-1.amazonaws.com/KPG/dist/2020.12.17.0.0.0/khalti-checkout.iffe.js"></script>
  <script type="text/javascript">

  </script>

  <style type="text/css">

    img {
      width: 30px;
    }


    .pmt{
      display: inline-block;
      position: relative;
      top: 202px;
      left: 98px;
    }



    *{
      box-sizing: border-box;
    }

    body {
      padding: 0;
      margin: 0;
      font-family: arial, sans-serif;
      background: #eff0f5;
    }

    h1 {
      font-size: 2em;
      font-weight: bold;
      text-align: center;
      padding: 0;
      margin: 30px 0;
      color: #fff;
    }

    .tab-wrap {
      width: 60%;
      list-style: none;
      text-align: left;
      padding: 0;
      margin: 0 0 0 50px;
      position: relative;
      top: 228px;
      left: 46px;
    }

    .tab-wrap input[type="radio"] {
      position: absolute;
      top: -9999px;
      left: -9999px;
    }

    .tab-wrap li {
      float: left;
      display: block;
    }

    .tab-wrap label {
      background: #f39c12;
      color: inherit;
      text-decoration: none;
      display: inline-block;
      border-radius:3px 3px 0 0;
      margin: -28px 10px 0 0px;
      padding: 1em 1.5em;
      cursor: pointer;


    }

    .TabE {

      position: relative;
      left: 0px;
      width: 8em;
    }




    .tab-wrap .tab-content {
      background: #fff;
      width: 100%;
      border-radius:0 3px 3px 3px;
      position: absolute;
      top: 50px;
      left: 0;
      padding: 20px;
      display: none;
    }

    .tab-wrap [id^="tab"]:checked + label {
      background: #fff;
    }

    .tab-wrap [id^="tab"]:checked ~ .tab-content{
      display: block;
    }    


    .visa {
      color: blue;
    }

    .boxCvv
    {
      position: relative;
      top: -56px;
      left: 165px;
    }


    .abc {
      position: relative;
      top: 332px;
    }


    .button1 {
      background-color: #fa8231;
      border: none;
      padding: 15px 32px;
      font-size: 15px;
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



      <div class="pmt">
        <h2>Select Payment Method</h2>
      </div>
      <ul class="tab-wrap">
        <li>
          <input type="radio" id="tab-1" name="tab" checked />
          <label for="tab-1" class="TabC">

           <img src="https://static.vecteezy.com/system/resources/previews/002/318/259/original/credit-card-icon-free-vector.jpg">

           <br>
           Credit Card

         </label>
         <div class="tab-content">
          <h3 class="visa">Visa</h3>
          <p>
            <form>
              *Card Number:<br>
              <P><input type="text" id="fname" name="fname" value="Card Number"></P>
              *Name on card:<br>
              <P><input type="text" id="lname" name="lname" value="Name on card"></P>
              *Expiration Date:<br>
              <P><input type="Date" id="expiryDate" name="expiryDate" value="Expiration Date"></P>
              <div class="boxCvv">
                *CVV:<br>
                <input type="text" name="cvv" value="CVV">
              </div>

              <P><button class="button1"><a href="#">PAY NOW</a></button>

              </form>
            </p>
          </div>
        </li>
        <li>
          <input type="radio" id="tab-2" name="tab" />
          <label for="tab-2" class="TabE">
           <img src="https://esewa.com.np/common/images/esewa-icon-large.png"><br>
           Esewa
         </label>
         <div class="tab-content">
          <p>
            <form action="https://uat.esewa.com.np/epay/main">

              <P> You will be redirected to your eSewa account to complete your payment:</P>

              1. Login to your eSewa account using your eSewa ID and your Password<br>
              2. Ensure your eSewa account is active and has sufficient balance<br>
              3. Enter OTP(one time password) sent to your registered mobile number.<br>

              <br>
              <P>***Login with your eSewa mobile and PASSWORD(not MPin)***
              </P>

              <input value="100" name="tAmt" type="hidden">
              <input value="90" name="amt" type="hidden">
              <input value="5" name="txAmt" type="hidden">
              <input value="2" name="psc" type="hidden">
              <input value="3" name="pdc" type="hidden">
              <input value="EPAYTEST" name="scd" type="hidden">
              <input value="123456789147" name="pid" type="hidden">
              <input value="http://127.0.0.1:8000/sucess?q=su" type="hidden" name="su">
              <input value="http://127.0.0.1:8000/failure?q=fu" type="hidden" name="fu">
              <input value="PAY NOW" type="submit">
              <br>  
            </form>
          </p>




        </p>
      </div>
    </li>
    <li>
      <input type="radio" id="tab-3" name="tab" />
      <label for="tab-3">
        <img src="https://avatars.githubusercontent.com/u/31564639?s=280&v=4"><br>
        Khalti Wallet
      </label>
      <div class="tab-content">

       <p>

        <P> You will be redirected to your Khalti account to complete your payment:</P>

        1. Login to your Khalti account using your Khalti ID and your Password<br>
        2. Ensure your Khalti account is active and has sufficient balance<br>
        3. Enter OTP(one time password) sent to your registered mobile number.<br>

        <br>
        <P>***Login with your Khalti mobile and PASSWORD(not MPin)***
        </P>
        <br>
        <button id="payment-button">Pay with Khalti</button>  

      </p>




    </div><br>
    <div class="abc">
      <P>TEXT AREA</P>


    </div>

  </li>
</ul>
<script>
  var config = {
            // replace the publicKey with yours
            "publicKey": "test_public_key_92aeaef439ca4169a146f7c99c344262",
            "productIdentity": "1234567890",
            "productName": "God Ganesh Sculpture",
            "productUrl": "http://127.0.0.1:8000/lord-ganesha-7514796",
            "paymentPreference": [
            "KHALTI",
            "EBANKING",
            "MOBILE_BANKING",
            "CONNECT_IPS",
            "SCT",
            ],
            "eventHandler": {
              onSuccess (payload) {
                    // hit merchant api for initiating verfication
                    console.log(payload);
                    $.ajax({

                      type : 'POST',
                      url : "{{ route('khalti.verify-trans') }}",
                      data: {
                        token : payload.token,
                        amount : payload.amount,
                        "_token" : "{{ csrf_token() }}"
                      },
                      success : function(res){
                        $.ajax({
                          type : "POST",
                          url : "{{ route('khalti.store_payment') }}",
                          data : {
                            response : res,
                            "_token" : "{{ csrf_token() }}"
                          },
                          success: function(res){
                            console.log('transaction successfull');

                          }
                        });
                        console.log(res);
                      }
                    });

                  },
                  onError (error) {
                    console.log(error);
                  },
                  onClose () {
                    console.log('widget is closing');
                  }
                }
              };

              var checkout = new KhaltiCheckout(config);
              var btn = document.getElementById("payment-button");
              btn.onclick = function () {
            // minimum transaction amount must be 10, i.e 1000 in paisa.
            checkout.show({amount: 1000});
          }
        </script>
      </body>
      </html>

