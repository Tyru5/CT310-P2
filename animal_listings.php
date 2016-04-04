<!DOCTYPE html>
<html>
  <!-- Include the header.php file -->
  <head>
    <?php
      // Setting the title for this page:
      $title = "Adopt";
      $session_name = "PetRescue_Malmstrom_Bertolacci";
      include 'header.php';
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
        $animal_tree = new AnimalTree( $ANIMALS_FILE );

        echo array_reduce( $animal_tree->getIterable(),
                            function ($carry, $item){
                              return $carry . ( ($carry == NULL) ? "" : "<hr>" ) . $item->__toString() .
                              "<a class=\"animalView\" href=\"animal_view.php?id=".$item->getID()."\">Click here to view " . $item->getName() . "!</a> \n" ;
                            }
                          );

        /*foreach( $animal_tree->getIterable() as $pet ){
          echo $pet;
        }*/
      ?>

    </div>
    <?php include 'footer.php'; ?>
  </body>
</html>
