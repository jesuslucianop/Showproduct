<?php
include "./Library/Header.php";
?>
<script>
    $(document).ready(function() {
        alert("klk");


        $.ajax({
            url: './Library/Motor.php',
            data: {
                "parametros": "s"
            },
            type: "GET",
            dataType: 'json',
            success: function(data) {
                console.log("paso");
                console.log(data);
            }
        })

    });
</script>
<div class="row"></div>

<?php
include "./Library/footer.php";
?>