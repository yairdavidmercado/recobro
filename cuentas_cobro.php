
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
    <title>Recobro</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/offcanvas/">

    <!-- Bootstrap core CSS -->
<link href="/recobro/assets/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<meta name="theme-color" content="#563d7c">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .loader{
        position: fixed;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background: url('/recobro/assets/img/loader.gif') 
                    50% 50% no-repeat rgb(249,249,249);
      }

      /* 
      Generic Styling, for Desktops/Laptops 
      */
      table { 
        width: 100%; 
        border-collapse: collapse; 
      }
      /* Zebra striping */
      tr:nth-of-type(odd) { 
        background: #eee; 
      }
      th { 
        background: #fff; 
        color: #000; 
        font-weight: bold;
        font-size: 8px; 
      }
      td, th { 
        padding: 6px; 
        border: 1px solid #ccc; 
        text-align: left; 
        font-size: 8px;
        cursor: pointer;
      }
      .nombre_medicamento {
        width: 200px;
      }
    </style>
  </head>
  <body class="bg-light">
  <div class="loader"></div>
<main role="main" class="container py-5">
<div class="row">
  <div class="col-md-12 order-md-1">
    <h5>ANEXO TÉCNICO</h5>
    <hr>
  <!-- <div class="float-right"><img src="assets/img/logos.png" width="300px" alt="" srcset=""></div> -->
    <h4 class="mb-3">Consultar</h4>
    <div class="row">
      <div class="col-sm-7">
        <form id="admision" role="form" onsubmit="event.preventDefault(); return GenerarAnexoTecnico();" class="needs-validation">
          <div class="row">
            <div class="col-md-5 mb-3">
              <label for="firstName">Buscar por cuenta de cobro</label>
              <input type="text" placeholder="Presione ENTER para buscar" id="cuenta_cobro" class="form-control" placeholder="" value="" required>
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>
            <div style="display:none" class="col-md-3" style="margin-top: 31px;">
                <button class="btn btn-success" type="submit">Consultar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</main>
<script src="/recobro/assets/js/jquery.slim.min.js" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="/recobro/assets/js/jquery.slim.min.js"><\/script>')</script>
<script src="/recobro/assets/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script>
$(function() {
  $(".loader").css("display", "none")
});

function GenerarAnexoTecnico() {
    window.location.href = 'tcpdf/examples/archivo_plano.php?parametro1='+$("#cuenta_cobro").val();
}

</script>
</body>
</html>
