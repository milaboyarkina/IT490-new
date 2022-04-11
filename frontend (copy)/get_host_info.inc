<?php
/**
    @brief gets the currrent machine information and optionally any other task
    specific INI folder installed in the system path.
    Uses the default path of /var/system_ini/ unless $INIPATH is set
    @return parsed ini machine information
*/
function getHostInfo(array $extra = NULL, $try)
{
    $machine;
    
    if ($try == 0) {
        $machine = parse_ini_file("host.ini",$process_sections=true);
    }
     if ($try == 1) {
        $machine = parse_ini_file("host1.ini",$process_sections=true);
    }
     if ($try == 2) {
        $machine = parse_ini_file("host3.ini",$process_sections=true);
    }
    
    if ($extra != NULL)
    {
        foreach ($extra as $ini)
        {
            $parsed = parse_ini_file($ini,true);
            if ($parsed)
            {
                $machine = array_merge($machine,$parsed);
            }
        }
    }
    return $machine;
}

?>
