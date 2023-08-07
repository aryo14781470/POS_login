<?php

        function successAlert($bold, $message){
        return '<div class="container">
                <div class="alert alert-success alert-dismissible">
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        <strong>'.$bold.'</strong>'.$message.'
                </div>
                </div>';
        }

        function dangerAlert($bold, $message){
        return '<div class="container">
                <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        <strong>'.$bold.'</strong>'.$message.'
                </div>
                </div>';;
        }

        function infoAlert($bold, $message){
        return '<div class="container">
                <div class="alert alert-info alert-dismissible">
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        <strong>'.$bold.'</strong>'.$message.'
                </div>
                </div>';
        }

        function warningAlert($bold, $message){
        return '<div class="container">
                <div class="alert alert-warning alert-dismissible">
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        <strong>'.$bold.'</strong>'.$message.'
                </div>
                </div>';
        }
                
?>