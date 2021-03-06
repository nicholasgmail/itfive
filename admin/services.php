<?php
//подключаем базу даних
include $_SERVER['DOCUMENT_ROOT'] . "/configs/db.php";


//устанавливаем страницу
$page = "Услуги"
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
                <?php include $_SERVER['DOCUMENT_ROOT'] . "/admin/parts/top-bar.php" ?>
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
                    <!-- DataTable with Hover -->
                    <div id="" class="col-lg-12">
                       <div class="card-header">
                                <a  href="http://itfive.local/admin/options/services/add_service.php" class="btn btn-outline-success">Добавить Услугу</a>
                            </div>
                        <div class="card mb-4 text-center">


                            <div class="card-body table-full-width table-responsive">
                                <table class="table" id="table_orders">
                                  <thead>
                                    <tr>
                                      <th scope="col">№</th>
                                      <th scope="col">Название</th>
                                      <th scope="col">Короткое описание</th>
                                      <th scope="col">Полное описание</th>
                                      <th scope="col">Цена</th>
                                    </tr>
                                  </thead>

                                        <tbody>
                                                <?php
                                                $sql = "SELECT * FROM services";
                                                $result = $connect->query($sql);
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    ?>

                                                    <tr>
                                                        <td><?php echo $row['id']; ?></td>
                                                        <td><?php echo $row['title']; ?></td>
                                                        <td><?php echo $row['short_description']; ?> $</td>
                                                        <td><?php echo $row['full_description']; ?> $</td>
                                                        <td><?php echo $row['cost']; ?> $</td>
                                                        <td>
                                                            <a class="btn-group" role="group" aria-label="Basic example">
                                                                <a href="options/services/edit_service.php?id=<?php echo $row['id']; ?>"  class="btn btn-outline-info">Редактировать</a>
                                                                 <a href="options/services/delete_service.php?id=<?php echo $row['id']; ?>"  class="btn btn-outline-danger">Удалить</a>

                                                            </div>

                                                        </td>
                                                    </tr>
                                                    <?php
                                                    }
                                                    ?>
                                        </tbody>
                                    </table>

                            </div>
                    </div>
                </div>
                <!--Row-->
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
