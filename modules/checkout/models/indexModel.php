<?php
function provinces()
{
    $provinces = db_fetch_array("SELECT * FROM `devvn_tinhthanhpho`");
    return !empty($provinces) ? $provinces : null;
}