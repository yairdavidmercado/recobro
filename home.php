
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
<link href="/gestion_documental/assets/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

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
        background: url('/gestion_documental/assets/img/loader.gif') 
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
        font-size: 10px; 
      }
      td, th { 
        padding: 6px; 
        border: 1px solid #ccc; 
        text-align: left; 
        font-size: 10px;
      }
    </style>
  </head>
  <body class="bg-light">
  <div class="loader"></div>
<main role="main" class="container py-5">
<div class="row">
  <div class="col-md-12 order-md-1">
    <h5>Solicitud de recobro por concepto de medicamentos, servicios médicos y prestaciones de salud NO POS - CTC MYT- 01</h5>
    <hr>
  <!-- <div class="float-right"><img src="assets/img/logos.png" width="300px" alt="" srcset=""></div> -->
    <h4 class="mb-3">Consultar</h4>
    <div class="row">
      <div class="col-sm-2">
      <label for="">Tipo de Busqueda</label>
        <div class="custom-control custom-radio custom-control-inline">
          <input onclick="tipo_busqueda('admision')" type="radio" checked="true" id="tipoAdmision1" value="1" name="tipo" class="custom-control-input">
          <label class="custom-control-label" for="tipoAdmision1">Admisíon</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
          <input onclick="tipo_busqueda('factura')" type="radio" name="tipo" id="tipoFactura1" value="2" class="custom-control-input">
          <label class="custom-control-label" for="tipoFactura1">Factura</label>
        </div>
      </div>
      <div class="col-sm-2">
        <label for="">Tipo de contrato</label>
        <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" checked="true" id="gobernacion1" name="contrato" value="1" class="custom-control-input">
          <label class="custom-control-label" for="gobernacion1">Gobernación</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" id="otro1" name="contrato" value="2" class="custom-control-input">
          <label class="custom-control-label" for="otro1">Otro</label>
        </div>
      </div>
      <div class="col-sm-7">
        <form id="admision" role="form" onsubmit="event.preventDefault(); return ShowPaciente();" class="needs-validation">
          <div class="row">
            <div class="col-md-5 mb-3">
              <label for="firstName">Buscar por admisión</label>
              <input type="text" placeholder="Presione ENTER para buscar" id="admision1" class="form-control" placeholder="" value="" required>
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>
            <div style="display:none" class="col-md-3" style="margin-top: 31px;">
                <button class="btn btn-success" type="submit">Consultar</button>
            </div>
          </div>
        </form>
        <form id="factura" style="display:none" role="form" onsubmit="event.preventDefault(); return ShowPaciente();" class="needs-validation">
          <div class="row">
            <div class="col-md-5 mb-3">
              <label for="firstName">Buscar por factura</label>
              <input type="text" placeholder="Presione ENTER para buscar" id="factura1" class="form-control inputId" placeholder="" value="" required>
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
    
    <hr>
    <form class="form" id="form_guardar_myt" role="form" methods="POST" onsubmit="event.preventDefault(); return guardar_myt();" autocomplete="off">
      <div class="row mb-4">
        <div class="col-sm-8">
          <div class="card">
            <div class="card-header">Datos del afiliado</div>
            <div class="card-body">
              <div class="form-group row" style="font-size:12px">
                <div class="col-sm-3" style="display:none">
                  <input type="text" readonly id="cod_admi" value="">
                  <input type="text" readonly id="cod_contra" value="">
                </div>
                <label for="staticEmail" class="col-sm-3 col-form-label">Tipo de documento:</label>
                <div class="col-sm-3">
                  <input type="text" readonly class="form-control-plaintext input-sm" id="tipo_id_pacien" value="">
                </div>
                <label for="staticEmail" class="col-sm-3 col-form-label">Nùmero de Documento</label>
                <div class="col-sm-3">
                  <input type="text" readonly class="form-control-plaintext input-sm" id="id_pacien" value="">
                </div>
                <label for="staticEmail" class="col-sm-3 col-form-label">Primer apellido</label>
                <div class="col-sm-3">
                  <input type="text" readonly class="form-control-plaintext input-sm" id="apell1" value="">
                </div>
                <label for="staticEmail" class="col-sm-3 col-form-label">Segundo apellido</label>
                <div class="col-sm-3">
                  <input type="text" readonly class="form-control-plaintext input-sm" id="apell2" value="">
                </div>
                <label for="staticEmail" class="col-sm-3 col-form-label">Primer Nombre</label>
                <div class="col-sm-3">
                  <input type="text" readonly class="form-control-plaintext input-sm" id="nom1" value="">
                </div>
                <label for="staticEmail" class="col-sm-3 col-form-label">Segundo Nombre</label>
                <div class="col-sm-3">
                  <input type="text" readonly class="form-control-plaintext input-sm" id="nom2" value="">
                </div>
                <label for="staticEmail" class="col-sm-3 col-form-label">Tipo de afiliación</label>
                <div class="col-sm-3">
                  <input type="text" readonly class="form-control-plaintext input-sm" id="tipoafiliado" value="">
                </div>
                <label for="staticEmail" class="col-sm-3 col-form-label">Nivel de cuota moderadora</label>
                <div class="col-sm-3">
                  <input type="text" readonly class="form-control-plaintext input-sm" id="nivel" value="">
                </div>  
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="card">
            <div class="card-header"> Datos de entidad</div>
            <div class="card-body">
              <div class="form-group row" style="font-size:12px">
                <label for="staticEmail" class="col-sm-4 col-form-label">Código SNS:</label>
                <div class="col-sm-8">
                  <input type="text" readonly class="form-control-plaintext input-sm" id="codmin" value="">
                </div>
              </div>
              <div class="form-group row" style="font-size:12px">
                <label for="staticEmail" class="col-sm-4 col-form-label">Razón social:</label>
                <div class="col-sm-8">
                  <input type="text" readonly class="form-control-plaintext input-sm" id="nom_ase" value="">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row mb-4">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-header">
              Detalles del recobro
            </div>
            <div class="card-body table-responsive">
              <table>
                <thead>
                <tr>
                  <th>Item</th>
                  <th>No.Acta CTC</th>
                  <th>Fecha Acta CTC</th>
                  <th>Fecha Solicitud Médico</th>
                  <th>Periodico (S/N)</th>
                  <th>Periodo Suministro</th>
                  <th>No. Factura</th>
                  <th>Fecha Prestación de Servicio</th>
                  <th>Fecha Radicacion Factura</th>
                  <th>Codigo Diagnostico (CIE)</th>
                  <th>% Semanas</th>
                  <th>NIT Proveedor</th>
                  <th>Nombre Proveedor</th>
                  <th>Codigo Medicamento, Servicio o prestación</th>
                  <th>Nombre Medicamento , Servicio o Prestación</th>
                  <th>Tipo Item</th>
                  <th>Cantidad</th>
                  <th>Valor Unitario</th>
                  <th>Valor Total</th>
                  <th>Valor Cuota Moderadora</th>
                  <th>Valor Recobro</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                </tbody>
              </table> 
            </div>
            <div class="card-header">
              Datos medicamentos, servicios médicos y/o prestaciones de salud NO POS
            </div>
            <div class="card-body table-responsive">
              <div class="row">
                <div class="col-sm-6" style="font-size:10px">
                  <b>MEDICAMENTO / SERVICIO MEDICO / PRESTACION DE SALUD - NO POS</b>
                </div>
                <div class="col-sm-6" style="font-size:10px">
                  <b>MEDICAMENTO / SERVICIO MEDICO / PRESTACION DE SALUD - NO POS</b>
                </div>
              </div>
              <table>
                <thead>
                <tr>
                  <th>Item</th>
                  <th>Nombre</th>
                  <th>Presentación</th>
                  <th>Frecuencia Uso</th>
                  <th>Días Autorizados</th>
                  <th>Cantidad</th>
                  <th>Valor Unitario</th>
                  <th>Valor Total</th>
                  <th>Codigo Similar POS</th>
                  <th>Nombre del Similar</th>
                  <th>Frecuencia Uso</th>
                  <th>Tiempo Días</th>
                  <th>Cantidad</th>
                  <th>Valor Unitario</th>
                  <th>Valor Total</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                </tbody>
              </table> 
            </div>
          </div>   
        </div>
      </div>
      <div class="row">
        <div class="col-sm-4">
          <div class="card">
            <div class="card-header"> Datos del recobro</div>
            <div class="card-body">
              <div class="form-group row" style="font-size:12px">
                <label for="staticEmail" class="col-sm-9 col-form-label">No. Consecutivo para radicación:</label>
                <div class="col-sm-3">
                  <input type="text" readonly class="form-control-plaintext input-sm" id="conse_radi1">
                </div>
              </div>
              <div class="form-group row" style="font-size:12px">
                <label for="staticEmail" class="col-sm-9 col-form-label">No. Consecutivo recobro:</label>
                <div class="col-sm-3">
                  <input type="text" readonly class="form-control-plaintext input-sm" id="conse_reco1" >
                </div>
              </div>
              <div class="form-group row" style="font-size:12px">
                <label for="staticEmail" class="col-sm-9 col-form-label">Tipo de radicación:</label>
                <div class="col-sm-3">
                  <input type="text" readonly class="form-control-plaintext input-sm" value="Nueva" name="tipo_radi" id="tipo_radi1">
                </div>
              </div>
              <div class="form-group row" style="font-size:12px">
                <label for="staticEmail" class="col-sm-9 col-form-label">No. Radicación recobro anterior MYT-01:</label>
                <div class="col-sm-3">
                  <input type="text" readonly class="form-control-plaintext input-sm" value="1" name="radi_reco_ant" id="radi_reco_ant1">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="card">
            <div class="card-header">  Declaración de la entidad</div>
            <div class="card-body">
              <div class="form-group row" style="font-size:11px">
                <label for="staticEmail" class="col-sm-6 col-form-label">Documento</label>
                <label for="staticEmail" class="col-sm-3 col-form-label">No. Doc.</label>
                <label for="staticEmail" class="col-sm-3 col-form-label">No. Folios</label>
                <label for="staticEmail" class="col-sm-6 col-form-label">Copia(s) de Acta(s) del CTC</label>
                <div class="col-sm-3">
                  <input type="text" id="ca_doc1" value="0" name="ca_doc" class="form-control input-sm">
                </div>
                <div class="col-sm-3">
                  <input type="text" id="ca_folio1" value="0" name="ca_folio" class="form-control input-sm">
                </div>
                <label for="staticEmail" class="col-sm-6 col-form-label">Facturas(s) del Proveedor(es) Cancelada(s)</label>
                <div class="col-sm-3">
                  <input type="text" id="fp_doc1" value="0" name="fp_doc" class="form-control input-sm">
                </div>
                <div class="col-sm-3">
                  <input type="text" id="fp_folio1" value="0" name="fp_folio" class="form-control input-sm">
                </div>
                <label for="staticEmail" class="col-sm-6 col-form-label">Orden(es) ó Formula(s) Médica(s)</label>
                <div class="col-sm-3">
                  <input type="text" id="of_doc1" value="0" name="of_doc" class="form-control input-sm">
                </div>
                <div class="col-sm-3">
                  <input type="text" id="of_folio1" value="0" name="of_folio" class="form-control input-sm">
                </div>
                <label for="staticEmail" class="col-sm-6 col-form-label">Soportes Integrales del Recobro</label>
                <div class="col-sm-3">
                  <input type="text" id="si_doc1" value="0" name="si_doc" class="form-control input-sm">
                </div>
                <div class="col-sm-3">
                  <input type="text" id="si_folio1" value="0" name="si_folio" class="form-control input-sm">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="card">
            <div class="card-header">Datos de la solicitud en la que se anexó la copia del Acta o del Recobro Anterior</div>
            <div class="card-body">
              <div class="form-group row" style="font-size:11px">
                  <label for="staticEmail" class="col-sm-9 col-form-label">No. Radicación anterior reposa Acta de CTC(Formato MYT-01)</label>
                  <div class="col-sm-3">
                    <input type="text" id="radi_ant_reposa1" value="0" name="radi_ant_reposa" class="form-control input-sm" value="0">
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12 mb-2">
        <button type="submit" id="btn_submit" class="btn btn-success float-right">Guardar</button>
        <div id="btn_imprimir"></div>
        </div>
      </div>
    </form>
    <div id="div_modal">
    </div>
    <!-- <div class="table-responsive-sm" >
      <table id="example" style="font-size:11px" class="table table-striped table-bordered" >
          <thead >
              <tr>
                  <th style="width:10px">Radicado</th>
                  <th style="width:300px">Nombre</th>
                  <th style="width:300px">Asunto</th>
                  <th style="width:150px">Fecha</th>
                  <th style="width:10px">Tramite</th>
                  <th style="width:10px">Respuesta</th>
                  <th style="width:10px">Descargar radicado</th>
                  <th style="width:10px">Descargar respuesta</th>
              </tr>
          </thead>
          <tbody id="tbodytable">
              
          </tbody>
          <tfoot>
              <tr>
                  <th style="width:10px">Radicado</th>
                  <th style="width:300px">Nombre</th>
                  <th style="width:300px">Asunto</th>
                  <th style="width:10px">Fecha</th>
                  <th style="width:10px">Tramite</th>
                  <th style="width:10px">Respuesta</th>
                  <th style="width:10px"></th>
              </tr>
          </tfoot>
      </table>
    </div> -->
    
  </div>
