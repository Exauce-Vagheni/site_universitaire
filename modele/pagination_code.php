<?php
if($pageCourante>1){
   echo "<a class='pagination_button btn btn-primary' href='?page=".($pageCourante-1)."#actus'>Precedent</a>";
}
for($i=1;$i<=$totalPages;$i++){
    echo "<a class='pagination_chiffre ' href='?page=$i#actus'>$i</a>";
}
if($pageCourante<$totalPages){
    echo "<a class='pagination_button btn btn-primary' href='?page=".($pageCourante+1)."#actus'>Suivant</a>";
 }
?>