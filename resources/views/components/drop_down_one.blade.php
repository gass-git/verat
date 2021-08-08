<div id="drop-down-one" class="drop-down shadow" style="right:300px">
  <a class="p-3" href="#" style="color:black;">Recent</a>
  <br>
  <a class="p-3" href="#" style="color:black;">Views</a>
  <br>
  <a class="p-3" href="#" style="color:black;">Popoularity</a>
  <br>
  <a class="p-3" href="#" style="color:black;">Comments</a>
</div>
  
  <script>
    $('#sort-by').on('click',function(){
  
      let drop_down = $("#drop-down-one");
  
      if(drop_down.css('display') == 'block'){
        drop_down.css('display', 'none') 
      }else{
        drop_down.css('display', 'block')
        $("#drop-down-two").css('display', 'none')
      }
      
    })
  </script>