<!DOCTYPE html>
<html>
<head>
    <title>Student List</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <style>
        .action-buttons .btn {
            margin: 2px;
            min-width: 70px;
        }
        th:nth-child(1), td:nth-child(1) { width: 60px; text-align: center; } /* Atur lebar kolom "No" */
    </style>
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">Home</a>
            <a class="btn btn-success" href="index.php?action=create">
                <i class="bi bi-plus-circle"></i> Add New
            </a>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h3 class="mb-0">Student Management</h3>
            </div>
            <div class="card-body">
                <table class="table table-hover table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th> 
                            <th>Nama</th>
                            <th>NIM</th>
                            <th>Phone</th>
                            <th>Join Date</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $counter = 1; ?>
                        <?php foreach ($students as $student): ?>
                        <tr>
                            <td><?= $counter++ ?></td> 
                            <td><?= htmlspecialchars($student['name']) ?></td>
                            <td><?= $student['nim'] ?></td>
                            <td><?= $student['phone'] ?? '-' ?></td>
                            <td><?= date('d M Y', strtotime($student['join_date'])) ?></td>
                            <td class="action-buttons text-center">
                                <a href="index.php?action=edit&id=<?= $student['id'] ?>" 
                                   class="btn btn-warning btn-sm">
                                   <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                
                                <button class="btn btn-danger btn-sm" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#deleteModal" 
                                        data-id="<?= $student['id'] ?>">
                                    <i class="bi bi-trash"></i> Delete
                                </button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation -->
    <div class="modal fade" id="deleteModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title">Confirm Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>Serius mau hapus data ini?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <a id="confirmDelete" href="#" class="btn btn-danger">Delete selamanya</a>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#deleteModal').on('show.bs.modal', function(event) {
            const button = $(event.relatedTarget);
            const studentId = button.data('id');
            $('#confirmDelete').attr('href', `index.php?action=delete&id=${studentId}`);
        });
    });
    </script>
</body>
</html>