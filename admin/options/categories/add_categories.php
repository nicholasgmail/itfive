<?php
//подключаем базу даних
include $_SERVER['DOCUMENT_ROOT'] . "/configs/db.php";
//устанавливаем страницу
$page = "Добавить категорию";


if (isset($_POST['submit'])) {

    $img = addslashes(file_get_contents($_FILES['img_upload']['tmp_name']));

    $sql = "INSERT INTO categories (title, description, cost, img) VALUES ('" . $_POST['title'] . "', '" . $_POST['description'] . "', '" . $_POST['cost'] . "', '$img')";
    if($connect->query($sql)){
        header("Location: /admin/categories.php");
    } else {
        echo "Error";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/admin/parts/head.php" ?>
</head>

<body id="page-top">
<div id="wrapper">
    <!-- Sidebar -->
    <?php
    include $_SERVER['DOCUMENT_ROOT'] . "/admin/parts/nav.php"
    ?>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <!-- TopBar -->
            <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
                <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

            </nav>
            <!-- Topbar -->
            <!-- Container Fluid-->
            <div class="container-fluid" id="container-wrapper">
                    <!--breadcrumb-->
                        <?php
                        include $_SERVER['DOCUMENT_ROOT'] . "/admin/parts/breadcrumb.php"
                        ?>
                <!-- Row -->
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Название</label>
                                                <input name="title" type="text" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Описание</label>
                                                <textarea name="description" type="text" class="form-control" placeholder=""></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Цена</label>
                                                <input name="cost" type="text" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Картинка</label><br>
                                            <input type="file" name="img_upload" class="">
                                        </div>
                                    </div>
                                    <button name="submit" value="1" type="submit" class="btn btn-outline-success btn-fill pull-right">Добавить категорию</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Row-->
            </div>
            <!---Container Fluid-->
        </div>

        <!-- Footer -->
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/admin/parts/footer.php" ?>
        <!-- Footer -->
    </div>
</div>
</div>

<!-- Scroll to top -->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<?php
include $_SERVER['DOCUMENT_ROOT'] . "/admin/parts/scripts.php"
?>

<!-- Page level custom scripts -->
<script>
    $(document).ready(function () {
        $('#dataTable').DataTable(); // ID From dataTable
        $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
</script>
</body>

</html>
