<div class="movimientos" id="form">
    <div class="bar" id="">
            <div class="txt-m">Movimientos</div><div class="close"><button id="closeUsuarios" onclick="cierraForm();" >X</button></div>
    </div>
    <form action="movimientos/o_movimientos.php" method="post" id="formu" onsubmit="validarFecha()">
        <table>
            <tr>
                <td colspan="1">Motivo: </td><td colspan="1">
                    <input type="text" name="motivo" id="motivo" required onchange="cargaMotivo();">
                </td>
                <td colspan="1" class="table-cell"><label for="" id="d_motivo">.</label></td>
                <td colspan="1">Número Factura: </td>
                <td colspan="1"><input type="number" name="n_factura" id="nf"></td>
            </tr>
            <tr>
                <td colspan="1">Proveedor: </td>
                <td colspan="1"><input type="number" name="proveedor" id="p"></td>
                <td colspan="1" class="table-cell"><label for="" id="resultado">.</label></td>
                            

                <td colspan="1">Fecha Factura: </td>
                <td colspan="1"><input type="date" name="f_factura" id="fecha" required id="ff"></td>
            </tr>
        </table>
        <br><br>
        <table class="table-items">
            <thead>
                <tr>
                    <th>Item</th><th>Descripción</th><th>Cantidad</th><th>Valor Unidad</th><th>Valor Total</th>
                </tr>
            </thead>
            <tbody id = "datos">
                <tr>
                    <td class="d">
                        <input type="number" style="width:50px;" id="item" required name="id_item" onchange="cargaItem();" >
                    </td>
                    <td class="table-desc-item">
                        <label for="" id="d_item"></label>
                    </td>
                    <td class="d">
                        <input type="number" style="width:50px;" id="cant" required name="cant">
                    </td>
                    <td class="d">
                        <input type="number" style="width:80px;" id="v_kg"  required name="v_kg" onchange="vTotal();">
                    </td>
                    <td class="d">
                        <input for="" id="v_total" name="v_total" readonly> $
                    </td>
                </tr>

            </tbody>
        </table>
        <br>
        <div class="buttons">
            <button class="cancel" id="close">Cancelar</button>
            <input type="submit" class="registrar" value="Registrar">
        </div>    
    </form>
</div>