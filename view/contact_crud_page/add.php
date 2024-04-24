<h2>Admin Details</h2>
<div class="admin-card">
    <div class="card mt-3">
        <div class="card-body">
            <form action="<?=BASEURL?>contacts/add" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="phone_number">Phone Number:</label>
                    <input type="text" name="phone_number" id="phone_number" class="form-control" placeholder="081234567890">
                </div>
                <div class="form-group">
                    <label for="owner">Owner:</label>
                    <input type="text" name="owner" id="owner" class="form-control" placeholder="Arcueid">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Save</button>
            </form>
        </div>
    </div>
</div>