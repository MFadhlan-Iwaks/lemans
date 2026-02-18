
const raceDate = new Date("June 15, 2026 15:00:00").getTime();


const timer = setInterval(function() {
    const now = new Date().getTime();
    const distance = raceDate - now;


    const days = Math.floor(distance / (1000 * 60 * 60 * 24));
    const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    const seconds = Math.floor((distance % (1000 * 60)) / 1000);


    document.getElementById("timer").innerHTML = 
        days + "d " + hours + "h " + minutes + "m " + seconds + "s ";


    if (distance < 0) {
        clearInterval(timer);
        document.getElementById("timer").innerHTML = "RACE STARTED!";
    }
}, 1000);

window.addEventListener('scroll', function() {
    const header = document.querySelector('.navbar');
    header.classList.toggle('sticky', window.scrollY > 0);
});