<?php


class dataCache {

        function setMemData($key, $var, $flag = false, $expire = 36000) {
                global $memcache;
                if (!$memcache) {
                        $memcache = new Memcache;
                        $memcache->connect('my-release-memcached.memcached.svc.cluster.local', 11211) or die("Could not connect");
                }
                if ($result = $memcache->set($key, $var, $flag, time() + $expire)) {
                        return TRUE;
                } else {
                        return FALSE;
                }
        }

        function getMemData($key) {
                global $memcache;
                if (!$memcache) {
                        $memcache = new Memcache;
                        $memcache->connect('my-release-memcached.memcached.svc.cluster.local', 11211) or die("Could not connect");
                }

                if ($data = $memcache->get($key)) {
                        return $data;
                } else {
                        return FALSE;
                }
        }

        function delMemData($key) {
                global $memcache;
                if (!$memcache) {
                        $memcache = new Memcache;
                        $memcache->connect('my-release-memcached.memcached.svc.cluster.local', 11211) or die("Could not connect");
                }

                if ($result = $memcache->delete($key)) {
                        return TRUE;
                } else {
                        return FALSE;
                }
        }
}
if(isset($memcache)){
     $memcache->close();
}
