const opilased = [
    { nimi: "Anna", tulemused: [4.5, 4.8, 4.6] },
    { nimi: "Mart", tulemused: [5.2, 5.1, 5.4] },
    { nimi: "Kati", tulemused: [4.9, 5.0, 4.7] },
    { nimi: "Jaan", tulemused: [4.3, 4.6, 4.4] },
    { nimi: "Liis", tulemused: [5.0, 5.2, 5.1] },
    { nimi: "Peeter", tulemused: [5.5, 5.3, 5.4] },
    { nimi: "Eva", tulemused: [4.8, 4.9, 4.7] },
    { nimi: "Marten", tulemused: [4.7, 4.6, 4.8] },
    { nimi: "Kairi", tulemused: [5.1, 5.3, 5.0] },
    { nimi: "Rasmus", tulemused: [4.4, 4.5, 4.3] },
  ];
  
  function kuvaOpilaseTulemused(opilane) {
    console.log(`Õpilase nimi: ${opilane.nimi}`);
    console.log(`Tulemused: ${opilane.tulemused.join(", ")}`);
    const parimTulemus = Math.max(...opilane.tulemused);
    const keskmineTulemus = opilane.tulemused.reduce((sum, tulemus) => sum + tulemus, 0) / opilane.tulemused.length;
    console.log(`Parim tulemus: ${parimTulemus}`);
    console.log(`Keskmine tulemus: ${keskmineTulemus.toFixed(2)}`);
    console.log('---');
  }
  
  function lisaTulemus(opilane, tulemus) {
    opilane.tulemused.push(tulemus);
  }
  
  // Näiteks kuva ühe õpilase tulemused
  kuvaOpilaseTulemused(opilased[0]);
  
  // Näiteks lisa ühele õpilasele uus tulemus
  lisaTulemus(opilased[0], 4.9);
  
  // Kuva uuenenud tulemused
  kuvaOpilaseTulemused(opilased[0]);
  