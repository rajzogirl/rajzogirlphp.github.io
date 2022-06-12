-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 11 Cze 2022, 22:49
-- Wersja serwera: 10.4.14-MariaDB
-- Wersja PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `firma1`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `dział`
--

CREATE TABLE `dział` (
  `ID_DZIALU` int(3) NOT NULL,
  `NAZWA` varchar(15) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `dział`
--

INSERT INTO `dział` (`ID_DZIALU`, `NAZWA`) VALUES
(1, 'KADRY'),
(2, 'SPRZEDAŻ'),
(3, 'KSIĘGOWOŚĆ');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `oferty`
--

CREATE TABLE `oferty` (
  `ID_OFERTY` int(3) NOT NULL,
  `ID_STAN` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `oferty`
--

INSERT INTO `oferty` (`ID_OFERTY`, `ID_STAN`) VALUES
(2, 5),
(4, 8),
(5, 9),
(6, 11),
(11, 8),
(12, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `podania`
--

CREATE TABLE `podania` (
  `ID_POD` int(3) NOT NULL,
  `IMIE` varchar(15) COLLATE utf8_polish_ci NOT NULL,
  `NAZWISKO` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `MIASTO` varchar(15) COLLATE utf8_polish_ci NOT NULL,
  `WIEK` int(3) NOT NULL,
  `WYKSZTAŁCENIE` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `ID_OFERTY` int(3) NOT NULL,
  `TELEFON` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `podania`
--

INSERT INTO `podania` (`ID_POD`, `IMIE`, `NAZWISKO`, `MIASTO`, `WIEK`, `WYKSZTAŁCENIE`, `ID_OFERTY`, `TELEFON`) VALUES
(10, 'Jakub', 'Bonczek', 'Sanok', 28, 'Wyższe', 6, 123456789),
(13, 'Sandra', 'Stronnicka', 'Rzeszów', 35, 'Wyższe', 4, 789789789);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pracownicy`
--

CREATE TABLE `pracownicy` (
  `ID_PRAC` int(3) NOT NULL,
  `IMIE` varchar(15) COLLATE utf8_polish_ci NOT NULL,
  `NAZWISKO` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `ZAMIESZKANIE` varchar(15) COLLATE utf8_polish_ci NOT NULL,
  `ID_STAN` int(3) NOT NULL,
  `TELEFON` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `pracownicy`
--

INSERT INTO `pracownicy` (`ID_PRAC`, `IMIE`, `NAZWISKO`, `ZAMIESZKANIE`, `ID_STAN`, `TELEFON`) VALUES
(1, 'Anna', 'Bogacz', 'Lesko', 1, 898999888),
(2, 'Jan ', 'Nowakowski', 'Sanok', 4, 567765657),
(3, 'Beata', 'Dębska', 'Brzozów', 3, 456098123),
(4, 'Dawid', 'Polaczek', 'Humniska', 7, 321654987),
(5, 'Tomasz', 'Skwer', 'Zahutyń', 10, 686995763);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `stanowiska`
--

CREATE TABLE `stanowiska` (
  `ID_STAN` int(3) NOT NULL,
  `NAZWA` varchar(25) COLLATE utf8_polish_ci NOT NULL,
  `ID_DZIALU` int(3) NOT NULL,
  `WYNAGRODZENIE` int(6) NOT NULL,
  `OPIS` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `WYMAGANIA` varchar(100) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `stanowiska`
--

INSERT INTO `stanowiska` (`ID_STAN`, `NAZWA`, `ID_DZIALU`, `WYNAGRODZENIE`, `OPIS`, `WYMAGANIA`) VALUES
(1, 'Administrator kadr', 1, 2800, 'Sprawowanie kontroli nad pracownikami w dziale kadr.', 'Konieczność posiadania doświadczenia w zakresie administracji działem kadr'),
(2, 'Menadżer kadr', 1, 4500, 'M.in poszukiwanie potencjalnych pracowników do firmy', 'Dyplom ukończenia wyższej uczelni ekonomicznej (zarządzanie,marketing itp.)'),
(3, 'Kadrowa', 1, 2200, 'Kompleksowa obsługa kadrowa pracowników w zakresie umów ', 'Wykształcenie wyższe prawnicze lub admnistracyjne'),
(4, 'Konsultant kadr', 1, 2000, 'Przygotowanie dokumentacji dla nowych rowiązań', 'Wiedza z zakresu rozliczania czasu pracy'),
(5, 'Analityk', 2, 2800, 'Analizowanie wyników sprzedaży poszczególnych produktów', 'Wiedza techniczna, obsługa programów typu Excel'),
(6, 'Akwizytor', 2, 2800, 'Pozyskiwanie zamówień oraz zawieranie umowy o wykonanie usługi', 'Znajomość języków obcych'),
(7, 'Menadżer sprzedaży', 2, 4300, 'M.in monitorowanie działań konkurencji, kontrola umów, weryfikacji sprzedaży', 'Wykształcenie wyższe ekonomiczne lub techniczne'),
(8, 'Fakturzystka', 3, 1900, 'Kontrola obiegu dokumentacji sprzedażowej oraz wystawianie faktur', 'Minimum średnie wykształcenie w kierunku finanse/rachunkowość'),
(9, 'Główny księgowy', 3, 2900, 'Prowadzenie rachunkowości w firmie', 'Ukończone studia podyplomowe o profilu rachunkowość lub finanse'),
(10, 'Kierownik księgowości', 3, 4000, 'Przygotowanie analiz i kalkulacji na wewnętrzne potrzeby firmy', 'Kilkuletnie doświadczenie zawodowe'),
(11, 'Asystent księgowości', 3, 3200, 'Pomoc w administracji i formalno-rachunkowej kontroli dokumentów księgowych', 'Minimum wykształcenie średnie kierunkowe i umiejętność obsługi komputera');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `ID_UZYT` int(3) NOT NULL,
  `LOGIN` varchar(15) COLLATE utf8_polish_ci NOT NULL,
  `HASLO` varchar(15) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`ID_UZYT`, `LOGIN`, `HASLO`) VALUES
(1, 'Skwertom', 'tomaszek.98'),
(2, 'Bogaczan', 'aneczka2000'),
(3, 'admin', 'admin');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `dział`
--
ALTER TABLE `dział`
  ADD PRIMARY KEY (`ID_DZIALU`);

--
-- Indeksy dla tabeli `oferty`
--
ALTER TABLE `oferty`
  ADD PRIMARY KEY (`ID_OFERTY`);

--
-- Indeksy dla tabeli `podania`
--
ALTER TABLE `podania`
  ADD PRIMARY KEY (`ID_POD`);

--
-- Indeksy dla tabeli `pracownicy`
--
ALTER TABLE `pracownicy`
  ADD PRIMARY KEY (`ID_PRAC`);

--
-- Indeksy dla tabeli `stanowiska`
--
ALTER TABLE `stanowiska`
  ADD PRIMARY KEY (`ID_STAN`);

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`ID_UZYT`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `dział`
--
ALTER TABLE `dział`
  MODIFY `ID_DZIALU` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `oferty`
--
ALTER TABLE `oferty`
  MODIFY `ID_OFERTY` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT dla tabeli `podania`
--
ALTER TABLE `podania`
  MODIFY `ID_POD` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT dla tabeli `pracownicy`
--
ALTER TABLE `pracownicy`
  MODIFY `ID_PRAC` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT dla tabeli `stanowiska`
--
ALTER TABLE `stanowiska`
  MODIFY `ID_STAN` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `ID_UZYT` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
