<?php
session_start();

function getType3()
{
     $types = array("Whey Protein","Pre Workout","Isolate Protein","Fat Burner","BCAA","CLA","MultiVitamin","MSM","Vitamins","All in One");
    return $types;
}
function clearSession($forWhich)
{
    if($forWhich == "insert")
    {
        unset($_SESSION['name']);
        unset($_SESSION['model']);
        unset($_SESSION['Type']);
        unset($_SESSION['purchasePrice']);
        unset($_SESSION['purchaseDate']);
        unset($_SESSION['Expire_Date']);
        unset($_SESSION['comments']);
    }
     else
    {
        unset($_SESSION['asset_id']);
        unset($_SESSION['company_name']);
        unset($_SESSION['model']);
        unset($_SESSION['Type']);
        unset($_SESSION['purch_price']);
        unset($_SESSION['purch_date']);
        unset($_SESSION['expire_date']);
        unset($_SESSION['comments']);
       
    }
}
?>