<?php
include('../CONEXION/CONEXION_BASE_DE_DATOS.PHP');

if (!$conexion) {
    die("Error al conectar con la base de datos: " . mysqli_connect_error());
}

// Paginación
$SQL_REGISTROS = mysqli_query($conexion, "SELECT COUNT(*) AS TOTAL FROM prenda WHERE ID_Tipo_prenda IN (SELECT ID_Tipo_prenda FROM tipo_prenda WHERE Nombre = 'Camisetas')");
$RESULT_REGISTROS = mysqli_fetch_array($SQL_REGISTROS);
$TOTAL = $RESULT_REGISTROS['TOTAL'];

$POR_PAGINA = 15;
$PAGINA = empty($_GET['PAGINA']) ? 1 : $_GET['PAGINA'];
$DESDE = ($PAGINA - 1) * $POR_PAGINA;
$TOTAL_PAGINAS = ceil($TOTAL / $POR_PAGINA);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CAMISETAS HOMBRE</title>
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="../INCLUDE - ESTILOS/FOOTER_ESTILOS.CSS" rel="stylesheet">
    <link href="../INCLUDE - ESTILOS/HEADER_ESTILOS.CSS" rel="stylesheet">
    <link href="../ESTILOS/index.css" rel="stylesheet">
    <link href="../ESTILOS/menu.css" rel="stylesheet">
    <link href="../ESTILOS/categorias.css" rel="stylesheet">
    <link href="../ESTILOS/ico_perfil.css" rel="stylesheet">
    <link href="../ESTILOS/responsiva.css" rel="stylesheet">
    <link href="../ESTILOS/menu_de los demas.css" rel="stylesheet">
    <link href="../ESTILOS/responsivo_articulos.css" rel="stylesheet">
    <link href="../ESTILOS/SEGUNDOS _ESTILOS_IMPORTANTES.CSS" rel="stylesheet">
    <link href="../ESTILOS/iniciar_sesion.css" rel="stylesheet">
    <link href="../ESTILOS/estilos del loguin.css" rel="stylesheet">
    <link href="../CSS_BOTONES/agregar_carrito.css" rel="stylesheet">
    <link href="../estilos_cliente/estilos menu.css" rel="stylesheet">
    <link href="../cliente.css" rel="stylesheet">

    
    <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elegance - Tienda de Ropa Formal</title>
    <style>
      
    </style>
</head>
<body>

<style>

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Arial', sans-serif;
}

/* Estilos del contenido principal */
main {
  margin-top: 80px;
  padding: 2rem;
  max-width: 1200px;
  margin-left: auto;
  margin-right: auto;
}

.categorias {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 2rem;
  margin-bottom: 3rem;
}

.tarjeta-categoria {
  background-color: #f5f5f5;
  padding: 1rem;
  border-radius: 8px;
  text-align: center;
  cursor: pointer;
  transition: transform 0.3s;
}

.tarjeta-categoria:hover {
  transform: translateY(-5px);
}

.productos {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 2rem;
}

.tarjeta-producto {
  border: 1px solid #ddd;
  border-radius: 8px;
  overflow: hidden;
}

.imagen-producto {
  width: 100%;
  height: 200px;
  background-color: #f0f0f0;
  display: flex;
  align-items: center;
  justify-content: center;
}

.info-producto {
  padding: 1rem;
}

.titulo-producto {
  font-weight: bold;
  margin-bottom: 0.5rem;
}

.precio-producto {
  color: #ff4444;
  font-weight: bold;
  margin-bottom: 1rem;
}

.agregar-carrito {
  background-color: #333;
  color: white;
  border: none;
  padding: 0.5rem 1rem;
  border-radius: 4px;
  cursor: pointer;
  width: 100%;
}

.agregar-carrito:hover {
  background-color: #444;
}

/* Estilos del carrito */
.modal-carrito {
  position: fixed;
  top: 0;
  right: -400px;
  width: 400px;
  height: 100vh;
  background-color: white;
  box-shadow: -2px 0 5px rgba(0, 0, 0, 0.1);
  transition: right 0.3s;
  z-index: 1001;
  padding: 2rem;
}

.modal-carrito.activo {
  right: 0;
}

.encabezado-carrito {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 2rem;
}

.cerrar-carrito {
  cursor: pointer;
  font-size: 1.5rem;
}

