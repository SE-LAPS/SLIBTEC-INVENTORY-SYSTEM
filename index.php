<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SLIBTEC Inventory</title>

    <link rel="icon" type="image/png" href="images/Logo.png">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html,
        body {
            position: relative;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
            background-color: rgba(0, 0, 0, 0.5);
            overflow: hidden;
        }

        video#background-video {
            position: fixed;
            top: 0;
            left: 0;
            min-width: 100%;
            min-height: 100%;
            z-index: -1;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .content {
            text-align: center;
            z-index: 1;
        }
        
        .logo img{
            width: 200px;
        }
        .title {
            color: #4CAC12;
            margin-bottom: 10px;
            padding: 0;
            margin: 0;
           
        }
        .title h2{
            font-size: 120px;
            font-weight: 400px;
            margin: 0;
        }
           .title span{
            font-size: 80px;
            margin: 0;
        }
.card-link {
    width: 250px;
    height:250px;
    margin: 0 10px;
    padding: 20px;
    border: none;
    border-radius: 5px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    text-decoration: none;
    color: #484848;
    background: #ffffff;
    display: flex;
    justify-content: center;
    flex-direction: column;
    align-items: center; 
    transition: all 0.3s ease;
    color:#484848;
    font-size: 30px;
    margin-bottom: 0px;
    text-align: center;
    white-space: nowrap;
}

.card-link:hover {
    
    transform: scale(1.05);
    background-color: #4CAC12;
    color:#ffffff;
}
.links{
    display: flex;
    justify-content: space-between;
}
/**
.card-link h2 {
    color:#484848;
    font-size: 30px;
    margin-bottom: 0px;
    text-align: center;
    white-space: nowrap;
}

.card-link span {
    font-size: 18px; /
    text-align: center;
    white-space: nowrap; 
    background-color:#fff503;
    padding: 10px;
    border-radius: 5px;
} */
.card-link img{
    width: 90px;

}


.links>a {
    color: #636b6f;
    padding: 0 25px;
                font-size: 13px;
    font-weight: 600;
    letter-spacing: .1rem;
    text-decoration: none;
    text-transform: uppercase;
}

@media (max-width: 768px) {
            .card-link {
                width: 100%; /* Adjust as needed for smaller screens */
            }

            .title h2 {
                font-size: 80px;
            }

            .title span {
                font-size: 50px;
            }
        }

        
</style>

</head>

<body>

    <div class="flex-center position-ref full-height">
            <video autoplay muted loop id="background-video">
                <source src="images/video.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>

    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="logo">
                <img src="images/Logo.png">
            </div>
            <div class="title">
            <h2>SLIBTEC</h2>
   <!-- <span>POS System</span>-->
                 
            </div>

            <div class="links">
                
                <a class="card-link" href="slibtec/admin/">
                <img src="images/admin.png" alt="admin">
                    <h2>Admin</h2>
                    
                </a>
                <a class="card-link" href="slibtec/cashier/">
                    <img src="images/cashier.png" alt="cashier">
                   <h2> proc</h2>
                 <!--  <span>Log In</span>-->
                </a>
                <a class="card-link" href="slibtec/customer">
                    <img src="images/customer.png" alt="customer">
                    <h2>User</h2>
                    <!--  <span>Log In</span>-->
                </a>
                <a class="card-link" href="slibtec/hr">
                    <img src="images/customer.png" alt="hr">
                    <h2>HR</h2>
                    <!--  <span>Log In</span>-->
                </a>
                
            </div>
        </div>
    </div>
</body>

</html>>