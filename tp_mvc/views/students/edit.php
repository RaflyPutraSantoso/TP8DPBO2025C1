<?php
if(!isset($student)) {
    header("Location: index.php?action=index");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="../index.php">Home</a>
            <a class="btn btn-outline-light" href="index.php?action=index">Student List</a>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="card shadow">
            <div class="card-header">
                <h3 class="mb-0">Edit Student</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="index.php?action=update&id=<?= $student['id'] ?>">
                    <div class="mb-3">
                        <label class="form-label">Full Name</label>
                        <input type="text" name="name" class="form-control" 
                               value="<?= htmlspecialchars($student['name']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">NIM</label>
                        <input type="text" name="nim" class="form-control" 
                               value="<?= $student['nim'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Phone Number</label>
                        <input type="tel" name="phone" class="form-control" 
                                value="<?= $student['phone'] ?>" pattern="[0-9]{10,15}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Join Date</label>
                        <input type="date" name="join_date" class="form-control" 
                                value="<?= $student['join_date'] ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>

    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>