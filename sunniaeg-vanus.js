const dateFns = require('date-fns');

const inimesteAndmed = [
  { nimi: "Mari Maasikas", isikukood: "38705123568" },
  { nimi: "Jaan Jõesaar", isikukood: "49811234567" },
  { nimi: "Kristiina Kukk", isikukood: "39203029876" },
  { nimi: "Margus Mustikas", isikukood: "49807010346" },
  { nimi: "Jaak Järve", isikukood: "39504234985" },
  { nimi: "Kadi Kask", isikukood: "39811136789" },
  // Lisa oma andmed siia
];

function lisaInimene(nimi, isikukood) {
  const uusInimene = { nimi, isikukood };

  // Kontrollime, kas isikukoodi vorming on õige (kontrollime vaid pikkust)
  if (isikukood.length !== 11) {
    console.error("Vigane isikukood: isikukoodi pikkus peab olema 11 numbrit.");
    return;
  }

  // Arvutame sünniaja ja vanuse isikukoodi põhjal
  const aasta = Number(isikukood.substr(1, 2));
  const kuu = Number(isikukood.substr(3, 2));
  const päev = Number(isikukood.substr(5, 2));
  const sugu = Number(isikukood.charAt(0)) % 2 === 0 ? "naine" : "mees";
  const sünniaeg = new Date(1900 + aasta, kuu - 1, päev);

  uusInimene.sünniaeg = sünniaeg;
  uusInimene.vanus = dateFns.differenceInYears(new Date(), sünniaeg);

  inimesteAndmed.push(uusInimene);
}

// Lisa oma andmed siia
lisaInimene("Sinu Nimi", "49901012345");

// Kuvame kõigi inimeste andmed
inimesteAndmed.forEach((inimene) => {
  console.log(`Nimi: ${inimene.nimi}, Sünniaeg: ${dateFns.format(inimene.sünniaeg, 'dd.MM.yyyy')}, Vanus: ${inimene.vanus} aastat`);
});
