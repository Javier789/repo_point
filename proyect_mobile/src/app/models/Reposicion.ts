import { Presentacion } from './Presentacion';

export class DetalleReposicion {
    cantidadInicial: number;
    precioVenta: number;
    cantidadDiaReposicion: number;
    presentacion: Presentacion
    constructor(cantidadInicial, precioVenta, cantidadDiaReposicion, presentacion) {
        this.cantidadDiaReposicion = cantidadDiaReposicion,
        this.cantidadInicial = cantidadInicial,
        this.precioVenta = precioVenta
        this.presentacion = presentacion
    }

}
export class Reposicion{
    fechaReposicion: Date
    fechaCierreReposicion: Date
    constructor()
    {
        this.fechaCierreReposicion = new Date()
        this.fechaReposicion = new Date()

    }
}