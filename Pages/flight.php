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
    <form action="flightSearch.php" method="post">
    <Section class="wholeContainer">

    <div class="search-container">
    <div class="search-options">
        
        <select id="tripType" name="tripType" onchange="oneWayTrip()">
            <option value="0">Trip Type</option>
            <option value="roundTrip">Round Trip</option>
            
            <option value="oneWay">One Way</option>
            
        </select>
        

        <div class="passengerSelect">
            <div class="select-btn">
                <span class="passType" >Passenger</span>
                <i class="fa-solid fa-angle-down"></i>
			</div>
            <div class="dropdownContent">
                <div class="labelInput">
                    <div class="limitAge">
                    <label for="adults">Adults</label>
                    <p>Age 12+</p>
                    </div>
                    <input type="number" id="adults" name="adults" value="0" min="0" oninput="updatePassengerNo()">
                </div>    
                <div class="labelInput">
                    <div class="limitAge">
                    <label for="children">Children</label>
                    <p>Age 2 - 11</p>
                    </div>
                    <input type="number" id="children" name="children" value="0" min="0" oninput="updatePassengerNo()">
                </div>
                <div class="labelInput">
                    <div class="limitAge">
                    <label for="infants">Infants</label>
                    <p>Age less than 2</p>
                    </div>
                    <input type="number" id="infants" name="infants" value="0" min="0" oninput="updatePassengerNo()">
                </div>
               
            </div>
        </div>


        <select class="class-type" name="class">
            <option value="0">Cabin Type</option>
            <option value="economy">Economy</option>
            <option value="business">Business</option>
           
        </select>
    </div>
    <div class="searchWrap">
        <div class="location">
            <div class="inputContainer">
                <label class="searchLabel"> From</label>
               <input type="text" name="from" placeholder="Country" class="from" required>
            </div>
        
            <div class="inputContainer">
               <label class="searchLabel">To</label>
               <input type="text" name="destination" placeholder="Destination" class="destination" required>
            </div>
           
        </div>
        <div class="chooseDate">
            <div class="inputContainer">
           
                <label class="searchLabel">Departure Date</label>
                <input type="date" name="departureDate"  class="departure-field" required>
            </div>
            <div class="inputContainer">
                <label id="searchReturn">Return Date</label>
                <input type="date"  name="returnDate" id="return-field" required>
            </div>
        </div>

       
       <button type="submit" name="search" class="search-btn">Search</button>
         
    </div>
    
    </div>
    </Section>
    </form>
    

    <section class="category1">
			<h2>Flight Recommendations</h2>
			<div class="sampleitems">

                <div class="itemscontent2">
	    		    <img src="images/Lao.jpg" class="product-image"  alt="Lao image">
                    <div class="content-rcc1">
					<p>Flight To Lao</p>
                    <br>
                    <span class="trip-price">Price: Start from $150</span>
                    <br>
                    
				    </div>
	    		 
	    		</div>

                <div class="itemscontent2">
	    		    <img src="images/malaysia.jpg" class="product-image"  alt="malaysia image">
                    <div class="content-rcc1">
					<p>Flight To Malaysia</p>
                    <br>
                    <span class="trip-price">Price: Start from $229</span>
                    <br>
                    
				    </div>
	    		 
	    		</div>

                <div class="itemscontent2">
	    		    <img src="images/cambodia.jpg" class="product-image"  alt="cambodia image">
                    <div class="content-rcc1">
					<p>Flight To Cambodia</p>
                    <br>
                    <span class="trip-price">Price: Start from $239</span>
                    <br>
                    
				    </div>
	    		 
	    		</div>
				<div class="itemscontent2">
	    		    <img src="images/China.jpg" class="product-image"  alt="china image">
                    <div class="content-rcc1">
					<p>Flight To China</p>
                    <br>
                    <span class="trip-price">Price: Start from $399</span>
                    <br>
                    
				    </div>
	    		 
	    		</div>
                <div class="itemscontent2">
	    		    <img src="images/Singapore.jpg" class="product-image"  alt="china image">
                    <div class="content-rcc1">
					<p>Flight To Singapore</p>
                    <br>
                    <span class="trip-price">Price: Start from $280</span>
                    <br>
                    
                    
				    </div>
	    		 
	    		</div>
                <div class="itemscontent2">
	    		    <img src="images/Bangkok.jpg" class="product-image"  alt="china image">
                    <div class="content-rcc1">
					<p>Flight To Thailand</p>
                    <br>
                    <span class="trip-price">Price: Start from $180</span>
                    <br>
                   
				    </div>
	    		 
	    		</div>
                <div class="itemscontent2">
	    		    <img src="images/Vietnam.jpg" class="product-image"  alt="china image">
                    <div class="content-rcc1">
                    <p>Flight To Vietnam</p>
                    <br>
                    <span class="trip-price">Price:  Start from $200</span>
                    <br>
                    
					
				    </div>
	    		 
	    		</div>

                <div class="itemscontent2">
	    		    <img src="images/Myanmar.jpg" class="product-image"  alt="china image">
                    <div class="content-rcc1">
					<p>Flight To Myanmar</p>
                    <br>
                    <span class="trip-price">Price: Start from $199</span>
                    <br>
                    
				    </div>
	    		 
	    		</div>


            </div>
    </section>

    <?php include('footer.php')?>



    <script src="SAE.js"></script>
</body>
</html>