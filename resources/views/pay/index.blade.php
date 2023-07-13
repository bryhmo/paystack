<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mypayment</title>
    <style type="text/css"> 
    body{
        background: #f5f5f5
    }
    .rounded{
        border-radius: 1rem
    }
    .nav-pills.nav-link{
        color: #555
    }
    .nav-pills.nav-link.active{color: white}input[type="radio"]{margin-right: 5px}
    .bold{
        font-weight:bold
    }
    </style>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
<div class="container py-5">
    <!-- For demo purpose -->
    <div class="row mb-4">
        <div class="col-lg-8 mx-auto text-center">
            <h1 class="display-6">CodeWithBryhmo Payment Gateway</h1>
        </div>
    </div> <!-- End -->
    <div class="row">
        <div class="col-lg-6 mx-auto">
            <div class="card ">
                <div class="card-header">
                    <div class="bg-white shadow-sm pt-4 pl-2 pr-2 pb-2">
                        <!-- Credit card form tabs -->
                        <ul role="tablist" class="nav bg-light nav-pills rounded nav-fill mb-9">
                            <li class="nav-item"> <a data-toggle="pill" href="#payment-confirmatiobn" class="nav-link active "> <i class="fas fa-credit-card mr-2"></i>Please Enter Your Basic Info Here</a> </li>
                        </ul>
                    </div> <!-- End -->
                    <!-- Credit card form content -->
                    <div class="tab-content">
                        <!-- credit card info-->
                        <div id="credit-card" class="tab-pane fade show active pt-3">
                            <form action="{{route('payment')}}" method="POST" >
                               <h4 style="color:red;"> @if(session()->has('error')){{session()->get('error')}}@endif</h4>
                                @csrf
                                <div class="form-group"> <label for="username">
                                        <h6>FullName</h6>
                                    </label> <input type="text" name="name" placeholder="Enter Your Full Name" required class="form-control "> 
                                </div>
                                <div class="form-group"> <label for="username">
                                        <h6>Email</h6>
                                        </label> <input type="Email" name="email" placeholder="Enter a Valid Email Address" required class="form-control ">
                                   </div>
                                <div class="form-group"> <label for="username">
                                        <h6>Amount</h6>
                                    </label> <input type="number" name="amount" placeholder="Enter the Amount Here" required class="form-control "> 
                                </div>
                                
                                <div class="card-footer"> <button type="submit" class="subscribe btn btn-primary btn-block shadow-sm"> Confirm Payment </button>
                            </form>
                        </div>
                    </div> <!-- End -->
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>