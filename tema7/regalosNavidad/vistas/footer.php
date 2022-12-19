<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body>
    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    <footer class="sticky-footer bg-info">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span class="text-light">Copyright &copy; DIEGO 2022</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script>
        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';

        // Pie Chart Example
        var ctx = document.getElementById("myPieChart");
        var myPieChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ["Completado", "no"],
                datasets: [{
                    data: [50, 50],
                    backgroundColor: ['#4e73df', '#1cc88a'],
                    hoverBackgroundColor: ['#2e59d9', '#17a673'],
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                }],
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                },
                legend: {
                    display: false
                },
                cutoutPercentage: 80,
            },
        });
    </script>
    <script src="js/demo/chart-bar-demo.js"></script>
    <!-- MODAL INSERTAR REGALO -->
    <div class="modal fade" id="insertar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nuevo Regalo</h5>
                </div>
                <div class="modal-body">
                    <form id='formInsertar'>
                        <div class='mb-3'>
                            <label for='nombre' class='form-label'>Nombre Regalo</label>
                            <input type="text" class='form-input' name="nombre" required>
                        </div>
                        <div class='mb-3'>
                            <label for='destinatario' class='form-label'>Destinatario</label>
                            <input type="text" class='form-input' name="destinatario" required>
                        </div>
                        <div class='mb-3'>
                            <label for='precio' class='form-label'>Precio</label>
                            <input type="number" min="0.00" step="0.01" name="precio" required />€
                        </div>

                        <div class='mb-3'>
                            <label for='estado' class='form-label'>Estado</label> <br>
                            <select class="form-select" name='estado' aria-label="Default select example">
                                <option name='estado' value="Pendiente">Pendiente</option>
                                <option name='estado' value="Comprado">Comprado</option>
                                <option name='estado' value="Envuelto">Envuelto</option>
                                <option name='estado' value="Entregado">Entregado</option>
                            </select>

                        </div>

                        <div class='mb-3'>
                            <label for='year' class='form-label'>Year</label>
                            <input type="number" min="1900" max="2099" step="1" value="2022" name="year" required />
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <!--<button type="button" class="btn btn-secondary hidden-xs" data-bs-dismiss="modal">Close</button>-->
                    <button type='submit' name='insertar' class='btn btn-info' form="formInsertar"
                        formaction="./enrutador.php" formmethod="get">Añadir</button>
                </div>
            </div>
        </div>
    </div>


    <!-- MODAL INSERTAR ENLACE -->
    <div class="modal fade" id="insertarEnlace" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nuevo Enlace</h5>
                </div>
                <div class="modal-body">
                    <form id='formInsertarEnlace' enctype="multipart/form-data">
                        <div class='mb-3'>
                            <label for='nombre' class='form-label'>Nombre Enlace</label>
                            <input type="text" class='form-input' name="nombre" required>
                        </div>
                        <div class='mb-3'>
                            <label for='link' class='form-label'>Link</label>
                            <input type="text" class='form-input' name="link" required>
                        </div>
                        <div class='mb-3'>
                            <label for='precio' class='form-label'>Precio</label>
                            <input type="number" min="0.00" step="0.01" name="precio" required />€
                        </div>

                        <div class='mb-3'>
                            <label class="form-label">Imagen</label>
                            <input type="file" class="form-control" name="cartel">

                        </div>

                        <div class='mb-3'>
                            <label for='prioridad' class='form-label'>Prioridad</label>
                            <input type="number" min="0" max="2" step="1" name="prioridad" required />
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <!--<button type="button" class="btn btn-secondary hidden-xs" data-bs-dismiss="modal">Close</button>-->
                    <button type='submit' name='insertarEnlace' class='btn btn-info' form="formInsertarEnlace"
                        formaction="./enrutador.php" formmethod="POST">Añadir</button>
                </div>
            </div>
        </div>
    </div>






</body>

</html>