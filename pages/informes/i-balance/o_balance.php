<?php
class balance{
    public function all($conn){
        $valoresBalance = array();
        $sql = "SELECT valor FROM balance";
        $resultado = $conn->query($sql);
        while($fila = $resultado->fetch_row()){
            $valoresBalance[] = $fila[0];
        }
        return $valoresBalance;
    }
    public function movimientos($conn, $fi, $ff, $motivo){
        if($motivo=="EAC" || $motivo == "DB"){
            if($motivo=="EAC"){
                $motivo="1";
            }
            if($motivo=="DB"){
                $motivo="2";
            }
            $sql = "SELECT * FROM movimientos WHERE fecha_factura BETWEEN '$fi' AND '$ff' AND motivos_idmotivos='$motivo'";
            $resultado = $conn->query($sql);
            return $resultado;
        } else if($motivo=="FC"){
            $sql = "SELECT * FROM facturas_compras WHERE fecha_factura BETWEEN '$fi' AND '$ff'";
            $resultado = $conn->query($sql);
            return $resultado;
        }
    }
}
$balance = new balance;