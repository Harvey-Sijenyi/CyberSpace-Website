// JavaScript to check appointment availability
function checkAvailability(date, time) {
    // You can implement the server-side logic here to check if the appointment is available
    // For demonstration purposes, let's assume the appointment is booked if the date and time match with any existing appointment
    var existingAppointments = [
        { date: "2023-07-31", time: "09:00 AM" },
        { date: "2023-08-01", time: "10:00 AM" },
        // Add more existing appointments as needed
    ];

    for (var i = 0; i < existingAppointments.length; i++) {
        if (existingAppointments[i].date === date && existingAppointments[i].time === time) {
            return false; // Appointment is already booked
        }
    }

    return true; // Appointment is available
}

function validateForm() {
    var selectedDate = document.getElementById("appointment_date").value;
    var selectedTime = document.getElementById("appointment_time").value;

    if (!checkAvailability(selectedDate, selectedTime)) {
        document.getElementById("availability_message").innerHTML = "Sorry, the selected date and time are already booked. Please choose another.";
        return false;
    }

    return true;
}
