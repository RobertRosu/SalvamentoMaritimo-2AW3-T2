import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { HeaderComponent } from './components/header/header.component';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import {MatIconModule} from '@angular/material/icon';
import { NorGaraComponent } from './components/nor-gara/nor-gara.component';
import { IbilbideaComponent } from './ibilbidea/ibilbidea.component';
import { ErreskatatuakComponent } from './erreskatatuak/erreskatatuak.component';

@NgModule({
  declarations: [
    AppComponent,
    HeaderComponent,
    NorGaraComponent,
    IbilbideaComponent,
    ErreskatatuakComponent
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
