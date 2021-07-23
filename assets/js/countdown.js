// Setup End Date for Countdown (getTime == Time in Milleseconds)
// let launchDate = new Date("Nov 08, 2021 9:00:00").getTime();
let launchDate = new Date("Aug 20, 2021 9:00:00").getTime();

// Setup Timer to tick every 1 second
const countdown = () => {
  let now = new Date().getTime();
  // Get the difference in time to get time left until reaches 0
  let t = launchDate - now;
  if (t > 0) {
    // Algorithm to calculate days...
    let days = Math.floor(t / (1000 * 60 * 60 * 24));
    // prefix any number below 10 with a "0" E.g. 1 = 01
    if (days < 10) {
      days = "0" + days;
    }
    // Algorithm to calculate hours
    let hours = Math.floor((t % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    if (hours < 10) {
      hours = "0" + hours;
    }
    // Algorithm to calculate minutes
    let mins = Math.floor((t % (1000 * 60 * 60)) / (1000 * 60));
    if (mins < 10) {
      mins = "0" + mins;
    }
    // Algorithm to calc seconds
    let secs = Math.floor((t % (1000 * 60)) / 1000);
    if (secs < 10) {
      secs = "0" + secs;
    }
    document.querySelector(".day").innerText = days;
    document.querySelector(".hour").innerText = hours;
    document.querySelector(".minute").innerText = mins;
    document.querySelector(".second").innerText = secs;
  }
};

countdown();

let timer = setInterval(countdown, 1000);
