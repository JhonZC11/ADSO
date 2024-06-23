<?php
class ventas{
    public function buscarAll($conn, $fi, $ff, $operario){
        $html='';
        $sql = "SELECT * FROM factura_venta WHERE fecha BETWEEN '$fi' AND '$ff' AND operario='$operario'";
        $result = $conn->query($sql);
        $result = $conn->query($sql);
        while($fila = $result->fetch_row()){
            $html .= '<tr class="text-center fw-bold">';
            $html .= '<td>'.$fila[0].'</td>';
            $html .= '<td>'.$fila[1].'</td>';
            $html .= '<td>'.$fila[2].'</td>';
//          $html .= '<td>'.$fila[3].'</td>';
            $html .= '<td>'.$fila[4].'</td>';
            $html .= '<td>'.$fila[5].'</td>';
            $html .= '<td>'.$fila[6].'</td>';
            $html .= '<td>'.$fila[7].'</td>';
            $html .= '<td>'.$fila[8].'</td>';
            $html .= '</tr>';
        }
        echo $html;
    }

    public function buscarFecha($conn, $fi, $ff){
        $html = '';
        $sql = "SELECT * FROM factura_venta WHERE fecha BETWEEN '$fi' AND '$ff'";
        $result = $conn->query($sql);
        while($fila = $result->fetch_row()){
            $html .= '<tr class="text-center fw-bold">';
            $html .= '<td>'.$fila[0].'</td>';
            $html .= '<td>'.$fila[1].'</td>';
            $html .= '<td>'.$fila[2].'</td>';
//          $html .= '<td>'.$fila[3].'</td>';
            $html .= '<td>'.$fila[4].'</td>';
            $html .= '<td>'.$fila[5].'</td>';
            $html .= '<td>'.$fila[6].'</td>';
            $html .= '<td>'.$fila[7].'</td>';
            $html .= '<td>'.$fila[8].'</td>';
            $html .= '</tr>';
        }
        echo $html;
    }

    public function buscaOperario($conn, $operario){
        $html = '';
        $sql = "SELECT * FROM factura_venta WHERE operario= '$operario'";
        $result = $conn->query($sql);
        while($fila = $result->fetch_row()){
            $html .= '<tr class="text-center fw-bold">';
            $html .= '<td>'.$fila[0].'</td>';
            $html .= '<td>'.$fila[1].'</td>';
            $html .= '<td>'.$fila[2].'</td>';
//          $html .= '<td>'.$fila[3].'</td>';
            $html .= '<td>'.$fila[4].'</td>';
            $html .= '<td>'.$fila[5].'</td>';
            $html .= '<td>'.$fila[6].'</td>';
            $html .= '<td>'.$fila[7].'</td>';
            $html .= '<td>'.$fila[8].'</td>';
            $html .= '</tr>';
        }
        echo $html;
    }


    public function buscaFecha($conn, $f){
        $html = '';
        $sql = "SELECT * FROM factura_venta WHERE fecha ='$f'";
        $result = $conn->query($sql);
        while($fila = $result->fetch_row()){
            $html .= '<tr class="text-center fw-bold">';
            $html .= '<td>'.$fila[0].'</td>';
            $html .= '<td>'.$fila[1].'</td>';
            $html .= '<td>'.$fila[2].'</td>';
//          $html .= '<td>'.$fila[3].'</td>';
            $html .= '<td>'.$fila[4].'</td>';
            $html .= '<td>'.$fila[5].'</td>';
            $html .= '<td>'.$fila[6].'</td>';
            $html .= '<td>'.$fila[7].'</td>';
            $html .= '<td>'.$fila[8].'</td>';
            $html .= '</tr>';
        }
        echo $html;
    }

    public function all ($conn){
        $html = '';
        $sql = "SELECT * FROM factura_venta";
        $result = $conn->query($sql);
        while($fila = $result->fetch_row()){
            $html .= '<tr class="text-center fw-bold">';
            $html .= '<td>'.$fila[0].'</td>';
            $html .= '<td>'.$fila[1].'</td>';
            $html .= '<td>'.$fila[2].'</td>';
//            $html .= '<td>'.$fila[3].'</td>';
            $html .= '<td>'.$fila[4].'</td>';
            $html .= '<td>'.$fila[5].'</td>';
            $html .= '<td>'.$fila[6].'</td>';
            $html .= '<td>'.$fila[7].'</td>';
            $html .= '<td>'.$fila[8].'</td>';
            $html .= '</tr>';
        }
        echo $html;
    }
}
$venta = new ventas();