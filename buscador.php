<?php
include_once "modelo\Parser.php";
include_once "modelo\ParserACM.php";
include_once "modelo\ParserScienceDirect.php";
include_once "modelo\ParserIEEEXplore.php";
include_once "modelo\ParserSpringerLink.php";
include_once "controlador\ControlGUIForm.php";
$ControlGUI = new ControlGUIForm($_POST);
if($ControlGUI->esBusquedaValida()) {
    $ParserACM = new ParserACM($ControlGUI->getInputBuscar());
    $ParserScienceDirect = new ParserScienceDirect($ControlGUI->getInputBuscar());
    $ParserIEEEXplore = new ParserIEEEXplore($ControlGUI->getInputBuscar());
    $ParserSpringerLink = new ParserSpringerLink($ControlGUI->getInputBuscar());
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Buscador</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </head>
    <body>
        <nav class="navbar navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand">Buscador</a>
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 style="text-align:center;">Bienvenido al Buscador</h1>
                    <p class="lead" style="text-align:center">Realice búsquedas en cuatro bases de datos simultaneamente</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card alert alert-info mb-4 shadow-sm border-info">
                        <div class="card-header bg-light ">
                            <h4 class="my-0 font-weight-normal" style="text-align:center;">Realice una búsqueda simple</h4>
                        </div>
                        <div class="card-body">
                            <form method="post" autocomplete="off">
                                <div class="form-group">
                                    <div>
                                        <label for="buscar">Ingrese la cadena de búsqueda:</label>
                                    </div>
                                    <input class="form-control me-2" id="buscar" name="buscar" type="search" required value="<?= $ControlGUI->getInputBuscar() ?>" placeholder="Buscar" aria-label="Buscar">
                                </div>
                                <p></p>
                                <div class="form-group">
                                    <div>
                                        <label for="bd">Seleccione al menos una base de datos a continuación:</label>
                                    </div>
                                    <input type="checkbox" name="bd[acm]" id="checkboxACM" <?= $ControlGUI->getCheckACM(); ?>>
                                    <b>ACM</b>
                                    <ion-icon name="information-circle-outline" data-bs-toggle="modal" data-bs-target="#modalACM"></ion-icon>
                                    <br>
                                    <input type="checkbox" name="bd[scienceDirect]" id="checkboxScienceDirect" <?= $ControlGUI->getCheckScienceDirect(); ?>>
                                    <b>ScienceDirect</b>
                                    <ion-icon name="information-circle-outline" data-bs-toggle="modal" data-bs-target="#modalScienceDirect"></ion-icon>
                                    <br>
                                    <input type="checkbox" name="bd[ieeeXplore]" id="checkboxIEEEXplore" <?= $ControlGUI->getCheckIEEEXplore(); ?>>
                                    <b>IEEE Xplore</b>
                                    <ion-icon name="information-circle-outline" data-bs-toggle="modal" data-bs-target="#modalIEEE"></ion-icon>
                                    <br>
                                    <input type="checkbox" name="bd[springerLink]" id="checkboxSpringerLink" <?= $ControlGUI->getCheckSpringerLink(); ?>>
                                    <b>SpringerLink</b>
                                    <ion-icon name="information-circle-outline" data-bs-toggle="modal" data-bs-target="#modalSpringerLink"></ion-icon>
                                </div>
                                <p></p>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col">
                                            <div>
                                                <label for="anioInicio">Año de Inicio:</label>
                                            </div>
                                            <input class="form-control me-2" id="anioInicio" name="anioInicio" type="search" pattern="\d{4,4}" value="<?= $ControlGUI->getAnioInicioBusqueda() ?>" placeholder="Año de inicio" aria-label="Año de inicio">
                                        </div>
                                        <div class="col">
                                            <div>
                                                <label for="anioFin">Año de Fin:</label>
                                            </div>
                                            <input class="form-control me-2" id="anioFin" name="anioFin" type="search" pattern="\d{4,4}" value="<?= $ControlGUI->getAnioFinBusqueda() ?>" placeholder="Año de fin" aria-label="Año de fin">
                                        </div>
                                    </div>
                                </div>
                                <p></p> 
                                <div class="d-grid gap-2">
                                    <button class="btn btn-lg btn-block btn-success" type="submit">Buscar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card border-top mb-4 shadow-sm">
                            <div class="card-header">
                                <h5 class="my-0 font-weight-normal" style="text-align:center;">Instrucciones</h5>
                            </div>
                            <div class="card-body">
                                <p>1. Ingrese el termino que desea buscar.</p>
                                <p>2. Seleccione las bases de datos en las que desea buscar.</p>
                                <p>3. Presione el botón "Buscar".</p>            
                            </div>
                    </div>
                    <?php if($ControlGUI->esBusquedaValida()) { ?>
                        <div class="card border-top mb-4 shadow-sm">
                            <div class="card-header">
                                <h5 style="text-align:center;">Resultados</h5>
                            </div>
                            <div class="card-body">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <?php if(!empty($ControlGUI->getCheckACM())) { ?>
                                        <button class="nav-link active" id="nav-acm-tab" data-bs-toggle="tab" data-bs-target="#nav-acm" type="button" role="tab" aria-controls="nav-acm" aria-selected="true">ACM</button>
                                    <?php } ?>
                                    <?php if(!empty($ControlGUI->getCheckScienceDirect())) { ?>
                                        <button class="nav-link" id="nav-sciencedirect-tab" data-bs-toggle="tab" data-bs-target="#nav-sciencedirect" type="button" role="tab" aria-controls="nav-sciencedirect" aria-selected="false">ScienceDirect</button>
                                    <?php } ?>
                                    <?php if(!empty($ControlGUI->getCheckIEEEXplore())) { ?>
                                        <button class="nav-link" id="nav-ieee-tab" data-bs-toggle="tab" data-bs-target="#nav-ieee" type="button" role="tab" aria-controls="nav-ieee" aria-selected="false">IEEE Xplore</button>
                                    <?php } ?>
                                    <?php if(!empty($ControlGUI->getCheckSpringerLink())) { ?>
                                        <button class="nav-link" id="nav-springerlink-tab" data-bs-toggle="tab" data-bs-target="#nav-springerlink" type="button" role="tab" aria-controls="nav-springerlink" aria-selected="false">SpringerLink</button>
                                    <?php } ?>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <?php if(!empty($ControlGUI->getCheckACM())) { ?>
                                    <div class="tab-pane fade show active" id="nav-acm" role="tabpanel" aria-labelledby="nav-acm-tab">
                                        <?php
                                            $url=$ParserACM->getUrlBusqueda();
                                        ?>
                                        <p></p>
                                        <a <?php echo "href='".$url."'"; ?> target="_blank"><button type="button" class="btn btn-primary">Enlace a ACM</button></a>
                                    </div>
                                <?php } ?>
                                <?php if(!empty($ControlGUI->getCheckScienceDirect())) { ?>
                                    <div class="tab-pane fade" id="nav-sciencedirect" role="tabpanel" aria-labelledby="nav-sciencedirect-tab">
                                        <?php
                                            $url=$ParserScienceDirect->getUrlBusqueda();
                                        ?>
                                        <p></p>
                                        <a <?php echo "href='".$url."'"; ?> target="_blank"><button type="button" class="btn btn-primary">Enlace a ScienceDirect</button></a>
                                    </div>
                                <?php } ?>
                                <?php if(!empty($ControlGUI->getCheckIEEEXplore())) { ?>
                                    <div class="tab-pane fade" id="nav-ieee" role="tabpanel" aria-labelledby="nav-ieee-tab">
                                        <?php
                                            $url=$ParserIEEEXplore->getUrlBusqueda();
                                        ?>
                                        <p></p>
                                        <a <?php echo "href='".$url."'"; ?> target="_blank"><button type="button" class="btn btn-primary">Enlace a IEEE Xplore</button></a>
                                    </div>
                                <?php } ?>
                                <?php if(!empty($ControlGUI->getCheckSpringerLink())) { ?>
                                    <div class="tab-pane fade" id="nav-springerlink" role="tabpanel" aria-labelledby="nav-springerlink-tab">
                                        <?php
                                            $url=$ParserSpringerLink->getUrlBusqueda();
                                        ?>
                                        <p></p>
                                        <a <?php echo "href='".$url."'"; ?> target="_blank"><button type="button" class="btn btn-primary">Enlace a SpringerLink</button></a>
                                    </div>
                                <?php } ?>
                            </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col">
                    <p class="lead" style="text-align:center;">Sobre el Sistema</p>
                    <p><a href="disclaimers.php">Disclaimers</a></p>
                </div>
            </div>
            <!-- Modals -->
            <div class="modal fade" id="modalACM" tabindex="-1" aria-labelledby="modalACMLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="modalACMLabel">ACM</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>La Biblioteca Digital ACM es una plataforma de investigación, descubrimiento y networking que contiene:</p>
                            <ul>
                                <li>La colección de texto completo de todas las publicaciones de ACM, incluyendo revistas, actas de congresos, revistas técnicas, boletines y libros.</li>
                                <li>Una colección de publicaciones a texto completo de editoriales seleccionadas.</li>
                                <li>"The ACM Guide to Computing Literature", una completa base de datos bibliográfica centrada exclusivamente en el campo de la informática.</li>
                                <li>Un conjunto de conexiones entre autores, obras, instituciones y comunidades especializadas.</li>
                                <li>La <a href="https://dl.acm.org/about/dlboard">Junta de la Biblioteca Digital ACM</a>, que supervisa el diseño, las operaciones y la dirección de la Biblioteca Digital ACM y las plataformas tecnológicas de apoyo.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="modalScienceDirect" tabindex="-1" aria-labelledby="modalScienceDirectLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="modalScienceDirectLabel">ScienceDirect</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
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
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="modalIEEE" tabindex="-1" aria-labelledby="modalIEEELabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="modalIEEELabel">IEEE Xplore</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
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
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="modalSpringerLink" tabindex="-1" aria-labelledby="modalSpringerLinkLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="modalSpringerLinkLabel">SpringerLink</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Como parte de Springer Nature, SpringerLink ofrece acceso rápido a la profundidad y amplitud de su colección en línea de revistas, libros electrónicos, obras de referencia y protocolos en una amplia gama de disciplinas.</p>
                            <p>SpringerLink es una plataforma de lectura utilizada por cientos de miles de investigadores de todo el mundo.</p>
                            <p>Permite la búsqueda de artículos de investigación, libros académicos y más.</p>
                            <ul>
                                <li>200 millones de descargas mensuales</li>
                                <li>24 millones de lectores mensuales</li>
                                <li>3 millones de autores suben contenido anualmente</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    </body>
</html>