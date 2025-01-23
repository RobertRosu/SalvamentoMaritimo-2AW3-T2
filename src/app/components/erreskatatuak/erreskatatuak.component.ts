import { Component, ElementRef, ViewChild, OnInit } from '@angular/core';
import { Errefuxiatua } from 'src/app/models/Errefuxiatua';
import { ApiService } from '../../services/api.service';
import Swal from 'sweetalert2/dist/sweetalert2.js';


@Component({
  selector: 'app-erreskatatuak',
  templateUrl: './erreskatatuak.component.html',
  styleUrls: ['./erreskatatuak.component.scss']
})
export class ErreskatatuakComponent implements OnInit{
  
  data: any[] = [];
  errefuxiatuak: Errefuxiatua[] = []
  medikuak: any[] = [];
  erreskateak: any[] = [];
  modalStatus: boolean = false;

  constructor(private apiService: ApiService) { }

  ngOnInit() {
    this.getRescuedPeople();
    // Verificar si el token generado está en sessionStorage
    const storedToken = sessionStorage.getItem(this.authTokenKey);
    this.isAuthenticated = !!storedToken; // Si hay un token, se considera autenticado
  }

  getRescuedPeople(){
    this.apiService.getRescuedPeople().subscribe({
      next: (response) => {
        this.data = response.response;
        this.errefuxiatuak = [];
        if(Array.isArray(this.data)) {
          this.data.forEach(element =>{
            this.errefuxiatuak.push(
              new Errefuxiatua(
                element.id,
                element.name,
                element.birth_date,
                element.genre,
                element.country,
                (element.photo_src && element.photo_src.includes('https://xsgames.co/randomusers/avatar.php?g=') && !element.photo_src.includes('&unique=')) ? `${element.photo_src}&unique=${Math.random()}` : element.photo_src,
              )
            )
          })
        }
        this.medikuak = response.response_doc;
        this.erreskateak = response.response_res;
      }
   })
  }

  trackById(index: number, item: Errefuxiatua): number {
    return item.id; // Usa el ID único del refugiado como clave de seguimiento
  }

  getId(errefuxiatua: any): number{
    return errefuxiatua.id
  }

  filtroak = {
    izena: '',
    sexua: '0',
    adina: 0,
    naziotasuna: '0'
  };

  berrezarriFiltroak() {
    this.filtroak = {
      izena: '',
      sexua: '0',
      adina: 0,
      naziotasuna: '0',
    };
  }

  password: string = '';
  isAuthenticated: boolean = false;
  private authTokenKey = 'authToken';
  showError: boolean = false;
  selectedErrefuxiatua: any;

  createErrefuxiatua(){
    this.modalStatus = false;
  }

  handleUpdateErrefuxiatua(updatedErrefuxiatua: any): void {
    // Encuentra el objeto original y actualízalo
    const index = this.errefuxiatuak.findIndex(e => e.id === updatedErrefuxiatua.id);
    if (index !== -1) {
      this.errefuxiatuak[index] = { ...updatedErrefuxiatua }; // Actualiza con los nuevos datos
    }
  }

  editErrefuxiatua(errefuxiatua: Errefuxiatua) {
    this.modalStatus = true;
    this.selectedErrefuxiatua = errefuxiatua;
  }

  // Método para manejar el cierre del modal
  handleCloseModal(hasChanges: boolean): void {
    if (hasChanges) {
      Swal.fire({
        title: 'Aldaketak daude, gordetzen ez badituzu galduko dira.',
        showCancelButton: true,
        confirmButtonColor: '#ffc107',
        cancelButtonColor: '#1f1f1f',
        confirmButtonText: 'EZ GORDE',
        cancelButtonText: 'ITZULI',
        customClass: {
          confirmButton: 'text-black',
          popup: 'border border-3 border-warning rounded-4'
        }
      }).then((result) => {
        if (result.isConfirmed) {
          this.selectedErrefuxiatua = null; // Limpiar la selección si se confirma salir
          const closeModalButton = document.querySelector('[data-bs-dismiss="modal"]');
          (closeModalButton as HTMLElement)?.click();
        }
      });
    } else {
      this.selectedErrefuxiatua = null; // Limpiar la selección al cerrar sin cambios
      const closeModalButton = document.querySelector('[data-bs-dismiss="modal"]');
      (closeModalButton as HTMLElement)?.click();
    }
  }

  deleteErrefuxiatua(errefuxiatua: Errefuxiatua) {
    Swal.fire({
      title: "Honako hau ezabatzen ari zara: <b>" + errefuxiatua.izena + "</b>.",
      showCancelButton: true,
      confirmButtonColor: "#d33",
      cancelButtonColor: "#1f1f1f",
      confirmButtonText: "EZABATU",
      cancelButtonText: "EZEZTATU",
      customClass: {
        popup: 'border border-3 border-danger rounded-4'
      }
    }).then((result) => {
      if (result.isConfirmed) {
        const cardElement = document.getElementById(`errefuxiatua-${errefuxiatua.id}`);
        if (cardElement) {
          // Añadir clase de animación
          cardElement.classList.add('fade-out');
          // Esperar a que termine la animación
          setTimeout(() => {
            this.apiService.deleteRescuedPeople(errefuxiatua.id).subscribe(
              response => {
                // Eliminar el elemento del array
                this.errefuxiatuak = this.errefuxiatuak.filter(r => r.id !== errefuxiatua.id);
                // Mostrar notificación de éxito
                Swal.fire({
                  toast: true,
                  showConfirmButton: false,
                  timer: 5000,
                  title: "<b>" + errefuxiatua.izena + "</b> ezabatu da.",
                  icon: "success",
                  position: 'top',
                  customClass: {
                    popup: 'border border-3 border-success rounded-pill shadow',
                  }
                });
              },
              error => {
                console.error('Error al eliminar:', error);
                Swal.fire({
                  title: "Ups, Ezabatzean errore bat egon da!",
                  text: error,
                  icon: "error"
                });
              }
            );
          }, 500); // Tiempo que dura la animación
        }
      }
    });
  }

  validatePassword() {
    const correctPassword = 'password'; // Cambia esto por tu contraseña
    if (this.password === correctPassword) {
      this.isAuthenticated = true;
      const authToken = this.generateRandomToken();
      sessionStorage.setItem(this.authTokenKey, authToken); // Guardar token en sessionStorage
      this.password = '';
      this.showError = false;
    } else {
      this.showError = true;
    }
  }

  logout() {
    this.isAuthenticated = false;
    sessionStorage.removeItem(this.authTokenKey); // Eliminar token al cerrar sesión
  }

  private generateRandomToken(): string {
    // Genera un token aleatorio utilizando la API nativa de crypto
    return Array.from(crypto.getRandomValues(new Uint8Array(32)))
      .map(byte => byte.toString(16).padStart(2, '0'))
      .join('');
  }
  
}
