<style>
.number-container {
  display: inline-block;
  width:25px!important;
  height:35px!important;
  border-radius: 3px;
  margin-right: 3px;
  border:1px solid #686868;
  font-weight: 500;
  color:#ffffff;
  text-align:center;
  opacity:1;
}
</style>

@php

  $num_lenght = strlen((string)$visits);
  $digit = array();

  for($pos = 6; $pos >= 0; $pos--){
    if($num_lenght-1 < $pos){
      echo '<span class="number-container p-1">'.'0'.'</span>';
    }else{
      echo '<span class="number-container p-1">'.substr($visits, $pos, $pos+1).'</span>';
    }
  }
  
@endphp
