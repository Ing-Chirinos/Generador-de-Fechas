<?php
/*
se manda a llamar la funcion genFecha para generar fechas dentro de un rango
el primer valor es la cantidad de meses que quieres generar
el segundo es el mes en el que quieres que empiece la generacion de fechas
despues el año que quieres generar las fechas
el cuarto parametro es el dia  en el que quieres que empiecen las fechas
el ultimo parametro es el ultimo dia que generara la secuencia de fechas, 
por ejemplo si quieres que termine el dia 25 terminara el dia 25 del mes que tu le especifiques.

EJEMPLO:
si quieres generar un rango de fechas que empiece el 5 de agosto y termine el 28 de diciembre

la cantidad de meses seria 7
el mes en el que quieres que empiece seria 8
el año seria 2022
el dia de inicio seria 5
el dia de fin seria 28
*/
$fechas=(array)genFecha(7,8,2022,5,28);

//ciclo de ejemplo para recorrer las fechas y mostrar que funciona la funcion
foreach ($fechas as $key) {
  echo "Fecha: [".$key->fecha."]<br>";
}


//funcion para generar el rango de fechas
function genFecha($cantidad_meses,$month,$year,$diaInicio,$diaFin){
    //se crea un array vacio en el que posteriormente se guardaran las fechas
        $fechas=array();

        //variable que guarda el valor original del mes en el que queremos que empiece para hacer validaciones posteriormente
        $old_month=$month;

        //ciclo que ira incrementando el mes
        for($a=1;$a<=$cantidad_meses;$a++){
          //echo "Cantidad de meses recorridos:->[".$a."]<br>";

          //si el mes diferente del valor orifinal que tenia antes la variable de dia de inicio se vuelve 1
          //esto se hace para que en las demas iteraciones el dia de inicio empiece desde el uno y no desde el dia que habiamos puesto
            if($month!=$old_month){
                $diaInicio=1;
            }

            //se crea una fecha 
            $fecha = $year."-".$month."-".$diaInicio;
            $cant_dias= date( 't', strtotime( $fecha ) );

            echo "Fecha generada:---->".$fecha."<br>";
            echo "Cantidad de dias de la fecha generada:---->".$cant_dias."<br>";
            echo "MES:---->".$month."<br>";

            for($i=$diaInicio;$i<=$cant_dias;$i++){
                $objeto = new stdClass();
                if($i>=1 and $i<=9){
                    if($month>=1 and $month<=9){
                        $objeto->fecha=$year."-"."0".$month."-"."0".$i;
                    }else{
                        $objeto->fecha=$year."-".$month."-".$i;
                    }
                }else{
                    if($month>=1 and $month<=9){
                        $objeto->fecha=$year."-"."0".$month."-".$i;
                    }else{
                        $objeto->fecha=$year."-".$month."-".$i;
                    }
                }
                array_push($fechas, $objeto);
                if($a==$cantidad_meses && $i==$diaFin){
                  break;
                }
            }
            $month++;
        }

        return $fechas;

    }










?>