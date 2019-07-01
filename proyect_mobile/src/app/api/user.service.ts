import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders} from '@angular/common/http'
import {Observable} from 'rxjs/internal/Observable';
import {map} from 'rxjs/operators';
import {isNullOrUndefined} from 'util';
@Injectable({
  providedIn: 'root'
})
export class UserService {
  url_api_base = "";
  hs: HttpHeaders = new HttpHeaders({
    "Content-Type": "application/json"
  });
  constructor(private http: HttpClient) {
     
  }
  loginUser(username: string, password: string){
    var url_api = this.url_api_base + "/login"
    return this. http.post(url_api, {username, password}, {headers: this.hs})
    .pipe(map(data =>data));
    /*
    Respuesta del servidor
    {id, ttl, created, userId, username}
    */
  }

  setUser(user): void{
    // Guardar usuario en forma local
  }
  setToken(): void{
    // Guardar Token en forma local

  }
  getToken(){
    return "";
  }
  getConcurrentUser(){

  }
  logoutUser(){
    // Borrar datos a nivel local
    // Avisarle al servidor
  }
}
