# DELETE
# FROM slots;
# DELETE
# FROM shifts;
# DELETE
# FROM point_user;
# DELETE
# FROM points;

#DOLNA BRAMA 8
INSERT INTO volunteering_chart_poland.points (name, address, color, `lead`, description, created_at, updated_at)
VALUES ('Dolna Brama 8', 'uL.Dolna Brama 8 ', 'blue', 'W tym miejscu uchodźcy mogą zgłosić się po zakwaterowanie.
                           Wolontariusze (najlepiej ze znajomością języków obcych) pomagają w komunikacji z uchodźcami
                           są dodatkowe pokoje na specjalne potrzeby jak ...',
        'CENTRUM WSPARCIA UCHODŹCÓW Dolna Brama 8:

       Uchodżcy przyjeżdżają tu na około 2h
       to tutaj mają czas by odpocząć, oraz uzyskać najważniejsze informacje
       w tym miejscu uchodźcy mogą zgłosić się po zakwaterowanie
       wolontariusze (ze znajomością języków obcych) pomagają w komunikacji z uchodźcami
       są dodatkowe pokoje na specjalne potrzeby jak rodzina z niemowlakiem
       Plan budynku:

       budynek 3 kondygnacje
       kawiarenka ("kuchnia")
       poczekalnia
       punkt informacji
       stanowisko urzędu miasta do rejestracji
       stanowisko udzielania schronienia
       sala zabaw dla dzieci
       infolinia
       Obowiązki:

       pomoc w tłumaczeniu między uchodźcami a urzędnikami
       wsparcie informacyjne w punkcie rejestracyjnym
       zabawa z dziećmi w sali zabaw
       obsługa infolini', null, null);

INSERT INTO volunteering_chart_poland.shifts (point_id, name, capacity, start_time, end_time, created_at, updated_at)
VALUES (1, 'Zmiana nr 1', 2, '10:00', '13:00', null, null);
INSERT INTO volunteering_chart_poland.shifts (point_id, name, capacity, start_time, end_time, created_at, updated_at)
VALUES (1, 'Zmiana nr 2', 2, '13:00', '15:00', null, null);
INSERT INTO volunteering_chart_poland.shifts (point_id, name, capacity, start_time, end_time, created_at, updated_at)
VALUES (1, 'Zmiana nr 3', 2, '15:00', '18:00', null, null);

INSERT INTO volunteering_chart_poland.slots (point_id, shift_id, user_id, sheduled_at, is_rejected, is_reserve, rejected_at, confirmed_at,
                                             mail_reminder_send_at, mail_reminder_token, sms_reminder_send_at, sms_reminder_token,
                                             created_at, updated_at)
VALUES (1, 1, 3, '2022-03-27', DEFAULT, DEFAULT, null, null, null, null, null, null, null, null);
INSERT INTO volunteering_chart_poland.slots (point_id, shift_id, user_id, sheduled_at, is_rejected, is_reserve, rejected_at, confirmed_at,
                                             mail_reminder_send_at, mail_reminder_token, sms_reminder_send_at, sms_reminder_token,
                                             created_at, updated_at)
VALUES (1, 1, 4, '2022-03-27', DEFAULT, DEFAULT, null, null, null, null, null, null, null, null);

INSERT INTO volunteering_chart_poland.point_user (point_id, user_id, created_at, updated_at)
VALUES (1, 1, null, null);
INSERT INTO volunteering_chart_poland.point_user (point_id, user_id, created_at, updated_at)
VALUES (1, 2, null, null);

#WILANOWSKA 2
INSERT INTO volunteering_chart_poland.points (name, address, color, `lead`, description, created_at, updated_at)
VALUES ('Punkt PESEL Wilanowska 2', 'uL.Wilanowska 2', 'blue', 'Uchodźcy przychodzą tutaj od 8:00 do 16:00 wyrobić PESEL
wolontariusze (najlepiej języczni) pomagają w komunikacji z uchodźcami',
        'Obowiązki:

pomoc w tłumaczeniu między uchodźcami a urzędnikami', null, null);

INSERT INTO volunteering_chart_poland.shifts (point_id, name, capacity, start_time, end_time, created_at, updated_at)
VALUES (2, 'Zmiana nr 1', 2, '08:00', '12:00', null, null);
INSERT INTO volunteering_chart_poland.shifts (point_id, name, capacity, start_time, end_time, created_at, updated_at)
VALUES (2, 'Zmiana nr 2', 2, '12:00', '16:00', null, null);

INSERT INTO volunteering_chart_poland.point_user (point_id, user_id, created_at, updated_at)
VALUES (2, 3, null, null);
INSERT INTO volunteering_chart_poland.point_user (point_id, user_id, created_at, updated_at)
VALUES (2, 4, null, null);

#KARTUSKA 32
INSERT INTO volunteering_chart_poland.points (name, address, color, `lead`, description, created_at, updated_at)
VALUES ('Punkt PESEL Kartuska 32', 'uL.Kartuska 32', 'green', 'Uchodźcy przychodzą tutaj od 8:00 do 16:00 wyrobić PESEL
wolontariusze (najlepiej języczni) pomagają w komunikacji z uchodźcami',
        'PUNKT PESEL uL.Kartuska 32

Uchodźcy przychodzą tutaj od 8:00 do 16:00 wyrobić PESEL
wolontariusze (najlepiej języczni) pomagają w komunikacji z uchodźcami
Obowiązki:

pomoc w tłumaczeniu między uchodźcami a urzędnikami', null, null);

INSERT INTO volunteering_chart_poland.shifts (point_id, name, capacity, start_time, end_time, created_at, updated_at)
VALUES (3, 'Zmiana nr 1', 2, '08:00', '11:00', null, null);
INSERT INTO volunteering_chart_poland.shifts (point_id, name, capacity, start_time, end_time, created_at, updated_at)
VALUES (3, 'Zmiana nr 2', 2, '11:00', '13:00', null, null);
INSERT INTO volunteering_chart_poland.shifts (point_id, name, capacity, start_time, end_time, created_at, updated_at)
VALUES (3, 'Zmiana nr 3', 2, '13:00', '17:00', null, null);

INSERT INTO volunteering_chart_poland.point_user (point_id, user_id, created_at, updated_at)
VALUES (3, 1, null, null);
INSERT INTO volunteering_chart_poland.point_user (point_id, user_id, created_at, updated_at)
VALUES (3, 2, null, null);

#Magazyn główny stadion
INSERT INTO volunteering_chart_poland.points (name, address, color, `lead`, description, created_at, updated_at)
VALUES ('Magazyn główny stadion', 'uL.Pokoleń Lechii Gdańsk 1  (POLSAT PLUS ARENA GDAŃSK - namiot obok parkingu P1) ', 'green',
        'uchodżcy przyjeżdżają tu od 8:00 do 20:00 pobrać dary (od jedzenia po chemię i ubrania)
produkty z magazynów są wydawane uchodźom
wolontariusze (najlepiej języczni) pomagają w komunikacji z uchodźcami ...',
        'MAGAZYN GŁÓWNY STADION uL.Pokoleń Lechii Gdańsk 1 (POLSAT PLUS ARENA GDAŃSK - namiot obok parkingu P1) - Opis punktu:

uchodżcy przyjeżdżają tu od 8:00 do 20:00 pobrać dary (od jedzenia po chemię i ubrania)
produkty z magazynów są wydawane uchodźom
wolontariusze (najlepiej języczni) pomagają w komunikacji z uchodźcami
codziennie spływają dary od mieszkańców oraz transportów międzynarodowych
tutaj również pakowane są tiry z pomocą humanitarną dostarczaną na Ukrainę
Plan magazynu:

Hala namiotowa
Kontenery
Obowiązki:

sortownia - wszystko co do nas jest przynoszone, dostarczane przeglądamy, sprawdzamy i segregujemy
uzupełnia braki na sklepie
na wejsciu witamy uchodźców i wprowadzamy ich w zasady funkcjonowania sklepu
wyładowujemy dary z tirów międzynarodowych', null, null);

INSERT INTO volunteering_chart_poland.shifts (point_id, name, capacity, start_time, end_time, created_at, updated_at)
VALUES (4, 'Zmiana nr 1', 2, '08:00', '12:00', null, null);
INSERT INTO volunteering_chart_poland.shifts (point_id, name, capacity, start_time, end_time, created_at, updated_at)
VALUES (4, 'Zmiana nr 2', 2, '12:00', '16:00', null, null);
INSERT INTO volunteering_chart_poland.shifts (point_id, name, capacity, start_time, end_time, created_at, updated_at)
VALUES (4, 'Zmiana nr 3', 2, '16:00', '20:00', null, null);

INSERT INTO volunteering_chart_poland.point_user (point_id, user_id, created_at, updated_at)
VALUES (4, 1, null, null);
INSERT INTO volunteering_chart_poland.point_user (point_id, user_id, created_at, updated_at)
VALUES (4, 2, null, null);

#Hala Traugutta 29
INSERT INTO volunteering_chart_poland.points (name, address, color, `lead`, description, created_at, updated_at)
VALUES ('PUNKT PRZYJĘĆ HALA ul. Traugutta', 'uL.Traugutta 29 (STARY STADION LECHII) ', 'green',
        'uchodżcy przyjeżdżają tu na około 24h - mają czas by odpocząć, przespać się, zjeść i umyć codziennie w nocy przyjeżdżają nowe osoby i większość z nich do popołudnia jest transportowana do...',
        'PUNKT PRZYJĘĆ HALA uL.Traugutta 29 (STARY STADION LECHII) - Opis punktu:

uchodżcy przyjeżdżają tu na około 24h - mają czas by odpocząć, przespać się, zjeść i umyć
codziennie w nocy przyjeżdżają nowe osoby i większość z nich do popołudnia jest transportowana do miejsc docelowych np. hosteli, ośrodków wypoczynowych itp
są 3 małe magazyny, w których trzymane są podstawowe produkty od miasta i dary od darczyńców
produkty z magazynów są wydawane uchodźom
wolontariusze (najlepiej języczni) pomagają w komunikacji z uchodźcami
są dodatkowe pokoje na specjalne potrzeby jak rodzina z niemowlakiem czy agresynwym psem
Plan budynku:

hala na ok 80 łóżek
kawiarenka ("kuchnia")
łazienki i prysznice
magazyny: chemii, żywności, odzieży
punkt medyczny czynny 8 - 18/20
stanowisko urzędu miasta do rejestracji i znajdowania miejsc docelowych
Obowiązki:

przyjmowanie darów od darczynców i sortowanie ich w magazynach
doposażenie uchodźców w kosmetyki, ubrania i trochę żywność (z darów)
pomoc w przygotowaniu noclegów tj. sprzątanie i odkażanie łóżek, ścielenie łózek dla nowych uchodżców
obsługa kawiarenki tj. donoszenie żywności, donoszenie naczyń jednorazowych, dbanie o czystość terenu kawiarenki i stolików
wydawanie gorących zup i drugich dań (jeśli są)
pomoc w tłumaczeniu między uchodźcami a urzędnikami np. kiedy jest organizowany wyjazd do miejsc docelowych z Kołobrzeskiej
zabawa z dziećmi w kąciku z zabawkami', null, null);

INSERT INTO volunteering_chart_poland.shifts (point_id, name, capacity, start_time, end_time, created_at, updated_at)
VALUES (5, 'Zmiana nr 1', 2, '08:00', '12:00', null, null);
INSERT INTO volunteering_chart_poland.shifts (point_id, name, capacity, start_time, end_time, created_at, updated_at)
VALUES (5, 'Zmiana nr 2', 2, '12:00', '17:00', null, null);
INSERT INTO volunteering_chart_poland.shifts (point_id, name, capacity, start_time, end_time, created_at, updated_at)
VALUES (5, 'Zmiana nr 3', 2, '17:00', '21:00', null, null);

INSERT INTO volunteering_chart_poland.point_user (point_id, user_id, created_at, updated_at)
VALUES (5, 3, null, null);
INSERT INTO volunteering_chart_poland.point_user (point_id, user_id, created_at, updated_at)
VALUES (5, 4, null, null);

#SKLEP MADISON
INSERT INTO volunteering_chart_poland.points (name, address, color, `lead`, description, created_at, updated_at)
VALUES ('SKLEP MADISON SKLEP ZA "0"', 'uL.Rajska 10 (MADISON na II piętrze)', 'green',
        'uchodżcy przychodzą tu po darmowe produkty',
        'uchodżcy przychodzą tu po darmowe produkty Plan budynku: - sklep - magazyn Obowiązki: - sortownia - wszystko co do nas jest przynoszone, dostarczane przeglądamy, sprawdzamy i segregujemy - uzupełnia braki na sklepie - na wejsciu witamy uchodźców i wprowadzamy ich w zasady funkcjonowania sklepu', null, null);

INSERT INTO volunteering_chart_poland.shifts (point_id, name, capacity, start_time, end_time, created_at, updated_at)
VALUES (6, 'Zmiana nr 1', 2, '12:00', '15:00', null, null);
INSERT INTO volunteering_chart_poland.shifts (point_id, name, capacity, start_time, end_time, created_at, updated_at)
VALUES (6, 'Zmiana nr 2', 2, '15:00', '18:00', null, null);

INSERT INTO volunteering_chart_poland.point_user (point_id, user_id, created_at, updated_at)
VALUES (6, 3, null, null);
INSERT INTO volunteering_chart_poland.point_user (point_id, user_id, created_at, updated_at)
VALUES (6, 4, null, null);

#Punkt info krewetka
INSERT INTO volunteering_chart_poland.points (name, address, color, `lead`, description, created_at, updated_at)
VALUES ('Hala Kołobrzeska', 'uL.Kołobrzeska 61', 'green',
        'chodżcy przyjeżdżają tu na około 24h - mają czas by odpocząć, przespać się, zjeść i umyć
codziennie w nocy przyjeżdżają nowe osoby i większość z nich do popołudnia jest transportowana do miejsc docelowych np. hosteli, ośrodków wypoczynowych itp...',
        'UNKT PRZYJĘĆ HALA - Opis punktu:

uchodżcy przyjeżdżają tu na około 24h - mają czas by odpocząć, przespać się, zjeść i umyć
codziennie w nocy przyjeżdżają nowe osoby i większość z nich do popołudnia jest transportowana do miejsc docelowych np. hosteli, ośrodków wypoczynowych itp
są 3 małe magazyny, w których trzymane są podstawowe produkty od miasta i dary od darczyńców
produkty z magazynów są wydawane uchodźom
wolontariusze (najlepiej języczni) pomagają w komunikacji z uchodźcami
są dodatkowe pokoje na specjalne potrzeby jak rodzina z niemowlakiem czy agresynwym psem
Plan budynku:

hala na ok 125 łóżek
kawiarenka ("kuchnia")
łazienki i prysznice
magazyny: chemii, żywności, odzieży
punkt medyczny czynny 8 - 18/20
stanowisko urzędu miasta do rejestracji i znajdowania miejsc docelowych
Obowiązki:

przyjmowanie darów od darczynców i sortowanie ich w magazynach
doposażenie uchodźców w kosmetyki, ubrania i trochę żywność (z darów)
pomoc w przygotowaniu noclegów tj. sprzątanie i odkażanie łóżek, ścielenie łózek dla nowych uchodżców
obsługa kawiarenki tj. donoszenie żywności, donoszenie naczyń jednorazowych, dbanie o czystość terenu kawiarenki i stolików
wydawanie gorących zup i drugich dań (jeśli są)
pomoc w tłumaczeniu między uchodźcami a urzędnikami np. kiedy jest organizowany wyjazd do miejsc docelowych z Kołobrzeskiej
zabawa z dziećmi w kąciku z zabawkami', null, null);

INSERT INTO volunteering_chart_poland.shifts (point_id, name, capacity, start_time, end_time, created_at, updated_at)
VALUES (7, 'Zmiana nr 1', 2, '08:00', '12:00', null, null);
INSERT INTO volunteering_chart_poland.shifts (point_id, name, capacity, start_time, end_time, created_at, updated_at)
VALUES (7, 'Zmiana nr 2', 2, '12:00', '17:00', null, null);
INSERT INTO volunteering_chart_poland.shifts (point_id, name, capacity, start_time, end_time, created_at, updated_at)
VALUES (7, 'Zmiana nr 3', 2, '17:00', '21:00', null, null);

INSERT INTO volunteering_chart_poland.point_user (point_id, user_id, created_at, updated_at)
VALUES (7, 1, null, null);
INSERT INTO volunteering_chart_poland.point_user (point_id, user_id, created_at, updated_at)
VALUES (7, 2, null, null);

#Hala Kołobrzeska
INSERT INTO volunteering_chart_poland.points (name, address, color, `lead`, description, created_at, updated_at)
VALUES ('Hala Kołobrzeska', 'uL.Kołobrzeska 61', 'green',
        'chodżcy przyjeżdżają tu na około 24h - mają czas by odpocząć, przespać się, zjeść i umyć
codziennie w nocy przyjeżdżają nowe osoby i większość z nich do popołudnia jest transportowana do miejsc docelowych np. hosteli, ośrodków wypoczynowych itp...',
        'UNKT PRZYJĘĆ HALA - Opis punktu:

uchodżcy przyjeżdżają tu na około 24h - mają czas by odpocząć, przespać się, zjeść i umyć
codziennie w nocy przyjeżdżają nowe osoby i większość z nich do popołudnia jest transportowana do miejsc docelowych np. hosteli, ośrodków wypoczynowych itp
są 3 małe magazyny, w których trzymane są podstawowe produkty od miasta i dary od darczyńców
produkty z magazynów są wydawane uchodźom
wolontariusze (najlepiej języczni) pomagają w komunikacji z uchodźcami
są dodatkowe pokoje na specjalne potrzeby jak rodzina z niemowlakiem czy agresynwym psem
Plan budynku:

hala na ok 125 łóżek
kawiarenka ("kuchnia")
łazienki i prysznice
magazyny: chemii, żywności, odzieży
punkt medyczny czynny 8 - 18/20
stanowisko urzędu miasta do rejestracji i znajdowania miejsc docelowych
Obowiązki:

przyjmowanie darów od darczynców i sortowanie ich w magazynach
doposażenie uchodźców w kosmetyki, ubrania i trochę żywność (z darów)
pomoc w przygotowaniu noclegów tj. sprzątanie i odkażanie łóżek, ścielenie łózek dla nowych uchodżców
obsługa kawiarenki tj. donoszenie żywności, donoszenie naczyń jednorazowych, dbanie o czystość terenu kawiarenki i stolików
wydawanie gorących zup i drugich dań (jeśli są)
pomoc w tłumaczeniu między uchodźcami a urzędnikami np. kiedy jest organizowany wyjazd do miejsc docelowych z Kołobrzeskiej
zabawa z dziećmi w kąciku z zabawkami', null, null);

INSERT INTO volunteering_chart_poland.shifts (point_id, name, capacity, start_time, end_time, created_at, updated_at)
VALUES (8, 'Zmiana nr 1', 2, '08:00', '12:00', null, null);
INSERT INTO volunteering_chart_poland.shifts (point_id, name, capacity, start_time, end_time, created_at, updated_at)
VALUES (8, 'Zmiana nr 2', 2, '12:00', '16:30', null, null);
INSERT INTO volunteering_chart_poland.shifts (point_id, name, capacity, start_time, end_time, created_at, updated_at)
VALUES (8, 'Zmiana nr 3', 2, '16:30', '21:00', null, null);

INSERT INTO volunteering_chart_poland.point_user (point_id, user_id, created_at, updated_at)
VALUES (8, 1, null, null);
INSERT INTO volunteering_chart_poland.point_user (point_id, user_id, created_at, updated_at)
VALUES (8, 2, null, null);