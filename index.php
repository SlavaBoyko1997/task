<?php require_once 'views/layouts/header.php'?>
<body>
    <div class="modal">
        <form method="post" action="controllers/usersAddFromCSV.php" enctype="multipart/form-data">
            <div class="example-2">
                <div class="form-group">
                    <input required type="file" name="file" id="file" class="input-file" datafld="csv" >
                    <label for="file" class="btn btn-tertiary js-labelFile">
                        <i class="icon fa fa-check"></i>
                        <span class="js-fileName">Загрузити файл CSV</span>
                    </label>
                    <input type="submit"  id="submit"  name="import" value="Import">
                </div>
            </div>
        </form>
        <div>
            <p>
                <a id="submitDelete" href="controllers/deleteUsers.php"> Clear all records </a>
            </p>
        </div>

        <a href="views/usersShow.php"> View results </a>
    </div>
</body>
<?php require_once 'views/layouts/footer.php';
