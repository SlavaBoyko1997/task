<?php
require_once '../app/models/User.php';
require_once 'layouts/header.php';
$users = getUsers($link);

if (isset($_GET['sort']) AND isset($_GET['column'])) {
    $sort = $_GET['sort'];
    $users =  sortUsers($link,$_GET['sort'],$_GET['column']);
    }
?>

        <a href="/"> Import data </a>
    <?php if (!empty($users)):?>
    <div class="modal">
        <form method="post" action="../controllers/exportToCSV.php" >
            <div class="example-2">
                <div class="form-group">
                    <input type="submit"  id="submit"  name="export" value="Export to CSV">
                </div>
            </div>
        </form>
    <table class="table_dark">
    <?php $sort == 'DESC' ? $sort = 'ASC' : $sort = 'DESC'; ?>
        <tr>
            <th><a href="?column=UID&&sort=<?=$sort?>">UID</a></th>
            <th><a href="?column=name&&sort=<?=$sort?>">name</a></th>
            <th><a href="?column=age&&sort=<?=$sort?>">age</a></th>
            <th><a href="?column=Email&&sort=<?=$sort?>">Email</a></th>
            <th><a href="?column=Phone&&sort=<?=$sort?>">Phone</a></th>
            <th><a href="?column=Gender&&sort=<?=$sort?>">Gender</a></th>
        </tr>

        <?php foreach ($users as $user):?>
        <tr>
            <td><?= $user['UID'] ?></td>
            <td><?= $user['name'] ?></td>
            <td><?= $user['age'] ?></td>
            <td><?= $user['Email'] ?></td>
            <td><?= $user['Phone'] ?></td>
            <td><?= $user['Gender'] ?></td>
        </tr>
        </div>
        <?php endforeach;?>
    </table>
    <?php else:?>
        <h3>Добавте дані</h3>
    <?php endif;?>


</body>
<?php require_once 'layouts/footer.php';