.items-carrito {
  max-height: calc(100vh - 250px);
  overflow-y: auto;
}

.item-carrito {
  display: flex;
  gap: 1rem;
  margin-bottom: 1rem;
  padding-bottom: 1rem;
  border-bottom: 1px solid #ddd;
}

.imagen-item-carrito {
  width: 80px;
  height: 80px;
  background-color: #f0f0f0;
}

.info-item-carrito {
  flex-grow: 1;
}

.total-carrito {
  margin-top: 2rem;
  text-align: right;
}

.btn-pago {
  background-color: #ff4444;
  color: white;
  border: none;
  padding: 1rem;
  width: 100%;
  border-radius: 4px;
  margin-top: 1rem;
  cursor: pointer;
}



/* Estilos responsivos */
@media (max-width: 768px) {
  .enlaces-nav {
      display: none;
  }

  .modal-carrito {
      width: 100%;
  }
}



.seccion-promocion {
    background: linear-gradient(135deg, #fff5f5 0%, #ffffff 100%);
    padding: 3rem 2rem;
    border-radius: 20px;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
    margin: 2rem auto;
    max-width: 1400px;
}

.contenedor-principal {
    display: flex;
    gap: 3rem;
    margin-bottom: 3rem;
}

/* Estilos del contenido principal */
.contenido-promocion {
    flex: 1;
    min-width: 300px;
}

.cabecera-promocion {
    display: flex;
    gap: 1rem;
    margin-bottom: 1.5rem;
}

.etiqueta-destacada {
    background-color: #ff4d4d;
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 25px;
    font-weight: bold;
    animation: pulsar 2s infinite;
}

.etiqueta-tiempo-limitado {
    background-color: #333;
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 25px;
    font-weight: bold;
}

.titulo-promocion {
    font-size: 2.5rem;
    color: #333;
    margin-bottom: 1rem;
    font-weight: bold;
}

.descripcion-promocion {
    font-size: 1.1rem;
    color: #666;
    line-height: 1.6;
    margin-bottom: 2rem;
}

/* Estilos de características */
.caracteristicas-promocion {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1.5rem;
    margin: 2rem 0;
}

.caracteristica {
    background: white;
    padding: 1.5rem;
    border-radius: 12px;
    text-align: center;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    transition: transform 0.3s ease;
}

.caracteristica:hover {
    transform: translateY(-5px);
}

.caracteristica .icono {
    font-size: 2rem;
    margin-bottom: 0.5rem;
}

.caracteristica p {
    color: #333;
    font-weight: bold;
    margin: 0.5rem 0;
}

.caracteristica .detalle {
    color: #666;
    font-size: 0.9rem;
}

/* Estilos de etiquetas de productos */
.etiquetas-productos {
    display: flex;
    flex-wrap: wrap;
    gap: 0.8rem;
    margin: 2rem 0;
}

.etiqueta {
    background-color: #fff;
    color: #ff4d4d;
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-size: 0.9rem;
    border: 1px solid #ff4d4d;
    transition: all 0.3s ease;
}

.etiqueta:hover {
    background-color: #ff4d4d;
    color: white;
}

/* Estilos de botones */
.botones-promocion {
    display: flex;
    gap: 1rem;
    margin: 2rem 0;
}

.boton-principal, .boton-secundario {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    padding: 1rem 2rem;
    border-radius: 30px;
    font-weight: bold;
    transition: all 0.3s ease;
    text-decoration: none;
}

.boton-principal {
    background-color: #ff4d4d;
    color: white;
}

.boton-secundario {
    background-color: transparent;
    color: #ff4d4d;
    border: 2px solid #ff4d4d;
}

.boton-principal:hover, .boton-secundario:hover {
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(255, 77, 77, 0.2);
}

/* Estilos del contador */
.contador-promocion {
    background: white;
    padding: 1.5rem;
    border-radius: 12px;
    text-align: center;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
}

.titulo-contador {
    color: #666;
    margin-bottom: 1rem;
}

.tiempo {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 1rem;
}

.unidad-tiempo {
    display: flex;
    flex-direction: column;
    align-items: center;
}

.numero {
    font-size: 2rem;
    font-weight: bold;
    color: #ff4d4d;
}

.etiqueta {
    font-size: 0.8rem;
    color: #666;
}

.separador {
    font-size: 2rem;
    color: #ff4d4d;
    font-weight: bold;
}

/* Estilos del carrusel */
.carrusel-promocion {
    flex: 1;
    min-width: 300px;
    max-width: 500px;
    position: relative;
    border-radius: 12px;
    overflow: hidden;
}

.contenedor-imagenes {
    display: flex;
    width: 300%;
    animation: deslizar 15s infinite;
}

.slide {
    position: relative;
    width: 100%;
}

.slide img {
    width: 100%;
    height: 600px;
    object-fit: cover;
}

.info-slide {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    padding: 1.5rem;
    background: linear-gradient(transparent, rgba(0,0,0,0.7));
    color: white;
}

.descuento {
    background-color: #ff4d4d;
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-weight: bold;
    font-size: 1.2rem;
}

.info-slide h3 {
    margin-top: 1rem;
    font-size: 1.5rem;
}

.controles-carrusel {
    position: absolute;
    bottom: 1rem;
    left: 50%;
    transform: translateX(-50%);
    display: flex;
    gap: 0.5rem;
}

.control-carrusel {
    width: 10px;
    height: 10px;
    border-radius: 50%;
    border: none;
    background-color: rgba(255,255,255,0.5);
    cursor: pointer;
}

.control-carrusel.activo {
    background-color: white;
}

/* Estilos de beneficios */
.beneficios-compra {
    background: white;
    padding: 2rem;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
}

.titulo-beneficios {
    text-align: center;
    color: #333;
    font-size: 1.8rem;
    margin-bottom: 2rem;
}

.contenedor-beneficios {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 2rem;
}

.beneficio {
    text-align: center;
    padding: 1.5rem;
    border-radius: 12px;
    transition: transform 0.3s ease;
}

.beneficio:hover {
    transform: translateY(-5px);
}

.icono-beneficio {
    font-size: 2.5rem;
    margin-bottom: 1rem;
    display: block;
}

.beneficio h4 {
    color: #333;
    margin-bottom: 0.5rem;
}

.beneficio p {
    color: #666;
}

/* Animaciones */
@keyframes pulsar {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.05); }
}

