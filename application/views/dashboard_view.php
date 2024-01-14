<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-between mb-3">
        <h2>Contact List</h2>
        <div>
            <a href="<?= base_url('dashboard/add_contact') ?>" class="btn btn-primary">Add Contact</a>
            <a href="<?= base_url('logout') ?>" class="btn btn-danger">Logout</a>
        </div>
    </div>

    <!-- Table to display contacts -->
    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($contacts as $contact): ?>
            <tr>
                <td><?= $contact->id ?></td>
                <td><?= $contact->name ?></td>
                <td><?= $contact->email ?></td>
                <td><?= $contact->phone ?></td>
                <td>
                    <a href="<?= base_url('dashboard/edit_contact/' . $contact->id) ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="<?= base_url('dashboard/delete_contact/' . $contact->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this contact?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>



<!-- Include Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
