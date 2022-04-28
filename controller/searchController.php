<?php

require_once("../model/ModelUser.php");
require_once("../model/ModelProduct.php");
require_once("../view/classes/addons.php");

class searchController
{

    public static function advancedSearch($searchData = null, $searchCategory = null)
    {

        $connSearch = new ModelProduct();
        $connCategory = new ModelCategory();
        $connMarque = new ModelMarque();

        $searchData['search'] = trim($searchData['search'], "\x00..\x1F");

        $searchData != null ? $tabSearch = $connSearch->resultSearch($searchData['search'], null) : $tabSearch = $connSearch->resultSearch(null, $searchCategory);

        $tabCategory = $connCategory->getCategorie();
        $tabMarque = $connMarque->getMarque();

        require('../view/advancedSearch.php');
    }
}
