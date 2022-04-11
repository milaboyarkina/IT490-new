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
    $hosts = array("host.ini", "host1.ini", "host2.ini");
    
    if 
        $machine = parse_ini_file("host.ini",$process_sections=true);
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