@keyframes deslizar {
    0%, 28% { transform: translateX(0); }
    33%, 61% { transform: translateX(-33.33%); }
    66%, 94% { transform: translateX(-66.66%); }
    100% { transform: translateX(0); }
}

.logo {
                font-size: 40px;
            }
            .enlaces-nav {
                margin-bottom: -19px;
            }
            .boton-sesion {
                font-size: 15px;
            }
/*   encabezado y navegación */
header {
    display: flex;
    flex-direction: column;
    align-items: center;
    background-color: #333;
    overflow: hidden;
    padding: 5px;
}

/* Título de la tienda */
.logo {
    font-size: 2rem;
    font-weight: bold;
    color: #ffffff;
    font-family: 'Arial', sans-serif; 
    margin-bottom: 1rem; 
}

/* Estilos del menú de navegación */
nav {
    display: flex;
    align-items: center;
    justify-content: flex-end;
    background-color: #333;
    padding: 1rem 2rem;
    width: 100%;
}

.enlaces-nav {
    display: flex;
    gap: 2rem;
}

.enlaces-nav a {
    color: #ffffff;
    font-weight: bold;
    text-decoration: none;
    font-size: 1.2rem;
    font-family: 'Arial', sans-serif; 
}

.enlaces-nav a:hover {
    color: #ffcdcd; 
}

/* Estilos del submenu */
.desplegable {
    position: relative;
   

}

.submenu {
    display: none;
    position: absolute;
    top: 100%;
    left: 0;
    background-color: #ffffff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 0.5rem 1rem;
    border-radius: 8px;
    z-index: 10;
}

.submenu li {
    list-style: none;
    margin: 0.5rem 0;
}

.submenu li a {
    color: #555;
    font-size: 1.0rem;
    text-decoration: none;
}

.submenu li a:hover {
    color: #ff6b6b;
}

.desplegable:hover .submenu {
    display: block;
}

/* Imagen */
.imagen-decorativa {
    width: 100%;
    height: 200px;
    background-image: url('../IMAGENES/logo.jpg');
    background-size: cover;
    background-position: center;
    margin-top: 1rem; 
}


