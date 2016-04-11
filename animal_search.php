<?php
include 'lib/database.php';
//get the animal parameter from URL
$id = filter_var($_GET["animal"], FILTER_SANITIZE_STRING); // sanitize inputs main
//setting up the database connection:
$db = new database();

//lookup all links from the xml file if length of q>0
if ( strlen($id)>0 ) {
  $animal = $db->search_animal($id);
  $animal_id = $db->getAnimal_id($animal);
  if($animal){
      $hint ="<a id = \"search_animal\" href=\"animal_view.php?id=$animal_id\"
                            target = \"_blank\" style = \"text-decoration: underline;\">". $animal . "</a> \n";
  }else{
      $hint = "";
  }

}

// Set output to "no suggestion" if no hint was found
// or to the correct values
if ($hint=="") {
  $response="No such animal exits here!";
} else {
  $response=$hint;
}

//output the response
echo $response;
?>
