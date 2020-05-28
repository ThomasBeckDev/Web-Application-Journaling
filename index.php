<?php
//INCLUDING API
include("api/api.inc.php");

//PAGE GENERATION LOGIC
function createPage() {
    $content = <<<PAGE
<h1>Hello World from generated page</h1>
PAGE;
    return $content;
}

//BUSINESS LOGIC
session_start();
if (!appSessionIsSet()) {
    appRedirect("logIn.php");
}

$pagetitle = "Home Page";
$pagelead  = "";
$pagecontent = createPage();
$pagefooter = "";

//BUILDING HTML PAGE
$page = new MasterPage($pagetitle);
if(!empty($pagelead))
    $page->setDynamic1($pagelead);
$page->setDynamic2($pagecontent);
if(!empty($pagefooter))
    $page->setDynamic3($pagefooter);
$page->renderPage();