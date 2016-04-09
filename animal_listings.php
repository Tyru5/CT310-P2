<!DOCTYPE html>
<html>
  <!-- Include the header.php file -->
  <head>
    <?php
      // Setting the title for this page:
      $title = "Adopt";
      $session_name = "PetRescue_Malmstrom_Bertolacci";
      include 'header.php';
	  include 'lib/database.php';
      include "animal_tools.php";
    ?>
  </head>
  <body>
    <div class="pageContents"> <!-- Will hold all the page contents -->
      <?php
      // Setting the heading for the page:
      $heading = "Animals";
      include "navbar.php"
      ?>
      <div class="about_us_header"><h2 class="abtUsText">Our Animals:</h2></div>
      <?php
		$db = new database();
	  $result = $db->query('SELECT * FROM animals');

		foreach($result as $row)
		{?>
			<p>
			<img class="animalPhoto" src="<?php echo $row['pet_image_path'];?>" width="300px" height="300px" /><br>
			Name: <?php echo $row['pet_name'];?><br>
			Species: <?php echo $row['pet_species'];?><br>
			Breed: <?php echo $row['pet_breed'];?><br>
			Age: <?php echo $row['pet_age'];?> yrs<br>
			Weight: <?php echo $row['pet_weight'];?> lbs<br>
			Description: <?php echo $row['pet_description'];?><br>
			<a href=<?php echo 'animal_view.php?id='. $row['id']; ?> >Click here to view</a>
			</p>
			<hr>
		<?php
		}
	  /*
        $animal_tree = new AnimalTree( $ANIMALS_FILE );

        echo array_reduce( $animal_tree->getIterable(),
                            function ($carry, $item){
                              return $carry . ( ($carry == NULL) ? "" : "<hr>" ) . $item->__toString() .
                              "<a class=\"animalView\" href=\"animal_view.php?id=".$item->getID()."\">Click here to view " . $item->getName() . "!</a> \n" ;
                            }
                          );
		*/
		
		

        /*foreach( $animal_tree->getIterable() as $pet ){
          echo $pet;
        }*/
		
      ?>

    </div>
    <?php include 'footer.php'; ?>
  </body>
</html>
