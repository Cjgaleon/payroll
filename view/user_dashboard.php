<?php include("./components/user_layout.php"); ?>     
        <h2>Welcome, <?php echo $_SESSION['firstName']." ".$_SESSION["lastName"]  ?></h2>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <h5>Last Salary</h5>
                    <p>$3000 - March 2025</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <h5>Next Payday</h5>
                    <p>April 15, 2025</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <h5>Pending Leave Requests</h5>
                    <p>2 Requests</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>