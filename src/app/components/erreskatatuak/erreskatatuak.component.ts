import { Component } from '@angular/core';
import { Errefuxiatua } from 'src/app/models/Errefuxiatua';

@Component({
  selector: 'app-erreskatatuak',
  templateUrl: './erreskatatuak.component.html',
  styleUrls: ['./erreskatatuak.component.scss']
})
export class ErreskatatuakComponent {
  errefuxiatuak: Errefuxiatua[] = [
    new Errefuxiatua(1, "Errefuxiatu 1", 16, "Nigeria"),
    new Errefuxiatua(2, "Errefuxiatu 2", 17, "Senegal"),
    new Errefuxiatua(3, "Errefuxiatu 3", 18, "Maroko"),
    new Errefuxiatua(4, "Errefuxiatu 4", 19, "N/A"),
    new Errefuxiatua(5, "Errefuxiatu 5", 20, "Nigeria"),
    new Errefuxiatua(6, "Errefuxiatu 6", 21, "Senegal"),
  ]

  getId(errefuxiatua: any): number{
    return errefuxiatua.id
  }

  filtroak: Object = {
    izena: undefined,
    adina: undefined,
    nazionaltasuna: undefined
  }
}
