const nimed = [
    "mari maasikas", "jaan jõesaar", "kristiina kukk", "margus mustikas",
    "jaak järve", "kadi kask", "Toomas Tamm", "Kadi Meri", "Leena Laas",
    "Madis Mets", "Hannes Hõbe", "Anu Allikas", "Kristjan Käär", "Eva Esimene",
    "Jüri Jõgi", "Liis Lepik", "Kalle Kask", "Tiina Teder", "Kaidi Koppel", "tiina Toom"
  ];
  
  // Funktsioon, mis lisab nime objekti
  function lisaNimi(nimedArray, nimi) {
    nimedArray.push(nimi);
  }
  
  // Funktsioon nimede korrastamiseks ja emaili loomiseks
  function korraldaNimedJaLooEmailid(nimedArray) {
    const korraldatudNimed = nimedArray.map(nimi => {
      const osad = nimi.split(" ");
      const eesnimi = osad[0].charAt(0).toUpperCase() + osad[0].slice(1).toLowerCase();
      const perenimi = osad[1].toLowerCase();
      const email = `${perenimi}@tthk.ee`;
      return { eesnimi, perenimi, email };
    });
    return korraldatudNimed;
  }
  
  // Funktsioon, mis otsib nime massiivist
  function otsiNimeMassiivist(nimedArray, otsitavNimi) {
    const leitudNimi = nimedArray.find(nimi => {
      return nimi.toLowerCase() === otsitavNimi.toLowerCase();
    });
  
    if (leitudNimi) {
      console.log(`Leitud nimi: ${leitudNimi}`);
    } else {
      console.log(`Nime "${otsitavNimi}" ei leitud massiivist.`);
    }
  }
  
  // Lisa uus nimi objekt massiivi
  lisaNimi(nimed, "Kersti Karu");
  
  // Korralda nimed ja loo emailid
  const korraldatudNimed = korraldaNimedJaLooEmailid(nimed);
  console.log(korraldatudNimed);
  
  // Otsi nime massiivist
  otsiNimeMassiivist(nimed, "Kadi Kask");
  otsiNimeMassiivist(nimed, "Kersti Karu");
  