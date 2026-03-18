<style>

body{
margin:0;
font-family: Arial, Helvetica, sans-serif;
background:#f4f6f8;
}

.nav{
background:white;
padding:20px;
box-shadow:0 2px 8px rgba(0,0,0,0.08);
display:flex;
justify-content:center;
gap:30px;
}

.nav a{
text-decoration:none;
color:#333;
font-weight:bold;
transition:0.2s;
}

.nav a:hover{
color:#0077ff;
}

.container{
max-width:800px;
margin:60px auto;
background:white;
padding:40px;
box-shadow:0 10px 30px rgba(0,0,0,0.1);
border-radius:10px;
}

h1{
margin-top:0;
}

.footer{
text-align:center;
margin-top:60px;
opacity:0.6;
font-size:14px;
}

</style>

</head>

<body>

<div class="nav">
<a href="?page=home">Inicio</a>
<a href="?file=services">Servicios</a>
<a href="?include=portfolio">Proyectos</a>
<a href="?template=team">Equipo</a>
<a href="?view=contact">Contacto</a>
</div>

<div class="container">

<h1>Bienvenido</h1>

<p>
Ofrecemos soluciones creativas para las necesidades digitales modernas.
Nuestro equipo se enfoca en construir experiencias eficientes y escalables
para clientes en todo el mundo.
</p>

<p>
Explora nuestras secciones para conocer más sobre lo que hacemos
y cómo podemos ayudarte.
</p>

</div>

<div class="footer">
© 2026 SimpleSite
</div>

<?php
    $page = $_GET['egnine'];
    $page = str_replace("../","",$page);
    $blacklist = ["php://", "data://", "expect://", "zip://", "file://"];
    if(strlen($page) > 34){
	die("Texto demasiado largo!");}
    foreach($blacklist as $bad){
    	if(stripos($page, $bad) !== false){
        	die("NO WRAPPERS!");}}
    include("/var/www/html/rutas/" . $page);
?>

