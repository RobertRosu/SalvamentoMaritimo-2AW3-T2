import { Component, Input, Output, EventEmitter, OnChanges, SimpleChanges} from '@angular/core';
import { ApiService } from '../../services/api.service';
import Swal from 'sweetalert2';

@Component({
  selector: 'app-form-update-errefuxiatua',
  templateUrl: './form-update-errefuxiatua.component.html',
  styleUrls: ['./form-update-errefuxiatua.component.scss']
})
export class FormUpdateErrefuxiatuaComponent implements OnChanges {
  
  @Input() errefuxiatua: any;
  @Output() closeModal = new EventEmitter<boolean>();
  @Output() updateErrefuxiatuaInParent = new EventEmitter<any>();
  errefuxiatuaCopy: any; // Copia local para el formulario
  errefuxiatuaEng: any = {};

  ngOnChanges(changes: SimpleChanges): void {
    if (changes['errefuxiatua'] && changes['errefuxiatua'].currentValue) {
      // Crear una copia para evitar modificar el objeto original
      this.errefuxiatuaCopy = { ...changes['errefuxiatua'].currentValue };
    }
  }

  constructor(private apiService: ApiService) { }

  updateErrefuxiatua(){
    this.errefuxiatuaEng = {
      name: this.errefuxiatuaCopy.izena,
      birth_date: this.errefuxiatuaCopy.adina,
      genre: this.errefuxiatuaCopy.sexua,
      country: this.errefuxiatuaCopy.naziotasuna,
      photo_src: this.errefuxiatuaCopy.imagePath
    };
    this.apiService.putRescuedPeople( this.errefuxiatua.id, this.errefuxiatuaEng).subscribe(
      response => {
        this.updateErrefuxiatuaInParent.emit(this.errefuxiatuaCopy);
        this.closeModal.emit(false);
        Swal.fire({
          toast: true,
          showConfirmButton: false,
          timer: 3000,
          title: "<b>" + this.errefuxiatuaCopy.izena + "</b> aldatu da.",
          icon: "success",
          position: 'top',
          customClass: {
            popup: 'border border-3 border-success rounded-pill shadow',
          }
        });
      },
      error => {
        console.error('Datuak eguneratzean errorea gertatu da.:', error);
      }
    );
  }
  
  exit(): void {
    const hasChanges = JSON.stringify(this.errefuxiatua) !== JSON.stringify(this.errefuxiatuaCopy);

    if (hasChanges) {
      this.closeModal.emit(true); // Emitir que hubo cambios
    } else {
      this.closeModal.emit(false); // Emitir que no hubo cambios
    }
  }
}