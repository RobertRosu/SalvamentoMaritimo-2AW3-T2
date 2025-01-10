import { Component, OnChanges, OnInit, SimpleChanges } from '@angular/core';
import { ActivatedRoute, NavigationEnd, Router } from '@angular/router';
import { filter } from 'rxjs';

@Component({
  selector: 'app-header',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.scss']
})
export class HeaderComponent implements OnInit{
  constructor(private router : Router, private activatedRouter : ActivatedRoute){}
  isMenuOpened: boolean = false;
  activeRoute: string = '';

  ngOnInit(): void {
    // Ruta aldatzen denean, `activeRoute` aldagaia eguneratuko da
    this.router.events
      .pipe(filter(event => event instanceof NavigationEnd))
      .subscribe(() => this.changeActiveRoute());
  }

  toggleIsMenuOpened(){
    if(this.isMenuOpened == true){
      this.isMenuOpened = false;
    }else{
      this.isMenuOpened = true
    }
  }

  changeActiveRoute(){
    this.activeRoute = this.router.url.replace('/', '');
  }
}
