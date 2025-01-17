import { Component, ElementRef, ViewChild, OnInit } from '@angular/core';
import { Errefuxiatua } from 'src/app/models/Errefuxiatua';

@Component({
  selector: 'app-erreskatatuak',
  templateUrl: './erreskatatuak.component.html',
  styleUrls: ['./erreskatatuak.component.scss']
})
export class ErreskatatuakComponent implements OnInit{
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

  ngOnInit() {
    // Verificar si el token generado está en sessionStorage
    const storedToken = sessionStorage.getItem(this.authTokenKey);
    this.isAuthenticated = !!storedToken; // Si hay un token, se considera autenticado
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
