import { Component, OnInit } from '@angular/core';
import { DetalleReposicion, Reposicion } from '../models/Reposicion';
import { Presentacion } from '../models/Presentacion';


@Component({
  selector: 'app-cierre-reposicion',
  templateUrl: './cierre-reposicion.page.html',
  styleUrls: ['./cierre-reposicion.page.scss'],
})
export class CierreReposicionPage implements OnInit {
  reposicion = new Reposicion();
  detallesReposicion = [
  new DetalleReposicion(4,2.4,0, new Presentacion()),
  new DetalleReposicion(4,2.4,0, new Presentacion()),
  new DetalleReposicion(4,2.4,0, new Presentacion()),
  new DetalleReposicion(4,2.4,0, new Presentacion()),
  new DetalleReposicion(4,2.4,0, new Presentacion()),
  new DetalleReposicion(4,2.4,0, new Presentacion()),
  new DetalleReposicion(4,2.4,0, new Presentacion()),
  new DetalleReposicion(4,2.4,0, new Presentacion()),
  new DetalleReposicion(4,2.4,0, new Presentacion()),
  new DetalleReposicion(4,2.4,0, new Presentacion()),
  new DetalleReposicion(4,2.4,0, new Presentacion()),
  new DetalleReposicion(4,2.4,0, new Presentacion()),
  new DetalleReposicion(4,2.4,0, new Presentacion()),
  new DetalleReposicion(4,2.4,0, new Presentacion()),
  new DetalleReposicion(4,2.4,0, new Presentacion()),
  new DetalleReposicion(4,2.4,0, new Presentacion()),
  new DetalleReposicion(4,2.4,0, new Presentacion()),
  new DetalleReposicion(4,2.4,0, new Presentacion()),
  new DetalleReposicion(4,2.4,0, new Presentacion()),
  new DetalleReposicion(4,2.4,0, new Presentacion()),
  new DetalleReposicion(4,2.4,0, new Presentacion()),
  new DetalleReposicion(4,2.4,0, new Presentacion()),
  new DetalleReposicion(4,2.4,0, new Presentacion()),
  new DetalleReposicion(4,2.4,0, new Presentacion()),
  new DetalleReposicion(4,2.4,0, new Presentacion()),
  ];
  constructor() { }

  ngOnInit() {
  }

}
