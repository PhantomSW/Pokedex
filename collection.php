<?php
$title = 'Collection';
include('includes/head.php');
?>
<style>
main li {
        display: block;
    }
</style>
<body>

    <?php 
    include('includes/header.php'); 
    ?>

    <main style="min-height:77vh;">
        <div style="text-align: center;">
            <h1>Tous les pokemons</h1>
            <?php include('includes/message.php'); ?>
        </div>
        <?php include('includes/bd.php'); 
				$a= 'SELECT * FROM pokemons';
                $requ = $bdd->query($a);
				
				$result2 = $requ->fetchAll(PDO::FETCH_ASSOC);
                echo '<div style="display: flex; flex-wrap:wrap; justify-content:center;">';
                foreach ($result2 as $pokemon)  {
                    echo '<div style="display: flex; padding: 16px;">
                        <ul style="padding-left: 0px; margin-right: 40px;">
                            <li><p style="display: inline;"><strong>'.$pokemon['name'].'</strong></p></li><br>
                            <li><p style="display: inline;">PV : </p><p style="display: inline;">'.$pokemon['pv'].'</p></li>
                            <li><p style="display: inline;">Attaque : </p><p style="display: inline;">'.$pokemon['attack'].'</p></li>
                            <li><p style="display: inline;">Défense : </p><p style="display: inline;">'.$pokemon['defense'].'</p></li>
                            <li><p style="display: inline;">Vitesse : </p><p style="display: inline;">'.$pokemon['speed'].'</p></li>
                        </ul>
                        <img class="img" style="margin-left: 20px; margin-right: 50px;" src=imgPokemons/'.$pokemon['image'].'></div>';
                }
                echo '</table></div></div>';
            ?>
            </main>
            
            <?php include('includes/footer.php'); ?>    
            
    </body>
</html>

