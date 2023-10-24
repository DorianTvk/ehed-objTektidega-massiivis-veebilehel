// Toote objekt
const toode = {
    nimetus: 'Mõnus kohv',
    hind: 3.50,
    kogus: 10,
    
    koguhind: function () {
      return this.hind * this.kogus;
    },
    
    muudaKogust: function (uusKogus) {
      this.kogus = uusKogus;
    },
    
    kuvaSisu: function () {
      console.log(`Toode: ${this.nimetus}, Hind: ${this.hind} EUR, Kogus: ${this.kogus}`);
    }
  };
  
  // Ostukorv objekt
  const ostukorv = {
    tooted: [],
  
    lisaToode: function(nimetus, hind, kogus) {
      this.tooted.push({ nimetus, hind, kogus });
    },
  
    koguSumma: function() {
      let summa = 0;
      for (const toode of this.tooted) {
        summa += toode.hind * toode.kogus;
      }
      return summa;
    },
  
    kuvaSisu: function() {
      console.log('Ostukorvi sisu:');
      for (const toode of this.tooted) {
        console.log(`${toode.nimetus} - ${toode.hind} EUR - Kogus: ${toode.kogus}`);
      }
    }
  };
  
  // Testime toote ja ostukorvi meetodeid
  toode.kuvaSisu();
  console.log('Toote koguhind:', toode.koguhind());
  
  ostukorv.lisaToode('Kohv', 5.80, 2);
  ostukorv.lisaToode('Leib', 1.50, 3);
  ostukorv.kuvaSisu();
  console.log('Ostukorvi kogu summa:', ostukorv.koguSumma());
  