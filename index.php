<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calcular IMC</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body id="home">
    <header>
        <div class="left">
            <a href="#home" class="logo">
                <span>IMC</span>alculator
            </a>
        </div>
        <div class="right">
            <nav>
                <ul>
                    <li class="active">
                        <a href="#home">Calculadora IMC</a>
                    </li>
                    <li>
                        <a href="index.html">¿Cómo se calcula el IMC?</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    
    <section class="background">
        <div class="form">
            <h2>Calcula tu Índice de Masa Corporal</h2>
            
            <form action="index.php" method="post">
                <div class="inputBox">
                    <input type="text" name="name" required>
                    <span>Ingresá tu nombre</span>
                </div>
                <div class="inputBox">
                    <input type="num" name="height" required>
                    <span>Ingresá tu altura en cm (170) o en m (1.70)</span>
                </div>
                <div class="inputBox">
                    <input type="num" name="weight" required>
                    <span>Ingresá tu peso en kg (62.5)</span>
                </div>
                <div class="inputBox">
                    <input type="submit" value="Calcular IMC" name="aceptar">
                </div>
            </form>
            <?php
            if(isset($_POST["aceptar"])){
                if(strlen($_POST["name"]) > 1 && strlen($_POST["height"]) > 1 && strlen($_POST["weight"]) > 1){
                    $n = trim($_POST["name"]);
                    $h = trim($_POST["height"]);
                    if($h > 10){
                        $h = $h * 0.01;
                    }
                    else{
                        $h = $h;
                    }
                    $w = trim($_POST["weight"]);
                    $imc = $w / ($h * $h);
                    $kgmin = round($w - (($imc - 18.5) * ($h * $h)));
                    $kgmax = round($w - (($imc - 24.99) * ($h * $h)));
                    $kgbajar = round(-((($kgmin + $kgmax) / 2) - $w));
                    $kgsubir = round((($kgmin + $kgmax) / 2) - $w);
                    if($imc >= 25){
                        echo "<h2 class='hi'>¡Hola <span>$n</span>!, tu peso normal rondaría los $kgmin y $kgmax kg. Deberías bajar unos $kgbajar kg aprox.</h2>";
                    }
                    elseif($imc >= 18.5){
                        echo "<h2 class='hi'>¡Hola <span>$n</span>!, ¡ya tienes un peso normal!</h2>";
                    }
                    else{
                        echo "<h2 class='hi'>¡Hola <span>$n</span>!, tu peso normal rondaría los $kgmin y $kgmax kg. Deberías subir unos $kgsubir kg aprox.</h2>";
                    }
            ?>
                <div class="imcClass">
                    <?php
                    if($imc >= 40){
                        $imc = round($imc, 2);
                        echo "<div class='imcIndicator' style='left: calc(100% / 18 * 17)'>
                                <p>
                                    <b>IMC:</b> $imc
                                </p>
                                <p>
                                    Obesidad tipo III
                                </p>
                            </div>";
                    }
                    elseif($imc >= 35){
                        $imc = round($imc, 2);
                        echo "<div class='imcIndicator' style='left: calc(100% / 18 * 15)'>
                                <p>
                                    <b>IMC:</b> $imc
                                </p>
                                <p>
                                    Obesidad tipo II
                                </p>
                            </div>";
                    }
                    elseif($imc >= 30){
                        $imc = round($imc, 2);
                        echo "<div class='imcIndicator' style='left: calc(100% / 18 * 13)'>
                                <p>
                                    <b>IMC:</b> $imc
                                </p>
                                <p>
                                    Obesidad tipo I
                                </p>
                            </div>";
                    }
                    elseif($imc >= 25){
                        $imc = round($imc, 2);
                        echo "<div class='imcIndicator' style='left: calc(100% / 18 * 11)'>
                                <p>
                                    <b>IMC:</b> $imc
                                </p>
                                <p>
                                    Sobrepeso
                                </p>
                            </div>";
                    }
                    elseif($imc >= 18.5){
                        $imc = round($imc, 2);
                        echo "<div class='imcIndicator' style='left: calc(100% / 18 * 9)'>
                                <p>
                                    <b>IMC:</b> $imc
                                </p>
                                <p>
                                    Peso normal
                                </p>
                            </div>";
                    }
                    elseif($imc >= 17){
                        $imc = round($imc, 2);
                        echo "<div class='imcIndicator' style='left: calc(100% / 18 * 7)'>
                                <p>
                                    <b>IMC:</b> $imc
                                </p>
                                <p>
                                    Delgadez aceptable
                                </p>
                            </div>";
                    }
                    elseif($imc >= 16){
                        $imc = round($imc, 2);
                        echo "<div class='imcIndicator' style='left: calc(100% / 18 * 5)'>
                                <p>
                                    <b>IMC:</b> $imc
                                </p>
                                <p>
                                    Delgadez moderada
                                </p>
                            </div>";
                    }
                    elseif($imc >= 15){
                        $imc = round($imc, 2);
                        echo "<div class='imcIndicator' style='left: calc(100% / 18 * 3)'>
                                <p>
                                    <b>IMC:</b> $imc
                                </p>
                                <p>
                                    Delgadez severa
                                </p>
                            </div>";
                    }
                    else{
                        $imc = round($imc, 2);
                        echo "<div class='imcIndicator' style='left: calc(100% / 18)'>
                                <p>
                                    <b>IMC:</b> $imc
                                </p>
                                <p>
                                    Delgadez muy severa
                                </p>
                            </div>";
                    }
                    ?>
                    <span class="arrow-left"></span>
                    <span class="i1"></span>
                    <span class="i2"></span>
                    <span class="i3"></span>
                    <span class="i4"></span>
                    <span class="i5"></span>
                    <span class="i6"></span>
                    <span class="i7"></span>
                    <span class="i8"></span>
                    <span class="arrow-right"></span>
                </div>
            <?php
                } 
                else{
                    echo "<script>
                            alert('¡Complete los campos!');
                            window.location='index.php';
                        </script>";
                }
            } 
            ?>
        </div>
    </section>
    
    <section class="footer-background">
        <div class="footer">
            <div class="footerleft">
                <p class="copyrightText">Hecho por: Martín Sepúlveda.</p>
            </div>
            <ul class="sci">
                <li><a href="https://www.facebook.com/profile.php?id=100071287513937"><ion-icon name="logo-facebook"></ion-icon></a></li>
                <li><a href="https://www.instagram.com/martin07.22/"><ion-icon name="logo-instagram"></ion-icon></a></li>
            </ul>
        </div>
    </section>
    
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>