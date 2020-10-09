// Update the count down every 1 second
if(document.getElementById('adsterCountdown') != null){
    var x = setInterval(function() {
        var countDown = document.getElementById('adsterCountdown').innerHTML * 1000;
        console.log(countDown);
        var now = (new Date().getTime());
        console.log(now);
        var distance = countDown - now;
        console.log(distance);
        if(distance > 0){
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            days = ('00'+days).slice(-2);
            minutes = ('00'+minutes).slice(-2);
            hours = ('00'+hours).slice(-2);
            seconds = ('00'+seconds).slice(-2);
        
            document.getElementById("timerDays").innerHTML = days;
            document.getElementById("timerHours").innerHTML = hours;
            document.getElementById("timerMin").innerHTML = minutes;
            document.getElementById("timerSec").innerHTML = seconds;
        }
        if (distance < 0) {
            clearInterval(x);
        }
    }, 1000);
}
