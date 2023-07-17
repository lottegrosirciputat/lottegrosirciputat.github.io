dateToday = new Date();
timeNow = dateToday.getTime();
dateToday.setTime(timeNow);
hour = dateToday.getHours();

if ( hour > 18 ) greeting = "Evening";
else if ( hour > 12 ) greeting = "Afternoon";
else greeting = "Morning";

document.getElementById("greeting").textContent = greeting;