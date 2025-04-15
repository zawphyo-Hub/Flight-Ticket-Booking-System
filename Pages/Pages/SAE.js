// ---------------Search Function For Trip Type---------------------
function oneWayTrip() {
    const tripType = document.getElementById("tripType").value;
    const returnDateField = document.getElementById("return-field");
    const searchReturnDate = document.getElementById("searchReturn")
    if (tripType === "oneWay") {
        returnDateField.classList.add("hidden");
        returnDateField.disabled = true;
        searchReturnDate.style.display = "none";
    } else {
        returnDateField.classList.remove("hidden");
        returnDateField.disabled = false;
        searchReturnDate.style.display = "block";
    }
}

// -----------------Handling for return flight-----------------------
function selectFlight(flightId) {
    const tripType = document.getElementById("tripType").value;

    if (tripType === "roundTrip") {
        
        window.location.href = "flightForReturn.php?departureFlight=" + flightId;
    } else {
        
        window.location.href = "payment.php?flightId=" + flightId;
    }
}

//----------------For displaying flight schedule on detail form-----------------

document.addEventListener('DOMContentLoaded', () => {
    function addSchedule() {
        
        let scheduleForm = document.getElementById('scheduleDetailForm');
        let formData = new FormData(scheduleForm);

        
        let requiredFields = ['flightnumber', 'departureairport', 'arrivalairport', 'departuredate', 'arrivaldate', 'departuretime', 'arrivaltime', 'class', 'price'];
        for (let field of requiredFields) {
            if (!formData.get(field)) {
                alert('Fill out all required information.');
                return; 
            }
        }


        let scheduleid = formData.get('scheduleid');
        let airline = formData.get('airline');
        let flightnumber = formData.get('flightnumber');
        let departureairport = formData.get('departureairport');
        let departuredate = formData.get('departuredate');
        let departuretime = formData.get('departuretime');
        let arrivalairport = formData.get('arrivalairport');
        let arrivaldate = formData.get('arrivaldate');
        let arrivaltime = formData.get('arrivaltime');
        let Class = formData.get('class');
        let Price = formData.get('price');

        
        let table = document.querySelector('#scheduledisplay tbody');
        if (table) {
            let row = document.createElement('tr');
            row.innerHTML = `
            <td><input type="hidden" name="scheduleid[]" value="${scheduleid}">${scheduleid}</td>
            <td><input type="hidden" name="airline[]" value="${airline}">${airline}</td>
            <td><input type="hidden" name="flightnumber[]" value="${flightnumber}">${flightnumber}</td>
            <td><input type="hidden" name="departureairport[]" value="${departureairport}">${departureairport}</td>
            <td><input type="hidden" name="departuredate[]" value="${departuredate}">${departuredate}</td>
            <td><input type="hidden" name="departuretime[]" value="${departuretime}">${departuretime}</td>
            <td><input type="hidden" name="arrivalairport[]" value="${arrivalairport}">${arrivalairport}</td>
            <td><input type="hidden" name="arrivaldate[]" value="${arrivaldate}">${arrivaldate}</td>
            <td><input type="hidden" name="arrivaltime[]" value="${arrivaltime}">${arrivaltime}</td>
            <td><input type="hidden" name="class[]" value="${Class}">${Class}</td>
            <td><input type="hidden" name="price[]" value="${Price}">${Price}</td>
            `;
            table.appendChild(row);
        } else {
            console.error('Table element not found');
        }

        
        scheduleForm.reset();
    }

   
    document.querySelector('.confirm').addEventListener('click', addSchedule);
});
// -------------------Drop down for choosing passenger -----------------

const optionMenu = document.querySelector(".passengerSelect"),
      selectBtn = optionMenu.querySelector(".select-btn"),
      passText = optionMenu.querySelector(".passType"),
      adultsNo = optionMenu.querySelector("#adults"),
      childrenNo = optionMenu.querySelector("#children"),
      infantsNo = optionMenu.querySelector("#infants");
     

selectBtn.addEventListener("click", () => {
    optionMenu.classList.toggle("active") ;
   })

function updatePassengerNo() {
    const adults = parseInt(adultsNo.value) || 0;
    const children = parseInt(childrenNo.value) || 0;
    const infants = parseInt(infantsNo.value) || 0;

    let passengerText = '';
    const totalPassengers = adults + children + infants;

    if (totalPassengers === 0) {
        passengerText = 'Passenger';
    } else if (totalPassengers === 1) {
        passengerText = '1 Passenger';
    } else {
        passengerText = `${totalPassengers} Passengers`;
    }

    passText.innerText = passengerText;
}

updatePassengerNo();
// ------------------Change Flight Confirmation ----------------------//
function ConfirmChangeFlight(){
    if(confirm("You will need to search the flight again. Are You Sure?")){
        
        window.location.href="flight.php";
    }
}

//-----------Steps for flight bookings(Navigation steps)------------//
function StepByStep(step) {
    const steps = document.querySelectorAll('.step');
    
    steps.forEach((el, index) => {
      if (index < step) {
        el.classList.add('active');
      } else {
        el.classList.remove('active');
      }
    });
}





