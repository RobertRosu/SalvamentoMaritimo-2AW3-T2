import { Pipe, PipeTransform } from '@angular/core';
import { Errefuxiatua } from '../models/Errefuxiatua';

@Pipe({
  name: 'filterErrefuxiatuak',
  pure: false // Aldaketa bat dagoen bakoitzean `transform()` metodoa exekutatuko du
})
export class FilterErrefuxiatuakPipe implements PipeTransform {

  transform(errefuxiatuak: Errefuxiatua[], filtroak: any): Errefuxiatua[] {
    if (!errefuxiatuak || !filtroak) {
      return errefuxiatuak;
    }

    return errefuxiatuak.filter(errefuxiatua => {

      const izenaFiltroa = !filtroak.izena || errefuxiatua.izena.toLowerCase().includes(filtroak.izena.toLowerCase());
      const sexuaFiltroa = filtroak.sexua === '0' || errefuxiatua.sexua === filtroak.sexua;
      const adinaFiltroa = !filtroak.adina || errefuxiatua.adina === filtroak.adina;
      const naziotasunaFiltroa = filtroak.naziotasuna === '0' || errefuxiatua.naziotasuna === filtroak.naziotasuna;

      return izenaFiltroa && sexuaFiltroa && adinaFiltroa && naziotasunaFiltroa;
    });
  }

}
