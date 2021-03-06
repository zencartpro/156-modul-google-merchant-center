<?php
/**
 * @package Google Merchant Center Deutschland
 * @copyright Copyright 2003-2018 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: 3_6_0.php  2019-08-10 18:13:51Z webchills $
 */


$db->Execute(" SELECT @gid:=configuration_group_id
FROM ".TABLE_CONFIGURATION_GROUP."
WHERE configuration_group_title= 'Google Merchant Center Deutschland'
LIMIT 1;");

$db->Execute("INSERT IGNORE INTO ".TABLE_CONFIGURATION." (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added, use_function, set_function) VALUES
('URL des Shops', 'GOOGLE_MCDE_ADDRESS', 'http://www.meinshop.de', 'Geben Sie die URL Ihres Shops ein', @gid, 1, NOW(), NULL, NULL),
('Kurzbeschreibung Ihres Shops', 'GOOGLE_MCDE_DESCRIPTION', '', 'Geben Sie eine kurze Beschreibung Ihres Shops ein', @gid, 2, NOW(), NULL, NULL),
('Google Merchant Center FTP Username', 'GOOGLE_MCDE_USERNAME', 'ftp_username', 'Geben Sie Ihren Google Merchant Center FTP Usernamen ein.', @gid, 3, NOW(), NULL, NULL),
('Google Merchant Center FTP Passwort', 'GOOGLE_MCDE_PASSWORD', 'ftp_password', 'Geben Sie Ihr Google Merchant Center FTP Passwort ein.', @gid, 4, NOW(), NULL, NULL),
('Google Merchant Center Server', 'GOOGLE_MCDE_SERVER', 'uploads.google.com', 'Geben Sie den Namen der Google Merchant Center FTP Servers ein.<br />Voreinstellung: uploads.google.com', @gid, 5, NOW(), NULL, NULL),
('Dateiname des Produktfeeds', 'GOOGLE_MCDE_OUTPUT_FILENAME', 'meinshop', 'Geben Sie den gewünschten Dateinamen für das Produktfeed an. Wird dann ergänzt mit _products.xml', @gid, 6, NOW(), NULL, NULL),
('Produktfeeddatei komprimieren', 'GOOGLE_MCDE_COMPRESS', 'false', 'Produktfeed komrimieren?<br/>Voreinstellung: false', @gid, 7, NOW(), NULL, 'zen_cfg_select_option(array(\'true\', \'false\'),'),
('EAN im Produktfeed', 'GOOGLE_MCDE_EAN', 'false', 'Soll die EAN ins Produktfeed aufgenommen werden?<br/>Eigenes Feld für die EAN in der Tabelle products erforderlich!', @gid, 8, NOW(), NULL, 'zen_cfg_select_option(array(\'true\', \'false\'),'),
('Marke im Produktfeed', 'GOOGLE_MCDE_BRAND', 'false', 'Soll die Marke ins Produktfeed aufgenommen werden?<br/>Eigenes Feld für die Marke in der Tabelle products erforderlich!', @gid, 9, NOW(), NULL, 'zen_cfg_select_option(array(\'true\', \'false\'),'),
('ISBN im Produktfeed', 'GOOGLE_MCDE_ISBN', 'false', 'Soll die ISBN ins Produktfeed aufgenommen werden?<br/>Eigenes Feld für die ISBN in der Tabelle products erforderlich!', @gid, 10, NOW(), NULL, 'zen_cfg_select_option(array(\'true\', \'false\'),'),
('Online Only im Produktfeed', 'GOOGLE_MCDE_ONLINE_ONLY', 'false', 'Soll den Artikeln das Attribut Online Only zugeordnet werden?<br/>Nur auf yes stellen, falls alle Ihre Artikel nur online bestellbar sind und nicht vor Ort in Ihrem Ladenlokal erworben können!', @gid, 11, NOW(), NULL, 'zen_cfg_select_option(array(\'true\', \'false\'),'),
('Ablaufdatum Basiseinstellung', 'GOOGLE_MCDE_EXPIRATION_BASE', 'now', 'Wovon soll das Ablaufdatum ausgehen?:<ul><li>now - vom jetzigen Datum;</li><li>product - vom beim Artikel hinterlegten Datum</li></ul>', @gid, 12, NOW(), NULL, 'zen_cfg_select_option(array(\'now\', \'product\'),'),
('Ablaufdatum in Tagen', 'GOOGLE_MCDE_EXPIRATION_DAYS', '20', 'Wieviel Tage sollen beim Ablaufdatum hinzugezählt werden?<br/>Voreinstellung: 20', @gid, 13, NOW(), NULL, NULL),
('Währung aufnehmen', 'GOOGLE_MCDE_CURRENCY_DISPLAY', 'false', 'Soll die Währung ins Produktfeed übernommen werden? Falls ja, wird an die Artikellinks im Feed das Kürzel für die Währung angehängt.<br/>Nur sinnvoll falls es im Shop verschiedene Währungen gibt.', @gid, 14, NOW(), NULL, 'zen_cfg_select_option(array(\'true\', \'false\'),'),
('Währung', 'GOOGLE_MCDE_CURRENCY', 'EUR', 'Welche Währung soll Ihr Produktfeed haben? Euro oder Dollar?<br/<Voreingestellt: EUR', @gid, 15, NOW(), NULL, 'zen_cfg_select_option(array(\'EUR\', \'USD\'),'),
('Offer ID', 'GOOGLE_MCDE_OFFER_ID', 'id', 'Eine eindeutige ID für jeden Artikel<br/>die Produkt ID aus Zen-Cart', @gid, 16, NOW(), NULL, 'zen_cfg_select_option(array(\'id\'),'),
('Menge im Produktfeed', 'GOOGLE_MCDE_IN_STOCK', 'false', 'Soll der Lagerbestand der Artikel ins Produktfeed übernommen werden?', @gid, 17, NOW(), NULL, 'zen_cfg_select_option(array(\'true\', \'false\'),'),
('Artikel mit Menge Null aufnehmen', 'GOOGLE_MCDE_ZERO_QUANTITY', 'false', 'Sollen Artikel aufgenommen werden, deren Lagerbestand Null ist?', @gid, 18, NOW(), NULL, 'zen_cfg_select_option(array(\'true\', \'false\'),'),
('Menge Voreinstellung', 'GOOGLE_MCDE_DEFAULT_QUANTITY', '0', 'Welche Mengenangabe wollen Sie für Artikel mit Lagerbestand Null?', @gid, 19, NOW(), NULL, NULL), 
('Datum des Uploads', 'GOOGLE_MCDE_UPLOADED_DATE', '', 'Datum und Uhrzeit des letzen Uploads', @gid, 20, NOW(), NULL, NULL),
('Verzeichnis des Produktfeeds', 'GOOGLE_MCDE_DIRECTORY', 'feed/googlemcde/', 'Geben Sie hier das Verzeichnis an, in dem das Produktfeed gespeichert werden soll.', @gid, 21, NOW(), NULL, NULL),
('cPath in der URL verwenden', 'GOOGLE_MCDE_USE_CPATH', 'false', 'Sollen die Artikel URLs den cPath enthalten?', @gid, 22, NOW(), NULL, 'zen_cfg_select_option(array(\'true\', \'false\'),'),
('Maximale Artikelanzahl', 'GOOGLE_MCDE_MAX_PRODUCTS', '0', 'Voreinstellung = 0 für unbegrenzte Artikelanzahl', @gid, 23, NOW(), NULL, NULL),
('Startpunkt', 'GOOGLE_MCDE_START_PRODUCTS', '0', 'Soll erst ab einem bestimmten Eintrag gestartet werden (dies ist NICHT die Artikel ID, es geht hier darum die Zahl der Artikel zu begrenzen)<br />Voreinstellung=0', @gid, 24, NOW(), NULL, NULL),
('Enthaltene Kategorien', 'GOOGLE_MCDE_POS_CATEGORIES', '', 'Geben Sie die Kategorienummern an, die enthalten sein sollen, durch Komma getrennt (z.B. 1,2,3)<br>Leer lassen, um alle Kategorien aufzunehmen (empfohlen)', @gid, 25, NOW(), NULL, NULL),
('Ausgeschlossene Kategorien', 'GOOGLE_MCDE_NEG_CATEGORIES', '', 'Geben Sie die Kategorienummern an, die ausgeschlossen werden sollen durch Komma getrennt (z.B. 1,2,3)<br>Leer lassen, um alle Kategorien aufzunehmen (empfohlen)', @gid, 26, NOW(), NULL, NULL),
('Enthaltene Hersteller', 'GOOGLE_MCDE_POS_MANUFACTURERS', '', 'Geben Sie die Hersteller IDs an, die enthalten sein sollen, durch Komma getrennt (z.B. 1,2,3)<br>Leer lassen, um alle Hersteller aufzunehmen (empfohlen)', @gid, 27, NOW(), NULL, NULL),
('Ausgeschlossene Hersteller', 'GOOGLE_MCDE_NEG_MANUFACTURERS', '', 'Geben Sie die Hersteller IDs an, die ausgeschlossen werden sollen durch Komma getrennt (z.B. 1,2,3)<br>Leer lassen, um alle Hersteller aufzunehmen (empfohlen)', @gid, 28, NOW(), NULL, NULL),
('Gewicht im Produktfeed', 'GOOGLE_MCDE_SHIPPINGWEIGHT', 'false', 'Soll das beim Artikel hinterlegte Versandgewicht ins Produktfeed übernommen werden?', @gid, 29, NOW(), NULL, 'zen_cfg_select_option(array(\'true\', \'false\'),'),
('Masseinheit Gewicht', 'GOOGLE_MCDE_UNITS', 'Kilogramm', 'In welcher Einheit geben Sie das Gewicht an?<br />Kilogramm oder Pounds', @gid, 30, NOW(), NULL, 'zen_cfg_select_option(array(\'Kilogramm\', \'Pfund\'),'),
('Artikeltyp', 'GOOGLE_MCDE_PRODUCT_TYPE', 'top', 'Top-Level, Bottom-Level, oder Full-Path<br/>Sollte auf top gelassen werden', @gid, 31, NOW(), NULL, 'zen_cfg_select_option(array(\'top\', \'bottom\', \'full\'),'),
('Alternative Bild URL', 'GOOGLE_MCDE_ALTERNATE_IMAGE_URL', '', 'Falls Ihre Artikelbilder woanders gehostet werden, geben Sie hier die alternative URL zu den Bildern an (z.B.. http://www.domain.com/images/).  Die Bilddatei wird dann ans Ende dieses speziellen Links angehängt.', @gid, 32, NOW(), NULL, NULL),
('Image Handler', 'GOOGLE_MCDE_IMAGE_HANDLER', 'false', 'Bilder per Image Handler verkleinern? Nur auf true stellen, falls Sie das Modul Image Handler im Einsatz haben!', @gid, 33, NOW(), NULL, 'zen_cfg_select_option(array(\'true\', \'false\'),'),
('Metatag Titel verwenden', 'GOOGLE_MCDE_META_TITLE', 'false', 'Soll als Artikelname der in den Metatags angegebene Titel verwendet werden?', @gid, 34, NOW(), NULL, 'zen_cfg_select_option(array(\'true\', \'false\'),'),
('Debug', 'GOOGLE_MCDE_DEBUG', 'true', 'Debug Modus aktivieren? Beim Erstellen des Feeds werden dann Zusatzinfos angezeigt. Nur für Fehlersuche interessant.', @gid, 35, NOW(), NULL, 'zen_cfg_select_option(array(\'true\', \'false\'),'),
('Sprache des Feeds', 'GOOGLE_MCDE_LANGUAGE', 'Deutsch', 'Sprache für das Artikelfeed. Nicht ändern! Nur falls in Ihrer Tabelle languages der Name für Deutsch anders lauten sollte!', @gid, 36, NOW(), NULL, NULL),
('Sicherheitsschlüssel', 'GOOGLE_MCDE_KEY', '".md5(time() . rand(0,99999))."', 'Geben Sie eine zufällige Folge von Ziffern und Buchstaben ein, um sicherzustellen, dass nur der Admin das Produktfeed generieren kann.', @gid, 37, NOW(), NULL, NULL)");

//check if products_ean column already exists - if not add it
    $sql ="SHOW COLUMNS FROM ".TABLE_PRODUCTS." LIKE 'products_ean'";
    $result = $db->Execute($sql);
    if(!$result->RecordCount())
    {
        $sql = "ALTER TABLE ".TABLE_PRODUCTS." ADD products_ean VARCHAR( 13 ) NOT NULL";
        $db->Execute($sql);
    }
    
//check if products_isbn column already exists - if not add it
    $sql ="SHOW COLUMNS FROM ".TABLE_PRODUCTS." LIKE 'products_isbn'";
    $result = $db->Execute($sql);
    if(!$result->RecordCount())
    {
        $sql = "ALTER TABLE ".TABLE_PRODUCTS." ADD products_isbn VARCHAR( 13 ) NOT NULL";
        $db->Execute($sql);
    }
    
//check if products_condition column already exists - if not add it
    $sql ="SHOW COLUMNS FROM ".TABLE_PRODUCTS." LIKE 'products_condition'";
    $result = $db->Execute($sql);
    if(!$result->RecordCount())
    {
        $sql = "ALTER TABLE ".TABLE_PRODUCTS." ADD products_condition ENUM( 'new', 'used', 'refurbished' ) NOT NULL DEFAULT 'new'";
        $db->Execute($sql);
    }

//check if products_availability column already exists - if not add it
    $sql ="SHOW COLUMNS FROM ".TABLE_PRODUCTS." LIKE 'products_availability'";
    $result = $db->Execute($sql);
    if(!$result->RecordCount())
    {
        $sql = "ALTER TABLE ".TABLE_PRODUCTS." ADD products_availability ENUM( 'in stock', 'out of stock', 'preorder' ) NOT NULL DEFAULT 'in stock'";
        $db->Execute($sql);
    }

//check if products_brand column already exists - if not add it
    $sql ="SHOW COLUMNS FROM ".TABLE_PRODUCTS." LIKE 'products_brand'";
    $result = $db->Execute($sql);
    if(!$result->RecordCount())
    {
        $sql = "ALTER TABLE ".TABLE_PRODUCTS." ADD products_brand VARCHAR( 32 ) NOT NULL";
        $db->Execute($sql);
    }

//check if products_taxonomy column already exists - if not add it
    $sql ="SHOW COLUMNS FROM ".TABLE_PRODUCTS." LIKE 'products_taxonomy'";
    $result = $db->Execute($sql);
    if(!$result->RecordCount())
    {
        $sql = "ALTER TABLE ".TABLE_PRODUCTS." ADD products_taxonomy VARCHAR( 512 )  NOT NULL";
        $db->Execute($sql);
    }


//add new product_layout options

$db->Execute("INSERT IGNORE INTO " . TABLE_PRODUCT_TYPE_LAYOUT . " (configuration_title, configuration_key, configuration_value, configuration_description, product_type_id, sort_order, last_modified, date_added, use_function, set_function) VALUES
('Show EAN Number', 'SHOW_PRODUCT_INFO_EAN', '0', 'Display EAN Number on Product Info 0= off 1= on', 1, NULL, NOW(), NOW(), NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), '),
('Show ISBN Number', 'SHOW_PRODUCT_INFO_ISBN', '0', 'Display ISBN Number on Product Info 0= off 1= on', 1, NULL, NOW(), NOW(), NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), '),
('Show Brand', 'SHOW_PRODUCT_INFO_BRAND', '0', 'Display Brand on Product Info 0= off 1= on', 1, NULL, NOW(), NOW(), NULL, 'zen_cfg_select_drop_down(array(array(''id''=>''1'', ''text''=>''True''), array(''id''=>''0'', ''text''=>''False'')), ')");

$db->Execute("REPLACE INTO " . TABLE_PRODUCT_TYPE_LAYOUT_LANGUAGE . " (configuration_title, configuration_key, languages_id, configuration_description, last_modified, date_added) VALUES
('EAN anzeigen', 'SHOW_PRODUCT_INFO_EAN', 43, 'Soll die EAN auf der Produktinfoseite angezeigt werden?<br/> 0= AUS 1= AN', NOW(), NOW()),
('ISBN anzeigen', 'SHOW_PRODUCT_INFO_ISBN', 43, 'Soll die ISBN auf der Produktinfoseite angezeigt werden?<br/> 0= AUS 1= AN', NOW(), NOW()),
('Marke anzeigen', 'SHOW_PRODUCT_INFO_BRAND', 43, 'Soll die Marke auf der Produktinfoseite angezeigt werden?<br/> 0= AUS 1= AN', NOW(), NOW())");


// delete old configuration/tools menu
$admin_page = 'configProdGoogleMCDE';
$db->Execute("DELETE FROM " . TABLE_ADMIN_PAGES . " WHERE page_key = '" . $admin_page . "' LIMIT 1;");
$admin_page_tools = 'googlemcde';
$db->Execute("DELETE FROM " . TABLE_ADMIN_PAGES . " WHERE page_key = '" . $admin_page_tools . "' LIMIT 1;");
// add configuration/tools menu
if (!zen_page_key_exists($admin_page)) {
$db->Execute(" SELECT @gid:=configuration_group_id
FROM ".TABLE_CONFIGURATION_GROUP."
WHERE configuration_group_title= 'Google Merchant Center Deutschland'
LIMIT 1;");
$db->Execute("INSERT IGNORE INTO " . TABLE_ADMIN_PAGES . " (page_key,language_key,main_page,page_params,menu_key,display_on_menu,sort_order) VALUES 
('configProdGoogleMCDE','BOX_CONFIGURATION_PRODUCT_GOOGLEMCDE','FILENAME_CONFIGURATION',CONCAT('gID=',@gid),'configuration','Y',@gid)");
$db->Execute(" SELECT @gid:=configuration_group_id
FROM ".TABLE_CONFIGURATION_GROUP."
WHERE configuration_group_title= 'Google Merchant Center Deutschland'
LIMIT 1;");
$db->Execute("INSERT IGNORE INTO " . TABLE_ADMIN_PAGES . " (page_key,language_key,main_page,page_params,menu_key,display_on_menu,sort_order) VALUES 
('googlemcde','BOX_GOOGLEMCDE','FILENAME_GOOGLEMCDE','','tools','Y',101)");
$messageStack->add('Google Merchant Center erfolgreich installiert.', 'success');  
}