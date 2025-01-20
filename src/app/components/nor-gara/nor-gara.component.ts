import { Component, OnInit } from '@angular/core';
import { ApiService } from '../../services/api.service';

@Component({
  selector: 'app-nor-gara',
  templateUrl: './nor-gara.component.html',
  styleUrls: ['./nor-gara.component.scss']
})
export class NorGaraComponent implements OnInit {

  rescues: any = 0;
  rescued_people: any = 0;
  workers: any = 0;
  error: string | null = null;

  constructor(private apiService: ApiService) { }

  ngOnInit(): void {
    this.apiService.getPublicNumbers().subscribe({
      next: (response) => {
        this.rescues = response.response.rescues ;
        this.rescued_people = response.response.rescued_people ;
        this.workers = response.response.workers ;
      },
      error: (err) => {
        this.error = 'Failed to fetch data from API';
        console.error(err);
      }
    });
  }


}
