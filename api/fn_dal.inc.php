<?php
//Including the class definitions
require_once("oo_bll.inc.php");

//JSON HELPER FUNCTIONS
function jsonOne($file,$id)
{
    $splfile = new SplFileObject($file);
    $splfile->seek($id-1);
    $data = json_decode($splfile->current());
    return $data;
}

function jsonAll($file)
{
    $entries = file($file);
    $array = [];
    foreach($entries as $entry)
    {
        $array[] = json_decode($entry);
    }
    return $array;
}

function jsonNextID($file)
{
    $splfile = new SplFileObject($file);
    $splfile->seek(PHP_INT_MAX);
    return $splfile->key() + 1;
}

function jsonRowCount($file)
{
    $splfile = new SplFileObject($file);
    $splfile->seek(PHP_INT_MAX);
    return $splfile->key();
}