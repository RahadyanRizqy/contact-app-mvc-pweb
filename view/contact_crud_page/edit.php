<h2>Admin Details</h2>
<div class="admin-card">
    <div class="card mt-3">
        <div class="card-body">
            <form action="<?= urlpath("contacts/edit?id=".$contact[0]['id']); ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="phone_number">Phone Number:</label>
                    <input type="text" name="phone_number" id="phone_number" class="form-control" placeholder="081234567890" value="<?= $contact[0]['phone_number'] ?>">
                </div>
                <div class="form-group">
                    <label for="owner">Owner:</label>
                    <input type="text" name="owner" id="owner" class="form-control" placeholder="Arcueid" value="<?= $contact[0]['owner'] ?>">
                </div>
                <div class="form-group">
                    <label for="city">Cities:</label>
                    <select name="city" id="city">
                        <?php
                            for ($i = 0; $i < count($cities); $i++) {
                        ?>
                                <option value="<?= $cities[$i]['id']; ?>"><?= $cities[$i]['city']; ?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Save</button>
            </form>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
const cityId = parseInt(<?= json_encode($contact[0]['city_fk']); ?>) ?? 0;
$(document).ready(function() {
    $('#city').val(cityId);
});
</script>