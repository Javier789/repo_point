import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { Routes, RouterModule } from '@angular/router';

import { IonicModule } from '@ionic/angular';

import { CierreReposicionPage } from './cierre-reposicion.page';

const routes: Routes = [
  {
    path: '',
    component: CierreReposicionPage
  }
];

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    RouterModule.forChild(routes)
  ],
  declarations: [CierreReposicionPage]
})
export class CierreReposicionPageModule {}
