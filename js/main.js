if(document.URL.includes("computadoras.php")){
    function filtrar(){
        let tipo = $("#tipo");
        let fecha1 = $("#fecha1");
        let fecha2 = $("#fecha2");
        let nombre = $("#nombre");

        if(tipo[0].value == 0 && fecha1 == "" && fecha2 == "" && nombre == ""){
            location.reload()
        }else{
            $.ajax({
                url: "../php/server.php?compu_filter",
                type: "post",
                data: {"tipo": tipo[0].value, "fecha1": fecha1[0].value, "fecha2": fecha2[0].value, "nombre": nombre[0].value},
                success : function(data){
                    console.log(data)
                    $("#table-c-body")[0].html(data);
                }
            })
        }
    }

    $("#nombre").keyup(filtrar);
}