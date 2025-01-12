import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { NorGaraComponent } from './components/nor-gara/nor-gara.component';
import { IbilbideaComponent } from './components/ibilbidea/ibilbidea.component';
import { ErreskatatuakComponent } from './components/erreskatatuak/erreskatatuak.component';

const routes: Routes = [
  {path:'nor-gara', component:NorGaraComponent},
  {path:'ibilbidea', component: IbilbideaComponent},
  {path: 'erreskatatuak', component: ErreskatatuakComponent},
  {path: '**', redirectTo: '/nor-gara', pathMatch: 'full'}
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
