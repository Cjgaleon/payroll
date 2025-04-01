
<?php include("./components/admin_layout.php"); ?>

<h2>Welcome, <?php echo $_SESSION['firstName']." ".$_SESSION["lastName"]  ?></h2>
        <div class="row">
            <div class="col-md-4">
                <div class="card p-3">
                    <h5>Total Employees</h5>
                    <p>120</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-3">
                    <h5>Pending Leave Requests</h5>
                    <p>5</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-3">
                    <h5>Payrolls Processed</h5>
                    <p>30 This Month</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
