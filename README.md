# TeamProject
Team Project for IT classes
Propozycja encji:
[pacjent]* imie, nazwisko, wiek, plec (imie i nazwisko w sumie zbędne, ale info o płci jest istotne. ciężko o wizytę ginekologiczną dla faceta. wiek też póki co ozdóbka, ale rozwojowa. !!!!!!!!!!!!chyba, że robimy bez tabeli pacjent, tylko jako jakby wyszukiwarkę*)
[Choroba]: nazwa, opis, częstość(po niej będziemy sortować top 10 prawdopod. wyników), Objawy(M:N)
[Objawy]: nazwa, opis, obszar(FK), Choroba(M:N)
[obszar]: czesc ciala
[wywiad]: Cisnienie, Temperatura

