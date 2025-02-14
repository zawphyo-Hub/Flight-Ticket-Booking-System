<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="SAE.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Sky Asia Express</title>
</head>
<body>
    <?php
    include('Navbar.php');
    ?>
    
    <div class="home-container">
    <div class="home-photo">
        <div class="h-content">
            <h2>Are You Ready For </h1>
            <h2><span>Take off</span> With SkyAsia Express?</h2>
            
        </div>       
               
        <div class="skyPlane"> 
           
        <div class="backgroundSky">
            
            <img src="images/sky2.jpg" alt="sky photo">
        </div>
        <div class="backgroundPlane">
            <img src="images/plane1.png" alt="plane photo">
        </div>  
        </div>
        
    </div>
    </div>

   

    <section class="service-card">

    	<div class="aboutus">
    	
		    <h2>About us</h2>
		    
		</div>   

	    <div class="RCC">
			<div class="aboutrcc" >
                <div class="wraprcc">
				<div class="imgHome">
                   <img src="images/homePicture2.jpg" alt="photo">

                </div>
                <div class="imgHome1">
                    <img src="images/homePicture1.jpg" alt="photo">
                    
                    <img src="images/homePicture3.jpg" alt="photo">

                </div>
                </div>
				
			</div>
			<div class="aboutrcc">
                
				<p>
                Sky Asia Express was founded with a mission to make traveling across Asia accessible, affordable, and enjoyable for everyone. With years of experience in the aviation industry, we pride ourselves on being a leading airline dedicated to offering smooth and reliable flights to a variety of incredible destinations throughout Asia.
				</p> <br>
                <p>
                We also offer flexible packages, combining flights with exclusive travel deals, so you can explore Asia with confidence, knowing that your journey is in good hands. Whether it’s a quick weekend getaway or a long-haul business trip, Sky Asia Express is here to connect you to Asia’s wonders and provide you with unforgettable travel experiences.
				</p>
			</div>
	    </div>
    <section >


    <section class="category">
			<h2>Popular Trips </h2>
			<div class="sampleitems">
				<div class="itemscontent1">
	    		    <img src="images/China.jpg" class="product-image"  alt="china image">
                    <div class="content-rcc">
					<p>To China</p>
                    <br>
                    <span class="trip-price">Price: Start from $399</span>
                    <br>
                    <a class='learn-more' href="flight.php">Book Now</a>
				    </div>
	    		 
	    		</div>
                <div class="itemscontent1">
	    		    <img src="images/Singapore.jpg" class="product-image"  alt="china image">
                    <div class="content-rcc">
					<p>To Singapore</p>
                    <br>
                    <span class="trip-price">Price: Start from $280</span>
                    <br>
                    <a class='learn-more' href="flight.php">Book Now</a>
                    
				    </div>
	    		 
	    		</div>
                <div class="itemscontent1">
	    		    <img src="images/Bangkok.jpg" class="product-image"  alt="china image">
                    <div class="content-rcc">
					<p>To Thailand</p>
                    <br>
                    <span class="trip-price">Price: Start from $180</span>
                    <br>
                    <a class='learn-more' href="flight.php">Book Now</a>
				    </div>
	    		 
	    		</div>
                <div class="itemscontent1">
	    		    <img src="images/Vietnam.jpg" class="product-image"  alt="china image">
                    <div class="content-rcc">
                    <p>To Vietnam</p>
                    <br>
                    <span class="trip-price">Price:  Start from $200</span>
                    <br>
                    <a class='learn-more' href="flight.php">Book Now</a>
					
				    </div>
	    		 
	    		</div>

                <div class="itemscontent1">
	    		    <img src="images/Myanmar.jpg" class="product-image"  alt="china image">
                    <div class="content-rcc">
					<p>To Myanmar</p>
                    <br>
                    <span class="trip-price">Price: Start from $199</span>
                    <br>
                    <a class='learn-more' href="flight.php">Book Now</a>
				    </div>
	    		 
	    		</div>


            </div>
    </section>


    <section class="whyTravel">
    <div class="whyTravelcontainer">
        <h2>Why Travel with Sky Asia Express</h2>
        <div class="flex-container">
            <div class="Serviceitem">
                <img src="images/car-chair.png" alt="chair" />
                <h3>Comfortable Seating</h3>
                <p>Enjoy spacious and comfortable seating to make your journey more pleasant.</p>
            </div>
            <div class="Serviceitem">
                <img src="images/book.png" alt="book" />
                <h3>Affordable Fares</h3>
                <p>Experience affordable flight options without compromising the trips.</p>
            </div>
            <div class="Serviceitem">
                <img src="images/customer-service (1).png" alt="customer-service" />
                <h3>Excellent Customer Service</h3>
                <p>Our friendly staff is here to assist you throughout your travel experience.</p>
            </div>
            <div class="Serviceitem">
                <img src="images/airplane.png" alt="airplane" />
                <h3>On-Time Departures</h3>
                <p>We value your time and ensure our flights depart as scheduled.</p>
            </div>
        </div>
    </div>
    </section>
    
    <?php include('footer.php') ?>   

    <script src="SAE.js"></script>
</body>
</html>