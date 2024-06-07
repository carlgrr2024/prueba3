<?php require_once "config/conexion.php"; ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title>Pagina Principal</title>

    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
 
    <link href="assets/css/styles.css" rel="stylesheet" />
    <link href="assets/css/estilos.css" rel="stylesheet" />
    <link rel="stylesheet" href="estilos2.css">
</head>

<body>
    <a href="#" class="btn-flotante" id="btnCarrito">Carrito <span class="badge bg-success" id="carrito">0</span></a>
    <!-- Navigation-->  
    <div class="container py-5">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                             
        <header class="header">
		    <div class="container">
		        <div class="btn-menu">
			    <label for="btn-menu">☰</label>
		        </div>
			    <div class="logo">
				    <h1>MENU</h1>
			    </div>
			    <nav class="menu">
                <a href="./about.html">Quienes somos?</a>
                <a href="./contact.html">Contactanos</a>
                <a href="./admin/index.php">Administrador</a>    
                
			    </nav>
		    </div>
	    </header>
	
<input type="checkbox" id="btn-menu">
<div class="container-menu">
	<div class="cont-menu">
    <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
		<nav>
        <?php
                        $query = mysqli_query($conexion, "SELECT * FROM categorias");
                        while ($data = mysqli_fetch_assoc($query)) { ?>
                            <a href="#" class="nav-link" category="<?php echo $data['categoria']; ?>"><?php echo $data['categoria']; ?></a>
                        <?php } ?>
                        <a href="#" class="nav-link" category="all">Ver Todo</a>
		</nav>
		<label for="btn-menu">✖️</label>
	</div>
</div>
                       
                    </ul>
                    
                </div>
                
            </div>
        </nav>
       </div>
    <!-- Header-->
    <header class="">
            <div class="container px-4 px-lg">
               <div class="text-center text-white">
               <!--<img  width="1190" height="280"  src="portada.jpg">-->
               <!-- <h1 class="display-4 fw-bolder">ALFAS</h1>-->
               
                
            </div>
        </div>
    </header>
    <section class="py-5">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <?php
                $query = mysqli_query($conexion, "SELECT p.*, c.id AS id_cat, c.categoria FROM productos p INNER JOIN categorias c ON c.id = p.id_categoria");
                $result = mysqli_num_rows($query);
                if ($result > 0) {
                    while ($data = mysqli_fetch_assoc($query)) { ?>
                        <div class="col mb-5 productos" category="<?php echo $data['categoria']; ?>">
                            <div class="card h-100">

                                <div class="badge bg-danger text-white position-absolute" style="top: 0.5rem; right: 0.5rem">
                                    <?php echo ($data['precio_normal'] > $data['precio_rebajado']) ? 'Oferta' : ''; ?>
                                    </div>


                                <!-- Product image-->
                                <img class="card-img-top" src="assets/img/<?php echo $data['imagen']; ?>" alt="..." />
                                <!-- Product details-->
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <!-- Product name-->
                                        <h5 class="fw-bolder"><?php echo $data['nombre'] ?></h5>
                                        <p><?php echo $data['descripcion']; ?></p>
                                        <!-- Product reviews-->
                                        <div class="d-flex justify-content-center small text-warning mb-2">
                                            <div class="bi-star-fill"></div>
                                            <div class="bi-star-fill"></div>
                                            <div class="bi-star-fill"></div>
                                            <div class="bi-star-fill"></div>
                                            <div class="bi-star-fill"></div>
                                        </div>
                                        <!-- Product price-->


                                        <span class="text-muted text-decoration-line-through">
                                            <?php echo ($data['precio_normal'] > $data['precio_rebajado']) ? '$'.$data['precio_normal'] : "" ?>
                                        </span><br>
                                        <?php echo "$" .$data['precio_rebajado'] ?>
                                    </div>
                                </div>
                                <!-- Product actions-->
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center"><a class="btn btn-outline-dark mt-auto agregar" data-id="<?php echo $data['id']; ?>" href="#">Comprar</a></div>
                                </div>
                            </div>
                        </div>
                <?php  }
                } ?>

            </div>
        </div>
    </section>

    <footer class="py-4 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Todos los derechos de autor reservados &copy; StoreKine</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>