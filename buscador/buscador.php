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
                <?php
                    $doc = new DOMDocument();
                    libxml_use_internal_errors(true);
                    if(!empty($_POST["buscar"])) {
                        $url="https://dl.acm.org/action/doSearch?AllField=".str_replace(' ', '+', $_POST["buscar"]);
                    }
                    else {
                        $url="https://dl.acm.org";
                    }
                    $doc->loadHTMLFile($url);
                    echo $doc->saveHTML();
                ?>
            </div>
            <div class="tab-pane fade" id="nav-sciencedirect" role="tabpanel" aria-labelledby="nav-sciencedirect-tab">
                <?php
                    $doc = new DOMDocument();
                    libxml_use_internal_errors(true);
                    if(!empty($_POST["buscar"])) {
                        $url="https://www.sciencedirect.com/search?qs=".str_replace(' ', '%20', $_POST["buscar"]);
                    }
                    else {
                        $url="https://www.sciencedirect.com";
                    }
                    $doc->loadHTMLFile($url);
                    echo $doc->saveHTML();
                ?>
            </div>
            <div class="tab-pane fade" id="nav-ieee" role="tabpanel" aria-labelledby="nav-ieee-tab">
                <?php
                    $doc = new DOMDocument();
                    libxml_use_internal_errors(true);
                    if(!empty($_POST["buscar"])) {
                        $url="https://ieeexplore.ieee.org/search/searchresult.jsp?newsearch=true&queryText=".str_replace(' ', '%20', $_POST["buscar"]);
                    }
                    else {
                        $url="https://ieeexplore.ieee.org/Xplore/home.jsp";
                    }
                    $doc->loadHTMLFile($url);
                    echo $doc->saveHTML();
                ?>
            </div>
            <div class="tab-pane fade" id="nav-springerlink" role="tabpanel" aria-labelledby="nav-springerlink-tab">
                <?php
                    $doc = new DOMDocument();
                    libxml_use_internal_errors(true);
                    if(!empty($_POST["buscar"])) {
                        $url="https://link.springer.com/search?new-search=true&query=".str_replace(' ', '+', $_POST["buscar"]);
                    }
                    else {
                        $url="https://link.springer.com";
                    }
                    $doc->loadHTMLFile($url);
                    echo $doc->saveHTML();
                ?>
            </div>
        </div>
    </body>
</html>