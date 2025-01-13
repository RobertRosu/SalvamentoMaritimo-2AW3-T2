import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { HeaderComponent } from './components/header/header.component';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import {MatIconModule} from '@angular/material/icon';
import { NorGaraComponent } from './components/nor-gara/nor-gara.component';
import { IbilbideaComponent } from './components/ibilbidea/ibilbidea.component';
import { ErreskatatuakComponent } from './components/erreskatatuak/erreskatatuak.component';
import { FooterComponent } from './components/footer/footer.component';
import { ErrefuxiatuaCardComponent } from './components/errefuxiatua-card/errefuxiatua-card.component';

@NgModule({
  declarations: [
    AppComponent,
    HeaderComponent,
    NorGaraComponent,
    IbilbideaComponent,
    ErreskatatuakComponent,
    FooterComponent,
    ErrefuxiatuaCardComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    BrowserAnimationsModule,
    MatIconModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
