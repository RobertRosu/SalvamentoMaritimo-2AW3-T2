import { Component } from '@angular/core';

@Component({
  selector: 'app-header',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.scss']
})
export class HeaderComponent {
  isMenuOpened: boolean = false;

  toggleIsMenuOpened(){
    if(this.isMenuOpened == true){
      this.isMenuOpened = false;
    }else{
      this.isMenuOpened = true
    }
  }
}
