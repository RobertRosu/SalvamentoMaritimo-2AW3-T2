import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class ApiService {
  private apiUrl = 'http://192.168.24.120/api/';

  constructor(private http: HttpClient) { }

  getPublicNumbers(): Observable<any> {
    return this.http.get<any>(this.apiUrl + 'common/public-numbers');
  }

  getTravels(): Observable<any> {
    return this.http.get<any>(this.apiUrl + 'travels');
  }
}
