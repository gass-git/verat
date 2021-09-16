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

<div title="Unique visitors">

@php

  /** @abstract
   * 
   * 1) Convert the integer to string.
   * 2) Reverse the string.
   * 3) Echo each character of the reversed string using the index approach.
   * 
   */
  $lenght = strlen((string)$visits);
  $reversed_string = strrev((string)$visits);

  for($pos = 6; $pos >= 0; $pos--){
    
    if($lenght-1 < $pos){
      echo '<span class="number-container p-1">'.'0'.'</span>';
    }else{
      echo '<span class="number-container p-1">'.$reversed_string[$pos].'</span>'; 
    }

  }
  
@endphp
</div>