<h2>Admin Details</h2>
<div class="admin-card">
    <div class="card mt-3">
        <div class="card-body">
            <div class="form-group">
                <label for="user">User ID:</label>
                <input type="text" id="user" class="form-control" value="<?= $user['id']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" class="form-control" value="<?= $user['name']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" class="form-control" value="<?= $user['email']; ?>" readonly>
            </div>
        </div>
    </div>
</div>