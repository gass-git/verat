<div id="drop-down-two" class="drop-down shadow" style="right:200px">
  <a class="p-3" href="#" style="color:black;">Freelance</a>
  <br>
  <a class="p-3" href="#" style="color:black;">JavaScript</a>
  <br>
  <a class="p-3" href="#" style="color:black;">Laravel</a>
  <br>
  <a class="p-3" href="#" style="color:black;">CSS</a>
  <br>
  <a class="p-3" href="#" style="color:black;">PHP</a>
</div>
  
  <script>
    $('#topics').on('click',function(){
  
      let drop_down = $("#drop-down-two");
  
      if(drop_down.css('display') == 'block'){
        drop_down.css('display', 'none')  
      }else{
        drop_down.css('display', 'block')
        $("#drop-down-one").css('display', 'none')
      }
      
    })
  </script>