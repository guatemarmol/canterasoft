
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="../js/jquery-3.2.1.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.quicksearch/2.2.1/jquery.quicksearch.js"></script>
<script src="../librerias/alertifyjs/alertify.min.js"></script>
<!-- <script type="text/javascript" src="../librerias/alertifyjs/alertify.js"></script> -->

<script type="text/javascript" src="../librerias/datatable/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../librerias/datatable/dataTables.bootstrap.min.js"></script>

<script type="text/javascript" src="../librerias/datatable/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="../librerias/datatable/jszip.min.js"></script>
<script type="text/javascript" src="../librerias/datatable/pdfmake.min.js"></script>
<script type="text/javascript" src="../librerias/datatable/vfs_fonts.js"></script>
<script type="text/javascript" src="../librerias/datatable/buttons.html5.min.js"></script>

<script type="text/javascript" src="../js/pushbar.js"></script>

<script>
    var pushbar = new Pushbar({
    blur:true,
    overlay:true,
    });
</script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/material_orange.css">

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://npmcdn.com/flatpickr/dist/flatpickr.min.js"></script>
<script src="https://npmcdn.com/flatpickr/dist/l10n/ru.js"></script>

<script type="text/javascript" src="../js/login.js"></script>
<script type="text/javascript" src="../js/validaciones2.js"></script>
<script type="text/javascript" src="../js/jquery-barcode.js"></script>
<script type="text/javascript" src="../js/jquery.blockUI.js"></script>

<script type="text/javascript" >

function saltar(e,id){
    (e.keyCode)?k=e.keyCode:k=e.which;

    if(k==13){
        if(id=="submit")
        {
            document.forms[0].submit();
        }else{
            document.getElementById(id).focus();
        }
    }
}

function letras(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==8) return true;
    patron =/[A-Za-z\s????????????']/;
    te = String.fromCharCode(tecla);
    return patron.test(te);
}

function numeros(e) { // 1
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==8) return true;
    patron =/[1234567890-]/;
    te = String.fromCharCode(tecla);
    return patron.test(te);
}

function addZero(i) {
    if (i < 10) {
        i = '0' + i;
    }
    return i;
}

function relojCalendario(){

    momentoActual = new Date();
    hh = momentoActual.getHours();
    mm = momentoActual.getMinutes();
    ss = momentoActual.getSeconds();

    if(hh<10) {
    hh=0+hh;
    }
    hh = addZero(hh);
    if(mm<10) {
    mm=0+mm;
    }
    mm = addZero(mm);
    if(ss<10) {
    ss=0+ss;
    }
    ss = addZero(ss);
    hora = hh+":"+mm+":"+ss;
    document.form.hora.value = hora;
    setTimeout("relojCalendario()",1000);

    if(dd<10) {
    dd='0'+dd;
    }
    if(mm<10) {
    mm='0'+mm;
    }
    var hoy = new Date();
    var dd = hoy.getDate();
    var mm = hoy.getMonth()+1;
    var yyyy = hoy.getFullYear();

    dd = addZero(dd);
    mm = addZero(mm);
    fecha = dd+'/'+mm+'/'+yyyy;
    document.form.fecha.value = fecha;
}

function mascaraObloqueo(){
     $.blockUI({
     message:'<p class="datos"><img class="gif" src="../images/gif/cargar (6).gif" width="70" height="70"></p>',
     css: {
        border: '1px solid transparent',
        padding: '15px 5px 5px 5px',
        backgroundColor: 'transparent',
        '-webkit-border-radius': '10px',
        '-moz-border-radius': '10px',
        opacity: .5,
        color: '#fff'
    } });

    setTimeout($.unblockUI, 2000);
}

</script>
<style type="text/css">
    .datos{
        font-size: 30px;
    }
    .gif{
        margin-left: 10px;
    }
    @media (max-width: 767px){

    }
</style>
