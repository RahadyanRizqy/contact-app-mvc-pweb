<h2>Phone Numbers Table</h2>
<a href="<?=BASEURL?>contacts/add" class="btn btn-success mb-3">Tambah</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Phone Number</th>
            <th>Owner</th>
            <th>City</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php
        if (isset($contacts)) {
            $i = 1;
            foreach ($contacts as $c) {
                if ($c['deleted_at'] == NULL && $c['user_fk'] == $user['id']) {
    ?>
        <tr>
            <td><?= $i ?></td>
            <td><?= $c['phone_number']; ?></td>
            <td><?= $c['owner']; ?></td>
            <td><?= $c['city']; ?></td>
            <td>
                <a href="<?= urlpath("contacts/edit?id=".$c['id']); ?>" class="btn btn-primary">Edit</a>
                <a href="<?= urlpath("contacts/remove?id=".$c['id']); ?>" class="btn btn-danger">Delete</a>
            </td>
        </tr>
    <?php
                    $i++;
                }
            }
        }
    ?>
    </tbody>
</table>