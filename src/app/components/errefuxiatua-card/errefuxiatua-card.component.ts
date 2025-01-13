import { Component, Input } from '@angular/core';
import { Errefuxiatua } from 'src/app/models/Errefuxiatua';

@Component({
  selector: 'app-errefuxiatua-card',
  templateUrl: './errefuxiatua-card.component.html',
  styleUrls: ['./errefuxiatua-card.component.scss']
})
export class ErrefuxiatuaCardComponent {
  @Input() datuak!: Errefuxiatua
}
