import { Component, EventEmitter, Input, Output } from '@angular/core';
import { ApiService } from '../../services/api.service';
import Swal from 'sweetalert2/dist/sweetalert2.js';

@Component({
  selector: 'app-form-create-errefuxiatua',
  templateUrl: './form-create-errefuxiatua.component.html',
  styleUrls: ['./form-create-errefuxiatua.component.scss']
})
export class FormCreateErrefuxiatuaComponent {
  @Input() medikuak: any;
  @Input() erreskateak: any;
  @Output() closeModal = new EventEmitter<boolean>();
  @Output() errefuxiatuaCreated = new EventEmitter<any>();

  errefuxiatua: any = {
    izena: '',
    adina: '',
    sexua: '',
    naziotasuna: '',
    imagePath: ''
  };
  isOmitImageChecked: boolean = false; // Estado del checkbox
  isSubmitted: boolean = false;
  nationalities: string[] = [
    'Afghanistan', 'Albania', 'Algeria', 'Andorra', 'Angola', 'Argentina', 'Armenia', 'Australia', 'Austria', 'Azerbaijan',
    'Bahamas', 'Bahrain', 'Bangladesh', 'Barbados', 'Belarus', 'Belgium', 'Belize', 'Benin', 'Bhutan', 'Bolivia',
    'Bosnia and Herzegovina', 'Botswana', 'Brazil', 'Brunei', 'Bulgaria', 'Burkina Faso', 'Burundi', 'Cabo Verde', 'Cambodia', 'Cameroon',
    'Canada', 'Central African Republic', 'Chad', 'Chile', 'China', 'Colombia', 'Comoros', 'Congo', 'Costa Rica', 'Croatia',
    'Cuba', 'Cyprus', 'Czech Republic', 'Denmark', 'Djibouti', 'Dominica', 'Dominican Republic', 'Ecuador', 'Egypt', 'El Salvador',
    'Equatorial Guinea', 'Eritrea', 'Estonia', 'Eswatini', 'Ethiopia', 'Fiji', 'Finland', 'France', 'Gabon', 'Gambia',
    'Georgia', 'Germany', 'Ghana', 'Greece', 'Grenada', 'Guatemala', 'Guinea', 'Guinea-Bissau', 'Guyana', 'Haiti',
    'Honduras', 'Hungary', 'Iceland', 'India', 'Indonesia', 'Iran', 'Iraq', 'Ireland', 'Israel', 'Italy',
    'Jamaica', 'Japan', 'Jordan', 'Kazakhstan', 'Kenya', 'Kiribati', 'Korea (North)', 'Korea (South)', 'Kosovo', 'Kuwait',
    'Kyrgyzstan', 'Laos', 'Latvia', 'Lebanon', 'Lesotho', 'Liberia', 'Libya', 'Liechtenstein', 'Lithuania', 'Luxembourg',
    'Madagascar', 'Malawi', 'Malaysia', 'Maldives', 'Mali', 'Malta', 'Marshall Islands', 'Mauritania', 'Mauritius', 'Mexico',
    'Micronesia', 'Moldova', 'Monaco', 'Mongolia', 'Montenegro', 'Morocco', 'Mozambique', 'Myanmar', 'Namibia', 'Nauru',
    'Nepal', 'Netherlands', 'New Zealand', 'Nicaragua', 'Niger', 'Nigeria', 'North Macedonia', 'Norway', 'Oman', 'Pakistan',
    'Palau', 'Palestine', 'Panama', 'Papua New Guinea', 'Paraguay', 'Peru', 'Philippines', 'Poland', 'Portugal', 'Qatar',
    'Romania', 'Russia', 'Rwanda', 'Saint Kitts and Nevis', 'Saint Lucia', 'Saint Vincent and the Grenadines', 'Samoa', 'San Marino', 'Sao Tome and Principe', 'Saudi Arabia',
    'Senegal', 'Serbia', 'Seychelles', 'Sierra Leone', 'Singapore', 'Slovakia', 'Slovenia', 'Solomon Islands', 'Somalia', 'South Africa',
    'South Sudan', 'Spain', 'Sri Lanka', 'Sudan', 'Suriname', 'Sweden', 'Switzerland', 'Syria', 'Tajikistan', 'Tanzania',
    'Thailand', 'Timor-Leste', 'Togo', 'Tonga', 'Trinidad and Tobago', 'Tunisia', 'Turkey', 'Turkmenistan', 'Tuvalu', 'Uganda',
    'Ukraine', 'United Arab Emirates', 'United Kingdom', 'United States', 'Uruguay', 'Uzbekistan', 'Vanuatu', 'Vatican City', 'Venezuela', 'Vietnam',
    'Yemen', 'Zambia', 'Zimbabwe'
  ];

  
  constructor(private apiService: ApiService) {}

  handleOmitImageChange() {
    if (this.isOmitImageChecked) {
      this.errefuxiatua.imagePath = null; // Establece el valor como null si se omite la imagen
    }
  }

  createErrefuxiatua() {
    this.isSubmitted = true; // Marca el formulario como enviado
    if (!this.isValidInput()) {
      return; // No hagas nada si no es válido
    }

    if (this.isValidInput()) {
      const payload = {
        name: this.errefuxiatua.izena,
        birth_date: this.errefuxiatua.adina,
        genre: this.errefuxiatua.sexua,
        country: this.errefuxiatua.naziotasuna,
        photo_src: this.isOmitImageChecked ? null : this.errefuxiatua.imagePath, // Condición para la URL
        doctor_id: this.errefuxiatua.medikua,
        rescue_id: this.errefuxiatua.erreskatea,
        diagnostic: this.errefuxiatua.diagnostikoa
      };

      this.apiService.postRescuedPeople(payload).subscribe(
        response => {
          this.errefuxiatuaCreated.emit(this.errefuxiatua);
          this.closeModal.emit(false);
          Swal.fire({
            toast: true,
            showConfirmButton: false,
            timer: 3000,
            title: `<b>${this.errefuxiatua.izena}</b> sortu da.`,
            icon: 'success',
            position: 'top',
            customClass: {
              popup: 'border border-3 border-success rounded-pill shadow',
            }
          });
        },
        error => {
          console.error('Errorea sortzean:', error);
        }
      );
    }
  }

  isValidInput(): boolean {
    return this.errefuxiatua.izena?.trim() &&
      this.errefuxiatua.adina &&
      this.errefuxiatua.sexua &&
      this.errefuxiatua.naziotasuna?.trim() &&
      (this.isOmitImageChecked || this.isValidUrl(this.errefuxiatua.imagePath));
  }

  isValidUrl(url: string | null | undefined): boolean {
    if (!url) return false;
    const urlRegex = /^(https?:\/\/)[^\s$.?#].[^\s]*$/;
    return urlRegex.test(url.trim());
  }

  cancel() {
    this.closeModal.emit(false);
  }
}