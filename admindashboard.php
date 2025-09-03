<?php
include "session_check.php";
if ($_SESSION['role'] !== 'admin') {
    header("Location: index.html");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - StartConnect</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">StartConnect</a>
            <span class="navbar-text text-white">
                Admin Dashboard | <?php echo $_SESSION['email']; ?>
            </span>
            <a href="logout.php" class="btn btn-outline-light">Logout</a>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h2>Welcome to Admin Dashboard</h2>
                        <p>Manage users and system settings.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>