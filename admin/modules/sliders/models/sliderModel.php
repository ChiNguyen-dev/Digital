<?php
function addSlider($data)
{
    $id = db_insert("`sliders`", $data);
    $slider = findOne("sliders", "slider_id", $id);
    return $slider != null ? $slider : null;
}

function updateSlider($data, $w)
{
    db_update("`sliders`", $data, $w);
}