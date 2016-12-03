<?php

class ColegioController{

    public function datos(){
        require_once 'view/header.php';
        require_once 'view/colegio/datos.php';
        require_once 'view/footer.php';

    }
    
    public function otros(){
        $json = file_get_contents('https://www.datos.gov.co/resource/t9ja-5uqp.json');
        $dato = json_decode($json);
        
        require_once 'view/header.php';
        require_once 'view/colegio/otros.php';
        require_once 'view/footer.php';
    }
    
    public function comparar(){
        $json = file_get_contents('https://www.datos.gov.co/resource/t9ja-5uqp.json');
        $dato = json_decode($json);
        
        $json = file_get_contents('https://www.datos.gov.co/resource/t9ja-5uqp.json?institucioneducativa='.str_replace(" ","+",$_REQUEST['colegio1']));
        $aliado1=json_decode($json);
        $json = file_get_contents('https://www.datos.gov.co/resource/t9ja-5uqp.json?institucioneducativa='.str_replace(" ","+",$_REQUEST['colegio2']));
        $aliado2=json_decode($json);
        $grafic1="[['".$_REQUEST['colegio1']."',".$aliado1[0]->mmaprimaria2016."],['".$_REQUEST['colegio2']."',".$aliado2[0]->mmaprimaria2016."]]";
        $grafic2="[['".$_REQUEST['colegio1']."',".$aliado1[0]->mmasecundaria_2016."],['".$_REQUEST['colegio2']."',".$aliado2[0]->mmasecundaria_2016."]]";
        $grafic3="[['".$_REQUEST['colegio1']."',".$aliado1[0]->mmamedia2016."],['".$_REQUEST['colegio2']."',".$aliado2[0]->mmamedia2016."]]";
        
        //echo $grafic;
        
        require_once 'view/header.php';
        echo "<div id='graficadatos'>";
            echo '<div id="grafican1"></div>';
            echo '<div id="grafican2"></div>';
            echo '<div id="grafican3"></div>';
        echo "</div>";
        require_once 'view/colegio/otros.php';
        
        echo "<script type='text/javascript'>
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Topping');
            data.addColumn('number', 'Slices');
            data.addRows(".$grafic1.");
            var options = {'title':'Grafica de educacion primaria','width':350,'height':300};
            var chart = new google.visualization.ColumnChart(document.getElementById('grafican1'));
            chart.draw(data, options);
        }
        </script>";
        echo "<script type='text/javascript'>
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Topping');
            data.addColumn('number', 'Slices');
            data.addRows(".$grafic2.");
            var options = {'title':'Grafica de educacion segundaria','width':350,'height':300};
            var chart = new google.visualization.ColumnChart(document.getElementById('grafican2'));
            chart.draw(data, options);
        }
        </script>";
        echo "<script type='text/javascript'>
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Topping');
            data.addColumn('number', 'Slices');
            data.addRows(".$grafic3.");
            var options = {'title':'Grafica de educacion media','width':350,'height':300};
            var chart = new google.visualization.ColumnChart(document.getElementById('grafican3'));
            chart.draw(data, options);
        }
        </script>";
        
        require_once 'view/footer.php';
    }

}

?>