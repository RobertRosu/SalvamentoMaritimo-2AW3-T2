import { Component, ElementRef, ViewChild, OnInit } from '@angular/core';
import { Errefuxiatua } from 'src/app/models/Errefuxiatua';
import { ApiService } from '../../services/api.service';
import Swal from 'sweetalert2'

@Component({
  selector: 'app-erreskatatuak',
  templateUrl: './erreskatatuak.component.html',
  styleUrls: ['./erreskatatuak.component.scss']
})
export class ErreskatatuakComponent implements OnInit{
  
  data: any[] = [];
  errefuxiatuak: Errefuxiatua[] = []

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
                element.photo_src
              )
            )
          })
        }
      }
   })
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

  storeErrefuxiatua(){
    Swal.fire("SweetAlert2 is working!");
  }

  editErrefuxiatua(errefuxiatua: Errefuxiatua) {
    this.selectedErrefuxiatua = errefuxiatua;
  }
  deleteErrefuxiatua(errefuxiatua: Errefuxiatua) {
    
    this.apiService.deleteRescuedPeople(errefuxiatua.id).subscribe(
      response => {
          this.getRescuedPeople();
      },
      error => {
          console.error('Error al eliminar:', error);
      }
    );
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
