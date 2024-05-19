<?php
include_once "modelo\Parser.php";
include_once "modelo\ParserACM.php";
include_once "modelo\ParserScienceDirect.php";
include_once "modelo\ParserIEEEXplore.php";
include_once "modelo\ParserSpringerLink.php";
if(!empty($_POST["buscar"])) {
    $ParserACM = new ParserACM($_POST["buscar"]);
    $ParserScienceDirect = new ParserScienceDirect($_POST["buscar"]);
    $ParserIEEEXplore = new ParserIEEEXplore($_POST["buscar"]);
    $ParserSpringerLink = new ParserSpringerLink($_POST["buscar"]);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Buscar en Base de Datos</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </head>
    <body>
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand">Búsqueda en Bases de Datos</a>
                <form class="d-flex" method="post" autocomplete="off">
                    <input class="form-control me-2" id="buscar" name="buscar" type="search" <?php if(!empty($_POST["buscar"])) {echo "value='".$_POST["buscar"]."'";}?> placeholder="Buscar" aria-label="Buscar">
                    <button class="btn btn-outline-success" type="submit">Buscar</button>
                </form>
            </div>
        </nav>
        <h1 style="text-align:center;">Bienvenido al Buscador</h1>
        <h4 style="text-align:center;">Ingrese texto en la esquina superior derecha para realizar una búsqueda en las siguientes bases de datos:</h2>
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-acm-tab" data-bs-toggle="tab" data-bs-target="#nav-acm" type="button" role="tab" aria-controls="nav-acm" aria-selected="true">ACM</button>
                <button class="nav-link" id="nav-sciencedirect-tab" data-bs-toggle="tab" data-bs-target="#nav-sciencedirect" type="button" role="tab" aria-controls="nav-sciencedirect" aria-selected="false">ScienceDirect</button>
                <button class="nav-link" id="nav-ieee-tab" data-bs-toggle="tab" data-bs-target="#nav-ieee" type="button" role="tab" aria-controls="nav-ieee" aria-selected="false">IEEE Xplore</button>
                <button class="nav-link" id="nav-springerlink-tab" data-bs-toggle="tab" data-bs-target="#nav-springerlink" type="button" role="tab" aria-controls="nav-springerlink" aria-selected="false">SpringerLink</button>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-acm" role="tabpanel" aria-labelledby="nav-acm-tab">
                <p>La Biblioteca Digital ACM es una plataforma de investigación, descubrimiento y networking que contiene:</p>
                <ul>
                    <li>La colección de texto completo de todas las publicaciones de ACM, incluyendo revistas, actas de congresos, revistas técnicas, boletines y libros.</li>
                    <li>Una colección de publicaciones a texto completo de editoriales seleccionadas.</li>
                    <li>"The ACM Guide to Computing Literature", una completa base de datos bibliográfica centrada exclusivamente en el campo de la informática.</li>
                    <li>Un conjunto de conexiones entre autores, obras, instituciones y comunidades especializadas.</li>
                    <li>La <a href="https://dl.acm.org/about/dlboard">Junta de la Biblioteca Digital ACM</a>, que supervisa el diseño, las operaciones y la dirección de la Biblioteca Digital ACM y las plataformas tecnológicas de apoyo.</li>
                </ul>
                <?php
                    if(!empty($_POST["buscar"])) {
                        $url=$ParserACM->getUrlBusqueda();
                    }
                    else {
                        $url="https://dl.acm.org";
                    }
                ?>
                <a <?php echo "href='".$url."'"; ?> target="_blank"><button type="button" class="btn btn-primary">Enlace a ACM</button></a>
            </div>
            <div class="tab-pane fade" id="nav-sciencedirect" role="tabpanel" aria-labelledby="nav-sciencedirect-tab">
                <p>ScienceDirect es una base de datos en el mundo de la literatura científica, técnica y de salud revisada por pares y a texto completo. Sus funciones facilitan mantenerse informado y trabajar de manera más eficiente.</p>
                <p>Incluye más de 2.900 revistas revisadas por pares.</p>
                <ul>
                    <li>21 millones de artículos y capítulos de libros</li>
                    <li>800 revistas de acceso libre</li>
                    <li>3,3 millones de artículos de acceso libre</li>
                </ul>
                <p>Además, incluye una cobertura completa de todas las disciplinas con las editoriales Academic Press, Woodhead Publishing y W.B. Saunders. Se puede buscar, leer y trabajar libremente en libros y revistas.</p>
                <ul>
                    <li>46.000 libros</li>
                    <li>1.000.000 de autores</li>
                    <li>Más de 50 editoriales</li>
                </ul>
                <p>Ofrece una comprensión más profunda de más de 363.000 temas clave, términos desconocidos y conceptos con explicaciones integradas directamente en la experiencia de lectura. </p>
                <?php
                    if(!empty($_POST["buscar"])) {
                        $url=$ParserScienceDirect->getUrlBusqueda();
                    }
                    else {
                        $url="https://www.sciencedirect.com";
                    }
                ?>
                <a <?php echo "href='".$url."'"; ?> target="_blank"><button type="button" class="btn btn-primary">Enlace a ScienceDirect</button></a>
            </div>
            <div class="tab-pane fade" id="nav-ieee" role="tabpanel" aria-labelledby="nav-ieee-tab">
                <p>IEEE Xplore es una plataforma digital para el descubrimiento y el acceso a contenidos científicos y técnicos publicados por el IEEE (Institute of Electrical and Electronic Engineers) y sus socios editoriales.</p>
                <p>IEEE Xplore contiene más de 6 millones de documentos y otros materiales de algunas de las publicaciones más citadas del mundo en ingeniería eléctrica, ciencias de la computación y otras ciencias relacionadas.</p>
                <p>El contenido de IEEE Xplore comprende:</p>
                <ul>
                    <li>Más de 1,5 millones de artículos de investigación</li>
                    <li>Más de 4 millones de artículos de conferencias</li>
                    <li>Más de 14.000 normas técnicas</li>
                    <li>Más de 66.000 libros y capítulos de libros</li>
                    <li>Más de 500 cursos educativos en línea</li>
                </ul>
                <p>Cada mes se añaden aproximadamente 25.000 nuevos contenidos a IEEE Xplore.</p>
                <?php
                    if(!empty($_POST["buscar"])) {
                        $url=$ParserIEEEXplore->getUrlBusqueda();
                    }
                    else {
                        $url="https://ieeexplore.ieee.org/Xplore/home.jsp";
                    }
                ?>
                <a <?php echo "href='".$url."'"; ?> target="_blank"><button type="button" class="btn btn-primary">Enlace a IEEE Xplore</button></a>
            </div>
            <div class="tab-pane fade" id="nav-springerlink" role="tabpanel" aria-labelledby="nav-springerlink-tab">
                <p>Como parte de Springer Nature, SpringerLink ofrece acceso rápido a la profundidad y amplitud de su colección en línea de revistas, libros electrónicos, obras de referencia y protocolos en una amplia gama de disciplinas.</p>
                <p>SpringerLink es una plataforma de lectura utilizada por cientos de miles de investigadores de todo el mundo.</p>
                <p>Permite la búsqueda de artículos de investigación, libros académicos y más.</p>
                <ul>
                    <li>200 millones de descargas mensuales</li>
                    <li>24 millones de lectores mensuales</li>
                    <li>3 millones de autores suben contenido anualmente</li>
                </ul>
                <?php
                    if(!empty($_POST["buscar"])) {
                        $url=$ParserSpringerLink->getUrlBusqueda();
                    }
                    else {
                        $url="https://link.springer.com";
                    }
                ?>
                <a <?php echo "href='".$url."'"; ?> target="_blank"><button type="button" class="btn btn-primary">Enlace a SpringerLink</button></a>
            </div>
        </div>
        <footer>
            <p><a href="disclaimers.php">Disclaimers</a></p>
        </footer>
    </body>
</html>