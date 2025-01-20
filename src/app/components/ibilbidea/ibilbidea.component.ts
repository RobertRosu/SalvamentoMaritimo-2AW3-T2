import { Component, OnInit } from '@angular/core';
import { ApiService } from '../../services/api.service';

@Component({
  selector: 'app-ibilbidea',
  templateUrl: './ibilbidea.component.html',
  styleUrls: ['./ibilbidea.component.scss']
})
export class IbilbideaComponent implements OnInit {

    data: any[] = [];
    events: any[] = [];
  
    constructor(private apiService: ApiService) { }
  
    ngOnInit(): void {
      this.apiService.getTravels().subscribe({
        next: (response) => {
          this.data = response.response;
          if (Array.isArray(this.data)) {
            this.data.forEach(element => {
              this.events.push({
                date: element.start_date,
                origen: element.origen,
                destino: element.destino,
                description: element.description
              });
            });
          } else {
            console.error('Response is not an array:', response);
          }
        },
        error: (err) => {
          console.error(err);
        }
      });
    }
}
