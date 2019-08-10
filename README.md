# 156-modul-google-merchant-center
Google Merchant Center für Zen Cart 1.5.6 deutsch

Dieses Modul erzeugt ein XML Artikelfeed für das Google Merchant Center anhand der aktuellen Google Merchant Center Spezifikationen für Deutschland:
Es ist nur geeignet für das Zielland Deutschland oder Österreich! 
Das generierte Artikelfeed kann via Zen Cart Administration per FTP an Google übermittelt werden. 
Alternativ kann man im Google Merchant Center Dashboard auch einfach den Link zum Feed angeben und es per Zeitplan automatisiert von Google abholen lassen.
Die Erstellung des Feeds erfolgt entweder manuell in der Zen Cart Administration oder automatisiert per Cronjob.

Bereits seit September 2011 müssen Artikelfeeds neue Pflichtfelder enthalten, sonst werden die Artikel bei Google Shopping nicht mehr gelistet.
Daher ist es notwendig, bei den Artikeln die Felder EAN, ISBN, Marke, Verfügbarkeit und Google Produktkategorie vorzusehen, damit diese - falls befüllt - in das Artikelfeed übernommen werden können.

Dieses Modul enthält folgende Zusatzfelder, die in der Zen Cart Administration beim Artikel anlegen/bearbeiten neu verfügbar sind:
- EAN
- ISBN
- Marke (Brand)
- Zustand (new, used, refurbished)
- Verfügbarkeit (availability)
- Google Produktkategorie 

Außerdem werden pro Artikel bis zu 10 zusätzliche Artikelbilder (falls vorhanden) ins Artikelfeed übernommen.