/* CSS para el menú desplegable */
.enlaces-navegacion {
    display: flex;
    gap: 2rem;
}

/* Ocultar submenús por defecto */
.desplegable {
    position: relative;
}

.submenu {
    display: none;
    position: absolute;
    top: 100%; /* Ubicación debajo del enlace principal */
    left: 0;
    background-color: #333;
    padding: 0.5rem 0;
    border-radius: 4px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
}

/* Estilos de los enlaces en el submenú */
.submenu li {
    list-style: none;
}

.submenu li a {
    color: white;
    text-decoration: none;
    padding: 0.5rem 1rem;
    display: block;
}

/* Mostrar submenú al pasar el mouse sobre el enlace principal */
.desplegable:hover .submenu {
    display: block;
}

/* Ajustes para enlaces en el submenú al pasar el mouse */
.submenu li a:hover {
    background-color: #444;
}

/* Ajustes responsivos */
@media (max-width: 768px) {
    .enlaces-navegacion {
        display: none;
    }

    .icono-carrito {
        margin-left: auto;
    }
}
/* Estilos del menú en pantallas grandes (computadoras) */
nav {
    display: flex;
    align-items: center;
    justify-content: space-between;
    background-color: #333;
    padding: 1rem 2rem;
    width: 100%;
    height: 100px;
}

.logo {
    color: white;
    font-size: 24px;
    text-decoration: none;
    flex-shrink: 0;
    margin-right: auto;
}

.enlaces-nav {
    display: flex;
    gap: 1.5rem;
    position: absolute;
    margin-top: 110px;

   
}

.enlaces-nav a {
    color: white;
    text-decoration: none;
    font-size: 25px;
    padding: 0.5rem;
}

/* Submenús desplegables en computadoras */
.desplegable {
    position: relative;
}

.desplegable ul.submenu {
    display: none;
    position: absolute;
    top: 100%;
    left: 0;
    background-color: #444;
    list-style: none;
    padding: 0;
    margin: 0;
    min-width: 150px;
}

.desplegable:hover ul.submenu {
    display: block;
}

.submenu li {
    padding: 0.5rem;
}

.submenu li a {
    font-size: 1.0rem;
    color: white;
    text-decoration: none;
}

/* Menú compacto para pantallas pequeñas */
@media (max-width: 768px) {
    nav {
        flex-wrap: wrap;
        padding: 0.5rem 1rem;
    }

    .logo {
        font-size: 18px;
    }

    .enlaces-nav {
        flex-direction: row;
        gap: 0.5rem;
        flex-wrap: wrap;
        justify-content: flex-end;
        position: absolute;
        margin-top: 90px;

        
    }

    .enlaces-nav a {
        font-size: 0.8rem;
        padding: 0.3rem;
    }

    .submenu {
        display: none; /* Oculta submenús para simplificar en pantallas pequeñas */
    }
}
.botones-sesion {
    display: flex;
    gap: 1rem;
}

.boton-sesion {
    background-color: red;
    color: white;
    text-decoration: none;
    padding: 0.5rem 1rem;
    border-radius: 4px;
    font-size: 18px;

}

.boton-sesion:hover {
    background-color: red;
}

/* Menú adaptable para pantallas pequeñas */
@media (max-width: 768px) {
    .botones-sesion {
        flex-direction: row;
        gap: 0.5rem;
    }

    .boton-sesion {
        font-size: 0.7rem;
        padding: 0.3rem 0.5rem;
    }
}

.modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    justify-content: center;
    align-items: center;
}
.modal-content {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    width: 300px;
    text-align: center;
}
.close {
    color: #aaa;
    float: right;
    font-size: 20px;
    font-weight: bold;
    cursor: pointer;
}
.modal input {
    width: 100%;
    padding: 8px;
    margin: 8px 0;
    box-sizing: border-box;
}
.modal button {
    padding: 10px 15px;
    background-color: #e65151;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}




/*   encabezado y navegación */
header {
    display: flex;
    flex-direction: column;
    align-items: center;
    background-color: #333;
    overflow: hidden;
    padding: 5px;
}

/* Título de la tienda */
.logo {
    font-size: 2rem;
    font-weight: bold;
    color: #ffffff;
    font-family: 'Arial', sans-serif; 
    margin-bottom: 1rem; 
}

/* Estilos del menú de navegación */
nav {
    display: flex;
    align-items: center;
    justify-content: flex-end;
    background-color: #333;
    padding: 1rem 2rem;
    width: 100%;
}

.enlaces-nav {
    display: flex;
    gap: 2rem;
}

.enlaces-nav a {
    color: #ffffff;
    font-weight: bold;
    text-decoration: none;
    font-size: 1.2rem;
    font-family: 'Arial', sans-serif; 
}

.enlaces-nav a:hover {
    color: #ffcdcd; 
}

/* Estilos del submenu */
.desplegable {
    position: relative;
   

}

.submenu {
    display: none;
    position: absolute;
    top: 100%;
    left: 0;
    background-color: #ffffff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 0.5rem 1rem;
    border-radius: 8px;
    z-index: 10;
}

.submenu li {
    list-style: none;
    margin: 0.5rem 0;
}

.submenu li a {
    color: #555;
    font-size: 1.0rem;
    text-decoration: none;
}

.submenu li a:hover {
    color: #ff6b6b;
}

.desplegable:hover .submenu {
    display: block;
}

/* Imagen */
.imagen-decorativa {
    width: 100%;
    height: 200px;
    background-image: url('logo.jpg');
    background-size: cover;
    background-position: center;
    margin-top: 1rem; 
}



    body {
    font-family: 'Georgia', serif;
    margin: 0;
    padding: 0;
    background: linear-gradient(135deg, #f0f0f0, #d1d1d1); /* Fondo suave y elegante */
    background-size: cover;
}

header {
    background: linear-gradient(135deg, #1a1a1a, #333333); /* Fondo con un toque moderno */
    padding: 20px 50px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    box-shadow: 0px 6px 20px rgba(0, 0, 0, 0.2);
    border-radius: 12px;
    transition: all 0.3s ease;
    border-bottom: 5px solid #b2976b;
}

header:hover {
    box-shadow: 0px 8px 25px rgba(0, 0, 0, 0.3);
}

.logo {
    font-size: 2.5em;
    color: #ffffff;
    text-decoration: none;
    font-weight: bold;
    text-transform: uppercase;
    letter-spacing: 3px;
    text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.4);
    transition: transform 0.3s ease, color 0.3s ease;
}

.logo:hover {
    transform: scale(1.05);
    color: #f2f2f2;
}

nav {
    display: flex;
    gap: 40px;
}

nav a {
    color: #e0e0e0;
    text-decoration: none;
    font-size: 1.2em;
    font-weight: 600;
    padding: 10px 20px;
    border-radius: 8px;
    transition: color 0.3s ease, border-bottom 0.3s ease, transform 0.3s ease, background-color 0.3s ease;
}

nav a:hover {
    color: #ffffff;
    background-color: #b2976b;
    border-bottom: 2px solid #ffffff;
    transform: scale(1.1);
}

.desplegable {
    position: relative;
}

.desplegable > a {
    cursor: pointer;
    display: flex;
    align-items: center;
    font-weight: bold;
    transition: color 0.3s ease;
}

.desplegable > a:hover {
    color: #ffffff;
}

.desplegable-icono {
    margin-left: 6px;
    font-size: 1.2em;
    transition: transform 0.3s ease, color 0.3s ease;
}

.desplegable:hover .desplegable-icono {
    transform: rotate(180deg);
}

.submenu {
    display: none;
    position: absolute;
    top: 50px;
    left: 0;
    background-color: #444444;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.3);
    min-width: 240px;
    z-index: 1000;
    transition: all 0.3s ease;
}

.submenu li {
    list-style: none;
}

.submenu li a {
    display: block;
    padding: 12px 20px;
    color: #dcdcdc;
    text-decoration: none;
    transition: background-color 0.3s ease, color 0.3s ease, transform 0.3s ease;
}

.submenu li a:hover {
    background-color: #555555;
    color: #ffffff;
    transform: translateX(10px);
}

.desplegable:hover .submenu {
    display: block;
}

.menu-acciones {
    display: flex;
    gap: 30px;
    align-items: center;
}

.icono {
    color: #e0e0e0;
    text-decoration: none;
    font-size: 1.3em;
    display: flex;
    align-items: center;
    gap: 10px;
    transition: color 0.3s ease, transform 0.3s ease;
}

.icono:hover {
    color: #ffffff;
    transform: scale(1.1);
}

.icono i {
    font-size: 1.7em;
}

/* Estilo para sección de colecciones */
.coleccion {
    color: #ffffff;
    font-size: 1.4em;
    font-weight: bold;
    margin-top: 20px;
    display: flex;
    gap: 50px;
    justify-content: center;
}

.coleccion a {
    color: #e0e0e0;
    text-decoration: none;
    padding: 12px 24px;
    background-color: #333333;
    border-radius: 10px;
    transition: all 0.3s ease;
}

.coleccion a:hover {
    background-color: #b2976b;
    color: #ffffff;
    transform: scale(1.05);
}

/* Diseño responsive */
@media (max-width: 768px) {
    header {
        flex-direction: column;
        align-items: flex-start;
        padding: 20px;
        gap: 20px;
    }

    nav {
        flex-wrap: wrap;
        gap: 20px;
    }

    .submenu {
        top: 40px;
    }

    .coleccion {
        flex-direction: column;
        gap: 20px;
    }
}


  /* Estilos adicionales */
  .catalogo-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px;
}

.producto-card {
    width: 250px;
    background-color: #f9f9f9;
    border: 1px solid #ddd;
    border-radius: 8px;
    text-align: center;
    padding: 15px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
}

.producto-card:hover {
    transform: translateY(-5px);
}

.producto-imagen {
    width: 100%;
    height: 200px;
    object-fit: cover;
    border-radius: 5px;
}

.producto-info {
    margin-top: 10px;
}

.btn-agregar {
    margin-top: 10px;
    padding: 10px 15px;
    background-color: #28a745;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 1em;
    transition: background-color 0.3s ease;
}

.btn-agregar:hover {
    background-color: #218838;
}

/* Ventana emergente */
.modal-sesion {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    justify-content: center;
    align-items: center;
}

.modal-sesion.activo {
    display: flex;
}

.contenido-sesion {
    background-color: white;
    padding: 20px;
    border-radius: 8px;
    width: 90%;
    max-width: 400px;
    text-align: center;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.btn-cerrar-sesion {
    background-color: #dc3545;
    color: white;
    border: none;
    padding: 10px 15px;
    border-radius: 5px;
    cursor: pointer;
    margin-top: 15px;
}

.btn-cerrar-sesion:hover {
    background-color: #c82333;
}




</style>






    <header>
        <!-- Logo -->
        <a href="#" class="logo">Elegance</a>

        <!-- Menú de Navegación -->
        <nav>
            <a href="../INDEX.PHP">Inicio</a>
            <div class="desplegable">
                <a href="#">
                     Hombre
                    <span class="desplegable-icono">&#9662;</span>
                </a>
                <ul class="submenu">
                <li><a href="../ROPA HOMBRE/CAMISETAS_H.PHP">Camisetas</a></li>
                    <li><a href="../ROPA HOMBRE/CHAQUETAS_H.PHP">Chaquetas</a></li>
                    <li><a href="../ROPA HOMBRE/JEANS_H.PHP">Pantalones</a></li>
                    <li><a href="../ROPA HOMBRE/SHORTS_H.PHP">Shorts</a></li>
                    <li><a href="../ROPA HOMBRE/BLAZER_H.PHP">Gaban Y Blazer</a></li>
                    <li><a href="../ROPA HOMBRE/BUZOS_H.PHP">Buzos</a></li>
                    <li><a href="../ROPA HOMBRE/CAMISAS_H.PHP">Camisas</a></li>
                    <li><a href="../ROPA HOMBRE/ROPA_INTERIOR_H.PHP">Ropa Interior</a></li>
                </ul>
            </div>
            <div class="desplegable">
                    <a href="#categorias">Mujer</a>
                    <ul class="submenu">
                    <li><a href="../ROPA MUJER/CAMISETAS_M.PHP">Camisetas</a></li>
                <li><a href="../ROPA MUJER/CHAQUETAS_M.PHP">Chaquetas</a></li>
                <li><a href="../ROPA MUJER/JEANS_M.PHP">Pantalones</a></li>
                <li><a href="../ROPA MUJER/BLAZER_M.PHP">Blazer y Gaban</a></li>
                <li><a href="../ROPA MUJER/CAMISAS_M.PHP">Camisas</a></li>
                <li><a href="../ROPA MUJER/ROPA_INT_M.PHP">Ropa Interior</a></li>
                    <li><a href="../ROPA MUJER/VESTIDOS_M.PHP">Vestidos</a></li>
                    <li><a href="../ROPA MUJER/BLUSAS_M.PHP">Blusas</a></li>
                    <li><a href="../ROPA MUJER/BUZOS_M.PHP">Buzos</a></li>

                    </ul>
                </div>
                <div class="desplegable">
                    <a href="#contacto">Accesorios</a>

                    <ul class="submenu">
                    <li><a href="../ACCESORIOS/ACCESORIOS.PHP">Gafas</a></li>
                    <li><a href="../ACCESORIOS/CINTURON.PHP">Cinturón</a></li>
                    <li><a href="../ACCESORIOS/PAÑUELOS.PHP">Pañuelos</a></li>
                    <li><a href="../ACCESORIOS/BUFANDAS.PHP">Bufandas</a></li>
                    <li><a href="../ACCESORIOS/GUANTES.PHP">Guantes</a></li>
                    <li><a href="../ACCESORIOS/CORBATAS.PHP">Corbatas</a></li>
                    <li><a href="../ACCESORIOS/ARETES.PHP">Aretes</a></li>
                    <li><a href="../ACCESORIOS/ANILLOS.PHP">Anillos</a></li>
                    <li><a href="../ACCESORIOS/COLLARES.PHP">Collares</a></li>
                    </ul>
                </div>
                <div class="contacto">
                    <a href="#accesorios">Contacto</a>

                    <ul class="submenu">
                        <li><a href="#ayuda">Ayuda</a></li>
                        <li><a href="#ubicacion">Ubicación</a></li>
                        <li><a href="#email">Email</a></li>
        </nav>

        <!-- Iconos de acciones -->
        <div class="menu-acciones">
            <a href="../CARRITO.PHP" class="icono">
                <i>&#128722;</i> Carrito
            </a>
            <a href="../FAVORITOS.PHP" class="icono">
                <i>&#9825;</i> Favoritos
            </a>
            
        </div>
    </header>

   

    <br><br><br>


    <div class="catalogo-container">
<?php
$CONSULTA = "SELECT * FROM prenda WHERE ID_Tipo_prenda IN (SELECT ID_Tipo_prenda FROM tipo_prenda WHERE Nombre = 'Camisetas Hombre') LIMIT $DESDE, $POR_PAGINA";
$EJECUTAR = mysqli_query($conexion, $CONSULTA);

while ($FILA = mysqli_fetch_assoc($EJECUTAR)) {
    $NOMBRE = $FILA['Nombre'];
    $COSTO = $FILA['Costo'];
    $IMAGEN = "../IMAGENES/" . $FILA['Foto'];
    $COLOR = $FILA['Color'];
    $TALLA = $FILA['Talla'];
    $STOCK = $FILA['Stock'] > 0 ? "Disponible" : "Agotado";
?>
    <div class="producto-card">
        <img src="<?php echo $IMAGEN; ?>" alt="<?php echo $NOMBRE; ?>" class="producto-imagen">
        <div class="producto-info">
            <h3 class="producto-nombre"><?php echo $NOMBRE; ?></h3>
            <p><strong>Color:</strong> <?php echo $COLOR; ?></p>
            <p><strong>Talla:</strong> <?php echo $TALLA; ?></p>
            <p><strong>Precio:</strong> $<?php echo number_format($COSTO, 2); ?></p>
            <p><strong>Stock:</strong> <?php echo $STOCK; ?></p>
            <button class="btn-agregar" onclick="mostrarVentana()">Agregar al carrito</button>
        </div>
    </div>
<?php } ?>
</div>

<!-- Ventana emergente -->
<div class="modal-sesion" id="modalSesion">
    <div class="contenido-sesion">
        <p>Debes iniciar sesión para acceder y poder comprar con nosotros.</p>
        <button class="btn-cerrar-sesion" onclick="cerrarVentana()">Cerrar</button>
    </div>
</div>

<script>
    function mostrarVentana() {
        document.getElementById('modalSesion').classList.add('activo');
    }

    function cerrarVentana() {
        document.getElementById('modalSesion').classList.remove('activo');
    }
</script>

<!-- Footer -->
<?php include('../INCLUDE/FOOTER.PHP'); ?>

</body>
</html>
