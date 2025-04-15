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

    
      include('NavBookingSteps.php');

    //activating color and line as proceed to next page
      $PageNow = 'passengerDetail';
      $currentStep = 2; 

    if ($PageNow == 'flightSelection') {
        $currentStep = 1;
    } elseif ($PageNow == 'passengerDetail') {
        $currentStep = 2;
    } elseif ($PageNow == 'paymentDetail') {
        $currentStep = 3;
    } elseif ($PageNow == 'confirmation') {
        $currentStep = 4;
    }


    $countries = array('Afghanistan', 'Albania', 'Algeria', 'American Samoa', 'Andorra', 'Angola',
    'Anguilla', 'Antarctica', 'Antigua and Barbuda', 'Argentina', 'Armenia', 'Aruba', 'Australia',
    'Austria', 'Azerbaijan', 'Bahamas', 'Bahrain', 'Bangladesh', 'Barbados', 'Belarus', 'Belgium',
    'Belize', 'Benin', 'Bermuda', 'Bhutan', 'Bolivia', 'Bosnia and Herzegowina', 'Botswana',
    'Bouvet Island', 'Brazil', 'British Indian Ocean Territory', 'Brunei Darussalam', 'Bulgaria',
    'Burkina Faso', 'Burundi', 'Cambodia', 'Cameroon', 'Canada', 'Cape Verde', 'Cayman Islands',
    'Central African Republic', 'Chad', 'Chile', 'China', 'Christmas Island', 'Cocos (Keeling) Islands', 
    'Colombia', 'Comoros', 'Congo', 'Congo, the Democratic Republic of the', 'Cook Islands', 'Costa Rica', 
    'Cote d\'Ivoire', 'Croatia (Hrvatska)', 'Cuba', 'Cyprus', 'Czech Republic', 'Denmark', 'Djibouti', 'Dominica',
    'Dominican Republic', 'East Timor', 'Ecuador', 'Egypt', 'El Salvador', 'Equatorial Guinea', 'Eritrea', 
    'Estonia', 'Ethiopia', 'Falkland Islands (Malvinas)', 'Faroe Islands', 'Fiji', 'Finland', 'France', 'France Metropolitan', 'French Guiana', 'French Polynesia', 'French Southern Territories', 'Gabon', 'Gambia', 'Georgia', 'Germany', 'Ghana', 'Gibraltar', 'Greece', 'Greenland', 'Grenada', 'Guadeloupe', 'Guam', 'Guatemala', 'Guinea', 'Guinea-Bissau', 'Guyana', 'Haiti', 'Heard and Mc Donald Islands', 'Holy See (Vatican City State)', 'Honduras', 'Hong Kong', 'Hungary', 'Iceland', 'India', 'Indonesia', 'Iran (Islamic Republic of)', 'Iraq', 'Ireland', 'Israel', 'Italy', 'Jamaica', 'Japan', 'Jordan', 'Kazakhstan', 'Kenya', 'Kiribati', 'Korea, Democratic People\'s Republic of', 'Korea, Republic of', 'Kuwait', 'Kyrgyzstan', 'Lao, People\'s Democratic Republic', 'Latvia', 'Lebanon', 'Lesotho', 'Liberia', 'Libyan Arab Jamahiriya', 'Liechtenstein', 'Lithuania', 'Luxembourg', 'Macau', 'Macedonia, The Former Yugoslav Republic of', 'Madagascar', 'Malawi', 'Malaysia', 'Maldives', 'Mali', 'Malta', 'Marshall Islands', 'Martinique', 'Mauritania', 'Mauritius', 'Mayotte', 'Mexico', 'Micronesia, Federated States of', 'Moldova, Republic of', 'Monaco', 'Mongolia', 'Montserrat', 'Morocco', 'Mozambique', 'Myanmar', 'Namibia', 'Nauru', 'Nepal', 'Netherlands', 'Netherlands Antilles', 'New Caledonia', 'New Zealand', 'Nicaragua', 'Niger', 'Nigeria', 'Niue', 'Norfolk Island', 'Northern Mariana Islands', 'Norway', 'Oman', 'Pakistan', 'Palau', 'Panama', 'Papua New Guinea', 'Paraguay', 'Peru', 'Philippines', 'Pitcairn', 'Poland', 'Portugal', 'Puerto Rico', 'Qatar', 'Reunion', 'Romania', 'Russian Federation', 'Rwanda', 'Saint Kitts and Nevis', 'Saint Lucia', 'Saint Vincent and the Grenadines', 'Samoa', 'San Marino', 'Sao Tome and Principe', 'Saudi Arabia', 'Senegal', 'Seychelles', 'Sierra Leone', 'Singapore', 'Slovakia (Slovak Republic)', 'Slovenia', 'Solomon Islands', 'Somalia', 'South Africa', 'South Georgia and the South Sandwich Islands', 'Spain', 'Sri Lanka', 'St. Helena', 'St. Pierre and Miquelon', 'Sudan', 'Suriname', 'Svalbard and Jan Mayen Islands', 'Swaziland', 'Sweden', 'Switzerland', 'Syrian Arab Republic', 'Taiwan, Province of China', 'Tajikistan', 'Tanzania, United Republic of', 'Thailand', 'Togo', 'Tokelau', 'Tonga', 'Trinidad and Tobago', 'Tunisia', 'Turkey', 'Turkmenistan', 'Turks and Caicos Islands', 'Tuvalu', 'Uganda', 'Ukraine', 'United Arab Emirates', 'United Kingdom', 'United States', 'United States Minor Outlying Islands', 'Uruguay', 'Uzbekistan', 'Vanuatu', 'Venezuela', 'Vietnam', 'Virgin Islands (British)', 'Virgin Islands (U.S.)', 'Wallis and Futuna Islands', 'Western Sahara', 'Yemen', 'Yugoslavia', 'Zambia', 'Zimbabwe');

    
    $bookingID = isset($_GET['bookingID']) ? $_GET['bookingID'] : null;
    // fetching passenger number
    $adults = isset($_GET['adults']) ? (int)$_GET['adults'] : 0;
    $children = isset($_GET['children']) ? (int)$_GET['children'] : 0;
    $infants = isset($_GET['infants']) ? (int)$_GET['infants'] : 0;

    $totalNumber = $adults+$children+$infants ;
    $numberOfPassenger = 0;

    $totalPrice = isset($_GET['totalPrice']) ? floatval($_GET['totalPrice']) : 0;
    $departureFlightId = isset($_GET['departureFlight']) ? $_GET['departureFlight'] : null;
    $returnFlightId = isset($_GET['returnFlight']) ? $_GET['returnFlight'] : null;
    

    $form = isset($_GET['form']) ? (int)$_GET['form'] : 1;

    if ($form <= $totalNumber) {
        $passengertype = '';
        if ($form <= $adults) {
            $passengertype = 'adult';
        } elseif ($form <= $adults + $children) {
            $passengertype = 'child';
        } else {
            $passengertype = 'infant';
        }

        echo "<div class='passengerFormHeaderWrap'>";
        echo "<form action='passengerProcess.php?form=$form&adults=$adults&children=$children&infants=$infants&bookingID=$bookingID&totalPrice= $totalPrice&departureFlight= $departureFlightId&returnFlight= $returnFlightId' method='POST'>";
        
        echo "<div class='Allpassenger1'>";
        
       
        echo "<div class='passengerFormHeader'>";
        echo "<h2>Passenger Detail Form</h2>";
        echo "<hr>";
        echo "<p class='ptype'>Passenger Type : $passengertype</p>";
        
        
        echo "</div>";
        

       
        echo "<div class='Allpassenger2'>";
        
        echo "<input type='hidden' name='bookingID' value=' $bookingID ' readonly>";
         
        echo "<div class='PassSection'>";
        echo "<p class='headPassenger'>Personal</p>";
        echo "<div class='passengerInput'>";
        echo "<label class ='LforPassenger'>Title:</label>";
        echo "<select name='title' required>";
        echo "<option value='0'>Select Title</option>";
        echo "<option value='Mr'>Mr</option>";
        echo "<option value='Mrs'>Mrs</option>";
        echo "</select >";
        echo "</div>";

        echo "<div class='passengerField'>";
        echo "<div class='passengerInput'>";
        echo "<label class ='LforPassenger'>First Name:</label>";
        echo "<input type='text' name='firstname' required>";
        echo "</div>";
        
        echo "<div class='passengerInput'>";
        echo "<label class ='LforPassenger'>Middle Name: (Optional)</label>";
        echo "<input type='text' name='middlename' >";
        echo "</div>";

        echo "<div class='passengerInput'>";
        echo "<label class ='LforPassenger'>Last Name:</label>";
        echo "<input type='text' name='lastname' required>";
        echo "</div>";
        echo "</div>";

        echo "<div class='passengerField'>";
        echo "<div class='passengerInput'>";
        echo "<label class ='LforPassenger'>Date of Birth:</label>";
        echo "<input type='date' name='dateofbirth' required>";
        echo "</div>";

        echo "<div class='passengerInput'>";
        echo "<label class ='LforPassenger'>Nationality:</label>";
        echo "<select name='nationality' required>";
        echo "<option value='0'>Select Nationality</option>";
        foreach ($countries as $value) {
            echo "<option value='$value'>$value</option>";
        }
        echo "</select>";
        echo "</div>";
        echo "</div>";
        echo "</div>";

        echo "<div class='PassSection'>";
        echo "<p class='headPassenger'>Passport</p>";
        echo "<div class='passengerField'>";
        echo "<div class='passengerInput'>";
        echo "<label class ='LforPassenger'>Passport Number:</label>";
        echo "<input type='text' name='passportno' required>";
        echo "</div>";
        
        
        echo "<div class='passengerInput'>";
        echo "<label class ='LforPassenger'>Passport Issue Date:</label>";
        echo "<input type='date' name='issuedate' required>";
        echo "</div>";

        echo "<div class='passengerInput'>";
        echo "<label class ='LforPassenger'>Passport Expired Date:</label>";
        echo "<input type='date' name='expireddate' required>";
        echo "</div>";

        echo "</div>";
        echo "</div>";


        echo "<div class='PassSection'>";
        echo "<p class='headPassenger'>Contact</p>";
        echo "<div class='passengerField'>";
        echo "<div class='passengerInput'>";
        echo "<label class ='LforPassenger'>Email</label>";
        echo "<input type='text' name='email' required>";
        echo "</div>";
        
        echo "<div class='passengerInput'>";
        echo "<label class ='LforPassenger'>Country Code</label>";
        echo '<select class="countryCode" name="countryCode"  required>';
        echo '    <option value="0">+00</option>';
        echo '    <option value="+43">Austria (+43)</option>';
        echo '    <option value="+61">Australia (+61)</option>';
        echo '    <option value="+55">Brazil (+55)</option>';
        echo '    <option value="+1">Canada (+1)</option>';
        echo '    <option value="+86">China (+86)</option>';
        echo '    <option value="+45">Denmark (+45)</option>';
        
        echo '    <option value="+33">France (+33)</option>';
        echo '    <option value="+358">Finland (+358)</option>';
        echo '    <option value="+353">Ireland (+353)</option>';
        echo '    <option value="+39">Italy (+39)</option>';
        echo '    <option value="+81">Japan (+81)</option>';
        echo '    <option value="+64">New Zealand (+64)</option>';
        echo '    <option value="+31">Netherlands (+31)</option>';
        echo '    <option value="+47">Norway (+47)</option>';
        echo '    <option value="+63">Philippines (+63)</option>';
        echo '    <option value="+62">Indonesia (+62)</option>';
        echo '    <option value="+91">India (+91)</option>';
        echo '    <option value="+52">Mexico (+52)</option>';
        echo '    <option value="+90">Turkey (+90)</option>';
        echo '    <option value="+66">Thailand (+66)</option>';
        echo '    <option value="+65">Singapore (+65)</option>';
        echo '    <option value="+966">Saudi Arabia (+966)</option>';
        echo '    <option value="+27">South Africa (+27)</option>';
        echo '    <option value="+46">Sweden (+46)</option>';
        echo '    <option value="+82">South Korea (+82)</option>';
        echo '    <option value="+7">Russia (+7)</option>';
        echo '    <option value="+971">United Arab Emirates (+971)</option>';
        echo '    <option value="+1">USA (+1)</option>';
        echo '    <option value="+44">United Kingdom (+44)</option>';
                
        echo '    <option value="+84">Vietnam (+84)</option>';
        
        echo '</select>';
        echo "</div>";

        echo "<div class='passengerInput'>";
        echo "<label class ='LforPassenger'>Phone Number</label>";
        echo "<input type='number' name='phno' required>";
        echo "</div>";

       
        echo "</div>";
        echo "</div>";


        echo "<div class='PassSection'>";
        echo "<p class='headPassenger'>Meal </p>";
        echo "<div class='passengerInput'>";
        echo "<label class ='LforPassenger'>Preferred Meal</label>";
        echo "<select name='meals' required>";
        echo "<option value='0'>Select Meals</option>";
        echo "<option value='Regular Meal'>Regular Meal</option>"; 
        echo "<option value='Vegetarian Meal'>Vegetarian Meal</option>";
        echo "<option value='Diabetic Meal'>Diabetic Meal</option>";
        echo "<option value='Hindu Meal'>Hindu Meal</option>";
        echo "<option value='Baby Meal'>Baby Meal</option>";
        echo "</select >";
        echo "</div>";

        echo "<br><br>";

        echo "<div class='subButton'>";
        echo "<button class='submitPdetail' type='submit'>Next</button>";
        echo "</div>";

        echo "</div>";

        
        
        echo "</form>";
        echo "</div>";
    }    
    

    ?>


    <script>StepByStep(<?php echo $currentStep; ?>);</script>
    <script src="SAE.js">  </script>
</body>
</html>