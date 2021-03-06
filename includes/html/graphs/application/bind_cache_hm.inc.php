<?php
$name = 'bind';
$app_id = $app['app_id'];
$unit_text     = 'per second';
$colours       = 'psychedelic';
$dostack       = 0;
$printtotal    = 0;
$addarea       = 1;
$transparency  = 15;

$rrd_filename = rrd_name($device['hostname'], array('app', 'bind', $app['app_id'], 'cache'));

$rrd_list=array();
if (rrdtool_check_rrd_exists($rrd_filename)) {
    $rrd_list[]=array(
        'filename' => $rrd_filename,
        'descr'    => 'Hits',
        'ds'       => 'ch',
    );
    $rrd_list[]=array(
        'filename' => $rrd_filename,
        'descr'    => 'Misses',
        'ds'       => 'cm',
    );
    $rrd_list[]=array(
        'filename' => $rrd_filename,
        'descr'    => 'Hits Frm Qry',
        'ds'       => 'chfq',
    );
    $rrd_list[]=array(
        'filename' => $rrd_filename,
        'descr'    => 'Misses Frm Qry',
        'ds'       => 'cmfq',
    );
} else {
    d_echo('RRD "'.$rrd_filename.'" not found');
}

require 'includes/html/graphs/generic_multi_line.inc.php';
