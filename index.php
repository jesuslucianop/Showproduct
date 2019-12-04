<?php
//include "./Library/Motor.php";
include "./Library/Header.php";


?>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" id="btnmodal">
  Inscribir nueva empresa corporativa

</button>
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modaleliminar" id="btnmodaleliminar">
  Eliminar hadware de empresas

</button>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Inscribir nueva empresa corporativa</h5>
        <button type="button" id="btnclose">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <label data-error="wrong" data-success="right" for="orangeForm-name">Selecciona tu empresa</label>
          <select id="selectempresa" class="form-control"></select>

        </div>
        <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <label data-error="wrong" data-success="right" for="orangeForm-name">Selecciona hadware</label>
          <select id="selecthadware" class="form-control"></select>

        </div>
      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-primary" id="btnsave">Save changes</button>
      </div>
    </div>
  </div>
</div>



<!-- Modal eliminar -->
<div class="modal fade" id="modaleliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Eliminar hadware de empresa </h5>
        <button type="button" id="btnclose">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <label data-error="wrong" data-success="right" for="orangeForm-name">Selecciona tu empresa</label>
          <select id="selectempresaeditar" class="form-control"></select>

        </div>
        <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <label data-error="wrong" data-success="right" for="orangeForm-name">Selecciona hadware</label>
          <select id="selecthadwareeditar" class="form-control"></select>

        </div>
      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-primary" id="btnsave">Save changes</button>
      </div>
    </div>
  </div>
</div>
<table class="table table-striped">
  <thead>
    <h1>Empresas / hadwares adquiridos</h1>

    <tr>
      <th scope="col">Empresa</th>
      <th scope="col">Hadwares Adquiridos</th>

    </tr>
  </thead>
  <tbody id="caja">

  </tbody>
</table>
<script>
  $(document).ready(function() {

    datos = [];

    $.ajax({
      url: './Library/Motor.php',
      data: {
        "corps_options": "s"
      },
      type: "GET",
      dataType: 'json',
      success: function(data) {

        //console.log(data);

        for (x = 0; x < data.length; x++) {
          $("#caja").append("<tr><td>" + data[x].nombre + "</td>" +
            "<td>" + data[x].hadwares + "</td>" +

            "</tr>");
          //  console.log(data[x]);
        }
        //console.log(data[0]);
        datos.push(data);
      }
    })
    $("#btnmodaleliminar").click(function() {

      $.ajax({
        url: './Library/Motor.php',
        data: {
          "corps_optionsmodal": "s"
        },
        type: "GET",
        dataType: 'json',
        success: function(data) {


          console.log(data);

          for (x = 0; x < data.length; x++) {
            $("#selectempresaeditar").append("<option value='" + data[x].codigo + "'>" +
              data[x].nombreempresa +
              "</option>"

            );
            $("#selecthadwareeditar").append("<option value='" + data[x].codigo + "'>" +
              data[x].nombreoption +
              "</option>"

            );

            // console.log(data[x]);
          }
        }
      })
    })
    $("#btnmodal").click(function() {

      $.ajax({
        url: './Library/Motor.php',
        data: {
          "prodcuto": "s"
        },
        type: "GET",
        dataType: 'json',
        success: function(data) {

          //console.log(data);
          for (x = 0; x < data.length; x++) {
            $("#selecthadware").append("<option value='" + data[x].codigo + "'>" +
              data[x].nombre +
              "</option>"

            );

            // console.log(data[x]);
          }
        }
      })
      $.ajax({
        url: './Library/Motor.php',
        data: {
          "empresas": "s"
        },
        type: "GET",
        dataType: 'json',
        success: function(datae) {

          // console.log(datae);
          for (x = 0; x < datae.length; x++) {
            $("#selectempresa").append("<option value='" + datae[x].codigo + "'>" +
              datae[x].Nombre +
              "</option>"

            );

            // console.log(datae[x]);
          }
        }
      });
      $("btnclose").click(function() {
        alert("klk ");
      });
      $("#btnsave").click(function() {


        var selectempresa = $("#selectempresa").val();
        var selecthadware = $("#selecthadware").val();

        $.ajax({
          url: './Library/Motor.php',
          data: {
            "btnguardar": "s",
            "valueofselectempresa": +selectempresa,
            "valueofselecthadware": +selecthadware
          },
          type: "POST",
          dataType: 'json',
          success: function(e) {
            if (e == "false") {
              alert("Esta empresa ya tiene agregado el hadware agregar, intente con otro.");
              location.reload();
            }

            console.log(e);
            location.reload();
          }

        });

      });
      $("#btnclose").click(function() {
        location.reload();
      });

      $('#btnmodal').modal({
        backdrop: 'static',
        keyboard: false
      })
    });

  });
</script>

<?php
include "./Library/footer.php";

?>