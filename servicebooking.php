<?php
// Include your database connection code here
include 'config.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST['date']) && isset($_POST['slot'])) {
  $selectedDate = $_POST['date'];
  $selectedSlot = $_POST['slot'];

  // Insert the booked slot into the database
  $query = "INSERT INTO servicebooking(service_date, service_time) VALUES ('$selectedDate', '$selectedSlot')";
  $result = mysqli_query($conn, $query);

  if ( mysqli_query($conn, $query)) {
    echo "success";
  } else {
    echo "error";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Badminton Service Booking</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<style>
/* Styles for calendar */
#calendar {
  display: grid;
  grid-template-columns: repeat(7, 1fr);
  grid-gap: 5px;
}

.day {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 50px;
  border: 1px solid #ccc;
}

.day.booked {
  background-color: #ff0000; /* Change color for booked slots */
}

.slot {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 30px;
  background-color: #fff;
  border: 1px solid #ccc;
  cursor: pointer;
}

</style>
<body>
  <h1>Badminton Service Booking</h1>

  <div id="calendar"></div>

  <script>
    // Generate calendar
    const calendar = document.getElementById("calendar");
    const daysOfWeek = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];

    for (let i = 0; i < daysOfWeek.length; i++) {
      const day = document.createElement("div");
      day.classList.add("day");
      day.textContent = daysOfWeek[i];
      calendar.appendChild(day);
    }

    const currentDate = new Date();
    const currentYear = currentDate.getFullYear();
    const currentMonth = currentDate.getMonth();
    const maxDate = new Date(currentYear, currentMonth + 3, 0).getDate();

    for (let i = 1; i <= maxDate; i++) {
      const day = document.createElement("div");
      day.classList.add("day");
      day.textContent = i;
      calendar.appendChild(day);

      day.addEventListener("click", function () {
        if (this.classList.contains("booked")) {
          alert("Slot is already booked.");
        } else {
          const date = new Date();
          date.setFullYear(currentYear, currentMonth, i);
          const formattedDate = date.toISOString().split('T')[0];

          // Make an AJAX request to get time slots for the selected date
          const xhr = new XMLHttpRequest();
          xhr.open("GET", "get_time_slots.php?date=" + formattedDate, true);
          xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
              if (xhr.status === 200) {
                try {
                  const timeSlots = JSON.parse(xhr.responseText);
                  showTimeSlots(timeSlots, formattedDate);
                } catch (error) {
                  console.error("Error parsing time slots:", error);
                  alert("Failed to retrieve time slots. Please try again later.");
                }
              } else {
                alert("Request failed with status: " + xhr.status);
              }
            }
          };
          xhr.send();
        }
      });
    }

    function showTimeSlots(timeSlots, date) {
      const timeSlotWindow = window.open('', 'Time Slots', 'width=300,height=200');
      const timeSlotDocument = timeSlotWindow.document;
      timeSlotDocument.write('<html><body>');
      timeSlotDocument.write('<h2>Select a time slot:</h2>');
      timeSlotDocument.write('<div id="timeSlotsContainer"></div>');
      timeSlotDocument.write('</body></html>');

      const timeSlotsContainer = timeSlotDocument.getElementById('timeSlotsContainer');

      timeSlots.forEach(slot => {
        const slotElement = timeSlotDocument.createElement('div');
        slotElement.classList.add('slot');
        slotElement.textContent = slot;
        slotElement.addEventListener('click', function() {
          bookSlot(date, slot);
          timeSlotWindow.close();
        });
        timeSlotsContainer.appendChild(slotElement);
      });
    }

    function bookSlot(date, slot) {
      const xhr = new XMLHttpRequest();
      xhr.open("POST", "servicebooking.php", true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
            try {
              const response = xhr.responseText.trim(); // Remove leading/trailing spaces
              console.log("Response:", response); // Log the response to check its value
              if (response === "success") {
                const dayElements = Array.from(calendar.getElementsByClassName("day"));
                const slotElements = Array.from(calendar.getElementsByClassName("slot"));
                const dayElement = dayElements.find(element => element.textContent.trim() === date.split('-')[2]);
                const slotElement = slotElements.find(element => element.textContent.trim() === slot);
                
                if (elements.length > 0) {
  elements[0].classList.add("booked");
  alert("Slot booked successfully.");
} else {
  alert("Failed to book the slot.");
}
              } else {
                alert("Failed to book the slot.");
              }
            } catch (error) {
              console.error("Error processing booking response:", error);
              alert("Failed to process the booking. Please try again later.");
            }
          } else {
            alert("Request failed with status: " + xhr.status);
          }
        }
      };
      xhr.send(`date=${date}&slot=${slot}`);
    }
  </script>
</body>
</html>
