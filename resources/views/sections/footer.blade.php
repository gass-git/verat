<style>
    footer{
        height:50px;
        border-top:1px solid rgb(216, 216, 216);
        text-align:center;
        min-width:443px;
    }
    .dash-circuit{
        height:90px; 
        width:90px;
        float:right;
        background-image: url('images/circuit.gif');
        border-radius:5px;
    }
    .dash-circuit img{
        margin:18px 0 0 17px;
    }
    .layer{
        opacity:0.5;
        background-color:rgba(14, 15, 110);
        border-radius:5px;
        width:100%;
        height:100%;
    }
    .layer:hover{
        opacity:0.8;
        transition:400ms ease-out;
    }
    a{
        color:#2e2e2e;
    }
    span{
        color:#2e2e2e;
    }
</style>

<footer>
    
    <div class="d-flex justify-content-center" style="margin-top:13px;font-size:13px;">
        
        <span class="mr-1">© 2021</span>

        <a href="https://github.com/gass-git/verat" target="_blank">
           Verat 0.7
        </a>
        
        <span class="ml-1 mr-1"> - Built by </span>

        <a href="https://gass.dev" target="_blank">
            Gass
        </a>

        <span class="ml-1 mr-1"> - </span>
        
        <a href="/login">
            Admin login
        </a>

        <span class="ml-1 mr-1"> - </span>

        <a href="/register">
            Staff registration
        </a>

    </div>
    
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.24.1/components/prism-core.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.24.1/plugins/autoloader/prism-autoloader.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.24.1/plugins/unescaped-markup/prism-unescaped-markup.min.js"></script>
<script src="prism.js"></script>

@include('sweetalert::alert')

<script>
    window.onload = function() {
        
        if (screen.width < 443) {
            var mvp = document.getElementById('vp');
            mvp.setAttribute('content','user-scalable=no,width=450');
        }

        $('[data-toggle="tooltip"]').tooltip();

    }


    </script>
