<?php include('header.php');?>

<?php
$csv = array_map('str_getcsv', file('https://raw.githubusercontent.com/cnmatus/Clase10-9Mayo/master/Netflix.csv'));
      array_walk($csv, function(&$a) use ($csv) {
      $a = array_combine($csv[0], $a);
    }); // aca se va a buscar un csv de cada uno de los temblores
      array_shift($csv); //trasnforma el csv para que el la primera linea la entienda como un encabezado y luego la defina como index
?>

<main role="main" class="container">
<h1 class="mb-4">Top 20</h1>
<div class="row">


<?php for($t = 0; $t < count($csv); $t++){?>
    <div class="col-sm-4 col-md-3 py-3">
    <h3 class="border-top pt-3"> <?php print($csv[$t]['year'])?></h3>

    <figure style="height:120px; overflow:hidden;">

    <img src="
    <?php if ($csv[$t]['img'] == NULL){
        print ("img/gris.png"); //si no encuentro una foto se va a poner un rectangulo gris
    } else {
        print ($csv[$t]['img']);
    };?>"

    class="img-fluid">
    </figure>

    <?php
        print '<h5><a href="'.($csv[$t]['url']).'">'.($csv[$t]['name']).'</a></h5>';
    ?>
    <p>
        <strong>Temporadas:</strong> <?php print($csv[$t]['seasons'])?><seasons>
      <br>
    <strong>Genero:</strong> <?php print($csv[$t]['genre'])?><seasons>

    </p>
<p>
        <?php print($csv[$t]['comentario'])?><seasons>
        </p>
    </div>
<?php };?>
</div>

</main>
<?php include('footer.php');?>
