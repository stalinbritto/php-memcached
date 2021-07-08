<?php

try

{
    $memcached = new Memcached();
    $memcached->addServer("my-release-memcached.memcached.svc.cluster.local", 11211); 
#    $memcached->addServer("memcached-server.memcached.svc.cluster.local", 11211); 
    $response = $memcached->get("sample_key");
 
    if($response==true) 
    {
      echo $response;
    } 

    else

    {
    echo "Cache is empty";
    $memcached->set("sample_key", "Sample data from cache") ;
    }
}
catch (exception $e)
{
echo $e->getMessage();
}
?>
