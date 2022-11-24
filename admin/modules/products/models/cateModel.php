<?php
/*
 * GET CATEGORY BY ID
 * INPUT : CATEGORY_ID
 * OUTPUT: TRUE-> CATEGORY , FALSE->NULL
 */
function getCatById($id)
{
    $categorie = db_fetch_row("SELECT * FROM `categories` WHERE `category_id` = '{$id}'");
    return !empty($categorie) ? $categorie : null;
}

/*
 * ADD CATEGORY
 * INPUT : LIST COLUMN AND DATA OF TABLE CATEGORIES
 * OUTPUT: CATEGORY_ID
 */
function addCate($data = array())
{
    return db_insert("`categories`", $data);
}

/*
 * DELETE CATEGORY
 * INPUT : CATEGORY_ID
 * OUTPUT: TRUE OR FALSE AFTER DELETE
 */
function deleteCateById($id): bool
{
    $index = db_delete("`categories`", "`category_id` = '{$id}'");
    return $index;
}