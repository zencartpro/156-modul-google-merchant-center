##################################################################################
# Zusatzfelder für Google Merchant Center Deutschland 3.5 - 2016-09-05 - webchills
# UNINSTALL - NUR AUSFÜHREN WENN SIE DIE ZUSATZFELDER ENTFERNEN WOLLEN!
##################################################################################

ALTER TABLE products DROP products_ean;
ALTER TABLE products DROP products_isbn;
ALTER TABLE products DROP products_brand;
ALTER TABLE products DROP products_condition;
ALTER TABLE products DROP products_availability;
ALTER TABLE products DROP products_taxonomy;

DELETE FROM product_type_layout WHERE configuration_key = 'SHOW_PRODUCT_INFO_EAN';
DELETE FROM product_type_layout WHERE configuration_key = 'SHOW_PRODUCT_INFO_ISBN';
DELETE FROM product_type_layout WHERE configuration_key = 'SHOW_PRODUCT_INFO_BRAND';

DELETE FROM product_type_layout_language WHERE configuration_key = 'SHOW_PRODUCT_INFO_EAN';
DELETE FROM product_type_layout_language WHERE configuration_key = 'SHOW_PRODUCT_INFO_ISBN';
DELETE FROM product_type_layout_language WHERE configuration_key = 'SHOW_PRODUCT_INFO_BRAND';