</div>
</main>
<script src="/gestion_documental/assets/js/jquery.slim.min.js" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="/gestion_documental/assets/js/jquery.slim.min.js"><\/script>')</script>
<script src="/gestion_documental/assets/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script>
$(function() {
  $(".loader").css("display", "none")
});

function ShowPaciente() {
  limpiar_informacion();
  let valorBusqueda = ''
  if ($("input[name='tipo']:checked").val() == 1) {
    valorBusqueda = $('#admision1').val()
  }else if ($("input[name='tipo']:checked").val() == 2) {
    valorBusqueda = $('#factura1').val()
  }
    let values = { 
          cod: $("input[name='tipo']:checked").val(),
          parametro1: valorBusqueda,
          parametro2: $("input[name='contrato']:checked").val()
    };
    $.ajax({
    type : 'POST',
    data: values,
    url: 'php/sel_info_paciente.php',
    beforeSend: function() {
        $(".loader").css("display", "inline-block")
    },
    success: function(respuesta) {
      $(".loader").css("display", "none")
        let obj = JSON.parse(respuesta)
        let fila = ''
        if (respuesta !== '[[]]') {
          $.each(obj[0], function( index, val ) {
            $("#cod_admi").val(val.cod_admi);
            $("#cod_contra").val(val.cod_contra);
            $("#cod_pacien").val(val.cod_pacien);
            $("#tipo_id_pacien").val(val.tipo_id_pacien);
            $("#id_pacien").val(val.id_pacien);
            $("#nom1").val(val.nom1);
            $("#nom2").val(val.nom2);
            $("#apell1").val(val.apell1);
            $("#apell2").val(val.apell2);
            $("#tipoafiliado").val(val.tipoafiliado);
            $("#nivel").val(val.nivel);
            $("#nom_ase").val(val.nom_ase);
            $("#codmin").val(val.codmin);
            ShowMyt(val.cod_admi, val.cod_contra)
          });
          //$('#example').DataTable().ajax.reload();
        }else{
          alert("no se encontraron resultados")
        }
    },
    error: function() {
      $(".loader").css("display", "")
      console.log("No se ha podido obtener la información");
    }
  });
    
  }

  function ShowMyt(cod_admi, cod_contra) {
  let mensajeNuevo = ''
  if ($("input[name='tipo']:checked").val() == 1) {
    mensajeNuevo = '¿ Deseas crear un registro nuevo para la admision: '+$('#admision1').val()+" ?"
  }else if ($("input[name='tipo']:checked").val() == 2) {
    mensajeNuevo = '¿ Deseas crear un registro nuevo para la factura: '+$('#factura1').val()+" ?"
  }
    let values = { 
          cod: '3',
          parametro1: cod_admi,
          parametro2: cod_contra
    };
    $.ajax({
    type : 'POST',
    data: values,
    url: 'php/sel_info_paciente.php',
    beforeSend: function() {
        //$(".loader").css("display", "inline-block")
    },
    success: function(respuesta) {
      $(".loader").css("display", "none")
        let obj = JSON.parse(respuesta)
        let fila = ''
        if (respuesta !== '[[]]') {
          $.each(obj[0], function( index, val ) {
          $("#conse_radi1").val(val.conse_radi);
          $("#conse_reco1").val(val.conse_reco);
          $("#tipo_radi1").val(val.tipo_radi);
          $("#radi_reco_ant1").val(val.radi_reco_ant);

          $("#ca_doc1").val(val.ca_doc);
          $("#fp_doc1").val(val.fp_doc);
          $("#of_doc1").val(val.of_doc);
          $("#si_doc1").val(val.si_doc);
          $("#ca_folio1").val(val.ca_folio);
          $("#fp_folio1").val(val.fp_folio);
          $("#of_folio1").val(val.of_folio);
          $("#si_folio1").val(val.si_folio);
          $("#radi_ant_reposa1").val(val.radi_ant_reposa);
          $("#btn_imprimir").html('<a target="_blank" href="tcpdf/examples/myt.php?cod='+$("input[name='tipo']:checked").val()+'&parametro1='+val.cod_admi+'&parametro2='+$("input[name='contrato']:checked").val()+'" class="btn btn-primary float-right">Imprimir</a>')
          });
        }else{
          $("#btn_imprimir").html("");
          iniciar_modal(mensajeNuevo)
        }
        //$('#example').DataTable().ajax.reload();
    },
    error: function() {
      $(".loader").css("display", "")
      console.log("No se ha podido obtener la información");
    }
  });
    
  }

  function guardar_myt() {
      if ($('#cod_admi').val().length > 0) {
        $.ajax({
          type : 'POST',
          data: $("#form_guardar_myt").serialize()+"&cod_admi="+$('#cod_admi').val()+"&cod_contra="+$('#cod_contra').val()+"&cod_usua=0",
          url: 'php/guardar_myt.php',
          beforeSend: function() {
              $(".loader").css("display", "inline-block")
          },
          success: function(respuesta) {
            $(".loader").css("display", "none")
            let obj = JSON.parse(respuesta)
            if (obj.success) {
              ShowMyt($("#cod_admi").val(), $("#cod_contra").val())
              alert("Los datos han sido guardados exitosamente")
            }else{
              alert('Datos invalidos para el acceso')
            }
          },
          error: function() {
            console.log("No se ha podido obtener la información");
          }
        });
      }else{
        alert("Usted aun no ha realizado la busqueda del paciente a registrar.")
      }
      
    }

  function limpiar_informacion() {
    $("#cod_pacien").val("");
    $("#tipo_id_pacien").val("");
    $("#id_pacien").val("");
    $("#nom1").val("");
    $("#nom2").val("");
    $("#apell1").val("");
    $("#apell2").val("");
    $("#tipoafiliado").val("");
    $("#nivel").val("");
    $("#nom_ase").val("");
    $("#codmin").val("");
    
    $("#conse_radi1").val("");
    $("#conse_reco1").val("");
    $("#tipo_radi1").val("Nueva");
    $("#radi_reco_ant1").val("0");

    $("#ca_doc1").val("0");
    $("#fp_doc1").val("0");
    $("#of_doc1").val("0");
    $("#si_doc1").val("0");
    $("#ca_folio1").val("0");
    $("#fp_folio1").val("0");
    $("#of_folio1").val("0");
    $("#si_folio1").val("0");
    $("#radi_ant_reposa1").val("0");
  }

  function iniciar_modal(text) {
    $("#div_modal").html('<!-- Button trigger modal -->'+
    '<button style="display:none" id="btn_modal" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">'+
      'Launch demo modal'+
    '</button>'+

    '<!-- Modal -->'+
    '<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">'+
      '<div class="modal-dialog" role="document">'+
        '<div class="modal-content">'+
          '<div class="modal-header">'+
            '<h5 class="modal-title" id="exampleModalLabel">Atención</h5>'+
            '<button type="button" id="btn_close_modal" class="close" data-dismiss="modal" aria-label="Close">'+
              '<span aria-hidden="true">&times;</span>'+
            '</button>'+
          '</div>'+
          '<div class="modal-body">'+
            text+
          '</div>'+
          '<div class="modal-footer">'+
          '<button onclick="click_submit()" type="button" class="btn btn-primary">Crear</button>'+
            '<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>'+
          '</div>'+
        '</div>'+
      '</div>'+
    '</div>')
    $("#btn_modal").click()
  }

  function click_submit() {
    $("#btn_submit").click()
    $("#btn_close_modal").click()
  }

  function tipo_busqueda(consec) {
        if (consec == "admision") {
            $("#admision").css("display", "block")
            $("#factura").css("display", "none")
        }else{
            $("#admision").css("display", "none")
            $("#factura").css("display", "block")
        }
    }
</script>
</body>
</html>
