<html>
<head>
    <title>İl ilçe PDO</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>


<div class="container">
    <div class="row">
        <div class="col-md-12"><h1>PHP PDO ve MySQL ile il ilçe seçme</h1><hr></div>

        <div class="col-md-3">
            <label for="bolge">Bölge</label>
            <select name="bolge" id="bolge" class="form-control">
                <option value="">Seçin...</option>
            </select>
        </div>

        <div class="col-md-3">
            <label for="il">İl</label>
            <select name="il" id="il" class="form-control" disabled="disabled">
                <option value="">Seçin...</option>
            </select>
        </div>

        <div class="col-md-3">
            <label for="ilce">İlçe</label>
            <select name="ilce" id="ilce" class="form-control" disabled="disabled">
                <option value="">Seçin...</option>
            </select>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function(){
        ajaxFunc("bolge", "", "#bolge");

        $("#bolge").on("change", function(){

            $("#il").attr("disabled", false).html("<option value=''>Seçin..</option>");
            console.log($(this).val());
            ajaxFunc("il", $(this).val(), "#il");

        });

        $("#il").on("change", function(){

            $("#ilce").attr("disabled", false).html("<option value=''>Seçin..</option>");
            console.log($(this).val());
            ajaxFunc("ilce", $(this).val(), "#ilce");

        });

        function ajaxFunc(action, name, id ){
            $.ajax({
                url: "ajax.php",
                type: "POST",
                data: {action:action, name:name},
                success: function(sonuc){
                    $.each($.parseJSON(sonuc), function(index, value){
                        var row="";
                        row +='<option value="'+value+'">'+value+'</option>';
                        $(id).append(row);
                    });
                }});
        }
    });
</script>
</body>
</html>