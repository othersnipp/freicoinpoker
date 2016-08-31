<?php

$stats->seated_players=$db->getFunction("select sum(used_seats) from tables");

?>