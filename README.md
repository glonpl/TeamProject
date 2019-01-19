# TeamProject
Team Project for IT classes
Propozycja encji: <br>
[pacjent]* imie, nazwisko, wiek, plec (imie i nazwisko w sumie zbędne, ale info o płci jest istotne. ciężko o wizytę ginekologiczną dla faceta. wiek też póki co ozdóbka, ale rozwojowa. !!!!!!!!!!!!chyba, że robimy bez tabeli pacjent, tylko jako jakby wyszukiwarkę*) <br>
[Choroba]: Name, Description, częstość(po niej będziemy sortować top 10 prawdopod. wyników), Objawy(M:N) <br>
[Objawy]: Name, Description, Area(FK), Choroba(M:N) <br>
[Area]: czesc ciala <br>
[wywiad]: Cisnienie, Temperatura <br>

