# Symfony Products

WIP: In der Repository wird ein Backend für das Einstellen von Produkten entwickelt.
Es soll eie API sowie Datenbankverbindung erstellt werden über die Produkte angefragt werden können.
Das Backend soll von externer Quelle befüllt werden.

## Die Idee

Eine Quelle wie zum Beispiel ein Scraper wird verschieden Prdukte sammeln und
in das vorliegende Backend übergeben. Hierbei soll der Name, Preis / reduzierter Preis, 
Ort, sowie Marktname gespeichert werden. Diese Produkte sollen dann über eine API abfragbar sein.

## Benötigte Informationen

- Name 
- Preis 
- Reduierter Preis
- Ort (vielleicht eine PLZ?)
- Marktname

## Technologie

Das Projekt soll mittels PHP und dem Framework Symfony umgesetzt werden. 
Als Datenbank soll eine MongoDB eingesetzt werden.

## TODO

- Sicherheit / JWT zur Absicherung der API
- Planung ob Märkte ihren eigenen Server bekommen oder alle Prdukte über einen Server verwaltet werden
