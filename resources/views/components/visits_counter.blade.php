<style>
.number-container {
  display: inline-block;
  padding: 6px 6px 4px;
  border-radius: 3px;
  background: #787A91;
  margin-right: 2px;
  color:rgb(255, 255, 255);
}
</style>

@php

  $num_lenght = strlen((string)$visits);
  $digit = array();

  for($pos = 6; $pos >= 0; $pos--){
    if($num_lenght-1 < $pos){
      echo '<span class="number-container">'.'0'.'</span>';
    }else{
      echo '<span class="number-container">'.substr($visits, $pos, $pos+1).'</span>';
    }
  }
  
@endphp
