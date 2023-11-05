<?php
    include_once("./xuly/mTaikhoan.php");
    class controllerTaiKhoan{
        function addTaiKhoan($ten, $pass){
            $p = new modelTaiKhoan();
            $kqInsert = $p -> insertTaiKhoan($ten, $pass);
            return $kqInsert;
        }
    }
?>