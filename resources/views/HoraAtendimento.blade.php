<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hora teste</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="{{asset('jquery.min.js')}}"></script>
    <script src="{{asset('inputmask/dist/jquery.inputmask.min.js')}}"></script>
    <script src="{{asset('inputmask/dist/bindings/inputmask.binding.js')}}"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
<div id='tabela'><table id='horaatendimentotable'>
            <tr>
                <th>Domingo</th>
                <th>Segunda</th>
                <th>Terça</th>
                <th>Quarta</th>
                <th>Quinta</th>
                <th>Sexta</th>
                <th>Sábado</th>
            </tr>
            <tr>
                <td><input type='checkbox' name='domingocheckbox' id='domingocheckbox' checked></td>
                <td><input type='checkbox' name='segundacheckbox' id='segundacheckbox'checked></td>
                <td><input type='checkbox' name='tercacheckbox' id='tercacheckbox'checked></td>
                <td><input type='checkbox' name='quartacheckbox' id='quartacheckbox'checked></td>
                <td><input type='checkbox' name='quintacheckbox' id='quintacheckbox'checked></td>
                <td><input type='checkbox' name='sextacheckbox' id='sextacheckbox'checked></td>
                <td><input type='checkbox' name='sabadocheckbox' id='sabadocheckbox'checked></td>
            </tr>
            <tr>
                <td><select name='domingoselect1' id='domingoselect1'></select></td>
                <td><select name='segundaselect1' id='segundaselect1'></select></td>
                <td><select name='tercaselect1' id='tercaselect1'></select></td>
                <td><select name='quartaselect1' id='quartaselect1'></select></td>
                <td><select name='quintaselect1' id='quintaselect1'></select></td>
                <td><select name='sextaselect1' id='sextaselect1'></select></td>
                <td><select name='sabadoselect1' id='sabadoselect1'></select></td>
            </tr>
            <tr>
                <td><select name='domingoselect2' id='domingoselect2'></select></td>
                <td><select name='segundaselect2' id='segundaselect2'></select></td>
                <td><select name='tercaselect2' id='tercaselect2'></select></td>
                <td><select name='quartaselect2' id='quartaselect2'></select></td>
                <td><select name='quintaselect2' id='quintaselect2'></select></td>
                <td><select name='sextaselect2' id='sextaselect2'></select></td>
                <td><select name='sabadoselect2' id='sabadoselect2'></select></td>
            </tr>
        </table></div>
        <input type='button' name='entenderbutton' id='entenderbutton' onclick='horas()' value='Atendimento'>
        <input type='button' name='horaatendimentobutton' id='horaatendimentobutton' onclick='cadastroagenda()' value='Cadastrar'>
</body>
<script>
preencherSelects();

function preencherSelects(){
    var dias = ['domingoselect1','segundaselect1','tercaselect1','quartaselect1','quintaselect1','sextaselect1','sabadoselect1', 'domingoselect2','segundaselect2','tercaselect2','quartaselect2','quintaselect2','sextaselect2','sabadoselect2'];
    var horas = ['07:00:00','07:15:00','07:30:00','07:45:00','08:00:00','08:15:00','08:30:00','08:45:00','09:00:00','09:15:00','09:30:00','09:45:00','10:00:00','10:15:00','10:30:00','10:45:00','11:00:00','11:15:00','11:30:00','11:45:00','12:00:00','12:15:00','12:30:00','12:45:00','13:00:00','13:15:00','13:30:00','13:45:00','14:00:00','14:15:00','14:30:00','14:45:00','15:00:00','15:15:00','15:30:00','15:45:00','16:00:00','16:15:00','16:30:00','16:45:00','17:00:00','17:15:00','17:30:00','17:45:00','18:00:00','18:15:00','18:30:00','18:45:00','19:00:00','19:15:00','19:30:00','19:45:00','20:00:00','20:15:00','20:30:00','20:45:00','21:00:00','21:15:00','21:30:00','21:45:00','22:00:00','22:15:00','22:30:00','22:45:00','23:00:00','23:15:00','23:30:00','23:45:00'];
    for(var o = 0; o<dias.length; o++){
        var select = document.getElementById(dias[o]);
        for(var i = 0; i<horas.length; i++){
            var opt = document.createElement('option');
            opt.appendChild(document.createTextNode(horas[i]));
            opt.value = horas[i];
            select.appendChild(opt);
        }
        if(o > 6){
            document.getElementById(dias[o]).value = '23:45:00';
        }else{
            document.getElementById(dias[o]).value = '07:00:00';
        }
        
    }
    
}
function horas(){
    var diass = ['domingo','segunda','terca','quarta','quinta','sexta','sabado'];
    for(var u = 0; u<diass.length; i=u++){
        if(document.getElementById(diass[u]+'checkbox').checked == true){
            console.log( diass[u] +' ele(a) trabalha de '+document.getElementById(diass[u]+'select1').value + ' até ' + document.getElementById(diass[u]+'select2').value);
        }
    }
}
function cadastroagenda(){
    $.ajax({
        type: "GET",
        url: "/cadastro/cadastroagenda",
        data: {
            domingocheckbox:$("[name='domingocheckbox']").prop('checked'),
            domingoselect1:$("[name='domingoselect1']").val(),
            domingoselect2:$("[name='domingoselect2']").val(),
            segundacheckbox:$("[name='segundacheckbox']").prop('checked'),
            segundaselect1:$("[name='segundaselect1']").val(),
            segundaselect2:$("[name='segundaselect2']").val(),
            tercacheckbox:$("[name='tercacheckbox']").prop('checked'),
            tercaselect1:$("[name='tercaselect1']").val(),
            tercaselect2:$("[name='tercaselect2']").val(),
            quartacheckbox:$("[name='quartacheckbox']").prop('checked'),
            quartaselect1:$("[name='quartaselect1']").val(),
            quartaselect2:$("[name='quartaselect2']").val(),
            quintacheckbox:$("[name='quintacheckbox']").prop('checked'),
            quintaselect1:$("[name='quintaselect1']").val(),
            quintaselect2:$("[name='quintaselect2']").val(),
            sextacheckbox:$("[name='sextacheckbox']").prop('checked'),
            sextaselect1:$("[name='sextaselect1']").val(),
            sextaselect2:$("[name='sextaselect2']").val(),
            sabadocheckbox:$("[name='sabadocheckbox']").prop('checked'),
            sabadoselect1:$("[name='sabadoselect1']").val(),
            sabadoselect2:$("[name='sabadoselect2']").val(),
        },
        dataType: "json",
        success: function(data) {
            console.log('Agenda Uga Buga Huga');
            }
        });
}
</script>
</html>