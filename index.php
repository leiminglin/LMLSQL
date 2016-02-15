<?php
function getRemoteLmlPhp(){
    $cache_filename = 'lml.min.php';
    $remotelib = 'http://git.oschina.net/leiminglin/LMLPHP/raw/master/lml.min.php';
    if( file_exists( $cache_filename ) ) {
        $cachemtime = filemtime($cache_filename);
        if( $cachemtime + 86400 > time() ){
            require $cache_filename;
            return;
        }
        $header = get_headers($remotelib);
        $lastmtime = 0;
        foreach ($header as $k){
            if( preg_match('/^Last-Modified:/i', $k) ){
                $lastmtime = strtotime(preg_replace('/^Last-Modified:/i', '', $k));
                break;
            }
        }
        if( $lastmtime <= $cachemtime ){
            touch($cache_filename);
            require $cache_filename;
            return;
        }
    }
    $code = file_get_contents( $remotelib );
    file_put_contents($cache_filename, $code);
    eval('?>'.$code);
}
getRemoteLmlPhp();

lml()->app()->run();
