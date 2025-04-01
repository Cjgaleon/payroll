<?php include("./components/user_layout.php"); ?>     
        <h2>Welcome, <?php echo $_SESSION['firstName']." ".$_SESSION["lastName"]  ?></h2>
<div class="card">
    <h4>Attendance Tracker</h4>
    <p>Click "Start Attendance" to begin your work session.</p>
    <button id="startBtn" class="btn btn-success">Start Attendance</button>
    <button id="stopBtn" class="btn btn-danger" disabled>Stop Attendance</button>
    <p id="timer">00:00:00</p>
</div>

<script>
    let startTime, interval;
    
    document.getElementById('startBtn').addEventListener('click', function() {
        startTime = new Date().getTime();
        localStorage.setItem("attendanceStartTime", startTime);
        this.disabled = true;
        document.getElementById('stopBtn').disabled = false;
        startTimer();
    });

    document.getElementById('stopBtn').addEventListener('click', function() {
        let endTime = new Date().getTime();
        let elapsedTime = Math.floor((endTime - startTime) / 1000); // Convert to seconds

        localStorage.removeItem("attendanceStartTime");

        clearInterval(interval);
        document.getElementById('startBtn').disabled = false;
        this.disabled = true;

        // Send data to PHP
        fetch("../datas/save_attendance.php", {
            method: "POST",
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
            body: `elapsedTime=${elapsedTime}`
        }).then(response => response.text()).then(data => alert(data));
    });

    function startTimer() {
        interval = setInterval(() => {
            let currentTime = new Date().getTime();
            let elapsed = Math.floor((currentTime - startTime) / 1000);
            let hours = Math.floor(elapsed / 3600);
            let minutes = Math.floor((elapsed % 3600) / 60);
            let seconds = elapsed % 60;
            document.getElementById('timer').innerText =
                `${String(hours).padStart(2, '0')}:${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
        }, 1000);
    }

    // Restore timer if page reloads
    if (localStorage.getItem("attendanceStartTime")) {
        startTime = parseInt(localStorage.getItem("attendanceStartTime"));
        document.getElementById('startBtn').disabled = true;
        document.getElementById('stopBtn').disabled = false;
        startTimer();
    }
</script>
