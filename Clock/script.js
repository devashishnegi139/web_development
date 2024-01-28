let timeElement = document.getElementById("time");

setInterval(() => {
    let now = new Date();
    let timeString = now.toLocaleTimeString();
    let dateString = now.toLocaleDateString();

    timeElement.innerHTML = `Time - ${timeString}<br>Date - ${dateString}`;
}, 1000);
