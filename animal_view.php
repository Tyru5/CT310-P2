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

      if( isset($_POST['COMMENT_SUBMIT']) ){
        $_GET['id']=$_POST['origin_get_id'];
      }

      if( ! isset($_GET['id']) ){
        header( 'Location: animal_listings.php' );
      }

      $animal_tree = new AnimalTree( $ANIMALS_FILE );
      $animal = $animal_tree->getAnimalFromID( $_GET['id'] );

      if( $animal == NULL ){
        header( 'Location: animal_listings.php' );
      }

      if( isset($_POST['COMMENT_SUBMIT']) ){
        // addComment sanitizes text input
        $animal->addComment( $_SESSION['USERNAME'],  $_POST['comment_content'] );
        header( 'Location: animal_view.php?id='.$_GET['id'] ); // redirects the user to the page with the specifed ID towards that animal
      }

    ?>
  </head>
  <body>
    <div class="pageContents"> <!-- Will hold all the page contents -->
      <?php
      // setting the Heading variable for the page:
      $heading = "Animals";
      include "navbar.php"
      ?>
      <?php
        echo $animal;

        $comments = $animal->getComments();

        echo "<div id=\"AnimalComments\">";
        echo "<h5 id=\"commentHeader\">Comment Section:</h5> \n";
        if( count($comments) < 1 ){ // $comments is an array, checking if there is at least one comment within the array
          echo "<p>No Comments!</p>";
        } else {
          foreach( $comments as $comment ){
            echo $comment;
          }
        }
        echo "</div>"
      ?>
      <p id="go_back"><a href="animal_listings.php">Go back</a></p>
      <?php
        $valid_login = isset($_SESSION['USERNAME']);
        if( $valid_login ):
      ?>
        <p>You are logged in as <?php echo $_SESSION['USERNAME'] ?></p>
        <form method="post" action="animal_view.php">
          <textarea name="comment_content"></textarea>
          <input type="hidden" name="COMMENT_SUBMIT">
          <input type="hidden" name="origin_get_id" value=<?php echo "\"".$_GET['id']."\"" ?> >
          <input type="submit" value="Post">
        </form>
      <?php
        endif;
      ?>

    </div>
    <?php include 'footer.php'; ?>
  </body>
</html>
