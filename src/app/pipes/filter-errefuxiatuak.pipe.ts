import { Pipe, PipeTransform } from '@angular/core';
import { Errefuxiatua } from '../models/Errefuxiatua';

@Pipe({
  name: 'filterErrefuxiatuak'
})
export class FilterErrefuxiatuakPipe implements PipeTransform {

  transform(
    errefuxiatuak: Errefuxiatua[], 
    filtroak: { izena: string; adina: number; sexua: string; naziotasuna: string }
  ): Errefuxiatua[] {
    if (!errefuxiatuak) return [];

    return errefuxiatuak.filter(errefuxiatua => {
      const izenaMatches = errefuxiatua.izena.toLowerCase().includes(filtroak.izena.toLowerCase());
      const adinaMatches = filtroak.adina === 0 || errefuxiatua.adina === filtroak.adina;
      const sexuaMatches = filtroak.sexua === '0' || errefuxiatua.sexua === filtroak.sexua;
      const naziotasunaMatches = filtroak.naziotasuna === '0' || errefuxiatua.naziotasuna === filtroak.naziotasuna;

      return izenaMatches && adinaMatches && sexuaMatches && naziotasunaMatches;
    });
  }

}
