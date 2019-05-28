<?php


function __autoload($class_name) {
    switch ($class_name[0]) {
        case 'V':
            require_once ('View/'.$class_name.'.php');
            break;
        case 'F':
            require_once ('Foundation/'.$class_name.'.php');
            break;
        case 'E':
       
        $A=substr($class_name,0,2);
        $A=strtoupper($A);
        $B=substr($class_name,2);
        $class_name=$A.$B;
        
            require_once ('Entity/'.$class_name.'.php');
            break;
        case 'C':
            require_once ('Controller/'.$class_name.'.php');
            break;
        case 'U':
            require_once ('Foundation/Utility/'.$class_name.'.php');
    }
}



?>


