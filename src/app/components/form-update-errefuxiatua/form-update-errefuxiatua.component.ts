import { Component, Input, Output, EventEmitter, OnChanges, SimpleChanges } from '@angular/core';
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
  errefuxiatuaCopy: any;
  errefuxiatuaEng: any = {};
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

  ngOnChanges(changes: SimpleChanges): void {
    if (changes['errefuxiatua'] && changes['errefuxiatua'].currentValue) {
      this.errefuxiatuaCopy = { ...changes['errefuxiatua'].currentValue };
    }
  }

  constructor(private apiService: ApiService) {}

  updateErrefuxiatua() {
    if (this.isValidInput()) {
      this.errefuxiatuaEng = {
        name: this.errefuxiatuaCopy.izena,
        birth_date: this.errefuxiatuaCopy.adina,
        genre: this.errefuxiatuaCopy.sexua,
        country: this.errefuxiatuaCopy.naziotasuna,
        photo_src: this.errefuxiatuaCopy.imagePath
      };
      this.apiService.putRescuedPeople(this.errefuxiatua.id, this.errefuxiatuaEng).subscribe(
        response => {
          this.updateErrefuxiatuaInParent.emit(this.errefuxiatuaCopy);
          this.closeModal.emit(false);
          Swal.fire({
            toast: true,
            showConfirmButton: false,
            timer: 3000,
            title: `<b>${this.errefuxiatuaCopy.izena}</b> aldatu da.`,
            icon: 'success',
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
  }

  isValidInput(): boolean {
    return this.errefuxiatuaCopy.izena?.trim() &&
      this.errefuxiatuaCopy.adina &&
      this.errefuxiatuaCopy.sexua &&
      this.errefuxiatuaCopy.naziotasuna?.trim() &&
      this.errefuxiatuaCopy.imagePath?.trim();
  }

  exit(): void {
    const hasChanges = JSON.stringify(this.errefuxiatua) !== JSON.stringify(this.errefuxiatuaCopy);
    this.closeModal.emit(hasChanges);
  }
}