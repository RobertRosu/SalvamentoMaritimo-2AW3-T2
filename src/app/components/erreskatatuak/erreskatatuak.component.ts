import { Component, ElementRef, ViewChild } from '@angular/core';
import { Errefuxiatua } from 'src/app/models/Errefuxiatua';

@Component({
  selector: 'app-erreskatatuak',
  templateUrl: './erreskatatuak.component.html',
  styleUrls: ['./erreskatatuak.component.scss']
})
export class ErreskatatuakComponent {
  errefuxiatuak: Errefuxiatua[] = [
    new Errefuxiatua(1, 'Errefuxiatu 1', 16, 'gizona', 'nigeria', ''),
    new Errefuxiatua(2, 'Errefuxiatu 2', 17, 'emakumea', 'maroko', ''),
    new Errefuxiatua(3, 'Errefuxiatu 3', 18, 'beste-bat', 'senegal', ''),
    new Errefuxiatua(4, 'Errefuxiatu 4', 19, 'gizona', 'nigeria', ''),
    new Errefuxiatua(5, 'Errefuxiatu 5', 20, 'emakumea', 'maroko', ''),
    new Errefuxiatua(6, 'Errefuxiatu 6', 21, 'beste-bat', 'senegal', ''),
  ]

  getId(errefuxiatua: any): number{
    return errefuxiatua.id
  }

  @ViewChild('sexua') sexuaElement!: ElementRef;
  @ViewChild('adina') adinaElement!: ElementRef;
  @ViewChild('naziotasuna') naziotasunaElement!: ElementRef;

  filtroak: {izena: string, adina: number, sexua: string, naziotasuna: string} = {
    izena: '',
    adina: 0,
    sexua: '0',
    naziotasuna: '0'
  }

  filtroakAplikatu() {
    this.filtroak.sexua = this.sexuaElement.nativeElement.value;
    this.filtroak.adina = Number(this.adinaElement.nativeElement.value);
    this.filtroak.naziotasuna = this.naziotasunaElement.nativeElement.value;
  }
}
