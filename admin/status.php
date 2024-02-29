<!DOCTYPE html>
<html>
    <head>
        <title>Payment status</title>

        <!--Bootstrap Link-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        <!----------------- BOOTSTRAP CSS ------------------->
        <link rel="stylesheet" href="bootstrap.min.css">
        <!------------- FONT AWESOME CDN LINK --------------->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.min.css">
        <!------------------ MAIN STYLE CSS ----------------->
       

        <!--CSS for Sidebar-->
        <style>
            /* The side navigation menu */
            .sidenav {
                height: 100%; /* 100% Full-height */
                width: 0; /* 0 width - change this with JavaScript */
                position: fixed; /* Stay in place */
                z-index: 1; /* Stay on top */
                top: 0; /* Stay at the top */
                left: 0;
                background-color: white; /* Black*/
                overflow-x: hidden; /* Disable horizontal scroll */
                padding-top: 60px; /* Place content 60px from the top */
                transition: 0.5s; /* 0.5 second transition effect to slide in the sidenav */
            }
            /* The navigation menu links */
            .sidenav a {
                padding: 8px 8px 8px 32px;
                text-decoration: none;
                font-size: 20px;
                color:#574262;
                display: block;
                transition: 0.3s;
            }
            /* When you mouse over the navigation links, change their color */
            .sidenav a:hover {
                border: solid 2px #574262;
                background-color:#574262;
                color: white;
            }
            /* Position and style the close button (top right corner) */
            .sidenav .closebtn {
                position: absolute;
                top: 0;
                right: 25px;
                font-size: 36px;
                margin-left: 50px;
            }
            /* Style page content - use this if you want to push the page content to the right when you open the side navigation */
            #main {
                transition: margin-left .5s;
                padding: 20px;
            }
            /* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
            @media screen and (max-height: 450px) {
                .sidenav {padding-top: 15px;}
                .sidenav a {font-size: 18px;}
            }

            .mission-hr-line {
                border-left: solid 6px #574262;  /*Kinnari edited*/
                padding-left: 15px;
                margin-left: -16px;
                margin-bottom: -20px; /*kinnari edited*/
            }

            .thead{
                background-color:#574262;
                color: white !important;
            }

            .card{
                 border: solid 2px #574262;
            }

        </style>
    </head>
    <body>
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="newadmin.php">Home</a>
            <a href="subscribers.php">Subscribers</a>
            <a href="status.php">Payment Status</a>
            <a href="message.php">Message</a>
        </div>
        <div id="main">
            <!-- Use any element to open the sidenav -->
        <span onclick="openNav()">
            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#6e3b80"><path d="M14.33333,35.83333v14.33333h143.33333v-14.33333zM14.33333,78.83333v14.33333h143.33333v-14.33333zM14.33333,121.83333v14.33333h143.33333v-14.33333z"></path></g></g></svg>
        </span>
        <!-- Add all page content inside this div if you want the side nav to push page content to the right (not used if you only want the sidenav to sit on top of the page -->
            <!--Table starts-->
            <section id="about-wrapper">
                <div class="mission-container container">
                    <div class="row">
                        <div class="col-lg-8 mr-space">
                            <br>
                            <div class="mission-hr-line">
                                <h3>Payment Status</h3>
                            </div>
                            <br>
                            <br>
                        </div>
                    </div>
                    <table class="table">
                        <thead class="thead">
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                             <th scope="col">Contact</th>
                            <th scope="col">Subscription</th>
                            <th scope="col">Start Date</th>
                            <th scope="col">End Date</th>
                            <th scope="col">Payment Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php 
//error_reporting(0);
include("connection.php");
$query="SELECT * FROM payment ";
$data = mysqli_query($conn, $query);
$total=mysqli_num_rows($data);



if($total!=0){
    
    while(($result=mysqli_fetch_assoc($data))){
        echo "
        <tr>
        <td>".$result['name']."</td>
        <td>".$result['email']."</td>
        <td>".$result['contact']."</td>
        <td>".$result['subscription']."</td>
        <td>".$result['start_date']."</td>
        <td>".$result['end_date']."</td>
        <td>".$result['payment']."</td>
        </tr>
        ";
    }
    //echo "table has records";
}else{
    echo "no records found";
}

?> 
                            
                        </tbody>
                    </table>
                </div>
                </div>
            </section>
            <!--Table section-->
        </div>
        <script>
            function openNav() {
              document.getElementById("mySidenav").style.width = "250px";
              document.getElementById("main").style.marginLeft = "250px";
              document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
            }
           
            function closeNav() {
              document.getElementById("mySidenav").style.width = "0";
              document.getElementById("main").style.marginLeft= "0";
              document.body.style.backgroundColor = "white";
            }
            </script>
    </body>
</html>
