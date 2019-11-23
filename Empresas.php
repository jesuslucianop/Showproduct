<?php
include "./Library/Header.php";
?>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Codigo</th>
            <th scope="col">Nombre</th>
            <th scope="col">Hadwares</th>
            <th scope="col">Accion</th>
        </tr>
    </thead>
    <tbody id="caja">
       
    </tbody>
</table>
<script>
    $(document).ready(function() {
        alert("entro");
        datos = [];

        $.ajax({
            url: './Library/Motor.php',
            data: {
                "empresas": "s"
            },
            type: "GET",
            dataType: 'json',
            success: function(data) {

                for (x = 0; x < data.length; x++) {
                    $("#caja").append("<tr><td>" + data[x].codigo + "</td>"+
                    "<td>"+data[x].Nombre+"</td>"
                    +"</tr>");
                    console.log(data[x]);
                }
                console.log(data[0]);
                datos.push(data);
            }
        })

    });
</script>
<?php
include "./Library/footer.php";
?>