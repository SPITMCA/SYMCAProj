import { Injectable } from '@angular/core';
import {HttpClient, HttpHeaders} from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class LoginService {

  url: string = "http://localhost:3000/"
  constructor(private http: HttpClient) { }

  login(user: any) { 
    return this.http.post(this.url+"login", user, {headers: new HttpHeaders({'content-type': 'application/json'})});
  }

  register(user: any) { 
    return this.http.post(this.url+"register", user, {headers: new HttpHeaders({'content-type': 'application/json'})});
  }
}
