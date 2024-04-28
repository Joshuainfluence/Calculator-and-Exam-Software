
    // Set the countdown time (30 minutes)
    var countdownMinutes = 30;
    var countdownSeconds = countdownMinutes * 60;

    var timer = setInterval(function() {
        countdownSeconds--;
        var minutes = Math.floor(countdownSeconds / 60);
        var seconds = countdownSeconds % 60;

        // Display the countdown timer
        document.getElementById('timer').innerHTML = minutes + "m " + seconds + "s";

        // Check if time is up
        if (countdownSeconds <= 0) {
            clearInterval(timer);
            // Automatically submit the form when time is up
            document.getElementById("examForm").submit();
        }
    }, 1000);

